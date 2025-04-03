<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/quan_ly_tai_khoan.css') }}">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand" href="#">Hệ thống quản lý</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="navbar-nav">
            <a class="nav-link active px-3" href="{{ route('ql_tk') }}">Quản lý tài khoản</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">Quản lý bài đăng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="{{ route('ql_kh') }}">Quản lý khách hàng</a>
          </li>
        </ul>
      </div>
    </div>
    <div>
      <a class="btn btn-outline-dark ms-3" href="{{ route('doi_mk',['id'=>session('tai_khoan')]) }}">
        <i class="bi bi-gear-fill">Đổi mật khẩu</i>
      </a>
    </div>
    <div>
      <a class="btn btn-outline-dark ms-3" href="{{ url('xl_dang_xuat') }}">
        <i class="bi bi-door-closed-fill">Đăng xuất</i>
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container py-4">
    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Quản lý tài khoản</h3>
    </div>

    <!-- Search Section -->
    <div class="card search-card mb-4">
      <div class="card-body">
        <form action="{{ route('ql_kh') }}" method="get">
          @csrf
          <div class="row g-3">
            <div class="col-md-4">
              <div class="form-group">
                <label for="search_name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="search_name" value="{{ !empty($search_name)?$search_name:"" }}" placeholder="Nhập họ tên">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="search_email" class="form-label">Email</label>
                <input type="text" class="form-control" name="search_email" value="{{ !empty($search_email)?$search_email:"" }}" placeholder="Nhập email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="search_phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="search_phone" value="{{ !empty($search_phone)?$search_phone:"" }}" placeholder="Nhập số điện thoại">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="search_id" class="form-label">Căn cước công dân</label>
                <input type="text" class="form-control" name="search_id" value="{{ !empty($search_id)?$search_id:"" }}" placeholder="Nhập số điện thoại">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_customer" class="form-label">Loại khách hàng</label>
                <select class="form-select" name="search_customer">
                  <option value="">Tất cả</option>
                  @foreach ($loai_khachs as $loai_khach)
                    <option value="{{ $loai_khach->id }}" {{ !empty($search_customer)&&$search_customer==$loai_khach->id?"selected":"" }}>{{ $loai_khach->ten_loai_khach }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-12 text-end">
              <button type="submit" class="btn btn-warning">
                <i class="bi bi-search me-1"></i>Tìm kiếm
              </button>
              <button type="reset" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Table Section -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Căn cước công dân</th>
                <th scope="col">Loại khách hàng</th>
                <th scope="col">Ngày tạo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($khach_hangs as $khach_hang)
                <?php $count++ ?>
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$khach_hang->ho_ten}}</td>
                  <td>{{$khach_hang->ngay_sinh}}</td>
                  <td>{{$khach_hang->sdt}}</td>
                  <td>{{$khach_hang->email }}</td>
                  <td>{{$khach_hang->cccd}}</td>
                  <td>{{$khach_hang->LoaiKhach->ten_loai_khach }}</td>
                  <td>{{$khach_hang->ngay_tao}}</td>
                  {{-- <td>
                    <a class="btn btn-sm btn-primary btn-action me-1" href="{{ route('sua_tk',['id'=>$khach_hang->khach_hang]) }}">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </td> --}}
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
          <nav aria-label="Page navigation">
            <ul class="pagination mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>