@extends('admin.index')
@section('mutil-content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Tác Giả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tacgias as $tacgia)
            <tr>
                <td>{{ $tacgia->TacGiaID }}</td>
                <td>{{ $tacgia->TenTacGia }}</td>
                <td>
                    <!-- Form xóa tác giả -->
                    <form action="{{ route('tacgia.destroy', $tacgia->TacGiaID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Thêm Tác giả Mới -->
    <div class="col-sm-12">
        <h3>Thêm Tác Giả</h3>
    </div>
    <!-- Tác giả -->
    <form action="{{ route('tacgia.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" id="txtnewauthor" type="text" name="txtnewauthor" placeholder="Nhập tên tác giả mới">
            <small class="form-text text-muted">Nhập tên tác giả mới nếu không tìm thấy trong danh sách.</small>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Tác giả</button>
    </form>

    @if (session('error'))
        <div class="alert alert-danger" style="margin-top: 10px">
            {{ session('error') }}
        </div>
    @endif

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

