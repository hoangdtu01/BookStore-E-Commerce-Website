
@extends('admin.index')
@section('mutil-content')
<div class="container">
    <h2>Quản Lý Sách</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sách</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Nhà Xuất Bản</th>
                <th>Ngày đăng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu mẫu -->
            @foreach($books as $book)
            <tr>
                <td>{{ $book->BookID }}</td>
                <td>{{ $book->TenSach }}</td>
                <td>{{ $book->SoLuong }}</td>
                <td>{{ number_format($book->Gia, 0, ',', '.') }} VND</td>
                <td>{{ $book->NXB }}</td>
                <td>{{ $book->created_at }}</td>
                <td>
                    <a href="{{ route('books.show', $book->BookID) }}" class="btn btn-success btn-sm">Xem</a>
                    <a href="{{ route('books.edit', $book->BookID) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('books.destroy', $book->BookID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

     <!-- Pagination -->
    <div class="pagination-container">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @php
                $totalPages = ceil($total / $perPage);
                $adjacent = 2; // Số trang hiển thị trước và sau trang hiện tại
                $startPage = max(1, $currentPage - $adjacent); // Trang bắt đầu
                $endPage = min($totalPages, $currentPage + $adjacent); // Trang kết thúc
                @endphp

                <!-- Nút Previous -->
                <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="?page={{ $currentPage - 1 }}">Previous</a>
                </li>

                <!-- Hiển thị nút "1" và "..." nếu cần -->
                @if ($startPage > 1)
                    <li class="page-item">
                        <a class="page-link" href="?page=1">1</a>
                    </li>
                    @if ($startPage > 2)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endif

                <!-- Hiển thị các số trang -->
                @for ($i = $startPage; $i <= $endPage; $i++)
                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                        <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Hiển thị nút "..." và nút cuối cùng nếu cần -->
                @if ($endPage < $totalPages)
                    @if ($endPage < $totalPages - 1)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $totalPages }}">{{ $totalPages }}</a>
                    </li>
                @endif

                <!-- Nút Next -->
                <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                    <a class="page-link" href="?page={{ $currentPage + 1 }}">Next</a>
                </li>

            </ul>
        </nav>
    </div>
</div>
@endsection
