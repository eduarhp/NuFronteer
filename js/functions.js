/* ==================================================

Custom jQuery functions.

================================================== */

jQuery(document).ready(function() {

    if(!jQuery.browser.mobile) {

        /////////////////////////////////////////////
        // Post Slider
        /////////////////////////////////////////////

        if(jQuery().nivoSlider ) {
            jQuery('.post-slider').nivoSlider({
                effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
                slices: 15, // For slice animations
                boxCols: 8, // For box animations
                boxRows: 4, // For box animations
                animSpeed: 500, // Slide transition speed
                pauseTime: 4000, // How long each slide will show
                startSlide: 0, // Set starting Slide (0 index)
                directionNav: false, // Next & Prev navigation
                directionNavHide: true, // Only show on hover
                controlNav: false, // 1,2,3... navigation
                controlNavThumbs: false, // Use thumbnails for Control Nav
                controlNavThumbsFromRel: true, // Use image rel for thumbs
                controlNavThumbsSearch: '.jpg', // Replace this with...
                controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
                keyboardNav: false, // Use left & right arrows
                pauseOnHover: false, // Stop animation while hovering
                manualAdvance: false, // Force manual transitions
                captionOpacity: 0, // Universal caption opacity
                borderRadius: 0
            });
        };


        /////////////////////////////////////////////
        // Pretty Photo
        /////////////////////////////////////////////

        jQuery("a[rel^='prettyPhoto']").prettyPhoto();
    
    }


    /////////////////////////////////////////////
    // Navigation Hover Function
    /////////////////////////////////////////////

    jQuery('#main-navigation ul').superfish({
        delay: 150,
        animation: {opacity:'show', height:'show'},
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });
    

    /////////////////////////////////////////////
    // Image Hover Function
    /////////////////////////////////////////////

    jQuery('.hover-image img, .post-slider, .slider-hover').live({
     mouseenter: function() { 
       $(this).stop().fadeTo(300, 0.3);
     },
     mouseleave: function() {
       $(this).stop().fadeTo(400, 1);
     }
    });


    /////////////////////////////////////////////
    // Portfolio Sorting Function
    /////////////////////////////////////////////

    (function($) {

        $.fn.sorted = function(customOptions) {
            var options = {
              reversed: false,
              by: function(a) { return a.text(); }
            };

            $.extend(options, customOptions);

            $data = $(this);
            arr = $data.get();

            return $(arr);
    
        };

    })(jQuery);

    jQuery(function() {

        var read_button = function(class_names) {
            
            var r = {
                selected: false,
                type: 0
            };
            
            for (var i=0; i < class_names.length; i++) {
                
                if (class_names[i].indexOf('selected-') == 0) {
                    r.selected = true;
                }
            
                if (class_names[i].indexOf('segment-') == 0) {
                    r.segment = class_names[i].split('-')[1];
                }
            };
            
            return r;
            
        };
    
        var sort = function($buttons) {
            var $selected = $buttons.parent().filter('[class*="selected"]');
            return $selected.find('a').attr('data-value');
        };

        // get the first collection
        var $portfolio_items = jQuery('.portfolio-items');

        // clone applications to get a second collection
        var $data = $portfolio_items.clone();

        var $filter_selection = jQuery('#portfolio-filter')

        $filter_selection.each(function(i) {

            var $selection = jQuery(this);
            var $buttons = $selection.find('a');

            $buttons.bind('click', function(e) {
        
                var $button = jQuery(this);
                var $button_container = $button.parent();
                var button_properties = read_button($button_container.attr('class').split(' '));
                var selected = button_properties.selected;

                if (!selected) {

                    $buttons.parent().removeClass();
                    $button_container.addClass('selected');

                    var sorting = sort($filter_selection.eq(0).find('a'));

                    if (sorting == 'all') {
                        var $filtered_data = $data.find('li');
                    } else {
                        var $filtered_data = $data.find('li.' + sorting);
                    }

                    var $sorted_data = $filtered_data.sorted({
                        by: function(v) {
                            return $(v).find('strong').text().toLowerCase();
                        }
                    });

                    $portfolio_items.quicksand($sorted_data, {
                      duration: 400,
                      adjustHeight: 'dynamic',
                      easing: 'swing'
                    });
        
                }
            
                e.preventDefault();

            });
        });

    });
    

});