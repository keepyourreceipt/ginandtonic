<?php
  if( get_sub_field('background_color') == "light" ) {
    $background_color = "#ffffff";
  } else {
    $background_color = "#F0EEF1";
  }

  if( get_sub_field('spacing_bottom') == "non-padding" ) {
    $padding_bottom = "padding-bottom: 5vh";
  } else {
    $padding_bottom = null;
  }
?>
<div class="text-editor">
  <div class="jumbotron waypoint waypoint-bottom-to-top" style="background-color: <?php echo $background_color; ?>; <?php echo $padding_bottom; ?>">
    <div class="container">
      <div class="col-sm-12">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</div>
