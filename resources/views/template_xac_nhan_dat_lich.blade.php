<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đặt lịch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: auto;
        }
        h2 {
            color: #2c3e50;
        }
        .section {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
        }
        .value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        @if ($view_id === 'dat_lich_tc_thanh_cong')
            <h2>Đặt lịch trông coi thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Từ ngày:</span>
                <span class="value">{{ $thong_tin['tu_ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Đến ngày:</span>
                <span class="value">{{ $thong_tin['den_ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Dịch vụ thêm:</span>
                <span class="value">{{ $thong_tin['dich_vu_them'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'sua_lich_tc_thanh_cong')
            <h2>Sửa lịch trông coi thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Từ ngày:</span>
                <span class="value">{{ $thong_tin['tu_ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Đến ngày:</span>
                <span class="value">{{ $thong_tin['den_ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Dịch vụ thêm:</span>
                <span class="value">{{ $thong_tin['dich_vu_them'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'huy_lich_tc_thanh_cong')
            <h2>Hủy lịch trông coi thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
        @elseif ($view_id === 'thanh_toan_tc_thanh_cong')
            <h2>Thanh toán trông coi thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Từ ngày:</span>
                <span class="value">{{ $thong_tin['tu_ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Đến ngày:</span>
                <span class="value">{{ $thong_tin['den_ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Dịch vụ thêm:</span>
                <span class="value">{{ $thong_tin['dich_vu_them'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Giá:</span>
                <span class="value">{{ $thong_tin['gia'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'dat_lich_cs_thanh_cong')
            <h2>Đặt lịch chăm sóc thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Ngày:</span>
                <span class="value">{{ $thong_tin['ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Thời gian:</span>
                <span class="value">{{ $thong_tin['thoi_gian'] }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'sua_lich_cs_thanh_cong')
            <h2>Sửa lịch chăm sóc thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Ngày:</span>
                <span class="value">{{ $thong_tin['ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Thời gian:</span>
                <span class="value">{{ $thong_tin['thoi_gian'] }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'hoan_thanh_cs')
            <h2>Hoàn thành lịch chăm sóc</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Ngày:</span>
                <span class="value">{{ $thong_tin['ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Thời gian:</span>
                <span class="value">{{ $thong_tin['thoi_gian'] }}</span>
            </div>
            <div class="section">
                <span class="label">Trạng thái:</span>
                <span class="value">{{ $thong_tin['trang_thai'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'thanh_toan_cs_thanh_cong')
            <h2>Thanh toán chăm sóc thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
            <div class="section">
                <span class="label">Ngày:</span>
                <span class="value">{{ $thong_tin['ngay'] }}</span>
            </div>
            <div class="section">
                <span class="label">Thời gian:</span>
                <span class="value">{{ $thong_tin['thoi_gian'] }}</span>
            </div>
            <div class="section">
                <span class="label">Trạng thái:</span>
                <span class="value">{{ $thong_tin['trang_thai'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Giá:</span>
                <span class="value">{{ $thong_tin['gia'] ?? 'Không có' }}</span>
            </div>
            <div class="section">
                <span class="label">Ghi chú:</span>
                <span class="value">{{ $thong_tin['ghi_chu'] ?? 'Không có' }}</span>
            </div>
        @elseif ($view_id === 'huy_cs_thanh_cong')
            <h2>Hủy lịch chăm sóc thành công</h2>
            <div class="section">
                <span class="label">Họ tên:</span>
                <span class="value">{{ $thong_tin['ho_ten'] }}</span>
            </div>
            <div class="section">
                <span class="label">Email:</span>
                <span class="value">{{ $thong_tin['email'] }}</span>
            </div>
            <div class="section">
                <span class="label">Số điện thoại:</span>
                <span class="value">{{ $thong_tin['sdt'] }}</span>
            </div>
        @else
            <h2>Thông tin không xác định</h2>
        @endif
    </div>
</body>
</html>
