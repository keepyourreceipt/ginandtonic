<div class="row contact-form">
  <div class="container">
    <div class="col-sm-12">
      <?php
        $shortcode = get_sub_field('contact_form_shortcode');
        echo do_shortcode( $shortcode );
      ?>
    </div>
  </div>
</div>
