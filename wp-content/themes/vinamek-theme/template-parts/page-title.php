<?php
/**
 * Reusable Page Title component
 * Usage: get_template_part('template-parts/page', 'title', array('bg' => $bg_image));
 */

$bg_image = isset($args['bg']) ? $args['bg'] : get_template_directory_uri() . '/assets/images/background/2.jpg';
?>
<?php $lang = pll_current_language('slug'); ?>

<section class="page-title" style="background-image:url(<?php echo esc_url($bg_image); ?>);">
    <div class="auto-container">
        <h2>
            <?php
            if (is_archive()) {
                the_archive_title(); // Tên danh mục / tag / archive
            } elseif (is_singular()) {
                the_title(); // Tiêu đề bài viết hoặc sản phẩm
            } else {
                bloginfo('name'); // Tiêu đề mặc định site
            }
            ?>
        </h2>
    </div>
</section>
<!--End Page Title-->

<!--Breadcrumb-->
<div class="breadcrumb-outer">
    <div class="auto-container">
        <ul class="bread-crumb text-center">
            <li><a href="<?php echo home_url(); ?>"><?php echo ($lang === 'vi') ? 'Trang chủ' : 'Home'; ?>
</a> <span class="fa fa-angle-right"></span></li>
            <li>
                <?php
                if (is_archive()) {
                    the_archive_title();
                } elseif (is_singular()) {
                    the_title();
                } else {
                    echo 'Page';
                }
                ?>
            </li>
        </ul>
    </div>
</div>
