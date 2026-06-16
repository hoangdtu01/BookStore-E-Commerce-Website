@extends('admin.index')

@section('mutil-content')
<div class="container">
    <h1>Chi Tiết Sách</h1>
    <form>
        @csrf
        <!-- Tên sách -->
        <div class="form-group">
            <label for="TenSach">Tên Sách</label>
            <input type="text" class="form-control" id="TenSach" value="{{ $book->TenSach }}" readonly>
        </div>

        <!-- Tác giả -->
        <div class="form-group">
            <label for="TacGia">Tác Giả</label>
            <input type="text" class="form-control" id="TacGia" value="{{ $book->tacGia->TenTacGia ?? 'Không rõ' }}" readonly>
        </div>

        <!-- Mô tả -->
        <div class="form-group">
            <label for="MoTa">Mô Tả</label>
            <textarea class="form-control" id="MoTa" rows="3" readonly>{{ $book->MoTa }}</textarea>
        </div>

        <!-- Nhà xuất bản -->
        <div class="form-group">
            <label for="NXB">Nhà Xuất Bản</label>
            <input type="text" class="form-control" id="NXB" value="{{ $book->NXB }}" readonly>
        </div>

        <!-- Số lượng -->
        <div class="form-group">
            <label for="SoLuong">Số Lượng</label>
            <input type="number" class="form-control" id="SoLuong" value="{{ $book->SoLuong }}" readonly>
        </div>

        <!-- Giá -->
        <div class="form-group">
            <label for="Gia">Giá</label>
            <input type="text" class="form-control" id="Gia" value="{{ number_format($book->Gia, 0, ',', '.') }} VND" readonly>
        </div>

        <!-- Thể loại -->
        <div class="form-group">
            <label>Thể Loại</label>
            <ul>
                @foreach ($book->theloais as $theloai)
                    <li>{{ $theloai->TenTheLoai }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Hình ảnh -->
        <div class="form-group">
            <label>Hình Ảnh</label>
            <div>
                @foreach ($book->images as $image)
                    <img src="{{ asset('storage/' . $image->ImgPath) }}" alt="Hình ảnh sách" style="width: 150px; margin-right: 10px;">
                @endforeach
            </div>
        </div>

        <!-- Bình luận -->
        @if (!$comments->isEmpty())
        <div class="form-group">
            <label>Bình Luận</label>
            <ul>
                @foreach ($comments as $comment)
                    <li>
                        <strong>{{ $comment->user->name ?? 'Người dùng không xác định' }}:</strong>
                        {!! $comment->NoiDung !!}
                        <br>
                        <small>Đánh giá: {{ $comment->Sao }}/5 - {{ $comment->created_at }}</small>
                    </li>
                @endforeach
            </ul>

            <!-- Hiển thị phân trang -->
            <div class="pagination-container">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @php
                            $totalPages = ceil($total / $perPage);
                            $adjacent = 2; // Số trang hiển thị trước và sau trang hiện tại
                            $startPage = max(1, $currentPage - $adjacent);
                            $endPage = min($totalPages, $currentPage + $adjacent);
                        @endphp
            
                        <!-- Nút Previous -->
                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}">Previous</a>
                        </li>
            
                        <!-- Hiển thị nút "1" và "..." nếu cần -->
                        @if ($startPage > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => 1]) }}">1</a>
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
                                <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
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
                                <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $totalPages]) }}">{{ $totalPages }}</a>
                            </li>
                        @endif
            
                        <!-- Nút Next -->
                        <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>            
        </div>
        @endif
        <!-- Nút quay lại -->
        <a href="{{ route('QL_book.index') }}" class="btn btn-primary">Quay lại</a>
    </form>
</div>
@endsection
