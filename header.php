<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
          if( the_field('primary_font_scripts', 'option') ) {
            the_field('primary_font_scripts', 'option');
          }
          ?>
    <?php wp_head(); ?>
    </head>
    <body>
      <?php
        if( get_field('primary_font_family', 'option') ) { ?>
          <style media="screen">
            body { font-family: <?php the_field('primary_font_family', 'option'); ?>; }
          </style>
        <?php
        }
      ?>
      <div class="off-canvas-menu">
        <div class="off-canvas-menu-opener">
          <span class="off-canvas-nav-opener-bar-one"></span>
          <span class="off-canvas-nav-opener-bar-two"></span>
          <span class="off-canvas-nav-opener-bar-three"></span>
        </div>
        <?php
          $defaults = array(
          	'theme_location'  => '',
          	'menu'            => '',
          	'container'       => 'div',
          	'container_class' => 'off-canvas-nav',
          	'container_id'    => '',
          	'menu_class'      => 'menu',
          	'menu_id'         => '',
          	'echo'            => true,
          	'fallback_cb'     => 'wp_page_menu',
          	'before'          => '',
          	'after'           => '',
          	'link_before'     => '',
          	'link_after'      => '',
          	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          	'depth'           => 0,
          	'walker'          => ''
          );

          wp_nav_menu( $defaults );
          ?>
      </div>
