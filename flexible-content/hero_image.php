  <?php
    $background_image = get_sub_field('background_image');
    $container_classes .= "background-" . get_sub_field('background_style') . " ";
    if( get_sub_field('background_style') == "cover" ) {
      $background_style = 'data-parallax="scroll" data-image-src="' . $background_image['sizes']['full-hd'] . '"';
    } else {
      $background_style = 'style="background-image: url(' . $background_image['url'] . ');"';
    }
  ?>
<section class="hero-image overlay parallax-window <?php echo $container_classes; ?>" <?php echo $background_style; ?>>
  <div class="container waypoint waypoint-fade">
    <div class="mobile-overlay visible-xs">
      <?php // Shhhh, I'm hiding ?>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="table text-content-container">
          <div class="table-cell text-content waypoint waypoint-bottom-to-top">
            <?php the_sub_field( 'text_editor' ); ?>            
            <?php get_template_part( 'template', 'parts/linked-buttons' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
