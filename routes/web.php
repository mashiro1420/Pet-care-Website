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
Route::post('xl_dang_nhap',[DangNhapController::class, 'login']);
Route::get('xl_dang_xuat',[DangNhapController::class, 'logout']);
Route::post('xl_dang_ky',[DangNhapController::class, 'signup']);
Route::post('xl_doi_mk',[DangNhapController::class, 'doi_mk']);
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
Route::get('ql_dmdgia', [DanhMucController::class, 'viewDMGia'])->name('ql_dmgia');
Route::get('them_dmgia', [DanhMucController::class, 'viewThemDMGia'])->name('them_dmgia');
Route::post('xl_them_dmgia', [DanhMucController::class, 'xlThemDMGia']);
Route::get('sua_dmgia', [DanhMucController::class, 'viewSuaDMGia'])->name('sua_dmgia');
Route::post('xl_sua_dmgia', [DanhMucController::class, 'xlSuaDMGia']);
Route::get('xoa_dmgia', [DanhMucController::class, 'xlXoaDMGia'])->name('xoa_dmgia');
// KhachHang Routes
Route::get('ql_kh',[KhachHangController::class, 'viewQuanLy'])->name('ql_kh');