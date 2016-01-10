<?php get_header(); ?>
<div class="image-banner">
  <?php $background_image = get_field('header_image'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h1>                        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="single-event-content">
  <div class="row">
    <div class="container">
      <div class="col-sm-8 col-sm-offset-2 event-content-header">
        <h3 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h3>
        <div class="event-details waypoint waypoint-bottom-to-top">
          <?php if( get_field('pricing') == "Free Event" ) {
            $registration_fee = "FREE";
          } else {
            $registration_fee = get_field('registration_fee');
          } ?>
          <span><i class="fa fa-calendar"></i> <?php the_field('date'); ?></span>
          <span><i class="fa fa-clock-o"></i> <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?></span>
          <span><i class="fa fa-map-marker"></i> <?php the_field('street_address', 'option'); ?></span>
          <span><i class="fa fa-ticket"></i> <?php echo $registration_fee; ?></span>

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container">
      <div class="col-sm-8 col-sm-offset-2 event-content waypoint waypoint-bottom-to-top">
        <?php the_field('description'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container">
      <div class="col-sm-8 col-sm-offset-2 waypoint waypoint-bottom-to-top">
        <?php
          if( get_field('where_to_but_tickets') == "Buy Tickets on This Site" ) {
            $registration_link = get_field('tickets_product_link');
            $ajax_add_to_cart = true;
          } else {
            $registration_link = get_field('website');
          }
        ?>
        <a href="<?php echo $registration_link; ?>" class="btn btn-default btn-small <?php if( $ajax_add_to_cart == true ) { echo 'ajax-submit-button'; } ?>">Reserve Your Spot</a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
