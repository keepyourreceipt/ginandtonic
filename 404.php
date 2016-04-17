<?php get_header(); ?>
  <?php
    $posts_page = get_option( 'page_for_posts' );
    $background_image = get_field('header_image', $posts_page);
  ?>
  <div class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="container">
      <div class="row waypoint waypoint-fade parallax-window">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1 table banner-text-container">
              <div class="table-cell banner-text">
                <h1 class="waypoint waypoint-bottom-to-top">404. Page not found.</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container four-oh-four">
    <div class="row">
      <?php get_template_part( 'template', 'parts/sidebars/blog-mobile-sidebar' ); ?>
      <div class="col-md-7 col-md-offset-1">
        <p class="waypoint waypoint-bottom-to-top">
          Please check the address and try again. If you feel as though you've reached this page in error, please feel free to contact us.
        </p>
      </div>
      <?php get_template_part( 'template', 'parts/sidebars/blog-sidebar' ); ?>
    </div>
  </div>

<?php get_footer(); ?>
