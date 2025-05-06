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
      <form action="{{url('xl_dat_lich_cs')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="tu_ngay" class="form-label">Ngày trông coi</label>
          <span>Từ</span>
          <input type="date" class="form-control" id="tu_ngay" name="tu_ngay" required>
          <span>đến</span>
          <input type="date" class="form-control" id="den_ngay" name="den_ngay" required>
        </div>
        <div class="mb-3">
          <label for="gio_nhan" class="form-label">Giờ nhận</label>
          <input type="time" class="form-control" id="gio_nhan" name="gio_nhan" required>
        </div>
        <div class="mb-3">
          <label for="gio_nhan" class="form-label">Giờ trả</label>
          <input type="time" class="form-control" id="gio_tra" name="gio_tra" required>
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
      const gio_nhan = document.getElementById('gio_nhan');
      const gio_tra = document.getElementById('gio_tra');

      function getTodayString() {
        const now = new Date();
        const yyyy = now.getFullYear();
        const mm = String(now.getMonth() + 1).padStart(2, '0');
        const dd = String(now.getDate()).padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
      }

      // Thiết lập ngày tối thiểu là hôm nay
      const today_str = getTodayString();
      tu_ngay.setAttribute('min', today_str);
      den_ngay.setAttribute('min', today_str);

      function isFormValid() {
        const now = new Date();
        const tu_ngay_value = new Date(tu_ngay.value);
        const den_ngay_value = new Date(den_ngay.value);

        if (!tu_ngay.value || !den_ngay.value) {
          alert('Vui lòng chọn đầy đủ ngày bắt đầu và ngày kết thúc.');
          return false;
        }

        if (tu_ngay_value > den_ngay_value) {
          alert('Từ ngày không được lớn hơn đến ngày.');
          return false;
        }

        const today = new Date();
        today.setHours(0, 0, 0, 0);
        if (tu_ngay_value < today || den_ngay_value < today) {
          alert('Ngày trông coi không được là ngày trong quá khứ.');
          return false;
        }

        if (!gio_nhan.value || !gio_tra.value) {
          alert('Vui lòng nhập đầy đủ giờ nhận và giờ trả.');
          return false;
        }

        // Nếu từ ngày là hôm nay → giờ nhận phải sau thời điểm hiện tại
        if (tu_ngay_value.toDateString() === now.toDateString()) {
          const [nhan_hour, nhan_minute] = gio_nhan.value.split(':');
          const nhanTime = new Date(tu_ngay_value);
          nhanTime.setHours(parseInt(nhan_hour), parseInt(nhan_minute), 0, 0);

          if (nhanTime <= now) {
            alert('Giờ nhận không hợp lệ vì nhỏ hơn thời gian hiện tại.');
            return false;
          }
        }

        // Nếu từ ngày và đến ngày là cùng một ngày → giờ trả phải sau giờ nhận
        if (tu_ngay.value === den_ngay.value) {
          const [nhan_hour, nhan_minute] = gio_nhan.value.split(':');
          const [tra_hour, tra_minute] = gio_tra.value.split(':');

          const nhan = new Date();
          nhan.setHours(parseInt(nhan_hour), parseInt(nhan_minute), 0, 0);
          const tra = new Date();
          tra.setHours(parseInt(tra_hour), parseInt(tra_minute), 0, 0);

          if (tra <= nhan) {
            alert('Giờ trả phải lớn hơn giờ nhận nếu trong cùng một ngày.');
            return false;
          }
        }

        return true;
      }

      // Ngăn submit nếu dữ liệu không hợp lệ
      form.addEventListener('submit', function (e) {
        if (!isFormValid()) {
          e.preventDefault(); // Ngăn gửi form
        }
      });

      // Kiểm tra mỗi khi người dùng thay đổi các trường
      [tu_ngay, den_ngay, gio_nhan, gio_tra].forEach(el => {
        el.addEventListener('change', isFormValid);
      });
    });
  </script>
</body>
</html>
