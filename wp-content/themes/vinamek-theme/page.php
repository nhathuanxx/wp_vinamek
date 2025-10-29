<?php get_header(); ?>
		<?php
// get_template_part('template-parts/page', 'title', array(
//     'bg' => get_template_directory_uri() . '/images/background/custom.jpg'
// ));
get_template_part('template-parts/page', 'title');
?>
<div class="sidebar-page-container">
  <div class="auto-container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- <h1><?php the_title(); ?></h1> -->
    <div><?php the_content(); ?></div>
  <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>
