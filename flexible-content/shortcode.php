<div class="shortcode">
  <div class="container">
    <div class="row">
      <?php
        if( get_sub_field('content_width') == 'full' ) {
          $content_width = 'col-sm-12';
        } else {
          $content_width = 'col-sm-offset-1 col-sm-10';
        }
      ?>
      <div class="<?php echo $content_width; ?>">
        <?php
            $shortcode = get_sub_field('shortcode');
            echo do_shortcode( $shortcode );
          ?>
      </div>
    </div>
  </div>
</div>
