<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <?php
        while( have_posts() ) : the_post();
          the_content();
        endwhile;
        ?>
    </div>
  </div>
</div>
