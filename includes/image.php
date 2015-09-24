<!-- OPEN .post-item .image .clear -->
<div class="post-item image clear" id="<?php the_ID(); ?>">	

	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'showcase-image' ); ?>

	<?php if (is_single()) { ?>

		<?php if (has_post_thumbnail()) { ?>

			<span class="date-overlay"><?php the_time('M d, Y'); ?></span>
			
			<div class="main-post-image hover-image">
				<a href="<?php echo $src[0]; ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('post-main-image'); ?>
				</a>
			</div>

			<div class="overlay"> </div>

		<?php } ?>
		
		<section class="detail-body">
			<?php the_content(); ?>
		</section>
		
	<?php } else { ?>

		<?php if (has_post_thumbnail()) { ?>
		
	        <?php if (get_current_template() == 'template-blog3.php') { ?>
		
				<div class="full-width-image hover-image">
					<a href="<?php echo $src[0]; ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('showcase-image'); ?>
					</a>
				</div>

				<div class="overlay"> </div>

			<?php } else { ?>

				<div class="main-post-image hover-image">
					<a href="<?php echo $src[0]; ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('post-main-image'); ?>
					</a>
				</div>

				<div class="overlay"> </div>

			<?php } ?>

		<?php } ?>


		<div class="heading">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title('',' ›'); ?></a></h2>
		</div>
		
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>
        <a class="blog-view-link" href="<?php the_permalink(); ?>">view ›</a>

	<?php } ?>

<!-- CLOSE .post-item .image .clear -->
</div>