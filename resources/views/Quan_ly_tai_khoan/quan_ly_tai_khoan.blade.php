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
  </nav>

  <!-- Main Content -->
  <div class="container py-4">
    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Quản lý tài khoản</h3>
      <a class="btn btn-warning" href="{{ route('them_tk') }}">
        <i class="bi bi-plus-circle me-1"></i>Thêm tài khoản
      </a>
    </div>

    <!-- Search Section -->
    <div class="card search-card mb-4">
      <div class="card-body">
        <form action="{{ route('ql_tk') }}" method="get">
          @csrf
          <div class="row g-3">
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_account" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" name="search_account" value="{{ !empty($search_account)?$search_account:"" }}" placeholder="Nhập tài khoản">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="search_name" value="{{ !empty($search_name)?$search_name:"" }}" placeholder="Nhập họ tên">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="search_customer" class="form-label">Vai trò</label>
                <select class="form-select" name="search_customer">
                  <option value="">Tất cả</option>
                  <option value="1" {{ !empty($search_customer)&&$search_customer==1?"selected":"" }}>Nhân viên</option>
                  <option value="2" {{ !empty($search_customer)&&$search_customer==2?"selected":"" }}>Khách hàng</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="search_role" class="form-label">Quyền</label>
                <select class="form-select" name="search_role">
                  <option value="">Tất cả</option>
                  @foreach ($quyens as $quyen)
                    <option value="{{ $quyen->id }}" {{ !empty($search_role)&&$search_role==$quyen->id?"selected":"" }}>{{ $quyen->ten_quyen }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="search_status" class="form-label">Trạng thái</label>
                <select class="form-select" name="search_status">
                  <option value="">Tất cả</option>
                  <option value="active" {{ !empty($search_status)&&$search_status=='active'?"selected":"" }}>Hoạt động</option>
                  <option value="inactive" {{ !empty($search_status)&&$search_status=='inactive'?"selected":"" }}>Không hoạt động</option>
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
                <th scope="col">Tài khoản</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Quyền</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tai_khoans as $tai_khoan)
                <?php $count++ ?>
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$tai_khoan->tai_khoan}}</td>
                  @if (!empty($tai_khoan->id_khach_hang))
                    <td>{{$tai_khoan->KhachHang->ho_ten}}</td>
                    <td><span class="status-active">Khách hàng</span></td>
                  @else
                    <td>{{$tai_khoan->ten_nhan_vien}}</td>
                    <td><span class="status-inactive">Nhân viên</span></td>
                  @endif
                  <td>{{$tai_khoan->Quyen->ten_quyen}}</td>
                  <td><span class="status-{{$tai_khoan->trang_thai==1?"active":"inactive"}}">{{$tai_khoan->trang_thai==1?"Hoạt động":"Bị khóa"}}</span></td>
                  <td>
                    <a class="btn btn-sm btn-primary btn-action me-1" href="{{ route('sua_tk',['id'=>$tai_khoan->tai_khoan]) }}">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </td>
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