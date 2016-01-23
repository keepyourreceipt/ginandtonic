<?php
  if( get_field('primary_font_family', 'option') ) { ?>
    <style media="screen">
      body { font-family: <?php the_field('primary_font_family', 'option'); ?>; }
    </style>
  <?php
  }
?>
<?php
  if( get_field('secondary_font_family', 'option') ) { ?>
    <style media="screen">
      h1 { font-family: <?php the_field('secondary_font_family', 'option'); ?>; }
    </style>
  <?php
  }
?>
