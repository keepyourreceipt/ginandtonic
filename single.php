<?php get_header(); ?>
<div class="image-banner">
  <?php $background_image = get_field('news_background_image', 'option'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('news_text_heading', 'option'); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('news_text_sub_heading', 'option'); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php while( have_posts() ) : the_post(); ?>
<div class="row">
  <div class="container">
    <div class="col-sm-8 single-post-content">
      <?php the_title(); ?>
      <?php the_content(); ?>
    </div>
    <div class="col-sm-4 widget-sidebar">
      <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
      	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
      	</div><!-- #primary-sidebar -->
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
