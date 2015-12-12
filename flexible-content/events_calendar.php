<div class="row events-calendar">
  <div class="container">
    <div class="col-sm-12">
      <?php
        $calendar_shortcode = get_sub_field('events_calendar_shortcode');
        echo do_shortcode( $calendar_shortcode );
      ?>
    </div>
  </div>
</div>
