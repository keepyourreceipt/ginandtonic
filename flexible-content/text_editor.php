<?php
  $background_color = get_sub_field( 'background_color' );
  $text_color = get_sub_field( 'text_color' );

  $padding_classes = ['padding-top' => 'default-padding-top', 'padding-bottom' => 'default-padding-bottom'];
  if( get_sub_field('padding_top') == "non-padded" ) {
    $padding_classes['padding-top'] = "remove-padding-top";
  }
  if( get_sub_field('padding_bottom') == "non-padded" ) {
    $padding_classes['padding-bottom'] = "remove-padding-bottom";
  }

  if( get_sub_field( 'content_width' ) == "full" ) {
    $width_classes = "col-md-10 col-md-offset-1";
  } else {
    $width_classes = "col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2";
  }

  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }
?>
<section class="text-editor" style="background-color: <?php echo $background_color; ?>; color: <?php echo $text_color; ?>;" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="container waypoint waypoint-bottom-to-top <?php echo implode(' ', $padding_classes); ?>">
    <div class="row">
      <div class="<?php echo $width_classes; ?>">
        <?php the_sub_field('content_editor'); ?>
      </div>
    </div>
  </div>
</section>
