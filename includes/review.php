<!-- OPEN .post-item .clear -->

<?php if (is_single()) { ?>

<article id="<?php the_ID(); ?>" class="single-post">
  <section class="detail-body">
    <?php get_the_ID(); ?> 
    <?php the_content(); ?>
  </section>
</article>
<?php } else { ?>

<div class="last_review">
  <div class="last_review_content">
    <span class="last_subtitle">Product Review</span>
    <h4 class="last_title"><a href="<?php the_permalink(); ?>"><?php the_title('',''); ?></a></h4>
    <div class="last_content">
      <?php the_excerpt(); ?>
    </div>
    <div class="last_learmore">
      <a href="<?php the_permalink(); ?>">Learn More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
    </div>
  </div>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

  <?php endif; ?>
  <figure class="last_review_figure" style="background-image: url('<?php echo $image[0]; ?>')">
  </figure>
</div><!-- End last_review -->

<?php } ?>
