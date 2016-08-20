<?php
  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }

  // Get selected layout
  $layout = get_sub_field( 'events_layout' );
  $post_counter = 0;

  if ( $layout == "multi-column" ) {
    $layout_classes = "col-sm-12 multi-column";
  } else {
    $layout_classes = "col-sm-12 col-md-3 col-md-offset-1 col-md-offset-1 col-lg-2 col-lg-offset-1";
  }

  $post_per_page = -1;

  if ( get_sub_field( 'number_of_events' ) == "two" ) {
    $posts_per_page = 2;
  }

  if ( get_sub_field( 'number_of_events' ) == "four" ) {
    $posts_per_page = 4;
  }

  // If displaying events by category, get category
  if ( get_sub_field( 'which_events_to_display' ) == "category" ) {
    $events_category = get_sub_field( 'event_category' );
    $events_categories = [];

    foreach ($events_category as $cat ) {
      array_push( $events_categories, "'" . $cat->slug . "'" );
    }
  }
?>

<section class="events-calendar" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="container">

    <?php
      $query = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => $posts_per_page, 'tax_query' => array(
  		array(
  			'taxonomy' => 'eventcategory',
        'field' => 'slug',
        'terms' => $events_categories,
  		  ),
  	  ), ));
    ?>
    <?php while( $query->have_posts() ) : $query->the_post(); ?>
        <?php if ( $layout == "multi-column" ) { ?>
          <?php if ( $post_counter % 2 == 0 ) { ?>
            <div class="row event-listing waypoint waypoint-bottom-to-top">
          <?php }  ?>
          <div class="col-md-6 multi-column-event">
        <?php } ?>
        <div class="<?php echo $layout_classes; ?> event-date">

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
        <div class="col-sm-12 <?php if ( $layout != "multi-column" ) { ?>col-md-7<?php } ?>">
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
        <?php if ( $layout == "multi-column" ) { ?>
        </div>
        <?php } ?>
        <?php $post_counter++; ?>
        <?php if ( $post_counter % 2 == 0 ) { ?>
          </div>
        <?php }  ?>
    <?php endwhile; ?>

  </div>
</section>
