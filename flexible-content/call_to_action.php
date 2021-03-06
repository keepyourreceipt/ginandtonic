<?php
  if( get_sub_field('image_orientation') == "Display image on the left" ) {
    $image_orientation = "left";
  } else {
    $image_orientation = "right";
  }
  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }
?>
<section class="container-fluid" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="row hidden-xs hidden-sm call-to-action">
    <?php $featured_image_obj = get_sub_field('featured_image'); ?>
    <?php if( $image_orientation == "left" ) { ?>
      <div class="uniform-col-height">
        <div class="col-sm-12 col-md-6 background-image waypoint waypoint-left-to-right" style="background-image: url(<?php echo $featured_image_obj['sizes']['full-hd']; ?>);">
          <?php // Background image container ?>
        </div>
        <div class="col-md-6 waypoint waypoint-right-to-left anim-time-medium">
          <div class="text-content">
            <?php the_sub_field('text_editor'); ?>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="row uniform-col-height">
        <div class="col-md-6 left waypoint waypoint-left-to-right anim-time-medium">
          <div class="text-content">
            <?php the_sub_field('text_editor'); ?>
          </div>
        </div>
        <div class="col-sm-6 hidden-xs background-image waypoint waypoint-right-to-left" style="background-image: url(<?php echo $featured_image_obj['sizes']['full-hd']; ?>);">
          <?php // Background image container ?>
        </div>
      </div>
    <?php } ?>
  </div>
</section>

<section class="hidden-md hidden-lg hidden-xl call-to-action-mobile">
  <div class="container-fluid background-image waypoint waypoint-left-to-right" style="background-image: url(<?php echo $featured_image_obj['sizes']['full-hd']; ?>);">
    <?php // Background image container ?>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 waypoint waypoint-right-to-left anim-time-medium">
        <div class="text-content text-center">
          <?php the_sub_field('text_editor'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
