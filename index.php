<?php get_header(); ?>
<div class="row">
  <div class="container">
    <div class="col-sm-8">
      <?php while( have_posts() ) : the_post(); ?>
          <div class="post-listing">
            <?php the_excerpt(); ?>
          </div>
      <?php endwhile; ?>
    </div>
    <div class="col-sm-4 widget-sidebar">
      <?php get_sidebar( 'blog_sidebar' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
