
</div> <?php // Page content ?>
  <footer class="jumbotron">
    <div class="container">
      <div class="col-sm-3 footer-copyright">
        <?php if( get_field('copyright_statement', 'option') ) { ?>
          <span><?php the_field('copyright_statement', 'option'); ?> <?php echo date("Y") ?></span>
        <?php } ?>
      </div>
      <div class="col-sm-6 footer-social-media">
        <?php if( get_field('facebook', 'option') ) { ?>
          <a href="<?php the_field('facebook', 'option'); ?>" target="_blank">
            <i class="fa fa-facebook-official"></i>
          </a>
        <?php } ?>
        <?php if( get_field('twitter', 'option') ) { ?>
          <a href="<?php the_field('twitter', 'option'); ?>" target="_blank">
            <i class="fa fa-twitter-square"></i>
          </a>
        <?php } ?>
        <?php if( get_field('pinterest', 'option') ) { ?>
          <a href="<?php the_field('pinterest', 'option'); ?>" target="_blank">
            <i class="fa fa-pinterest"></i>
          </a>
        <?php } ?>
        <?php if( get_field('youtube', 'option') ) { ?>
          <a href="<?php the_field('youtube', 'option'); ?>" target="_blank">
            <i class="fa fa-youtube-play"></i>
          </a>
        <?php } ?>
      </div>
      <div class="col-sm-3 footer-back-to-top">
        <a data-animate-scroll href="#">
          Back to Top
        </a>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>
