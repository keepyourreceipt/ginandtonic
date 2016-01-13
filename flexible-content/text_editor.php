<?php
  $style = "style='";
  get_sub_field('background_color') == "light" ? $style .= "background-color: #ffffff; " : $style .= "background-color: #F0EEF1; ";
  get_sub_field('spacing_bottom') == "non-padding" ? $style .= "padding-top: 5vh; padding-bottom: 2vh; " : $style .= "padding-top: 10vh; padding-bottom: 10vh; ";
  $style .= "'";
?>
<div class="text-editor">
  <div class="jumbotron waypoint waypoint-bottom-to-top" <?php echo $style; ?>>
    <div class="container">
      <div class="col-sm-12">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</div>
