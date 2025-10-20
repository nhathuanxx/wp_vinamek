<?php
// Simple product list item template (used by archive)
?>
<div class="product-item">
  <a href="<?php the_permalink(); ?>">
    <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
    <h3><?php the_title(); ?></h3>
  </a>
</div>
