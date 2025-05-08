<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý khách hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
  @include('navbar')
  <div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Quản lý khách hàng</h3>
    </div>
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
            <div class="col-md-4">
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
            <div class="col-md-4">
              <div class="form-group">
                <label for="search_member" class="form-label">Hội viên</label><br>
                <input type="checkbox" style="width: 20px; height: 20px; margin-left: 10px"  name="search_member" {{ !empty($search_member)?"checked":"" }} >
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
                <th scope="col">Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              @if(empty($search_member))
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
                  <td>
                    <a href="{{ route('chi_tiet_kh', ['id' => $khach_hang->id_khach_hang]) }}" class="btn btn-info btn-sm">
                      <i class="bi bi-eye-fill"></i> Chi tiết
                    </a>
                  </td>
                </tr>
                @endforeach
                @else
                @foreach ($hoi_viens as $hoi_vien)
                <?php $count++ ?>
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$hoi_vien->KhachHang->ho_ten}}</td>
                  <td>{{$hoi_vien->KhachHang->ngay_sinh}}</td>
                  <td>{{$hoi_vien->KhachHang->sdt}}</td>
                  <td>{{$hoi_vien->KhachHang->email }}</td>
                  <td>{{$hoi_vien->KhachHang->cccd}}</td>
                  <td>{{$hoi_vien->LoaiKhach->ten_loai_khach }}</td>
                  <td>{{$hoi_vien->KhachHang->ngay_tao}}</td>
                </tr>
                @endforeach
                @endIf
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
          <nav aria-label="Page navigation">
            <ul class="pagination mb-0">
              @if ($khach_hangs->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $khach_hangs->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($khach_hangs->getUrlRange(1, $khach_hangs->lastPage()) as $page => $url)
                @if ($page == $khach_hangs->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($khach_hangs->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $khach_hangs->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              @endif
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