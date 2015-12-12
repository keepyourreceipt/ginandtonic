<?php get_header(); ?>
<?php while( have_posts() ) : the_post(); ?>
<div class="row">
  <div class="container">
    <div class="col-sm-8 single-post-content">
      <?php the_content(); ?>
    </div>
    <div class="col-sm-4 widget-sidebar">
      <?php get_sidebar( 'blog_sidebar' ); ?>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
