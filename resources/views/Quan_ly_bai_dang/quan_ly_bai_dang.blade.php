<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý bài đăng</title>
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
      <h3 class="mb-0">Quản lý bài đăng</h3>
      <a class="btn btn-warning" href="{{ route('them_baidang') }}">
        <i class="bi bi-plus-circle me-1"></i>Thêm bài đăng
      </a>
    </div>
    <div class="card search-card mb-4">
      <div class="card-body">
        <form action="{{ route('ql_tk') }}" method="get">
          @csrf
          <div class="row g-3">
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" name="search_tieude" value="{{ !empty($search_tieude)?$search_tieude:"" }}" placeholder="Nhập tiêu đề">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_trangthai" class="form-label">Trạng thái</label>
                <select class="form-select" name="search_trangthai">
                  <option value="">Tất cả</option>
                  <option value="active" {{ !empty($search_trangthai)&&$search_trangthai=='active'?"selected":"" }}>Mở</option>
                  <option value="inactive" {{ !empty($search_trangthai)&&$search_trangthai=='inactive'?"selected":"" }}>Khóa</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_ngaydang" class="form-label">Ngày đăng</label><br>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ</span>
                  <input type="date" class="form-control" name="" value="">
                  <span class="mx-3">đến</span>
                  <input type="date" class="form-control" name="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_ngaydang" class="form-label">Số lượt xem</label><br>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ</span>
                  <input type="number" class="form-control" name="" value="">
                  <span class="mx-3">đến</span>
                  <input type="number" class="form-control" name="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_ngaydang" class="form-label">Số lượt thích</label><br>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ</span>
                  <input type="number" class="form-control" name="" value="">
                  <span class="mx-3">đến</span>
                  <input type="number" class="form-control" name="" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_trangthai" class="form-label">Loại nội dung</label>
                <select class="form-select" name="search_trangthai">
                  <option value="">Tất cả</option>
                  @foreach ($loai_noi_dungs as $loai_noi_dung)
                    <option value="{{$loai_noi_dung->id}}" {{ !empty($search_loai_noi_dung)&&$search_loai_noi_dung==$loai_noi_dung->id?"selected":"" }}>{{$loai_noi_dung->ten_loai_noi_dung}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_nguoidang" class="form-label">Người đăng</label>
                <input type="text" class="form-control" name="search_nguoidang" value="{{ !empty($search_nguoidang)?$search_nguoidang:"" }}" placeholder="Nhập người đăng">
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
                <th scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Tóm tắt</th>
                <th scope="col">Ngày đăng</th>
                <th scope="col">Lượt xem</th>
                <th scope="col">Lượt thích</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Loại nội dung</th>
                <th scope="col">Người đăng</th>
                <th scope="col">Link video</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bai_dangs as $bai_dang)
                <tr>
                  <td>{{$bai_dang->id}}</td>
                  <td>{{$bai_dang->tieu_de}}</td>
                  <td>{{$bai_dang->tom_tat}}</td>
                  <td>{{$bai_dang->ngay_dang}}</td>
                  <td>{{$bai_dang->luot_xem}}</td>
                  <td>{{$bai_dang->luot_thich}}</td>
                  <td>{{$bai_dang->trang_thai}}</td>
                  <td>{{$bai_dang->loai_noi_dung}}</td>
                  <td>{{$bai_dang->nguoi_dang}}</td>
                  <td>{{$bai_dang->nguoi_dang}}</td>
                  <td><span class="status-{{$bai_dang->trang_thai==1?"active":"inactive"}}">{{$bai_dang->trang_thai==1?"Hoạt động":"Bị khóa"}}</span></td>
                  <td>
                    <a class="btn btn-sm btn-primary btn-action me-1" href="{{ route('sua_tk',['id'=>$bai_dang->bai_dang]) }}">
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
              @if ($bai_dangs->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $bai_dangs->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($bai_dangs->getUrlRange(1, $bai_dangs->lastPage()) as $page => $url)
                @if ($page == $bai_dangs->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($bai_dangs->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $bai_dangs->nextPageUrl() }}" aria-label="Next">
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