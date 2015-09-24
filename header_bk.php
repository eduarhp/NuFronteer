<!DOCTYPE html>

<!-- OPEN html -->
<html <?php language_attributes(); ?>>

<!-- Wordpress Theme designed and coded by NuFronteer Development Team | nufronteer.com -->

<head>

	<!-- Site Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    
  <!-- viewport settings -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<!-- Site Title -->
	<title>
  <?php 
    $url = $_SERVER['REQUEST_URI'];
    if($url=="/"){
      echo "NuFronteer";
    }else{
      echo "NuFronteer | ";
      $string = wp_title("");
    }
  ?>
  </title>
	<!-- Pingback & Favicon -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php /*?><link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
	<link type="image/x-icon" rel="icon" href="/favicon.png"><?php */?>
	
	<?php $isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad'); ?>

	<!-- LOAD Stylesheets -->
    
  <link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo bloginfo( 'stylesheet_url' ); ?>" />

  <!-- Custom styles for this template -->
  <link href="<?php echo bloginfo('template_directory'); ?>/css/nav-bootstrap.css" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="http://code.jquery.com/jquery.min.js"></script>

  <!-- LOAD Font -->
  <?php $typography = of_get_option('typography');
    if ($typography) {
    $typography_name = str_replace(" ", "+", $typography['face']);
    echo '<link href="http://fonts.googleapis.com/css?family=' . $typography_name . '" rel="stylesheet" type="text/css">';
  } ?>

  <!-- LOAD Fonts -->
  <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
  <link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">



	<style>

		<?php $primary_bg_colour = of_get_option('primary_bg_colour');
 
		if ($primary_bg_colour) {
        $color = of_get_option('primary_bg_colour');
        $opacity = of_get_option('primary_bg_opacity');
        $rgb = hex2rgba($color);
        $rgba = hex2rgba($color, $opacity);
		    echo '.navbar-header, .navbar-branding { background-color: '.$rgba.';}';
		} ?>
				
	</style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- WordPress Hook -->
<?php wp_head(); ?>
	
<!-- CLOSE head -->
</head>

<!-- OPEN Body -->
<body <?php body_class(); ?>>


</div>

<?php
if (is_front_page() || is_category() )
{?>

<div id="MobileMenu" class="MobileMenu">
  <?php

  $defaults = array(
    'theme_location'  => 'Main_Navigation',
    'menu'            => '',
    'container'       => 'nav',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => 'Nav',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 3,
    'walker'          => ''
  );

  wp_nav_menu( $defaults );

?>
</div>

<div class="wrapperMain">

<!-- FRONT PAGE -->
<header id="header-home" class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- Navbar -->        
      <nav class="navbar navbar-inverse navbar-static-top clearfix">
        <div class="navbar-branding bg-blue-light">
          <div id="btn-mobileMenu" class="btn-mobileMenu" data-attr="off">
            <span class="">☰</span>
          </div>
          <a class="logo-nufronteer" href="<?php bloginfo('url'); ?>">NuFronteer</a>
        </div>
        <div id="NavigationMain" class="NavigationMain container">
          <?php

            $defaults = array(
              'theme_location'  => 'Main_Navigation',
              'menu'            => '',
              'container'       => 'nav',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'Nav',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'           => 3,
              'walker'          => ''
            );

            wp_nav_menu( $defaults );

          ?>
        </div>
      </nav>
     </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="box-marquees bg-grey-light">
      
        <!-- Navbar -->        
        <!-- <nav class="navbar navbar-inverse navbar-static-top clearfix">
          <div class="navbar-header bg-blue-light">           
            <div class="center-button">
              <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <a class="logo-nufronteer" href="<?php bloginfo('url'); ?>">NuFronteer</a>          
          </div>
          <div class="navbar-branding bg-blue-light">
            <a class="logo-nufronteer" href="<?php bloginfo('url'); ?>">NuFronteer</a>
          </div>
        </nav>  -->
        
        <?php 
          if (of_get_option('homepage_video_picker') == 0) {
            //store the URL into a variable
            $url = of_get_option('home_video_youtube');
            
            //extract the ID
            preg_match(
                '/[\\?\\&]v=([^\\?\\&]+)/',
                $url,
                $matches
              );
              
            //the ID of the YouTube URL: x6qe_kVaBpg
            $id = $matches[1];
            
            //set a custom width and height
            $width = '100%';
            $height = '100%';
            
            //echo the embed code. You can even wrap it in a class
            echo '<iframe class="dt-youtube" width="' .$width. '" height="'.$height.'" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
          } elseif (of_get_option('homepage_video_picker') == 1) {
            //store the URL into a variable
            $url = of_get_option('home_video_vimeo');
            
            //extract the ID
            preg_match(
                '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',
                $url,
                $matches
              );
              
            //the ID of the Vimeo URL: 71673549 
            $id = $matches[2];	
            
            //set a custom width and height
            $width = '100%';
            $height = '100%';	
            
            //echo the embed code and wrap it in a class
            echo '<iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
          } else {
             echo do_shortcode('[image-carousel]');
          }
        ?>
        
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-description bg-grey-dark">
        <div class="description">
            <?php if (is_front_page()) { ?>
            <h1>NuFronteer and the Internet of Things Revolution</h1>
            <?php } else { ?>
            <?php 
              //$category_var = get_the_category();
              //$firstCategory = $category_var[0]->cat_name;
            ?>
            <h1><?php single_term_title(); ?></h1>
            <?php } ?>

            <?php if (is_front_page()) { ?>
            <p>The Internet of Things (IoT) is more than just connecting devices, it's a revolution which will change the way we live.</p>
            
            <?php } else { ?>
            <?php 
              $category_var = get_the_category();
              $firstCategory = $category_var[0]->cat_name;
            ?>
            <p><?php echo category_description(); ?> </p>
            <?php } ?>

        </div>
        <div class="cta">
          <a href="#">Learn More<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
        </div>
      </div>
    </div>    
  </div>
</header>

<?php } else { ?>

<div id="MobileMenu" class="MobileMenu">
  <?php

  $defaults = array(
    'theme_location'  => 'Main_Navigation',
    'menu'            => '',
    'container'       => 'nav',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => 'Nav',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 3,
    'walker'          => ''
  );

  wp_nav_menu( $defaults );

?>
</div>
<!-- REGULAR PAGE -->
<header id="header" class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- Navbar -->        
      <div class="navbar-branding bg-blue-light">
          <div id="btn-mobileMenu" class="btn-mobileMenu" data-attr="off">
            <span class="">☰</span>
          </div>
          <a class="logo-nufronteer" href="<?php bloginfo('url'); ?>">NuFronteer</a>
        </div>
        <div id="NavigationMain" class="NavigationMain container">
          <?php

            $defaults = array(
              'theme_location'  => 'Main_Navigation',
              'menu'            => '',
              'container'       => 'nav',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'Nav',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'           => 3,
              'walker'          => ''
            );

            wp_nav_menu( $defaults );

          ?>
        </div>
     </div>
  </div>
</header>

<?php } ?>

<section class="advertising-vertical">
  <div class="banner-728x90">Advertisement</div>
</section>