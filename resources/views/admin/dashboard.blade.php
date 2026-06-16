@extends('admin.index')

@section('mutil-content')
<div class="container">
    <h1>Thống kê</h1>
    <div class="dashboard">
        <div class="card orders">
            <i class="fas fa-shopping-cart"></i>
            <h3>{{ $totalOrders }}</h3>
            <p>Đơn hàng</p>
        </div>
        <div class="card users">
            <i class="fas fa-users"></i>
            <h3>{{ $totalUsers }}</h3>
            <p>Người dùng</p>
        </div>
        <div class="card products">
            <i class="fas fa-box"></i>
            <h3>{{ $totalBooks }}</h3>
            <p>Sách trong kho</p>
        </div>
        <div class="card revenue">
            <i class="fas fa-dollar-sign"></i>
            <h3>{{ number_format($totalRevenue, 0, ',', '.') }} VND</h3>
            <p>Doanh thu</p>
        </div>
    </div>
</div>
@endsection
