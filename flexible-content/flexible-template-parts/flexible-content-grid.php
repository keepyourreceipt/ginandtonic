<?php
  $background_image = get_sub_field( 'background_image' );
  get_sub_field( 'background_style' ) == "cover" ? $container_classes = "background-tiled" : $container_classes = "background-cover";
  $inline_styles = "style='";
  $inline_styles .= "text-align:" . get_sub_field( 'text_align') . ";";
  $inline_styles .= "background-image: url(" . $background_image['sizes']['full-hd'] . "); ";
  $inline_styles .= "'";
 ?>
<div class="content-grid flexible" <?php echo $inline_styles; ?>>
  <div class="container">
    <?php if( get_sub_field( 'background_style' ) == "cover" ) { ?>
      <div class="image-overlay light">
        <?php // Image overlay ?>
      </div>
    <?php } ?>
    <div class="row">
    <?php
      $number_of_columns = get_sub_field('number_of_columns');
      $width_classes = "col-sm-" . $number_of_columns;

      if( have_rows('col_one_flexible_content') ) { ?>
        <div class="<?php echo $width_classes; ?>">
          <?php
            while ( have_rows('col_one_flexible_content') ) : the_row();
           		$content_block = get_row_layout();
           		include ( TEMPLATEPATH . "/flexible-content/flexible-content-grid/" . $content_block . '.php');
            endwhile;
          ?>
        </div>
      <?php } ?>

      <?php
      if( have_rows('col_two_flexible_content') && $number_of_columns < 12 ) { ?>
        <div class="<?php echo $width_classes; ?>">
          <?php
            while ( have_rows('col_two_flexible_content') ) : the_row();
              $content_block = get_row_layout();
              include ( TEMPLATEPATH . "/flexible-content/flexible-content-grid/" . $content_block . '.php');
            endwhile;
          ?>
        </div>
      <?php } ?>

      <?php
      if( have_rows('col_three_flexible_content') && $number_of_columns < 6 ) { ?>
        <div class="<?php echo $width_classes; ?>">
          <?php
            while ( have_rows('col_three_flexible_content') ) : the_row();
              $content_block = get_row_layout();
              include ( TEMPLATEPATH . "/flexible-content/flexible-content-grid/" . $content_block . '.php');
            endwhile;
          ?>
        </div>
      <?php } ?>

      <?php
      if( have_rows('col_two_flexible_content') && $number_of_columns < 4 ) { ?>
        <div class="<?php echo $width_classes; ?>">
          <?php
            while ( have_rows('col_two_flexible_content') ) : the_row();
              $content_block = get_row_layout();
              include ( TEMPLATEPATH . "/flexible-content/flexible-content-grid/" . $content_block . '.php');
            endwhile;
          ?>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
