<section class="portfolio-grid">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row portfolio-grid-filter waypoint waypoint-bottom-to-top">
          <button class="linked-button linked-button-dark all active">All</button>
          <?php
            $filter_cats = get_terms( 'portfoliocategory', array('hide_empty' => true));
            foreach( $filter_cats as $filter_cat ) { ?>
              <button class="linked-button linked-button-dark" data-filter="<?php echo $filter_cat->slug; ?>"><?php echo $filter_cat->name; ?></button>
            <?php }
            ?>
        </div>
        <div class="row portfolio-grid-items waypoint waypoint-bottom-to-top">
          <?php
            $query = new WP_Query( array('post_type' => 'portfolio', 'posts_per_page' => -1) );
            if( $query->have_posts() ) {
              while( $query->have_posts() ) : $query->the_post();
                $featured_image_id = get_post_thumbnail_id();
                $featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'featured-image-landscape', false );
                  $post_cats = get_the_terms( get_the_ID(), 'portfoliocategory' );
                  $post_cats_array = [];
                  foreach( $post_cats as $post_cat) {
                    array_push( $post_cats_array, $post_cat->slug);
                  }
                  if( isset( $post_cats_array ) && $post_cats_array != null ) {
                    $post_categories = implode( " ", $post_cats_array );
                  }
                  ?>
                  <div class="col-sm-4 portfolio-grid-item <?php echo $post_categories; ?>">
                    <a href="<?php the_permalink(); ?>">
                      <img src="<?php echo $featured_image_url[0]; ?>">
                      <?php // the_title(); ?>
                    </a>
                  </div>
                <?php
                endwhile;
              wp_reset_query();
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
