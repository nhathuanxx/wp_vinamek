<?php
// Vinamek Theme functions.php
function vinamek_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
  add_theme_support('menus');
  add_theme_support('html5', array('search-form','gallery','caption'));
  load_theme_textdomain('vinamek', get_template_directory() . '/languages');
  register_nav_menus(array(
    'main-menu' => __('Main Menu', 'vinamek'),
    'footer-menu' => __('Footer Menu', 'vinamek'),
  ));
}
add_action('after_setup_theme', 'vinamek_theme_setup');

function vinamek_enqueue_assets() {
  $theme_uri = get_template_directory_uri();
  // CSS
  wp_enqueue_style('bootstrap', $theme_uri . '/assets/css/bootstrap.min.css');
  wp_enqueue_style('vinamek-style', $theme_uri . '/assets/css/style.css', array('bootstrap'));
  wp_enqueue_style('jquery-ui', $theme_uri . '/assets/css/jquery-ui.css');

  // JS - use WP bundled jquery
  wp_enqueue_script('jquery');
  wp_enqueue_script('popper', $theme_uri . '/assets/js/popper.min.js', array('jquery'), null, true);
  wp_enqueue_script('bootstrap', $theme_uri . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
  wp_enqueue_script('mCustomScrollbar', $theme_uri . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), null, true);
  wp_enqueue_script('fancybox', $theme_uri . '/assets/js/jquery.fancybox.js', array('jquery'), null, true);
  wp_enqueue_script('appear', $theme_uri . '/assets/js/appear.js', array('jquery'), null, true);
  wp_enqueue_script('owl', $theme_uri . '/assets/js/owl.js', array('jquery'), null, true);
  wp_enqueue_script('wow', $theme_uri . '/assets/js/wow.js', array('jquery'), null, true);
  wp_enqueue_script('slick', $theme_uri . '/assets/js/slick.js', array('jquery'), null, true);
  wp_enqueue_script('isotope', $theme_uri . '/assets/js/isotope.js', array('jquery'), null, true);
  wp_enqueue_script('jquery-ui', $theme_uri . '/assets/js/jquery-ui.js', array('jquery'), null, true);
  wp_enqueue_script('color-settings', $theme_uri . '/assets/js/color-settings.js', array('jquery'), null, true);
  wp_enqueue_script('vinamek-main', $theme_uri . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'vinamek_enqueue_assets');

// Polylang helper: register some strings if Polylang exists
function vinamek_register_strings() {
  if (function_exists('pll_register_string')) {
    pll_register_string('vinamek_site_title', get_bloginfo('name'), 'Vinamek Theme');
    pll_register_string('vinamek_description', get_bloginfo('description'), 'Vinamek Theme');
  }
}
add_action('init', 'vinamek_register_strings');
