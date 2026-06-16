<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    // Hàm hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Hàm xử lý đăng ký người dùng
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'Name' => 'required|string|max:255',
            'DienThoai' => 'required|string|max:15',
            'DiaChi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->Name,
            'DienThoai' => $request->DienThoai,
            'DiaChi' => $request->DiaChi,
        ]);
        
        // Chuyển hướng trở lại trang đăng ký với thông báo thành công
        return redirect()->route('register.form')->with('success', 'Đăng ký thành công!');
    }
}
