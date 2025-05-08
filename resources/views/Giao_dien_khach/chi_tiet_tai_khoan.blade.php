<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PetCare - Chi tiết tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="imgs/paw-solid.svg" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/chi_tiet_tai_khoan.css') }}">
</head>
<body>
    @include('navbar_user')
  <section id="account-section">
    <h2 class="form-title">Chi tiết tài khoản</h2>
    <form>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Họ và tên</label>
          <input type="text" class="form-control" value="{{ $khach_hang->ho_ten }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Ngày sinh</label>
          <input type="date" class="form-control" value="{{ $khach_hang->ngay_sinh }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" value="{{ $khach_hang->sdt }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="{{ $khach_hang->email }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Căn cước công dân</label>
          <input type="text" class="form-control" value="{{ $khach_hang->cccd }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Ngày làm CCCD</label>
          <input type="date" class="form-control" value="{{ $khach_hang->ngay_lam_cc }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Nơi làm CCCD</label>
          <input type="text" class="form-control" value="{{ $khach_hang->noi_lam_cc }}" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Loại khách hàng</label>
          <input type="text" class="form-control" value="{{ $khach_hang->ten_loai_khach }}" readonly>
        </div>
        @if(!empty($khach_hang->hoi_vien_id))
        <div class="col-md-6">
          <label class="form-label">Điểm hội viên</label>
          <input type="text" class="form-control" value="{{ $khach_hang->diem_hoi_vien }}" readonly>
        </div>
      </div>

      <div class="mt-5">
        <label class="form-label">Tiến trình thăng cấp hội viên</label>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="{{ $khach_hang->diem_hoi_vien }}" aria-valuemin="0" aria-valuemax="<?php switch (true) {
            case ($khach_hang->diem_hoi_vien<$muc[0]):
                echo $muc[0];
                break;
            case ($khach_hang->diem_hoi_vien<$muc[1]&&$khach_hang->diem_hoi_vien>=$muc[0]):
                echo $muc[1];
                break;
            case ($khach_hang->diem_hoi_vien<$muc[2]&&$khach_hang->diem_hoi_vien>=$muc[1]):
                echo $muc[2];
                break;
            default:
                echo $khach_hang->diem_hoi_vien;
                break;
        } ?>">
        <?php switch (true) {
          case ($khach_hang->diem_hoi_vien<$muc[0]):
              echo $khach_hang->diem_hoi_vien." / ".$muc[0]." điểm";
              break;
          case ($khach_hang->diem_hoi_vien<$muc[1]&&$khach_hang->diem_hoi_vien>=$muc[0]):
              echo $khach_hang->diem_hoi_vien." / ".$muc[1]." điểm";
              break;
          case ($khach_hang->diem_hoi_vien<$muc[2]&&$khach_hang->diem_hoi_vien>=$muc[1]):
              echo $khach_hang->diem_hoi_vien." / ".$muc[2]." điểm";
              break;
          default:
              echo $khach_hang->diem_hoi_vien;
              break;
      } ?>
            {{-- 720 / 1000 điểm --}}
          </div>
        </div>
        <small class="text-muted">
          <?php 
          switch (true) {
          case ($khach_hang->diem_hoi_vien>=0 && $khach_hang->diem_hoi_vien<$muc[0]):
              echo "Còn ".$muc[0]-$khach_hang->diem_hoi_vien." điểm để lên hội viên Bạc";
              break;
          case ($khach_hang->diem_hoi_vien<$muc[1]&&$khach_hang->diem_hoi_vien>=$muc[0]):
              echo "Còn ".$muc[1]-$khach_hang->diem_hoi_vien." điểm để lên hội viên Vàng";
              break;
          case ($khach_hang->diem_hoi_vien<$muc[2]&&$khach_hang->diem_hoi_vien>=$muc[1]):
              echo "Còn ".$muc[2]-$khach_hang->diem_hoi_vien." điểm để lên hội viên Kim Cương";
              break;
          default:
              echo "Khách hàng đã đạt cấp độ hội viên tối đa";
              break;
      } ?></small>
      </div>
      @endIf
      <div class="text-end mt-4">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalChinhSuaTaiKhoan">
          <i class="bi bi-pencil-square me-1"></i>Chỉnh sửa
        </button>
        <button class="btn btn-success ms-2" type="button" data-bs-toggle="modal" data-bs-target="#modalDangKyHoiVien" {{ empty($khach_hang->hoi_vien_id)?"":"hidden" }}>
          <i class="bi bi-person-plus me-1"></i>
          Đăng ký hội viên
        </button>
        <a href="{{route('khach_hang_lichchamsoc')}}" class="btn btn-outline-secondary ms-2"><i class="bi bi-arrow-left me-1"></i>Quay lại</a>
      </div>
    </form>
  </section>
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
            <div class="mb-3">
              <input type="text" class="form-control" name="id_khach_hang" value="{{ $khach_hang->khach_hang_id }}" hidden>
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
              <button type="submit" class="btn btn-primary">Đăng ký</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Chỉnh sửa tài khoản -->
<div class="modal fade" id="modalChinhSuaTaiKhoan" tabindex="-1" aria-labelledby="modalChinhSuaTaiKhoanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalChinhSuaTaiKhoanLabel">Chỉnh sửa thông tin tài khoản</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('cap_nhat_tai_khoan') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" class="form-control" name="id_khach_hang" value="{{ $khach_hang->khach_hang_id }}" hidden>
              <label class="form-label">Họ và tên</label>
              <input type="text" class="form-control" name="ho_ten" value="{{ $khach_hang->ho_ten }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ngày sinh</label>
              <input type="date" class="form-control" name="ngay_sinh" value="{{ $khach_hang->ngay_sinh }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Số điện thoại</label>
              <input type="text" class="form-control" name="sdt" value="{{ $khach_hang->sdt }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $khach_hang->email }}" required>
            </div>
            @if (!empty($khach_hang->hoi_vien_id))
            <div class="col-md-6">
              <label class="form-label">Căn cước công dân</label>
              <input type="text" class="form-control" name="cccd" value="{{ $khach_hang->cccd }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ngày làm CCCD</label>
              <input type="date" class="form-control" name="ngay_lam_cc" value="{{ $khach_hang->ngay_lam_cc }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nơi làm CCCD</label>
              <input type="text" class="form-control" name="noi_lam_cc" value="{{ $khach_hang->noi_lam_cc }}" required>
            </div>
          </div>
          @endif
          <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</html>
