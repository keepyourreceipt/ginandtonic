<section class="latest-news">
  <div class="container">
    <?php
      $posts = get_sub_field('featured_posts');
      $current_post = 0;
      if( $posts ) {
          foreach( $posts as $post) {
            $current_post++;
            setup_postdata($post);
              if( $current_post == 1 ) { ?>
                <div class="row first-row">
                  <div class="featured-image col-md-5 col-md-offset-1 waypoint waypoint-bottom-to-top">
                    <?php
                      $featured_image_id = get_post_thumbnail_id();
                      $featured_image_url_desktop = wp_get_attachment_image_src( $featured_image_id, 'full-hd', false );
                      $featured_image_url_tablet = wp_get_attachment_image_src( $featured_image_id, 'featured-image-portrait', false );
                      $featured_image_url_mobile = wp_get_attachment_image_src( $featured_image_id, 'post-listing', false ); ?>
                      <a href="<?php the_permalink(); ?>">
                        <img class="visible-lg" src="<?php echo $featured_image_url_desktop[0]; ?>">
                        <img class="visible-md" src="<?php echo $featured_image_url_tablet[0]; ?>">
                        <img class="visible-xs visible-sm" src="<?php echo $featured_image_url_mobile[0]; ?>">
                      </a>
                  </div>
                  <div class="post-content col-md-5">
                    <div class="post-title waypoint waypoint-bottom-to-top">
                      <h2>
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>
                    </div>
                    <div class="post-meta waypoint waypoint-bottom-to-top">
                      <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo get_the_author(); ?>&nbsp;&nbsp;</span>
                      <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?>&nbsp;&nbsp;</span>
                      <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('|'); ?></span>
                    </div>
                    <hr class="waypoint waypoint-bottom-to-top">
                    <div class="post-excerpt">
                      <?php the_excerpt(); ?>
                    </div>
                    <div class="share-post waypoint waypoint-bottom-to-top">
                      <span>Shre this</span>
                      <a href="https://twitter.com/home?status=<?php the_permalink(); ?>">
                        <i class="fa fa-twitter"></i>
                      </a>
                      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                        <i class="fa fa-facebook-official"></i>
                      </a>
                      <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
                        <i class="fa fa-google-plus"></i>
                      </a>
                      <a href="https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>">
                        <i class="fa fa-pinterest"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row waypoint waypoint-bottom-to-top">
                  <div class="col-md-10 col-md-offset-1">
                    <hr>
                  </div>
                </div>
              <?php } else { ?>
                <?php if( $current_post == 2 ) { ?>
                  <div class="row">
                    <div class="col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 remove-padding second-row">
                      <?php } ?>
                      <div class="col-sm-4 waypoint waypoint-bottom-to-top">
                        <div class="featured-image">
                          <?php
                            $featured_image_id = get_post_thumbnail_id();
                            $featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'large', false );  ?>
                            <a href="<?php the_permalink(); ?>">
                              <img src="<?php echo $featured_image_url[0]; ?>">
                            </a>
                          </div>
                          <div class="post-title">
                            <div class="post-meta">
                              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list(' | '); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                              <?php the_title(); ?>
                            </a>
                          </div>
                      </div>
                <?php } ?>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        <?php } ?>
      </div> <!-- end .second row -->
    </div> <!-- end row -->
  </div>
</section>
