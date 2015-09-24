<?php get_header(); ?>

<!-- OPEN .section-blog -->
<section class="section-blog bg-solid-blue">
  <div class="container">
    <div class="row">

      <!-- Left Column -->
      <div class="col-sm-12 col-md-8">

        <div class="heading">
          <h1><?php wp_title(''); ?></h1>
        </div>

        <!-- OPEN #blog -->
        <section id="blog" class="full-width">
          <?php if (have_posts()) : while (have_posts()) : the_post();

                // The following determines what the post format is and shows the correct file accordingly
                $format = get_post_format();
                get_template_part( 'includes/'.$format );

                if($format == '')
                get_template_part( 'includes/standard' );

              endwhile;
          ?>

          <?php else : /* NOT FOUND */ ?>
		          <h1>eduarrrrrrrrrr</h1>
              <!-- OPEN .post-item .clear -->
              <div class="post-item clear" id="<?php the_ID(); ?>">

                  <p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>

                  <?php get_template_part(TEMPLATEPATH.'/searchform.php'); ?>

              <!-- CLOSE .post-item .clear -->
              </div>

          <?php endif; ?>

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
		<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <!-- CLOSE .section-blog -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>
