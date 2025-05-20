<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh mục giống thú cưng</title>
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
      <h3 class="mb-0">Danh mục giống thú cưng</h3>
      <a class="btn btn-warning" href="{{ route('them_dmgiongthucung') }}">
        <i class="bi bi-plus-circle me-1"></i>Thêm giống thú cưng
      </a>
    </div>
        <div class="card search-card mb-4">
      <div class="card-body">
        <form action="{{ route('ql_dmgiongthucung') }}" method="get">
          @csrf
          <div class="row g-3">
            <div class="col-md-3">
              <div class="form-group">
                <label for="search_giong" class="form-label">Tên giống thú cưng</label>
                <input type="text" class="form-control" name="search_giong" value="{{ !empty($search_tengiongthucung)?$search_tengiongthucung:"" }}" placeholder="Nhập tên giống thú cưng">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="search_loai" class="form-label">Loại thú cưng</label>
                <select class="form-select" name="search_loai">
                  <option value="">Tất cả</option>
                  @foreach ($loai_thu_cungs as $loai_thu_cung)
                    <option value="{{ $loai_thu_cung->id }}" {{ !empty($search_loai)&&$search_loai==$loai_thu_cung->id?"selected":"" }}>{{ $loai_thu_cung->ten_loai_thu_cung }}</option>
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
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên giống thú cưng</th>
                <th scope="col">Loại thú cưng</th>
                <th scope="col" class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($giong_thu_cungs as $giong_thu_cung)
                <tr>
                  <td>{{$giong_thu_cung->id}}</td>
                  <td>{{$giong_thu_cung->ten_giong_thu_cung}}</td>
                  <td>{{$giong_thu_cung->ten_loai_thu_cung}}</td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-primary btn-action me-1" href="{{ route('sua_dmgiongthucung',['id'=>$giong_thu_cung->id]) }}">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a class="btn btn-sm btn-danger btn-action me-1" href="{{ route('xoa_dmgiongthucung',['id'=>$giong_thu_cung->id]) }}">
                      <i class="bi bi-trash"></i>
                    </a>
                  </td>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
          <nav aria-label="Page navigation">
            <ul class="pagination mb-0">
              @if ($giong_thu_cungs->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $giong_thu_cungs->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($giong_thu_cungs->getUrlRange(1, $giong_thu_cungs->lastPage()) as $page => $url)
                @if ($page == $giong_thu_cungs->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($giong_thu_cungs->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $giong_thu_cungs->nextPageUrl() }}" aria-label="Next">
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
@include('error_notification')
</html>