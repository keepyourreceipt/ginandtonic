<div class="nav-menu fixed-top-menu">
  <?php
    $company_logo_obj = get_field('company_logo', 'option');
    $company_logo = $company_logo_obj['sizes']['nav-logo'];
  ?>
  <div class="company-logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php echo $company_logo; ?>" alt="" />
    </a>
  </div>
  <?php
    $defaults = array(
      'theme_location'  => '',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => 'fixed-top-menu-inner',
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
    <div class="menu-toggle-container">
      <div class="menu-toggle">
        <span class="menu-toggle-bar one"></span>
        <span class="menu-toggle-bar two"></span>
        <span class="menu-toggle-bar three"></span>
      </div>
    </div>
</div>

<div class="nav-menu off-canvas-menu">
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
