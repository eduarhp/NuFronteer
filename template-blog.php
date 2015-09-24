<?php
/*
Template Name: Blog (Right Sidebar 021815)
*/
?>
<?php get_header(); ?>
<?php
  $type = 'post';
  $per_page = of_get_option('blog_items_per_page');
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

<!-- OPEN .section-blog -->
<section class="section-blog bg-solid-blue">
  <div class="container">
    <div class="row"> 
      
      <!-- Left Column -->
      <div class="col-sm-12 col-md-8">
        
        <!--<div class="heading">
          <h1>Blog (Right Sidebar)</h1>
        </div>-->
        
        <!-- OPEN #blog -->
        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus provident possimus dicta quisquam dolorem voluptatum dolore quaerat totam neque dignissimos adipisci consequatur quae quidem suscipit incidunt earum repellendus ut sit!</h1>
        <div class="grid">
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
        </section>
      </div>
      
      <!-- Right Column -->
      <div class="col-sm-12 col-md-4">
      	<!-- WordPress Hook -->
        <h1>asadasdad</h1>
		<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <!-- CLOSE .section-blog --> 
</div>

<!-- WordPress Hook -->
<?php get_footer(); ?>
