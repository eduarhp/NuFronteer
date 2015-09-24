<?php

/* ==================================================

Showcase Post Type Functions

================================================== */

    
add_action('init', 'showcase_register');  
  
function showcase_register() {  
    $args = array(  
        'label' => __('Showcase'),  
        'singular_label' => __('slide'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
  
    register_post_type( 'showcase' , $args );  
}  

add_action("admin_init", "showcase_meta_box");   


function showcase_meta_box(){  
    add_meta_box("slide-info-meta", "Slide Options", "showcase_meta_options", "showcase", "side", "low");  
}  
  

function showcase_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
        $link = $custom["slide-link"][0];
        $youtube = $custom["slide-youtube"][0];
        $vimeo = $custom["slide-vimeo"][0];
?>  

	<div class="field" style="margin-top: 5px;">
		<label style="float: left;padding-top: 7px;width: 110px;">Link:</label>
		<input style="width: 130px;" name="slide-link" value="<?php echo $link; ?>" />
	</div>
    <div class="field" style="margin-top: 5px;">
        <label style="float: left;padding-top: 7px;width: 110px;">YouTube Video ID:</label>
        <input style="width: 130px;" name="slide-youtube" value="<?php echo $youtube; ?>" />
    </div>
    <div class="field" style="margin-top: 5px;">
        <label style="float: left;padding-top: 7px;width: 110px;">Vimeo Video ID:</label>
        <input style="width: 130px;" name="slide-vimeo" value="<?php echo $vimeo; ?>" />
    </div>
<?php  
    }  
    
add_action('save_post', 'save_slide_link'); 
  
function save_slide_link(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
		return $post_id;
	}else{
    	update_post_meta($post->ID, "slide-link", $_POST["slide-link"]);
        update_post_meta($post->ID, "slide-youtube", $_POST["slide-youtube"]);
        update_post_meta($post->ID, "slide-vimeo", $_POST["slide-vimeo"]);
    } 
}  

add_filter("manage_edit-showcase_columns", "slide_edit_columns");   
  
function slide_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Slide",
            "link" => "Link",
            "youtube" => "YouTube",
            "vimeo" => "Vimeo"
        );  
  
        return $columns;  
}  

add_action("manage_posts_custom_column",  "slide_custom_columns"); 
  
function slide_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
        	case "link":  
                $custom = get_post_custom();  
                echo $custom["slide-link"][0];  
                break;
            case "youtube":  
                $custom = get_post_custom();  
                echo $custom["slide-youtube"][0];  
                break;
            case "vimeo":  
                $custom = get_post_custom();  
                echo $custom["slide-vimeo"][0];  
                break;  
        }  
}  

?>