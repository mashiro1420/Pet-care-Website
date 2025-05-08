<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết khách hàng</title>
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
      <h3 class="mb-0">Chi tiết khách hàng</h3>
      <a href="{{url('ql_kh')}}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>
    <div class="card">
      <div class="card-body p-4">
        <form >
          @csrf
          <div class="row g-3">
            {{-- <input type="text" class="form-control" name="id" value="{{$khach_hang->id}}" hidden> --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ho_ten" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" name="ho_ten" value="{{$khach_hang->ho_ten}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="trang_thai" value="{{$khach_hang->ngay_sinh}}" readonly>
              </div>
            </div> 
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="nhan_vien" value="{{$khach_hang->ngay_lam_cc}}" readonly> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label">Email</label>
                <input type="date" class="form-control" name="ngay" value="{{$khach_hang->email}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="loai_noi_dung" class="form-label">Căn cước công dân</label>
                <input type="text" class="form-control" name="thoi_gian" value="{{$khach_hang->cccd}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Ngày làm căn cước</label>
                <input type="text" class="form-control" name="ngay_dat_lich" value="{{$khach_hang->ngay_lam_cc}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ten_giong_thu_cung" class="form-label">Nơi làm căn cước</label>
                <input type="text" class="form-control" name="ten_giong_thu_cung" value="{{$khach_hang->noi_lam_cc}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Ngày tạo</label>
                <input type="text" class="form-control" name="ngay_dat_lich" value="{{$khach_hang->ngay_tao}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label">Loại khách hàng</label>
                <input type="text" class="form-control" name="ngay_dat_lich" value="{{$khach_hang->ten_loai_khach}}" readonly>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="so_lan_cham_soc" class="form-label">Số lần chăm sóc</label>
                <input type="text" class="form-control" name="so_lan_cham_soc" value="{{$khach_hang->so_lan_cham_soc}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="so_lan_trong_coi" class="form-label">Số lần trông coi</label>
                <input type="text" class="form-control" name="so_lan_trong_coi" value="{{$khach_hang->so_lan_trong_coi}}" readonly>
              </div>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-end gap-2 mt-4">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalDangKyHoiVien" {{ empty($khach_hang->hoi_vien_id)?"":"hidden" }}>
              <i class="fa-solid fa-gears"></i>Đăng ký hội viên
            </button>
          </form>
          </div>
      </div>
    </div>
  </div>
    <!-- Modal Add DkyHoiVien -->
  <div class="modal fade" id="modalDangKyHoiVien" tabindex="-1" aria-labelledby="modalDangKyHoiVienLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDangKyHoiVienLabel">Đăng ký hội viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('xl_dky_hv') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="id_khach_hang" value="{{ $khach_hang->khach_hang_id }}" hidden>
            <div class="mb-3">
                <label for="cccd" class="form-label">Căn cước công dân</label>
                <input type="text" class="form-control" name="cccd" required placeholder="Nhập căn cước công dân">
            </div>
            <div class="mb-3">
                <label for="noi_lam_cc" class="form-label">Nơi làm căn cước</label>
                <input type="text" class="form-control" name="noi_lam_cc" required placeholder="Nhập nơi làm căn cước">
            </div>
            <div class="mb-3">
                <label for="ngay_lam_cc" class="form-label">Ngày làm căn cước</label>
                <input type="date" class="form-control" name="ngay_lam_cc" required>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Thêm</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
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