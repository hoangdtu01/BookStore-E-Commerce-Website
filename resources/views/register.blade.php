@extends('layouts.app')
@section('content')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Đăng ký</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="active" aria-current="page">Đăng ký</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Customer register Section :::... -->
<div class="customer-login">
    <div class="container">
        <div class="row">
            <!--register area start-->
            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                    <h3>Đăng ký</h3>
                    <form action="{{ route('register') }}" method="POST" id="registerForm">
                        @csrf
                        <div class="default-form-box">
                            <label>Địa chỉ Email <span style="color: red">*</span></label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="default-form-box">
                            <label>Mặt khẩu <span style="color: red">*</span></label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="default-form-box">
                            <label>Nhập lại mặt khẩu <span style="color: red">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                            <span id="passwordError" style="color: red; display: none;">Mật khẩu và Mật khẩu xác nhận không khớp!</span>
                        </div>
                        <div class="default-form-box">
                            <label>Tên người dùng <span style="color: red">*</span></label>
                            <input type="text" name="Name" required>
                        </div>
                        <div class="default-form-box">
                            <label>Số điện thoại <span style="color: red">*</span></label>
                            <input type="text" name="DienThoai" required>
                        </div>
                        <div class="default-form-box">
                            <label>Địa chỉ <span style="color: red">*</span></label>
                            <input type="text" name="DiaChi" required>
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover" type="submit">Đăng ký</button>
                            <a href="{{ route('login') }}">Đăng nhập</a>
                            @if(session('success'))
                                <div class="alert alert-success" style="margin-top: 10px">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div> <!-- ...:::: End Customer register Section :::... -->
<script src="{{ asset('assets/js/password_confirmation.js') }}"></script>
@endsection