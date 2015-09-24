<!-- OPEN .post-item .clear -->
<div class="post-item clear" id="<?php the_ID(); ?>">
			
	<?php $link = get_the_content(); ?>

	<?php if (is_single()) { ?>

		<section class="aside-body">
		
			<a class="link-image" href="<?php echo $link;?>"></a>

			<div class="excerpt link">
				<h2 class="link-heading"><a href="<?php echo $link;?>" target="_blank"><?php the_title(); ?></a></h2>
			</div>
		
		</section>

	<?php } else { ?>

		<a class="link-image" href="<?php echo $link;?>"></a>

		<div class="excerpt link">
			<h2 class="link-heading"><a href="<?php echo $link;?>" target="_blank"><?php the_title(); ?></a></h2>
		</div>

		<div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>
        <a class="blog-view-link" href="<?php the_permalink(); ?>">view ›</a>
		
	<?php } ?>

<!-- CLOSE .post-item .clear -->
</div>