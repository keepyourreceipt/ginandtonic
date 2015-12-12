<div class="blog-posts">
  <?php
    $posts_per_page = get_sub_field('number_of_posts');
    $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 1 ) );
    while( $query->have_posts() ) : $query->the_post();
    ?>

    <div class="container">
      <div class="row">
        <div class="">

          <?php
            $featured_image_id = get_post_thumbnail_id( get_the_ID() );
            $featured_image_obj = wp_get_attachment_image_src($featured_image_id,'large', true);
            $featured_image_url = $featured_image_obj[0];
          ?>
          <div class="col-sm-12 col-md-6 featured-image-container waypoint waypoint-left-to-right">
            <div class="car featured-image" style="background-image: url(<?php echo $featured_image_url; ?>)">
              <?php // Silence is golden ?>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 post-excerpt-container waypoint waypoint-right-to-left">
            <div class="card post-excerpt">
              <h2><?php the_title(); ?></h2>
              <?php the_excerpt(); ?>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 post-category-container waypoint waypoint-bottom-to-top">
            <div class="card post-category">
              <?php $post_category = get_the_category(); ?>
              <?php foreach( $post_category as $category ) { ?>
                <span><?php $post_category->name; ?></span>
              <?php } ?>

            </div>
          </div>
          <div class="col-sm-6 col-md-3 post-read-more-container waypoint waypoint-bottom-to-top anim-time-medium">
            <a href="<?php the_permalink(); ?>">
              <div class="card post-read-more">
                <?php // Background image via css ?>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php
    endwhile;
    wp_reset_query();
    ?>

</div>
