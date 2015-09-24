<?php get_header(); ?>

<!-- OPEN .main-wrap -->
<section class="main-wrap">

	<div class="heading">	
		<h1>Page Not Found</h1>
		<ul class="social-icons">
			<?php if (of_get_option('twitter_username') != '') { ?>
				<li class="twitter"><a href="http://www.twitter.com/<?php echo of_get_option('twitter_username') ?>">Twitter</a></li>
			<?php } ?>
			<?php if (of_get_option('facebook_page') != '') { ?>
				<li class="facebook"><a href="<?php echo of_get_option('facebook_page') ?>">Facebook</a></li>
			<?php } ?>
			<?php if (of_get_option('google_plus_page') != '') { ?>
				<li class="google-plus"><a href="<?php echo of_get_option('google_plus_page') ?>">Google+</a></li>
			<?php } ?>
			<?php if (of_get_option('forrst_username') != '') { ?>
				<li class="forrst"><a href="http://www.forrst.com/<?php echo of_get_option('forrst_username') ?>">Forrst</a></li>
			<?php } ?>
			<?php if (of_get_option('dribbble_username') != '') { ?>
				<li class="dribbble"><a href="http://www.dribbble.com/<?php echo of_get_option('dribbble_username') ?>">Dribbble</a></li>
			<?php } ?>
		</ul>
	</div>

	<!-- OPEN #not-found -->
	<section id="not-found" class="main-column">
		
		<div class="entry">
			<p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>.</p>
		</div>
		
	<!-- CLOSE #not-found -->
	</section>
		
	<!-- WordPress Hook -->
	<?php get_sidebar(); ?>

<!-- CLOSE .main-wrap -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>