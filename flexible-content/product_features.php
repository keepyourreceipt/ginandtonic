<?php
  $padding_classes = ['padding-top' => 'default-padding-top', 'padding-bottom' => 'default-padding-bottom'];
  if( get_sub_field('padding_top') == "non-padded" ) {
    $padding_classes['padding-top'] = "remove-padding-top";
  }
  if( get_sub_field('padding_bottom') == "non-padded" ) {
    $padding_classes['padding-bottom'] = "remove-padding-bottom";
  }
?>

<section class="product-features <?php echo implode(' ', $padding_classes); ?>">
  <?php
    $inline_styles = "style='";
    if( get_sub_field( 'background_style' ) != "color" ) {
      if( get_sub_field( 'background_image' ) ) {
        $background_image_obj = get_sub_field( 'background_image' );
        $background_image_url = $background_image_obj['sizes']['full-hd'];

        $inline_styles .= "background-image: url(" . $background_image_url . ");";
        if( get_sub_field( 'background_style' ) == "cover" ) {
          $inline_styles .= " background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;";
        } else {
          $inline_styles .= " background-repeat: repeat;";
        }
      }
    } else {
      if( get_sub_field( 'background_color' ) ) {
        $inline_styles .= " background-color: " . get_sub_field( 'background_color' );
      }
    }
    $inline_styles .= "'";
  ?>
  <div class="section-header waypoint waypoint-fade" <?php echo $inline_styles; ?>>
    <div class="section-heading waypoint waypoint-bottom-to-top">
      <?php if( get_sub_field( 'text_heading' ) ) { ?>
        <h2><?php the_sub_field( 'text_heading' ); ?></h2>
      <?php } ?>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="section-nav text-center col-md-10 col-md-offset-1 waypoint waypoint-bottom-to-top">
        <div class="btn-group" role="group">
          <?php if( get_sub_field( 'sec_one_section_title' ) ) { ?>
            <button class="one linked-button linked-button-dark active"><?php the_sub_field( 'sec_one_section_title' ); ?></button>
          <?php } ?>
          <?php if( get_sub_field( 'sec_two_section_title' ) ) { ?>
            <button class="two linked-button linked-button-dark"><?php the_sub_field( 'sec_two_section_title' ); ?></button>
          <?php } ?>
        </div>
      </div>
      <div class="content-sections">
        <?php // Section one ?>
        <?php if( get_sub_field( 'sec_one_left_col_text_editor' ) || get_sub_field( 'sec_one_left_col_featured_image' ) ) { ?>
          <div class="section one active col-md-10 col-md-offset-1 waypoint waypoint-bottom-to-top anim-time-short">
            <div class="row">
              <div class="left-column col-md-6 waypoint waypoint-bottom-to-top anim-time-short">
                <?php
                  if( get_sub_field( 'sec_one_left_col_content_type' ) == "text" ) {
                    the_sub_field( 'sec_one_left_col_text_editor' );
                  } else {
                    $featured_image_obj = get_sub_field( 'sec_one_left_col_featured_image' );
                    $featured_images_url = $featured_image_obj['sizes']['large'];
                  ?>
                  <div class="featured-image">
                    <img src="<?php echo $featured_images_url; ?>" alt="Alt text here">
                  </div>
                <?php } ?>
              </div>
              <div class="right-column col-md-6 waypoint waypoint-bottom-to-top anim-time-medium">
                <?php
                  if( get_sub_field( 'sec_one_right_col_content_type' ) == "text" ) {
                    the_sub_field( 'sec_one_right_col_text_editor' );
                  } else {
                    $featured_image_obj = get_sub_field( 'sec_one_right_col_featured_image' );
                    $featured_images_url = $featured_image_obj['sizes']['large'];
                  ?>
                  <div class="featured-image">
                    <img src="<?php echo $featured_images_url; ?>" alt="Alt text here">
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php // Section two ?>
        <?php if( get_sub_field( 'sec_two_left_col_text_editor' ) || get_sub_field( 'sec_two_left_col_featured_image' ) ) { ?>
          <div class="section two col-md-10 col-md-offset-1">
            <div class="row">
              <div class="left-column col-md-6">
                <?php
                  if( get_sub_field( 'sec_two_left_col_content_type' ) == "text" ) {
                    the_sub_field( 'sec_two_left_col_text_editor' );
                  } else {
                    $featured_image_obj = get_sub_field( 'sec_two_left_col_featured_image' );
                    $featured_images_url = $featured_image_obj['sizes']['large'];
                  ?>
                  <div class="featured-image">
                    <img src="<?php echo $featured_images_url; ?>" alt="Alt text here">
                  </div>
                <?php } ?>
              </div>
              <div class="right-column col-md-6">
                <?php
                  if( get_sub_field( 'sec_two_right_col_content_type' ) == "text" ) {
                    the_sub_field( 'sec_two_right_col_text_editor' );
                  } else {
                    $featured_image_obj = get_sub_field( 'sec_two_right_col_featured_image' );
                    $featured_images_url = $featured_image_obj['sizes']['large'];
                  ?>
                  <div class="featured-image">
                    <img src="<?php echo $featured_images_url; ?>" alt="Alt text here">
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
