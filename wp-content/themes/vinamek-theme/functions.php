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
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false ); // chỉ lấy tên category
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
});




add_action( 'wp_enqueue_scripts', 'vinamek_blog_enqueue_assets' );
function vinamek_blog_enqueue_assets() {
  if ( is_page_template( array( 'template-blog-ajax.php', 'template-blog.php' ) ) ) {
        // wp_enqueue_style( 'vinamek-blog-style', get_template_directory_uri() . '/assets/css/vinamek-blog.css', array(), '1.0' );
        wp_enqueue_script( 'vinamek-blog-js', get_template_directory_uri() . '/assets/js/vinamek-blog.js', array('jquery'), '1.0', true );

        // Localize data for AJAX
        $ajax_data = array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'vinamek_blog_nonce' ),
            'posts_per_page' => 10,
            'lang' => function_exists('pll_current_language') ? pll_current_language('slug') : ''
        );
        wp_localize_script( 'vinamek-blog-js', 'vinamekBlog', $ajax_data );
    }
}

/**
 * AJAX handler - returns posts HTML + pagination HTML
 */
add_action( 'wp_ajax_vinamek_load_posts', 'vinamek_load_posts_ajax' );
add_action( 'wp_ajax_nopriv_vinamek_load_posts', 'vinamek_load_posts_ajax' );

function vinamek_load_posts_ajax() {
    check_ajax_referer( 'vinamek_blog_nonce', 'nonce' );

    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $category = isset($_POST['category']) && $_POST['category'] !== '' ? sanitize_text_field( $_POST['category'] ) : '';
    $search = isset($_POST['s']) ? sanitize_text_field( $_POST['s'] ) : '';
    $posts_per_page = isset($_POST['ppp']) ? intval($_POST['ppp']) : 10;
    $lang = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        's' => $search,
    );

    if ( $category !== '' ) {
        $args['category_name'] = $category;
    }

    // Polylang support
    if ( $lang && function_exists('pll_current_language') ) {
        $args['lang'] = $lang;
    }

    $q = new WP_Query( $args );

    ob_start();

    if ( $q->have_posts() ) {
        while ( $q->have_posts() ) {
            $q->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" class="post-card ajax-post-card">
              <a class="post-link" href="<?php the_permalink(); ?>">
                <div class="post-thumb">
                  <?php
                  if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'medium' );
                  } else {
                      echo '<img src="' . get_template_directory_uri() . '/assets/img/placeholder-600x400.png" alt="' . esc_attr(get_the_title()) . '">';
                  }
                  ?>
                </div>
                <div class="post-body">
                  <h3 class="post-title"><?php the_title(); ?></h3>
                  <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date( 'd M, Y' ); ?></span>
                  </div>
                  <div class="post-excerpt">
                    <?php
                      if ( has_excerpt() ) {
                        echo wp_kses_post( wp_trim_words( get_the_excerpt(), 30, '...' ) );
                      } else {
                        echo wp_kses_post( wp_trim_words( get_the_content(), 30, '...' ) );
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

  if ( $total_pages > 1 ) {
    $big = 999999999;
    $pagination_html = paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max(1, $paged),
      'total' => $total_pages,
      'prev_text' => '&laquo; Trước',
      'next_text' => 'Sau &raquo;',
      'type' => 'list',
    ) );
  }

    wp_send_json_success( array(
        'posts' => $posts_html,
        'pagination' => $pagination_html,
        'found' => $q->found_posts,
    ) );
}