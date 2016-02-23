<div class="hero-image">
  <?php
    $background_image = get_sub_field('background_image');
    $container_classes = "waypoint waypoint-fade ";
    $container_classes .= get_sub_field('image_height') . " ";
    $container_classes .= "background-" . get_sub_field('background_style') . " ";
    if( get_sub_field('adjust_position') ) {
      $container_classes .= "adjust-position";
    }
    if( get_sub_field('background_style') == "cover" ) {
      $background_style = 'data-parallax="scroll" data-image-src="' . $background_image['sizes']['full-hd'] . '"';
    } else {
      $background_style = 'style="background-image: url(' . $background_image['url'] . ');"';
    }
  ?>
  <div class="container-fluid parallax-window <?php echo $container_classes; ?>" <?php echo $background_style; ?>>
    <div class="image-overlay"><?php // Image overlay ?></div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <?php the_sub_field( 'text_editor' ); ?>
            <?php get_template_part( 'template', 'parts/linked-buttons' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
