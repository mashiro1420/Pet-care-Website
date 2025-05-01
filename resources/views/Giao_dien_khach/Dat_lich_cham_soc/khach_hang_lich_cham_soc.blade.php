<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Lịch chăm sóc thú cưng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" href="imgs/paw-solid.svg" type="image/x-icon">
  <style>
    :root {
      --primary-color: #FF6B6B;
      --secondary-color: #4ECDC4;
      --accent-color: #FFD166;
      --dark-color: #1A535C;
      --light-color: #F7FFF7;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      background-color: var(--light-color);
    }

    /* Navbar styling */
    .navbar {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: 700;
      color: var(--primary-color);
    }

    .navbar-brand span {
      color: var(--secondary-color);
    }

    .navbar-nav .nav-link {
      font-weight: 600;
      color: var(--dark-color);
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: var(--primary-color);
    }

    .navbar-nav .nav-link.active {
      color: var(--primary-color);
    }

    /* Main content */
    .main-content {
      padding: 40px 0;
    }

    .section-title {
      font-weight: 700;
      color: var(--dark-color);
      margin-bottom: 30px;
      text-align: center;
      position: relative;
    }

    .section-title:after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background-color: var(--primary-color);
      margin: 15px auto 0;
      border-radius: 2px;
    }

    /* Schedule table */
    .schedule-table {
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .schedule-table th {
      background-color: var(--secondary-color);
      color: white;
      font-weight: 600;
      padding: 15px;
    }

    .schedule-table td {
      padding: 15px;
      vertical-align: middle;
    }

    .schedule-table tbody tr {
      transition: all 0.3s ease;
    }

    .schedule-table tbody tr:hover {
      background-color: rgba(78, 205, 196, 0.1);
    }

    /* Button styling */
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      box-shadow: 0 4px 6px rgba(255, 107, 107, 0.2);
      padding: 10px 24px;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #ff5252;
      border-color: #ff5252;
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(255, 107, 107, 0.3);
    }

    .btn-outline-primary {
      color: var(--primary-color);
      border-color: var(--primary-color);
      padding: 8px 20px;
      font-weight: 600;
    }

    .btn-outline-primary:hover {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(255, 107, 107, 0.3);
    }

    .btn-info {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      color: white;
      padding: 8px 20px;
      font-weight: 600;
    }

    .btn-info:hover {
      background-color: #3dbeb6;
      border-color: #3dbeb6;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(78, 205, 196, 0.3);
    }

    /* Status badges */
    .badge {
      padding: 8px 12px;
      font-weight: 600;
      border-radius: 30px;
    }

    .badge-pending {
      background-color: #FFD166;
      color: #333;
    }

    .badge-confirmed {
      background-color: #06D6A0;
      color: white;
    }

    .badge-completed {
      background-color: #118AB2;
      color: white;
    }

    .badge-cancelled {
      background-color: #EF476F;
      color: white;
    }

    /* Pagination */
    .pagination {
      margin-bottom: 0;
    }

    .pagination .page-link {
      color: var(--dark-color);
      border-color: #dee2e6;
      margin: 0 3px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .pagination .page-item.active .page-link {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      color: white;
    }

    .pagination .page-link:hover:not(.active) {
      background-color: rgba(255, 107, 107, 0.1);
      color: var(--primary-color);
    }

    /* Dropdown menu */
    .dropdown-menu {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      padding: 10px 0;
    }

    .dropdown-item {
      padding: 10px 20px;
      transition: all 0.3s ease;
    }

    .dropdown-item:hover {
      background-color: rgba(255, 107, 107, 0.1);
      color: var(--primary-color);
    }

    .user-icon {
      font-size: 1.5rem;
      cursor: pointer;
    }

    /* Rating stars */
    .rating {
      color: #FFD166;
    }

    /* Table responsive */
    @media (max-width: 992px) {
      .schedule-table {
        display: block;
        overflow-x: auto;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="bi bi-heart-fill me-2"></i>Pet<span>Care</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link active" href="#">Lịch chăm sóc</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lịch trông coi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Xem bài đăng</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle user-icon"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Thông tin tài khoản</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-key me-2"></i>Đổi mật khẩu</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <section class="main-content">
    <div class="container">
      <h2 class="section-title">Lịch chăm sóc thú cưng</h2>
      
      <!-- Add appointment button -->
      <div class="d-flex justify-content-end mb-4">
        <a href="#" class="btn btn-primary">
          <i class="bi bi-calendar-plus me-2"></i>Đặt lịch chăm sóc
        </a>
      </div>
      
      <!-- Schedule Table -->
      <div class="schedule-table table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Ngày chăm sóc</th>
              <th scope="col">Giờ chăm sóc</th>
              <th scope="col">Giống thú cưng</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Nhân viên</th>
              <th scope="col">Đánh giá</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Ghi chú</th>
              <th scope="col">Chi tiết</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#CS001</td>
              <td>02/05/2025</td>
              <td>09:00 - 10:30</td>
              <td>Chó Corgi</td>
              <td><span class="badge badge-confirmed">Đã xác nhận</span></td>
              <td>Nguyễn Văn A</td>
              <td>
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                </div>
              </td>
              <td>500.000 đ</td>
              <td><small>Tắm và cắt tỉa lông</small></td>
              <td>
                <a href="#" class="btn btn-info btn-sm">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>#CS002</td>
              <td>01/05/2025</td>
              <td>14:00 - 15:30</td>
              <td>Mèo Ba Tư</td>
              <td><span class="badge badge-completed">Hoàn thành</span></td>
              <td>Trần Thị B</td>
              <td>
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
              </td>
              <td>650.000 đ</td>
              <td><small>Tắm và spa</small></td>
              <td>
                <a href="#" class="btn btn-info btn-sm">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>#CS003</td>
              <td>05/05/2025</td>
              <td>10:00 - 11:30</td>
              <td>Chó Husky</td>
              <td><span class="badge badge-pending">Chờ xác nhận</span></td>
              <td>Chưa phân công</td>
              <td>
                <div class="rating">
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                </div>
              </td>
              <td>800.000 đ</td>
              <td><small>Tắm, cắt tỉa và chăm sóc y tế</small></td>
              <td>
                <a href="#" class="btn btn-info btn-sm">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>#CS004</td>
              <td>30/04/2025</td>
              <td>16:00 - 17:00</td>
              <td>Mèo Anh lông ngắn</td>
              <td><span class="badge badge-cancelled">Đã hủy</span></td>
              <td>Phạm Văn C</td>
              <td>
                <div class="rating">
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                </div>
              </td>
              <td>450.000 đ</td>
              <td><small>Khách hàng hủy do bận việc đột xuất</small></td>
              <td>
                <a href="#" class="btn btn-info btn-sm">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>#CS005</td>
              <td>03/05/2025</td>
              <td>13:00 - 14:30</td>
              <td>Chó Poodle</td>
              <td><span class="badge badge-confirmed">Đã xác nhận</span></td>
              <td>Lê Thị D</td>
              <td>
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </div>
              </td>
              <td>550.000 đ</td>
              <td><small>Cắt tỉa lông nghệ thuật</small></td>
              <td>
                <a href="#" class="btn btn-info btn-sm">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="d-flex justify-content-between align-items-center mt-3">
      <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
          @if ($cham_socs->onFirstPage())
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{ $cham_socs->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
          @endif

          @foreach ($cham_socs->getUrlRange(1, $cham_socs->lastPage()) as $page => $url)
            @if ($page == $cham_socs->currentPage())
              <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach

          @if ($cham_socs->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $cham_socs->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
          @else
            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
          @endif
        </ul>
      </nav>
    </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>