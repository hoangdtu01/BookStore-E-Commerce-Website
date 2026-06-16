@extends('admin.index')
@section('mutil-content')
<div class="container form-text">
    <div class="row">
        <div class="col-sm-12">
            <h1>Thêm Sách</h1>
        </div>
        <!-- Hiển thị thông báo thành công (nếu có) -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="col-sm-12">
            <!-- Form thêm sách -->
            <form action="{{ route('sach.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tên sách -->
                <div class="form-group">
                    <label for="TenSach">Tên Sách:</label>
                    <input type="text" name="TenSach" id="TenSach" class="form-control" required>
                </div>

                <!-- Mô tả -->
                <div class="form-group">
                    <label for="MoTa">Mô Tả Sách:</label>
                    <textarea name="MoTa" id="MoTa" class="form-control" required></textarea>
                </div>

                <!-- Số lượng -->
                <div class="form-group">
                    <label for="SoLuong">Số Lượng Sách:</label>
                    <input type="number" name="SoLuong" id="SoLuong" class="form-control" required>
                </div>

                <!-- Giá -->
                <div class="form-group">
                    <label for="Gia">Giá Sách:</label>
                    <input type="number" name="Gia" id="Gia" class="form-control" required>
                </div>

                <!-- Thể loại -->
                <div class="form-group">
                    <label>Thể Loại Sách:</label><br>
                    <div class="d-flex flex-wrap">
                        @foreach ($theloais as $theloai)
                            <div class="form-check me-3">
                                <input class="form-check-input" type="checkbox" class="form-check d-flex" name="theloais[]" value="{{ $theloai->TheLoaiID }}">
                                <label class="form-check-label" for="{{ $theloai->TenTheLoai }}">{{ $theloai->TenTheLoai }}</label>
                            </div>
                        @endforeach
                    </div>  
                </div>

                <!-- Tác giả -->
                <div class="form-group">
                    <label for="TacGiaID">Tác Giả:</label>
                    <select name="TacGiaID" id="TacGiaID" class="form-control" required>
                        <option value="" selected>-- Chọn tác giả --</option>
                        @foreach ($tacgias as $tacgia)
                            <option value="{{ $tacgia->TacGiaID }}">{{ $tacgia->TenTacGia }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Chọn tác giả từ danh sách. Nếu tác giả chưa tồn tại, thêm mới trong menu.</small>
                </div>

                <!-- Nhà xuất bản -->
                <div class="form-group">
                    <label for="NXB">Nhà Xuất Bản:</label>
                    <input type="text" name="NXB" id="NXB" class="form-control" required>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label for="images">Thêm Hình Ảnh</label>
                    <div class="custom-file">
                    <input 
                        type="file" 
                        id="images" 
                        name="images[]" 
                        accept=".png,.gif,.jpg,.jpeg,.jfif,.webp,.svg" 
                        multiple 
                        onchange="validateAndPreviewImages(event)"
                    >
                    <small class="form-text text-muted">
                        Bạn có thể chọn nhiều hình ảnh bằng cách giữ phím Ctrl (Windows) hoặc Command (Mac) khi chọn tệp.
                    </small>
                    </div>
                    <!-- Khu vực hiển thị ảnh nhỏ -->
                    <div 
                    id="imagePreview" 
                    style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                    </div>
                    <!-- Hiển thị lỗi -->
                    <div id="errorMessages" style="color: red; margin-top: 10px;"></div>
                </div>

                <button type="submit" class="btn btn-primary" name="btnsubmit">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</div>
@endsection
