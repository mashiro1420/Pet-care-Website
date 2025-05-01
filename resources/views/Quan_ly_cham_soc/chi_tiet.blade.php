<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết lịch chăm sóc</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
  @include('navbar')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Chi tiết lịch chăm sóc</h3>
      <a href="{{url('ql_chamsoc')}}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>
    <div class="card">
      <div class="card-body p-4">
        <form action="" method="">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Khách hàng</label>
                <input type="text" class="form-control" name="nhan_vien" value="{{$cham_soc->ho_ten}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="thumb_nail" class="form-label">Trạng thái</label>
                <input type="file" class="form-control" name="thumb_nail" value="{{$cham_soc->trang_thai}}" readonly>
              </div>
            </div> 
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ngay_dang" class="form-label">Nhân viên</label>
                <input type="date" class="form-control" name="ngay_dang" value="{{$cham_soc->tai_khoan}}" readonly> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label">Ngày chăm sóc</label>
                <input type="date" class="form-control" name="ngay" value="{{$cham_soc->ngay}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="loai_noi_dung" class="form-label">Thời gian chăm sóc</label>
                <input type="text" class="form-control" name="thoi_gian" value="{{$cham_soc->thoi_gian}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Ngày đặt lịch</label>
                <input type="text" class="form-control" name="ngay_dat_lich" value="{{$cham_soc->ngay_dat_lich}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ten_giong_thu_cung" class="form-label">Giống thú cưng</label>
                <input type="text" class="form-control" name="ten_giong_thu_cung" value="{{$cham_soc->ten_giong_thu_cung}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="danh_gia" class="form-label">Đánh giá</label>
                <div class="form-control bg-light">
                  @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $cham_soc->danh_gia)
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
                  {{$cham_soc->ghi_chu}}
                </textarea>
              </div>
            </div>
          </div>
          @php
            $dichVuOptions = [
                'Trông giữ thú cưng (Nội trú)',
                'Khám sức khỏe định kỳ',
                'Dịch vụ dắt chó đi dạo',
            ];
            // Các dịch vụ được chọn sẵn
            $selectedDichVu = old('dich_vu', ['Trông giữ thú cưng (Nội trú)', 'Khám sức khỏe định kỳ']);
          @endphp
          <div class="form-group">
              <label for="dich_vu">Chọn dịch vụ</label>
              <select name="dich_vu[]" id="dich_vu" class="form-control" multiple>
                  @foreach ($dichVuOptions as $option)
                      <option value="{{ $option }}" {{ in_array($option, $selectedDichVu) ? 'selected' : '' }}>
                          {{ $option }}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="col-12 d-flex justify-content-end gap-2 mt-4">
            <button type="reset" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-repeat me-1"></i>Quay lại
            </button>
            <button type="submit" class="btn btn-warning">
              <i class="fa-solid fa-circle-check"></i>Xác nhận
            </button>
            <button type="submit" class="btn btn-warning">
              <i class="fa-solid fa-money-bill-wave"></i>Thanh toán
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js" integrity="sha512-bib7srucEhHYYWglYvGY+EQb0JAAW0qSOXpkPTMgCgW8eLtswHA/K4TKyD4+FiXcRHcy8z7boYxk0HTACCTFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>