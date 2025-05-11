<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh toán</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
  @include('navbar')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Thanh toán</h3>
      <a href="{{url('ql_chamsoc')}}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>
    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_ap_dung_km_tc') }}" method="post">
          @csrf
          <div class="row g-3">
          <input type="text" class="form-control" name="id" value="{{$thanh_toan->id}}" hidden>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ho_ten" class="form-label">Khách hàng</label>
                <input type="text" class="form-control" name="ho_ten" value="{{$trong_coi->ho_ten}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label">Ngày trông coi</label>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ ngày</span>
                  <input type="date" class="form-control" name="search_tu_tc" value="{{ $trong_coi->tu_ngay }}" readonly>
                  <span class="mx-3">đến</span>
                  <input type="date" class="form-control" name="search_den_tc" value="{{  $trong_coi->den_ngay }}" readonly>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ngay_dat_lich" class="form-label">Ngày đặt lịch</label>
                <input type="text" class="form-control" name="ngay_dat_lich" value="{{$trong_coi->ngay_dat_lich}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="gio_nhan" class="form-label">Giờ nhận</label>
                <input type="text" class="form-control" name="gio_nhan" value="{{$trong_coi->gio_nhan}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="gio_tra" class="form-label">Giờ trả</label>
                <input type="text" class="form-control" name="gio_tra" value="{{$trong_coi->gio_tra}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
          <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Dịch vụ</th>
                <th scope="col">Đơn giá</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>{{$count}}</t>
                  <td>Trông giữ thú cưng (Nội trú) trên giờ </td>
                  <td>{{$gia_trong}} X {{ $so_gio }}</td>    
                </tr>      
              @foreach ($dich_vu_them as $dich_vu )
              <?php $count++ ?>
                <tr>
                  <td>{{$count}}</t>
                  <td>{{$dich_vu->ten_dich_vu}}</td>
                  <td>{{$dich_vu->don_gia}}</td>    
                </tr>      
              @endforeach
            </tbody>
          </table>
        </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="khuyen_mai">Khuyến mãi</label>
                  <select class="form-select" name="khuyen_mai" id="khuyen_mai" required>
                    <option value="" disabled selected>-- Chọn khuyến mãi --</option>
                    @foreach ($khuyen_mais as $khuyen_mai)
                      <option value="{{ $khuyen_mai->id }}" {{ $thanh_toan->id_khuyen_mai==$khuyen_mai->id?'selected':'' }}>{{ $khuyen_mai->ten_khuyen_mai }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <span class="price">Tổng tiền:</span> 
              <span class="price">{{ $thanh_toan->tong_tien }} VNĐ</span> 
            </div>
          </div>
          </div>
          <div class="col-12 d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('chi_tiet_admin_tc', ['id' => $trong_coi->id]) }}" type="reset" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-repeat me-1"></i>Quay lại
            </a>
            <button type="submit" class="btn btn-warning" {{!empty($thanh_toan->id_khuyen_mai)?'disabled':''}}>
              <i class="fa-solid fa-circle-check"></i>Áp dụng khuyến mãi
            </button>
          </form>
        </div>
      <form action="{{ url('xl_thanh_toan_tc') }}" method="post">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" name="danh_gia" id="search_danhgia_value" value="{{ !empty($search_danhgia)?$search_danhgia:"" }}">
              <label for="search_danhgia" class="form-label">Đánh giá</label>
              <div class="dropdown star-rating-dropdown">
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
        </div>
        <div class="row g-3">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="ghi_chu" class="form-label">Ghi chú thanh toán</label>
              <textarea class="form-control" name="ghi_chu" cols="30" rows="5"></textarea>
            </div>
          </div>
        </div>
        <input type="text" class="form-control" name="id" value="{{$trong_coi->tc_id}}" hidden>
        <div class="col-12 d-flex justify-content-end gap-2 mt-4">
          <button  type="submit" class="btn btn-warning">
            <i class="fa-solid fa-circle-check"></i>Hoàn thành thanh toán
          </button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js" integrity="sha512-bib7srucEhHYYWglYvGY+EQb0JAAW0qSOXpkPTMgCgW8eLtswHA/K4TKyD4+FiXcRHcy8z7boYxk0HTACCTFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
  </script>
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

</html>