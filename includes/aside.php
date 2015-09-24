<!-- OPEN .post-item .clear -->
<div class="post-item aside clear" id="<?php the_ID(); ?>">	
	<?php if (is_single()) { ?>
		<section class="aside-body">
			<?php the_content(); ?>
		</section>

	<?php } else { ?>
		
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
		
	<?php } ?>

<!-- CLOSE .post-item .clear -->
</div>