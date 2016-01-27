<?php get_header(); ?>
<div class="image-banner">
  <?php
    if( get_field('header_image') ) {
      $background_image = get_field( 'header_image' );
    } else {
      $news_page = get_page_by_title( 'News' );
      $background_image = get_field('header_image', $news_page->ID);
    }
    ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <?php if( get_sub_field( 'text_heading' ) ) { ?>
              <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading'); ?></h1>
            <?php } else { ?>
              <h1 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h1>
              <?php } ?>
            <?php if( get_sub_field( 'text_sub_heading' ) ) { ?>
                <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading'); ?></h4>
            <?php } else { ?>
                <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php echo get_the_date(); ?></h4>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php while( have_posts() ) : the_post(); ?>
<div class="row single-post-content">
  <div class="container">
    <div class="col-sm-8">
      <div class="post-title waypoint waypoint-bottom-to-top">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="post-meta waypoint waypoint-bottom-to-top">
        <span><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?></span>
        &nbsp;&nbsp;
        <span><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('|'); ?></span>
      </div>
      <div class="content waypoint waypoint-bottom-to-top">
        <?php the_content(); ?>
      </div>
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
<div class="row single-post-comments">
  <div class="container">
    <div class="col-sm-8 waypoint waypoint-bottom-to-top">
      <?php comments_template(); ?>
    </div>
  </div>
</div>

<?php get_template_part( 'template', 'parts/related-posts' ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>
