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
    public function handle(Request $request, Closure $next, ...$quyens): Response
    {
        if(empty(session('tai_khoan'))) return redirect()->route('dang_nhap')->with('bao_loi', 'Cần đăng nhập để truy cập trang này.');
        $quyen_user = session('quyen');
        if (in_array($quyen_user,$quyens)) {
            return $next($request);
        }
        return redirect()->back()->with('bao_loi', 'Không có quyền truy cập vào trang này.');
    }
}
