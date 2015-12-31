<div class="row shortcode">
  <div class="container">
    <?php
      if( get_sub_field('content_width') == 'full' ) {
        $content_width = 'col-sm-12';
      } else {
        $content_width = 'col-md-offset-2 col-md-8'; 
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