<?php
  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }
?>
<section class="info-tables" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <?php
            $number_of_tables = get_sub_field( 'number_of_tables' );
            if( $number_of_tables == "two" ) {
              $classes = "col-sm-6";
            } else {
              $classes = "col-sm-4";
            }
          ?>
          <div class="waypoint waypoint-bottom-to-top <?php echo $classes; ?>">
            <?php
              $header_background_color = get_sub_field( 'table_one_header_background_color' );
              $header_text_color = get_sub_field( 'table_one_header_text_color' );
              ?>
            <table>
              <thead style="background-color: <?php echo $header_background_color; ?>; color: <?php echo $header_text_color; ?>;">
                <tr>
                  <th>
                    <span><?php the_sub_field('table_one_introduction'); ?></span>
                    <h3><?php the_sub_field('table_one_heading'); ?></h3>
                    <span><?php the_sub_field('table_one_sub_heading'); ?></span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if( have_rows('table_one_data') ) {
                  while( have_rows('table_one_data') ) : the_row(); ?>
                    <tr>
                      <td class="<?php the_sub_field('availability'); ?>">
                        <?php the_sub_field('table_row'); ?>
                      </td>
                    </tr>
                  <?php
                  endwhile;
                } ?>
              </tbody>
            </table>
          </div>

          <div class="waypoint waypoint-bottom-to-top anim-time-medium <?php echo $classes; ?>">
            <?php
              $header_background_color = get_sub_field( 'table_two_header_background_color' );
              $header_text_color = get_sub_field( 'table_two_header_text_color' );
              ?>
            <table>
              <thead style="background-color: <?php echo $header_background_color; ?>; color: <?php echo $header_text_color; ?>;">
                <tr>
                  <th>
                    <span><?php the_sub_field('table_two_introduction'); ?></span>
                    <h3><?php the_sub_field('table_two_heading'); ?></h3>
                    <span><?php the_sub_field('table_two_sub_heading'); ?></span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if( have_rows('table_two_data') ) {
                  while( have_rows('table_two_data') ) : the_row(); ?>
                    <tr>
                      <td class="<?php the_sub_field('availability'); ?>">
                        <?php the_sub_field('table_row'); ?>
                      </td>
                    </tr>
                  <?php
                  endwhile;
                } ?>
              </tbody>
            </table>
          </div>


          <?php if( $number_of_tables == "three" ) { ?>
            <div class="waypoint waypoint-bottom-to-top anim-time-long <?php echo $classes; ?>">
              <?php
                $header_background_color = get_sub_field( 'table_three_header_background_color' );
                $header_text_color = get_sub_field( 'table_three_header_text_color' );
                ?>
              <table>
                <thead style="background-color: <?php echo $header_background_color; ?>; color: <?php echo $header_text_color; ?>;">
                  <tr>
                    <th>
                      <span><?php the_sub_field('table_three_introduction'); ?></span>
                      <h3><?php the_sub_field('table_three_heading'); ?></h3>
                      <span><?php the_sub_field('table_three_sub_heading'); ?></span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if( have_rows('table_three_data') ) {
                    while( have_rows('table_three_data') ) : the_row(); ?>
                      <tr>
                        <td class="<?php the_sub_field('availability'); ?>">
                          <?php the_sub_field('table_row'); ?>
                        </td>
                      </tr>
                    <?php
                    endwhile;
                  } ?>
                </tbody>
              </table>
            </div>
            <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
