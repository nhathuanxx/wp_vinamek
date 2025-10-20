<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="container">
    <div class="logo-box">
      <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php if (function_exists('the_custom_logo')) { the_custom_logo(); } else { bloginfo('name'); } ?>
      </a>
    </div>
    <div class="site-branding">
      <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
      <p class="site-description"><?php bloginfo('description'); ?></p>
    </div>
    <nav class="main-nav">
      <?php wp_nav_menu(array('theme_location'=>'main-menu','container'=>false)); ?>
    </nav>
  </div>
</header>
<main class="site-content">
