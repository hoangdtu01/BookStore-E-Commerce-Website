@extends('layouts.app')
@section('content')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Login</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="active" aria-current="page">Đăng nhập</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Customer Login Section :::... -->
<div class="customer-login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                    <h3>Đăng nhập</h3>
                    <form action="{{ route('loginHandler') }}" method="POST">
                        @csrf
                        <div class="default-form-box">
                            <label>Email <span style="color: red">*</span></label>
                            <input type="text" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="default-form-box">
                            <label>Mật khẩu <span style="color: red">*</span></label>
                            <input type="password" name="password" required>
                            @error('password')
                                <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng nhập</button>
                            <label class="checkbox-default mb-4" for="offer">
                                <input type="checkbox" name="remember" id="offer">
                                <span>Ghi nhớ mật khẩu</span>
                            </label>
                            <a href="{{ route('register') }}">Chưa có tài khoản</a>

                            @if(session('success'))
                                <div class="alert alert-success" style="margin-top: 10px">{{ session('success') }}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger" style="margin-top: 10px">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if(request()->query('error'))
                                <div class="alert alert-danger">
                                    {{ request()->query('error') }}
                                </div>
                            @endif
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Customer Login Section :::... -->
@endsection