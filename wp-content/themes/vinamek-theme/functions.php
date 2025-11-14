<?php
// ==============================
// Vinamek Theme - functions.php
// ==============================

function vinamek_theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
  add_theme_support('menus');
  add_theme_support('html5', array('search-form', 'gallery', 'caption'));
  load_theme_textdomain('vinamek', get_template_directory() . '/languages');

  register_nav_menus(array(
    'main-menu'   => __('Main Menu', 'vinamek'),
    'footer-menu' => __('Footer Menu', 'vinamek'),
  ));
}
add_action('after_setup_theme', 'vinamek_theme_setup');

function vinamek_enqueue_assets()
{
  $theme_uri = get_template_directory_uri();

  // -----------------------------
  // CSS
  // -----------------------------
  wp_enqueue_style('bootstrap', $theme_uri . '/assets/css/bootstrap.min.css');
  wp_enqueue_style('jquery-ui', $theme_uri . '/assets/css/jquery-ui.css');
  wp_enqueue_style('flaticon', $theme_uri . '/assets/css/flaticon.css');
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
  wp_enqueue_style('animate', $theme_uri . '/assets/css/animate.css', array(), '1.0.0');
  wp_enqueue_style('owl', $theme_uri . '/assets/css/owl.css', array(), '1.0.0');
  wp_enqueue_style('slick', $theme_uri . '/assets/css/slick.css', array(), '1.0.0');
  wp_enqueue_style('jquery-fancybox', $theme_uri . '/assets/css/jquery.fancybox.min.css', array(), '1.0.0');
  wp_enqueue_style('jquery-mCustomScrollbar', $theme_uri . '/assets/css/jquery.mCustomScrollbar.min.css', array(), '1.0.0');
  wp_enqueue_style('jquery-bootstrap-touchspin', $theme_uri . '/assets/css/jquery.bootstrap-touchspin.css', array(), '1.0.0');
  wp_enqueue_style('responsive', $theme_uri . '/assets/css/responsive.css', array(), '1.0.0');
  wp_enqueue_style('color-switcher-design', $theme_uri . '/assets/css/color-switcher-design.css', array(), '1.0.0');
  wp_enqueue_style('theme-color-file', $theme_uri . '/assets/css/color-themes/default-theme.css', array(), '1.0.0');

  wp_enqueue_style(
    'vinamek-style',
    $theme_uri . '/assets/css/style.css',
    array('bootstrap', 'font-awesome'),
    '1.0.0',
    'all'
  );
  wp_enqueue_style('vinamek-bootstrap', $theme_uri . '/assets/css/bootstrap.css', array('vinamek-style'), '1.0.0', 'all');

  wp_enqueue_style('vinamek-responsive', $theme_uri . '/assets/css/responsive.css', array('vinamek-style'), '1.0.0', 'all');

  // -----------------------------
  // JS
  // -----------------------------
  wp_enqueue_script('jquery');
  wp_enqueue_script('popper', $theme_uri . '/assets/js/popper.min.js', array('jquery'), null, true);
  wp_enqueue_script('bootstrap', $theme_uri . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
  wp_enqueue_script('mCustomScrollbar', $theme_uri . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), null, true);
  wp_enqueue_script('fancybox', $theme_uri . '/assets/js/jquery.fancybox.js', array('jquery'), null, true);
  wp_enqueue_script('appear', $theme_uri . '/assets/js/appear.js', array('jquery'), null, true);
  wp_enqueue_script('owl', $theme_uri . '/assets/js/owl.js', array('jquery'), null, true);
  wp_enqueue_script('wow', $theme_uri . '/assets/js/wow.js', array('jquery'), null, true);
  wp_enqueue_script('slick', $theme_uri . '/assets/js/slick.js', array('jquery'), null, true);
  wp_enqueue_script('isotope', $theme_uri . '/assets/js/isotope.js', array('jquery'), null, true);
  wp_enqueue_script('jquery-ui', $theme_uri . '/assets/js/jquery-ui.js', array('jquery'), null, true);
  wp_enqueue_script('color-settings', $theme_uri . '/assets/js/color-settings.js', array('jquery'), null, true);
  wp_enqueue_script('vinamek-main', $theme_uri . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'vinamek_enqueue_assets');

// -----------------------------
// Polylang
// -----------------------------
function vinamek_register_strings()
{
  if (function_exists('pll_register_string')) {
    pll_register_string('vinamek_site_title', get_bloginfo('name'), 'Vinamek Theme');
    pll_register_string('vinamek_description', get_bloginfo('description'), 'Vinamek Theme');
  }
}
add_action('init', 'vinamek_register_strings');
add_theme_support('post-thumbnails');
// ======================================================
// Bootstrap 5 Nav Walker - Tạo menu dropdown hoạt động
// ======================================================

if (!class_exists('WP_Bootstrap_Navwalker')) {
  class WP_Bootstrap_Navwalker extends Walker_Nav_Menu
  {
    // Bắt đầu cấp con
    function start_lvl(&$output, $depth = 0, $args = null)
    {
      $indent = str_repeat("\t", $depth);
      $submenu = ($depth > 0) ? ' sub-menu' : '';
      $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    // Bắt đầu 1 item menu
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
      $indent = ($depth) ? str_repeat("\t", $depth) : '';
      $classes = empty($item->classes) ? array() : (array)$item->classes;

      $classes[] = 'nav-item';
      if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown';
      }
      if ($depth && in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown-submenu';
      }
      if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
        $classes[] = 'active';
      }
      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
      $class_names = ' class="' . esc_attr($class_names) . '"';
      $output .= $indent . '<li' . $class_names . '>';

      $atts = array();
      $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
      $atts['target'] = !empty($item->target) ? $item->target : '';
      $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
      $atts['href'] = !empty($item->url) ? $item->url : '';
      $atts['class'] = 'nav-link';

      if (in_array('menu-item-has-children', $classes)) {
        $atts['class'] .= ' dropdown-toggle';
        $atts['data-bs-toggle'] = 'dropdown';
        $atts['aria-expanded'] = 'false';
        $atts['role'] = 'button';
      }

      $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
      $attributes = '';
      foreach ($atts as $attr => $value) {
        if (!empty($value)) {
          $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }
      }

      $title = apply_filters('the_title', $item->title, $item->ID);
      $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

      $item_output = $args->before;
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . $title . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
  }
}
if (!class_exists('WP_Fullscreen_Navwalker')) {
  class WP_Fullscreen_Navwalker extends Walker_Nav_Menu
  {

    // Start level
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
      $indent = str_repeat("\t", $depth);
      $classes = 'sub-menu';
      if ($depth === 0) $classes = ''; // cấp 1, bỏ class nếu muốn
      $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    // Start element
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
      $indent = ($depth) ? str_repeat("\t", $depth) : '';
      $classes = empty($item->classes) ? array() : (array) $item->classes;

      // Nếu có submenu, thêm class dropdown
      if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown';
      }

      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
      $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

      $output .= $indent . '<li' . $class_names . '>';

      $atts = array();
      $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
      $atts['target'] = !empty($item->target) ? $item->target : '';
      $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
      $atts['href']   = !empty($item->url) ? $item->url : '';

      $attributes = '';
      foreach ($atts as $attr => $value) {
        if (!empty($value)) {
          $value = esc_attr($value);
          $attributes .= " $attr=\"$value\"";
        }
      }

      $title = apply_filters('the_title', $item->title, $item->ID);

      $output .= '<a' . $attributes . '>' . $title . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
      $output .= "</li>\n";
    }
  }
}

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Theme General Settings (' . pll_current_language('slug') . ')',
    'menu_title'  => 'Theme Settings(' . pll_current_language('slug') . ')',
    'menu_slug'   => 'theme-general-settings-' . pll_current_language('slug'),
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}
add_filter('woocommerce_show_page_title', '__return_false');
add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false); // chỉ lấy tên category
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  }
  return $title;
});




add_action('wp_enqueue_scripts', 'vinamek_blog_enqueue_assets');
function vinamek_blog_enqueue_assets()
{
  if (is_page_template(array('template-blog-ajax.php', 'template-blog.php'))) {
    // wp_enqueue_style( 'vinamek-blog-style', get_template_directory_uri() . '/assets/css/vinamek-blog.css', array(), '1.0' );
    wp_enqueue_script('vinamek-blog-js', get_template_directory_uri() . '/assets/js/vinamek-blog.js', array('jquery'), '1.0', true);

    // Localize data for AJAX
    $ajax_data = array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'nonce'    => wp_create_nonce('vinamek_blog_nonce'),
      'posts_per_page' => 10,
      'lang' => function_exists('pll_current_language') ? pll_current_language('slug') : ''
    );
    wp_localize_script('vinamek-blog-js', 'vinamekBlog', $ajax_data);
  }
}

/**
 * AJAX handler - returns posts HTML + pagination HTML
 */
add_action('wp_ajax_vinamek_load_posts', 'vinamek_load_posts_ajax');
add_action('wp_ajax_nopriv_vinamek_load_posts', 'vinamek_load_posts_ajax');

function vinamek_load_posts_ajax()
{
  check_ajax_referer('vinamek_blog_nonce', 'nonce');

  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
  $category = isset($_POST['category']) && $_POST['category'] !== '' ? sanitize_text_field($_POST['category']) : '';
  $search = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';
  $posts_per_page = isset($_POST['ppp']) ? intval($_POST['ppp']) : 10;
  $lang = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : '';

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    's' => $search,
  );

  if ($category !== '') {
    $args['category_name'] = $category;
  }

  // Polylang support
  if ($lang && function_exists('pll_current_language')) {
    $args['lang'] = $lang;
  }

  $q = new WP_Query($args);

  ob_start();

  if ($q->have_posts()) {
    while ($q->have_posts()) {
      $q->the_post();
?>
      <article id="post-<?php the_ID(); ?>" class="post-card ajax-post-card">
        <a class="post-link" href="<?php the_permalink(); ?>">
          <div class="post-thumb">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('medium');
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/img/placeholder-600x400.png" alt="' . esc_attr(get_the_title()) . '">';
            }
            ?>
          </div>
          <div class="post-body">
            <h3 class="post-title"><?php the_title(); ?></h3>
            <div class="post-meta">
              <span class="post-date"><?php echo get_the_date('d M, Y'); ?></span>
            </div>
            <div class="post-excerpt">
              <?php
              if (has_excerpt()) {
                echo wp_kses_post(wp_trim_words(get_the_excerpt(), 30, '...'));
              } else {
                echo wp_kses_post(wp_trim_words(get_the_content(), 30, '...'));
              }
              ?>
            </div>
          </div>
        </a>
      </article>
<?php
    }
    wp_reset_postdata();
  } else {
    echo '<p class="no-posts">Không có bài viết.</p>';
  }

  $posts_html = ob_get_clean();

  // pagination
  $total_pages = $q->max_num_pages;
  $pagination_html = '';

  if ($total_pages > 1) {
    $big = 999999999;
    $pagination_html = paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => max(1, $paged),
      'total' => $total_pages,
      'prev_text' => '&laquo; Trước',
      'next_text' => 'Sau &raquo;',
      'type' => 'list',
    ));
  }

  wp_send_json_success(array(
    'posts' => $posts_html,
    'pagination' => $pagination_html,
    'found' => $q->found_posts,
  ));
}

// // 1. Ẩn giá sản phẩm trên trang shop và product
// add_filter('woocommerce_get_price_html', '__return_empty_string');

// // 2. Ẩn nút "Thêm vào giỏ" mặc định
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// // 3. Thêm nút liên hệ + mô tả dưới giá
// add_action('woocommerce_after_shop_loop_item', 'custom_contact_button', 20);
// add_action('woocommerce_single_product_summary', 'custom_contact_button', 31);

// giá mới



//giao diện chi tiết sản phẩm sau khi custom
// function custom_contact_button()
// {
//   // Lấy ngôn ngữ hiện tại từ Polylang
//   $lang = function_exists('pll_current_language') ? pll_current_language() : 'vi';

//   $description = ($lang == 'en')
//     ? 'Contact us for detailed pricing'
//     : 'Liên hệ với chúng tôi để nhận báo giá chi tiết';

//   echo '<div class="custom-contact-wrapper" style="margin-top:10px;">';
//   echo '<a href="tel:0353226333" class="custom-contact-button" style="
//         display:inline-block;
//         background-color:#ff0000; 
//         color:#ffffff; 
//         padding:10px 20px; 
//         text-decoration:none;
//         font-weight:bold;
//         border-radius:4px;
//     ">' . ($lang == 'en' ? 'Contact' : 'Liên hệ') . '</a>';

//   // Dòng mô tả in nghiêng, màu xám nhẹ, cách nút 5px
//   echo '<p style="margin-top:5px; font-style:italic; color:#666666;">' . esc_html($description) . '</p>';
//   echo '</div>';
// }
// // 1. Ẩn giá mặc định
// add_filter('woocommerce_get_price_html', 'vinamek_custom_price_html', 100, 2);
// function vinamek_custom_price_html($price, $product) {
//   // Nếu sản phẩm có giá thì trả về giá, không thì trả về rỗng
//   if ($product->get_price()) {
//     return $price;
//   }
//   return '';
// }

// // 2. Ẩn nút "Thêm vào giỏ" mặc định
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// // 3. Thêm nút liên hệ (hiển thị sau giá)
// add_action('woocommerce_after_shop_loop_item', 'custom_contact_button', 20);
// add_action('woocommerce_single_product_summary', 'custom_contact_button', 31);

// function custom_contact_button()
// {
//   global $product;
  
//   // Lấy ngôn ngữ hiện tại từ Polylang
//   $lang = function_exists('pll_current_language') ? pll_current_language() : 'vi';
  
//   // Kiểm tra xem sản phẩm có giá không
//   $has_price = $product->get_price() ? true : false;
  
//   // Text mô tả
//   $description = ($lang == 'en')
//     ? 'Contact us for detailed pricing'
//     : 'Liên hệ với chúng tôi để nhận báo giá chi tiết';

//   echo '<div class="custom-contact-wrapper" style="margin-top:10px;">';
  
//   // Nếu có giá, hiển thị giá trước
//   if ($has_price) {
//     echo '<div class="product-price" style="margin-bottom:10px; font-size:18px; font-weight:bold; color:#333;">';
//     echo $product->get_price_html();
//     echo '</div>';
//   }
  
//   // Hiển thị nút liên hệ
//   echo '<a href="tel:0353226333" class="custom-contact-button" style="
//         display:inline-block;
//         background-color:#ff0000; 
//         color:#ffffff; 
//         padding:10px 20px; 
//         text-decoration:none;
//         font-weight:bold;
//         border-radius:4px;
//     ">' . ($lang == 'en' ? 'Contact' : 'Liên hệ') . '</a>';

//   // Dòng mô tả (chỉ hiện khi không có giá)
//   if (!$has_price) {
//     echo '<p style="margin-top:5px; font-style:italic; color:#666666;">' . esc_html($description) . '</p>';
//   }
  
//   echo '</div>';
// }

add_action('after_setup_theme', function () {
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-zoom');       // zoom khi hover
  add_theme_support('wc-product-gallery-lightbox');  // lightbox khi click
  add_theme_support('wc-product-gallery-slider');    // slider cho nhiều ảnh
});
function vinamek_enqueue_wc_gallery_assets()
{
  if (is_product()) {
    // Load script gallery WC
    wp_enqueue_script('wc-single-product'); // gallery, slider
    wp_enqueue_script('zoom');              // zoom nếu bật
  }
}
add_action('wp_enqueue_scripts', 'vinamek_enqueue_wc_gallery_assets', 99);


// 1. Remove gallery mặc định
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// 2. Thêm gallery custom
add_action('woocommerce_before_single_product_summary', 'vinamek_custom_product_gallery', 20);

function vinamek_custom_product_gallery()
{
  global $product;
  if (!$product) return;

  // Lấy ảnh chính + gallery
  $image_ids = array_merge(
    array($product->get_image_id()),
    $product->get_gallery_image_ids()
  );
  if (!$image_ids) $image_ids = array(0);

  // Swiper CDN
  echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />';
  echo '<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>';

  // Wrapper gallery
  echo '<div class="vinamek-gallery-wrapper">';

  // Ảnh chính
  $first_image = $image_ids[0] ? wp_get_attachment_url($image_ids[0]) : wc_placeholder_img_src();
  echo '<div class="vinamek-main-image">';
  echo '<img id="vinamek-main-img" src="' . esc_url($first_image) . '" alt="' . esc_attr(get_the_title()) . '">';
  echo '</div>';

  // Thumbnails (ẩn prev/next)
  if (count($image_ids) > 1) {
    echo '<div class="vinamek-thumbnails swiper">';
    echo '<div class="swiper-wrapper">';
    foreach ($image_ids as $index => $id) {
      $thumb_url = $id ? wp_get_attachment_url($id) : wc_placeholder_img_src();
      echo '<div class="swiper-slide"><img data-index="' . $index . '" src="' . esc_url($thumb_url) . '" alt="' . esc_attr(get_the_title()) . '" class="vinamek-thumb"></div>';
    }
    echo '</div>'; // .swiper-wrapper
    echo '</div>'; // .vinamek-thumbnails
  }

  echo '</div>'; // .vinamek-gallery-wrapper

  // ============== CSS ==============
  echo '<style>
  /* --- Layout --- */
  .single-product .product {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    align-items: flex-start;
  }

  .vinamek-gallery-wrapper {
    width: 48%;
    min-width: 320px;
    max-width: 600px;
  }

  .single-product .summary.entry-summary {
    width: 48%;
    min-width: 260px;
    align-self: flex-start;
    margin-top: 0 !important;
  }

  .woocommerce-tabs {
    width: 100%;
    margin-top: 18px;
  }

  /* Main image */
  .vinamek-main-image {
    width: 100%;
    aspect-ratio: 1 / 1;
    position: relative;
    overflow: hidden;
    border: 1px solid #e6e6e6;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    cursor: grab;
  }
  .vinamek-main-image img {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.22s ease;
    transform-origin: center center;
    user-select: none;
  }
  .vinamek-main-image.zoomed img {
    transform: scale(2);
    cursor: move;
  }

  /* Thumbnails */
  .vinamek-thumbnails {
    width: 100%;
    padding: 8px 8px;
    margin-top: 12px;
  }
  .vinamek-thumbnails .swiper-wrapper {
    display: flex;
    align-items: center;
  }
  .vinamek-thumbnails .swiper-slide {
    width: 80px !important;
    height: 80px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03);
  }
  .vinamek-thumb {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover;
    border-radius: 6px;
    border: 2px solid transparent;
    transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
    cursor: pointer;
  }
  .vinamek-thumb:hover { transform: scale(1.05); }
  .vinamek-thumb.active {
    border-color: #ff2f2f;
    box-shadow: 0 6px 18px rgba(255,47,47,0.12);
    transform: scale(1.03);
  }

  /* Ẩn hoàn toàn prev/next */
  .swiper-button-next,
  .swiper-button-prev {
    display: none !important;
  }

  /* Responsive */
  @media (max-width: 980px) {
    .vinamek-gallery-wrapper, .single-product .summary.entry-summary {
      width: 100%;
    }
    .vinamek-thumbnails { padding: 6px 8px; }
    .vinamek-thumbnails .swiper-slide { width: 64px !important; height: 64px !important; }
  }
  @media (max-width: 480px) {
    .vinamek-thumbnails .swiper-slide { width: 56px !important; height: 56px !important; }
  }
  </style>';

  // ============== JS ==============
  echo '<script>
  document.addEventListener("DOMContentLoaded", function() {
    const mainContainer = document.querySelector(".vinamek-main-image");
    const mainImg = document.getElementById("vinamek-main-img");
    const thumbs = document.querySelectorAll(".vinamek-thumb");
    let zoomed = false, isDragging = false;
    let startX = 0, startY = 0, moveX = 0, moveY = 0, currentX = 0, currentY = 0;

    if (thumbs.length) {
      thumbs.forEach(t => t.classList.remove("active"));
      thumbs[0].classList.add("active");
    }

    thumbs.forEach(thumb => {
      thumb.addEventListener("click", function() {
        mainImg.src = this.src;
        thumbs.forEach(t => t.classList.remove("active"));
        this.classList.add("active");
      });
    });

    // Double click để zoom
    mainContainer.addEventListener("dblclick", function() {
      zoomed = !zoomed;
      if (zoomed) {
        mainContainer.classList.add("zoomed");
        mainContainer.style.cursor = "move";
      } else {
        mainContainer.classList.remove("zoomed");
        mainImg.style.transform = "translate(0,0) scale(1)";
        currentX = currentY = 0;
        mainContainer.style.cursor = "grab";
      }
    });

    // Kéo ảnh
    mainContainer.addEventListener("mousedown", function(e) {
      e.preventDefault();
      isDragging = true;
      startX = e.clientX - currentX;
      startY = e.clientY - currentY;
      mainContainer.style.cursor = "grabbing";
    });

    document.addEventListener("mousemove", function(e) {
      if (!isDragging) return;
      e.preventDefault();
      moveX = e.clientX - startX;
      moveY = e.clientY - startY;
      const maxMove = zoomed ? 220 : 40;
      moveX = Math.max(-maxMove, Math.min(maxMove, moveX));
      moveY = Math.max(-maxMove, Math.min(maxMove, moveY));
      currentX = moveX;
      currentY = moveY;
      const scale = zoomed ? 2 : 1.05;
      mainImg.style.transform = `translate(${moveX}px, ${moveY}px) scale(${scale})`;
    });

    document.addEventListener("mouseup", function() {
      if (isDragging) {
        isDragging = false;
        mainContainer.style.cursor = zoomed ? "move" : "grab";
      }
    });

    const updateActiveBySrc = (src) => {
      thumbs.forEach(t => {
        if (t.src === src) {
          thumbs.forEach(x => x.classList.remove("active"));
          t.classList.add("active");
        }
      });
    };
    const obs = new MutationObserver(function(mutations) {
      mutations.forEach(function(m) {
        if (m.attributeName === "src") updateActiveBySrc(mainImg.src);
      });
    });
    if (mainImg) obs.observe(mainImg, { attributes: true });

    new Swiper(".vinamek-thumbnails.swiper", {
      slidesPerView: "auto",
      spaceBetween: 10,
      breakpoints: { 480: { spaceBetween: 8 } }
    });
  });
  </script>';
}

// 1. Remove related products mặc định
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// 2. Thêm lại related products với priority cao hơn (sau tabs)
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 50);



// ===================================================
// Custom giá & nút liên hệ cho sản phẩm WooCommerce
// ===================================================

// 1. Kiểm tra sản phẩm có giá không
function vinamek_product_has_price($product) {
  $price = $product->get_price();
  return !empty($price) && $price > 0;
}

// 2. Ẩn nút "Thêm vào giỏ" mặc định cho sản phẩm không có giá
add_filter('woocommerce_is_purchasable', 'vinamek_hide_add_to_cart_for_no_price', 10, 2);
function vinamek_hide_add_to_cart_for_no_price($purchasable, $product) {
  if (!vinamek_product_has_price($product)) {
    return false;
  }
  return $purchasable;
}

// 3. Thêm nút liên hệ cho sản phẩm không có giá
// Trang shop/archive
add_action('woocommerce_after_shop_loop_item', 'vinamek_custom_contact_button_loop', 10);
// Trang chi tiết sản phẩm
add_action('woocommerce_single_product_summary', 'vinamek_custom_contact_button_single', 30);

function vinamek_custom_contact_button_loop() {
  global $product;
  if (!vinamek_product_has_price($product)) {
    vinamek_render_contact_button();
  }
}

function vinamek_custom_contact_button_single() {
  global $product;
  if (!vinamek_product_has_price($product)) {
    vinamek_render_contact_button();
  }
}

// 4. Render nút liên hệ
function vinamek_render_contact_button() {
  $lang = function_exists('pll_current_language') ? pll_current_language() : 'vi';
  
  $button_text = ($lang == 'en') ? 'Contact' : 'Liên hệ';
  $description = ($lang == 'en') 
    ? 'Contact us for detailed pricing' 
    : 'Liên hệ với chúng tôi để nhận báo giá chi tiết';
  
  echo '<div class="custom-contact-wrapper" style="margin-top:10px;">';
  echo '<a href="tel:0353226333" class="custom-contact-button" style="
        display:inline-block;
        background-color:#ff0000; 
        color:#ffffff; 
        padding:10px 20px; 
        text-decoration:none;
        font-weight:bold;
        border-radius:4px;
        transition: background-color 0.3s ease;
    " onmouseover="this.style.backgroundColor=\'#cc0000\'" onmouseout="this.style.backgroundColor=\'#ff0000\'">' 
    . esc_html($button_text) . 
  '</a>';
  
  echo '<p style="margin-top:5px; font-style:italic; color:#666666; font-size:14px;">' 
    . esc_html($description) . 
  '</p>';
  
  echo '</div>';
}

// 5. Custom text giá cho sản phẩm không có giá (optional - hiển thị text thay vì để trống)
add_filter('woocommerce_get_price_html', 'vinamek_custom_empty_price_html', 100, 2);
function vinamek_custom_empty_price_html($price, $product) {
  if (!vinamek_product_has_price($product)) {
    return ''; // Trả về rỗng để không hiển thị gì
  }
  return $price;
}