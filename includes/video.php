<!-- OPEN .post-item .video .clear -->
<div class="post-item video clear" id="<?php the_ID(); ?>">	

	<?php if (is_single()) { ?>

		<span class="date-overlay"><?php the_time('M d, Y'); ?></span>
		<div class="main-post-image hover-image">
			<a href="<?php echo get_post_meta( $post->ID, 'video-url', true ); ?>" rel="prettyPhoto" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-main-image'); ?></a>
		</div>
		<div class="overlay"> </div>

		<section class="detail-body">
			<?php the_content(); ?>
		</section>
		
	<?php } else { ?>

        <?php if (get_current_template() == 'template-blog3.php') { ?>
	
		<div class="full-width-image hover-image">
			<a href="<?php echo get_post_meta( $post->ID, 'video-url', true ); ?>" rel="prettyPhoto" title="<?php the_title(); ?>"><?php the_post_thumbnail('showcase-image'); ?></a>
		</div>

		<?php } else { ?>

		<div class="main-post-image hover-image">
			<a href="<?php echo get_post_meta( $post->ID, 'video-url', true ); ?>" rel="prettyPhoto" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-main-image'); ?></a>
		</div>
	
		<?php } ?>

		<div class="overlay"> </div>


		<div class="heading">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title('',' ›'); ?></a></h2>
		</div>
		
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>

        <div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>
        <a class="blog-view-link" href="<?php the_permalink(); ?>">view ›</a>

	<?php } ?>

<!-- CLOSE .post-item .video .clear -->
</div>