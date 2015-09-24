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

          <!-- Nav tabs -->
          <ul id="review-tabs" class="nav nav-tabs" role="tablist">
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
              <div class="single-main-post-image" style="background: url(<?php echo $src[0]; ?> ) !important;">
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
            <div role="tabpanel" class="tab-pane active" id="advice">
              <div class="rating-wrapper clearfix">
                <?php $product_price = get_post_meta($post->ID, 'product_price', true); ?>
                <div class="large-rating">
                  <div class="rating-outer circle-diy">
                    <div class="rating-inner"><span><span><?php echo $product_price; ?></span></span></div>
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
              <?php
                $url = get_post_meta( get_the_ID(), 'video-url', true );
                preg_match(
                        '/[\\?\\&]v=([^\\?\\&]+)/',
                        $url,
                        $matches
                    );
                $id_video = $matches[1];
              ?>
              <?php
                if($url!=""){
              ?>
                  <iframe class="youtube" height="385" src="https://www.youtube.com/embed/<?php echo $id_video; ?>" frameborder="0" allowfullscreen></iframe>
              <?php
                }
              ?>


            </div>

            <div role="tabpanel" class="tab-pane diy_content" id="diy">

              <div id="comment-area" class="clearfix">

                <?php

                $type = 'diy';
                $args=array(
                  'post_type' => $type,
                  'post_status' => 'publish',
                  'category' => $category_post,
                  'posts_per_page' => -1,
                  'caller_get_posts'=> 1);

                $my_query = null;
                $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
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


          <div class="box_products_compare">
            <div class="tab_wrapper">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-bottom" role="tablist">
                <li role="presentation"><a href="#productline" aria-controls="home" role="tab" data-toggle="tab"><span class="flaticon-shopping122"></span>Product Line</a></li>
                <li role="presentation" class="active"><a href="#compare" aria-controls="profile" role="tab" data-toggle="tab"><span class="flaticon-balance14"></span>Compare</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content tab-content-bottom">
                <div role="tabpanel" class="tab-pane" id="productline">
                  <h2>Recommended Belkin WeMo® Products</h2>
                  <h4>Switches</h4>
                  <div class="carrousel">
                    <article class="product">
                      <figure>
                        <img src="http://www.bricolajehogar.net/images/interruptores-unipolares-conexion.jpg" alt="" />
                      </figure>
                      <div class="product_detail">
                        <div class="product_name">
                          WeMo® Insight Switch
                        </div>
                        <div class="product_code">
                          F7C020fc
                        </div>
                        <div class="product_price">
                          $55.99
                        </div>
                        <div class="product_buy">
                          <a href="#">Buy now</a>
                        </div>
                      </div>
                    </article>

                    <article class="product">
                      <figure>
                        <img src="http://www.bricolajehogar.net/images/interruptores-unipolares-conexion.jpg" alt="" />
                      </figure>
                      <div class="product_detail">
                        <div class="product_name">
                          WeMo® Insight Switch
                        </div>
                        <div class="product_code">
                          F7C020fc
                        </div>
                        <div class="product_price">
                          $55.99
                        </div>
                        <div class="product_buy">
                          <a href="#">Buy now</a>
                        </div>
                      </div>
                    </article>
                  </div><!-- end carrousel -->
                  <h4>Controllers</h4>
                  <div class="carrousel">
                    <article class="product">
                      <figure>
                        <img src="http://www.bricolajehogar.net/images/interruptores-unipolares-conexion.jpg" alt="" />
                      </figure>
                      <div class="product_detail">
                        <div class="product_name">
                          WeMo® Insight Switch
                        </div>
                        <div class="product_code">
                          F7C020fc
                        </div>
                        <div class="product_price">
                          $55.99
                        </div>
                        <div class="product_buy">
                          <a href="#">Buy now</a>
                        </div>
                      </div>
                    </article>

                    <article class="product">
                      <figure>
                        <img src="http://www.bricolajehogar.net/images/interruptores-unipolares-conexion.jpg" alt="" />
                      </figure>
                      <div class="product_detail">
                        <div class="product_name">
                          WeMo® Insight Switch
                        </div>
                        <div class="product_code">
                          F7C020fc
                        </div>
                        <div class="product_price">
                          $55.99
                        </div>
                        <div class="product_buy">
                          <a href="#">Buy now</a>
                        </div>
                      </div>
                    </article>
                  </div><!-- end carrousel -->
                  <h4>Connected Devices</h4>
                  <div class="carrousel">
                    <article class="product">
                      <figure>
                        <img src="http://www.bricolajehogar.net/images/interruptores-unipolares-conexion.jpg" alt="" />
                      </figure>
                      <div class="product_detail">
                        <div class="product_name">
                          WeMo® Insight Switch
                        </div>
                        <div class="product_code">
                          F7C020fc
                        </div>
                        <div class="product_price">
                          $55.99
                        </div>
                        <div class="product_buy">
                          <a href="#">Buy now</a>
                        </div>
                      </div>
                    </article>

                    <article class="product">
                      <figure>
                        <img src="http://www.bricolajehogar.net/images/interruptores-unipolares-conexion.jpg" alt="" />
                      </figure>
                      <div class="product_detail">
                        <div class="product_name">
                          WeMo® Insight Switch
                        </div>
                        <div class="product_code">
                          F7C020fc
                        </div>
                        <div class="product_price">
                          $55.99
                        </div>
                        <div class="product_buy">
                          <a href="#">Buy now</a>
                        </div>
                      </div>
                    </article>
                  </div><!-- end carrousel -->

                </div><!-- end productline -->
                <div role="tabpanel" class="tab-pane active" id="compare">
                  <div class="table_content">
                    <table>
                    <tbody>
                      <tr>
                        <td>Product</td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                        <td><a href=""><img src="http://www.nufronteer.com/images/external/control4.jpg" alt=""></a></td>
                      </tr>
                      <tr>
                        <td>Price and Devices:</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                        <td>$50 (motion sensor) to $100 (power strip)</td>
                      </tr>

                      <tr>
                        <td>Warrantly:</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                        <td>1-year</td>
                      </tr>

                      <tr>
                        <td colspan="6">Available Products</td>
                      </tr>

                      <tr>
                        <td>Security:</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                      </tr>

                      <tr>
                        <td>Lighting</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                        <td>Y</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

