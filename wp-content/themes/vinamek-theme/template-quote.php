<?php

/**
 * Template Name: Quote / Báo giá
 * Description: Trang báo giá dành cho tư vấn - thiết kế - lắp đặt - bảo trì hệ thống điện và sản xuất tủ điện, máng cáp, cơ khí.
 */
get_header();

$lang = function_exists('pll_current_language') ? pll_current_language('slug') : '';
$current_url = get_permalink();
?>

<section class="vinamek-quote-hero" style="background:#f6fbfe;padding:48px 0;border-bottom:1px solid #e9f6fb;">
    <div class="auto-container" style="max-width:1200px;margin:0 auto;padding:0 20px;">
        <div style="display:flex;flex-wrap:wrap;gap:24px;align-items:center;">
            <div style="flex:1;min-width:280px;">
                <h1 style="color:#13b5ea;font-weight:700;margin:0 0 12px;font-size:32px;"><?php echo $lang === 'en' ? 'Request a Quote' : 'Yêu cầu báo giá'; ?></h1>
                <p style="color:#333;margin:0 0 16px;font-size:16px;"><?php echo $lang === 'en' ? 'We provide consultation, design, installation and maintenance for electrical systems, lighting, control cabinets and custom metalworks.' : 'Chúng tôi tư vấn, thiết kế, lắp đặt, bảo trì hệ thống điện, chiếu sáng, vỏ tủ điện, tủ PCCC, sản xuất tủ điện, thang, máng cáp và cơ khí theo yêu cầu.'; ?></p>
                <ul class="vinamek-hero-list" style="margin:0;color:#444;">
                    <li><?php echo $lang === 'en' ? 'Electrical systems design & installation' : 'Tư vấn & thiết kế hệ thống điện'; ?></li>
                    <li><?php echo $lang === 'en' ? 'Lighting systems & fixtures' : 'Hệ thống đèn chiếu sáng'; ?></li>
                    <li><?php echo $lang === 'en' ? 'Control cabinets, PCCC cabinets' : 'Vỏ tủ điện, vỏ tủ PCCC'; ?></li>
                    <li><?php echo $lang === 'en' ? 'Custom metalworks: trays, ladders, cabinets' : 'Sản xuất thang, máng cáp, cơ khí theo yêu cầu'; ?></li>
                </ul>
            </div>

            <div style="flex:1;min-width:320px;">
                <div class="quote-card" style="background:#fff;border-radius:10px;padding:18px;box-shadow:0 8px 30px rgba(19,181,234,0.08);position:relative;">
                    <h4 style="margin:0 0 10px;color:#13b5ea;font-weight:700;"><?php echo $lang === 'en' ? 'Quick Quote' : 'Báo giá nhanh'; ?></h3>

                    <?php
                    // Get phone from ACF options (same field used in header)
                    $acf_phone = function_exists('get_field') ? get_field('so_dien_thoai', 'option') : '';
                    if (! $acf_phone) {
                        // try alternative field used in header
                        $acf_phone = function_exists('get_field') ? get_field('so_dien_thoai_2', 'option') : '';
                    }
                    $tel_number = $acf_phone ? preg_replace('/\D+/', '', $acf_phone) : '';

                    // Render call button near form (desktop)
                    if ($tel_number) {
                        echo '<div style="position:absolute;top:18px;right:18px;">';
                        echo '<a class="vinamek-quick-call-desktop" href="tel:' . esc_attr($tel_number) . '" title="' . esc_attr($lang === 'en' ? 'Call for 24/7 quote' : 'Gọi hỗ trợ báo giá 24/24') . '">';
                        echo '<span style="display:inline-flex;align-items:center;gap:8px;font-weight:600;color:#fff;background:#13b5ea;padding:8px 12px;border-radius:8px;box-shadow:0 6px 18px rgba(19,181,234,0.12);">';
                        echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M22 16.92V21a1 1 0 0 1-1.11 1 19 19 0 0 1-8.63-3.11 19 19 0 0 1-6-6A19 19 0 0 1 2 3.11 1 1 0 0 1 3 2h4.09a1 1 0 0 1 1 .75c.12.81.35 1.6.67 2.34a1 1 0 0 1-.24 1.05L8.7 8.7a16 16 0 0 0 6 6l1.56-1.56a1 1 0 0 1 1.05-.24c.74.32 1.53.55 2.34.67a1 1 0 0 1 .75 1V21z" fill="currentColor"/></svg>';
                        echo '<span style="font-size:13px;">' . esc_html($lang === 'en' ? 'Quick Quote 24/7' : 'Hỗ trợ báo giá 24/24') . '</span>';
                        echo '</span>';
                        echo '</a>';
                        echo '</div>';
                    }

                    // Placeholder for Contact Form 7 (user will paste shortcode here)
                    echo '<div class="vinamek-quote-cf7">' . do_shortcode('[contact-form-7 id="" title="Quote Form Placeholder"]') . '</div>';
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hero list: bold items with primary-color bullet */
    .vinamek-hero-list { margin:0; padding-left:0; list-style:none; }
    .vinamek-hero-list li { position:relative; padding-left:34px; margin-bottom:10px; font-weight:700; color:#333; }
    .vinamek-hero-list li:before { content: "\2022"; position:absolute; left:0; top:0; color:#13b5ea; font-size:20px; line-height:1; }
    @media (max-width:480px) {
        .vinamek-hero-list li { padding-left:26px; }
        .vinamek-hero-list li:before { font-size:18px; }
    }
</style>

<section class="vinamek-services-section" style="padding:60px 0;">
    <div class="auto-container">
        <div class="vinamek-services-grid" style="display:grid;grid-template-columns:1fr 320px;gap:60px;align-items:start;">
            <div>
                <h2 style="color:#13b5ea;font-weight:700;margin-top:0;"><?php echo $lang === 'en' ? 'Our Services' : 'Dịch vụ của chúng tôi'; ?></h2>
                <p style="color:#333;margin-bottom:12px;"><?php echo $lang === 'en' ? 'We deliver professional solutions across the lifecycle of projects: from consultation and design to installation and maintenance.' : 'Chúng tôi cung cấp giải pháp chuyên nghiệp từ tư vấn - thiết kế - thi công đến bảo trì, đáp ứng yêu cầu kỹ thuật và thẩm mỹ của khách hàng.'; ?></p>

                <div class="vinamek-services-cards" style="display:flex;flex-wrap:wrap;gap:16px;margin-top:18px;">
                    <?php
                    // Localized services data
                    $services = [
                        [
                            'en_title' => 'Electrical Systems',
                            'vi_title' => 'Hệ thống điện',
                            'en_desc' => 'Design, wiring, protection and testing for commercial & industrial installations.',
                            'vi_desc' => 'Thiết kế, đi dây, bảo vệ và kiểm tra cho công trình thương mại và công nghiệp.'
                        ],
                        [
                            'en_title' => 'Lighting & Fixtures',
                            'vi_title' => 'Chiếu sáng & thiết bị',
                            'en_desc' => 'Indoor/outdoor lighting, energy-efficient solutions and emergency lighting.',
                            'vi_desc' => 'Chiếu sáng trong nhà/ngoài trời, giải pháp tiết kiệm năng lượng và đèn khẩn cấp.'
                        ],
                        [
                            'en_title' => 'Control Cabinets',
                            'vi_title' => 'Tủ điều khiển',
                            'en_desc' => 'Custom control & PCCC cabinets, assembly and wiring service.',
                            'vi_desc' => 'Tủ điều khiển, tủ PCCC tùy chỉnh, lắp ráp và đi dây.'
                        ],
                    ];

                    foreach ($services as $s) {
                    ?>
                        <article class="vinamek-service-card" style="flex:1 1 240px;min-width:220px;background:#fff;padding:18px;border-radius:12px;box-shadow:0 10px 36px rgba(1,52,64,0.06);transition:transform .18s ease,box-shadow .18s ease;display:flex;flex-direction:column;">
                            <h4 style="margin:0 0 8px;font-size:18px;color:black;font-weight:700;"><?php echo esc_html($lang === 'en' ? $s['en_title'] : $s['vi_title']); ?></h4>
                            <p style="margin:0;color:#666;line-height:1.5;font-size:14px;flex:1 0 auto;">
                                <?php echo esc_html($lang === 'en' ? $s['en_desc'] : $s['vi_desc']); ?>
                            </p>
                            <div style="margin-top:12px;">
                                <a href="#" style="color:#13b5ea;font-weight:600;text-decoration:none;font-size:13px;"><?php echo $lang === 'en' ? 'Learn more' : 'Tìm hiểu thêm'; ?> →</a>
                            </div>
                        </article>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <aside class="vinamek-why-choose" style="background:#fff;padding:18px;border-radius:12px;box-shadow:0 12px 42px rgba(1,52,64,0.06);">
                <h4 style="margin-top:0;font-size:18px;color:#13b5ea;font-weight:700;"><?php echo $lang === 'en' ? 'Why choose us' : 'Tại sao chọn chúng tôi'; ?></h4>
                <ul class="vinamek-why-list" style="margin:0;color:#444;padding-left:0;list-style:none;">
                    <li><?php echo $lang === 'en' ? 'Experienced technical team' : 'Đội ngũ kỹ thuật dày dặn'; ?></li>
                    <li><?php echo $lang === 'en' ? 'Quality materials & workmanship' : 'Nguyên vật liệu & tay nghề đạt chuẩn'; ?></li>
                    <li><?php echo $lang === 'en' ? 'On-time delivery & support' : 'Hoàn thành đúng tiến độ & hỗ trợ sau bán hàng'; ?></li>
                </ul>
            </aside>
        </div>
    </div>

    <style>
        /* Services section specific styles (scoped) */
        .vinamek-services-section {
            padding-top: 56px;
            padding-bottom: 56px;
        }

        .vinamek-services-cards {
            display: flex;
            gap: 18px;
            align-items: stretch;
        }

        .vinamek-services-cards .vinamek-service-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .vinamek-services-cards .vinamek-service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 60px rgba(1, 52, 64, 0.12);
        }

        .vinamek-services-section h2,
        .vinamek-services-section h4 {
            color: #13b5ea;
            font-weight:700;
        }

        /* Make sure aside list shows bullets and spacing */
        .vinamek-why-choose ul { list-style: disc; padding-left: 20px; }

        /* Styled bullets for aside list (match hero) */
        .vinamek-why-list { margin:0; padding-left:0; list-style:none; }
        .vinamek-why-list li { position:relative; padding-left:34px; margin-bottom:10px; font-weight:700; color:#333; }
        .vinamek-why-list li:before { content: "\2022"; position:absolute; left:0; top:0; color:#13b5ea; font-size:18px; line-height:1; }
        @media (max-width:480px) {
            .vinamek-why-list li { padding-left:26px; }
            .vinamek-why-list li:before { font-size:16px; }
        }

        /* Responsive: stack grid into single column on small screens */
        @media (max-width: 900px) {
            .vinamek-services-grid {
                grid-template-columns: 1fr !important;
            }

            .vinamek-services-cards {
                flex-direction: column;
            }

            .vinamek-why-choose {
                order: 2;
                margin-top: 18px;
            }

            .vinamek-service-card {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .vinamek-service-card {
                padding: 14px;
                border-radius: 10px;
            }

            .vinamek-services-section {
                padding-top: 36px;
                padding-bottom: 36px;
            }
        }
    </style>
</section>

<?php
// Floating/mobile quick-call button (uses same ACF phone fields as header)
$acf_phone_mobile = function_exists('get_field') ? get_field('so_dien_thoai', 'option') : '';
if (! $acf_phone_mobile) {
    $acf_phone_mobile = function_exists('get_field') ? get_field('so_dien_thoai_2', 'option') : '';
}
$tel_number_mobile = $acf_phone_mobile ? preg_replace('/\D+/', '', $acf_phone_mobile) : '';
?>

<?php get_footer(); ?>

<!-- Small inline style to keep the page consistent with theme color and render mobile CTA -->
<style>
    .wpcf7-form input[type="submit"] {
        background: #13b5ea;
        color: #fff;
        border: none;
        padding: 10px 16px;
        border-radius: 8px;
    }

    .wpcf7-form input,
    .wpcf7-form textarea {
        border: 1px solid #e6eef6;
        border-radius: 6px;
        padding: 8px;
    }

    /* Desktop quick call button (hide on small screens) */
    .vinamek-quick-call-desktop {
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .vinamek-quick-call-desktop {
            display: none !important;
        }
    }

    /* Mobile floating call button */
    .vinamek-quick-call-mobile {
        display: none;
    }

    @media (max-width: 768px) {
        .vinamek-quick-call-mobile {
            display: flex;
            position: fixed;
            right: 18px;
            bottom: 18px;
            z-index: 9999;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #13b5ea;
            color: #fff;
            box-shadow: 0 10px 30px rgba(19, 181, 234, 0.18);
            text-decoration: none;
        }

        .vinamek-quick-call-mobile svg {
            width: 22px;
            height: 22px;
        }
    }
</style>

<?php if ($tel_number_mobile): ?>
    <a class="vinamek-quick-call-mobile" href="tel:<?php echo esc_attr($tel_number_mobile); ?>" title="<?php echo esc_attr($lang === 'en' ? 'Call for 24/7 quote' : 'Gọi hỗ trợ báo giá 24/24'); ?>">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M22 16.92V21a1 1 0 0 1-1.11 1 19 19 0 0 1-8.63-3.11 19 19 0 0 1-6-6A19 19 0 0 1 2 3.11 1 1 0 0 1 3 2h4.09a1 1 0 0 1 1 .75c.12.81.35 1.6.67 2.34a1 1 0 0 1-.24 1.05L8.7 8.7a16 16 0 0 0 6 6l1.56-1.56a1 1 0 0 1 1.05-.24c.74.32 1.53.55 2.34.67a1 1 0 0 1 .75 1V21z" fill="currentColor" />
        </svg>
    </a>
<?php endif; ?>