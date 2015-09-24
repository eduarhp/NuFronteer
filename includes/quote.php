<!-- OPEN .post-item .clear -->
<div class="post-item quote-item clear" id="<?php the_ID(); ?>">
			
	<?php if (is_single()) { ?>

		<section class="aside-body">
		
			<a class="quote-image" href="<?php the_permalink(); ?>"></a>

			<div class="excerpt">
				<?php the_content(); ?>
				<cite><?php the_title(); ?></cite>
			</div>
					
			<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>	
		
		</section>

	<?php } else { ?>

		<a class="quote-image" href="<?php the_permalink(); ?>"></a>

		<div class="excerpt quote">
			<?php the_excerpt(); ?>
			<cite><?php the_title(); ?></cite>
		</div>

		<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>

        <a class="blog-view-link" href="<?php the_permalink(); ?>">view ›</a>

	<?php } ?>

<!-- CLOSE .post-item .clear -->
</div>