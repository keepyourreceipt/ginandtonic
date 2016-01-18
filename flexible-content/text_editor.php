<?php
  get_sub_field('background_color') == "light" ? $classes = "light " : $classes = "dark ";
  get_sub_field('spacing_bottom') == "non-padding" ? $classes .= "content-row-non-padded" : $classes .= "content-row-padded";
  get_sub_field( 'content_width' ) == "full" ? $width_classes = "col-sm-12" : $width_classes = "col-sm-10 col-sm-offset-1";
?>
<div class="text-editor">
  <div class="jumbotron waypoint waypoint-bottom-to-top <?php echo $classes; ?>">
    <div class="container">
      <div class="<?php echo $width_classes; ?>">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</div>
