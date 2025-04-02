<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Dịch vụ chăm sóc thú cưng chuyên nghiệp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/quang_ba.css') }}">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="bi bi-heart-fill me-2"></i>Pet<span>Care</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#home">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Dịch vụ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">Về chúng tôi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pricing">Bảng giá</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Thư viện</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Liên hệ</a>
          </li>
          <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
            <a class="btn btn-primary" href="{{ route('dang_nhap') }}">
              Đăng nhập
            </a>
            <a class="btn btn-primary" href="{{ route('dang_ky') }}">
              Đăng ký
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero" id="home">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1>Chăm sóc thú cưng của bạn với tình yêu thương</h1>
          <p>Chúng tôi cung cấp dịch vụ chăm sóc thú cưng chuyên nghiệp, đảm bảo những người bạn bốn chân của bạn luôn
            khỏe mạnh và hạnh phúc.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="#services" class="btn btn-primary">
              <i class="bi bi-info-circle me-2"></i>Tìm hiểu thêm
            </a>
            <a href="#booking" class="btn btn-outline-light">
              <i class="bi bi-calendar-check me-2"></i>Đặt lịch ngay
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row py-4 text-center">
      <div class="col">
        <div class="d-flex justify-content-around">
          <div class="pet-icon pet-icon-1">
            <i class="bi bi-github text-primary" style="font-size: 3rem;"></i>
          </div>
          <div class="pet-icon pet-icon-2">
            <i class="bi bi-pinterest text-primary" style="font-size: 3rem;"></i>
          </div>
          <div class="pet-icon pet-icon-3">
            <i class="bi bi-twitter text-primary" style="font-size: 3rem;"></i>
          </div>
          <div class="pet-icon pet-icon-4">
            <i class="bi bi-instagram text-primary" style="font-size: 3rem;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="services" id="services">
    <div class="container">
      <h2 class="section-title">Dịch vụ của chúng tôi</h2>
      <div class="row">

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <img src="./imgs/shower.webp" class="card-img-top" alt="Dịch vụ tắm và vệ sinh">
            <div class="card-body text-center py-4">
              <div class="service-icon">
                <i class="bi bi-droplet"></i>
              </div>
              <h4 class="card-title mb-3">Tắm và vệ sinh</h4>
              <p class="card-text">Dịch vụ tắm, cắt tỉa lông và vệ sinh toàn diện cho thú cưng của bạn, giúp loại bỏ mùi
                hôi và giữ cho bộ lông luôn sạch đẹp.</p>
              <a href="#booking" class="btn btn-outline-primary mt-3">Đặt lịch</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <img src="./imgs/medical.webp" class="card-img-top" alt="Chăm sóc y tế">
            <div class="card-body text-center py-4">
              <div class="service-icon">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <h4 class="card-title mb-3">Chăm sóc y tế</h4>
              <p class="card-text">Đội ngũ bác sĩ thú y giàu kinh nghiệm cung cấp dịch vụ kiểm tra sức khỏe, tiêm phòng
                và điều trị bệnh cho thú cưng.</p>
              <a href="#booking" class="btn btn-outline-primary mt-3">Đặt lịch</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <img src="./imgs/training.jpg" class="card-img-top" alt="Huấn luyện thú cưng">
            <div class="card-body text-center py-4">
              <div class="service-icon">
                <i class="bi bi-trophy"></i>
              </div>
              <h4 class="card-title mb-3">Huấn luyện thú cưng</h4>
              <p class="card-text">Chương trình huấn luyện chuyên nghiệp giúp thú cưng của bạn phát triển hành vi tốt và
                kỹ năng tuân lệnh cơ bản.</p>
              <a href="#booking" class="btn btn-outline-primary mt-3">Đặt lịch</a>
            </div>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <img src="./imgs/hotel.jpg" class="card-img-top" alt="Trông giữ thú cưng">
            <div class="card-body text-center py-4">
              <div class="service-icon">
                <i class="bi bi-house-heart"></i>
              </div>
              <h4 class="card-title mb-3">Trông giữ thú cưng</h4>
              <p class="card-text">Dịch vụ trông giữ thú cưng chuyên nghiệp khi bạn đi công tác hoặc nghỉ dưỡng, đảm bảo
                thú cưng được chăm sóc chu đáo.</p>
              <a href="#booking" class="btn btn-outline-primary mt-3">Đặt lịch</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <img src="./imgs/cat.jpg" class="card-img-top" alt="Spa và Mát-xa">
            <div class="card-body text-center py-4">
              <div class="service-icon">
                <i class="bi bi-gem"></i>
              </div>
              <h4 class="card-title mb-3">Spa và Mát-xa</h4>
              <p class="card-text">Trải nghiệm spa cao cấp dành cho thú cưng với các dịch vụ mát-xa, điều trị da và
                dưỡng lông giúp thú cưng thư giãn.</p>
              <a href="#booking" class="btn btn-outline-primary mt-3">Đặt lịch</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <img src="./imgs/taxi.webp" class="card-img-top" alt="Dịch vụ taxi thú cưng">
            <div class="card-body text-center py-4">
              <div class="service-icon">
                <i class="bi bi-car-front"></i>
              </div>
              <h4 class="card-title mb-3">Taxi thú cưng</h4>
              <p class="card-text">Dịch vụ đưa đón thú cưng tận nhà, đảm bảo sự an toàn và thoải mái trong suốt quá
                trình di chuyển.</p>
              <a href="#booking" class="btn btn-outline-primary mt-3">Đặt lịch</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <h2 class="section-title text-white">Khách hàng nói gì về chúng tôi</h2>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="d-flex align-items-center mb-3">
              <img src="./imgs/nguyen_van_a.jpg" alt="Customer Image" class="me-3">
              <div>
                <h5 class="mb-0">Nguyễn Văn A</h5>
                <small>Chủ của Milu</small>
              </div>
            </div>
            <div class="quote-icon mb-2">
              <i class="bi bi-quote"></i>
            </div>
            <p>"Dịch vụ chăm sóc tại PetCare thực sự tuyệt vời. Milu của tôi luôn trở về với bộ lông mềm mượt và tinh
              thần phấn chấn. Các bác sĩ và nhân viên rất chuyên nghiệp và yêu thương thú cưng."</p>
            <div class="mt-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="d-flex align-items-center mb-3">
              <img src="./imgs/tran_thi_b.jpg" alt="Customer Image" class="me-3">
              <div>
                <h5 class="mb-0">Trần Thị B</h5>
                <small>Chủ của Kitty</small>
              </div>
            </div>
            <div class="quote-icon mb-2">
              <i class="bi bi-quote"></i>
            </div>
            <p>"Tôi đã thử nhiều dịch vụ chăm sóc thú cưng khác nhau, nhưng PetCare thực sự khác biệt. Kitty của tôi
              từng rất sợ khi đi tắm, nhưng giờ rất thích thú mỗi khi đến đây. Cảm ơn vì sự kiên nhẫn và tận tâm!"</p>
            <div class="mt-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-half text-warning"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="d-flex align-items-center mb-3">
              <img src="./imgs/le_van_c.jpg" alt="Customer Image" class="me-3">
              <div>
                <h5 class="mb-0">Lê Văn C</h5>
                <small>Chủ của Rex</small>
              </div>
            </div>
            <div class="quote-icon mb-2">
              <i class="bi bi-quote"></i>
            </div>
            <p>"Dịch vụ y tế tại PetCare thực sự đáng tin cậy. Khi Rex của tôi bị bệnh, đội ngũ bác sĩ đã phản ứng nhanh
              chóng và chuyên nghiệp. Giờ đây chú chó của tôi đã hoàn toàn khỏe mạnh. Cảm ơn PetCare!"</p>
            <div class="mt-3">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about-us" id="about">
    <div class="container">
      <h2 class="section-title">Về chúng tôi</h2>
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="about-img">
            <img src="./imgs/footer.webp" alt="About PetCare" class="img-fluid rounded-3">
          </div>
        </div>
        <div class="col-lg-6">
          <h3 class="mb-4">Chăm sóc thú cưng với trái tim</h3>
          <p>PetCare được thành lập vào năm 2015 với sứ mệnh mang đến dịch vụ chăm sóc thú cưng chất lượng cao và đầy
            tình yêu thương. Chúng tôi hiểu rằng thú cưng không chỉ là vật nuôi mà còn là thành viên quan trọng trong
            gia đình bạn.</p>
          <p>Với đội ngũ bác sĩ thú y giàu kinh nghiệm và nhân viên yêu thương động vật, chúng tôi cam kết mang đến trải
            nghiệm chăm sóc tốt nhất cho thú cưng của bạn. Cơ sở vật chất hiện đại, quy trình chăm sóc khoa học và thái
            độ phục vụ tận tâm là những gì chúng tôi luôn tự hào.</p>
          <div class="row mt-4">
            <div class="col-md-6 mb-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2" style="font-size: 1.5rem;"></i>
                <span>Đội ngũ bác sĩ thú y chuyên nghiệp</span>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2" style="font-size: 1.5rem;"></i>
                <span>Cơ sở vật chất hiện đại</span>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2" style="font-size: 1.5rem;"></i>
                <span>Dịch vụ 24/7</span>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2" style="font-size: 1.5rem;"></i>
                <span>Chăm sóc tận tình và chu đáo</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="pricing" id="pricing">
    <div class="container">
      <h2 class="section-title">Bảng giá dịch vụ</h2>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-card">
            <div class="card-header text-center">
              <h3>Gói Cơ Bản</h3>
              <p>500.000 VNĐ</p>
            </div>
            <div class="card-body text-center">
              <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill"></i>Tắm và vệ sinh</li>
                <li><i class="bi bi-check-circle-fill"></i>Cắt tỉa lông cơ bản</li>
                <li><i class="bi bi-x-circle-fill text-danger"></i>Không bao gồm dịch vụ y tế</li>
              </ul>
            </div>
            <div class="card-footer text-center">
              <a href="#booking" class="btn btn-primary">Đặt lịch</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-card">
            <div class="card-header text-center">
              <h3>Gói Nâng Cao</h3>
              <p>1.000.000 VNĐ</p>
            </div>
            <div class="card-body text-center">
              <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill"></i>Tắm và vệ sinh</li>
                <li><i class="bi bi-check-circle-fill"></i>Cắt tỉa lông nâng cao</li>
                <li><i class="bi bi-check-circle-fill"></i>Dịch vụ y tế cơ bản</li>
              </ul>
            </div>
            <div class="card-footer text-center">
              <a href="#booking" class="btn btn-primary">Đặt lịch</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-card">
            <div class="card-header text-center">
              <h3>Gói Cao Cấp</h3>
              <p>1.500.000 VNĐ</p>
            </div>
            <div class="card-body text-center">
              <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill"></i>Tắm và vệ sinh</li>
                <li><i class="bi bi-check-circle-fill"></i>Cắt tỉa lông cao cấp</li>
                <li><i class="bi bi-check-circle-fill"></i>Dịch vụ y tế nâng cao</li>
                <li><i class="bi bi-check-circle-fill"></i>Huấn luyện thú cưng</li>
              </ul>
            </div>
            <div class="card-footer text-center">
              <a href="#booking" class="btn btn-primary">Đặt lịch</a>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </section>
  <section class="gallery" id="gallery">
    <div class="container">
      <h2 class="section-title">Thư viện ảnh</h2>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="gallery-item">
            <img src="./imgs/gal1.jpg" alt="Gallery Image 1" class="img-fluid rounded-3">
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="gallery-item">
            <img src="./imgs/gal2.jpg" alt="Gallery Image 2" class="img-fluid rounded-3">
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="gallery-item">
            <img src="./imgs/gal3.webp" alt="Gallery Image 3" class="img-fluid rounded-3">
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="gallery-item">
            <img src="./imgs/gal4.jpg" alt="Gallery Image 4" class="img-fluid rounded-3">
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="gallery-item">
            <img src="./imgs/gal5.png" alt="Gallery Image 5" class="img-fluid rounded-3">
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="gallery-item">
            <img src="./imgs/gal6.png" alt="Gallery Image 5" class="img-fluid rounded-3">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section -->
  <section class="contact" id="contact">
    <div class="container">
      <h2 class="section-title">Liên hệ với chúng tôi</h2>
      <div class="row">
        <div class="col-lg-6 mb-4">
          <form action="#" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Họ và tên</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Tin nhắn</label>
              <textarea class="form-control" id="message" name="message" rows="5" placeholder="Nhập tin nhắn của bạn" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="contact-info">
            <h4>Thông tin liên hệ</h4>
            <p><i class="bi bi-geo-alt-fill"></i> Địa chỉ: 123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh</p>
            <p><i class="bi bi-telephone-fill"></i> Điện thoại: +84 123 456 789</p>
            <p><i class="bi bi-envelope-fill"></i> Email: contact@petcare.vn</p>
            <p><i class="bi bi-clock-fill"></i> Giờ làm việc: 8:00 - 20:00 (Thứ 2 - Chủ Nhật)</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>