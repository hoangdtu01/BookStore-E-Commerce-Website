@extends('layouts.app')
@section('content')

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Checkout</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="active" aria-current="page">Checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Checkout Section:::... -->
<div class="checkout-section">
    <div class="container">
        <form action="{{ route('order.store') }}" method="POST" onsubmit="return confirmOrder()">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Thông tin đơn hàng</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="default-form-box">
                                <label>Tên Khách Hàng </label>
                                <input type="text" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="default-form-box">
                                <label>Địa chỉ nhận hàng </label>
                                <input type="text" name="address" value="{{ $user->DiaChi }}" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="default-form-box">
                                <label>Số điện thoại </label>
                                <input type="text" name="phone" value="{{ $user->DienThoai }}" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="default-form-box">
                                <label>Email </label>
                                <input type="text" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Chi tiết đơn hàng</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems1 as $item)
                                    <tr>
                                        <td>
                                            {{ $item->book->TenSach }} 
                                            <strong> × {{ $item->SoLuong }}</strong>
                                            <input type="hidden" name="books[{{ $item->book->BookID }}][quantity]" value="{{ $item->SoLuong }}">
                                            <input type="hidden" name="books[{{ $item->book->BookID }}][price]" value="{{ $item->book->Gia }}">
                                        </td>
                                        <td>{{ number_format($item->totalPrice, 0, ',', '.') }} ₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng tiền sách</th>
                                    <td>{{ number_format($totalPrice, 0, ',', '.') }} ₫</td>
                                </tr>
                                <tr>
                                    <th>Tiền ship</th>
                                    <td><strong>{{ number_format($shippingFee, 0, ',', '.') }} ₫</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Tổng tiền thanh toán</th>
                                    <td>
                                        <strong>{{ number_format($finalTotal, 0, ',', '.') }} ₫</strong>
                                        <input type="hidden" name="total" value="{{ $finalTotal }}">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="payment_method">
                        <div class="order_button pt-3">
                            <button class="btn btn-md btn-black-default-hover" type="submit">Đặt Hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ...:::: End Checkout Section:::... -->
<script>
    function confirmOrder() {
        return confirm("Một khi đã đặt hàng thì không thể hủy. Bạn có chắc chắn muốn tiếp tục?");
    }
</script>
@endsection