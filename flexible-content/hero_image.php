<div class="hero-image">
  <?php
    $background_image = get_sub_field('background_image');
    $container_classes = "waypoint waypoint-fade ";
    if( get_sub_field( 'background_style' ) == "cover" ) {
      $container_classes .= "background-cover";
    } else {
      $container_classes .= "background-repeate";
    }
    if( get_sub_field( 'image_height' ) == "short" ) {
      $classes .= "short ";
    }
    if( get_sub_field( 'image_height' ) == "tall" ) {
      $classes .= "tall ";
    }
    if( get_sub_field( 'adjust_position' ) == "adjust" ) {
      $classes .= "adjust-for-menu";
    }
  ?>
  <div class="container-fluid <?php echo $container_classes; ?>" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="row <?php echo $classes; ?>">
      <div class="col-md-10 col-md-offset-1">
        <div class="table banner-text-container" style="<?php if( $adjust_padding == true ) { echo 'padding-top: 8vh;'; } ?>">
          <div class="table-cell banner-text">
            <h2 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading_top'); ?></h2>
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading_center'); ?></h1>
            <h2 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading_bottom'); ?></h2>
            <?php get_template_part( 'template', 'parts/linked-buttons' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
