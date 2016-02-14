<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php
        while( have_posts() ) : the_post();
          the_content();
        endwhile;
        ?>
    </div>
  </div>
</div>
