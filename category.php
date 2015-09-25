<?php get_header(); ?>

<!-- OPEN .section-blog -->
<section class="section-blog bg-solid-blue">
  <div class="container">
    <div class="row category_grid">

      <!-- Left Column -->
      <div class="col-sm-12 col-md-8">
       
        <!-- OPEN #blog -->

        <div class="grid">

          <?php 

            $args_cat = array(
              'child_of'=>get_query_var('cat'),
            );

            $category = get_the_category($args_cat);

            $categories = array();
            if (empty($category)) {
              $categories[] = get_query_var('cat');
            }else{
              foreach ($category as $value) {
                $categories[] = $value->term_id;
              }
            }

          ?>

          <?php 
            $type = array('post', 'diy', 'review' );

                    $args=array(
                      'limit' => 24,
                      'posts_per_page'=> 24,
                      'post_type' => $type,
                      'category__in' => $categories,
                      'post_status' => 'publish',
                      );
                    $wp_query = NULL;
                    $wp_query = new WP_Query();
                    $wp_query->query($args);

          ?>
          <?php if (have_posts()) : while (have_posts()) : the_post();

                // The following determines what the post format is and shows the correct file accordingly
                $format = get_post_format();
                get_template_part( 'includes/'.$format );

                if($format == '')
                get_template_part( 'includes/standard' );

              endwhile; endif;
              ?>

          <!-- OPEN .navigation .page-navigation -->
          <div class="navigation page-navigation">
            <div class="nav-previous">
              <?php previous_posts_link('&#8249; Newer Entries'); ?>
            </div>
            <div class="nav-next">
              <?php next_posts_link('Older Entries &#8250;'); ?>
            </div>

            <!-- CLOSE .navigation .page-navigation -->
          </div>

          <!-- CLOSE #blog -->
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-sm-12 col-md-4">
      	<!-- WordPress Hook -->
		<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <!-- CLOSE .section-blog -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>
