<?php get_header(); ?>

  <?php get_template_part( 'template', 'parts/page-headers/posts-page' ); ?>

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
