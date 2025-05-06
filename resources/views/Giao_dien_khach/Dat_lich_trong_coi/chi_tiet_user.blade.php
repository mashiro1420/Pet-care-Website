<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Chi tiết lịch trông coi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="icon" href="imgs/paw-solid.svg" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
  @include('navbar_user')
  <section class="main-content">
    <div class="container" id="form-section">
      <h2 class="form-title">Chi tiết lịch trông coi</h2>
      <form action="" method="">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
            <div class="mb-3">
              <label for="nhan_vien" class="form-label">Khách hàng</label>
              <input type="text" class="form-control" name="nhan_vien" value="{{$trong_coi->ho_ten}}" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="thumb_nail" class="form-label">Trạng thái</label>
              <input type="text" class="form-control" name="thumb_nail" value="{{$trong_coi->ten_trang_thai}}" readonly>
            </div>
          </div> 
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="tai_khoan" class="form-label">Nhân viên</label>
              <input type="text" class="form-control" name="tai_khoan" value="{{$trong_coi->tai_khoan}}" readonly> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="ngay_trong_coi" class="form-label">Ngày trông coi</label>
              <span>Từ</span>
              <input type="date" class="form-control" name="ngay" value="{{$trong_coi->tu_ngay}}" readonly>
              <span>đến</span>
              <input type="date" class="form-control" name="ngay" value="{{$trong_coi->den_ngay}}">
            </div>
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="loai_noi_dung" class="form-label">Giờ nhận</label>
              <input type="text" class="form-control" name="thoi_gian" value="{{$trong_coi->gio_nhan}}" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="loai_noi_dung" class="form-label">Giờ trả</label>
              <input type="text" class="form-control" name="thoi_gian" value="{{$trong_coi->gio_tra}}" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="nhan_vien" class="form-label">Ngày đặt lịch</label>
              <input type="text" class="form-control" name="ngay_dat_lich" value="{{$trong_coi->ngay_dat_lich}}" readonly>
            </div>
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="ten_giong_thu_cung" class="form-label">Giống thú cưng</label>
              <input type="text" class="form-control" name="ten_giong_thu_cung" value="{{$trong_coi->ten_giong_thu_cung}}" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="danh_gia" class="form-label">Đánh giá</label>
              <div class="form-control bg-light">
                @for ($i = 1; $i <= 5; $i++)
                  @if ($i <= $trong_coi->danh_gia)
                    <i class="bi bi-star-fill text-warning"></i>
                  @else
                    <i class="bi bi-star text-secondary"></i>
                  @endif
                @endfor
              </div>
            </div>
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="ghi_chu" class="form-label">Ghi chú</label>
              <textarea class="form-control" name="ghi_chu" cols="30" rows="10" readonly>
                {{$trong_coi->ghi_chu}}
              </textarea>
            </div>
          </div>
        </div>
        @php
          $selected = $dich_vu_them; // hoặc $trong_coi->dich_vus nếu có
        @endphp

        <div class="form-group">
          <label for="dich_vu">Dịch vụ đã chọn</label>
          <select class="js-example-basic-multiple form-control" multiple disabled>
            @foreach ($dich_vus as $dich_vu)
              <option value="{{ $dich_vu->id }}" {{ in_array($dich_vu->id, $selected) ? 'selected' : '' }}>
                {{ $dich_vu->ten_dich_vu }}
              </option>
            @endforeach
          </select>

          {{-- Input hidden để vẫn gửi dữ liệu khi submit --}}
          @foreach ($selected as $id)
            <input type="hidden" name="dich_vu[]" value="{{ $id }}">
          @endforeach
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="khuyen_mai" class="form-label">Khuyến mãi đã sử dụng</label>
              <input type="text" class="form-control" name="khuyen_mai" value="{{$trong_coi->khuyen_mai}}" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="tong_tien" class="form-label">Tổng tiền</label>
              <input type="text" class="form-control" name="tong_tien" value="{{$trong_coi->tong_tien}}" readonly>
            </div>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-end gap-2 mt-4">
          <a href="{{route('khach_hang_lichchamsoc')}}" type="reset" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-repeat me-1"></i>Quay lại
          </a>
        </div>
      </form>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
  </script>
</body>
</html>
