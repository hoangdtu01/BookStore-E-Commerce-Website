@extends('admin.index')
@section('mutil-content')
<div class="container form-text">
    <div class="row">
        <div class="col-sm-12">
            <h1>Sửa Sách</h1>
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
            <!-- Form sửa sách -->
            <form action="{{ route('books.update', $book->BookID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tên sách -->
                <div class="form-group">
                    <label for="TenSach">Tên Sách:</label>
                    <input type="text" name="TenSach" id="TenSach" class="form-control" value="{{ $book->TenSach }}" required>
                </div>

                <!-- Mô tả -->
                <div class="form-group">
                    <label for="MoTa">Mô Tả Sách:</label>
                    <textarea name="MoTa" id="MoTa" class="form-control" required>{{ $book->MoTa }}</textarea>
                </div>

                <!-- Số lượng -->
                <div class="form-group">
                    <label for="SoLuong">Số Lượng Sách:</label>
                    <input type="number" name="SoLuong" id="SoLuong" class="form-control" value="{{ $book->SoLuong }}" required>
                </div>

                <!-- Giá -->
                <div class="form-group">
                    <label for="Gia">Giá Sách:</label>
                    <input type="number" name="Gia" id="Gia" class="form-control" value="{{ $book->Gia }}" required>
                </div>

                <!-- Thể loại -->
                <div class="form-group">
                    <label>Thể Loại Sách:</label><br>
                    <div class="d-flex flex-wrap">
                        @foreach ($theloais as $theloai)
                            <div class="form-check me-3">
                                <input class="form-check-input" type="checkbox" name="theloais[]" 
                                       value="{{ $theloai->TheLoaiID }}"
                                       {{ $book->theloais->contains('TheLoaiID', $theloai->TheLoaiID) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $theloai->TenTheLoai }}</label>
                            </div>
                        @endforeach
                    </div>  
                </div>

                <!-- Tác giả -->
                <div class="form-group">
                    <label for="TacGiaID">Tác Giả:</label>
                    <select name="TacGiaID" id="TacGiaID" class="form-control" required>
                        @foreach ($tacgias as $tacgia)
                            <option value="{{ $tacgia->TacGiaID }}" {{ $book->TacGiaID == $tacgia->TacGiaID ? 'selected' : '' }}>
                                {{ $tacgia->TenTacGia }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Chọn tác giả từ danh sách. Nếu tác giả chưa tồn tại, thêm mới trong menu.</small>
                </div>

                <!-- Nhà xuất bản -->
                <div class="form-group">
                    <label for="NXB">Nhà Xuất Bản:</label>
                    <input type="text" name="NXB" id="NXB" class="form-control" value="{{ $book->NXB }}" required>
                </div>

                <!-- Hình ảnh hiện tại -->
                <div class="form-group">
                    <label>Hình Ảnh Hiện Tại:</label>
                    <div class="d-flex flex-wrap">
                        @foreach ($book->images as $image)
                            <div style="position: relative; margin-right: 10px;">
                                <img src="{{ asset('storage/' . $image->ImgPath) }}" 
                                     alt="Hình ảnh sách" 
                                     style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd;">
                                <button type="button" class="btn btn-danger btn-sm" 
                                        style="position: absolute; top: 0; right: 0;" 
                                        onclick="deleteImage({{ $image->ImgID }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tải ảnh mới -->
                <div class="form-group">
                    <label for="images">Thêm Hình Ảnh Mới:</label>
                    <div class="custom-file">
                        <input type="file" id="images" name="images[]" accept=".png,.gif,.jpg,.jpeg,.jfif,.webp,.svg" multiple onchange="validateAndPreviewImages(event)">
                        <small class="form-text text-muted">
                            Bạn có thể chọn nhiều hình ảnh bằng cách giữ phím Ctrl (Windows) hoặc Command (Mac) khi chọn tệp.
                        </small>
                    </div>
                    <div id="imagePreview" style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;"></div>
                    <div id="errorMessages" style="color: red; margin-top: 10px;"></div>
                </div>

                <button type="submit" class="btn btn-primary" name="btnsubmit">Lưu Thay Đổi</button>
            </form>
        </div>
    </div>
</div>

@endsection
