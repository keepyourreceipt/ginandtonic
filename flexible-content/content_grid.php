<?php
  $background_image = null;
  if( get_sub_field( 'background_image' ) ) {
    $background_image_obj = get_sub_field( 'background_image' );
    $background_image = $background_image_obj['sizes']['full-hd'];
  }

  $inline_styles = "style='";

  if( $background_image ) {
    $inline_styles .= "background-image: url(";
    $inline_styles .= $background_image;
    $inline_styles .= ");'";
  }
  if( get_sub_field( 'background_color' ) ) {
      $inline_styles .= "background-color: " . get_sub_field( 'background_color' ) . ";";
  }

  $inline_styles .= "'";

  if( get_sub_field( 'background_style' ) == "cover" ) {
    $container_classes = "background-tiled";
  } else {
    $container_classes = "background-cover";
  }


  $padding_classes = ['padding-top' => 'default-padding-top', 'padding-bottom' => 'default-padding-bottom'];
  if( get_sub_field('padding_top') == "non-padded" ) {
    $padding_classes['padding-top'] = "remove-padding-top";
  }
  if( get_sub_field('padding_bottom') == "non-padded" ) {
    $padding_classes['padding-bottom'] = "remove-padding-bottom";
  }
 ?>
<div class="content-grid flexible <?php echo implode(' ', $padding_classes); ?>" <?php echo $inline_styles; ?>>
  <div class="container">
    <?php if( get_sub_field( 'background_style' ) == "cover" ) { ?>
      <div class="image-overlay light">
        <?php // Image overlay ?>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
        <?php
          $number_of_columns = get_sub_field('number_of_columns');
          $width_classes = "col-sm-" . $number_of_columns;

          if( have_rows('col_one_flexible_content') ) { ?>
            <div class="content-grid-item <?php echo $width_classes; ?>">
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
            <div class="content-grid-item <?php echo $width_classes; ?>">
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
            <div class="content-grid-item <?php echo $width_classes; ?>">
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
            <div class="content-grid-item <?php echo $width_classes; ?>">
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
  </div>
</div>
