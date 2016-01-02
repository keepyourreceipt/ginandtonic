<div class="image-gallery">
  <div class="row">
    <?php
      $images = get_sub_field('image_gallery');
      $current_image = 1;
      $alternating_rows = 1;
      foreach( $images as $image ) {
        if( $current_image == 1 && $alternating_rows == 1 ) {
          $width_classes = "col-sm-8";
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
          $width_classes = "col-sm-12 remove-padding";
        } else {
          if( $current_image == 3 && $alternating_rows > 1 ) {
            $width_classes = "col-sm-8";
          }
        }
        if( $current_image == 1 ) {
          echo '<div class="container image-gallery-row">';
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
