<div class="side-by-side">
  <div class="container">
    <?php
      $featured_image = get_sub_field( 'side_by_side_featured_image' );
      $inline_styles = "style='";
      $inline_styles .= "background-image: url(" . $featured_image['sizes']['full-hd'] . "); ";
      $inline_styles .= "'";
      $image_position = get_sub_field( 'image_position' );
      if( $image_position == "left" ) {
    ?>
    <div class="row uniform-col-height">
      <div class="col-md-5 col-md-offset-1 image-column left waypoint waypoint-left-to-right anim-time-medium" <?php echo $inline_styles; ?>>
        <?php // Displaying background image ?>
      </div>
      <div class="col-md-5 text-column right waypoint waypoint-right-to-left">
        <?php the_sub_field( 'text_content' ); ?>
      </div>
    </div>
    <?php } else { ?>
      <div class="row uniform-col-height">
        <div class="col-sm-12 image-column visible-xs waypoint waypoint-right-to-left" <?php echo $inline_styles; ?>>
          <?php // Displaying background image ?>
        </div>
        <div class="col-md-5 col-md-offset-1 text-column left waypoint waypoint-left-to-right anim-time-medium">
          <?php the_sub_field( 'text_content' ); ?>
        </div>
        <div class="col-md-5 image-column hidden-xs right waypoint waypoint-right-to-left" <?php echo $inline_styles; ?>>
          <?php // Displaying background image ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
