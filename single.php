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
<div class="row single-post-content">
  <div class="container">
    <div class="col-sm-8">
      <?php comments_template(); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="container">
    <?php
      $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
        while( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a>
          <p><?php the_excerpt(); ?></p>
        </div>
        <?php
        endwhile;
      ?>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
