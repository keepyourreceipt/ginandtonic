<div class="hero-image">
  <?php $background_image = get_sub_field('background_image'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="row">
      <div class="container">
        <div class="col-md-10 col-md-offset-1">
          <div class="table banner-text-container" style="<?php if( $adjust_padding == true ) { echo 'padding-top: 8vh;'; } ?>">
            <div class="table-cell banner-text">
              <h2 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading_top'); ?></h2>
              <h1 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading_center'); ?></h1>
              <h2 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading_bottom'); ?></h2>
              <?php
                if( have_rows('buttons') ) { ?>
                  <div class="linked_buttons">
                    <?php
                    while ( have_rows('buttons') ) : the_row();
                      if( get_sub_field('link_type') == "Link to a Page on This Website" ) {
                        $button_link = get_sub_field('page_to_link_to');
                        $link_target = null;
                      } else {
                        $button_link = get_sub_field('external_website_link');
                        $link_target = "_blank";
                      }
                      ?>
                        <a class="linked-button linked-button-light waypoint waypoint-bottom-to-top anim-time-long" href="<?php echo $button_link ?>" <?php if( $link_target != null ) { echo $link_target; } ?>><?php the_sub_field('button_text'); ?></a>
                      <?php
                    endwhile;
                  ?>
                  </div>
                  <?php
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="scroll-indicator">
        <i class="fa fa-chevron-down"></i>
      </div> -->
    </div>
  </div>
</div>
