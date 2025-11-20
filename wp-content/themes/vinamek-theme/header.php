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
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css" rel="stylesheet">
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
            <div class="pull-left logo-box desktop-logo-container">
              <div class="logo">
                <a href="<?php echo esc_url(pll_home_url(pll_current_language())); ?>">
                  <?php
                  // Lấy logo từ ACF Options Page
                  $acf_logo = get_field('logo', 'option'); // 'option' nếu lưu trên Options Page

                  if ($acf_logo) {
                    // Image Array, chiều cao 60px
                    echo '<img src="' . esc_url($acf_logo['url']) . '" alt="' . esc_attr($acf_logo['alt']) . '" class="site-logo">';
                  } else {
                    // Fallback: logo mặc định trong theme
                    echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/vinamek/vinamek-logo-name1.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="site-logo">';
                  }
                  ?>
                </a>
              </div>
              <!-- <?php if (class_exists('WooCommerce')) : ?>
                  <div class="cart-box-mobile">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                      <span style="font-size:20px" class="icon flaticon-shopping-cart-of-checkered-design"></span>
                      <span class="number"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                  </div>
                <?php endif; ?> -->
            </div>


            <!-- Option list -->
            <div class="outer-box clearfix">
              <ul class="option-list" style="margin-bottom:0">
                <li><span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span><strong>Tel:</strong> <?php
                                                                                                                          // Lấy số điện thoại từ ACF Options Page
                                                                                                                          $so_dien_thoai = get_field('so_dien_thoai', 'option');

                                                                                                                          if ($so_dien_thoai) {
                                                                                                                            // Loại bỏ khoảng trắng hoặc ký tự không cần thiết để dùng tel:
                                                                                                                            $tel_number = preg_replace('/\D+/', '', $so_dien_thoai);
                                                                                                                            echo '<a href="tel:' . esc_attr($tel_number) . '">' . esc_html($so_dien_thoai) . '</a>';
                                                                                                                          } else {
                                                                                                                            // Fallback nếu chưa có số
                                                                                                                            echo '+00 00 0000 00';
                                                                                                                          }
                                                                                                                          ?></li>
                <li><?php
                    // Lấy số điện thoại từ ACF Options Page
                    $so_dien_thoai = get_field('so_dien_thoai_2', 'option');

                    if ($so_dien_thoai) {
                      // Loại bỏ khoảng trắng hoặc ký tự không cần thiết để dùng tel:
                      $tel_number = preg_replace('/\D+/', '', $so_dien_thoai);
                      echo '<a href="tel:' . esc_attr($tel_number) . '">' . esc_html($so_dien_thoai) . '</a>';
                    } else {
                      // Fallback nếu chưa có số
                      echo '+00 00 0000 00';
                    }
                    ?></li>
                <li>
                  <?php
                  $translations = pll_the_languages(array(
                    'raw' => 1,
                    'hide_if_no_translation' => 0, // hiển thị tất cả ngôn ngữ
                  ));

                  if (!empty($translations)) :
                    $current_lang = pll_current_language('slug');
                    $url_flags = get_template_directory_uri() . '/assets/images/vinamek/';
                  ?>
                    <div class="header-lang-content">

                      <!-- Hiển thị cờ ngôn ngữ hiện tại -->
                      <div class="lang-img-container">
                        <?php
                        if (isset($translations[$current_lang])) {
                          echo '<img class="lang-img" src="' . esc_url($url_flags . 'flag-' . $current_lang . '.png') . '" alt="' . esc_attr($current_lang) . '">';
                        }
                        ?>
                      </div>

                      <select class="select-circle" onchange="if(this.value){window.location=this.value;}">
                        <?php foreach ($translations as $lang => $translation) : ?>
                          <option
                            value="<?php echo esc_url($translation['url']); ?>"
                            <?php selected($translation['current_lang'], true); ?>>
                            <?php echo esc_html($translation['name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>

                    </div>
                  <?php endif; ?>
                </li>
              </ul>
            </div>

            <!-- Navigation -->
            <div class="nav-outer clearfix">
              <nav class="main-menu navbar-expand-md">
                <div class="navbar-header">
                  <div class="pull-left logo-box mobile-logo-container">
                    <div class="logo">
                      <a href="<?php echo esc_url(pll_home_url(pll_current_language())); ?>">
                        <?php
                        // Lấy logo từ ACF Options Page
                        $acf_logo = get_field('logo', 'option'); // 'option' nếu lưu trên Options Page

                        if ($acf_logo) {
                          // Image Array, chiều cao 60px
                          echo '<img src="' . esc_url($acf_logo['url']) . '" alt="' . esc_attr($acf_logo['alt']) . '" class="site-logo">';
                        } else {
                          // Fallback: logo mặc định trong theme
                          echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/vinamek/vinamek-logo-name1.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="site-logo">';
                        }
                        ?>
                      </a>
                    </div>
                    <div class="menu-mobile-right">
                      <div> <?php if (class_exists('WooCommerce')) : ?>
                          <div class="cart-box-mobile">
                            <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                              <span style="font-size:20px" class="icon flaticon-shopping-cart-of-checkered-design"></span>
                              <span class="number"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </a>
                          </div>
                        <?php endif; ?>
                      </div>
                      <?php
                      $translations = pll_the_languages(array(
                        'raw' => 1,
                        'hide_if_no_translation' => 0,
                      ));

                      if (!empty($translations)) :
                        $current_lang = pll_current_language('slug');
                        $url_flags = get_template_directory_uri() . '/assets/images/vinamek/';
                      ?>
                        <div class="header-lang-content-mobile">
                          <!-- Hiển thị cờ ngôn ngữ hiện tại -->
                          <div class="lang-img-container">
                            <?php
                            if (isset($translations[$current_lang])) {
                              echo '<img class="lang-img" src="' . esc_url($url_flags . 'flag-' . $current_lang . '.png') . '" alt="' . esc_attr($current_lang) . '">';
                            }
                            ?>
                          </div>

                          <select class="select-circle" onchange="if(this.value){window.location=this.value;}">
                            <?php foreach ($translations as $lang => $translation) : ?>
                              <option
                                value="<?php echo esc_url($translation['url']); ?>"
                                <?php selected($translation['current_lang'], true); ?>
                                style="background-image: url('<?php echo esc_url($url_flags . 'flag-' . $lang . '.png'); ?>'); background-size: 20px; background-repeat: no-repeat; background-position: 5px center; padding-left: 30px;">
                                <?php echo esc_html(strtoupper($lang)); ?>
                              </option>
                            <?php endforeach; ?>
                          </select>

                        </div>
                      <?php endif; ?>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'vinamek'); ?>">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                  </div>

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
            <a href="<?php echo esc_url(pll_home_url(pll_current_language())); ?>" class="img-responsive">
              <?php
              // Lấy logo từ ACF Options Page
              $acf_logo = get_field('logo', 'option'); // 'option' nếu lưu trên Options Page

              if ($acf_logo) {
                // Image Array, chiều cao 60px
                echo '<img src="' . esc_url($acf_logo['url']) . '" alt="' . esc_attr($acf_logo['alt']) . '" class="site-logo">';
              } else {
                // Fallback: logo mặc định trong theme
                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/vinamek/vinamek-logo-name1.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="site-logo">';
              }
              ?> </a>
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

      <style>
        .main-header .header-upper .logo-box {
          margin-right: 80px;
          position: relative;
          top: 25px;
          display: flex;
          justify-content: space-between;
        }

        .logo-box .cart-box-mobile {
          display: none !important;
        }

        .cart-box-mobile .number {
          position: absolute;
          right: unset;
          top: -8px;
          color: #13b5ea;
          /* padding:4px; */
          font-size: 14px;
        }


        .nav-toggler {
          display: none !important;
        }

        .header-lang-content-mobile {
          position: unset !important;
        }

        .menu-mobile-right {
          display: flex;
          gap: 8px;
          align-items: center;
        }

        .mobile-logo-container {
          display: none !important;
        }

        @media only screen and (max-width: 767px) {
          .logo-box .cart-box-mobile {
            display: block !important;
            padding-right: 15px;
          }

          .cart-box {
            display: none !important;
          }

          .header-lang-content-mobile {
            position: unset !important;
          }

          .main-menu .navbar-header {
            padding: 0px;
          }

          .mobile-logo-container {
            display: flex !important;
            padding-bottom: 25px;
          }

          .desktop-logo-container {
            display: none !important;
          }
        }
      </style>