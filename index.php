<?php get_header(); ?>
<div class="page-header">
  <?php
    $posts_page = get_option( 'page_for_posts' );
    $background_image = get_field('header_image', $posts_page);
  ?>
  <div class="container-fluid anim-time-short parallax-window" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading', $posts_page ); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading', $posts_page ); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $posts_page = get_option( 'page_for_posts' );
  if( get_field( 'news_feed_settings', $posts_page ) == "social" ) {
    require_once dirname(__FILE__) . '/inc/news-feed/news-feed-view.php';
  } else {
    get_template_part( 'template', 'parts/news-feed/default-layout' );
  }
?>
<?php get_footer(); ?>
