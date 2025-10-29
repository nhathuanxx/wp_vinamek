<?php

/**
 * Template Name: Giới thiệu
 */
get_header();
$lang = pll_current_language('slug'); // vi / en
?>
<?php get_template_part('template-parts/page', 'title'); ?>

<div class="sidebar-page-container">
  <div class="auto-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="company-intro">
          <div class="col-inner">
            <?php if ($lang === 'vi'): ?>
              <h3 class="section-title">Lịch Sử Hình Thành và Phát Triển</h3>
              <p>Công ty CP Vinamek được thành lập từ 1/2019, chuyên tư vấn – thiết kế – lắp đặt – bảo trì, bảo dưỡng hệ thống điện, đèn chiếu sáng, vỏ tủ điện, vỏ tủ PCCC và sản xuất tủ điện, thang, máng cáp, cơ khí các loại theo yêu cầu khách hàng. Đây là tâm huyết của nhiều kỹ sư và chuyên viên đã có gần 10 năm kinh nghiệm tại các công ty hàng đầu về lĩnh vực điện tại Đài Loan. Vinamek quyết tâm tối ưu hóa hệ thống điện trong các nhà máy, khu công nghiệp lên tầm cao mới.</p>

              <h3 class="section-title">Giá Trị Cốt Lõi</h3>
              <ul>
                <li><strong>Tín:</strong> Uy tín được coi là tiêu chí hàng đầu, đảm bảo sự tin cậy và danh dự của công ty.</li>
                <li><strong>Tâm:</strong> Lấy khách hàng làm trung tâm, đặt lợi ích khách hàng lên hàng đầu.</li>
                <li><strong>Tốc:</strong> Đảm bảo tốc độ và hiệu quả trong mọi hoạt động.</li>
                <li><strong>Nhân:</strong> Xây dựng mối quan hệ bằng thiện chí, coi người lao động là tài sản quý giá.</li>
              </ul>

              <h3 class="section-title">Lĩnh Vực Hoạt Động</h3>
              <p>Vinamek chuyên tư vấn, thiết kế, lắp đặt, bảo trì hệ thống điện, đèn chiếu sáng, vỏ tủ điện, vỏ tủ PCCC, sản xuất tủ điện, thang, máng cáp, cơ khí theo yêu cầu khách hàng.</p>

              <h3 class="section-title">Cam Kết</h3>
              <p>Chúng tôi cam kết đem đến sản phẩm và dịch vụ chất lượng, đáp ứng mọi yêu cầu của khách hàng và đối tác.</p>

              <h3 class="section-title">Quy Mô</h3>
              <p>Với đội ngũ nhân sự trẻ trung, chuyên nghiệp, Vinamek tự tin cung cấp sản phẩm và dịch vụ tốt nhất.</p>

              <h3 class="section-title">Hệ Thống Công Ty Thành Viên</h3>
              <p>Vinamek là một phần của hệ thống công ty liên kết:</p>
              <ol>
                <li><strong>Vinamek Electric:</strong> Cung cấp sản phẩm và dịch vụ về thiết bị điện.</li>
                <li><strong>Thang Máy Vinamek:</strong> Giải pháp thang máy an toàn, hiệu quả.</li>
                <li><strong>TopE Electric:</strong> Điểm đến cho sản phẩm và dịch vụ điện.</li>
                <li><strong>WynG:</strong> Thiết kế và thi công nội thất.</li>
              </ol>
            <?php else: ?>
              <h3 class="section-title">History and Development</h3>
              <p>Vinamek JSC was founded in January 2019, specializing in consulting, designing, installing, maintaining electrical systems, lighting, electrical cabinets, fire protection cabinets, and manufacturing electrical panels, ladders, cable trays, and mechanical equipment according to customer requirements. Vinamek is committed to optimizing industrial electrical systems to a new level.</p>

              <h3 class="section-title">Core Values</h3>
              <ul>
                <li><strong>Trust:</strong> Reputation is the top priority, ensuring reliability and company honor.</li>
                <li><strong>Care:</strong> Customer-centric approach, prioritizing customer interests.</li>
                <li><strong>Speed:</strong> Ensure efficiency and prompt delivery of products and services.</li>
                <li><strong>Human:</strong> Build relationships with goodwill and value employees as assets.</li>
              </ul>

              <h3 class="section-title">Fields of Operation</h3>
              <p>Vinamek specializes in consulting, designing, installing, and maintaining electrical systems, lighting, electrical cabinets, fire protection cabinets, and manufacturing according to customer requirements.</p>

              <h3 class="section-title">Commitment</h3>
              <p>We are committed to providing quality products and services, meeting all customer and partner requirements.</p>

              <h3 class="section-title">Scale</h3>
              <p>With a young and professional team, Vinamek confidently delivers the best products and services.</p>

              <h3 class="section-title">Member Companies</h3>
              <p>Vinamek is part of a larger affiliated company system:</p>
              <ol>
                <li><strong>Vinamek Electric:</strong> Electrical products and services.</li>
                <li><strong>Vinamek Elevator:</strong> Safe and efficient elevator solutions.</li>
                <li><strong>TopE Electric:</strong> Reliable electrical product and service provider.</li>
                <li><strong>WynG:</strong> Interior design and construction.</li>
              </ol>
            <?php endif; ?>
          </div>
        </div>
    <?php endwhile;
    endif; ?>

    <?php get_template_part('template-parts/contact-section'); ?>
  </div>
</div>

<?php get_footer(); ?>

<style>
  .company-intro {
    color: #333;
    line-height: 1.8;
  }

  .company-title {
    text-align: center;
    font-size: 28px;
    color: #13b5ea;
    margin-bottom: 30px;
  }

  .section-title {
    font-size: 22px;
    color: #13b5ea;
    margin-top: 25px;
    margin-bottom: 10px;
  }

  .company-intro p {
    margin-bottom: 15px;
    text-align: justify;
  }

  .company-intro ul,
  .company-intro ol {
    margin-left: 20px;
    margin-bottom: 20px;
  }

  .company-intro li {
    margin-bottom: 10px;
  }

  @media(max-width:768px) {
    .company-intro .col-inner {
      padding: 15px;
    }

    .company-title {
      font-size: 24px;
    }

    .section-title {
      font-size: 20px;
    }
  }
</style>