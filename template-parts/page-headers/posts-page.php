<?php
  $posts_page = get_option( 'page_for_posts' );
  $background_image = get_field('header_image', $posts_page);
?>
<section class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
  <div class="container">
    <div class="mobile-overlay hidden-md hidden-lg">
      <?php // Shhhh, I'm hiding ?>
    </div>
    <div class="row waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1 table banner-text-container">
            <div class="table-cell banner-text">
              <?php if( get_field( 'text_heading', $posts_page ) ) { ?>
                <h1 class="waypoint waypoint-bottom-to-top">
                  <?php the_field('text_heading', $posts_page); ?>
                </h1>
                <?php } else { ?>
                <h1 class="waypoint waypoint-bottom-to-top">
                  <?php the_title( $posts_page ); ?>
                </h1>
              <?php } ?>
              <h4 class="waypoint waypoint-bottom-to-top anim-time-medium">
                <?php the_field('text_sub_heading', $posts_page); ?>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
