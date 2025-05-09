<?php

use App\Http\Controllers\BaoCaoController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\ChamSocController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TrongCoiController;
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
Route::get('quay_lai',[Controller::class, 'quayLai'])->name('quay_lai');
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
//BaiDang Routes
Route::get('ql_baidang',[BaiDangController::class, 'viewQuanLy'])->name('ql_baidang');
Route::get('baidang_user',[BaiDangController::class, 'viewUser'])->name('baidang_user');
Route::get('chi_tiet_baidang',[BaiDangController::class, 'viewBaiDangUser'])->name('chi_tiet_baidang');
Route::get('them_baidang',[BaiDangController::class, 'viewThem'])->name('them_baidang');
Route::post('xl_them_baidang',[BaiDangController::class, 'xlThem']);
Route::get('sua_baidang',[BaiDangController::class, 'viewSua'])->name('sua_baidang');
Route::post('xl_sua_baidang',[BaiDangController::class, 'xlSua']);
Route::get('xl_dang_lai',[BaiDangController::class, 'xlDangLai'])->name('dang_lai');
Route::get('xoa_baidang',[BaiDangController::class, 'xlXoa'])->name('xoa_baidang');
Route::get('xl_thich',[BaiDangController::class, 'xlThich'])->name('xl_thich');
//QLDichVus Routes
Route::get('ql_dichvu',[DichVuController::class, 'viewQuanLy'])->name('ql_dichvu');
Route::post('xl_them_chamsoc',[DichVuController::class, 'xlThemChamSoc']);
Route::post('xl_them_trongcoi',[DichVuController::class, 'xlThemTrongCoi']);
Route::get('xoa_chamsoc',[DichVuController::class, 'xlXoaChamSoc'])->name('xoa_chamsoc');
Route::get('xoa_trongcoi',[DichVuController::class, 'xlXoaTrongCoi'])->name('xoa_trongcoi');
Route::post('xl_sua_chamsoc',[DichVuController::class, 'xlSuaChamSoc']);
Route::post('xl_sua_trongcoi',[DichVuController::class, 'xlSuaTrongCoi']);
//QLChamSoc Routes
Route::get('ql_chamsoc',[ChamSocController::class, 'viewQuanLy'])->name('ql_chamsoc');
Route::get('khach_hang_lichchamsoc',[ChamSocController::class, 'viewKhachHang'])->name('khach_hang_lichchamsoc');
Route::get('dat_lich_cs',[ChamSocController::class, 'viewDatLich'])->name('dat_lich_cs');
Route::get('thanh_toan_cs',[ChamSocController::class, 'viewThanhToan'])->name('thanh_toan_cs');
Route::post('xl_dat_lich_cs',[ChamSocController::class, 'xlDatLich']);
Route::get('chi_tiet_user_cs',[ChamSocController::class, 'viewChiTietUser'])->name('chi_tiet_user_cs');
Route::get('chi_tiet_admin_cs',[ChamSocController::class, 'viewChiTietAdmin'])->name('chi_tiet_admin_cs');
Route::get('sua_lich_cs',[ChamSocController::class, 'viewSuaLich'])->name('sua_lich_cs');
Route::post('xl_sua_lich_cs',[ChamSocController::class, 'xlSuaLich']);
Route::post('xl_xac_nhan_cs',[ChamSocController::class, 'xlXacNhan']);
Route::post('xl_hoan_thanh_cs',[ChamSocController::class, 'xlHoanThanh']);
Route::post('xl_ap_dung_km_cs',[ChamSocController::class, 'xlApDungKM']);
Route::post('xl_thanh_toan_cs',[ChamSocController::class, 'xlThanhToan']);
Route::get('xl_huy_cs',[ChamSocController::class, 'xlHuy'])->name('xl_huy_cs');
Route::post('xl_gui_mail_xac_nhan_cs',[ChamSocController::class, 'xlGuiMailXacNhan']);
//QLTrongCoi Routes
Route::get('ql_trongcoi',[TrongCoiController::class, 'viewQuanLy'])->name('ql_trongcoi');
Route::get('khach_hang_lichtrongcoi',[TrongCoiController::class, 'viewKhachHang'])->name('khach_hang_lichtrongcoi');
Route::get('dat_lich_tc',[TrongCoiController::class, 'viewDatLich'])->name('dat_lich_tc');
Route::get('thanh_toan_tc',[TrongCoiController::class, 'viewThanhToan'])->name('thanh_toan_tc');
Route::post('xl_dat_lich_tc',[TrongCoiController::class, 'xlDatLich']);
Route::get('chi_tiet_user_tc',[TrongCoiController::class, 'viewChiTietUser'])->name('chi_tiet_user_tc');
Route::get('chi_tiet_admin_tc',[TrongCoiController::class, 'viewChiTietAdmin'])->name('chi_tiet_admin_tc');
Route::get('sua_lich_tc',[TrongCoiController::class, 'viewSuaLich'])->name('sua_lich_tc');
Route::post('xl_sua_lich_tc',[TrongCoiController::class, 'xlSuaLich']);
Route::post('xl_xac_nhan_tc',[TrongCoiController::class, 'xlXacNhan']);
Route::post('xl_hoan_thanh_tc',[TrongCoiController::class, 'xlHoanThanh']);
Route::post('xl_ap_dung_km_tc',[TrongCoiController::class, 'xlApDungKM']);
Route::post('xl_thanh_toan_tc',[TrongCoiController::class, 'xlThanhToan']);
Route::get('xl_huy_tc',[TrongCoiController::class, 'xlHuy'])->name('xl_huy_tc');
Route::post('xl_gui_mail_xac_nhan_tc',[TrongCoiController::class, 'xlGuiMailXacNhan']);
// KhachHang Routes
Route::get('ql_kh',[KhachHangController::class, 'viewQuanLy'])->name('ql_kh');
Route::get('chi_tiet_tk',[KhachHangController::class, 'viewChiTietTaiKhoan'])->name('chi_tiet_tk');
Route::get('chi_tiet_kh',[KhachHangController::class, 'viewChiTietKhachHang'])->name('chi_tiet_kh');
Route::post('xl_dky_hv', [KhachHangController::class, 'xlDKHoiVien']);
Route::post('cap_nhat_tai_khoan', [KhachHangController::class, 'xlCapNhatTaiKhoan']);
//BaoCao Routes
Route::get('bao_cao',[BaoCaoController::class, 'viewBaoCao'])->name('bao_cao');