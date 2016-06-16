<?php get_header(); ?>
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
              <h1 class="waypoint waypoint-bottom-to-top">
                404 Error
              </h1>
              <h4 class="waypoint waypoint-bottom-to-top anim-time-medium">
                Could not find the page you're looking for
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container list-blog-posts blog-posts-default-layout">
  <div class="row">
    <?php get_template_part( 'template', 'parts/sidebars/blog-mobile-sidebar' ); ?>
    <div class="col-md-7 col-md-offset-1">
      <h2>We couldn't find the page you're looking for.</h2>
      <p>Please chek the URL and make sure there's nothing weird going on. If you're pretty sure there should be
      a page here, please feel free to get in touch and we'll get you sorted.</p>
    </div>
    <?php get_template_part( 'template', 'parts/sidebars/blog-sidebar' ); ?>
  </div>
</section>

<?php get_footer(); ?>
