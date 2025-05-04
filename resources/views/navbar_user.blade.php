<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <i class="bi bi-heart-fill me-2"></i>Pet<span>Care</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="{{route('khach_hang_lichchamsoc')}}">Lịch chăm sóc</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lịch trông coi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Xem bài đăng</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle user-icon"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Thông tin tài khoản</a></li>
            <li><a class="dropdown-item" href="{{ route('doi_mk',['id'=>session('tai_khoan')]) }}"><i class="bi bi-key me-2"></i>Đổi mật khẩu</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ url('xl_dang_xuat') }}"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>