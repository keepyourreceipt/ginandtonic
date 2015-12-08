<div class="image-banner">
  <?php $background_image = get_sub_field('background_image'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h2 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_sub_field('text_heading'); ?></h2>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-long"><?php the_sub_field('text_sub_heading'); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
