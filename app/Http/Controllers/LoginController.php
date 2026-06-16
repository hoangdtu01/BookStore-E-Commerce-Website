<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {   
        if (Auth::check()) {
            return redirect()->route('my-account');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            return redirect()->route('login')->with('success', 'Bạn đã đăng nhập rồi!')->with('user_id', $user->id);
        }

        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            if ($user->email == 'hoangtv.23it@vku.udn.vn') {
                return redirect()->route('admin')->with('user_id', $user->id);
            }

            return redirect()->route('login')->with('user_id', $user->id)->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'password' => 'Tài khoản hoặc mật khẩu không chính xác.',
        ]);
    }
}

