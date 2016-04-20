<?php get_header(); ?>
<?php while( have_posts() ) : the_post(); ?>

<?php get_template_part( 'template', 'parts/page-headers/single-post' ); ?>

<div class="row single-post-content">
  <div class="container">
    <div class="col-md-7 col-md-offset-1">
      <div class="content waypoint waypoint-bottom-to-top">
        <?php the_content(); ?>
      </div>
    </div>
    <?php get_template_part( 'template', 'parts/sidebars/blog-sidebar' ); ?>
  </div>
</div>
<div class="row single-post-comments">
  <div class="container">
    <div class="col-md-7 col-md-offset-1 waypoint waypoint-bottom-to-top">
      <?php comments_template(); ?>
    </div>
  </div>
</div>

<?php get_template_part( 'template', 'parts/related-posts' ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>
