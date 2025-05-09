<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetCare - Đặt lịch trông coi</title>
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
      <h2 class="form-title">Đặt lịch trông coi thú cưng</h2>
      <form action="{{url('xl_dat_lich_tc')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="tu_ngay" class="form-label">Ngày trông coi</label><br>
          <span>Từ</span>
          <input type="date" class="form-control" id="tu_ngay" name="tu_ngay" required>
          <span>đến</span>
          <input type="date" class="form-control" id="den_ngay" name="den_ngay" required>
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
      const form = document.querySelector('form');
      const tu_ngay = document.getElementById('tu_ngay');
      const den_ngay = document.getElementById('den_ngay');
      function getTodayString() {
        const now = new Date();
        const yyyy = now.getFullYear();
        const mm = String(now.getMonth() + 1).padStart(2, '0');
        const dd = String(now.getDate()).padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
      }
      function formatDate(date) {
        const yyyy = date.getFullYear();
        const mm = String(date.getMonth() + 1).padStart(2, '0');
        const dd = String(date.getDate()).padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
      }
      // Thiết lập ngày tối thiểu là hôm nay
      const today_str = getTodayString();
      tu_ngay.setAttribute('min', today_str);
      den_ngay.setAttribute('min', today_str);
      // Cập nhật min của đến ngày mỗi khi chọn từ ngày
      tu_ngay.addEventListener('change', function () {
        if (tu_ngay.value) {
          const tu_ngay_date = new Date(tu_ngay.value);
          tu_ngay_date.setDate(tu_ngay_date.getDate() + 1); // Ngày hôm sau
          const new_min = formatDate(tu_ngay_date);
          den_ngay.setAttribute('min', new_min);
          // Nếu đến ngày hiện tại không hợp lệ thì xóa giá trị
          if (new Date(den_ngay.value) < tu_ngay_date) {
            den_ngay.value = '';
          }
        }
      });
      // Cảnh báo nếu người dùng chọn đến ngày trước khi chọn từ ngày
      den_ngay.addEventListener('mousedown', function (e) {
        if (!tu_ngay.value) {
          alert('Vui lòng chọn ngày bắt đầu trước.');
          e.preventDefault();
        }
      });
      function isFormValid() {
        const tu_ngay_value = new Date(tu_ngay.value);
        const den_ngay_value = new Date(den_ngay.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        if (!tu_ngay.value || !den_ngay.value) {
          alert('Vui lòng chọn đầy đủ ngày bắt đầu và ngày kết thúc.');
          return false;
        }
        if (tu_ngay_value > den_ngay_value) {
          alert('Từ ngày không được lớn hơn đến ngày.');
          return false;
        }
        if (tu_ngay_value < today || den_ngay_value < today) {
          alert('Ngày trông coi không được là ngày trong quá khứ.');
          return false;
        }
        if (den_ngay_value <= tu_ngay_value) {
          alert('Đến ngày phải sau ngày bắt đầu ít nhất 1 ngày.');
          return false;
        }
        return true;
      }
      form.addEventListener('submit', function (e) {
        if (!isFormValid()) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>
</html>
