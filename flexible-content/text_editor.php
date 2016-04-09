<?php
  get_sub_field('background_color') == "light" ? $classes = "light " : $classes = "dark ";
  get_sub_field('spacing_bottom') == "non-padded" ? $classes .= "content-row-padded-top" : $classes .= "content-row-padded";
?>
<div class="text-editor">
  <div class="container-fluid waypoint waypoint-bottom-to-top <?php echo $classes; ?>">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</div>
