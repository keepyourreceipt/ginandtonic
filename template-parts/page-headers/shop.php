<section class="page-header">
  <?php
    $shop_page = get_page_by_title( 'Shop' );
    $background_image = get_field('header_image', $shop_page->ID);
  ?>
  <div class="container-fluid anim-time-short parallax-window" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="mobile-overlay hidden-md hidden-lg">
        <?php // Shhhh, I'm hiding ?>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="table banner-text-container">
            <div class="table-cell banner-text">
              <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading', $shop_page->ID); ?></h1>
              <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading', $shop_page->ID); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
