<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quên mật khẩu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/dang_nhap.css') }}">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded">
      <h2 class="text-center mb-4">Nhập mã xác nhận</h2>
      <form action="{{ url('xl_xac_nhan') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="code" class="form-label required-field">Mã xác nhận</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã xác nhận" required>
        </div>
        <button type="submit" class="btn btn-warning w-100 mt-3">Kiểm tra</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>