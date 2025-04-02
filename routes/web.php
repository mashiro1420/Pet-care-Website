<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\TaiKhoanController;
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
    return view('quang_ba');
});

Route::get('dang_nhap',[DangNhapController::class, 'viewDangNhap'])->name('dang_nhap');
Route::get('dang_ky',[DangNhapController::class, 'viewDangKy'])->name('dang_ky');
Route::post('xl_dang_nhap',[DangNhapController::class, 'login']);
Route::get('xl_dang_xuat',[DangNhapController::class, 'logout']);
Route::post('xl_dang_ky',[DangNhapController::class, 'signup']);

Route::get('ql_tk',[TaiKhoanController::class, 'viewQuanLy'])->name('ql_tk');
Route::get('them_tk',[TaiKhoanController::class, 'viewThem'])->name('them_tk');
Route::post('xl_them_tk',[TaiKhoanController::class, 'xlThem']);
Route::get('sua_tk',[TaiKhoanController::class, 'viewSua'])->name('sua_tk');
Route::post('xl_sua_tk',[TaiKhoanController::class, 'xlSua']);