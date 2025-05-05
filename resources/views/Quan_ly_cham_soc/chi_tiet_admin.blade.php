<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết lịch chăm sóc</title>
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
      <h3 class="mb-0">Chi tiết lịch chăm sóc</h3>
      <a href="{{url('ql_chamsoc')}}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>
    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_xac_nhan_cs') }}" method="POST">
          @csrf
          <div class="row g-3">
            <input type="text" class="form-control" name="id" value="{{$cham_soc->cs_id}}" hidden>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ho_ten" class="form-label">Khách hàng</label>
                <input type="text" class="form-control" name="ho_ten" value="{{$cham_soc->ho_ten}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label">Trạng thái</label>
                <input type="text" class="form-control" name="trang_thai" value="{{$cham_soc->ten_trang_thai}}" readonly>
              </div>
            </div> 
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Nhân viên</label>
                <input type="text" class="form-control" name="nhan_vien" value="{{$cham_soc->tai_khoan}}" readonly> 
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
          <div class="form-group">
            @php
              $selected = $dich_vu_them;
            @endphp
              <label for="dich_vu_them">Chọn dịch vụ</label>
              <select class="js-example-basic-multiple form-control" name="dich_vu_them[]" id="dich_vu_them" multiple='multiple' {{ $cham_soc->id_trang_thai==1||$cham_soc->id_trang_thai==2?'required':'disabled' }}>
                @foreach ($dich_vus as $dich_vu)
                  <option value="{{ $dich_vu->id }}" {{ in_array($dich_vu->id, $selected) ? 'selected' : '' }}>
                    {{ $dich_vu->ten_dich_vu }}
                  </option>
                @endforeach
              </select>
          </div>
          <div class="col-12 d-flex justify-content-end gap-2 mt-4">
            <button type="reset" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-repeat me-1"></i>Quay lại
            </button>
            <button type="submit" class="btn btn-warning" {{$cham_soc->id_trang_thai!=1?'disabled':''}}>
              <i class="fa-solid fa-gears"></i>Xác nhận
            </button>
          </form>
          <form action="{{ url('xl_hoan_thanh_cs') }}" method="post">
            @csrf
            <input type="text" class="form-control" name="id" value="{{$cham_soc->cs_id}}" hidden>
            <button  type="submit" class="btn btn-warning" {{$cham_soc->id_trang_thai!=2?'disabled':''}}>
              <i class="fa-solid fa-circle-check"></i>Hoàn thành
            </button>
          </form>
          <form action="{{ route('thanh_toan_cs') }}" method="get">
            @csrf
            <input type="text" class="form-control" name="id" value="{{$cham_soc->cs_id}}" hidden>
            <button  type="submit" class="btn btn-warning" {{$cham_soc->id_trang_thai!=3?'disabled':''}}>
              <i class="fa-solid fa-money-bill-wave"></i>Thanh toán
            </button>
          </form>
          </div>
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
</body>

</html>