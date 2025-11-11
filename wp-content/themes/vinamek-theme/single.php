<?php get_header(); ?>
<?php get_template_part('template-parts/page', 'title'); ?>

<div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div><?php the_content(); ?></div>

    <!-- Bài viết liên quan -->
    <?php
    $categories = wp_get_post_categories(get_the_ID());
    $related = new WP_Query(array(
        'category__in'   => $categories,   // cùng category
        'post__not_in'   => array(get_the_ID()), // bỏ bài hiện tại
        'posts_per_page' => 3,              // số bài liên quan muốn hiển thị
    ));
    if ($related->have_posts()) :
    ?>
      <div class="related-posts">
        <h3><?php echo pll_current_language('slug') === 'vi' ? 'Bài viết liên quan' : 'Related Posts'; ?></h3>
        <ul>
          <?php while ($related->have_posts()) : $related->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
        </ul>
      </div>
    <?php endif; wp_reset_postdata(); ?>
    <!-- End Bài viết liên quan -->

  <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
