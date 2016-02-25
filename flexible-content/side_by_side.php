<div class="side-by-side">
  <div class="container">
    <?php
      $featured_image = get_sub_field( 'side_by_side_featured_image' );
      $inline_styles = "style='";
      $inline_styles .= "background-image: url(" . $featured_image['sizes']['large'] . "); ";
      $inline_styles .= "'";
      $image_position = get_sub_field( 'image_position' );
      if( $image_position == "left" ) {
    ?>
    <div class="row uniform-col-height">
      <div class="col-sm-6 image-column left waypoint waypoint-left-to-right anim-time-medium" <?php echo $inline_styles; ?>>
        <?php // Displaying background image ?>
      </div>
      <div class="col-sm-6 text-column right waypoint waypoint-left-to-right">
        <?php the_sub_field( 'text_content' ); ?>
      </div>
    </div>
    <?php } else { ?>
      <div class="row uniform-col-height">
        <div class="col-sm-12 image-column visible-xs waypoint waypoint-left-to-right" <?php echo $inline_styles; ?>>
          <?php // Displaying background image ?>
        </div>
        <div class="col-sm-6 text-column left waypoint waypoint-left-to-right anim-time-medium">
          <?php the_sub_field( 'text_content' ); ?>
        </div>
        <div class="col-sm-6 image-column hidden-xs right waypoint waypoint-left-to-right" <?php echo $inline_styles; ?>>
          <?php // Displaying background image ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
