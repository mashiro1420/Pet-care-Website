<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Đặt lịch chăm sóc</title>
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
      <h2 class="form-title">Đặt lịch chăm sóc thú cưng</h2>
      <form action="{{url('xl_dat_lich_cs')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="ngay_cham_soc" class="form-label">Ngày chăm sóc</label>
          <input type="date" class="form-control" id="ngay_cham_soc" name="ngay" required>
        </div>
        <div class="mb-3">
          <label for="gio_cham_soc" class="form-label">Giờ chăm sóc</label>
          <input type="time" class="form-control" id="gio_cham_soc" name="thoi_gian" required>
        </div>
        <div class="mb-3">
          <label for="giong_thu_cung" class="form-label">Giống thú cưng</label>
          <select class="form-select" id="giong_thu_cung" name="giong" required>
            <option value="" disabled selected>-- Chọn danh mục --</option>
            @foreach ($giong_thu_cungs as $giong_thu_cung)
              <option value="{{ $giong_thu_cung->id }}">{{ $giong_thu_cung->ten_giong_thu_cung }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="ghi_chu" class="form-label">Ghi chú</label>
          <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3" placeholder="Ghi chú thêm (nếu có)..."></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-calendar-check me-2"></i>Đặt lịch
          </button>
          <a href="{{ route('khach_hang_lichchamsoc') }}" class="btn btn-secondary ms-2">
            Quay lại
          </a>
        </div>
      </form>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const ngay_cham_soc = document.getElementById('ngay_cham_soc');
      const gio_cham_soc = document.getElementById('gio_cham_soc');

      // Thiết lập min cho input ngày là hôm nay
      const hien_tai = new Date();
      const yyyy = hien_tai.getFullYear();
      const mm = String(hien_tai.getMonth() + 1).padStart(2, '0');
      const dd = String(hien_tai.getDate()).padStart(2, '0');
      const hien_tai_str = `${yyyy}-${mm}-${dd}`;
      ngay_cham_soc.setAttribute('min', hien_tai_str);

      // Hàm kiểm tra giờ nếu ngày là hôm nay
      function ktra_thoi_gian() {
        const ngay_da_chon = new Date(ngay_cham_soc.value);
        const now = new Date();

        // Nếu ngày trùng với hôm nay
        if (ngay_da_chon.toDateString() === now.toDateString()) {
          const selectedTime = gio_cham_soc.value;
          if (!selectedTime) return;

          const [hour, minute] = selectedTime.split(':');
          const ngay_da_chon_time = new Date(ngay_da_chon);
          ngay_da_chon_time.setHours(parseInt(hour), parseInt(minute), 0, 0);

          if (ngay_da_chon_time < now) {
            alert('Giờ chăm sóc không hợp lệ.');
            gio_cham_soc.value = '';
            gio_cham_soc.focus();
          }
        }
      }

      // Gọi kiểm tra khi thay đổi giờ hoặc ngày
      gio_cham_soc.addEventListener('change', ktra_thoi_gian);
      ngay_cham_soc.addEventListener('change', () => {
        // Nếu giờ đã chọn sẵn, kiểm tra lại khi thay đổi ngày
        if (gio_cham_soc.value) ktra_thoi_gian();
      });
    });
  </script>


</body>
</html>
