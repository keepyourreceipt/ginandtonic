<div class="container news-feed">
  <div class="row">
    <?php
    require_once dirname(__FILE__) . '/news-feed-controller.php';
    $news_feed_cache = get_template_directory_uri() . '/inc/news-feed/news-feed.cache';
    $news_feed = json_decode(file_get_contents( $news_feed_cache ), true); ?>

    <div class="col-sm-6 col-md-4 news-feed-column">
      <?php
        $post_counter = 1;
        foreach ( $news_feed as $post ) {
          if( $post_counter == 1 ) { ?>
            <div class="col-sm-12 waypoint waypoint-bottom-to-top news-feed-item remove-padding">

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

        <?php } // post counter

        if( $post_counter == 3 ) {
          $post_counter = 1;
        } else {
          $post_counter++;
        }
      } // foreach
    ?>
    </div>

    <div class="col-sm-6 col-md-4 news-feed-column">
      <?php
        $post_counter = 1;
        foreach ( $news_feed as $post ) {
          if( $post_counter == 2 ) { ?>
            <div class="col-sm-12 waypoint waypoint-bottom-to-top news-feed-item remove-padding">

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

        <?php } // post counter

        if( $post_counter == 3 ) {
          $post_counter = 1;
        } else {
          $post_counter++;
        }
      } // foreach
    ?>
    </div>

    <div class="col-sm-6 col-md-4 news-feed-column">
      <?php
        $post_counter = 1;
        foreach ( $news_feed as $post ) {
          if( $post_counter == 3 ) { ?>
            <div class="col-sm-12 waypoint waypoint-bottom-to-top news-feed-item remove-padding">

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

        <?php } // post counter

        if( $post_counter == 3 ) {
          $post_counter = 1;
        } else {
          $post_counter++;
        }
      } // foreach
    ?>
    </div>
  </div>
</div>
