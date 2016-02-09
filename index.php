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

<div class="container news-feed">
  <div class="row">
    <div class="masonry-container">
      <?php
      require_once  dirname(__FILE__) . '/inc/build-news-feed.php';
      $news_feed_cache = get_template_directory_uri() . '/inc/news-feed.php';
      $news_feed = json_decode(file_get_contents( $news_feed_cache ), true); ?>
      <?php foreach ( $news_feed as $post ) { ?>
        <div class="col-sm-6 col-md-4 masonry-item waypoint waypoint-bottom-to-top">

          <?php if( $post['content_type'] == "facebook" ) { ?>
            <div class="<?php echo $post['content_type']; ?>">
              <a href="<?php echo $post['link']; ?>">
                <img src="<?php echo $post['image_src']; ?>">
              </a>
              <?php if( isset( $post['content'] ) && !empty( $post['content'] ) ) { ?>
                <div class="content">
                  <div class="icon">
                    <i class="fa fa-facebook-official"></i>
                  </div>
                  <p><?php echo $post['content'];?></p>
                </div>
              <?php } ?>
            </div>
          <?php } ?>

          <?php if( $post['content_type'] == "twitter" ) { ?>
            <div class="<?php echo $post['content_type']; ?>">
              <a href="<?php echo $post['link']; ?>">
                <div class="content">
                  <div class="icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p><?php echo $post['content'];?></p>
                </div>
              </a>
            </div>
          <?php } ?>

          <?php if( $post['content_type'] == "post" ) { ?>
            <div class="<?php echo $post['content_type']; ?>">
              <a href="<?php echo $post['link']; ?>">
                <img src="<?php echo $post['image_src']; ?>">
              </a>
              <div class="content">
                <div class="icon">
                  <i class="fa fa-pencil"></i>
                </div>
                <p><?php echo $post['content'];?></p>
              </div>
            </div>
          <?php } ?>

        </div>
      <?php } // foreach ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
