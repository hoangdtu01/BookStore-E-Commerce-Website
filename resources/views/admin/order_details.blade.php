@extends('admin.index')
@section('mutil-content')
<div class="container">
    <h2>Chi tiết đơn hàng: </h2>
    <p>Mã đơn hàng: <strong>{{ $order->OrderID }}</strong></p>
    <p>Tên người đặt: <strong>{{ $order->user->name }}</strong></p>
    <p>Địa chỉ nhận hàng: <strong>{{ $order->user->DiaChi }}</strong> </p>
    <p>Ngày tạo đơn: <strong>{{ $order->created_at->format('d/m/Y H:i') }}</strong></p>
    <p>Trạng thái: <strong>@if($order->TrangThai == 0) Chưa duyệt @elseif($order->TrangThai == 1) Đã duyệt @elseif($order->TrangThai == 2) Đã hoàn thành @endif</strong></p>
    <p>Tổng số tiền thanh toán: <strong>{{ number_format($totalAmount, 0, ',', '.') }} VND</strong></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->details as $detail)
            <tr>
                <td>{{ $detail->book->TenSach }}</td>
                <td>{{ $detail->SoLuong }}</td>
                <td>{{ number_format($detail->Gia, 0, ',', '.') }} VND</td>
                <td>{{ number_format($detail->Gia * $detail->SoLuong, 0, ',', '.') }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>     
@endsection