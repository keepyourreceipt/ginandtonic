<div class="call-to-action">
  <?php $featured_image_obj = get_sub_field('featured_image'); ?>
  <div class="row uniform-col-height">
    <div class="col-sm-5 hidden-xs background-image waypoint waypoint-left-to-right" style="background-image: url(<?php echo $featured_image_obj['sizes']['full-hd']; ?>);">
      <?php // Background image container ?>
    </div>
    <div class="col-md-6 waypoint waypoint-right-to-left anim-time-medium">
      <div class="text-content">
        <?php the_sub_field('text_editor'); ?>
      </div>
    </div>
  </div>
</div>
