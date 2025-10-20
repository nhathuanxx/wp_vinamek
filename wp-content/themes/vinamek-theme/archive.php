<?php get_header(); ?>
<section class="container">
  <h1><?php the_archive_title(); ?></h1>
  <?php if (have_posts()) : ?>
    <div class="product-list">
      <?php while (have_posts()) : the_post(); ?>
        <div class="product-item">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
            <h3><?php the_title(); ?></h3>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p><?php _e('No items found.', 'vinamek'); ?></p>
  <?php endif; ?>
</section>
<?php get_footer(); ?>
