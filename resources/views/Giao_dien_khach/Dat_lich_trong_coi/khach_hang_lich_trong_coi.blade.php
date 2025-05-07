<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Lịch trông coi thú cưng</title>
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
      <h2 class="section-title">Lịch trông coi thú cưng</h2>
      <div class="d-flex justify-content-end mb-4">
        <a href="{{route('dat_lich_tc')}}" class="btn btn-primary">
          <i class="bi bi-calendar-plus me-2"></i>Đặt lịch trông coi
        </a>
      </div>
      <div class="schedule-table table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Ngày trông coi</th>
              <th scope="col">Giờ nhận</th>
              <th scope="col">Giờ trả</th>
              <th scope="col">Giống thú cưng</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Đánh giá</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Chi tiết</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($trong_cois as $trong_coi)
              <tr>
                <td>{{ $trong_coi->id }}</td>
                <td>{{ $trong_coi->tu_ngay }} ~ {{ $trong_coi->den_ngay }}</td>
                <td>{{ $trong_coi->gio_nhan }}</td>
                <td>{{ $trong_coi->gio_tra }}</td>
                <td>{{ $trong_coi->ten_giong_thu_cung }}</td>
                <td><span class="badge badge-confirmed">{{ $trong_coi->ten_trang_thai }}</span></td>
                <td>
                  <div class="rating">
                    @for ($i = 0; $i < 5; $i++)
                      @if ($i < $trong_coi->danh_gia)
                        <i class="bi bi-star-fill"></i>
                      @else 
                        <i class="bi bi-star"></i>
                      @endif
                    @endfor
                  </div>
                </td>
                <td>{{ number_format($trong_coi->tong_tien, 0, ',', '.') }} đ</td>
                <td>
                  <a href="{{ route('chi_tiet_user_tc', ['id' => $trong_coi->id]) }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye"></i>
                  </a>
                  @if ($trong_coi->ten_trang_thai !== 'Đã thanh toán'&&$trong_coi->ten_trang_thai !== 'Đã hủy')
                    <a class="btn btn-sm btn-primary btn-action me-1" 
                      href="{{ route('sua_lich_tc', ['id' => $trong_coi->id]) }}" 
                      style="background-color: rgb(197, 194, 5) !important;"
                      title="Sửa lịch trông coi">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  @else
                    <button class="btn btn-sm btn-secondary me-1" disabled 
                            title="Không thể sửa vì lịch đã thanh toán hoặc hủy">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="d-flex justify-content-between align-items-center mt-3">
      <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
          @if ($trong_cois->onFirstPage())
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{ $trong_cois->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
          @endif
          @foreach ($trong_cois->getUrlRange(1, $trong_cois->lastPage()) as $page => $url)
            @if ($page == $trong_cois->currentPage())
              <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
          @if ($trong_cois->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $trong_cois->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
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