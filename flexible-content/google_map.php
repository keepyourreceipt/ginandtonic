<?php
  $map_address = get_sub_field('google_map');
  $map_lat = $map_address['lat'];
  $map_lng = $map_address['lng'];
  $custom_map_pin_obj = get_sub_field('custom_map_pin');
  $custom_map_pin_url = $custom_map_pin_obj['url'];
?>
<div class="row-fluid google-map">
  <div id="map" data-lat="<?php echo $map_lat; ?>" data-lng="<?php echo $map_lng; ?>" data-custom-map-pin="<?php echo $custom_map_pin_url; ?>">
    <?php // Google maps container ?>
  </div>
</div>
