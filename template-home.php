<?php
/*
Template Name: Tpl Homepage
*/
?>
<?php get_header(); ?>
<?php
  $type = array('post');
  //$per_page = of_get_option('blog_items_per_page');
  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args=array(
  'limit' => 10,
  'posts_per_page'=> 10,
  'post_type' => $type,
  'post_status' => 'publish',
  //'paged' => $paged,
  //'posts_per_page' => $per_page,
  //'ignore_sticky_posts' => 1,
  );
  $wp_query = NULL;
  $wp_query = new WP_Query();
  $wp_query->query($args);
?>

<!--Posts -->
<section class="container category_grid">
  <div class="row">
    <div class="col-md-8">
      <div class="grid">
          <!-- OPEN #blog -->
          <?php
            $post = $posts[0];
            $c=0;
          ?>
          <?php if (have_posts()) : while (have_posts()) : the_post();

                // The following determines what the post format is and shows the correct file accordingly

                $format = get_post_format();
                get_template_part( 'includes/'.$format );
                $c++;
                if($format == ''){
                  if($c==1){
                    get_template_part( 'includes/standard' );
                  }else{
                    get_template_part( 'includes/standard' );
                  }
                
                }

              endwhile; endif;
          ?>
          <!-- CLOSE #blog -->
      </div><!-- end grid -->
    </div>

    <div class="col-md-4">
      <?php
        $type = 'review';
        $args=array(
        'post_type' => $type,
        'post_status' => 'publish',
        'limit' => 4,
        'posts_per_page'=> 4,
        'orderby' => 'post_date',
        'order' => 'DESC',
        );
        $wp_query = NULL;
        $wp_query = new WP_Query();
        $wp_query->query($args);
      ?>

      <?php 
        $count_review_post = 0;
        if (have_posts()) : while (have_posts()) : the_post();
          $count_review_post = $count_review_post + 1;
          if($count_review_post==3){
            echo '<div class="advertisement_sidebar">
                    <span>Advertisement</span>
                  </div>';
          }
            // The following determines what the post format is and shows the correct file accordingly

            $format = get_post_format();
            get_template_part( 'includes/'.$format );
            if($format == ''){
                get_template_part( 'includes/review' );
            }
          endwhile; endif;
      ?>

    </div>

  </div>
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>
