<div class="row events-calendar">
  <div class="container">
    <?php
      $query = new WP_Query( array( 'post_type' => 'events' ) );
      while( $query->have_posts() ) : $query->the_post();
        $background_image = get_field('header_image'); ?>

        <div class="col-sm-offset-1 col-sm-10 event-listing" style="background-image: url(<?php echo $background_image['sizes']['full-hd']; ?>)">
          <div class="image-overlay">
            <?php // Image overlay ?>
          </div>
          <div class="event-icon text-center">
            <h2><i class="fa fa-calendar"></i></h2>
          </div>
          <div class="event-title">
            <h2><?php the_title(); ?></h2>
          </div>
        </div>
        <div class="col-sm-offset-1 col-sm-10 event-info">
          <h3><?php the_field('text_heading'); ?></h3>
          <p><?php the_field('text_sub_heading'); ?></p>
          <i class="fa fa-calendar"></i> <?php the_field('date'); ?>&nbsp;
          <i class="fa fa-clock-o"></i> <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?>&nbsp;
          <i class="fa fa-map-marker"></i> <?php the_field('street_address', 'option'); ?>
        </div>
        <div class="col-sm-offset-1 col-sm-10 event-description">
          <?php the_field('description'); ?>
        </div>

        <?php
      endwhile; wp_reset_query();
    ?>
  </div>
</div>
