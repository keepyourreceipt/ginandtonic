<?php $background_image = get_field('header_image'); ?>
<section class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
  <div class="container">
    <div class="mobile-overlay hidden-md hidden-lg">
      <?php // Shhhh, I'm hiding ?>
    </div>
    <div class="row waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="table banner-text-container">
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
</section>
