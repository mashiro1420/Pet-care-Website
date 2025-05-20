<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật khuyến mãi</title>
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
      <h3 class="mb-0">Cập nhật khuyến mãi</h3>
      <a href="{{url('ql_dmkhuyenmai')}}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>

    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_sua_dmkhuyenmai') }}" method="POST">
          @csrf
          <div class="row g-3">
          <input type="text" class="form-control" name="id" value="{{$khuyen_mai->id}}" hidden>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ten_khuyen_mai" class="form-label required-field">Tên khuyến mãi</label>
                <input type="text" class="form-control" name="ten_khuyen_mai" value="{{$khuyen_mai->ten_khuyen_mai}}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label">Trạng thái</label>
                <select class="form-select" name="trang_thai" required>              
                  <option value="1" {{ $khuyen_mai->trang_thai==1?"selected":"" }}>Đang hoạt động</option>
                  <option value="0"  {{ $khuyen_mai->trang_thai==0?"selected":"" }}>Không hoạt động</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="phan_tram" class="form-label">Phần trăm khuyến mãi</label>
                <input type="int" class="form-control" name="phan_tram" value="{{$khuyen_mai->phan_tram}}" >
              </div>
            </div> 
            <div class="col-md-6">
              <div class="mb-3">
                <label for="so_giam" class="form-label">Số giảm</label>
                <input type="int" class="form-control" name="so_giam" value="{{$khuyen_mai->so_giam}}">
              </div>
            </div>
            
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="tu_ngay" class="form-label">Từ ngày</label>
                <input type="date" class="form-control" name="tu_ngay" value="{{$khuyen_mai->tu_ngay}}"> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="den_ngay" class="form-label">Đến ngày</label>
                <input type="date" class="form-control" name="den_ngay" value="{{$khuyen_mai->den_ngay}}"> 
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="noi_dung" class="form-label">Nội dung</label>
                <div class="input-group">
                  <textarea name="noi_dung" class="form-control" id="noi_dung" cols="30" rows="10">{{$khuyen_mai->noi_dung}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-end gap-2 mt-4">
            <button type="reset" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
            </button>
            <button type="submit" class="btn btn-warning">
              <i class="bi bi-plus-circle me-1"></i>Cập nhật khuyến mãi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
@include('error_notification')
</html>