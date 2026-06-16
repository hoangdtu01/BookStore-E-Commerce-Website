<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Debugging session data
            Log::debug('Session Data in CheckAdmin Middleware:', session()->all());
            if ($user->id == 1) {
                return $next($request);
            } else {
                
                return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập trang này.');
            }
        }
        // Nếu chưa đăng nhập, chuyển hướng về trang login
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
    }
}
