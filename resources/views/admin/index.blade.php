<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="{{ asset('backend/css/index.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS của Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>ADMIN</h2>
        <ul class="nav flex-column font-weight-bold">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">Tổng quan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="Book">Sách</a>
                <!-- Sub-menu -->
                <ul class="submenu">
                    <li><a class="sub-link" href="{{URL::to ('admin/QL_book') }}">Quản lý Sách</a></li>
                    <li><a class="sub-link" href="{{URL::to ('admin/add_book') }}">Thêm Sách</a></li>
                    <li><a class="sub-link" href="{{URL::to ('admin/add_tacgia') }}">Tác Giả</a></li>
                    <li><a class="sub-link" href="{{URL::to ('admin/add_theLoai') }}"> Thể Loại</a></li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">Người dùng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">Đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar">
            <span class="navbar-text">Chào mừng bạn đến với Admin</span>
        </nav>
        <section  class="content">

            @yield('mutil-content')
        </section>
        
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JS của Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom JavaScript for submenu toggle -->
    <script src="{{ asset('backend/js/index.js') }}"></script>
    <script src="{{ asset('backend/js/add_imgbook.js') }}"></script>
    <script src="{{ asset('backend/js/delete_imgbook.js') }}"></script>
    <script src="{{ asset('backend/js/select2.js') }}"></script>
</body>
</html>
