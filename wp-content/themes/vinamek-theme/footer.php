<?php $lang = pll_current_language('slug'); ?>
<footer class="main-footer">
  <!--Widgets Section-->
  <div class="auto-container">

    <div class="widgets-section">
      <div class="row clearfix">

        <!--Footer Column-->
        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
          <!--About Widget-->
          <div class="footer-widget logo-widget">
            <div class="logo">
              <a href="<?php echo esc_url(home_url()); ?>"> <?php
                                                            // Lấy logo từ ACF Options Page
                                                            $acf_logo = get_field('logo', 'option'); // 'option' nếu lưu trên Options Page

                                                            if ($acf_logo) {
                                                              // Image Array, chiều cao 60px
                                                              echo '<img src="' . esc_url($acf_logo['url']) . '" alt="' . esc_attr($acf_logo['alt']) . '" class="site-logo">';
                                                            } else {
                                                              // Fallback: logo mặc định trong theme
                                                              echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/vinamek/vinamek-logo-name1.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="site-logo">';
                                                            }
                                                            ?></a>
            </div>
            <div class="text"><?php
                              $mo_ta_ngan = get_field('mo_ta_ngan', 'option');
                              if ($mo_ta_ngan): ?>
                <?php echo esc_html($mo_ta_ngan); ?>
              <?php endif; ?> </div>
            <div class="text"><?php echo ($lang === 'vi') ? 'MST: ' : 'TAX CODE: '; ?>
              <?php
              $ma_so_thue = get_field('ma_so_thue', 'option');
              if ($ma_so_thue): ?>
                <?php echo esc_html($ma_so_thue); ?>
              <?php endif; ?> </div>
            <!-- <a href="#" class="theme-btn btn-style-two">Read More</a> -->
          </div>
        </div>

        <!-- <div class="footer-column col-lg-4 col-md-6 col-sm-12">
          <div class="footer-widget links-widget">
            <h5>Usefull Links</h5>
            <div class="row clearfix">
              <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                <li><a href="#">Business Growth</a></li>
                <li><a href="#">Sustainability</a></li>
                <li><a href="#">Performance</a></li>
                <li><a href="#">Customer Insights</a></li>
                <li><a href="#">Organization</a></li>
                <li><a href="#">Advanced Analytics</a></li>
              </ul>
              <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                <li><a href="#">About Industry</a></li>
                <li><a href="#">Customer FAQ’s</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Free Consultation</a></li>
                <li><a href="#">Meet Our Team</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
          <div class="footer-widget links-widget">
            <h5>Usefull Links</h5>
            <div class="row clearfix">
              <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                <li><a href="#">Business Growth</a></li>
                <li><a href="#">Sustainability</a></li>
                <li><a href="#">Performance</a></li>
                <li><a href="#">Customer Insights</a></li>
                <li><a href="#">Organization</a></li>
                <li><a href="#">Advanced Analytics</a></li>
              </ul>
              <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                <li><a href="#">About Industry</a></li>
                <li><a href="#">Customer FAQ’s</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Free Consultation</a></li>
                <li><a href="#">Meet Our Team</a></li>
              </ul>
            </div>
          </div>
        </div> -->
        <?php
        $site_url = get_site_url(); // Lấy domain của website
        ?>

        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
          <div class="footer-widget links-widget">
            <?php if ($nhom_1 = get_field('nhom_1', 'option')): ?>
              <h5><?php echo esc_html($nhom_1); ?></h5>
            <?php endif; ?>

            <div class="row clearfix">
              <?php if (have_rows('cot_1_nhom_1', 'option')): ?>
                <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                  <?php while (have_rows('cot_1_nhom_1', 'option')): the_row();
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');

                    // Nếu link bắt đầu bằng / thì thêm domain trước
                    if ($link && str_starts_with($link, '/')) {
                      $link = $site_url . $link;
                    }
                  ?>
                    <li><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>

              <?php if (have_rows('cot_2_nhom_1', 'option')): ?>
                <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                  <?php while (have_rows('cot_2_nhom_1', 'option')): the_row();
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                    if ($link && str_starts_with($link, '/')) {
                      $link = $site_url . $link;
                    }
                  ?>
                    <li><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <!-- Nhóm 2 -->
        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
          <div class="footer-widget links-widget">
            <?php if ($nhom_2 = get_field('nhom_2', 'option')): ?>
              <h5><?php echo esc_html($nhom_2); ?></h5>
            <?php endif; ?>

            <div class="row clearfix">
              <?php if (have_rows('cot_1_nhom_2', 'option')): ?>
                <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                  <?php while (have_rows('cot_1_nhom_2', 'option')): the_row();
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                    if ($link && str_starts_with($link, '/')) {
                      $link = $site_url . $link;
                    }
                  ?>
                    <li><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>

              <?php if (have_rows('cot_2_nhom_2', 'option')): ?>
                <ul class="link-list col-md-6 col-sm-6 col-xs-12">
                  <?php while (have_rows('cot_2_nhom_2', 'option')): the_row();
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                    if ($link && str_starts_with($link, '/')) {
                      $link = $site_url . $link;
                    }
                  ?>
                    <li><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!--Footer Info Section-->
    <div class="footer-info-section">
      <div class="row clearfix">

        <!--Info Block-->
        <div class="info-block col-md-4 col-sm-6 col-xs-12">
          <div class="inner">
            <div class="icon flaticon-pin"></div>
            <h6><?php echo ($lang === 'vi') ? 'Địa chỉ' : 'Address'; ?>
            </h6>
            <div class="text"><?php
                              $dia_chi_chi_tiet = get_field('dia_chi_chi_tiet', 'option');
                              if ($dia_chi_chi_tiet): ?>
                <?php echo esc_html($dia_chi_chi_tiet); ?>
              <?php endif; ?></div>
          </div>
        </div>

        <!--Info Block-->
        <div class="info-block col-md-4 col-sm-6 col-xs-12">
          <div class="inner">
            <div class="icon flaticon-technology-1"></div>
            <h6><?php echo ($lang === 'vi') ? 'Liên hệ' : 'Contact'; ?></h6>
            <div class="text">Hotline: <?php
                                        $so_dien_thoai = get_field('so_dien_thoai', 'option');

                                        if ($so_dien_thoai) {
                                          $tel_number = preg_replace('/\D+/', '', $so_dien_thoai);
                                          echo '<a href="tel:' . esc_attr($tel_number) . '" class="footer-phone-number">' . esc_html($so_dien_thoai) . '</a>';
                                        } else {
                                          echo '+00 00 0000 00';
                                        }
                                        ?></div>
            <div class="text">Zalo: <?php
                                    $so_dien_thoai_2 = get_field('so_dien_thoai_2', 'option');

                                    if ($so_dien_thoai_2) {
                                      $tel_number = preg_replace('/\D+/', '', $so_dien_thoai_2);
                                      echo '<a href="https://zalo.me/' . esc_attr($tel_number) . '" class="footer-phone-number">' . esc_html($so_dien_thoai_2) . '</a>';
                                    } else {
                                      echo '+00 00 0000 00';
                                    }
                                    ?></div>
          </div>
        </div>

        <!--Info Block-->
        <div class="info-block col-md-4 col-sm-6 col-xs-12">
          <div class="inner">
            <div class="icon flaticon-web"></div>
            <h6>Email at</h6>
            <div class="text"><?php
                              $email = get_field('email', 'option');
                              if ($email): ?>

                <a href="mailto:<?php echo esc_attr($email); ?>" style="all: unset; cursor: pointer;">
                  <?php echo esc_html($email); ?>
                </a>

              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!--Footer Bottom-->
  <div class="footer-bottom">
    <div class="auto-container">
      <div class="row clearfix">
        <div class="column col-md-6 col-sm-12 col-xs-12">
          <div class="copyright">© 2025 - <a target="_blank" href="<?php echo esc_url(home_url()); ?>"><?php
                                                                                                        $ten_web = get_field('ten_web', 'option');
                                                                                                        if ($ten_web): ?>
                <?php echo esc_html($ten_web); ?>
              <?php endif; ?></a></div>
        </div>
        <!-- <div class="nav-column col-md-6 col-sm-12 col-xs-12">
          <ul class="footer-nav">
            <li><a href="#">Legal</a></li>
            <li><a href="#">Sitemap</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Condition</a></li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
</footer>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
<?php wp_footer(); ?>
</body>

</html>
<script>
  jQuery(document).ready(function($) {
    $('.navbar-toggler').on('click', function() {
      $('#navbarSupportedContent').stop(true, true).slideToggle(300);
    });
  });
</script>