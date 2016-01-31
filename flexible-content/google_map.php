<?php
  $map_address = get_sub_field('google_map');
  $map_lat = $map_address['lat'];
  $map_lng = $map_address['lng'];
?>
<div class="row-fluid google-map">
  <div id="map" data-lat="<?php echo $map_lat; ?>" data-lng="<?php echo $map_lng; ?>">
    <?php // Google maps container ?>
  </div>
</div>
