<?php get_header(); ?>
<div class="page-header">
  <?php
    $news_page = get_page_by_title( 'News' );
    $background_image = get_field('header_image', $news_page->ID);
  ?>
  <div class="container-fluid anim-time-short parallax-window" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading', $news_page->ID); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading', $news_page->ID); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once dirname(__FILE__) . '/inc/news-feed/news-feed-view.php'; ?>

<?php get_footer(); ?>
