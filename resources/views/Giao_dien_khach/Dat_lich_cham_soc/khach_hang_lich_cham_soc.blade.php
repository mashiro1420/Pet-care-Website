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
        <a href="{{route('dat_lich_cs')}}" class="btn btn-primary">
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
            @foreach ($cham_socs as $cham_soc)
              <tr>
                <td>{{ $cham_soc->id }}</td>
                <td>{{ $cham_soc->ngay }}</td>
                <td>{{ $cham_soc->thoi_gian }}</td>
                <td>{{ $cham_soc->ten_giong_thu_cung }}</td>
                <td><span class="badge badge-confirmed">{{ $cham_soc->ten_trang_thai }}</span></td>
                <td>{{ $cham_soc->tai_khoan }}</td>
                <td>
                  <div class="rating">
                    @for ($i = 0; $i < 5; $i++)
                      @if ($i < $cham_soc->danh_gia)
                        <i class="bi bi-star-fill"></i>
                      @else 
                        <i class="bi bi-star"></i>
                      @endif
                    @endfor
                  </div>
                </td>
                <td>{{ number_format($cham_soc->tong_tien, 0, ',', '.') }} đ</td>
                <td><small>{{ $cham_soc->ghi_chu }}</small></td>
                <td>
                  <a href="{{ route('chi_tiet_user_cs', ['id' => $cham_soc->id]) }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye"></i>
                  </a>
                  @if ($cham_soc->ten_trang_thai !== 'Đã thanh toán')
                    <a class="btn btn-sm btn-primary btn-action me-1" 
                      href="{{ route('sua_lich_cs', ['id' => $cham_soc->id]) }}" 
                      style="background-color: rgb(197, 194, 5) !important;"
                      title="Sửa lịch chăm sóc">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  @else
                    <button class="btn btn-sm btn-secondary me-1" disabled 
                            title="Không thể sửa vì lịch đã thanh toán">
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