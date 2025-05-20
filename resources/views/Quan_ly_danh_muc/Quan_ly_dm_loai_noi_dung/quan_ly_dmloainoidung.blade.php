<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh mục loại nội dung</title>
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
      <h3 class="mb-0">Danh mục loại nội dung</h3>
      <a class="btn btn-warning" href="{{ route('them_dmloainoidung') }}">
        <i class="bi bi-plus-circle me-1"></i>Thêm loại nội dung
      </a>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên loại nội dung</th>
                <th scope="col" class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($loai_noi_dungs as $loai_noi_dung)
                <tr>
                  <td>{{$loai_noi_dung->id}}</td>
                  <td>{{$loai_noi_dung->ten_loai_noi_dung}}</td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-primary btn-action me-1" href="{{ route('sua_dmloainoidung',['id'=>$loai_noi_dung->id]) }}">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a class="btn btn-sm btn-danger btn-action me-1" href="{{ route('xoa_dmloainoidung',['id'=>$loai_noi_dung->id]) }}">
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
              @if ($loai_noi_dungs->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $loai_noi_dungs->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($loai_noi_dungs->getUrlRange(1, $loai_noi_dungs->lastPage()) as $page => $url)
                @if ($page == $loai_noi_dungs->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($loai_noi_dungs->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $loai_noi_dungs->nextPageUrl() }}" aria-label="Next">
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