<?php
  $has_toolbar = false;
  if( get_field('show_top_toolbar', 'option') == "Show Top Toolbar" ) {
    $has_toolbar = true;
  ?>
  <div class="top-nav-toolbar hidden-xs hidden-sm">
    <div class="toolbar-contact-info">
      <?php if( get_field( 'public_email_address', 'option' ) ) { ?>
        <div class="email">
          <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;
          <a href="mailto:<?php the_field( 'public_email_address', 'option' ); ?>">
            <?php the_field( 'public_email_address', 'option' ); ?>
          </a>
        </div>
      <?php } ?>
      <?php if( get_field( 'phone_number', 'option' ) ) { ?>
        <div class="phone">
          <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;
          <a href="tel:<?php the_field( 'phone_number', 'option' ); ?>">
            <?php the_field( 'phone_number', 'option' ); ?>
          </a>
        </div>
      <?php } ?>
    </div>
    <div class="toolbar-social-links">
      <?php if( get_field('facebook', 'option') ) { ?>
        <a href="<?php the_field('facebook', 'option'); ?>" target="_blank">
          <i class="fa fa-facebook-official"></i>
        </a>
      <?php } ?>
      <?php if( get_field('twitter', 'option') ) { ?>
        <a href="<?php the_field('twitter', 'option'); ?>" target="_blank">
          <i class="fa fa-twitter-square"></i>
        </a>
      <?php } ?>
      <?php if( get_field('pinterest', 'option') ) { ?>
        <a href="<?php the_field('pinterest', 'option'); ?>" target="_blank">
          <i class="fa fa-pinterest"></i>
        </a>
      <?php } ?>
      <?php if( get_field('youtube', 'option') ) { ?>
        <a href="<?php the_field('youtube', 'option'); ?>" target="_blank">
          <i class="fa fa-youtube-play"></i>
        </a>
      <?php } ?>
    </div>
  </div>
<?php } ?>

<div class="nav-menu fixed-top-menu <?php if( $has_toolbar != true ) { echo 'hide-top-toolbar'; } ?>">
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

<div class="modal-menu-toggle hidden-md hidden-lg">
  <span class="menu-toggle-bar one"></span>
  <span class="menu-toggle-bar two"></span>
  <span class="menu-toggle-bar three"></span>
</div>

<div class="modal-menu-overlay one hidden-md hidden-lg"></div>
<div class="modal-menu-overlay two hidden-md hidden-lg"></div>

<div class="modal-menu-container hidden-md hidden-lg">
  <?php
    $defaults = array(
      'theme_location'  => '',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => 'modal-menu',
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

    <?php if( $has_toolbar == true ) { ?>
      <div class="mobile-nav-toolbar-container hidden">
        <div class="mobile-nav-toolbar hidden-md hidden-lg">
          <div class="toolbar-contact-info">
            <?php if( get_field( 'public_email_address', 'option' ) ) { ?>
              <div class="email">
                <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;
                <a href="mailto:<?php the_field( 'public_email_address', 'option' ); ?>">
                  <?php the_field( 'public_email_address', 'option' ); ?>
                </a>
              </div>
            <?php } ?>

            <?php if( get_field( 'phone_number', 'option' ) ) { ?>
              <div class="phone">
                <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;
                <a href="tel:<?php the_field( 'phone_number', 'option' ); ?>">
                  <?php the_field( 'phone_number', 'option' ); ?>
                </a>
              </div>
            <?php } ?>
          </div>
          <div class="toolbar-social-links">
            <?php if( get_field('facebook', 'option') ) { ?>
              <a href="<?php the_field('facebook', 'option'); ?>" target="_blank">
                <i class="fa fa-facebook-official"></i>
              </a>
            <?php } ?>
            <?php if( get_field('twitter', 'option') ) { ?>
              <a href="<?php the_field('twitter', 'option'); ?>" target="_blank">
                <i class="fa fa-twitter-square"></i>
              </a>
            <?php } ?>
            <?php if( get_field('pinterest', 'option') ) { ?>
              <a href="<?php the_field('pinterest', 'option'); ?>" target="_blank">
                <i class="fa fa-pinterest"></i>
              </a>
            <?php } ?>
            <?php if( get_field('youtube', 'option') ) { ?>
              <a href="<?php the_field('youtube', 'option'); ?>" target="_blank">
                <i class="fa fa-youtube-play"></i>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>

</div>
