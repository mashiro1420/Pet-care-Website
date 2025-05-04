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
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
  @include('navbar_user')
  <!-- Main Content -->
  <section class="main-content">
    <div class="container">
      <h2 class="section-title">Lịch chăm sóc thú cưng</h2>
      <div class="d-flex justify-content-end mb-4">
        <a href="{{route('dat_lich')}}" class="btn btn-primary">
          <i class="bi bi-calendar-plus me-2"></i>Đặt lịch chăm sóc
        </a>
      </div>
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
              <td>09:00</td>
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
              <td>14:00</td>
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
              <td>10:00</td>
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
              <td>16:00</td>
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
              <td>13:00</td>
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