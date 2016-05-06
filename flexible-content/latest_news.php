<section class="latest-news">
  <div class="container">
    <?php
      $posts = get_sub_field('featured_posts');
      if( $posts ) { ?>
        <div class="row">
          <div class="col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 remove-padding second-row">
          <?php
          $post_counter = 1;
          foreach( $posts as $post) {
            if( $post_counter < 3 ) {
              $display_classes = "col-sm-6 col-md-6 col-lg-4";
            } else {
              $display_classes = "col-lg-4 visible-lg";
            }
            setup_postdata($post); ?>
                <div class="<?php echo $display_classes; ?>">
                  <div class="latest-news-item">
                    <div class="featured-image">
                    <?php
                      $featured_image_id = get_post_thumbnail_id();
                      $featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'large', false );  ?>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $featured_image_url[0]; ?>">
                      </a>
                      <div class="post-category">
                        <span class="">
                          <i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list(' | '); ?>
                        </span>
                      </div>
                    </div>
                    <div class="sm-diamond-pointer"></div>
                    <div class="post-content">
                      <div class="row">
                        <div class="padding-md"></div>
                        <div class="post-date col-sm-3">
                          <span class="post-month"><?php echo get_the_date('M'); ?></span>
                          <span class="post-day"><?php echo get_the_date('d'); ?></span>
                        </div>
                        <div class="post-title remove-padding-left col-sm-9">
                          <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                          </a>
                        </div>
                      </div>
                      <div class="padding-md"></div>
                      <div class="row">
                        <div class="post-excerpt col-sm-12">
                          <?php the_excerpt(); ?>
                        </div>
                      </div>
                      <div class="padding-sm"></div>
                      <div class="row">
                        <div class="post-stats col-sm-12">
                          <?php echo get_post_meta( get_the_ID(), '_number_of_views', true ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            wp_reset_postdata(); ?>
            <?php $post_counter++; ?>
          <?php } ?>
        <?php } ?>
      </div> <!-- end .second row -->
    </div> <!-- end row -->
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="padding-sm"></div>
      </div>
    </div>
  </div>
</section>
