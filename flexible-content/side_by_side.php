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
      <div class="col-sm-5 col-sm-offset-1 image-column waypoint waypoint-left-to-right" <?php echo $inline_styles; ?>>
        <?php // Displaying background image ?>
      </div>
      <div class="col-sm-5 text-column waypoint waypoint-right-to-left">
        <?php the_sub_field( 'text_content' ); ?>
      </div>
    </div>
    <?php } else { ?>
      <div class="row uniform-col-height">
        <div class="col-sm-12 image-column visible-xs waypoint waypoint-left-to-right" <?php echo $inline_styles; ?>>
          <?php // Displaying background image ?>
        </div>
        <div class="col-sm-5 col-sm-offset-1 text-column waypoint waypoint-left-to-right">
          <?php the_sub_field( 'text_content' ); ?>
        </div>
        <div class="col-sm-5 image-column hidden-xs waypoint waypoint-right-to-left" <?php echo $inline_styles; ?>>
          <?php // Displaying background image ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
