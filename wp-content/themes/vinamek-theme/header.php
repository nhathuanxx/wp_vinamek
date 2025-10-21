<?php

/**
 * Header template for Vinamek Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="page-wrapper">
    <!-- Main Header -->
    <header class="main-header header-style-one">

      <!-- Header Upper -->
      <div class="header-upper">
        <div class="outer-container">
          <div class="clearfix">

            <!-- Logo -->
            <div class="pull-left logo-box">
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php
                  if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/logo.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                  }
                  ?>
                </a>
              </div>
            </div>

            <!-- Option list -->
            <div class="outer-box clearfix">
              <ul class="option-list">
                <li><span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span><strong>Tel:</strong> +00 00 0000 00</li>
                <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><span class="icon flaticon-calendar-2"></span><strong>Appointment</strong></a></li>
              </ul>
            </div>

            <!-- Navigation -->
            <div class="nav-outer clearfix">
              <nav class="main-menu navbar-expand-md">
                <div class="navbar-header">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'vinamek'); ?>">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                  <?php
                  if (has_nav_menu('main-menu')) {
                    wp_nav_menu(array(
                      'theme_location' => 'main-menu',
                      'container'      => false,
                      'menu_class'     => 'navigation clearfix',
                      'depth'          => 3,
                      'fallback_cb'    => false,
                      'walker'         => new WP_Bootstrap_Navwalker(),
                    ));
                  }
                  ?>
                </div>

                <!-- Cart Box -->
                <?php if (class_exists('WooCommerce')) : ?>
                  <div class="cart-box">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                      <span class="icon flaticon-shopping-cart-of-checkered-design"></span>
                      <span class="number"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                  </div>
                <?php endif; ?>

              </nav>
            </div><!-- /.nav-outer -->
          </div><!-- /.clearfix -->
        </div><!-- /.outer-container -->
      </div>
      <!-- End Header Upper -->

      <!-- Hidden Nav Toggler -->
      <div class="nav-toggler">
        <div class="nav-btn">
          <button class="hidden-bar-opener"><span class="icon flaticon-menu"></span></button>
        </div>
      </div>

      <!-- Sticky Header -->
      <div class="sticky-header">
        <div class="auto-container clearfix">

          <!-- Logo -->
          <div class="logo pull-left">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="img-responsive">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-small.png'); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
          </div>

          <!-- Right Col -->
          <div class="right-col pull-right">
            <nav class="main-menu navbar-expand-md">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'vinamek'); ?>">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                <?php
                if (has_nav_menu('main-menu')) {
                  wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'navigation clearfix',
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new WP_Bootstrap_Navwalker(),
                  ));
                }
                ?>
              </div>
            </nav>
          </div>

        </div>
      </div>
      <!-- End Sticky Header -->

      <!-- Fullscreen Menu -->
      <div class="fullscreen-menu">
        <div class="close-menu"><span class="flaticon-cancel-1"></span></div>
        <div class="menu-outer-container">
          <div class="menu-box">
            <nav class="full-menu">
              <?php
              if (has_nav_menu('main-menu')) {
                wp_nav_menu(array(
                  'theme_location' => 'main-menu',
                  'container'      => false,
                  'menu_class'     => 'navigation clearfix',
                  'depth'          => 3,
                  'fallback_cb'    => false,
                  'walker'         => new WP_Fullscreen_Navwalker(),
                ));
              }
              ?>
            </nav>
          </div>
        </div>
      </div>
      <!-- End Fullscreen Menu -->

    </header>
    <!-- End Main Header -->

    <main class="site-content">