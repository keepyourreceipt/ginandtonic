<?php if( get_sub_field('spacing') == "non-padded" ) {
  $padding = "style='padding-top: 5vh; padding-bottom: 5vh;'";
} ?>
<div class="flexible-content-grid" <?php if( isset( $padding ) ) { echo $padding; } ?>>
  <div class="row">
    <div class="container">
    <?php
      $number_of_columns = get_sub_field('number_of_columns');
      $width_classes = "col-sm-" . $number_of_columns;

      if( have_rows('col_one_flexible_content') ) { ?>
        <div class="<?php echo $width_classes; ?>">
          <?php
            while ( have_rows('col_one_flexible_content') ) : the_row();
            	// Include content blocks
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
              // Include content blocks
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
              // Include content blocks
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
              // Include content blocks
              $content_block = get_row_layout();
              include ( TEMPLATEPATH . "/flexible-content/flexible-content-grid/" . $content_block . '.php');
            endwhile;
          ?>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
