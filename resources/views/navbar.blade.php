  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Hệ thống quản lý</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="navbar-nav">
              <a class="nav-link px-3" href="{{ route('ql_tk') }}">Quản lý tài khoản</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Quản lý danh mục
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('ql_dmdichvu')}}">Danh mục dịch vụ</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmgia')}}">Danh mục giá</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmloaithucung')}}">Danh mục loại thú cưng</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmgiongthucung')}}">Danh mục giống thú cưng</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmkhuyenmai')}}">Danh mục khuyến mãi</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmloaikhachhang')}}">Danh mục loại khách hàng</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmloainoidung')}}">Danh mục loại nội dung đăng tải</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmquyen')}}">Danh mục quyền</a></li>
                <li><a class="dropdown-item" href="{{route('ql_dmtrangthai')}}">Danh mục trạng thái</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{route('ql_baidang')}}">Quản lý bài đăng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{route('ql_dichvu')}}">Quản lý dịch vụ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{ route('ql_kh') }}">Quản lý khách hàng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{ route('ql_chamsoc') }}">Quản lý chăm sóc</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{ route('ql_trongcoi') }}">Quản lý trông coi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="{{ route('bao_cao') }}">Thống kê</a>
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