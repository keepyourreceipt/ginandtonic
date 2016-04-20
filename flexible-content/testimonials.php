<section class="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <div class="section-title text-center">
          <h2><?php echo the_sub_field('text_heading'); ?></h2>
        </div>
        <div class="row slides">
          <?php
          $query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1 ) );
          while( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-sm-6 col-md-4 testimonial slide">
                <div class="title">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="content">
                  <p>&ldquo;<?php the_field('testimonial_content'); ?>&rdquo;</p>
                </div>
                <div class="attribution">
                  <span>&ndash;&nbsp;<?php the_field('attribution'); ?></span>
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
</section>
