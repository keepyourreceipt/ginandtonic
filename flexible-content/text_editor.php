<?php
  get_sub_field('background_color') == "light" ? $classes = " light " : $classes = " dark ";
  get_sub_field('padding_top') == "non-padded" ? $classes .= " remove-padding-top" : $classes .= " default-padding-top";
  get_sub_field('padding_bottom') == "non-padded" ? $classes .= " remove-padding-bottom" : $classes .= " default-padding-bottom";

  get_sub_field('content_width') == "full" ? $width_classes = "col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" : $width_classes = "col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3";
?>
<div class="text-editor">
  <div class="container-fluid waypoint waypoint-bottom-to-top <?php echo $classes; ?>">
    <div class="row">
      <div class="<?php echo $width_classes; ?>">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</div>
