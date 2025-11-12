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
    'category__in'   => $categories,
    'post__not_in'   => array(get_the_ID()),
    'posts_per_page' => 3,
));
if ($related->have_posts()) :
?>
<div class="related-posts-section">
    <h3 class="related-title">
        <?php echo pll_current_language('slug') === 'vi' ? 'Bài viết liên quan' : 'Related Posts'; ?>
    </h3>
    <div class="related-posts-grid">
        <?php while ($related->have_posts()) : $related->the_post(); ?>
            <div class="related-post-card">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="related-thumb">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="related-info">
                        <h4 class="related-title-post"><?php the_title(); ?></h4>
                        <span class="related-date"><?php echo get_the_date(); ?></span>
                        <p class="related-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15, '…'); ?></p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; wp_reset_postdata(); ?>
<!-- End Bài viết liên quan -->

  <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>
<style>
  .related-posts-section {
    margin: 60px 0px;
}
.related-posts-section .related-title {
    font-size: 22px;
    color: #13b5ea;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.related-posts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.related-post-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    transition: transform 0.15s ease, box-shadow 0.15s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.related-post-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.1);
}

.related-post-card a {
    display: flex;
    flex-direction: column;
    color: inherit;
    text-decoration: none;
    height: 100%;
}

.related-thumb img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.related-info {
    padding: 12px 15px;
}

.related-title-post {
    font-size: 16px;
    margin: 0 0 6px;
    color: #111;
}

.related-date {
    font-size: 13px;
    color: #666;
    margin-bottom: 8px; /* cách excerpt */
}

.related-excerpt {
    font-size: 14px;
    color: #444;
    line-height: 1.4;
    margin-bottom: 12px; /* khoảng cách dưới bài viết */
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* giới hạn 3 dòng */
    -webkit-box-orient: vertical;
}

/* Responsive */
@media (max-width: 992px) {
    .related-posts-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .related-posts-grid {
        grid-template-columns: 1fr;
    }
}
</style>