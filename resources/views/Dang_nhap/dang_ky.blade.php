<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dang_nhap.css') }}">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded">
      <h2 class="text-center mb-4">Đăng ký</h2>
      <form action="{{ url('xl_dang_ky') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="mb-3">
          <label for="mat_khau" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu"
            required>
        </div>
        <div class="mb-3">
          <label for="mat_khau_lai" class="form-label">Nhập lại mật khẩu</label>
          <input type="password" class="form-control" id="mat_khau_lai" name="mat_khau_lai" placeholder="Nhập lại mật khẩu"
            required>
        </div>
        <div class="mb-3">
          <label for="ho_ten" class="form-label">Họ tên</label>
          <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên"
            required>
        </div>
        <div class="mb-3">
          <label for="ngay_sinh" class="form-label">Ngày sinh</label>
          <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh"
            required>
        </div>
        <div class="mb-3">
          <label for="sdt" class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại"
            required>
        </div>
        <div class="mb-3">
          <label for="cccd" class="form-label">Căn cước công dân</label>
          <input type="text" class="form-control" id="cccd" name="cccd" placeholder="Nhập căn cước công dân"
            required>
        </div>
        <div class="mb-3">
          <label for="ngay_lam_cc" class="form-label">Ngày làm căn cước</label>
          <input type="date" class="form-control" id="ngay_lam_cc" name="ngay_lam_cc"
            required>
        </div>
        <div class="mb-3">
          <label for="noi_lam_cc" class="form-label">Nơi làm căn cước</label>
          <input type="text" class="form-control" id="noi_lam_cc" name="noi_lam_cc" placeholder="Nhập nơi làm căn cước"
            required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <a href="{{ route('dang_nhap') }}" class="text-decoration-none">Đăng nhập</a>
        </div>
        <button type="submit" class="btn btn-warning w-100 mt-3">Đăng ký</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>