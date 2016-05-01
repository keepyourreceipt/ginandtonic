<?php
  get_sub_field('padding_top') == "non-padded" ? $padding_classes .= " remove-padding-top" : $padding_classes .= " default-padding-top";
  get_sub_field('padding_bottom') == "non-padded" ? $padding_classes .= " remove-padding-bottom" : $padding_classes .= " default-padding-bottom";
  get_sub_field('content_width') == "full" ? $width_classes = "col-md-10 col-md-offset-1" : $width_classes = "col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2";
  $background_color = get_sub_field( 'background_color' );
  $text_color = get_sub_field( 'text_color' );
?>
<section class="text-editor" style="background-color: <?php echo $background_color; ?>; color: <?php echo $text_color; ?>;">
  <div class="container waypoint waypoint-bottom-to-top <?php echo $padding_classes; ?>">
    <div class="row">
      <div class="<?php echo $width_classes; ?>">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</section>
