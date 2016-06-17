<?php
  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }
?>
<section class="events-calendar" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="container">
    <?php
    $posts = get_sub_field('choose_events');
      if( $posts ) {
        $event_index = 1;
        $event_counter = 1;
        foreach( $posts as $post) {
          setup_postdata($post); ?>

            <div class="row event-listing waypoint waypoint-bottom-to-top">
              <div class="col-sm-12 col-md-3 col-md-offset-1 col-md-offset-1 col-lg-2 col-lg-offset-1 event-date">

                <div class="col-sm-12 event-month">
                  <span class="calendar-ring one"></span>
                  <span class="calendar-ring two"></span>
                  <?php
                    if( get_field('event_type') == "recurring" ) {
                      $heading = get_field( 'event_frequency' );
                      $event_type = "recurring";
                    } else {
                      $heading = substr(get_field('date'), 0, 3 );
                      $event_type = "singe-event";
                    }
                    ?>
                    <span><?php echo $heading; ?></span>
                </div>

                <div class="col-sm-12 event-day">
                  <?php
                  if( $event_type == "recurring" ) {
                    $event_occurs = get_field( 'event_occurs' );
                    $event_day = get_field( 'event_day' );
                    $listing_classes = "recurring-event";
                  } else {
                    $event_occurs = null;
                    $event_day = substr( get_field('date'), 4, 2 );
                    $listing_classes = "single-event";
                  }
                  ?>
                  <?php if( $event_type == "recurring" ) { ?>
                    <span class="<?php echo $listing_classes; ?> small-heading"><?php echo $event_occurs; ?></span>
                  <?php } ?>
                  <span class="<?php echo $listing_classes; ?>"><?php echo $event_day; ?></span>
                </div>
              </div>

              <div class="col-sm-12 col-md-7">
                <div class="event-info">
                  <div class="event-title">
                    <h2><?php the_title(); ?></h2>
                  </div>
                  <div class="event-meta">
                    <?php
                      $event_location = get_field('event_location');
                      $event_address = $event_location['address'];
                    ?>
                    <?php if( isset( $event_address ) && $event_address != null ) { ?>
                      <div class="event-address">
                        <i class="fa fa-map-marker"></i> <?php echo $event_address; ?>
                      </div>
                    <?php } ?>
                    <?php if( get_field( 'start_time' ) ) { ?>
                      <div class="event-time">
                        <i class="fa fa-clock-o"></i> <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?>
                      </div>
                    <?php } ?>
                  </div>
                  <hr>
                  <?php
                    $description = get_field('description');
                    $excerpt = apply_filters('the_excerpt', $description );
                  ?>
                  <p><?php echo custom_field_excerpt( 'description' ); ?></p>
                </div>
                <div class="buttons waypoint waypoint-bottom-to-top">
                  <a href="<?php the_permalink(); ?>" class="linked-button linked-button-dark">More Info</a>
                  <?php
                    if( get_field('where_to_but_tickets') == "Buy Tickets on This Site" ) {
                      $registration_link = get_field('tickets_product_link');
                      $registration_product_id = url_to_postid( $registration_link );
                      $ajax_add_to_cart = true;
                    } else {
                      $registration_link = get_field('website');
                    }

                    if( get_field('pricing') == "Free Event" ) {
                      $registration_fee = "FREE";
                    } else {
                      $registration_fee = get_field('registration_fee');
                    }
                    ?>
                    <a rel="nofollow" href="<?php echo $registration_link; ?>?add-to-cart=<?php echo $registration_product_id; ?>" data-quantity="1" data-product_id="<?php echo $registration_product_id; ?>" class="event-registration-link linked-button linked-button-dark add_to_cart_button ajax_add_to_cart <?php if( $ajax_add_to_cart == true ) { echo 'ajax-submit-button'; } ?>">Register Now</a>
                </div>
              </div>
            </div> <!-- end row -->

        <?php } ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php
      }
    ?>
  </div>
</section>
