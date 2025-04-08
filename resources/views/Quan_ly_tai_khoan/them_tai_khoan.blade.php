<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/quan_ly_tai_khoan.css') }}">

</head>

<body>
  @include('navbar')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Thêm tài khoản</h3>
      <a href="#" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>

    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_them_tk') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="tai_khoan" class="form-label required-field">Tài khoản</label>
                <input type="text" class="form-control" name="tai_khoan" placeholder="Nhập tài khoản" required>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="mat_khau" class="form-label required-field">Mật khẩu</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="mat_khau" id="mat_khau" placeholder="Nhập mật khẩu" required>
                  <button class="btn btn-outline-secondary" type="button" id="togglemat_khau">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="mat_khau_lai" class="form-label required-field">Nhập lại mật khẩu</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="mat_khau_lai" id="mat_khau_lai" placeholder="Nhập lại mật khẩu" required>
                  <button class="btn btn-outline-secondary" type="button" id="togglemat_khau_lai">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="ten_nhan_vien" class="form-label">Tên nhân viên</label>
                <input type="text" class="form-control" name="ten_nhan_vien" placeholder="Nhập tên nhân viên" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="id_quyen" class="form-label">Quyền</label>
                <select class="form-select" name="id_quyen" required>
                  @foreach ($quyens as $quyen)
                  <option value="{{ $quyen->id }}">{{ $quyen->ten_quyen }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 mt-4">
              <button type="reset" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
              </button>
              <button type="submit" class="btn btn-warning">
                <i class="bi bi-plus-circle me-1"></i>Thêm tài khoản
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('togglemat_khau').addEventListener('click', function () {
      const mat_khauInput = document.getElementById('mat_khau');
      const icon = this.querySelector('i');

      if (mat_khauInput.type === 'password') {
        mat_khauInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        mat_khauInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
      });
      document.getElementById('togglemat_khau_lai').addEventListener('click', function () {
      const mat_khauInput = document.getElementById('mat_khau_lai');
      const icon = this.querySelector('i');

      if (mat_khauInput.type === 'password') {
        mat_khauInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        mat_khauInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
      });
  </script>
</body>

</html>