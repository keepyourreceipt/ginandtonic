<?php $background_image = get_field('header_image'); ?>
<div class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
  <div class="container">
    <div class="row waypoint waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="table banner-text-container">
            <div class="table-cell banner-text">
              <?php if( get_field( 'text_heading' ) ) { ?>
                <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading'); ?></h1>
                <?php } else { ?>
                <h1 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h1>
              <?php } ?>
              <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading'); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
