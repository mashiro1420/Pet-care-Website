<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KiemTraDangNhap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('tai_khoan')) {
            return redirect()->route('dang_nhap')->with('error', 'Cần phải đăng nhập mới có thể truy cập.');
        }
        $quyen = session('quyen');
        if ($quyen == 'Admin') {
            return $next($request);
        }
        $trang_ql = ['ql_kh'];
        if (($quyen == 'Quản lý'||$quyen == 'Nhân viên') && !in_array($request->path(), $trang_ql)) {
            return redirect()->route('ql_kh')->with('error', 'Không có quyền truy cập.');
        }
        $trang_ql = [];
        if ($quyen == 'Khách hàng' && !in_array($request->path(), $trang_ql)) {
            return redirect()->route('dang_nhap')->with('error', 'Không có quyền truy cập.');
        }
        return $next($request);
    }
}
