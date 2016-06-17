<?php
  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }
?>
<section class="accordion" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <?php if( get_field( 'primary_brand_color', 'option' ) ) { ?>
            <style>
              .accordion .panel-heading .panel-title a:after {
                color: <?php the_field( 'primary_brand_color', 'option' ); ?> !important;
              }
            </style>
        <?php } ?>

        <?php $panel_group_id = rand(1, 100); ?>
        <div class="panel-group" id="accordion-<?php echo $panel_group_id; ?>" role="tablist" aria-multiselectable="true">
            <?php
            if( have_rows('accordion') ) {
              $counter = 1;
              while ( have_rows('accordion') ) : the_row(); ?>
                <div class="panel panel-default waypoint waypoint-bottom-to-top">
                  <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion-<?php echo $panel_group_id; ?>" href="#collapse-<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $counter; ?>">
                        <?php the_sub_field( 'text_heading' ); ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-<?php echo $counter; ?>" class="panel-collapse collapse <?php  if( $counter == 1 ) { echo "in"; } ?>" role="tabpanel" aria-labelledby="heading-<?php echo $counter; ?>">
                    <div class="panel-body">
                      <?php the_sub_field( 'text_editor' ); ?>
                    </div>
                  </div>
                </div>
              <?php
              $counter++;
              endwhile;
            } ?>
        </div>
      </div>
    </div>
  </div>
</section>
