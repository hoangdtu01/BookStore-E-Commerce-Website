<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\VerificationCodeMail;

class AuthController extends Controller
{
    //
    public function sendVerificationCode(Request $request)
    {
        $user = Auth::user();
        $code = rand(100000, 999999);

        // Lưu mã xác minh vào session
        Session::put('verification_code', $code);

        // Gửi email
        Mail::to($user->email)->send(new \App\Mail\VerificationCodeMail($code));

        return redirect()->route('my-account')->with('password-verification', 'Mã xác minh đã được gửi đến email của bạn.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric',
        ]);

        if (Session::get('verification_code') != $request->input('verification_code')) {
            return redirect()->route('my-account')->with([
                'error' => 'Mã xác minh không chính xác.',
                'password-verification' => 'Vui lòng thử lại sau.',
            ]);
        }

        Session::put('verification_verified', true);
        return redirect()->route('my-account')->with('account-details', 'Mã xác minh chính xác. Bạn có thể đổi mật khẩu.');
    }


    public function updatePassword(Request $request)
    {

        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        // Xóa session
        Session::forget(['verification_code', 'verification_verified']);

        return redirect()->route('my-account')->with('success', 'Mật khẩu của bạn đã được cập nhật.');
    }
}
