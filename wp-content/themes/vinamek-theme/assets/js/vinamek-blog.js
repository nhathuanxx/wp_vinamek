jQuery(document).ready(function($) {
  const ajaxUrl = vinamekBlog.ajax_url;
  const nonce = vinamekBlog.nonce;
  const postsPerPage = vinamekBlog.posts_per_page || 10;
  let currentCategory = '';
  let currentSearch = '';
  let currentPage = 1;
  const lang = vinamekBlog.lang || '';

  function showSkeleton() {
    const $wrap = $('#vinamek-posts-wrap');
    const skeletonCount = 6;
    let html = '';
    for (let i = 0; i < skeletonCount; i++) {
      html += `
        <div class="post-card skeleton">
          <div class="post-thumb skeleton-thumb"></div>
          <div class="post-body">
            <div class="skeleton-line title"></div>
            <div class="skeleton-line meta"></div>
            <div class="skeleton-line excerpt"></div>
            <div class="skeleton-line excerpt"></div>
          </div>
        </div>`;
    }
    $wrap.addClass('loading').html(html);
    $('#vinamek-pagination').html('');
  }

  function loadPosts(opts = {}) {
    if (typeof opts.category !== 'undefined') currentCategory = opts.category;
    if (typeof opts.search !== 'undefined') currentSearch = opts.search;
    if (typeof opts.paged !== 'undefined') currentPage = parseInt(opts.paged, 10) || 1;

    showSkeleton();

    $.ajax({
      url: ajaxUrl,
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'vinamek_load_posts',
        nonce,
        category: currentCategory,
        s: currentSearch,
        paged: currentPage,
        ppp: postsPerPage,
        lang
      }
    })
    .done(function(res) {
      const $wrap = $('#vinamek-posts-wrap');
      const $pagWrap = $('#vinamek-pagination');
      if (res.success) {
        $wrap.removeClass('loading').html(res.data.posts);
        $pagWrap.html(res.data.pagination);
        $('#vinamek-list-meta').text(res.data.found + ' ' + (lang === 'en' ? 'results' : 'kết quả'));

        // cập nhật tiêu đề
        if (currentCategory) {
          const $activeCat = $('#vinamek-category-list .category-item[data-slug="'+currentCategory+'"]');
          const name = $activeCat.length ? $activeCat.find('.cat-link').clone().children().remove().end().text().trim() : currentCategory;
          $('#vinamek-list-title').text((lang === 'en' ? 'Posts: ' : 'Bài viết: ') + name);
        } else if (currentSearch) {
          $('#vinamek-list-title').text((lang === 'en' ? 'Search results for: "' : 'Kết quả tìm kiếm: "') + currentSearch + '"');
        } else {
          $('#vinamek-list-title').text(lang === 'en' ? 'Latest News' : 'Tin tức mới nhất');
        }

        // pagination click
        $pagWrap.find('a').off('click').on('click', function(e) {
          e.preventDefault();
          const href = $(this).attr('href') || '';
          let p = 1;
          const match = href.match(/paged=(\d+)/);
          if (match && match[1]) p = parseInt(match[1], 10);
          loadPosts({ paged: p });
          $('html, body').animate({ scrollTop: $('#vinamek-posts-wrap').offset().top - 100 }, 400);
        });
      } else {
        $wrap.removeClass('loading').html('<p class="no-posts">Không có bài viết.</p>');
      }
    })
    .fail(function() {
      $('#vinamek-posts-wrap').removeClass('loading').html('<p class="no-posts">Lỗi khi tải bài viết.</p>');
    });
  }

  // khởi tạo
  loadPosts();

  // click category
  $('#vinamek-category-list').on('click', '.category-item', function(e) {
    e.preventDefault();
    const slug = $(this).data('slug') || '';
    $('#vinamek-category-list .category-item').removeClass('active');
    $(this).addClass('active');
    currentPage = 1;
    loadPosts({ category: slug, paged: 1 });
  });

  // form search
  $('#vinamek-search-form').on('submit', function(e) {
    e.preventDefault();
    const q = $('#vinamek-search-input').val().trim();
    currentSearch = q;
    currentPage = 1;
    $('#vinamek-category-list .category-item').removeClass('active');
    $('#vinamek-category-list .category-item[data-slug=""]').addClass('active');
    loadPosts({ category: '', search: q, paged: 1 });
  });
});
