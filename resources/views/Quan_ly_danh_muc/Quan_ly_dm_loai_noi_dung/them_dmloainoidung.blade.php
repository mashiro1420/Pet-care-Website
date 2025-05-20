<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm loại nội dung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
  @include('navbar')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Thêm loại nội dung</h3>
      <a href="{{ route('ql_dmloainoidung') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>

    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_them_dmloainoidung') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ten_loai_noi_dung" class="form-label required-field">Tên loại nội dung</label>
                <input type="text" class="form-control" name="ten_loai_noi_dung" placeholder="Nhập tên loại nội dung" required>
              </div>
            </div> 
          </div>
            <div class="col-12 d-flex justify-content-end gap-2 mt-4">
              <button type="reset" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
              </button>
              <button type="submit" class="btn btn-warning">
                <i class="bi bi-plus-circle me-1"></i>Thêm loại nội dung
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
@include('error_notification')
</html>