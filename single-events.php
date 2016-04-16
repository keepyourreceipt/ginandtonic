<?php get_header(); ?>

<?php $background_image = get_field('header_image'); ?>
<div class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
  <div class="container">
    <div class="row waypoint waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1 table banner-text-container">
            <div class="table-cell banner-text">
              <h1><?php the_title(); ?></h1>
              <div class="event-meta">
                <?php if( get_field('pricing') == "Free Event" ) {
                  $registration_fee = "FREE";
                } else {
                  $registration_fee = get_field('registration_fee');
                } ?>
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
      <div class="col-sm-10 col-sm-offset-1 event-content waypoint waypoint-bottom-to-top">
        <?php the_field('description'); ?>
        <hr>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php
          if( get_field('where_to_but_tickets') == "Buy Tickets on This Site" ) {
            $registration_link = get_field('tickets_product_link');
            $ajax_add_to_cart = true;
          } else {
            $registration_link = get_field('website');
          }
          ?>
          <h2>Registration fee: <?php the_field('registration_fee'); ?></h2>
          <h3><a href="<?php echo $registration_link; ?>" class="event-registration-link <?php if( $ajax_add_to_cart == true ) { echo 'ajax-submit-button'; } ?>">Reserve Your Spot Now!</a></h3>
          <a rel="nofollow" href="/ginandtonic.com/shop/?add-to-cart=170" data-quantity="1" data-product_id="170" data-product_sku="3212" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
      </div>
    </div>
  </div>
</div>

<div class="inline-map">
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <hr>
      <h2>Location</h2>
      <?php
        $location = get_field('event_location');
        $lat = $location['lat'];
        $lng = $location['lng'];
        ?>
      <div id="inline-map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" style="min-height: 500px">
        <?php // Map container ?>
      </div>
    </div>
  </div>
</div>

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

<?php get_template_part( 'template', 'parts/image-gallery' ); ?>
<?php get_footer(); ?>
