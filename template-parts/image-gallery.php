<div class="image-gallery">
  <div class="container">
    <?php
      $images = get_field('image_gallery');
      $current_image = 1;
      $alternating_rows = 1;
      foreach( $images as $image ) {
        if( $current_image == 1 && $alternating_rows == 1 ) {
          $width_classes = "col-sm-6 col-sm-offset-1";
        } else {
          if( $current_image > 1 && $alternating_rows == 1 ) {
            $width_classes = "col-sm-4";
          }
        }
        if( $current_image == 2 && $alternating_rows == 1 || $current_image == 1 && $alternating_rows > 1 ) {
          $padding_classes = " add-padding-bottom";
        } else {
          $padding_classes = null;
        }
        if( $current_image < 3 && $alternating_rows > 1 ) {
          $width_classes = "col-sm-10 col-sm-offset-1 remove-padding";
        } else {
          if( $current_image == 3 && $alternating_rows > 1 ) {
            $width_classes = "col-sm-7 col-sm-offset-1";
          }
        }
        if( $current_image == 1 ) {
          echo '<div class="row image-gallery-row">';
        }
        ?>

        <?php if( $current_image == 1 && $alternating_rows > 1 ) { echo "<div class='col-sm-4'>"; } ?>

          <div class="gallery-image waypoint waypoint-bottom-to-top <?php echo $width_classes; echo $padding_classes; ?>">
            <img src="<?php echo $image['sizes']['post-listing']; ?>" alt="<?php echo $current_image; ?>" />
          </div>

        <?php if( $current_image == 2 && $alternating_rows > 1 ) { echo "</div>"; } ?>

        <?php
        if( $current_image == 3 ) {
          echo '</div>';
          $current_image = 1;
          if( $alternating_rows == 1 ) {
            $alternating_rows++;
          } else {
            $alternating_rows = 1;
          }
        } else {
          $current_image++;
        }
      }
    ?>
  </div>
</div>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>

    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
