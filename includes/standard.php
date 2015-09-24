<!-- OPEN .post-item .clear -->

<?php if (is_single()) { ?>

<article id="<?php the_ID(); ?>" class="single-post">
  <section class="detail-body">
    <?php the_content(); ?>
  </section>
</article>
<?php } else { ?>


<div class="grid-item">
  <div id="<?php the_ID(); ?>" class="post">
    <?php if (has_post_thumbnail()) { ?>
    <div class="main-post-image">
      <?php foreach((get_the_category()) as $category) { $category->cat_name . ' '; } ?>
      <a href="<?php echo get_category_link(get_cat_id($category->cat_name)); ?>" class="entry-categories"><?php echo $category->cat_name ?></a>
      <div class="arrow"></div>
      <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('full'); ?>
      </a> </div>
    <?php } ?>
    <section class="entry-content"><a class="entry-comments" href="<?php the_permalink(); ?>?community=true"><span><i class="fa fa-comments-o"></i>
      <?php comments_number( '0', '1', '%' ); ?>
      </span></a>
      <h3 class="clear"><a href="<?php the_permalink(); ?>">
        <?php the_title('',''); ?>
        </a></h3>
      <header class="entry-information">
      <i class="fa fa-clock-o"></i><?php the_time('F j, Y'); ?>&nbsp;|&nbsp;<i class="fa fa-user"></i>by: <?php echo get_the_author_link(); ?> </header>
      <article class="excerpt">
        <?php the_excerpt(); ?>
      </article>
      <div class="entry-tags">   
        <i class="fa fa-tags"></i><?php the_tags(); ?>
      </div>
    </section>
    <!-- CLOSE .post-item .clear --> 
  </div>
</div>

<?php } ?>
