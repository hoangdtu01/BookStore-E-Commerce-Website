@extends('admin.index')
@section('mutil-content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Thể Loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($theloais as $theloai)
            <tr>
                <td>{{ $theloai->TheLoaiID }}</td>
                <td>{{ $theloai->TenTheLoai }}</td>
                <td>
                    <!-- Form xóa thể loại -->
                    <form action="{{ route('theloai.destroy', $theloai->TheLoaiID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Thêm Thể Loại Mới -->
    <div class="col-sm-12">
        <h1>Thêm Thể Loại</h1>
    </div>

    <form action="{{ route('theloai.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" id="txtnewcategory" type="text" name="txtnewcategory" placeholder="Nhập tên thể loại mới">
            <small class="form-text text-muted">Nhập tên thể loại mới nếu không tìm thấy trong danh sách.</small>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Thể Loại</button>
    </form>

    <!-- Hiển thị thông báo thành công (nếu có) -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>    
@endsection
