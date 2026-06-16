<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai; 
use App\Models\TacGia; 
use App\Models\Book; 
use App\Models\Image; 

class AddBookController extends Controller
{
    //
    public function create()
    {
        $theloais = TheLoai::all();
        $tacgias = TacGia::all();

        return view('admin.add_book', compact('theloais', 'tacgias'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'TenSach' => 'required|string|max:200',
            'MoTa' => 'required|string',
            'SoLuong' => 'required|integer|min:1',
            'Gia' => 'required|integer|min:1',
            'TacGiaID' => 'required|exists:tacgia,TacGiaID',
            'theloais' => 'array',
            'theloais.*' => 'exists:theloai,TheLoaiID',
            'images.*' => 'image|mimes:jpeg,png,jpg,jfif,webp,svg|max:1024',
        ]);

        $book = Book::create([
            'TenSach' => $request->TenSach,
            'MoTa' => $request->MoTa,
            'SoLuong' => $request->SoLuong,
            'Gia' => $request->Gia,
            'TacGiaID' => $request->TacGiaID,
            'NXB' => $request->NXB,
        ]);

        // 2. Lưu thể loại sách vào bảng TrungGian
        if ($request->has('theloais')) {
            $book->theloais()->sync($request->theloais);
        }

        // 3. Lưu đường dẫn hình ảnh vào bảng Image
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public'); // Lưu file vào thư mục storage/app/images
                Image::create([
                    'BookID' => $book->BookID,
                    'ImgPath' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Sách đã được thêm thành công!');
    }
}
