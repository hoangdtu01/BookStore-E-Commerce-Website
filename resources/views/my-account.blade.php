@extends('layouts.app')
@section('content')

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">My Account</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="i{{ route('home.index') }}">Home</a></li>
                                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                                <li class="active" aria-current="page">My Account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Account Dashboard Section:::... -->
<div class="account-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li> <a href="#orders" data-bs-toggle="tab"
                                class="nav-link btn btn-block btn-md btn-black-default-hover active">Đơn hàng</a></li>
                        <li><a href="#address" data-bs-toggle="tab"
                                class="nav-link btn btn-block btn-md btn-black-default-hover">Thay đổi thông tin</a></li>
                        
                        @if (session('account-details'))
                            <li><a href="#account-details" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Thay đổi mật khẩu</a></li> 
                        @elseif (session('password-verification'))
                            <li><a href="#password-verification" data-bs-toggle="tab"
                                class="nav-link btn btn-block btn-md btn-black-default-hover">Thay đổi mật khẩu</a></li>
                        @else
                            <li><a href="#send-verification" data-bs-toggle="tab"
                                class="nav-link btn btn-block btn-md btn-black-default-hover">Thay đổi mật khẩu</a></li>
                        @endif
                        
                        <li><form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-block btn-md btn-black-default-hover">
                                    Đăng xuất
                                </button>
                            </form></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade show active" id="orders">
                        <h4>Đơn Hàng</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $order->OrderID }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                @if ($order->TrangThai == 0)
                                                    <span class="success">Chờ xử lý</span>
                                                @elseif ($order->TrangThai == 1)
                                                    <span class="warning">Đang xử lý</span>
                                                @else
                                                    <span class="pending">Hoàn thành </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('order.details', ['id' => $order->OrderID]) }}" class="view">Xem</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Bạn chưa có đơn hàng nào.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="address">
                        <h4>Thông tin khách</h4>
                        <form action="{{ route('my-account.update') }}" method="POST">
                            @csrf
                            <div class="default-form-box mb-20">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Địa chỉ</label>
                                <input type="text" name="address"  value="{{ $user->DiaChi }}">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" value="{{ $user->DienThoai }}">
                            </div>
                            <div class="save_button mt-3">
                                <button class="btn btn-md btn-black-default-hover"
                                    type="submit">Thay đổi</button>
                            </div>
                        </form>
                        @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="password-verification">
                        <h3>Nhập mã xác minh</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('password.reset.verify-code') }}" method="POST">
                                        @csrf
                                        <div class="default-form-box mb-20">
                                            <label>Mã xác minh</label>
                                            <input type="text" name="verification_code" required>
                                        </div>
                                        <div class="save_button mt-3">
                                            <button class="btn btn-md btn-black-default-hover" type="submit">
                                                Xác minh
                                            </button>
                                        </div>
                                    </form>
                                    @if(session('error'))
                                        <div class="alert alert-danger" style="margin-top: 10px">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="send-verification">
                        <h3>Gửi mã xác minh</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('password.reset.send-code') }}" method="POST">
                                        @csrf
                                        <div class="default-form-box mb-20">
                                            <label>Email</label>
                                            <input type="text" value="{{ $user->email }}" readonly>
                                        </div>
                                        <div class="save_button mt-3">
                                            <button class="btn btn-md btn-black-default-hover" type="submit">Gửi mã xác minh</button>
                                        </div>
                                    </form>
                                    @if(session('success'))
                                        <div class="alert alert-success" style="margin-top: 10px">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="account-details">
                        <h3>Thay đổi mặt khẩu </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('password.reset.update') }}" method="POST" id="registerForm">
                                        @csrf
                                        <div class="default-form-box mb-20">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="password" id="password" required>
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Nhập lại mật khẩu mới</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                                            <span id="passwordError" style="color: red; display: none;">
                                                Mật khẩu và Mật khẩu xác nhận không khớp!
                                            </span>
                                        </div>
                                        <div class="save_button mt-3">
                                            <button class="btn btn-md btn-black-default-hover" type="submit">
                                                Thay đổi
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Account Dashboard Section:::... -->
<script src="{{ asset('assets/js/password_confirmation.js') }}"></script>
@endsection