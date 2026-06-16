@extends('admin.index')
@section('mutil-content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Người đặt</th>
                <th>Ngày tạo đơn</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->OrderID }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->NgayMua }}</td>
                <td>
                    @if($order->TrangThai == 0)
                        Chưa duyệt
                    @elseif($order->TrangThai == 1)
                        Đã duyệt
                    @elseif($order->TrangThai == 2)
                        Đã hoàn thành
                    @endif
                </td>
                
                <td>
                    <a href="{{ route('orders.show', $order->OrderID) }}" class="btn btn-primary btn-sm">Chi tiết</a>
                    <!-- Nút chỉnh trạng thái -->
                    <form action="{{ route('orders.updateStatus', $order->OrderID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="TrangThai" value="{{ $order->TrangThai }}">
                        @if ($order->TrangThai == 0)
                            <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                        @elseif ($order->TrangThai == 1)
                            <button type="submit" class="btn btn-warning btn-sm">Hoàn thành</button>
                        @elseif ($order->TrangThai == 2)
                            <button type="submit" class="btn btn-danger btn-sm">Bỏ duyệt</button>
                        @endif
                    </form>

                    <form action="{{ route('orders.destroy', $order->OrderID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif    
</div>     
@endsection
