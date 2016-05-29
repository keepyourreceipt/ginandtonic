<section class="product-features">
  <div class="container">
    <div class="row">
      <div class="section-nav text-center col-md-10 col-md-offset-1">
        <?php if( get_sub_field( 'sec_one_section_title' ) ) { ?>
          <button class="one active"><?php the_sub_field( 'sec_one_section_title' ); ?></button>
        <?php } ?>
        <?php if( get_sub_field( 'sec_two_section_title' ) ) { ?>
          <button class="two"><?php the_sub_field( 'sec_two_section_title' ); ?></button>
        <?php } ?>
      </div>
      <div class="content-sections">
        <?php // Section one ?>
        <?php if( get_sub_field( 'sec_one_left_col_text_editor' ) || get_sub_field( 'sec_one_left_col_featured_image' ) ) { ?>
          <div class="section one active col-md-10 col-md-offset-1">
            <div class="row">
              <div class="left-column col-md-6">
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
              <div class="right-column col-md-6">
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
