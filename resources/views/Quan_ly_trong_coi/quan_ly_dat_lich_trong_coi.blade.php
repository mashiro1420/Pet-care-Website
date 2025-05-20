<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý lịch trông coi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
  @include('navbar')
  <div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Quản lý lịch trông coi</h3>
    </div>
    <div class="card search-card mb-4">
      <div class="card-body">
        <form action="{{ route('ql_trongcoi') }}" method="get">
          @csrf
          <div class="row g-3">
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_khachhang" class="form-label">Khách hàng</label>
                <input type="text" class="form-control" name="search_khachhang" value="{{ !empty($search_khachhang)?$search_khachhang:"" }}" placeholder="Nhập tên khách hàng">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_trangthai" class="form-label">Trạng thái</label>
                <select class="form-select" name="search_trangthai">
                  <option value="">Tất cả</option>
                  @foreach ($trang_thais as $trang_thai)
                    <option value="{{$trang_thai->id}}" {{ !empty($search_trangthai)&&$search_trangthai==$trang_thai->id?"selected":"" }}>{{$trang_thai->ten_trang_thai}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_ngay" class="form-label">Ngày trông coi</label><br>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ</span>
                  <input type="date" class="form-control" name="search_tu_tc" value="{{ !empty($search_tu_tc)?$search_tu_tc:"" }}">
                  <span class="mx-3">đến</span>
                  <input type="date" class="form-control" name="search_den_tc" value="{{ !empty($search_den_tc)?$search_den_tc:"" }}">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_ngaydatlich" class="form-label">Ngày đặt lịch</label><br>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ</span>
                  <input type="date" class="form-control" name="search_tu_dat" value="{{ !empty($search_tu_dat)?$search_tu_dat:"" }}">
                  <span class="mx-3">đến</span>
                  <input type="date" class="form-control" name="search_den_dat" value="{{ !empty($search_den_dat)?$search_den_dat:"" }}">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_danhgia" class="form-label">Đánh giá</label>
                <div class="dropdown star-rating-dropdown">
                  <input type="hidden" name="search_danhgia" id="search_danhgia_value" value="{{ !empty($search_danhgia)?$search_danhgia:"" }}">
                  <button class="form-select dropdown-toggle d-flex align-items-center justify-content-between" type="button" id="starRatingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="selectedRating">Chọn đánh giá</span>
                  </button>
                  <ul class="dropdown-menu w-100" aria-labelledby="starRatingDropdown">
                    <li><a class="dropdown-item" data-value="0">Tất cả</a></li>
                    <li><a class="dropdown-item" data-value="5">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </a></li>
                    <li><a class="dropdown-item" data-value="4">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                    </a></li>
                    <li><a class="dropdown-item" data-value="3">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                    </a></li>
                    <li><a class="dropdown-item" data-value="2">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                    </a></li>
                    <li><a class="dropdown-item" data-value="1">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                      <i class="bi bi-star-fill text-secondary"></i>
                    </a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 text-end">
              <button type="submit" class="btn btn-warning">
                <i class="bi bi-search me-1"></i>Tìm kiếm
              </button>
              <button type="reset" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Nhân viên</th>
                <th scope="col">Ngày trông coi</th>
                <th scope="col">Giờ nhận</th>
                <th scope="col">Giờ trả</th>
                <th scope="col">Giống thú cưng</th>
                <th scope="col">Đánh giá</th>
                <th scope="col">Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($trong_cois as $trong_coi)
                <tr>
                  <td>{{$trong_coi->tc_id}}</td>
                  <td>{{$trong_coi->ho_ten}}</td>
                  <td>{{$trong_coi->ten_trang_thai}}</td>
                  <td>{{$trong_coi->tai_khoan}}</td>
                  <td>{{$trong_coi->tu_ngay}} ~ {{$trong_coi->den_ngay}}</td>
                  <td>{{$trong_coi->gio_nhan}}</td>
                  <td>{{$trong_coi->gio_tra}}</td>
                  <td>{{$trong_coi->ten_giong_thu_cung}}</td>
                  <td>{{$trong_coi->danh_gia}}</td>
                  <td>
                    <a href="{{ route('chi_tiet_admin_tc', ['id' => $trong_coi->tc_id]) }}" class="btn btn-info btn-sm">
                      <i class="bi bi-eye-fill"></i> Chi tiết
                    </a>
                  </td>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
          <nav aria-label="Page navigation">
            <ul class="pagination mb-0">
              @if ($trong_cois->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $trong_cois->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($trong_cois->getUrlRange(1, $trong_cois->lastPage()) as $page => $url)
                @if ($page == $trong_cois->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($trong_cois->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $trong_cois->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const dropdownItems = document.querySelectorAll('.star-rating-dropdown .dropdown-item');
      const selectedRating = document.getElementById('selectedRating');
      const hiddenInput = document.getElementById('search_danhgia_value');
      
      dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
          const value = this.getAttribute('data-value');
          hiddenInput.value = value;
          
          // Update the button content with the selected stars
          if (value === '0') {
            selectedRating.innerHTML = 'Tất cả';
          } else {
            // Clone the stars from the selected item
            selectedRating.innerHTML = '';
            const stars = this.cloneNode(true).innerHTML;
            selectedRating.innerHTML = stars;
          }
        });
      });
    });
  </script>
</body>
@include('error_notification')
</html>