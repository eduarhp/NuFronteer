<?php

/* ==================================================

This is where all the magic happens! If you NEED to edit this then
be VERY careful. Things can get terribly messy if this gets messed up!

================================================== */

define('SA_TEMPLATE_PATH', TEMPLATEPATH);


/* INCLUDES
================================================== */

/* Add shortcodes */
include("includes/shortcodes.php");

/* Dropdown Menu Support */
//include("includes/dropdown-menus.php");

/* Next / Previous Portfolio Support */
include("includes/ambrosite-post-link-plus.php");

/* Add update notifier */
require('update-notifier.php');

//NAV ATTR
function add_specific_menu_atts( $atts, $item, $args ) {
	$menu_items = array(12,13);
	if (in_array($item->ID, $menu_items)) {
	  $atts['data-scroll'] = 'null';
	  $atts['data-speed'] = '700';
	  $atts['data-easing'] = 'easeOutQuint';
	  $atts['data-url'] = 'false';
	}

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_atts', 10, 3 );

/* THEME OPTIONS
================================================== */

if ( !function_exists( 'optionsframework_init' ) ) {

    define('OPTIONS_FRAMEWORK_URL', SA_TEMPLATE_PATH . '/admin/');
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');

    require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

    <script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });

        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }

    });
    </script>

    <!-- LOAD CUSTOM FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Salsa" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Chivo" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Coda" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Spinnaker" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Andika" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Questrial" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Voltaire" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Actor" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Play" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Muli" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Shanti" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">

<?php }


/* THEME SUPPORT
================================================== */

add_theme_support( 'post-formats', array( 'aside', 'link', 'video', 'image', 'gallery', 'quote') );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 290, 180, true );
add_image_size( 'mini-thumb-image', 76, 76, true );
add_image_size( 'four-column-image', 215, 135, true );
add_image_size( 'related-post-image', 250, 155, true );
add_image_size( 'thumb-image', 290, 180, true );
add_image_size( 'two-column-image', 445, 276, true );
add_image_size( 'post-main-image', 630, 280, true);
add_image_size( 'showcase-image', 920, 430, true );

/* CONTENT WIDTH
================================================== */

if ( ! isset( $content_width ) ) $content_width = 630;


/* LOAD SCRIPTS
================================================== */

function sa_load_js() {
    //wp_register_script('jquery_mobile_detect', get_template_directory_uri() . '/js/detectmobilebrowser.js');
    wp_register_script('nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js');
    wp_register_script('slides', get_template_directory_uri() . '/js/slides.min.jquery.js');
    wp_register_script('hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js');
    wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js');
    wp_register_script('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js');
    wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
    wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js');
    wp_register_script('contact', get_template_directory_uri() . '/js/contact-form.js');
    wp_register_script('functions', get_template_directory_uri() . '/js/functions.js');
    wp_enqueue_script('jquery_mobile_detect');
    wp_enqueue_script('nivo');
    wp_enqueue_script('slides');
    wp_enqueue_script('hoverIntent');
    wp_enqueue_script('superfish');
    wp_enqueue_script('quicksand');
    wp_enqueue_script('prettyPhoto');
    wp_enqueue_script('validation');
    wp_enqueue_script('contact');
    wp_enqueue_script('functions');
}

add_action('init', 'sa_load_js');


/* TinyURL URL Shortening
================================================== */

function tinyURL($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    echo $data;
}



/* SHORTCODE FUNCTIONS
================================================== */

function saviour_formatter($content) {
    $new_content = '';

    /* Matches the contents and the open and closing tags */
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';

    /* Matches just the contents */
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

    /* Divide content into pieces */
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    /* Loop over pieces */
    foreach ($pieces as $piece) {
        /* Look for presence of the shortcode */
        if (preg_match($pattern_contents, $piece, $matches)) {

            /* Append to content (no formatting) */
            $new_content .= $matches[1];
        } else {

            /* Format and append to content */
            $new_content .= wptexturize(wpautop($piece));
        }
    }

    return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'saviour_formatter', 99);
add_filter('widget_text', 'saviour_formatter', 99);


/* CUSTOM MENU SETUP
================================================== */

add_action( 'after_setup_theme', 'setup_menus' );
function setup_menus() {
	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'Main_Navigation' => __( 'Header Navigation' ),
		'Footer_Navigation' => __( 'Footer Navigation' ),
    'Membership_Navigation' => __( 'Membership Navigation' )
	) );
}

/* EXCERPT LENGTH
================================================== */

function new_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');


/* REGISTER SIDEBARS
================================================== */

if ( function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=>'Main Sidebar',
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
    register_sidebar(array(
        'name'=>'Contact Sidebar',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 1',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 2',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 3',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}


/* CHECK PAGE TEMPLATE
================================================== */

add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}


/* REMOVE CERTAIN HEAD TAGS
================================================== */

add_action('init', 'remheadlink');
function remheadlink() {
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}


/* CUSTOM LOGIN LOGO
================================================== */

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; height: 120px!important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


/* COMMENTS
================================================== */

// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
		<div class="comment-content">
        	<div class="comment-meta"><?php printf(__('<a href="%2$s" class="author-link" title="Permalink to this comment"><i class="fa fa-user"></i>Posted by %1$s</a>', 'saviour'),
                    get_comment_author(),
                    '#comment-' . get_comment_ID() );
                    edit_comment_link(__('<i class="fa fa-pencil"></i>Edit', 'saviour'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
			</div>
  			<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'saviour') ?>
        	<div class="comment-body">
            	<?php comment_text() ?>
        	</div>
        	<?php // echo the comment reply link
            	if($args['type'] == 'all' || get_comment_type() == 'comment') :
                	comment_reply_link(array_merge($args, array(
                    	'reply_text' => __('Reply','saviour'),
                    	'login_text' => __('Log in to reply.','saviour'),
                    	'depth' => $depth,
                    	'before' => '<div class="comment-reply">',
                    	'after' => '</div>'
                	)));
            	endif;
        	?>
		</div>
<?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'saviour'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'saviour'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
                <?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Dropdown
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}

?>

<?php

function getPostViews($postID){ // For get post view
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) { // For set post view
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

?>

<?php
/* Convert hexdec color string to rgb(a) string */

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default;

	//Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}
?>


<?php

function posts_review() {
  $labels = array(
    'name'               => _x( 'Product Reviews', 'post type general name' ),
    'singular_name'      => _x( 'Review', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add a new Product Review' ),
    'edit_item'          => __( 'Edit Product Review' ),
    'new_item'           => __( 'New Product Review' ),
    'all_items'          => __( 'All Product Reviews' ),
    'view_item'          => __( 'View Product Review' ),
    'search_items'       => __( 'Search Product Review' ),
    'not_found'          => __( 'No Product reviews found' ),
    'not_found_in_trash' => __( 'No Product reviews found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Product Reviews'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Product Reviews',
    'public'        => true,
		'show_ui'       => true,
		'show_in_menu'  => true,
		'taxonomies' => array( 'post_tag', 'category' ),
		'hierarchical' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
    'menu_position' => null,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'has_archive'   => true,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'product-reviews' ),
  );
  register_post_type( 'review', $args );
}
add_action( 'init', 'posts_review' );

?>

<?php

function posts_diy() {
  $labels = array(
    'name'               => _x( 'DIY Articles', 'post type general name' ),
    'singular_name'      => _x( 'DIY Article', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add a new DIY Article' ),
    'edit_item'          => __( 'Edit DIY Article' ),
    'new_item'           => __( 'New DIY Article' ),
    'all_items'          => __( 'All DIY Articles' ),
    'view_item'          => __( 'View DIY Article' ),
    'search_items'       => __( 'Search DIY Articles' ),
    'not_found'          => __( 'No reviews found' ),
    'not_found_in_trash' => __( 'No reviews found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'DIY Articles'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'DIYs',
    'public'        => true,
		'show_ui'       => true,
		'show_in_menu'  => true,
		'taxonomies' => array( 'post_tag', 'category' ),
		'hierarchical' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
    'menu_position' => null,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'diys' ),
  );
  register_post_type( 'diy', $args );
}
add_action( 'init', 'posts_diy' );

add_action( 'add_meta_boxes', 'difficulty_level' );

add_action( 'add_meta_boxes', 'diy_post_videos' );

//
function difficulty_level() {
    add_meta_box(
        'difficulty_level',
        __( 'Difficulty Level', 'myplugin_textdomain' ),
        'difficulty_level_content',
        'diy',
        'normal',
        'high'
    );
}

function difficulty_level_content( $post ) {
	$difficulty_level = get_post_meta($post->ID, 'difficulty_level', true);
  wp_nonce_field( plugin_basename( __FILE__ ), 'difficulty_level_box_content_nonce' );
?>
	<label for="difficulty_level"></label>
  <input type="text" id="difficulty_level" name="difficulty_level" placeholder="enter a difficulty level" value="<?php echo $difficulty_level; ?>" />
  
<?php

}

// POST VIDEOS 

function diy_post_videos() {
    add_meta_box(
        'diy_post_videos',
        __( 'DIY Videos', 'myplugin_textdomain' ),
        'diy_post_videos_content',
        'diy',
        'normal',
        'high'
    );
}

function diy_post_videos_content( $post ) {
    $diy_video_1 = get_post_meta($post->ID, 'diy_video_1', true);
    $diy_video_2 = get_post_meta($post->ID, 'diy_video_2', true);
    $diy_video_3 = get_post_meta($post->ID, 'diy_video_3', true);

  wp_nonce_field( plugin_basename( __FILE__ ), 'diy_post_videos_box_content_nonce' );
?>
  <label for="diy_post_videos"></label>
  <p>Here you can add all the videos related to the DIY article</p>
  <p><input type="text" id="diy_video_1" name="diy_video_1" placeholder="Video URL" value='<?php echo $diy_video_1; ?>' /></p>
  <p><input type="text" id="diy_video_2" name="diy_video_2" placeholder="Video URL" value='<?php echo $diy_video_2; ?>' /></p>
  <p><input type="text" id="diy_video_3" name="diy_video_3" placeholder="Video URL" value='<?php echo $diy_video_3; ?>' /></p>

<?php

}

add_action( 'save_post', 'difficulty_level_box_save' );
function difficulty_level_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['difficulty_level_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $difficulty_level = $_POST['difficulty_level'];
  update_post_meta( $post_id, 'difficulty_level', $difficulty_level );
}

add_action( 'save_post', 'diy_post_videos_box_save' );
function diy_post_videos_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['diy_post_videos_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $diy_video_1 = $_POST['diy_video_1'];
  $diy_video_2 = $_POST['diy_video_2'];
  $diy_video_3 = $_POST['diy_video_3'];

  update_post_meta( $post_id, 'diy_video_1', $diy_video_1 );
  update_post_meta( $post_id, 'diy_video_2', $diy_video_2 );
  update_post_meta( $post_id, 'diy_video_3', $diy_video_3 );
}

?>

<?php

// Change the default POST to NEWS

function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'News Articles';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'New news';
    $submenu['edit.php'][16][0] = 'News Tags';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News Articles';
    $labels->singular_name = 'News Article';
    $labels->add_new = 'New News Article';
    $labels->add_new_item = 'Add a new News Article';
    $labels->edit_item = 'Edit News Article';
    $labels->new_item = 'New News Article';
    $labels->view_item = 'View News Article';
    $labels->search_items = 'Search News Article';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in trash';
}
add_action( 'init', 'change_post_object_label' );

?>


<?php

// POST VIDEOS 

add_action( 'add_meta_boxes', 'post_videos' );

function post_videos() {
    add_meta_box(
        'post_videos',
        __( 'Videos', 'myplugin_textdomain' ),
        'post_videos_content',
        'post',
        'normal',
        'high'
    );
}

function post_videos_content( $post ) {
    $news_video_1 = get_post_meta($post->ID, 'news_video_1', true);
    $news_video_2 = get_post_meta($post->ID, 'news_video_2', true);
    $news_video_3 = get_post_meta($post->ID, 'news_video_3', true);

  wp_nonce_field( plugin_basename( __FILE__ ), 'post_videos_box_content_nonce' );
?>
  <label for="Video URL"></label>
  <input type="text" id="news_video_1" name="news_video_1" placeholder="Video URL" value="<?php echo $news_video_1; ?>" />
  <input type="text" id="news_video_2" name="news_video_2" placeholder="Video URL" value="<?php echo $news_video_2; ?>" />
  <input type="text" id="news_video_3" name="news_video_3" placeholder="Video URL" value="<?php echo $news_video_3; ?>" />

<?php

}

add_action( 'save_post', 'post_videos_box_save' );
function post_videos_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['post_videos_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $news_video_1 = $_POST['news_video_1'];
  $news_video_2 = $_POST['news_video_2'];
  $news_video_3 = $_POST['news_video_3'];

  update_post_meta( $post_id, 'news_video_1', $news_video_1 );
  update_post_meta( $post_id, 'news_video_2', $news_video_2 );
  update_post_meta( $post_id, 'news_video_3', $news_video_3 );
}

?>





<?php

// Related Articles for POST

add_action( 'add_meta_boxes', 'post_related_article' );

function post_related_article() {
    add_meta_box(
        'post_related_article',
        __( 'Related Articles', 'myplugin_textdomain' ),
        'post_related_article_content',
        'post',
        'normal',
        'high'
    );
}

function post_related_article_content( $post ) {
    $post_article_url_1 = get_post_meta($post->ID, 'post_article_url_1', true);
    $post_article_url_2 = get_post_meta($post->ID, 'post_article_url_2', true);
    $post_article_url_3 = get_post_meta($post->ID, 'post_article_url_3', true);

  wp_nonce_field( plugin_basename( __FILE__ ), 'post_related_article_box_content_nonce' );
?>
    <label for="Video URL"></label>
  <input type="text" id="post_article_url_1" name="post_article_url_1" placeholder="Related Article 1" value="<?php echo $post_article_url_1; ?>" />
  <input type="text" id="post_article_url_2" name="post_article_url_2" placeholder="Related Article 2" value="<?php echo $post_article_url_2; ?>" />
  <input type="text" id="post_article_url_3" name="post_article_url_3" placeholder="Related Article 3" value="<?php echo $post_article_url_3; ?>" />

<?php

}

add_action( 'save_post', 'post_related_article_box_save' );
function post_related_article_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['post_videos_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $post_article_url_1 = $_POST['post_article_url_1'];
  $post_article_url_2 = $_POST['post_article_url_2'];
  $post_article_url_3 = $_POST['post_article_url_3'];

  update_post_meta( $post_id, 'post_article_url_1', $post_article_url_1 );
  update_post_meta( $post_id, 'post_article_url_2', $post_article_url_2 );
  update_post_meta( $post_id, 'post_article_url_3', $post_article_url_3 );
}

?>









<?php

// PRODUCT REVIEW - RATINGS

add_action( 'add_meta_boxes', 'review_percentage' );

function review_percentage() {
    add_meta_box(
        'review_percentage',
        __( 'Product Ratings', 'myplugin_textdomain' ),
        'review_percentage_content',
        'review',
        'normal',
        'high'
    );
}

function review_percentage_content( $post ) {
    $review_percentage_security = get_post_meta($post->ID, 'review_percentage_security', true);
    $review_percentage_connectivity = get_post_meta($post->ID, 'review_percentage_connectivity', true);
    $review_percentage_diy = get_post_meta($post->ID, 'review_percentage_diy', true);
    $review_percentage_rating = get_post_meta($post->ID, 'review_percentage_rating', true);
    $review_percentage_cost = get_post_meta($post->ID, 'review_percentage_cost', true);

  wp_nonce_field( plugin_basename( __FILE__ ), 'review_percentage_box_content_nonce' );
?>
  <label for="Product Ratings"></label>
  <p>Here you can rate the product with a score from 1 to 100. 
  <p>
    <span style="display:inline-block;width:200px">Security rating:</span>
      <input type="text" id="review_percentage_security" name="review_percentage_security" placeholder="Security" value="<?php echo $review_percentage_security; ?>" />
  </p>
  <p>
    <span style="display:inline-block;width:200px">Connectivity rating:</span>     
    <input type="text" id="review_percentage_connectivity" name="review_percentage_connectivity" placeholder="Connectivity" value="<?php echo $review_percentage_connectivity; ?>" />
  </p>
  <p>
    <span style="display:inline-block;width:200px">DIY rating:</span> 
    <input type="text" id="review_percentage_diy" name="review_percentage_diy" placeholder="DIY" value="<?php echo $review_percentage_diy; ?>" />
  </p>
  <p>
    <span style="display:inline-block;width:200px">Rating rating:</span>
    <input type="text" id="review_percentage_rating" name="review_percentage_rating" placeholder="Rating" value="<?php echo $review_percentage_rating; ?>" />
  </p>
  <p>
    <span style="display:inline-block;width:200px">Cost rating:</span>
    <input type="text" id="review_percentage_cost" name="review_percentage_cost" placeholder="Cost" value="<?php echo $review_percentage_cost; ?>" />
  </p>

<?php

}

add_action( 'save_post', 'review_percentage_box_save' );
function review_percentage_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['review_percentage_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $review_percentage_security = $_POST['review_percentage_security'];
  $review_percentage_connectivity = $_POST['review_percentage_connectivity'];
  $review_percentage_diy = $_POST['review_percentage_diy'];
  $review_percentage_rating = $_POST['review_percentage_rating'];
  $review_percentage_cost = $_POST['review_percentage_cost'];

  update_post_meta( $post_id, 'review_percentage_security', $review_percentage_security );
  update_post_meta( $post_id, 'review_percentage_connectivity', $review_percentage_connectivity );
  update_post_meta( $post_id, 'review_percentage_diy', $review_percentage_diy );
  update_post_meta( $post_id, 'review_percentage_rating', $review_percentage_rating );
  update_post_meta( $post_id, 'review_percentage_cost', $review_percentage_cost );
}

?>

<?php

// REVIEW - VIDEO 

add_action( 'add_meta_boxes', 'review_video' );

function review_video() {
    add_meta_box(
        'review_video',
        __( 'Product Video URL', 'myplugin_textdomain' ),
        'review_video_content',
        'review',
        'normal',
        'high'
    );
}

function review_video_content( $post ) {
    $review_video = get_post_meta($post->ID, 'review_video', true);

  wp_nonce_field( plugin_basename( __FILE__ ), 'review_video_box_content_nonce' );
?>
  <label for="Product Video URL"></label>
  <p>This is where you will enter the video of the Product, if it has one.</p>
  <input type="text" id="review_video" name="review_video" placeholder="Product Video URL" value='<?php echo $review_video; ?>' />
<?php

}

add_action( 'save_post', 'review_video_box_save' );
function review_video_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['review_video_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $review_video = $_POST['review_video'];

  update_post_meta( $post_id, 'review_video', $review_video );

}

?>




<?php

// REVIEW - SHORT CODE

add_action( 'add_meta_boxes', 'review_shortCode' );

function review_shortCode() {
    add_meta_box(
        'review_shortCode',
        __( 'Short code', 'myplugin_textdomain' ),
        'review_shortCode_content',
        'review',
        'normal',
        'high'
    );
}

function review_shortCode_content( $post ) {
    $review_shortCode = get_post_meta($post->ID, 'review_shortCode', true);

  wp_nonce_field( plugin_basename( __FILE__ ), 'review_shortCode_box_content_nonce' );
?>
  <label for="Product Video URL"></label>
  <p>This is where you will enter the short code of the Table, if it has one.</p>
  <input type="text" id="review_shortCode" name="review_shortCode" placeholder="Short Code" value='<?php echo $review_shortCode; ?>' />
<?php

}

add_action( 'save_post', 'review_shortCode_box_save' );
function review_shortCode_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['review_shortCode_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $review_video = $_POST['review_shortCode'];

  update_post_meta( $post_id, 'review_shortCode', $review_video );

}

?>





<?php

// SHOW VIEWS FOR POST

add_action( 'add_meta_boxes', 'post_views' );

function post_views() {
    add_meta_box(
        'post_views',
        __( 'Views', 'myplugin_textdomain' ),
        'post_views_content',
        'post',
        'normal',
        'high'
    );
}

function post_views_content( $post ) {
    echo getPostViews($post->ID); 

}

?>

<?php 
function remove_post_custom_fields() {
    remove_meta_box( 'postcustom' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );
?>


<?php

//Show in Category pages custom posts too



?>


<?php

function getMainMenu($menulocation){
  $locations = get_nav_menu_locations();
  $menuItems = wp_get_nav_menu_items( $locations[ $menulocation ] );
    if(empty($menuItems))
      return false;
    else{
      wp_nav_menu(array('theme_location' => $menulocation));
      return true;
    }
}

?>






<?php
// Recommended Products for Review Custom Post

function review_add_edit_form_multipart_encoding() {

    echo ' enctype="multipart/form-data"';

}
add_action('post_edit_form_tag', 'review_add_edit_form_multipart_encoding');

function review_render_recommended_attachment_box($post) {

    // See if there's an existing image. (We're associating images with posts by saving the image's 'attachment id' as a post meta value)
    // Incidentally, this is also how you'd find any uploaded files for display on the frontend.
    $existing_image_id = get_post_meta($post->ID,'_review_attached_image1', true);
    $review_product1_name = get_post_meta($post->ID,'_review_product1_name', true);
    $review_product1_price = get_post_meta($post->ID,'_review_product1_price', true);
    $review_product1_link = get_post_meta($post->ID,'_review_product1_link', true);


    $existing_image_id2 = get_post_meta($post->ID,'_review_attached_image2', true);
    $review_product2_name = get_post_meta($post->ID,'_review_product2_name', true);
    $review_product2_price = get_post_meta($post->ID,'_review_product2_price', true);
    $review_product2_link = get_post_meta($post->ID,'_review_product2_link', true);


    $existing_image_id3 = get_post_meta($post->ID,'_review_attached_image3', true);
    $review_product3_name = get_post_meta($post->ID,'_review_product3_name', true);
    $review_product3_price = get_post_meta($post->ID,'_review_product3_price', true);
    $review_product3_link = get_post_meta($post->ID,'_review_product3_link', true);

    echo '<p style="font-size: 18px; font-weight: bold;">Product One</p>';
    echo '<input type="text" placeholder="Product Name" name="review_product1_name" value="'.$review_product1_name.'">';
    echo '<input type="text" placeholder="Price" name="review_product1_price" value="'.$review_product1_price.'">';
    echo '<input type="text" placeholder="Link" name="review_product1_link" value="'.$review_product1_link.'">';
    echo '<p></p>';
    if(is_numeric($existing_image_id)) {

        echo '<div>';
            $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
            $existing_image_url = $arr_existing_image[0];
            echo '<img src="' . $existing_image_url . '" />';
        echo '</div>';

    }

    echo '<label for="" style="font-size: 12px">Upload an image</label> <input type="file" name="review_product1" id="review_product1" />';
    echo '<hr>';

    //////////////////////////////////////
    //Second Image
    echo '<p style="font-size: 18px; font-weight: bold;">Product Two</p>';
    echo '<input type="text" placeholder="Product Name" name="review_product2_name" value="'.$review_product2_name.'">';
    echo '<input type="text" placeholder="Price" name="review_product2_price" value="'.$review_product2_price.'">';
    echo '<input type="text" placeholder="Link" name="review_product2_link" value="'.$review_product2_link.'">';
    echo '<p></p>';
    if(is_numeric($existing_image_id2)) {

        echo '<div>';
            $arr_existing_image2 = wp_get_attachment_image_src($existing_image_id2, 'large');
            $existing_image_url2 = $arr_existing_image2[0];
            echo '<img src="' . $existing_image_url2 . '" />';
        echo '</div>';

    }

    echo '<label for="" style="font-size: 12px">Upload an image</label> <input type="file" name="review_product2" id="review_product2" />';
    echo '<hr>';


    //////////////////////////////////////
    //THIRD IMAGE
    echo '<p style="font-size: 18px; font-weight: bold;">Product Three</p>';
    echo '<input type="text" placeholder="Product name" name="review_product3_name" value="'.$review_product3_name.'">';
    echo '<input type="text" placeholder="Price" name="review_product3_price" value="'.$review_product3_price.'">';
    echo '<input type="text" placeholder="Link" name="review_product3_link" value="'.$review_product3_link.'">';
    echo '<p></p>';
    if(is_numeric($existing_image_id3)) {

        echo '<div>';
            $arr_existing_image3 = wp_get_attachment_image_src($existing_image_id3, 'large');
            $existing_image_url3 = $arr_existing_image3[0];
            echo '<img src="' . $existing_image_url3 . '" />';
        echo '</div>';

    }

    echo '<label for="" style="font-size: 12px">Upload an image</label> <input type="file" name="review_product3" id="review_product3" />';

    // Put in a hidden flag. This helps differentiate between manual saves and auto-saves (in auto-saves, the file wouldn't be passed).
    echo '<input type="hidden" name="review_manual_save_flag" value="true" />';

}



function review_setup_meta_boxes() {

    // Add the box to a particular custom content type page
    add_meta_box('review_image_box', 'Recommended Products', 'review_render_recommended_attachment_box', 'review', 'normal', 'high');

}
add_action('admin_init','review_setup_meta_boxes');


function review_update_post($post_id, $post) {

    // Get the post type. Since this function will run for ALL post saves (no matter what post type), we need to know this.
    // It's also important to note that the save_post action can runs multiple times on every post save, so you need to check and make sure the
    // post type in the passed object isn't "revision"
    $post_type = $post->post_type;

    // Make sure our flag is in there, otherwise it's an autosave and we should bail.
    if($post_id && isset($_POST['review_manual_save_flag'])) { 

        if(isset($_FILES['review_product1']) && ($_FILES['review_product1']['size'] > 0)) {

                    // Get the type of the uploaded file. This is returned as "type/extension"
                    $arr_file_type = wp_check_filetype(basename($_FILES['review_product1']['name']));
                    $uploaded_file_type = $arr_file_type['type'];

                    // Set an array containing a list of acceptable formats
                    $allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png');

                    // If the uploaded file is the right format
                    if(in_array($uploaded_file_type, $allowed_file_types)) {

                        // Options array for the wp_handle_upload function. 'test_upload' => false
                        $upload_overrides = array( 'test_form' => false ); 

                        // Handle the upload using WP's wp_handle_upload function. Takes the posted file and an options array
                        $uploaded_file = wp_handle_upload($_FILES['review_product1'], $upload_overrides);

                        // If the wp_handle_upload call returned a local path for the image
                        if(isset($uploaded_file['file'])) {

                            // The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
                            $file_name_and_location = $uploaded_file['file'];

                            // Generate a title for the image that'll be used in the media library
                            $file_title_for_media_library = 'your title here';

                            // Set up options array to add this file as an attachment
                            $attachment = array(
                                'post_mime_type' => $uploaded_file_type,
                                'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );

                            // Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
                            $attach_id = wp_insert_attachment( $attachment, $file_name_and_location );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                            wp_update_attachment_metadata($attach_id,  $attach_data);

                            // Now, update the post meta to associate the new image with the post
                            update_post_meta($post_id,'_review_attached_image1',$attach_id);



                        } else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.

                            $upload_feedback = 'There was a problem with your upload.';
                            update_post_meta($post_id,'_review_attached_image1',$attach_id);

                        }

                    } else { // wrong file type

                        $upload_feedback = 'Please upload only image files (jpg, gif or png).';
                        update_post_meta($post_id,'_review_attached_image1',$attach_id);

                    }

                } else { // No file was passed

                    $upload_feedback = false;

                }

                // Update the post meta with any feedback
                update_post_meta($post_id,'_review_attached_image_upload_feedback',$upload_feedback);


    } // End if manual save flag

    $post_type2 = $post->post_type;
    // Make sure our flag is in there, otherwise it's an autosave and we should bail.
    if($post_id && isset($_POST['review_manual_save_flag'])) { 

        // HANDLE THE FILE UPLOAD

                // If the upload field has a file in it
                if(isset($_FILES['review_product2']) && ($_FILES['review_product2']['size'] > 0)) {

                    // Get the type of the uploaded file. This is returned as "type/extension"
                    $arr_file_type2 = wp_check_filetype(basename($_FILES['review_product2']['name']));
                    $uploaded_file_type2 = $arr_file_type2['type'];

                    // Set an array containing a list of acceptable formats
                    $allowed_file_types2 = array('image/jpg','image/jpeg','image/gif','image/png');

                    // If the uploaded file is the right format
                    if(in_array($uploaded_file_type2, $allowed_file_types2)) {

                        // Options array for the wp_handle_upload function. 'test_upload' => false
                        $upload_overrides2 = array( 'test_form' => false ); 

                        // Handle the upload using WP's wp_handle_upload function. Takes the posted file and an options array
                        $uploaded_file2 = wp_handle_upload($_FILES['review_product2'], $upload_overrides2);

                        // If the wp_handle_upload call returned a local path for the image
                        if(isset($uploaded_file['file'])) {

                            // The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
                            $file_name_and_location2 = $uploaded_file2['file'];

                            // Generate a title for the image that'll be used in the media library
                            $file_title_for_media_library2= 'your title here';

                            // Set up options array to add this file as an attachment
                            $attachment2 = array(
                                'post_mime_type' => $uploaded_file_type2,
                                'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library2),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );

                            // Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
                            $attach_id2 = wp_insert_attachment( $attachment2, $file_name_and_location2 );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attach_data2 = wp_generate_attachment_metadata( $attach_id2, $file_name_and_location2 );
                            wp_update_attachment_metadata($attach_id2,  $attach_data2);

                            // Now, update the post meta to associate the new image with the post
                            update_post_meta($post_id,'_review_attached_image2',$attach_id2);


                        } else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.

                            $upload_feedback2 = 'There was a problem with your upload.';
                            update_post_meta($post_id,'_review_attached_image2',$attach_id2);

                        }

                    } else { // wrong file type

                        $upload_feedback2 = 'Please upload only image files (jpg, gif or png).';
                        update_post_meta($post_id,'_review_attached_image2',$attach_id2);

                    }

                } else { // No file was passed

                    $upload_feedback2 = false;

                }

                // Update the post meta with any feedback
                update_post_meta($post_id,'_review_attached_image_upload_feedback2',$upload_feedback2);

    } // End if manual save flag




    $post_type3 = $post->post_type;
    // Make sure our flag is in there, otherwise it's an autosave and we should bail.
    if($post_id && isset($_POST['review_manual_save_flag'])) { 

        // HANDLE THE FILE UPLOAD

                // If the upload field has a file in it
                if(isset($_FILES['review_product3']) && ($_FILES['review_product3']['size'] > 0)) {

                    // Get the type of the uploaded file. This is returned as "type/extension"
                    $arr_file_type3 = wp_check_filetype(basename($_FILES['review_product3']['name']));
                    $uploaded_file_type3 = $arr_file_type3['type'];

                    // Set an array containing a list of acceptable formats
                    $allowed_file_types3 = array('image/jpg','image/jpeg','image/gif','image/png');

                    // If the uploaded file is the right format
                    if(in_array($uploaded_file_type3, $allowed_file_types3)) {

                        // Options array for the wp_handle_upload function. 'test_upload' => false
                        $upload_overrides3 = array( 'test_form' => false ); 

                        // Handle the upload using WP's wp_handle_upload function. Takes the posted file and an options array
                        $uploaded_file3 = wp_handle_upload($_FILES['review_product3'], $upload_overrides3);

                        // If the wp_handle_upload call returned a local path for the image
                        if(isset($uploaded_file3['file'])) {

                            // The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
                            $file_name_and_location3 = $uploaded_file3['file'];

                            // Generate a title for the image that'll be used in the media library
                            $file_title_for_media_library3= 'your title here';

                            // Set up options array to add this file as an attachment
                            $attachment3 = array(
                                'post_mime_type' => $uploaded_file_type3,
                                'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library3),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );

                            // Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
                            $attach_id3 = wp_insert_attachment( $attachment3, $file_name_and_location3 );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attach_data3 = wp_generate_attachment_metadata( $attach_id3, $file_name_and_location3 );
                            wp_update_attachment_metadata($attach_id3,  $attach_data3);

                            // Now, update the post meta to associate the new image with the post
                            update_post_meta($post_id,'_review_attached_image3',$attach_id3);


                        } else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.

                            $upload_feedback3 = 'There was a problem with your upload.';
                            update_post_meta($post_id,'_review_attached_image3',$attach_id3);

                        }

                    } else { // wrong file type

                        $upload_feedback3 = 'Please upload only image files (jpg, gif or png).';
                        update_post_meta($post_id,'_review_attached_image3',$attach_id3);

                    }

                } else { // No file was passed

                    $upload_feedback3 = false;

                }

                // Update the post meta with any feedback
                update_post_meta($post_id,'_review_attached_image_upload_feedback3',$upload_feedback3);

    } // End if manual save flag

    $review_product1_name = $_POST['review_product1_name'];
    $review_product1_price = $_POST['review_product1_price'];
    $review_product1_link = $_POST['review_product1_link'];
    update_post_meta( $post_id, '_review_product1_name', $review_product1_name );
    update_post_meta( $post_id, '_review_product1_price', $review_product1_price );
    update_post_meta( $post_id, '_review_product1_link', $review_product1_link );

    $review_product2_name = $_POST['review_product2_name'];
    $review_product2_price = $_POST['review_product2_price'];
    $review_product2_link = $_POST['review_product2_link'];
    update_post_meta( $post_id, '_review_product2_name', $review_product2_name );
    update_post_meta( $post_id, '_review_product2_price', $review_product2_price );
    update_post_meta( $post_id, '_review_product2_link', $review_product2_link );

    $review_product3_name = $_POST['review_product3_name'];
    $review_product3_price = $_POST['review_product3_price'];
    $review_product3_link = $_POST['review_product3_link'];
    update_post_meta( $post_id, '_review_product3_name', $review_product3_name );
    update_post_meta( $post_id, '_review_product3_price', $review_product3_price );
    update_post_meta( $post_id, '_review_product3_link', $review_product3_link );
    
}
add_action('save_post','review_update_post',1,2);

?>
