<div class="row events-calendar">
  <?php
    $query = new WP_Query( array( 'post_type' => 'events' ) );
    $event_index = 1;
    while( $query->have_posts() ) : $query->the_post();
      $background_image = get_field('header_image'); ?>

        <?php if( $event_index == 1 ) { ?>
          <div class="container event-listing">
        <?php } ?>
        <div class="col-sm-2 event-date">
          <div class="col-sm-12 event-month">
            <?php $month = substr(get_field('date'), 0, 3 ); ?>
              <span><?php echo $month; ?></span>
          </div>
          <div class="col-sm-12 event-day">
            <?php $day = substr( get_field('date'), 4, 2 ); ?>
            <span><?php echo $day; ?></span>
          </div>
        </div>
        <div class="col-sm-4 event-info">
          <h3><?php the_title(); ?></h3>
          <p><?php the_field('text_sub_heading'); ?></p>
        </div>

      <?php
      if( $event_index == 2 ) {
        $event_index = 1;
        echo "</div>";
      } else {
        $event_index++;
      }
    endwhile; wp_reset_query();
  ?>
</div>
