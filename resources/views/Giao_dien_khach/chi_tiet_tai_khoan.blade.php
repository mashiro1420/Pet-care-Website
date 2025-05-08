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
        <a href="{{route('khach_hang_lichchamsoc')}}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Quay lại</a>
      </div>
    </form>
  </section>
</body>
</html>
