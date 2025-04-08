<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand" href="#">Hệ thống quản lý</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="navbar-nav">
            <a class="nav-link px-3" href="{{ route('ql_tk') }}">Quản lý tài khoản</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">Quản lý bài đăng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="{{ route('ql_kh') }}">Quản lý khách hàng</a>
          </li>
        </ul>
      </div>
      <a class="btn btn-outline-dark ms-3" href="{{ route('doi_mk',['id'=>session('tai_khoan')]) }}">
        <i class="bi bi-gear-fill"> Đổi mật khẩu</i>
      </a>
      <a class="btn btn-outline-dark ms-3" href="{{ url('xl_dang_xuat') }}">
        <i class="bi bi-door-closed-fill"> Đăng xuất</i>
      </a>
    </div>
  </nav>