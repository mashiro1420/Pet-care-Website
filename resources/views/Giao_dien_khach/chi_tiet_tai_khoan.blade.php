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
          <input type="text" class="form-control" value="Nguyễn Văn A" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Quyền</label>
          <input type="text" class="form-control" value="Khách hàng" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Ngày sinh</label>
          <input type="date" class="form-control" value="2000-01-01" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" value="0901234567" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="nguyenvana@example.com" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Căn cước công dân</label>
          <input type="text" class="form-control" value="012345678901" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Ngày làm CCCD</label>
          <input type="date" class="form-control" value="2019-05-10" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Nơi làm CCCD</label>
          <input type="text" class="form-control" value="Công an TP. HCM" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Điểm hội viên</label>
          <input type="text" class="form-control" value="720" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">Loại hội viên</label>
          <input type="text" class="form-control" value="Bạc" readonly>
        </div>
      </div>

      <div class="mt-5">
        <label class="form-label">Tiến trình thăng cấp hội viên</label>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 72%" aria-valuenow="720" aria-valuemin="0" aria-valuemax="1000">
            720 / 1000 điểm
          </div>
        </div>
        <small class="text-muted">Còn 280 điểm để lên hội viên Vàng</small>
      </div>
      <div class="text-end mt-4">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalChinhSuaTaiKhoan">
          <i class="bi bi-pencil-square me-1"></i>Chỉnh sửa
        </button>
        <button class="btn btn-success ms-2" type="button" data-bs-toggle="modal" data-bs-target="#modalDangKyHoiVien">
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
          <form action="{{ url('xl_dky_hv_tructiep') }}" method="POST">
            @csrf
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
              <label class="form-label">Họ và tên</label>
              <input type="text" class="form-control" name="ho_ten" value="Nguyễn Văn A" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ngày sinh</label>
              <input type="date" class="form-control" name="ngay_sinh" value="2000-01-01" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Số điện thoại</label>
              <input type="text" class="form-control" name="so_dien_thoai" value="0901234567" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="nguyenvana@example.com" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Căn cước công dân</label>
              <input type="text" class="form-control" name="cccd" value="012345678901" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ngày làm CCCD</label>
              <input type="date" class="form-control" name="ngay_lam_cccd" value="2019-05-10" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nơi làm CCCD</label>
              <input type="text" class="form-control" name="noi_lam_cccd" value="Công an TP. HCM" required>
            </div>
          </div>
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
