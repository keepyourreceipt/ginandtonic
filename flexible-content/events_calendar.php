<div class="events-calendar">
  <div class="container">
    <?php if( get_sub_field( 'events_to_display' ) == "Choose events to display" ) { ?>

      <?php
      $posts = get_sub_field('choose_events');
        if( $posts ) {
          $event_index = 1;
          $event_counter = 1;
          foreach( $posts as $post) {
            setup_postdata($post); ?>

              <div class="row event-listing">
                <div class="col-sm-12 col-md-2 col-md-offset-1 event-date waypoint waypoint-bottom-to-top">
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

                <div class="col-sm-12 col-md-7 event-info waypoint waypoint-bottom-to-top">
                  <h3><?php the_title(); ?></h3>
                  <?php
                    $description = get_field('description');
                    $excerpt = apply_filters('the_excerpt', $description );
                  ?>
                  <p><?php echo custom_field_excerpt( 'description' ); ?></p>
                </div>

                <div class="row lightbox-content" id="event-<?php echo $event_counter; ?>">
                  <div class="row">
                    <div class="col-sm-12">
                      <h2><?php the_title(); ?></h2>
                      <p><?php the_field('date') ?> | <?php the_field('start_time'); ?> | <?php the_field('end_time'); ?></p>
                      <?php the_field('description'); ?>
                    </div>
                  </div>
                </div>

              </div> <!-- end row -->

          <?php } ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php
        }
      ?>

      <?php } else { ?>

        <?php
          $query = new WP_Query( array( 'post_type' => 'events' ) );
          $event_index = 1;
          $event_counter = 1;
          while( $query->have_posts() ) : $query->the_post();
            $background_image = get_field('header_image'); ?>

            <div class="row event-listing">
              <div class="col-sm-12 col-md-2 col-md-offset-1 event-date waypoint waypoint-bottom-to-top">
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
              <div class="col-sm-12 col-md-8 event-info waypoint waypoint-bottom-to-top">
                <h3><?php the_title(); ?></h3>
                <?php
                  $description = get_field('description');
                  $excerpt = apply_filters('the_excerpt', $description );
                ?>
                <p><?php echo custom_field_excerpt( 'description' ); ?></p>
              </div>
            </div><!-- end row -->
            <?php
          endwhile; wp_reset_query();
        ?>

      <?php } ?>

  </div>
</div>
