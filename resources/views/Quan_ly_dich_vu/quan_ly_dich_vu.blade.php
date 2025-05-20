<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta id="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý dịch vụ</title>
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
      <h3 class="mb-0">Quản lý dịch vụ</h3>
      <div class="add_container">
        <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#modalThemDichVuChamsoc">
          <i class="bi bi-plus-circle me-1"></i>Thêm dịch vụ chăm sóc
        </a>

        <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#modalThemDichVuTrongCoi">
          <i class="bi bi-plus-circle me-1"></i>Thêm dịch vụ trông coi
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Danh sách dịch vụ chăm sóc</h5>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên dịch vụ</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dich_vu_cham_socs as $dich_vu_cham_soc)
                <tr>
                  <td>{{$dich_vu_cham_soc->id}}</td>
                  <td>{{$dich_vu_cham_soc->ten_dich_vu}}</td>
                  <td>
                    <a class="btn btn-sm btn-danger btn-action me-1" href="">
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
              @if ($dich_vu_cham_socs->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $dich_vu_cham_socs->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($dich_vu_cham_socs->getUrlRange(1, $dich_vu_cham_socs->lastPage()) as $page => $url)
                @if ($page == $dich_vu_cham_socs->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($dich_vu_cham_socs->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $dich_vu_cham_socs->nextPageUrl() }}" aria-label="Next">
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
      <div class="card-body mt-3">
        <h5 class="card-title mb-4">Danh sách dịch vụ trông coi</h5>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên dịch vụ</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dich_vu_trong_cois as $dich_vu_trong_coi)
                <tr>
                  <td>{{$dich_vu_trong_coi->id}}</td>
                  <td>{{$dich_vu_trong_coi->ten_dich_vu}}</td>
                  <td>
                    <a class="btn btn-sm btn-danger btn-action me-1" href="">
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
              @if ($dich_vu_trong_cois->onFirstPage())
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $dich_vu_trong_cois->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              @endif
              @foreach ($dich_vu_trong_cois->getUrlRange(1, $dich_vu_trong_cois->lastPage()) as $page => $url)
                @if ($page == $dich_vu_trong_cois->currentPage())
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ $page }}</a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
              @if ($dich_vu_trong_cois->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $dich_vu_trong_cois->nextPageUrl() }}" aria-label="Next">
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
  <!-- Modal Add DichVuChamSoc -->
  <div class="modal fade" id="modalThemDichVuChamsoc" tabindex="-1" aria-labelledby="modalThemDichVuChamsocLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalThemDichVuChamsocLabel">Thêm dịch vụ chăm sóc</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('xl_them_chamsoc') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="danh_muc_dich_vu" class="form-label">Chọn danh mục dịch vụ</label>
              <select class="form-select" id="danh_muc_dich_vu" name="id_dich_vu_cs" required>
                <option value="" disabled selected>-- Chọn danh mục --</option>
                @foreach ($dm_dich_vu_css as $dm_dich_vu)
                  <option value="{{ $dm_dich_vu->id }}">{{ $dm_dich_vu->ten_dich_vu }}</option>
                @endforeach
              </select>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Thêm</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Add DichVuTrongCoi -->
  <div class="modal fade" id="modalThemDichVuTrongCoi" tabindex="-1" aria-labelledby="modalThemDichVuTrongCoiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalThemDichVuTrongCoiLabel">Thêm dịch vụ trông coi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('xl_them_trongcoi') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="danh_muc_dich_vu" class="form-label">Chọn danh mục dịch vụ</label>
              <select class="form-select" id="danh_muc_dich_vu" name="id_dich_vu_tc" required>
                <option value="" disabled selected>-- Chọn danh mục --</option>
                @foreach ($dm_dich_vu_tcs as $dm_dich_vu)
                  <option value="{{ $dm_dich_vu->id }}">{{ $dm_dich_vu->ten_dich_vu }}</option>
                @endforeach
              </select>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Thêm</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
@include('error_notification')
</html>