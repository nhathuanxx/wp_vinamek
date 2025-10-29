<?php
/*
* Template Name: Home Page
*/
get_header(); ?>
<?php $lang = pll_current_language('slug'); ?>
<section class="main-slider">

	<div class="main-slider-carousel owl-carousel owl-theme">
		<?php if (get_field('slides', 'option')) : ?>
			<?php while (the_repeater_field('slides', 'option')) :
				$bg = get_sub_field('background_image');
				$title = get_sub_field('title');
				$heading = get_sub_field('heading');
				$text = get_sub_field('text');
				$link1_label = get_sub_field('link_1_label');
				$link2_label = get_sub_field('link_2_label');
				$link1_text = get_sub_field('link_1_url');
				$link2_text = get_sub_field('link_2_url');
				$centered = get_sub_field('centered') ? 'centered' : '';

				// Xử lý URL thông minh
				$link1_url = filter_var($link1_text, FILTER_VALIDATE_URL) ? $link1_text : home_url('/' . ltrim($link1_text, '/'));
				$link2_url = filter_var($link2_text, FILTER_VALIDATE_URL) ? $link2_text : home_url('/' . ltrim($link2_text, '/'));
			?>
				<div class="slide" style="background-image:url('<?php echo esc_url($bg['url']); ?>')">
					<div class="auto-container">
						<div class="content <?php echo $centered; ?>">
							<div class="title"><?php echo esc_html($title); ?></div>
							<h1><?php echo esc_html($heading); ?></h1>
							<div class="text"><?php echo esc_html($text); ?></div>
							<div class="link-box">
								<a href="<?php echo esc_url($link1_url); ?>" class="theme-btn btn-style-one"><?php echo esc_html($link1_label); ?></a>
								<a href="<?php echo esc_url($link2_url); ?>" class="theme-btn btn-style-two"><?php echo esc_html($link2_label); ?></a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</section>
<!--End Main Slider-->

<!--Info Section-->
<section class="info-section">
	<div class="clearfix">
		<!--Info Column-->
		<div class="info-column">
			<div class="inner-box">
				<div class="info-box">
					<div class="inner">
						<span class="icon flaticon-house"></span>
						<div class="title">
							<?php echo ($lang === 'vi') ? 'Giao hàng toàn quốc' : 'Nationwide delivery'; ?>
						</div>
						<h3><?php
							$dia_chi = get_field('dia_chi', 'option');
							if ($dia_chi): ?>
								<?php echo esc_html($dia_chi); ?>
							<?php endif; ?></h3>
					</div>
				</div>
			</div>
		</div>

		<div class="info-column">
			<div class="inner-box">
				<div class="info-box">
					<div class="inner">
						<span class="icon flaticon-phone-call"></span>
						<div class="title">
							<?php echo ($lang === 'vi') ? 'Tư vấn và báo giá 24/7' : '24/7 Consultation & Quotation'; ?>
						</div>
						<h3><?php
							$so_dien_thoai = get_field('so_dien_thoai', 'option');

							if ($so_dien_thoai) {
								$tel_number = preg_replace('/\D+/', '', $so_dien_thoai);
								echo '<a href="tel:' . esc_attr($tel_number) . '" class="banner-phone-number">' . esc_html($so_dien_thoai) . '</a>';
							} else {
								echo '+00 00 0000 00';
							}
							?> / <?php
									$so_dien_thoai = get_field('so_dien_thoai_2', 'option');

									if ($so_dien_thoai) {
										$tel_number = preg_replace('/\D+/', '', $so_dien_thoai);
										echo '<a href="tel:' . esc_attr($tel_number) . '" class="banner-phone-number">' . esc_html($so_dien_thoai) . '</a>';
									} else {
										echo '+00 00 0000 00';
									}
									?></h3>
					</div>
				</div>
			</div>
		</div>

		<div class="info-column">
			<div class="inner-box">
				<div class="info-box">
					<div class="inner">
						<span class="icon flaticon-message"></span>
						<div class="title">
							<?php echo ($lang === 'vi') ? 'Liên hệ qua email:' : 'Contact via email:'; ?>
						</div>
						<h3><?php
							$email = get_field('email', 'option');
							if ($email): ?>

								<a href="mailto:<?php echo esc_attr($email); ?>" style="all: unset; cursor: pointer;">
									<?php echo esc_html($email); ?>
								</a>

							<?php endif; ?>
						</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--End Info Section-->

<section class="services-section-two">
	<div class="auto-container">
		<div class="sec-title centered">
			<h2><?php echo ($lang === 'vi') ? 'Dịch vụ tiêu biểu' : 'Featured Services'; ?></h2>
		</div>
		<div class="row clearfix">
			<?php if (get_field('dich_vu_tieu_bieu', 'option')): ?>
				<?php while (the_repeater_field('dich_vu_tieu_bieu', 'option')):
					$anh_dich_vu = get_sub_field('anh_dich_vu');
					$tieu_de_dich_vu = get_sub_field('tieu_de_dich_vu');
					$mo_ta_dich_vu = get_sub_field('mo_ta_dich_vu');
					$link_xem_them_text = get_sub_field('link_xem_them_dich_vu');

					// Xử lý URL thông minh
					$link_xem_them_url = filter_var($link_xem_them_text, FILTER_VALIDATE_URL)
						? $link_xem_them_text
						: home_url('/' . ltrim($link_xem_them_text, '/'));

					// Nếu muốn, thêm class tùy biến
					$centered = get_sub_field('centered') ? 'centered' : '';
				?>
					<div class="service-block-three col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box <?php echo esc_attr($centered); ?>">
							<div class="image-box">
								<?php if ($anh_dich_vu): ?>
									<img src="<?php echo esc_url($anh_dich_vu['url']); ?>" alt="<?php echo esc_attr($anh_dich_vu['alt']); ?>" />
								<?php endif; ?>
								<div class="caption"><?php echo esc_html($tieu_de_dich_vu); ?></div>
								<div class="overlay-box">
									<h6><?php echo esc_html($tieu_de_dich_vu); ?></h6>
									<div class="text"><?php echo esc_html($mo_ta_dich_vu); ?></div>
									<a class="read-more" href="<?php echo esc_url($link_xem_them_url); ?>">
										<?php echo ($lang === 'vi') ? 'XEM THÊM' : 'READ MORE'; ?>
										<span class="fa fa-angle-double-right"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>

<!--call-to-action-->
<section class="call-to-action" style="background-image:url(images/background/3.jpg);">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<h2><?php
					$slogan = get_field('slogan', 'option');
					if ($slogan): ?>
						<?php echo esc_html($slogan); ?>
					<?php endif; ?></h2>
				<h4><?php
					$chi_tiet_slogan = get_field('chi_tiet_slogan', 'option');
					if ($chi_tiet_slogan): ?>
						<?php echo esc_html($chi_tiet_slogan); ?>
					<?php endif; ?></h4>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 btn-column">
				<?php
				$ten_nut_slogan = get_field('ten_nut_slogan', 'option');
				$link_nut_slogan_text = get_field('link_nut_slogan', 'option');

				// Xử lý URL thông minh
				$link_nut_slogan_url = filter_var($link_nut_slogan_text, FILTER_VALIDATE_URL)
					? $link_nut_slogan_text
					: home_url('/' . ltrim($link_nut_slogan_text, '/'));
				?>

				<a class="quote-btn btn-style-three theme-btn" href="<?php echo esc_url($link_nut_slogan_url); ?>">
					<?php echo esc_html($ten_nut_slogan); ?>
				</a>
				<!-- <a class="quote-btn btn-style-three theme-btn" href="#">Get a quote</a> -->
			</div>
		</div>
	</div>
</section>

<section class="services-section-two">
	<div class="auto-container">
		<div class="sec-title centered">
			<h2><?php echo ($lang === 'vi') ? 'Sản phẩm tiêu biểu' : 'Featured Products'; ?></h2>
		</div>
		<div class="row clearfix">
			<?php if (get_field('san_pham_tieu_bieu', 'option')): ?>
				<?php while (the_repeater_field('san_pham_tieu_bieu', 'option')):
					$anh_san_pham = get_sub_field('anh_san_pham');
					$tieu_de_san_pham = get_sub_field('tieu_de_san_pham');
					$mo_ta_san_pham = get_sub_field('mo_ta_san_pham');
					$link_xem_them_text = get_sub_field('link_xem_them_san_pham');

					// Xử lý URL thông minh
					$link_xem_them_url = filter_var($link_xem_them_text, FILTER_VALIDATE_URL)
						? $link_xem_them_text
						: home_url('/' . ltrim($link_xem_them_text, '/'));

					// Nếu muốn, thêm class tùy biến
					$centered = get_sub_field('centered') ? 'centered' : '';
				?>
					<div class="service-block-three col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box <?php echo esc_attr($centered); ?>">
							<div class="image-box">
								<?php if ($anh_san_pham): ?>
									<img src="<?php echo esc_url($anh_san_pham['url']); ?>" alt="<?php echo esc_attr($anh_san_pham['alt']); ?>" />
								<?php endif; ?>
								<div class="caption"><?php echo esc_html($tieu_de_san_pham); ?></div>
								<div class="overlay-box">
									<h6><?php echo esc_html($tieu_de_san_pham); ?></h6>
									<div class="text"><?php echo esc_html($mo_ta_san_pham); ?></div>
									<a class="read-more" href="<?php echo esc_url($link_xem_them_url); ?>">
										<?php echo ($lang === 'vi') ? 'XEM THÊM' : 'READ MORE'; ?>
										<span class="fa fa-angle-double-right"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>

<!--Process Section-->
<section class="process-section">
	<div class="auto-container">
		<!--Sec Title-->
		<div class="sec-title centered">
			<h2><?php echo ($lang === 'vi') ? 'Tại sao chọn Vinamek?' : 'Why Choose Vinamek?'; ?>
			</h2>
		</div>
		<div class="row clearfix">
			<?php if (get_field('uu_diem', 'option')): ?>
				<?php while (the_repeater_field('uu_diem', 'option')):
					$icon_class = get_sub_field('icon'); // class icon
					$title = get_sub_field('title');
					$description = get_sub_field('descriptions');
				?>
					<div class="services-block-four col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon-box">
								<?php if ($icon_class): ?>
									<span class="icon <?php echo esc_attr($icon_class); ?>"></span>
								<?php endif; ?>
							</div>
							<h5><?php echo esc_html($title); ?></h5>
							<div class="text"><?php echo esc_html($description); ?></div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>
<!--End Process Section-->

<!--Default Section-->
<section class="default-section style-two">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Testimonial Column-->
			<div class="testimonial-column col-lg-6 col-md-6 col-sm-12">
				<div class="inner-column">

					<div class="sec-title">
						<h2> <?php echo ($lang === 'vi') ? 'Cảm ơn Khách hàng Tin tưởng' : 'Thank you for trusting us'; ?>
						</h2>
					</div>

					<div class="single-vertical-carousel">
						<?php if (get_field('danh_gia_khach_hang', 'option')): ?>
							<?php while (the_repeater_field('danh_gia_khach_hang', 'option')):
								$anh_khach_hang = get_sub_field('anh_khach_hang');
								$ten_khach_hang = get_sub_field('ten_khach_hang');
								$chuc_vu = get_sub_field('chuc_vu');
								$noi_dung = get_sub_field('noi_dung');
							?>
								<div class="testimonial-block" style="height: auto;min-height:280px">
									<div class="inner-box">
										<div class="author-info">
											<?php if ($anh_khach_hang): ?>
												<div class="image">
													<img src="<?php echo esc_url($anh_khach_hang['url']); ?>" alt="<?php echo esc_attr($anh_khach_hang['alt']); ?>" />
												</div>
											<?php endif; ?>
											<h6><?php echo esc_html($ten_khach_hang); ?></h6>
											<div class="designation"><?php echo esc_html($chuc_vu); ?></div>
										</div>
										<div class="text"><?php echo esc_html($noi_dung); ?></div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>

					</div>

				</div>
			</div>

			<!--Graph Column-->
			<div class="graph-column col-lg-6 col-md-6 col-sm-12">
				<div class="inner-column">
					<div class="sec-title">
						<h2> <?php echo ($lang === 'vi') ? 'Tham quan nhà máy Vinamek' : 'Visit Vinamek Factory'; ?>
						</h2>
					</div>
					<div class="graph-image">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.2135327593674!2d106.37011987586945!3d20.8634417934351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31358f63b79e15eb%3A0xf0d6151e75a3719d!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8ahIMSRaeG7h24gVklOQU1FSw!5e0!3m2!1svi!2s!4v1761216597739!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<?php get_footer(); ?>