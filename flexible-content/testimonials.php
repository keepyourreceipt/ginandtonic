<section class="testimonials">
  <div class="container">
    <div class="section-title">
      <?php if( get_field( 'primary_brand_color', 'option' ) ) { ?>
        <style>
          .testimonials .testimonial .title {
            color: <?php the_field( 'primary_brand_color', 'option' ); ?> !important;
          }
        </style>
      <?php } ?>
      <div class="row waypoint waypoint-bottom-to-top">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
          <div class="section-heading text-center">
            <h2><?php echo the_sub_field('text_heading'); ?></h2>
          </div>
        </div>
      </div>
      <div class="row waypoint waypoint-bottom-to-top">
        <div class="col-xs-6 col-xs-offset-3 col-sm-2 col-sm-offset-5">
          <div class="horiz-rule"></div>
          <div class="padding-sm"></div>
        </div>
      </div>
      <div class="row waypoint waypoint-bottom-to-top">
        <div class="col-md-10 col-md-offset-1">
          <div class="section-sub-heading text-center">
            <?php the_sub_field( 'text_sub-heading' ); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="padding-sm"></div>
    <div class="row waypoint waypoint-bottom-to-top">
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <div class="row slides">
          <?php
          $query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1 ) );
          while( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-sm-6 col-md-4 testimonial slide">
                <div class="slide-content">
                  <div class="title">
                    <h3><?php the_title(); ?></h3>
                  </div>
                  <div class="content">
                    <p>&ldquo;<?php the_field('testimonial_content'); ?>&rdquo;</p>
                  </div>
                </div>
                <div class="sm-diamond-pointer"></div>
                <div class="slide-attribution">
                  <div class="attribution">
                    <strong><?php the_field('attribution'); ?></strong>
                  </div>
                </div>
              </div>
          <?php
          wp_reset_query();
          endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php if( get_sub_field( 'text_heading' ) ) { ?>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="padding-lg"></div>
      </div>
    </div>
  <?php } ?>
</section>
