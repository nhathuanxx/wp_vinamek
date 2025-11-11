<?php

/**
 * Template Name: Blog AJAX (Danh mục trái - Bài viết phải)
 * Description: Blog với filter & pagination AJAX, skeleton loading, Polylang support.
 */
get_header();
$lang = function_exists('pll_current_language') ? pll_current_language('slug') : '';
$current_url = get_permalink();
$default_cat_id = get_option('default_category');
$uncat_terms = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'search' => 'uncategorized',
));
$uncat_vi_terms = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'search' => 'chua-phan-loai',
));
$exclude_ids = array($default_cat_id);
if (!empty($uncat_terms)) {
    foreach ($uncat_terms as $term) {
        $exclude_ids[] = $term->term_id;
    }
}
if (!empty($uncat_vi_terms)) {
    foreach ($uncat_vi_terms as $term) {
        $exclude_ids[] = $term->term_id;
    }
}
$categories = get_terms(array(
    'taxonomy'   => 'category',
    'hide_empty' => false,
    'exclude'    => array_unique($exclude_ids),
)); ?>

<div class="blog-page-container">
    <div class="blog-inner auto-container">
        <div class="blog-grid">

            <aside class="blog-sidebar">
                <div class="sidebar-box">
                    <h3 class="sidebar-title"><?php echo $lang === 'en' ? 'Categories' : 'Danh Mục'; ?></h3>

                    <form id="vinamek-search-form" class="blog-search" method="get" action="<?php echo esc_url($current_url); ?>">
                        <input id="vinamek-search-input" type="text" name="s" class="search-input" placeholder="<?php echo $lang === 'en' ? 'Search posts...' : 'Tìm kiếm bài viết...'; ?>" value="">
                        <button id="vinamek-search-btn" type="submit" class="search-btn"><?php echo $lang === 'en' ? 'Search' : 'Tìm'; ?></button>
                    </form>

                    <ul id="vinamek-category-list" class="category-list">
                        <li class="category-item active" data-slug="">
                            <a href="#" class="cat-link">
                                <?php echo $lang === 'en' ? 'All' : 'Tất cả'; ?>
                                <span class="cat-count"><?php echo intval(wp_count_posts('post')->publish); ?></span>
                            </a>
                        </li>

                        <?php foreach ($categories as $cat): ?>
                            <li class="category-item" data-slug="<?php echo esc_attr($cat->slug); ?>">
                                <a href="#" class="cat-link">
                                    <?php echo esc_html($cat->name); ?>
                                    <span class="cat-count"><?php echo intval($cat->count); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </aside>

            <!-- RIGHT: Posts list -->
            <main class="blog-content">
                <div class="content-header">
                    <h2 id="vinamek-list-title" class="list-title"><?php echo $lang === 'en' ? 'Latest News' : 'Tin tức mới nhất'; ?></h2>
                    <div id="vinamek-list-meta" class="list-meta">0 <?php echo $lang === 'en' ? 'results' : 'kết quả'; ?></div>
                </div>

                <!-- Posts container -->
                <div id="vinamek-posts-wrap" class="posts-grid">
                    <!-- initial skeletons -->
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <div class="post-card skeleton">
                            <div class="post-thumb skeleton-thumb"></div>
                            <div class="post-body">
                                <div class="skeleton-line title"></div>
                                <div class="skeleton-line meta"></div>
                                <div class="skeleton-line excerpt"></div>
                                <div class="skeleton-line excerpt"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <div id="vinamek-pagination" class="pagination-wrap"></div>
            </main>

        </div>
    </div>
</div>

<?php get_footer(); ?>

<style>
    :root {
        --primary: #13b5ea;
        --muted: #666;
        --bg: #f8fbfd;
        --card-bg: #fff;
        --radius: 12px;
    }

    .blog-inner {
        padding: 40px 20px;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 30px;
        align-items: start;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Sidebar */
    .blog-sidebar .sidebar-box {
        background: var(--card-bg);
        padding: 18px;
        border-radius: var(--radius);
        box-shadow: 0 6px 18px rgba(19, 181, 234, 0.08);
    }

    .sidebar-title {
        font-size: 20px;
        color: var(--primary);
        margin: 0 0 12px 0;
        text-transform: uppercase;
        letter-spacing: .6px;
    }

    .blog-search {
        display: flex;
        gap: 8px;
        margin-bottom: 14px;
    }

    .search-input {
        flex: 1;
        padding: 8px 10px;
        border: 1px solid #e6eef6;
        border-radius: 8px;
        font-size: 14px;
    }

    .search-btn {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
    }

    .category-list {
        list-style: none;
        padding: 0;
        margin: 0;
        max-height: 60vh;
        overflow: auto;
    }

    .category-item {
        margin-bottom: 8px;
    }

    .category-item a {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-radius: 8px;
        color: #333;
        text-decoration: none;
        transition: all .12s ease;
    }

    .category-item a:hover {
        background: rgba(19, 181, 234, 0.06);
        transform: translateY(-2px);
    }

    .category-item.active a {
        background: linear-gradient(90deg, rgba(19, 181, 234, 0.06), rgba(19, 181, 234, 0.02));
        border-left: 4px solid var(--primary);
        padding-left: 8px;
    }

    .cat-count {
        font-size: 13px;
        color: var(--muted);
    }

    /* Main content */
    .blog-content {}

    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
        gap: 10px;
        flex-wrap: wrap;
    }

    .list-title {
        margin: 0;
        color: var(--primary);
        font-size: 22px;
    }

    .list-meta {
        color: var(--muted);
        font-size: 14px;
    }

    /* Posts grid (stacked list) */
    .posts-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .post-card {
        display: flex;
        background: var(--card-bg);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(20, 30, 40, 0.05);
        transition: transform .12s ease;
    }

    .post-card:hover {
        transform: translateY(-6px);
    }

    .post-link {
        display: flex;
        width: 100%;
        text-decoration: none;
        color: inherit;
    }

    .post-thumb {
        flex: 0 0 240px;
        height: 150px;
        overflow: hidden;
    }

    .post-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .post-body {
        padding: 14px 18px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .post-title {
        margin: 0 0 6px 0;
        font-size: 18px;
        color: #111;
        line-height: 1.25;
    }

    .post-meta {
        font-size: 13px;
        color: var(--muted);
        margin-bottom: 8px;
    }

    .post-excerpt {
        font-size: 15px;
        color: #444;
        line-height: 1.6;
        max-height: 3.4em;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Pagination */
    .pagination-wrap {
        margin-top: 22px;
        display: flex;
        justify-content: center;
    }

    .pagination-wrap .page-numbers {
        display: inline-block;
        margin: 0 6px;
        padding: 8px 12px;
        border-radius: 8px;
        background: #fff;
        border: 1px solid #eef6fb;
        color: #333;
        text-decoration: none;
    }

    .pagination-wrap .current {
        background: var(--primary);
        color: #fff;
        border-color: var(--primary);
    }

    /* No posts */
    .no-posts {
        padding: 18px;
        background: var(--card-bg);
        border-radius: 12px;
        text-align: center;
        color: var(--muted);
    }

    /* Skeleton styles */
    .skeleton {
        position: relative;
        overflow: hidden;
        background: linear-gradient(180deg, #ffffff, #fbfeff);
    }

    .skeleton-thumb {
        width: 240px;
        height: 150px;
        background: linear-gradient(90deg, #f0f0f0, #f7f7f7, #f0f0f0);
        display: block;
    }

    .skeleton .post-body {
        padding: 14px 18px;
    }

    .skeleton-line {
        height: 14px;
        margin-bottom: 10px;
        border-radius: 6px;
        background: linear-gradient(90deg, #f0f0f0, #f7f7f7, #f0f0f0);
    }

    .skeleton-line.title {
        width: 60%;
        height: 18px;
    }

    .skeleton-line.meta {
        width: 40%;
        height: 12px;
    }

    .skeleton-line.excerpt {
        width: 100%;
        height: 12px;
    }

    .posts-grid.loading .skeleton {
        animation: pulse 1.2s infinite;
    }

    @keyframes pulse {
        0% {
            opacity: 1
        }

        50% {
            opacity: .6
        }

        100% {
            opacity: 1
        }
    }

    /* Responsive */
    @media (max-width: 992px) {
        .blog-grid {
            grid-template-columns: 1fr;
        }

        .post-card {
            flex-direction: column;
        }

        .post-thumb {
            width: 100%;
            height: 220px;
        }

        .post-body {
            padding: 16px;
        }

        .blog-sidebar {
            order: 2;
        }

        .blog-content {
            order: 1;
        }
    }

    @media (max-width: 480px) {
        .blog-inner {
            padding: 20px 12px;
        }

        .list-title {
            font-size: 18px;
        }

        .sidebar-title {
            font-size: 16px;
        }
    }
</style>