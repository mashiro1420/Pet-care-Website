-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 11:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_thu_cung`
--
CREATE DATABASE IF NOT EXISTS `ql_thu_cung` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ql_thu_cung`;

-- --------------------------------------------------------

--
-- Table structure for table `dm_dichvu`
--

CREATE TABLE `dm_dichvu` (
  `id` int(11) NOT NULL,
  `ten_dich_vu` varchar(500) NOT NULL,
  `mo_ta` text NOT NULL,
  `hien` tinyint(1) NOT NULL DEFAULT 1,
  `loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_dichvu`
--

INSERT INTO `dm_dichvu` (`id`, `ten_dich_vu`, `mo_ta`, `hien`, `loai`) VALUES
(1, 'Trông giữ thú cưng (Nội trú) trên giờ', 'Chăm sóc thú cưng của bạn khi bạn vắng nhà (qua đêm hoặc dài ngày), đảm bảo ăn uống, vui chơi và an toàn.', 0, 2),
(2, 'Khám sức khỏe định kỳ', 'Kiểm tra sức khỏe tổng quát, tư vấn tiêm phòng, tẩy giun và các biện pháp chăm sóc sức khỏe dự phòng.', 1, 1),
(3, 'Dịch vụ dắt chó đi dạo	', 'Cung cấp các buổi đi dạo được cá nhân hóa để giúp chó giải tỏa năng lượng, vận động và tương tác xã hội.', 1, 1),
(4, 'Spa & massage cho thú cưng', 'Liệu pháp thư giãn chuyên sâu với massage, tắm thảo dược hoặc tinh dầu, giúp giảm căng thẳng và làm đẹp da lông.', 1, 1),
(5, 'Tắm cho thú cưng', 'Làm sạch cơ thể thú cưng bằng sữa tắm chuyên dụng phù hợp với loại da lông, giúp khử mùi, loại bỏ bụi bẩn và ký sinh trùng (nếu có). Bao gồm sấy khô và chải lông cơ bản', 1, 1),
(6, 'Cắt tỉa lông', 'Bao gồm cắt, tỉa, cạo (nếu cần) và tạo kiểu lông theo yêu cầu hoặc theo tiêu chuẩn giống loài. Giúp bộ lông gọn gàng, thoáng mát và dễ chăm sóc. Có thể bao gồm gỡ rối.', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dm_gia`
--

CREATE TABLE `dm_gia` (
  `id` int(11) NOT NULL,
  `id_dich_vu` int(11) DEFAULT NULL,
  `don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_gia`
--

INSERT INTO `dm_gia` (`id`, `id_dich_vu`, `don_gia`) VALUES
(1, 1, 800000),
(2, 2, 800000),
(3, 3, 150000),
(4, 4, 100000),
(5, 5, 100000),
(6, 6, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `dm_giongthucung`
--

CREATE TABLE `dm_giongthucung` (
  `id` int(11) NOT NULL,
  `ten_giong_thu_cung` varchar(500) NOT NULL,
  `id_loai_thu_cung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_giongthucung`
--

INSERT INTO `dm_giongthucung` (`id`, `ten_giong_thu_cung`, `id_loai_thu_cung`) VALUES
(1, 'Bulldog', 1),
(2, 'Golden', 1),
(3, 'Poodle', 1),
(4, 'Husky', 1),
(5, 'Mèo anh lông ngắn', 2),
(6, 'Sphynx', 2),
(7, 'Mèo Ba Tư', 2),
(8, 'Ragdoll', 2),
(9, 'Rùa tai đỏ', 3),
(10, 'Rùa bụng vàng', 3),
(11, 'Hamster Winter White', 4),
(12, 'Hamster Bear', 4),
(13, 'Chim Sơn ca', 6),
(14, 'Vẹt', 6),
(15, 'Thỏ tai cụp Hà Lan', 5),
(16, 'Thỏ sư tử', 5);

-- --------------------------------------------------------

--
-- Table structure for table `dm_khuyenmai`
--

CREATE TABLE `dm_khuyenmai` (
  `id` int(11) NOT NULL,
  `ten_khuyen_mai` varchar(500) NOT NULL,
  `noi_dung` text DEFAULT NULL,
  `phan_tram` int(11) DEFAULT NULL,
  `so_giam` int(11) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `tu_ngay` date DEFAULT NULL,
  `den_ngay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_khuyenmai`
--

INSERT INTO `dm_khuyenmai` (`id`, `ten_khuyen_mai`, `noi_dung`, `phan_tram`, `so_giam`, `trang_thai`, `tu_ngay`, `den_ngay`) VALUES
(1, 'Chào hè sảng khoái', 'Giảm giá dịch vụ tắm và cắt tỉa lông cho chó mèo trên 5kg', 15, 0, 1, '2025-05-01', '2025-07-31'),
(2, 'Thứ Tư vui vẻ', 'Giảm giá đặc biệt cho tất cả các dịch vụ spa vào mỗi Thứ Tư hàng tuần', 20, 0, 1, '2025-01-01', '2025-12-31'),
(3, 'a', 'a', 2, 0, 0, '2025-04-21', '2025-05-07'),
(4, 'b', 'a', 1, 0, 1, '2025-04-22', '2025-05-01'),
(5, 'c', 'a', 2, 0, 0, '2025-05-08', '2025-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loaikhachhang`
--

CREATE TABLE `dm_loaikhachhang` (
  `id` int(11) NOT NULL,
  `ten_loai_khach` varchar(255) NOT NULL,
  `hoi_vien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_loaikhachhang`
--

INSERT INTO `dm_loaikhachhang` (`id`, `ten_loai_khach`, `hoi_vien`) VALUES
(1, 'Khách hàng bình thường', 0),
(2, 'Khách hàng thân quen', 0),
(4, 'Hội viên mới', 1),
(5, 'Hội viên bạc', 1),
(6, 'Hội viên vàng', 1),
(7, 'Hội viên kim cương', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_loainoidung`
--

CREATE TABLE `dm_loainoidung` (
  `id` int(11) NOT NULL,
  `ten_loai_noi_dung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_loainoidung`
--

INSERT INTO `dm_loainoidung` (`id`, `ten_loai_noi_dung`) VALUES
(2, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loaithucung`
--

CREATE TABLE `dm_loaithucung` (
  `id` int(11) NOT NULL,
  `ten_loai_thu_cung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_loaithucung`
--

INSERT INTO `dm_loaithucung` (`id`, `ten_loai_thu_cung`) VALUES
(6, 'Chim'),
(1, 'Chó'),
(4, 'Chuột'),
(2, 'Mèo'),
(3, 'Rùa'),
(5, 'Thỏ');

-- --------------------------------------------------------

--
-- Table structure for table `dm_quyen`
--

CREATE TABLE `dm_quyen` (
  `id` int(11) NOT NULL,
  `ten_quyen` varchar(500) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_quyen`
--

INSERT INTO `dm_quyen` (`id`, `ten_quyen`, `mo_ta`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Khách hàng', NULL),
(3, 'Nhân viên', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dm_trangthai`
--

CREATE TABLE `dm_trangthai` (
  `id` int(11) NOT NULL,
  `ten_trang_thai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_trangthai`
--

INSERT INTO `dm_trangthai` (`id`, `ten_trang_thai`) VALUES
(1, 'Đã đặt lịch'),
(2, 'Đang xử lý'),
(3, 'Đã hoàn thành'),
(4, 'Đã thanh toán'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `dvt_chamsoc`
--

CREATE TABLE `dvt_chamsoc` (
  `id` int(11) NOT NULL,
  `id_cham_soc` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dvt_chamsoc`
--

INSERT INTO `dvt_chamsoc` (`id`, `id_cham_soc`, `id_dich_vu`) VALUES
(1, 5, 4),
(2, 5, 6),
(3, 7, 3),
(4, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dvt_trongcoi`
--

CREATE TABLE `dvt_trongcoi` (
  `id` int(11) NOT NULL,
  `id_trong_coi` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dvt_trongcoi`
--

INSERT INTO `dvt_trongcoi` (`id`, `id_trong_coi`, `id_dich_vu`) VALUES
(1, 2, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `km_chamsoc`
--

CREATE TABLE `km_chamsoc` (
  `id` int(11) NOT NULL,
  `id_thanh_toan` int(11) NOT NULL,
  `id_khuyen_mai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `km_trongcoi`
--

CREATE TABLE `km_trongcoi` (
  `id` int(11) NOT NULL,
  `id_thanh_toan` int(11) NOT NULL,
  `id_khuyen_mai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_baidang`
--

CREATE TABLE `ql_baidang` (
  `id` int(11) NOT NULL,
  `tieu_de` text NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `tom_tat` text NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` datetime NOT NULL DEFAULT current_timestamp(),
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `luot_thich` int(11) DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `id_loai_noi_dung` int(11) NOT NULL,
  `id_nhan_vien` varchar(500) NOT NULL,
  `hinh_anh` varchar(500) DEFAULT NULL,
  `link_video` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_baidang`
--

INSERT INTO `ql_baidang` (`id`, `tieu_de`, `thumbnail`, `tom_tat`, `noi_dung`, `ngay_dang`, `luot_xem`, `luot_thich`, `trang_thai`, `id_loai_noi_dung`, `id_nhan_vien`, `hinh_anh`, `link_video`) VALUES
(1, 'a', '53552b9626788e528391014ca32c9ed3.png', 'a', '<p>&aacute;dd</p>', '2025-05-05 08:06:10', 0, 0, 1, 2, 'admin', NULL, NULL),
(3, 'a', '124e96177931275f7bbcd1c069829976.png', 'a', '<p>&aacute;dd</p>', '2025-05-05 08:06:08', 0, 0, 1, 2, 'admin', NULL, NULL),
(4, 'bc', '87839f02c93844f877efe83308624b01.png', 'a', '<p>a</p>', '2025-05-07 17:25:56', 10, 4, 1, 2, 'admin', 'D:\\XAMPP\\tmp\\phpB659.tmp', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Z4l1vUd7NK8?si=eLB_bU6xIActuB5V\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(5, 'áds', '6905d3ec583fdcfe9804043dc0684866.jpg', 'ádsdasda', '<p>asdasd &aacute;das</p>', '2025-05-08 00:28:42', 2, 0, 1, 2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_chamsoc`
--

CREATE TABLE `ql_chamsoc` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `id_trang_thai` int(11) NOT NULL,
  `id_nhan_vien` varchar(500) DEFAULT NULL,
  `ngay` date NOT NULL,
  `thoi_gian` time NOT NULL,
  `ngay_dat_lich` datetime NOT NULL DEFAULT current_timestamp(),
  `id_giong` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `danh_gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_chamsoc`
--

INSERT INTO `ql_chamsoc` (`id`, `id_khach_hang`, `id_trang_thai`, `id_nhan_vien`, `ngay`, `thoi_gian`, `ngay_dat_lich`, `id_giong`, `ghi_chu`, `danh_gia`) VALUES
(5, 3, 4, 'admin', '2025-05-22', '08:41:00', '2025-05-05 08:39:59', 12, NULL, 3),
(6, 3, 5, NULL, '2025-05-22', '14:16:00', '2025-05-07 14:13:12', 11, NULL, 2),
(7, 3, 2, 'admin', '2025-05-22', '15:29:00', '2025-05-09 15:25:33', 12, 'a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_dichvuchamsoc`
--

CREATE TABLE `ql_dichvuchamsoc` (
  `id` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_dichvuchamsoc`
--

INSERT INTO `ql_dichvuchamsoc` (`id`, `id_dich_vu`) VALUES
(1, 4),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ql_dichvutrongcoi`
--

CREATE TABLE `ql_dichvutrongcoi` (
  `id` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_hoivien`
--

CREATE TABLE `ql_hoivien` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `diem_hoi_vien` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_hoivien`
--

INSERT INTO `ql_hoivien` (`id`, `id_khach_hang`, `diem_hoi_vien`) VALUES
(1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ql_khachhang`
--

CREATE TABLE `ql_khachhang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(500) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `cccd` varchar(255) DEFAULT NULL,
  `ngay_lam_cc` date DEFAULT NULL,
  `noi_lam_cc` varchar(500) DEFAULT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `id_loai_khach_hang` int(11) NOT NULL DEFAULT 1,
  `so_lan_cham_soc` int(11) NOT NULL DEFAULT 0,
  `so_lan_trong_coi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_khachhang`
--

INSERT INTO `ql_khachhang` (`id`, `ho_ten`, `ngay_sinh`, `sdt`, `email`, `cccd`, `ngay_lam_cc`, `noi_lam_cc`, `ngay_tao`, `id_loai_khach_hang`, `so_lan_cham_soc`, `so_lan_trong_coi`) VALUES
(3, 'Đỗ Đức Mạnh', '2025-04-03', '2314', 'mashiro1420@gmail.com', '232323', '2025-05-17', 'ab', '2025-04-03 01:25:45', 4, 0, 0),
(4, 'A', '2025-05-09', '01234', 'mark_do@usiglobal.com', NULL, NULL, NULL, '2025-05-09 11:07:29', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ql_taikhoan`
--

CREATE TABLE `ql_taikhoan` (
  `tai_khoan` varchar(255) NOT NULL,
  `mat_khau` varchar(500) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `ten_nhan_vien` varchar(255) DEFAULT NULL,
  `id_khach_hang` int(11) DEFAULT NULL,
  `id_quyen` int(11) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_taikhoan`
--

INSERT INTO `ql_taikhoan` (`tai_khoan`, `mat_khau`, `ten_nhan_vien`, `id_khach_hang`, `id_quyen`, `trang_thai`) VALUES
('admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', NULL, 1, 1),
('mark_do@usiglobal.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 2, 1),
('mashiro1420@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 3, 2, 1),
('nhanvien1', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn Văn A', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ql_thanhtoanchamsoc`
--

CREATE TABLE `ql_thanhtoanchamsoc` (
  `id` int(11) NOT NULL,
  `id_cham_soc` int(11) NOT NULL,
  `id_khuyen_mai` int(11) DEFAULT NULL,
  `tong_tien` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_thanhtoanchamsoc`
--

INSERT INTO `ql_thanhtoanchamsoc` (`id`, `id_cham_soc`, `id_khuyen_mai`, `tong_tien`, `ghi_chu`) VALUES
(1, 5, 2, 48661, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_thanhtoantrongcoi`
--

CREATE TABLE `ql_thanhtoantrongcoi` (
  `id` int(11) NOT NULL,
  `id_trong_coi` int(11) NOT NULL,
  `id_khuyen_mai` int(11) DEFAULT NULL,
  `tong_tien` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_thanhtoantrongcoi`
--

INSERT INTO `ql_thanhtoantrongcoi` (`id`, `id_trong_coi`, `id_khuyen_mai`, `tong_tien`, `ghi_chu`) VALUES
(1, 2, 2, 760000, NULL),
(2, 2, NULL, 950000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_trongcoi`
--

CREATE TABLE `ql_trongcoi` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `id_trang_thai` int(11) NOT NULL,
  `tu_ngay` date DEFAULT NULL,
  `den_ngay` date DEFAULT NULL,
  `gio_nhan` datetime DEFAULT NULL,
  `gio_tra` datetime DEFAULT NULL,
  `ngay_dat_lich` datetime NOT NULL DEFAULT current_timestamp(),
  `id_giong` int(11) DEFAULT NULL,
  `ghi_chu` text NOT NULL,
  `danh_gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_trongcoi`
--

INSERT INTO `ql_trongcoi` (`id`, `id_khach_hang`, `id_trang_thai`, `tu_ngay`, `den_ngay`, `gio_nhan`, `gio_tra`, `ngay_dat_lich`, `id_giong`, `ghi_chu`, `danh_gia`) VALUES
(1, 3, 5, '2025-05-07', '2025-05-23', NULL, NULL, '2025-05-07 13:52:04', 9, 'abb', 4),
(2, 3, 4, '2025-05-14', '2025-05-21', '2025-05-07 08:40:22', '2025-05-07 09:25:46', '2025-05-07 13:53:23', 11, 'a', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_dichvu`
--
ALTER TABLE `dm_dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_gia`
--
ALTER TABLE `dm_gia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_dich_vu` (`id_dich_vu`),
  ADD KEY `dm_gia_ibfk_1` (`id_dich_vu`);

--
-- Indexes for table `dm_giongthucung`
--
ALTER TABLE `dm_giongthucung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_thu_cung` (`id_loai_thu_cung`);

--
-- Indexes for table `dm_khuyenmai`
--
ALTER TABLE `dm_khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_loaikhachhang`
--
ALTER TABLE `dm_loaikhachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_loainoidung`
--
ALTER TABLE `dm_loainoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_loaithucung`
--
ALTER TABLE `dm_loaithucung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_loai_thu_cung` (`ten_loai_thu_cung`);

--
-- Indexes for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_quyen` (`ten_quyen`);

--
-- Indexes for table `dm_trangthai`
--
ALTER TABLE `dm_trangthai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvt_chamsoc`
--
ALTER TABLE `dvt_chamsoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cham_soc` (`id_cham_soc`,`id_dich_vu`),
  ADD KEY `dvt_chamsoc_ibfk_2` (`id_dich_vu`);

--
-- Indexes for table `dvt_trongcoi`
--
ALTER TABLE `dvt_trongcoi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_trong_coi` (`id_trong_coi`,`id_dich_vu`),
  ADD KEY `dvt_trongcoi_ibfk_1` (`id_dich_vu`);

--
-- Indexes for table `km_chamsoc`
--
ALTER TABLE `km_chamsoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khuyen_mai` (`id_khuyen_mai`),
  ADD KEY `km_chamsoc_ibfk_1` (`id_thanh_toan`);

--
-- Indexes for table `km_trongcoi`
--
ALTER TABLE `km_trongcoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khuyen_mai` (`id_khuyen_mai`),
  ADD KEY `km_trongcoi_ibfk_2` (`id_thanh_toan`);

--
-- Indexes for table `ql_baidang`
--
ALTER TABLE `ql_baidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_noi_dung` (`id_loai_noi_dung`),
  ADD KEY `ql_baidang_ibfk_2` (`id_nhan_vien`);

--
-- Indexes for table `ql_chamsoc`
--
ALTER TABLE `ql_chamsoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD KEY `id_trang_thai` (`id_trang_thai`),
  ADD KEY `id_giong` (`id_giong`);

--
-- Indexes for table `ql_dichvuchamsoc`
--
ALTER TABLE `ql_dichvuchamsoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dich_vu_them` (`id_dich_vu`) USING BTREE;

--
-- Indexes for table `ql_dichvutrongcoi`
--
ALTER TABLE `ql_dichvutrongcoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dich_vu_them` (`id_dich_vu`) USING BTREE;

--
-- Indexes for table `ql_hoivien`
--
ALTER TABLE `ql_hoivien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Indexes for table `ql_khachhang`
--
ALTER TABLE `ql_khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_loai_khach_hang` (`id_loai_khach_hang`);

--
-- Indexes for table `ql_taikhoan`
--
ALTER TABLE `ql_taikhoan`
  ADD PRIMARY KEY (`tai_khoan`),
  ADD UNIQUE KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `ql_thanhtoanchamsoc`
--
ALTER TABLE `ql_thanhtoanchamsoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cham_soc` (`id_cham_soc`),
  ADD KEY `id_khuyen_mai` (`id_khuyen_mai`);

--
-- Indexes for table `ql_thanhtoantrongcoi`
--
ALTER TABLE `ql_thanhtoantrongcoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ql_thanhtoantrongcoi_ibfk_1` (`id_trong_coi`),
  ADD KEY `id_khuyen_mai` (`id_khuyen_mai`);

--
-- Indexes for table `ql_trongcoi`
--
ALTER TABLE `ql_trongcoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_trang_thai` (`id_trang_thai`),
  ADD KEY `id_giong` (`id_giong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_dichvu`
--
ALTER TABLE `dm_dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dm_gia`
--
ALTER TABLE `dm_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dm_giongthucung`
--
ALTER TABLE `dm_giongthucung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dm_khuyenmai`
--
ALTER TABLE `dm_khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dm_loaikhachhang`
--
ALTER TABLE `dm_loaikhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dm_loainoidung`
--
ALTER TABLE `dm_loainoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dm_loaithucung`
--
ALTER TABLE `dm_loaithucung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dm_trangthai`
--
ALTER TABLE `dm_trangthai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dvt_chamsoc`
--
ALTER TABLE `dvt_chamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dvt_trongcoi`
--
ALTER TABLE `dvt_trongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `km_chamsoc`
--
ALTER TABLE `km_chamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `km_trongcoi`
--
ALTER TABLE `km_trongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_baidang`
--
ALTER TABLE `ql_baidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ql_chamsoc`
--
ALTER TABLE `ql_chamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ql_dichvuchamsoc`
--
ALTER TABLE `ql_dichvuchamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ql_dichvutrongcoi`
--
ALTER TABLE `ql_dichvutrongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_hoivien`
--
ALTER TABLE `ql_hoivien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ql_khachhang`
--
ALTER TABLE `ql_khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ql_thanhtoanchamsoc`
--
ALTER TABLE `ql_thanhtoanchamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ql_thanhtoantrongcoi`
--
ALTER TABLE `ql_thanhtoantrongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ql_trongcoi`
--
ALTER TABLE `ql_trongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dm_gia`
--
ALTER TABLE `dm_gia`
  ADD CONSTRAINT `dm_gia_ibfk_1` FOREIGN KEY (`id_dich_vu`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dm_giongthucung`
--
ALTER TABLE `dm_giongthucung`
  ADD CONSTRAINT `dm_giongthucung_ibfk_1` FOREIGN KEY (`id_loai_thu_cung`) REFERENCES `dm_loaithucung` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dvt_chamsoc`
--
ALTER TABLE `dvt_chamsoc`
  ADD CONSTRAINT `dvt_chamsoc_ibfk_1` FOREIGN KEY (`id_cham_soc`) REFERENCES `ql_chamsoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dvt_chamsoc_ibfk_2` FOREIGN KEY (`id_dich_vu`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dvt_trongcoi`
--
ALTER TABLE `dvt_trongcoi`
  ADD CONSTRAINT `dvt_trongcoi_ibfk_1` FOREIGN KEY (`id_dich_vu`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dvt_trongcoi_ibfk_2` FOREIGN KEY (`id_trong_coi`) REFERENCES `ql_trongcoi` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `km_chamsoc`
--
ALTER TABLE `km_chamsoc`
  ADD CONSTRAINT `km_chamsoc_ibfk_1` FOREIGN KEY (`id_thanh_toan`) REFERENCES `ql_thanhtoanchamsoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `km_chamsoc_ibfk_2` FOREIGN KEY (`id_khuyen_mai`) REFERENCES `dm_khuyenmai` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `km_trongcoi`
--
ALTER TABLE `km_trongcoi`
  ADD CONSTRAINT `km_trongcoi_ibfk_1` FOREIGN KEY (`id_khuyen_mai`) REFERENCES `dm_khuyenmai` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `km_trongcoi_ibfk_2` FOREIGN KEY (`id_thanh_toan`) REFERENCES `ql_thanhtoantrongcoi` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_baidang`
--
ALTER TABLE `ql_baidang`
  ADD CONSTRAINT `ql_baidang_ibfk_1` FOREIGN KEY (`id_loai_noi_dung`) REFERENCES `dm_loainoidung` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_baidang_ibfk_2` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_taikhoan` (`tai_khoan`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_chamsoc`
--
ALTER TABLE `ql_chamsoc`
  ADD CONSTRAINT `ql_chamsoc_ibfk_2` FOREIGN KEY (`id_khach_hang`) REFERENCES `ql_khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_chamsoc_ibfk_3` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_taikhoan` (`tai_khoan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_chamsoc_ibfk_4` FOREIGN KEY (`id_trang_thai`) REFERENCES `dm_trangthai` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_chamsoc_ibfk_6` FOREIGN KEY (`id_giong`) REFERENCES `dm_giongthucung` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_dichvuchamsoc`
--
ALTER TABLE `ql_dichvuchamsoc`
  ADD CONSTRAINT `ql_dichvuchamsoc_ibfk_2` FOREIGN KEY (`id_dich_vu`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_dichvutrongcoi`
--
ALTER TABLE `ql_dichvutrongcoi`
  ADD CONSTRAINT `ql_dichvutrongcoi_ibfk_1` FOREIGN KEY (`id_dich_vu`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_hoivien`
--
ALTER TABLE `ql_hoivien`
  ADD CONSTRAINT `ql_hoivien_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `ql_khachhang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_khachhang`
--
ALTER TABLE `ql_khachhang`
  ADD CONSTRAINT `ql_khachhang_ibfk_1` FOREIGN KEY (`id_loai_khach_hang`) REFERENCES `dm_loaikhachhang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_taikhoan`
--
ALTER TABLE `ql_taikhoan`
  ADD CONSTRAINT `ql_taikhoan_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `ql_khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_taikhoan_ibfk_2` FOREIGN KEY (`id_quyen`) REFERENCES `dm_quyen` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_thanhtoanchamsoc`
--
ALTER TABLE `ql_thanhtoanchamsoc`
  ADD CONSTRAINT `ql_thanhtoanchamsoc_ibfk_1` FOREIGN KEY (`id_cham_soc`) REFERENCES `ql_chamsoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_thanhtoanchamsoc_ibfk_2` FOREIGN KEY (`id_khuyen_mai`) REFERENCES `dm_khuyenmai` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_thanhtoantrongcoi`
--
ALTER TABLE `ql_thanhtoantrongcoi`
  ADD CONSTRAINT `ql_thanhtoantrongcoi_ibfk_1` FOREIGN KEY (`id_trong_coi`) REFERENCES `ql_trongcoi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_thanhtoantrongcoi_ibfk_2` FOREIGN KEY (`id_khuyen_mai`) REFERENCES `dm_khuyenmai` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_trongcoi`
--
ALTER TABLE `ql_trongcoi`
  ADD CONSTRAINT `ql_trongcoi_ibfk_2` FOREIGN KEY (`id_khach_hang`) REFERENCES `ql_khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_trongcoi_ibfk_3` FOREIGN KEY (`id_trang_thai`) REFERENCES `dm_trangthai` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_trongcoi_ibfk_4` FOREIGN KEY (`id_giong`) REFERENCES `dm_giongthucung` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
