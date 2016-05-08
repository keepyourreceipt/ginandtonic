<section class="latest-news">
  <div class="container">
    <?php if( get_sub_field( 'text_heading' ) ) { ?>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="section-heading">
            <div class="text-heading text-center">
              <h2><?php the_sub_field('text_heading'); ?></h2>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if( get_sub_field( 'text_sub_heading' ) ) { ?>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="section-sub-heading text-center">
            <?php the_sub_field( 'text_sub_heading' ); ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php
      $posts = get_sub_field('featured_posts');
      if( $posts ) { ?>
        <div class="padding-md"></div>
        <div class="row">
          <div class="col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 remove-padding">
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
                    </div>
                    <div class="sm-diamond-pointer"></div>
                    <div class="post-content">
                      <div class="row">
                        <div class="padding-md"></div>
                        <div class="post-date col-xs-3">
                          <span class="post-month"><?php echo get_the_date('M'); ?></span>
                          <span class="post-day"><?php echo get_the_date('d'); ?></span>
                        </div>
                        <div class="post-title remove-padding-left col-xs-9">
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
                          <div class="post-category pull-left">
                            <span>
                              <?php
                                $category_array = get_the_category();
                                $first_category = $category_array[0]->cat_name;
                                ?>
                                <i class="fa fa-folder-o"></i>&nbsp;
                                <?php echo $first_category; ?>
                            </span>
                          </div>
                          <div class="post-views pull-right">
                            <span>
                              <i class="fa fa-eye"></i>&nbsp;
                              <?php echo get_post_meta( get_the_ID(), '_number_of_views', true ); ?>
                            </span>
                          </div>
                          <div class="padding-md"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="padding-md"></div>
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
