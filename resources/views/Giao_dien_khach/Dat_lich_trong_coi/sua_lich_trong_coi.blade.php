<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Cập nhật lịch trông coi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" href="imgs/paw-solid.svg" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
  @include('navbar_user')
  <section class="main-content">
    <div class="container" id="form-section">
      <h2 class="form-title">Cập nhật lịch trông coi thú cưng</h2>
      <form action="{{url('xl_sua_lich_tc')}}" method="POST">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" id="id" name="id" value="{{$trong_coi->id}}" hidden>
          <label for="ngay" class="form-label">Ngày chăm sóc</label><br>
          <span>Từ</span>
          <input type="date" class="form-control" id="tu_ngay" name="tu_ngay" value="{{$trong_coi->tu_ngay}}" required>
          <span>đến</span>
          <input type="date" class="form-control" id="den_ngay" name="den_ngay" value="{{$trong_coi->den_ngay}}" required>
        </div>
        <div class="mb-3">
          <label for="giong" class="form-label">Giống thú cưng</label>
          <select class="form-select" id="giong" name="giong" required>
            @foreach ($giong_thu_cungs as $giong_thu_cung)
              <option value="{{ $giong_thu_cung->id }}" {{ $trong_coi->id_giong == $giong_thu_cung->id ? 'selected' : '' }}>{{ $giong_thu_cung->ten_giong_thu_cung }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="ghi_chu" class="form-label">Ghi chú</label>
          <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">{{$trong_coi->ghi_chu}}</textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-calendar-check me-2"></i>Cập nhật lịch
          </button>
          <a href="{{ route('xl_huy_tc',['id' => $trong_coi->id]) }}" class="btn btn-secondary btn-danger ms-2"  {{$trong_coi->id_trang_thai!=1?'hidden':''}}>
            <i class="bi bi-x-circle me-2"></i>Hủy lịch trông coi
          </a>
          <a href="{{ route('khach_hang_lichtrongcoi') }}" class="btn btn-secondary ms-2">
            Quay lại
          </a>
        </div>
      </form>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
