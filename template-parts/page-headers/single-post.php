
<?php
  $post_id = get_the_ID();
  $post_thumbnil_id = get_post_thumbnail_id( $post_id );
  $featured_image = wp_get_attachment_image_src( $post_thumbnil_id, 'full-hd' );
  $background_image = $featured_image[0];
?>
<div class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image; ?>">
  <div class="container">
    <div class="mobile-overlay hidden-md hidden-lg">
      <?php // Shhhh, I'm hiding ?>
    </div>
    <div class="row waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-1">
            <div class="table banner-text-container">
              <div class="table-cell banner-text">
                <h1><?php the_title(); ?></h1>
                <div class="post-meta">
                  <span><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?></span>
                  &nbsp;&nbsp;
                  <span><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('  |  '); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
