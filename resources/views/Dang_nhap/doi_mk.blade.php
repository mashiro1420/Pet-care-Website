<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đổi mật khẩu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/dang_nhap.css') }}">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded">
      <h2 class="text-center mb-4">Đổi mật khẩu</h2>
      <form action="{{ url('xl_doi_mk') }}" method="POST">
        @csrf
        @if (empty(session('email')))
        <div class="mb-3">
          <label for="tai_khoan" class="form-label">Tài khoản</label>
          <input type="text" class="form-control" id="tai_khoan" name="tai_khoan" value="{{ $tai_khoan->tai_khoan }}" placeholder="Nhập tài khoản" readonly>
        </div>
        <div class="mb-3">
          <label for="mat_khau_cu" class="form-label">Mật khẩu cũ</label>
          <input type="password" class="form-control" id="mat_khau_cu" name="mat_khau_cu" placeholder="Nhập mật khẩu cũ"
            required>
        </div>
        @else
        <input type="password" class="form-control"  name="quen" value="1" hidden>
        @endif
        <div class="mb-3">
          <label for="mat_khau_moi" class="form-label">Mật khẩu mới</label>
          <input type="password" class="form-control" id="mat_khau_moi" name="mat_khau_moi" placeholder="Nhập mật khẩu mới"
            required>
        </div>
        <div class="mb-3">
          <label for="mat_khau_lai" class="form-label">Nhập lại mật khẩu mới</label>
          <input type="password" class="form-control" id="mat_khau_lai" name="mat_khau_lai" placeholder="Nhập lại mật khẩu mới"
            required>
        </div>
        <button type="submit" class="btn btn-warning w-100 mt-3">Đổi mật khẩu</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>