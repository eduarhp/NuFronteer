<?php

/* SETUP THE COMMENTS SECTION
   ================================================== */

?>
<div id="comments">
  <?php
      $req = get_option('require_name_email'); // Checks if fields are required.
      if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
          die ( 'Please do not load this page directly. Thanks!' );
      if ( ! empty($post->post_password) ) :
          if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
  ?>
    <div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'saviour') ?></div>
  </div><!-- .comments -->
  <?php
          return;
      endif;
  endif;
 

/* DISPLAY THE COMMENTS
   ================================================== */

if ( have_comments() ) :
 	
	$ping_count = $comment_count = 0;
	foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;

	if ( ! empty($comments_by_type['comment']) ) : ?>
		<div id="comments-list" class="comments">
	    	<h3><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></h3>

			<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
				<div id="comments-nav-above" class="comments-navigation">
					<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
				</div><!-- #comments-nav-above -->
			<?php endif; ?>                   
			<ol>
				<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
			</ol>
			<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
				<div id="comments-nav-below" class="comments-navigation">
					<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
				</div><!-- #comments-nav-below -->
			<?php endif; ?>                   
		</div><!-- #comments-list .comments -->
	<?php endif; /* if ( $comment_count ) */

 /* DISPLAY THE TRACKBACKS
   ================================================== */

	if ( ! empty($comments_by_type['pings']) ) : ?>
 
		<div id="trackbacks-list" class="comments">
		    <h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'saviour') : __('<span>One</span> Trackback', 'saviour'), $ping_count) ?></h3>
		    <ol>
				<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
		    </ol>             
		</div><!-- #trackbacks-list .comments -->           
	<?php endif /* if ( $ping_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>
 
<?php

/* COMMENT ENTRY FORM
   ================================================== */

?>

<?php if ( 'open' == $post->comment_status ) : ?>
  <?php 
    $comments_args = array(
          // change the title of send button 
          'label_submit'=>'Send',
          // change the title of the reply section
          'title_reply'=>'Write a Reply or Comment',
          // remove "Text or HTML to be displayed after the set of comment fields"
          'comment_notes_after' => '',
          // redefine your own textarea (the comment body)
          'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
          'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s"><i class="fa fa-user"></i>%2$s</a>. <a href="%3$s" title="Log out of this account"><i class="fa fa-sign-out"></i>Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',
  );
  
  comment_form($comments_args);
  ?>
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
</div><!-- #comments -->