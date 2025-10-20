<?php
/* Template to handle WooCommerce pages if present */
get_header(); ?>
<section class="container">
  <?php if (function_exists('woocommerce_content')) { woocommerce_content(); } else { _e('WooCommerce not active.', 'vinamek'); } ?>
</section>
<?php get_footer(); ?>
