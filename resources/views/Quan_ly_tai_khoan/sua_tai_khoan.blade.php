<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/quan_ly_tai_khoan.css') }}">

</head>

<body>
  @include('navbar')
  <div class="container py-4">
    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Sửa tài khoản</h3>
      <a href="{{ route('ql_tk') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>

    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_sua_tk') }}" method="POST">
          @csrf
          <div class="row g-3">
            <!-- Tài khoản -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="tai_khoan" class="form-label required-field">Tài khoản</label>
                <input type="text" class="form-control" name="tai_khoan" value="{{ $tai_khoan->tai_khoan }}" readonly>
              </div>
            </div>
            @if (!empty($tai_khoan->ten_nhan_vien))
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ten_nhan_vien" class="form-label">Tên nhân viên</label>
                <input type="text" class="form-control" name="ten_nhan_vien" value="{{ $tai_khoan->ten_nhan_vien }}" placeholder="Nhập tên nhân viên" required>
              </div>
            </div>
            

            <div class="col-md-6">
              <div class="mb-3">
                <label for="role" class="form-label">Quyền</label>
                <select class="form-select" name="id_quyen" required>
                  @foreach ($quyens as $quyen)
                  <option value="{{ $quyen->id }}" {{ $tai_khoan->id_quyen==$quyen->id?"selected":"" }}>{{ $quyen->ten_quyen }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @endif

            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label required-field">Trạng thái</label>
                <select class="form-select" name="trang_thai" required>
                  <option value="1" {{ $tai_khoan->trang_thai==1?"selected":"" }}>Hoạt động</option>
                  <option value="0" {{ $tai_khoan->trang_thai==0?"selected":"" }}>Khóa</option>
                </select>
              </div>
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 mt-4">
              <button type="reset" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
              </button>
              <button type="submit" class="btn btn-warning">
                <i class="bi bi-plus-circle me-1"></i>Sửa tài khoản
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

      if (mat_khauInput.type === 'mat_khau') {
        mat_khauInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        mat_khauInput.type = 'mat_khau';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    });
  </script>
</body>

</html>