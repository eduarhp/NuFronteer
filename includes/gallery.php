<!-- OPEN .post-item .gallery .clear -->
<div class="post-item gallery clear" id="<?php the_ID(); ?>">	
    <?php if (is_single()) { ?>

        <span class="date-overlay"><?php the_time('M d, Y'); ?></span>

        <!-- OPEN .post-slider -->
        <div class="post-slider">
        
        <?php 
            $args = array(
                'orderby'        => 'menu_order',
                'post_type'      => 'attachment',
                'post_parent'    => get_the_ID(),
                'post_mime_type' => 'image',
                'post_status'    => null,
                'numberposts'    => -1,
            );
            $attachments = get_posts($args);
        ?>
            
            <?php if ($attachments) : ?>
            
            <?php foreach ($attachments as $attachment) : ?>
                
                <?php $src = wp_get_attachment_image_src( $attachment->ID, 'post-main-image'); ?>
                <?php $large_src = wp_get_attachment_image_src( $attachment->ID, 'showcase-image'); ?>

                <a href="<?php echo $large_src[0]; ?>" rel="prettyPhoto[pp_gal]" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
                    <img height="<?php echo $src[2]; ?>" width="<?php echo $src[1]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $src[0]; ?>" />
                </a>
            
            <?php endforeach; ?>
            
            <?php endif; ?>

        <!-- CLOSE .post-slider -->
        </div>

        <div class="overlay"> </div>

        <section class="detail-body">
            <?php the_content(); ?>
        </section>

    <?php } else { ?>

        <!-- OPEN .post-slider -->
        <div class="post-slider">
        
        <?php
            $args = array(
                'orderby'        => 'menu_order',
                'post_type'      => 'attachment',
                'post_parent'    => get_the_ID(),
                'post_mime_type' => 'image',
                'post_status'    => null,
                'numberposts'    => -1,
            );
            $attachments = get_posts($args);
        ?>
            
            <?php if ($attachments) : ?>
            
            <?php foreach ($attachments as $attachment) : ?>
                <?php if (get_current_template() == 'template-blog3.php') { ?>
                <?php $src = wp_get_attachment_image_src( $attachment->ID, 'showcase-image'); ?>
                <?php } else { ?>
                <?php $src = wp_get_attachment_image_src( $attachment->ID, 'post-main-image'); ?>
                <?php } ?>
                <?php $large_src = wp_get_attachment_image_src( $attachment->ID, 'showcase-image'); ?>

                <a href="<?php echo $large_src[0]; ?>" rel="prettyPhoto[pp_gal<?php the_ID(); ?>]" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
                    <img height="<?php echo $src[2]; ?>" width="<?php echo $src[1]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $src[0]; ?>" />
                </a>
            
            <?php endforeach; ?>
            
            <?php endif; ?>

        <!-- CLOSE .post-slider -->
        </div>

        <div class="overlay"> </div>

        <div class="heading">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title('',' ›'); ?></a></h2>
        </div>

        <div class="excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="meta"><span class="the-date"><?php the_time('F d, Y'); ?></span> <span class="the-comments"><?php comments_number( '0', '1', '%' ); ?></span></div>
        <a class="blog-view-link" href="<?php the_permalink(); ?>">view ›</a>

    <?php } ?>

	
<!-- CLOSE .post-item .gallery .clear -->
</div>