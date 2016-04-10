<section class="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row slides">
          <?php
            $query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1 ) );
            while( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-sm-4 slide">
                  <h3><?php the_title(); ?></h3>
                  <p><?php the_field('testimonial_content'); ?></p>
                </div>
            <?php
            endwhile;
            ?>
          </div>
      </div>
    </div>
  </div>
</section>
