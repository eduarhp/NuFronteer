<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

    // Slider Transitions Array
	$slider_transitions = array(
							"random" => "random",
							"sliceDown" => "sliceDown",
							"sliceDownLeft" => "sliceDownLeft",
							"sliceUp" => "sliceUp",
							"sliceUpLeft" => "sliceUpLeft",
							"sliceUpDown" => "sliceUpDown",
							"sliceUpDownLeft" => "sliceUpDownLeft",
							"fold" => "fold",
							"fade" => "fade",
							"slideInRight" => "slideInRight",
							"slideInLeft" => "slideInLeft",
							"boxRandom" => "boxRandom",
							"boxRain" => "boxRain",
							"boxRainReverse" => "boxRainReverse",
							"boxRainGrow" => "boxRainGrow",
							"boxRainGrowReverse" => "boxRainGrowReverse"
							);
	$video_types = array( "0" => "YouTube", "1" => "Vimeo", "2" => "None (Image Carousel)");	
	$showcase_types = array( "0" => "Classic (Image)", "1" => "Video/Content");	

	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "Styling Options",
						"type" => "heading");

	$options[] = array( "name" => "Show frontend theme colourpicker",
						"desc" => "Show the colour picker on the site so that you can change colours on the fly.",
						"id" => "show_colourpicker",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" =>  "Background",
						"desc" => "This will be used for the themes background, you can also provide an image (optional).",
						"id" => "background",
						"std" => $background_defaults, 
						"type" => "background");
	
	$options[] = array( "name" => "Primary Text Colour",
						"desc" => "The primary text colour that is used for links, headings, etc.",
						"id" => "primary_text_colour",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => "Secondary Text Colour",
						"desc" => "The standard text colour that is used for the body text such as descriptions and static text.",
						"id" => "secondary_text_colour", 
						"std" => "",
						"type" => "color");
					
	$options[] = array( "name" => "Font",
						"desc" => "Select the themes default font.",
						"id" => "typography",
						"std" => array('face' => 'Droid Sans'),
						"type" => "typography");

	$options[] = array( "name" => "Custom CSS",
						"desc" => "Enter your own CSS here.",
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea"); 
							
	$options[] = array( "name" => "General Options",
						"type" => "heading");

	$options[] = array( "name" => "Twitter Username",
						"desc" => "Your Twitter username, which will be used for the social icon link.",
						"id" => "twitter_username",
						"std" => "",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Facebook Page URL",
						"desc" => "Your Facebook page URL, which will be used for the social icon link.",
						"id" => "facebook_page",
						"std" => "",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Pinterest Page URL",
						"desc" => "Your Pinterest page URL, which will be used for the social icon link.",
						"id" => "pinterest_page",
						"std" => "",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "YouTube Username",
						"desc" => "Your YouTube username, which will be used for the social icon link.",
						"id" => "youtube_username",
						"std" => "",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Portfolio Page",
						"desc" => "Select the page that you have set up as your Portfolio page.",
						"id" => "view_portfolio_link",
						"type" => "select",
						"options" => $options_pages);

	$options[] = array( "name" => "Blog Page",
						"desc" => "Select the page that you have set up as your Blog page.",
						"id" => "view_blog_link",
						"type" => "select",
						"options" => $options_pages);

	$options[] = array( "name" => "Show Portfolio Item Title",
						"desc" => "Show the title of the portfolio item beneath it in portfolio sections.",
						"id" => "show_portfolio_item_title",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Show Portfolio Item Description",
						"desc" => "Show the description of the portfolio item beneath it in portfolio sections.",
						"id" => "show_portfolio_item_desc",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Portfolio Widget Items",
						"desc" => "Select how many portfolio items you would like to appear within the portfolio widget included in the page template.",
						"id" => "widget_portfolio_items",
						"std" => "3",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Blog Items Per Page",
						"desc" => "Number of blog items shown per page with the blog template.",
						"id" => "blog_items_per_page",
						"std" => "5",
						"class" => "mini",
						"type" => "text");						
						
	$options[] = array( "name" => "Footer Copyright Text",
						"desc" => "The copyright text at the bottom of the footer.",
						"id" => "footer_copyright_text",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Google Analytics ID",
						"desc" => "The ID for your Google Analytics profile.",
						"id" => "google_analytics",
						"std" => "",
						"type" => "text");	

	$options[] = array( "name" => "Homepage Options",
						"type" => "heading");

	$options[] = array( "name" => "Home Primary BG Colour",
						"desc" => "The primary bg colour for the NAV.",
						"id" => "primary_bg_colour",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => "NAV Background Opacity",
						"desc" => "Choose an opacity from 0 to 1, 0=0% 0.5 =50%, 0.8=80%, 1=100%",
						"id" => "primary_bg_opacity",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Video Selector",
						"desc" => "Select the kind of video you want.",
						"id" => "homepage_video_picker",
						"std" => "Classic (Image)",
						"type" => "select",
						"class" => "mini",
						"options" => $video_types);

	$options[] = array( "name" => "Homepage YouTube Video ",
						"desc" => "Please insert YouTube Video URL",
						"id" => "home_video_youtube",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Homepage Vimeo Video ",
						"desc" => "Please insert Vimeo Video URL",
						"id" => "home_video_vimeo",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Homepage Heading Text",
						"desc" => "The text that appears at the top of the homepage, ideal for a slogan or welcome message.",
						"id" => "homepage_heading_text",
						"std" => "",
						"type" => "textarea"); 
	
	$options[] = array( "name" => "Showcase",
						"desc" => "Show the showcase on the homepage.",
						"id" => "show_showcase",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Showcase Items",
						"desc" => "Enter how many showcase slider items you would like to appear on the homepage. Leave the field blank to show ALL items.",
						"id" => "homepage_showcase_items",
						"std" => "",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Showcase Slider Type",
						"desc" => "Select the slider you would like to use. The image slider only supports images and includes the transitions listed below, whereas the Video/Content slider allows you to embed youtube/vimeo videos, and even content within the slider.",
						"id" => "homepage_showcase_type",
						"std" => "Classic (Image)",
						"type" => "select",
						"class" => "mini",
						"options" => $showcase_types);
	
	$options[] = array( "name" => "Showcase Transition",
						"desc" => "Select the transition that the slider uses between slides. (Only works with the 'Classic (Image)' slider).",
						"id" => "homepage_showcase_transition",
						"std" => "random",
						"type" => "select",
						"class" => "mini",
						"options" => $slider_transitions);
	
	$options[] = array( "name" => "Showcase Slide Time",
						"desc" => "Enter how many seconds each slide should show for.",
						"id" => "homepage_showcase_time",
						"std" => "5",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Portfolio Items",
						"desc" => "Show the portfolio items on the homepage.",
						"id" => "show_portfolio_items",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Homepage Portfolio Items",
						"desc" => "Select how many portfolio items you would like to appear on the homepage.",
						"id" => "homepage_portfolio_items",
						"std" => "6",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Recent Posts",
						"desc" => "Show the recent posts on the homepage.",
						"id" => "show_recent_posts",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Contact Options",
						"type" => "heading");

	$options[] = array( "name" => "Email Address",
						"desc" => "The email address that the contact form will send to.",
						"id" => "contact_email_address",
						"std" => "",
						"type" => "text");
							
	return $options;
}