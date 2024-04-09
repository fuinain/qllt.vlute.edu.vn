<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('IsLogin') &&
            ( $request->session()->get('Quyen') == 'admin') ||
            ($request->session()->get('Quyen') == 'giangvien') ||
            ($request->session()->get('Quyen') == 'thuky')
        ) {
            return $next($request);
        } else {
            // Nếu người dùng chưa đăng nhập hoặc không có quyền là Admin, chuyển hướng đến trang đăng nhập
            $request->session()->put('url',  $request->fullUrl());
            return redirect()->route('master');
        }
    }
}
