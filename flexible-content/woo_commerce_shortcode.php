<div class="row woo-commerce-content-row">
  <div class="container">
    <div class="col-sm-12">
      <?php
          $woo_commerce_shortcode = get_sub_field('woo_commerce_shortcode');
          echo do_shortcode( $woo_commerce_shortcode );
      ?>
    </div>
  </div>
</div>
