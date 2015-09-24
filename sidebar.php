<?php

/* ==================================================

Sidebar Template

================================================== */
?>

<aside id="sidebar">

  <section class="rating">
    <h2>IoT top 3:</h2>
    <!--<div class="rating-date">April 1, 2015</div>-->
    <div class="icons">
      <ul>
        <li><span class="flaticon-locked59"></span>security</li>
        <li class="margin_right_24"><span class="flaticon-wifi74"></span>connectivity</li>
        <li class="margin_right_24"><span class="flaticon-wrench112"></span>DIY</li>
        <li class="margin_right_24"><span class="flaticon-mark1"></span>rating</li>
        <li><span class="flaticon-dollar185"></span>cost</li>
      </ul>
    </div>
    <div class="posts">
      <?php
        $args = array( 'posts_per_page' => 3, 'post_type' => 'review' );
        $postslist = get_posts( $args );
        foreach ( $postslist as $post ) :
          setup_postdata( $post ); ?>
          <div class="post module-bars">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <?php
              $security = get_post_meta($post->ID, 'review_percentage_security', true);
              $connectivity = get_post_meta($post->ID, 'review_percentage_connectivity', true);
              $diy = get_post_meta($post->ID, 'review_percentage_diy', true);
              $rating = get_post_meta($post->ID, 'review_percentage_rating', true);
              $cost = get_post_meta($post->ID, 'review_percentage_cost', true);
            ?>
            <div class="bar bar_security" style="width: <?php echo $security."%" ?>;">
              <span><?php echo $security."%" ?></span>
            </div>
            <div class="bar bar_connectivity" style="width: <?php echo $connectivity."%" ?>;">
              <span><?php echo $connectivity."%" ?></span>
            </div>
            <div class="bar bar_diy" style="width: <?php echo $diy."%" ?>;">
              <span><?php echo $diy."%" ?></span>
            </div>
            <div class="bar bar_rating" style="width: <?php echo $rating."%" ?>;">
              <span><?php echo $rating."%" ?></span>
            </div>
            <div class="bar bar_cost" style="width: <?php echo $cost."%" ?>;">
              <span><?php echo $cost."%" ?></span>
            </div>
          </div>
        <?php
        endforeach;
        wp_reset_postdata();
      ?>
    </div>

  </section><!-- end rating -->

  <section class="sidebar_pool_section">
    <h2>Find your DIY level:</h2>
    <div class="sidebar_pool">
      <div class="pool">
        <p>I have set up a cable box to my TV</p>
        <form action="">
          <span><input type="checkbox"> I have to set up a desktop computer</span>
          <span><input type="checkbox"> I have wired lighting</span>
          <span><input type="checkbox"> I have installed an electrical box</span>
          <span><input type="checkbox"> I have built a shelving unit</span>
          <span><input type="checkbox"> I can use a jig saw</span>
          <span><input type="submit"></span>
        </form>
      </div>
      <div class="form">
        <h4>Find a handyman in your area:</h4>
        <span>Enter your zip code:</span>
        <form action="">
          <input type="input"><input type="submit">
        </form>
      </div>
    </div>
  </section>

  <section class="wheretobuy">
    <h2>Where to buy</h2>

    <div class="product clearfix">
        <div class="product-pic">
        <?php
              $thumbsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
        ?>
        <img src="<?php echo $thumbsrc[0]; ?>" alt=""/>
        </div>
        <div class="product-content">
          <div class="product-name">Belkin Netcam Wifi</div>
          <div class="product-description">Belkin WeMo NetCam HD+ Wi-Fi Camera with Night Vision, All Glass Wide Angle Lens, and Infrared Cut-off Filter</div>
        </div>
    </div>

    <h4>Stores near you</h4>

    <!-- 1st Store -->
    <section class="store">
      <h3>Bed Bath &amp; Beyond</h3>
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-7">
          <address>
            <p><i class="fa fa-map-marker"></i>410 East 61st St,<br>New-York NY</p>
            <p><i class="fa fa-phone"></i>212.333.1609</p>
            <p class="product-price"><i class="fa fa-usd"></i>49.99</p>
          </address>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5">
            <p>Opening Hours:</p>
            <p class="store-opening">Weekdays from 9:00AM to 09:00PM, Weekends from 9:30AM to 11:30PM</p>
        </div>
      </div>
    </section>

    <!-- 2nd Store -->
    <section class="store">
      <h3>Sears</h3>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7">
          <address>
            <p><i class="fa fa-map-marker"></i>1111 Franklin ave,<br>Garden City NJ</p>
            <p><i class="fa fa-phone"></i>646.215.4702</p>
            <p class="product-price"><i class="fa fa-usd"></i>52.99</p>
          </address>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5">
            <p>Opening Hours:</p>
            <p class="store-opening">Everyday from 8:00AM to 10:00PM</p>
        </div>
      </div>

    </section>

    <h4>Online Retailers</h4>

    <!-- 1st Online Retailer -->
    <section class="onlineretailers">
      <h3>Amazon</h3>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <span class="product-price"><i class="fa fa-usd"></i>45.99</span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <a href="http://www.amazon.com/Belkin-WeMo-NetCam-Infrared-Cut-off/dp/B00KNM763E?" target="_blank" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Buy here</a>
        </div>
      </div>
    </section>

    <!-- 2nd Online Retailer -->
    <section class="onlineretailers">
      <h3>NewEgg</h3>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <span class="product-price"><i class="fa fa-usd"></i>46.99</span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <a href="http://www.newegg.com/Product/Product.aspx?Item=N82E16881314011" target="_blank" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Buy here</a>
        </div>
      </div>
    </section>

  </section>

  <?php
    if (is_page_template('template-contact.php')) {

      dynamic_sidebar('Contact Sidebar');

    } else {
      dynamic_sidebar('Main Sidebar');
    }
  ?>

	<section class="about">
    <h2>About the Author</h2>
    <div class="row">
      <div class="col-xs-3 col-md-4"><?php echo get_avatar( get_the_author_email(), 'size here' ); ?></div>
      <div class="col-xs-9 col-md-8">
        <div class="author">
          <p><i class="fa fa-pencil-square-o"></i><?php echo get_the_author_meta( 'user_firstname' ); ?> <?php echo get_the_author_meta( 'user_lastname' ); ?></p>
          <p><i class="fa fa-envelope-o"></i><?php echo get_the_author_meta( 'user_email' ); ?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="author-description"><?php echo get_the_author_meta( 'description' ); ?></div>
      </div>
    </div>
	</section>

</aside>
