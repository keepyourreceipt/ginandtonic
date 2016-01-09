<div class="row events-calendar">
  <?php
    $query = new WP_Query( array( 'post_type' => 'events' ) );
    $event_index = 1;
    $event_counter = 1;
    while( $query->have_posts() ) : $query->the_post();
      $background_image = get_field('header_image'); ?>

        <?php if( $event_index == 1 ) { ?>
          <div class="container event-listing">
        <?php } ?>

        <div class="col-sm-2 event-date waypoint waypoint-bottom-to-top">
          <div class="col-sm-12 event-month">
            <span class="calendar-ring one"></span>
            <span class="calendar-ring two"></span>
            <?php $month = substr(get_field('date'), 0, 3 ); ?>
              <span><?php echo $month; ?></span>
          </div>
          <div class="col-sm-12 event-day">
            <?php $day = substr( get_field('date'), 4, 2 ); ?>
            <span><?php echo $day; ?></span>
          </div>
        </div>
        <div class="col-sm-4 event-info waypoint waypoint-bottom-to-top">
          <h3><?php the_title(); ?></h3>
          <p><?php the_field('text_sub_heading'); ?></p>
          <button type="button" name="button" class="btn btn-small" data-featherlight="#event-<?php echo $event_counter; ?>">More Info</button>
        </div>

        <div class="row lightbox-content" id="event-<?php echo $event_counter; ?>">
          <div class="container">
            <div class="col-sm-12">
              <h2><?php the_title(); ?></h2>
              <p><?php the_field('date') ?> | <?php the_field('start_time'); ?> | <?php the_field('end_time'); ?></p>
              <?php the_field('description'); ?>
            </div>
          </div>
        </div>

      <?php
      $event_counter++;
      if( $event_index == 2 ) {
        $event_index = 1;
        echo "</div>";



      } else {
        $event_index++;
      }
    endwhile; wp_reset_query();
  ?>
</div>
