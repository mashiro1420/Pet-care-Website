<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh mục khuyến mãi</title>
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
      <h3 class="mb-0">Danh mục khuyến mãi</h3>
      <a class="btn btn-warning" href="{{ route('them_dmkhuyenmai') }}">
        <i class="bi bi-plus-circle me-1"></i>Thêm khuyến mãi
      </a>
    </div>
    <div class="card search-card mb-4">
      <div class="card-body">
        <form action="{{ route('ql_dmkhuyenmai') }}" method="get">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_ten" class="form-label">Tên khuyến mãi</label>
                <input type="text" class="form-control" name="search_ten" value="{{ !empty($search_ten)?$search_ten:"" }}" placeholder="Nhập tên khuyến mãi">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="search_phan_tram" class="form-label">Phần trăm khuyến mãi</label><br>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="me-3">Từ</span>
                  <input type="number" class="form-control" name="search_phan_tram_tu" value="{{ !empty($search_phan_tram_tu)?$search_phan_tram_tu:"" }}">%
                  <span class="mx-3">~</span>
                  <input type="number" class="form-control" name="search_phan_tram_den" value="{{ !empty($search_phan_tram_den)?$search_phan_tram_den:"" }}">%
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="search_trangthai" class="form-label">Trạng thái</label>
                  <select class="form-select" name="search_trangthai">
                    <option value="">Tất cả</option>
                    <option value="active" {{ !empty($search_trangthai)&&$search_trangthai=='active'?"selected":"" }}>Hoạt động</option>
                    <option value="inactive" {{ !empty($search_trangthai)&&$search_trangthai=='inactive'?"selected":"" }}>Không hoạt động</option>
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
                <th scope="col">Tên khuyến mãi</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Phần trăm</th>
                <th scope="col">Số giảm</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Từ ngày</th>
                <th scope="col">Đến ngày</th>
                <th scope="col" class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($khuyen_mais as $khuyen_mai)
                <tr>
                  <td>{{$khuyen_mai->id}}</td>
                  <td>{{$khuyen_mai->ten_khuyen_mai}}</td>
                  <td>{{$khuyen_mai->noi_dung}}</td>
                  <td>{{$khuyen_mai->phan_tram}}%</td>
                  <td>{{$khuyen_mai->so_giam}}VNĐ</td>
                  <td><span class="status-{{$khuyen_mai->trang_thai==1?"active":"inactive"}}">{{$khuyen_mai ->trang_thai==1?"Hoạt động":"Bị khóa"}}</span></td>
                  <td>{{$khuyen_mai->tu_ngay}}</td>
                  <td>{{$khuyen_mai->den_ngay}}</td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-primary btn-action me-1" href="{{ route('sua_dmkhuyenmai',['id'=>$khuyen_mai->id]) }}">
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
              @if ($khuyen_mais->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $khuyen_mais->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($khuyen_mais->getUrlRange(1, $khuyen_mais->lastPage()) as $page => $url)
                @if ($page == $khuyen_mais->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($khuyen_mais->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $khuyen_mais->nextPageUrl() }}" aria-label="Next">
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