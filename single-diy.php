<?php get_header(); ?>

<!-- OPEN .section-blog -->
<section class="section-blog bg-solid-blue">
  <div class="container">
    <!--<h1>DIY DIY</h1>-->
    <div class="row">

      <!-- Left Column -->
      <div class="col-sm-12 col-md-8">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- OPEN .article-wrap -->
        <article class="article-wrap main-column" id="<?php the_ID(); ?>" <?php post_class(); ?>>

          <!-- Desktop Nav tabs -->
          <ul class="nav nav-tabs desktop" role="tablist">
            <li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">DIY Video</a></li>
            <li role="presentation"><a href="#community" aria-controls="community" role="tab" data-toggle="tab">Community Opinion</a></li>
            <li role="presentation" class="active"><a href="#advice" aria-controls="advice" role="tab" data-toggle="tab">DIY Advice</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">

            <?php setPostViews(get_the_ID()); ?>

            <?php if (has_post_thumbnail()) { ?>
              <?php
                    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
              ?>
              <div class="single-main-post-image" style="background-image: url(<?php echo $src[0]; ?> ) !important; background-size: cover">
                <?php foreach((get_the_category()) as $category) { $category->cat_name . ' '; } ?>
                <?php

                  $category_post = $category->cat_name;
                  if($category_post=="" || $category_post==NULL){
                    $post_type = get_post_type_object( get_post_type($post) );
                    $category_post = $post_type->label ;
                  }else{

                  }
                ?>
                <a href="<?php echo get_category_link(get_cat_id($category->cat_name)); ?>" class="entry-categories"><?php echo $category_post; ?></a>
                <div class="arrow"></div>
                <div class="title-gradient-overlay "></div>
                <div class="features">
                  <h2 class="entry-title"><span class="highlight-effect"><?php the_title('',''); ?></span></h2>
                  <div class="entry-meta"><span class="highlight-effect">
                    <span class="meta-author"><?php echo get_the_author_meta( 'user_firstname' ); ?> <?php echo get_the_author_meta( 'user_lastname' ); ?></span>
                    <span class="meta-date"><?php the_time('F j, Y'); ?></span>
                    <span class="meta-comments"><?php comments_number( '0', '1', '%' ); ?></span>
                    <span class="meta-views"><?php echo getPostViews(get_the_ID()); ?></span>
                  </div>
                  <div class="entry-tags">
                    <i class="fa fa-tags"></i><?php the_tags('', ', ', '<br />'); ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            
            <!-- Mobile Nav tabs -->
            <ul class="nav nav-tabs mobile" role="tablist">
              <li role="presentation" class="active"><a href="#advice" aria-controls="advice" role="tab" data-toggle="tab">DIY Advice</a></li>
              <li role="presentation"><a href="#community" aria-controls="community" role="tab" data-toggle="tab">Community Opinion</a></li>
              <li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">DIY Video</a></li>
            </ul>
            
            <div role="tabpanel" class="tab-pane active" id="advice">
              <div class="rating-wrapper clearfix">
                <?php $difficulty_level = get_post_meta($post->ID, 'difficulty_level', true); ?>
                <div class="large-rating">
                  <div class="rating-outer circle-diy">
                    <div class="rating-inner"><span><span><?php echo $difficulty_level; ?></span></span></div>
                  </div>
                  <h4 class="rating-text">Difficulty</h4>
                </div>
              </div>
              <?php
                  // The following determines what the post format is and shows the correct file accordingly
                  $format = get_post_format();
                  get_template_part( 'includes/'.$format );

                  if($format == '')
                  get_template_part( 'includes/standard' );
              ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="community">

              <div id="comment-area" class="clearfix">
                <?php comments_template('', true); ?>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane post_video" id="video">
              <?php $diy_video_1 = get_post_meta($post->ID, 'diy_video_1', true); ?>
              <?php $diy_video_2 = get_post_meta($post->ID, 'diy_video_2', true); ?>
              <?php $diy_video_3 = get_post_meta($post->ID, 'diy_video_3', true); ?>
              <?php echo $diy_video_1; ?>
              <?php echo $diy_video_2; ?>
              <?php echo $diy_video_3; ?>
            </div>

            <div role="tabpanel" class="tab-pane diy_content" id="diy">

              <div id="comment-area" class="clearfix">

                <?php 

                  $global_id = $post->ID;

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

                if( $wp_query->have_posts() ) {
                  while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                    <?php 
                      $category_var = get_the_category();
                      $firstCategory = $category_var[0]->cat_name;
                      if($firstCategory==$category_post){
                    ?>
                    <article>
                      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                      <figure>
                        <img src="<?php echo $image[0]; ?>" alt="">
                      </figure>
                      <div class="article_content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                        <div class="level">
                          <span class="flaticon-wrench112"></span>
                          <?php $product_price = get_post_meta($post->ID, 'product_price', true); ?>
                          <div class="bar">
                            <div class="bar_progress" style="width: <?php echo $product_price; ?>%"></div>
                          </div>
                          <span class="difficult">difficult rating <?php echo $product_price; ?></span>
                        </div>
                      </div>
                    </article>
                    <?php } ?>
                    <?php
                  endwhile;
                }
                wp_reset_query();  // Restore global post data stomped by the_post().

                ?>

              </div>
            </div>
          </div>


          <?php 
            $shortCode = get_post_meta($global_id, 'review_shortCode', true);
            $product_1 = get_post_meta($global_id, '_review_product1_name', true);
            $product_2 = get_post_meta($global_id, '_review_product2_name', true);
          ?>

          <?php if($shortCode!="" && $product_1!="" && $product_2!="") { ?>
          
          <div class="box_products_compare">
            <div class="tab_wrapper">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-bottom" role="tablist">
                <?php 
                  if($product_1!="" && $product_2!=""){ ?>

                  <li role="presentation" class="active"><a href="#productline" aria-controls="home" role="tab" data-toggle="tab"><span class="flaticon-shopping122"></span>Product Line</a></li>

                <?php }
                ?>
                <?php 
                  if($shortCode!=""){ ?>

                  <li role="presentation"><a href="#compare" aria-controls="profile" role="tab" data-toggle="tab"><span class="flaticon-balance14"></span>Compare</a></li>

                <?php }
                ?>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content tab-content-bottom">
                <?php 
                  if($product_1!="" && $product_2!=""){ ?>
                  
                  <div role="tabpanel" class="tab-pane active" id="productline">              
                    <div class="carrousel carro-products"> 
                      <!-- Product 1 -->
                      <article class="product">
                        <?php 
                          $existing_image_id = get_post_meta($global_id,'_review_attached_image1', true);
                          $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
                          $existing_image_url = $arr_existing_image[0];
                        ?>
                        <figure style="background-image: url(<?php echo $existing_image_url; ?>);">
                        </figure>
                        <div class="product_detail">
                          <div class="product_name">
                            <a href="<?php echo get_post_meta($global_id, '_review_product1_link', true); ?>" target="_blank"><?php echo get_post_meta($global_id, '_review_product1_name', true); ?></a>
                          </div>
                          <!--<div class="product_code">
                            F7C020fc
                          </div>-->
                          <div class="product_price">
                            <?php echo get_post_meta($global_id, '_review_product1_price', true); ?>
                          </div>
                          <div class="product_buy">
                            <a href="<?php echo get_post_meta($global_id, '_review_product1_link', true); ?>" target="_blank">Buy now</a>
                          </div>
                        </div>
                      </article>

                      <!-- Product 2 -->
                      <article class="product">
                        <?php 
                          $existing_image_id = get_post_meta($global_id,'_review_attached_image2', true);
                          $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
                          $existing_image_url = $arr_existing_image[0];
                        ?>
                        <figure style="background-image: url(<?php echo $existing_image_url; ?>);">
                        </figure>
                        <div class="product_detail">
                          <div class="product_name">
                            <a href="<?php echo get_post_meta($global_id, '_review_product2_link', true); ?>" target="_blank"><?php echo get_post_meta($global_id, '_review_product2_name', true); ?></a>
                          </div>
                          <!--<div class="product_code">
                            F7C020fc
                          </div>-->
                          <div class="product_price">
                            <?php echo get_post_meta($global_id, '_review_product2_price', true); ?>
                          </div>
                          <div class="product_buy">
                            <a href="<?php echo get_post_meta($global_id->ID, '_review_product2_link', true); ?>" target="_blank">Buy now</a>
                          </div>
                        </div>
                      </article>

                      <!-- Product 3 -->
                      <article class="product">
                        <?php 
                          $existing_image_id = get_post_meta($global_id,'_review_attached_image3', true);
                          $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
                          $existing_image_url = $arr_existing_image[0];
                        ?>
                        <figure style="background-image: url(<?php echo $existing_image_url; ?>);">
                        </figure>
                        <div class="product_detail">
                          <div class="product_name">
                            <a href="<?php echo get_post_meta($global_id, '_review_product3_link', true); ?>" target="_blank"><?php echo get_post_meta($global_id, '_review_product3_name', true); ?></a>
                          </div>
                          <!--<div class="product_code">
                            F7C020fc
                          </div>-->
                          <div class="product_price">
                            <?php echo get_post_meta($global_id, '_review_product3_price', true); ?>
                          </div>
                          <div class="product_buy">
                            <a href="<?php echo get_post_meta($global_id, '_review_product3_link', true); ?>" target="_blank">Buy now</a>
                          </div>
                        </div>
                      </article>
                      
                    </div>
                  </div><!-- end productline -->         

                <?php }
                ?>


                <?php 
                  if($shortCode!=""){ ?>

                  <div role="tabpanel" class="tab-pane" id="compare">
                    <div class="table_content">
                    <?php echo do_shortcode($shortCode); ?>
                    </div>
                  </div>

                <?php }
                ?>
              </div>
            </div>
          </div>
            
          <?php } ?>


          <!-- OPEN .navigation .page-navigation -->
          <nav class="navigation page-navigation">
            <ul class="pager">
              <li class="pull-right"><?php previous_post_link('%link','%title &#8250;', FALSE); ?></li>
              <li class="pull-left"><?php next_post_link('%link','&#8249; %title', FALSE); ?></li>
            </ul>
          </nav>
          <!-- END .navigation .page-navigation -->

          <!-- CLOSE .article-wrap -->
        </article>
        <?php endwhile; endif; ?>
              
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

