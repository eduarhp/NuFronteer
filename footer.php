<!-- Footer -->
<footer id="footer" class="bg-grey-dark">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-2 dot-four">
        <div class="logo-nufronteer-vertical">NuFronteer</div>
      </div>
      <div class="col-sm-6 col-md-2 dot-four">
        <h5>About Us</h5>
        <?php
            wp_nav_menu( array('container_class' => 'menu-footer',
                'theme_location' => 'Footer_Navigation',
                'fallback_cb' => ''
                )
            );
        ?>
      </div>
      <div class="col-sm-6 col-md-2 dot-four">
        <h5>Contact Us</h5>
        <p><i class="fa fa-envelope-o"></i> <a href="mailto:info@nufronteer.com">info@nufronteer.com</a></p>
        <p>
        <?php  
          function isMobile() {
              return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
          }
          if(isMobile()) {
              echo '<i class="fa fa-phone"></i> <a href="tel://+1212.111.2222">212.111.2222</a>';
          } else {
              echo '<i class="fa fa-phone"></i> 212.111.2222';
          }			
        ?>
        </p>        
        <p>11 Broadway #2</p>
        <p>New-York, NY 10001</p>
      </div>
      <div class="col-sm-6 col-md-2 dot-four">
        <h5>Connect with Us</h5>
        <ul class="social-icons">
            <?php if (of_get_option('twitter_username') != '') { ?>
                <li><a href="http://www.twitter.com/<?php echo of_get_option('twitter_username') ?>" target="_blank" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <?php } ?>
            <?php if (of_get_option('facebook_page') != '') { ?>
                <li><a href="<?php echo of_get_option('facebook_page') ?>" target="_blank" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <?php } ?>
            <?php if (of_get_option('pinterest_page') != '') { ?>
                <li><a href="<?php echo of_get_option('pinterest_page') ?>" target="_blank"><i class="fa fa-pinterest-square fa-2x" title="LinkedIn"></i></a></li>
            <?php } ?>
            <?php if (of_get_option('youtube_username') != '') { ?>
                <li><a href="<?php echo of_get_option('youtube_username') ?>" target="_blank"><i class="fa fa-youtube-square fa-2x" title="LinkedIn"></i></a></li>
            <?php } ?>			
        </ul>
      </div>
      <div class="col-sm-6 col-md-2 dot-four">
        <h5>Membership</h5>
        <?php
            wp_nav_menu( array('container_class' => 'menu-footer',
                'theme_location' => 'Membership_Navigation',
                'fallback_cb' => ''
                )
            );
        ?>
      </div>
    </div>
  </div>
  <div class="text-center">&copy; <?php echo date("Y") ?> NuFronteer, Inc - <a href="#">Privacy</a> - <a href="#">Terms</a></div>
</footer>

</div>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
<script src="http://www.jasny.net/bootstrap/dist/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>

<script>
  //var controller;
  jQuery(document).ready(function($) {

    $('.home p:empty').remove();
    
	});
</script>

<!-- WordPress Footer Hook -->
<?php wp_footer(); ?>

<!-- OPEN Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXXXX-X', 'auto');
  ga('send', 'pageview');

</script>
<!-- CLOSE Google Analytics -->

<!-- CLOSE body -->
</body>

<!-- CLOSE html -->
</html>