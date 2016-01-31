<div class="info-tables">
  <div class="container">
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
        <table>
          <thead>
            <tr>
              <th>
                <?php the_sub_field('table_one_heading'); ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if( have_rows('table_one_data') ) {
              while( have_rows('table_one_data') ) : the_row(); ?>
                <tr>
                  <td class="<?php the_sub_field('row_status'); ?>">
                    <?php the_sub_field('table_row'); ?>
                  </td>
                </tr>
              <?php
              endwhile;
            } ?>
          </tbody>
        </table>
      </div>

      <div class="waypoint waypoint-bottom-to-top <?php echo $classes; ?>">
        <table>
          <thead>
            <tr>
              <th>
                <?php the_sub_field('table_two_heading'); ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if( have_rows('table_two_data') ) {
              while( have_rows('table_two_data') ) : the_row(); ?>
                <tr>
                  <td class="<?php the_sub_field('row_status'); ?>">
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
      <div class="waypoint waypoint-bottom-to-top <?php echo $classes; ?>">
        <table>
          <thead>
            <tr>
              <th>
                <?php the_sub_field('table_three_heading'); ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if( have_rows('table_three_data') ) {
              while( have_rows('table_three_data') ) : the_row(); ?>
                <tr>
                  <td class="<?php the_sub_field('row_status'); ?>">
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
