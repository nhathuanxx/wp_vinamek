<?php
/* Template to handle WooCommerce pages if present */
get_header(); ?>
			<?php
// get_template_part('template-parts/page', 'title', array(
//     'bg' => get_template_directory_uri() . '/images/background/custom.jpg'
// ));
get_template_part('template-parts/page', 'title');
?>
<div class="sidebar-page-container">
  <div class="auto-container">
  <?php if (function_exists('woocommerce_content')) {
    woocommerce_content();
  } else {
    _e('WooCommerce not active.', 'vinamek');
  } ?>
  </div>
</div>
<?php get_footer(); ?>