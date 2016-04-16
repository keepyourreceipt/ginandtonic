<?php get_header(); ?>

<?php $background_image = get_field('header_image'); ?>
<div class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
  <div class="container">
    <div class="row waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1 table banner-text-container">
            <div class="table-cell banner-text">
              <h1><?php the_title(); ?></h1>
              <div class="event-meta">
                <span><i class="fa fa-calendar"></i> <?php the_field('date'); ?>&nbsp;&nbsp;</span>
                <span><i class="fa fa-clock-o"></i> <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?>&nbsp;&nbsp;</span>
                <span><i class="fa fa-map-marker"></i> <?php the_field('street_address', 'option'); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="single-event-content">
  <div class="container">
    <div class="row">

      <div class="col-md-7 col-md-offset-1 event-content">
        <?php the_field('description'); ?>
      </div>

      <div class="col-md-3 event-sidebar">
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

          <?php if( $registration_fee != "FREE" ) ?>
          <div class="registration-fee">
            <span class="title">Registration fee:</span>
            <span class="fee"><?php the_field('registration_fee'); ?>
          </div>
          <?php if( isset( $registration_fee ) && $registration_fee != "FREE" ) { ?>
            <div class="registration-link">
              <a rel="nofollow" href="<?php echo $registration_link; ?>/?add-to-cart=<?php echo $registration_product_id; ?>" data-quantity="1" data-product_id="<?php echo $registration_product_id; ?>" class="event-registration-link linked-button linked-button-dark add_to_cart_button ajax_add_to_cart <?php if( $ajax_add_to_cart == true ) { echo 'ajax-submit-button'; } ?>">Register Now</a>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>

<?php if( get_field( 'event_location' ) ) { ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <hr>
      </div>
    </div>
  </div>

  <div class="inline-map location">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h2>Location</h2>
            <?php
              $location = get_field('event_location');
              $lat = $location['lat'];
              $lng = $location['lng'];
              ?>
            <div id="inline-map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>">
              <?php // Map container ?>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
  <script>
    if( jQuery('#inline-map').length ) {
      var mapLat = jQuery('#inline-map').data("lat");
      var mapLng = jQuery('#inline-map').data("lng");
      var mapLatLng = {lat: mapLat, lng: mapLng};

      var map = new google.maps.Map(document.getElementById('inline-map'), {
        center: {
          lat: mapLat,
          lng: mapLng
        },
        scrollwheel: false,
        zoom: 12
      });

      var marker = new google.maps.Marker({
        position: mapLatLng,
        map: map
      });
    }
  </script>


<?php get_footer(); ?>
