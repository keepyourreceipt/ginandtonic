<div class="row">
  <div class="container">
    <?php $query = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 3 ) ); ?>
    <?php while( $query->have_posts() ) : $query->the_post(); ?>

      <div class="col-sm-4">
        <h2><?php the_title(); ?></h2>
        <a href="<?php echo $_SERVER['REQUEST_URI'] . '/?add-to-cart=' . get_the_ID(); ?>">Buy</a>
      </div>

    <?php endwhile; ?>
  </div>
</div>
