<?php
/*
Template Name: Home (Video Slider)
*/
?>

<?php get_header(); ?>

<!-- OPEN .main-wrap -->
<section class="main-wrap">	
	
	<div class="heading">
		<?php if (of_get_option('homepage_heading_text') != '') { ?>
			<h1><?php echo of_get_option('homepage_heading_text'); ?></h1>
			<ul class="social-icons">
				<?php if (of_get_option('twitter_username') != '') { ?>
					<li class="twitter"><a href="http://www.twitter.com/<?php echo of_get_option('twitter_username') ?>">Twitter</a></li>
				<?php } ?>
				<?php if (of_get_option('facebook_page') != '') { ?>
					<li class="facebook"><a href="<?php echo of_get_option('facebook_page') ?>">Facebook</a></li>
				<?php } ?>
				<?php if (of_get_option('google_plus_page') != '') { ?>
					<li class="google-plus"><a href="<?php echo of_get_option('google_plus_page') ?>">Google+</a></li>
				<?php } ?>
				<?php if (of_get_option('forrst_username') != '') { ?>
					<li class="forrst"><a href="http://www.forrst.com/<?php echo of_get_option('forrst_username') ?>">Forrst</a></li>
				<?php } ?>
				<?php if (of_get_option('dribbble_username') != '') { ?>
					<li class="dribbble"><a href="http://www.dribbble.com/<?php echo of_get_option('dribbble_username') ?>">Dribbble</a></li>
				<?php } ?>
			</ul>
		<?php } else { ?>
			<h1>Welcome to Saviour, a Premium Portfolio WordPress Theme</h1>
			<ul class="social-icons">
				<?php if (of_get_option('twitter_username') != '') { ?>
					<li class="twitter"><a href="http://www.twitter.com/<?php echo of_get_option('twitter_username') ?>">Twitter</a></li>
				<?php } ?>
				<?php if (of_get_option('facebook_page') != '') { ?>
					<li class="facebook"><a href="<?php echo of_get_option('facebook_page') ?>">Facebook</a></li>
				<?php } ?>
				<?php if (of_get_option('google_plus_page') != '') { ?>
					<li class="google-plus"><a href="<?php echo of_get_option('google_plus_page') ?>">Google+</a></li>
				<?php } ?>
				<?php if (of_get_option('forrst_username') != '') { ?>
					<li class="forrst"><a href="http://www.forrst.com/<?php echo of_get_option('forrst_username') ?>">Forrst</a></li>
				<?php } ?>
				<?php if (of_get_option('dribbble_username') != '') { ?>
					<li class="dribbble"><a href="http://www.dribbble.com/<?php echo of_get_option('dribbble_username') ?>">Dribbble</a></li>
				<?php } ?>
			</ul>
		<?php } ?>
	</div>

	<!-- Get Showcase Post Meta -->
	<?php $data = get_post_meta( $post->ID, 'Showcase', true ); ?>
	
	<?php
	  $type = 'showcase';
	  $per_page = of_get_option('homepage_showcase_items', '-1');
	  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	  $args=array(
		'post_type' => $type,
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => $per_page,
		'ignore_sticky_posts'=> 1
	  );
	  $wp_query = new WP_Query();
	  $wp_query->query($args);
	?>
	
	<?php if(have_posts()) : ?>

		<script>
			jQuery(document).ready(function() {
				$('#featured').slides({
					preload: true,
					preloadImage: '<?php echo bloginfo('template_directory'); ?>/images/loading.gif',
					generateNextPrev: true,
					play: <?php
		        				$key = of_get_option('homepage_showcase_time');
		        				echo $key . '000'; // How long each slide will show
		        			?>,
					crossfade: true,
					autoHeight: true,
					slideSpeed: 500,
					fadeSpeed: 500,
					width: 1000,
					generatePagination: false,
					hoverPause: true
				});
		    });
		</script>

		<!-- OPEN #showcase -->
		<section id="showcase">
				
			<!-- OPEN #featured -->
			<div id="featured">
					
				<!-- OPEN .slides_container -->
				<div class="slides_container">

					<?php while ( have_posts() ) : the_post();?> 

						<div class="content">
						
							<?php $link = get_post_custom_values('slide-link'); ?> 
							<?php $youtube = get_post_custom_values('slide-youtube'); ?> 
							<?php $vimeo = get_post_custom_values('slide-vimeo'); ?> 

							<?php if ($youtube[0] != '') { ?>
								
								<div class="slide">
									<iframe src="http://www.youtube.com/embed/<?=$youtube[0]?>?hd=1" width="920" height="430"></iframe>
								</div>

							<?php } else if ($vimeo[0] != '') { ?>
								
								<div class="slide">
									<iframe src="http://player.vimeo.com/video/<?=$vimeo[0]?>" width="920" height="430"></iframe>
								</div>

							<?php } else if (has_post_thumbnail()) { ?>
														
								<?php if ($link[0] != "") {?>
									
									<div class="slide">
										<a href="<?=$link[0]?>"><?php the_post_thumbnail('showcase-image') ?></a>
									</div>
									
								<?php } else { ?>
								
									<div class="slide">
										<?php the_post_thumbnail('showcase-image') ?>
									</div>
									
								<?php } ?>
					          	
							<?php } else { ?>
							
								<?php the_content(); ?>
							
							<?php } ?>

						<!-- CLOSE .content -->	
						</div>

					<?php endwhile; ?>

				<!-- CLOSE .slides_container -->
				</div>
				
			<!-- CLOSE #featured  -->
			</div>
	
		<!-- CLOSE #showcase -->
		</section>

	<?php endif; ?>
				
	<?php rewind_posts(); ?>

	<?php if (of_get_option('show_portfolio_items') == 1) { ?>

	<?php
	  $type = 'portfolio';
	  $per_page = of_get_option('homepage_portfolio_items', '6');
	  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	  $args=array(
		'post_type' => $type,
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => $per_page,
		'ignore_sticky_posts'=> 1
	  );
	  $wp_query = NULL;
	  $wp_query = new WP_Query();
	  $wp_query->query($args);
	?>

	<?php if(have_posts()) : ?>

		<!-- OPEN #portfolio -->
		<section id="portfolio" class="clear">
			
			<h2>Recent Work</h2>

			<!-- OPEN .portfolio-items .hover-image -->
			<ul class="portfolio-items hover-image">

			<?php while ( have_posts() ) : the_post();?>
				
				<?php if (($wp_query->current_post + 1) % 3 == 1) { ?>
				<li class="first">
				<?php } else { ?>
				<li>
				<?php } ?>
					<figure>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-image'); ?></a>
					</figure>
					<?php if (of_get_option('show_portfolio_item_title') == 1) { ?>
						<a class="item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php } ?>
					<?php if (of_get_option('show_portfolio_item_desc') == 1) { ?>
						<div class="item-desc"><?php the_excerpt(); ?></div>
					<?php } ?>
						<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span></div>
						<a class="portfolio-view-link" href="<?php the_permalink(); ?>">view ›</a>
				</li>

			<?php endwhile; ?>
				
			<!-- CLOSE .portfolio-items .hover-image -->
			</ul>
		
		<!-- CLOSE #portfolio -->
		</section>

	<?php endif; ?>

	<?php } ?>

	<?php rewind_posts(); ?>

	<?php if (of_get_option('show_recent_posts') == 1) { ?>

	<!-- OPEN #recent-posts -->
	<section id="recent-posts" class="clear">
				
		<?php
		  $type = 'post';
		  $per_page = 2;
		  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  $args=array(
			'post_type' => $type,
			'post_status' => 'publish',
			'paged' => $paged,
			'posts_per_page' => $per_page,
			'ignore_sticky_posts'=> 1,
			'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-aside', 'post-format-quote', 'post-format-link'),
                        'operator' => 'NOT IN'
                    )
                )
		  );
		  $wp_query = NULL;
		  $wp_query = new WP_Query();
		  $wp_query->query($args);
		?>

		<h2>Recent Posts</h2>
		
		<?php if(have_posts()) : ?>

			<!-- OPEN .main-posts -->
			<section class="main-posts">

			<?php while ( have_posts() ) : the_post();?>
				
				<?php if (($wp_query->current_post + 1) % 3 == 1) { ?>
				<div class="post first">
				<?php } else { ?>
				<div class="post">
				<?php } ?>
					<div class="image hover-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-image'); ?></a></div>
					<a class="item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php the_excerpt(); ?>
					<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>
					<a class="blog-view-link" href="<?php the_permalink(); ?>">view ›</a>
				</div>
			
			<?php endwhile; ?>

			<!-- CLOSE .main-posts -->
			</section>

		<?php endif; ?>

		<?php rewind_posts(); ?>

		<?php
		  $type = 'post';
		  $per_page = 6;
		  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  $args=array(
			'post_type' => $type,
			'post_status' => 'publish',
			'paged' => $paged,
			'posts_per_page' => $per_page,
			'ignore_sticky_posts'=> 1,
			'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-aside', 'post-format-quote', 'post-format-link'),
                        'operator' => 'NOT IN'
                    )
                )
		  );
		  $wp_query = NULL;
		  $wp_query = new WP_Query();
		  $wp_query->query($args);
		?>

		<?php if(have_posts()) : ?>

			<!-- OPEN .other-posts -->
			<section class="other-posts">

			<?php while ( have_posts() ) : the_post();?>
				
				<?php if (($wp_query->current_post + 1) > 2) { ?>
				
				<div class="post">
					<div class="mini-image hover-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mini-thumb-image'); ?></a></div>
					<div class="post-details">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
						<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span></div>
						<a class="view-link" href="<?php the_permalink(); ?>">view ›</a>
					</div>
				</div>

				<?php } ?>
			
			<?php endwhile; ?>

			<!-- CLOSE .other-posts -->
			</section>
		
		<?php endif; ?>
			
	<!-- CLOSE #recent-posts -->
	</section>

	<?php } ?>

<!-- CLOSE .main-wrap -->
</section>
	
<!-- WordPress Hook -->
<?php get_footer(); ?>