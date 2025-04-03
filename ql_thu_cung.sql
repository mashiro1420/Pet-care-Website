-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 09:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

-- --------------------------------------------------------

--
-- Table structure for table `dm_dichvu`
--

CREATE TABLE `dm_dichvu` (
  `id` int(11) NOT NULL,
  `ten_dich_vu` varchar(500) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_gia`
--

CREATE TABLE `dm_gia` (
  `id` int(11) NOT NULL,
  `id_dich_vu` int(11) DEFAULT NULL,
  `don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_giongthucung`
--

CREATE TABLE `dm_giongthucung` (
  `id` int(11) NOT NULL,
  `ten_giong_thu_cung` varchar(500) NOT NULL,
  `id_loai_thu_cung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `dm_loaikhachhang`
--

CREATE TABLE `dm_loaikhachhang` (
  `id` int(11) NOT NULL,
  `ten_loai_khach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_loaikhachhang`
--

INSERT INTO `dm_loaikhachhang` (`id`, `ten_loai_khach`) VALUES
(1, 'Khách hàng bình thường'),
(2, 'Khách hàng thân quen');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loainoidung`
--

CREATE TABLE `dm_loainoidung` (
  `id` int(11) NOT NULL,
  `ten_loai_noi_dung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_loaithucung`
--

CREATE TABLE `dm_loaithucung` (
  `id` int(11) NOT NULL,
  `ten_loai_thu_cung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `dvt_chamsoc`
--

CREATE TABLE `dvt_chamsoc` (
  `id` int(11) NOT NULL,
  `id_cham_soc` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dvt_trongcoi`
--

CREATE TABLE `dvt_trongcoi` (
  `id` int(11) NOT NULL,
  `id_trong_coi` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL
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
  `ngay_dang` date NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `luot_thich` int(11) DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `id_loai_noi_dung` int(11) NOT NULL,
  `id_nhan_vien` varchar(500) NOT NULL,
  `hinh_anh` varchar(500) DEFAULT NULL,
  `link_video` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ghi_chu` text NOT NULL,
  `danh_gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_dichvuchamsoc`
--

CREATE TABLE `ql_dichvuchamsoc` (
  `id` int(11) NOT NULL,
  `id_dich_vu_them` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_dichvutrongcoi`
--

CREATE TABLE `ql_dichvutrongcoi` (
  `id` int(11) NOT NULL,
  `id_dich_vu_them` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_hoivien`
--

CREATE TABLE `ql_hoivien` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `diem_hoi_vien` int(11) NOT NULL DEFAULT 0,
  `id_loai_khach_hang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Đỗ Đức Mạnh', '2025-04-03', '2314', 'mashiro1420@gmail.com', '23232', '2025-04-03', 'a', '2025-04-03 01:25:45', 1, 0, 0);

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
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `tong_tien` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_thanhtoantrongcoi`
--

CREATE TABLE `ql_thanhtoantrongcoi` (
  `id` int(11) NOT NULL,
  `id_trong_coi` int(11) NOT NULL,
  `id_khuyen_mai` int(11) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `tong_tien` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD UNIQUE KEY `id_cham_soc` (`id_cham_soc`,`id_dich_vu`);

--
-- Indexes for table `dvt_trongcoi`
--
ALTER TABLE `dvt_trongcoi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_trong_coi` (`id_trong_coi`,`id_dich_vu`);

--
-- Indexes for table `ql_baidang`
--
ALTER TABLE `ql_baidang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD KEY `id_loai_noi_dung` (`id_loai_noi_dung`);

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
  ADD KEY `id_dich_vu_them` (`id_dich_vu_them`);

--
-- Indexes for table `ql_dichvutrongcoi`
--
ALTER TABLE `ql_dichvutrongcoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dich_vu_them` (`id_dich_vu_them`);

--
-- Indexes for table `ql_hoivien`
--
ALTER TABLE `ql_hoivien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_loai_khach_hang` (`id_loai_khach_hang`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_giongthucung`
--
ALTER TABLE `dm_giongthucung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_khuyenmai`
--
ALTER TABLE `dm_khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_loaikhachhang`
--
ALTER TABLE `dm_loaikhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dm_loainoidung`
--
ALTER TABLE `dm_loainoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_loaithucung`
--
ALTER TABLE `dm_loaithucung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_trangthai`
--
ALTER TABLE `dm_trangthai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dvt_chamsoc`
--
ALTER TABLE `dvt_chamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dvt_trongcoi`
--
ALTER TABLE `dvt_trongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_baidang`
--
ALTER TABLE `ql_baidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_chamsoc`
--
ALTER TABLE `ql_chamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_dichvuchamsoc`
--
ALTER TABLE `ql_dichvuchamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_dichvutrongcoi`
--
ALTER TABLE `ql_dichvutrongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_hoivien`
--
ALTER TABLE `ql_hoivien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_khachhang`
--
ALTER TABLE `ql_khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ql_thanhtoanchamsoc`
--
ALTER TABLE `ql_thanhtoanchamsoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_thanhtoantrongcoi`
--
ALTER TABLE `ql_thanhtoantrongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_trongcoi`
--
ALTER TABLE `ql_trongcoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `ql_dichvuchamsoc_ibfk_2` FOREIGN KEY (`id_dich_vu_them`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_dichvutrongcoi`
--
ALTER TABLE `ql_dichvutrongcoi`
  ADD CONSTRAINT `ql_dichvutrongcoi_ibfk_1` FOREIGN KEY (`id_dich_vu_them`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_hoivien`
--
ALTER TABLE `ql_hoivien`
  ADD CONSTRAINT `ql_hoivien_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `ql_khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_hoivien_ibfk_2` FOREIGN KEY (`id_loai_khach_hang`) REFERENCES `dm_loaikhachhang` (`id`) ON UPDATE CASCADE;

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
