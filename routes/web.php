<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\DanhMucController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Giao_dien_khach.quang_ba');
});
// DangNhap Routes
Route::get('dang_nhap',[DangNhapController::class, 'viewDangNhap'])->name('dang_nhap');
Route::get('dang_ky',[DangNhapController::class, 'viewDangKy'])->name('dang_ky');
Route::get('doi_mk',[DangNhapController::class, 'viewDoiMK'])->name('doi_mk');
Route::get('quen_mk',[DangNhapController::class, 'viewQuenMK'])->name('quen_mk');
Route::get('xac_nhan',[DangNhapController::class, 'viewXacNhan'])->name('xac_nhan');
Route::post('xl_dang_nhap',[DangNhapController::class, 'login']);
Route::get('xl_dang_xuat',[DangNhapController::class, 'logout']);
Route::post('xl_dang_ky',[DangNhapController::class, 'signup']);
Route::post('xl_doi_mk',[DangNhapController::class, 'doi_mk']);
Route::post('xl_gui_mail',[DangNhapController::class, 'xlGuiMail']);
Route::post('xl_xac_nhan',[DangNhapController::class, 'xlXacNhan']);
//TaiKhoan Routes
Route::get('ql_tk',[TaiKhoanController::class, 'viewQuanLy'])->name('ql_tk');
Route::get('them_tk',[TaiKhoanController::class, 'viewThem'])->name('them_tk');
Route::post('xl_them_tk',[TaiKhoanController::class, 'xlThem']);
Route::get('sua_tk',[TaiKhoanController::class, 'viewSua'])->name('sua_tk');
Route::post('xl_sua_tk',[TaiKhoanController::class, 'xlSua']);
//DMDichVu Routes
Route::get('ql_dmdichvu', [DanhMucController::class, 'viewDMDichVu'])->name('ql_dmdichvu');
Route::get('them_dmdichvu', [DanhMucController::class, 'viewThemDMDichVu'])->name('them_dmdichvu');
Route::post('xl_them_dmdichvu', [DanhMucController::class, 'xlThemDMDichVu']);
Route::get('sua_dmdichvu', [DanhMucController::class, 'viewSuaDMDichVu'])->name('sua_dmdichvu');
Route::post('xl_sua_dmdichvu', [DanhMucController::class, 'xlSuaDMDichVu']);
Route::get('xoa_dmdichvu', [DanhMucController::class, 'xlXoaDMDichVu'])->name('xoa_dmdichvu');
//DMGia Routes
Route::get('ql_dmgia', [DanhMucController::class, 'viewDMGia'])->name('ql_dmgia');
//DMGiongThuCung Routes
Route::get('ql_dmgiongthucung', [DanhMucController::class, 'viewDMGiongThuCung'])->name('ql_dmgiongthucung');
Route::get('them_dmgiongthucung', [DanhMucController::class, 'viewThemDMGiongThuCung'])->name('them_dmgiongthucung');
Route::post('xl_them_dmgiongthucung', [DanhMucController::class, 'xlThemDMGiongThuCung']);
Route::get('sua_dmgiongthucung', [DanhMucController::class, 'viewSuaDMGiongThuCung'])->name('sua_dmgiongthucung');
Route::post('xl_sua_dmgiongthucung', [DanhMucController::class, 'xlSuaDMGiongThuCung']);
Route::get('xoa_dmgiongthucung', [DanhMucController::class, 'xlXoaDMGiongThuCung'])->name('xoa_dmgiongthucung');
//DMKhuyenMai Routes
Route::get('ql_dmkhuyenmai', [DanhMucController::class, 'viewDMKhuyenMai'])->name('ql_dmkhuyenmai');
Route::get('them_dmkhuyenmai', [DanhMucController::class, 'viewThemDMKhuyenMai'])->name('them_dmkhuyenmai');
Route::post('xl_them_dmkhuyenmai', [DanhMucController::class, 'xlThemDMKhuyenMai']);
Route::get('sua_dmkhuyenmai', [DanhMucController::class, 'viewSuaDMKhuyenMai'])->name('sua_dmkhuyenmai');
Route::post('xl_sua_dmkhuyenmai', [DanhMucController::class, 'xlSuaDMKhuyenMai']);
//DMLoaiKhachHang Routes
Route::get('ql_dmloaikhachhang', [DanhMucController::class, 'viewDMLoaiKhachHang'])->name('ql_dmloaikhachhang');
Route::get('them_dmloaikhachhang', [DanhMucController::class, 'viewThemDMLoaiKhachHang'])->name('them_dmloaikhachhang');
Route::post('xl_them_dmloaikhachhang', [DanhMucController::class, 'xlThemDMLoaiKhachHang']);
Route::get('sua_dmloaikhachhang', [DanhMucController::class, 'viewSuaDMLoaiKhachHang'])->name('sua_dmloaikhachhang');
Route::post('xl_sua_dmloaikhachhang', [DanhMucController::class, 'xlSuaDMLoaiKhachHang']);
Route::get('xoa_dmloaikhachhang', [DanhMucController::class, 'xlXoaDMLoaiKhachHang'])->name('xoa_dmloaikhachhang');
//DMLoaiThuCung Routes
Route::get('ql_dmloaithucung', [DanhMucController::class, 'viewDMLoaiThuCung'])->name('ql_dmloaithucung');
Route::get('them_dmloaithucung', [DanhMucController::class, 'viewThemDMLoaiThuCung'])->name('them_dmloaithucung');
Route::post('xl_them_dmloaithucung', [DanhMucController::class, 'xlThemDMLoaiThuCung']);
Route::get('sua_dmloaithucung', [DanhMucController::class, 'viewSuaDMLoaiThuCung'])->name('sua_dmloaithucung');
Route::post('xl_sua_dmloaithucung', [DanhMucController::class, 'xlSuaDMLoaiThuCung']);
Route::get('xoa_dmloaithucung', [DanhMucController::class, 'xlXoaDMLoaiThuCung'])->name('xoa_dmloaithucung');
//DMQuyen Routes
Route::get('ql_dmquyen', [DanhMucController::class, 'viewDMQuyen'])->name('ql_dmquyen');
Route::get('them_dmquyen', [DanhMucController::class, 'viewThemDMQuyen'])->name('them_dmquyen');
Route::post('xl_them_dmquyen', [DanhMucController::class, 'xlThemDMQuyen']);
Route::get('sua_dmquyen', [DanhMucController::class, 'viewSuaDMQuyen'])->name('sua_dmquyen');
Route::post('xl_sua_dmquyen', [DanhMucController::class, 'xlSuaDMQuyen']);
Route::get('xoa_dmquyen', [DanhMucController::class, 'xlXoaDMQuyen'])->name('xoa_dmquyen');
//DMTrangThai Routes
Route::get('ql_dmtrangthai', [DanhMucController::class, 'viewDMTrangThai'])->name('ql_dmtrangthai');
Route::get('them_dmtrangthai', [DanhMucController::class, 'viewThemDMTrangThai'])->name('them_dmtrangthai');
Route::post('xl_them_dmtrangthai', [DanhMucController::class, 'xlThemDMTrangThai']);
Route::get('sua_dmtrangthai', [DanhMucController::class, 'viewSuaDMTrangThai'])->name('sua_dmtrangthai');
Route::post('xl_sua_dmtrangthai', [DanhMucController::class, 'xlSuaDMTrangThai']);
Route::get('xoa_dmtrangthai', [DanhMucController::class, 'xlXoaDMTrangThai'])->name('xoa_dmtrangthai');
//DMLoaiNoiDung Routes
Route::get('ql_dmloainoidung', [DanhMucController::class, 'viewDMLoaiNoiDung'])->name('ql_dmloainoidung');
Route::get('them_dmloainoidung', [DanhMucController::class, 'viewThemDMLoaiNoiDung'])->name('them_dmloainoidung');
Route::post('xl_them_dmloainoidung', [DanhMucController::class, 'xlThemDMLoaiNoiDung']);
Route::get('sua_dmloainoidung', [DanhMucController::class, 'viewSuaDMLoaiNoiDung'])->name('sua_dmloainoidung');
Route::post('xl_sua_dmloainoidung', [DanhMucController::class, 'xlSuaDMLoaiNoiDung']);
Route::get('xoa_dmloainoidung', [DanhMucController::class, 'xlXoaDMLoaiNoiDung'])->name('xoa_dmloainoidung');
// KhachHang Routes
Route::get('ql_kh',[KhachHangController::class, 'viewQuanLy'])->name('ql_kh');