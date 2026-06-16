<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TheLoai; 
use App\Models\TacGia; 
use App\Models\Book; 
use App\Models\Image; 

class UpdateBookController extends Controller
{
    //
    public function show($id)
    {
        $book = Book::with(['images', 'theloais', 'tacGia'])->findOrFail($id);

        $theloais = TheLoai::all(); 
        $tacgias = TacGia::all(); 

        return view('admin.edit_book', compact('book', 'theloais', 'tacgias'));
    }

    public function destroyImage($id)
    {
        try {
            $image = Image::findOrFail($id);
    
            // Xóa file khỏi storage
            if (Storage::exists($image->ImgPath)) {
                Storage::delete($image->ImgPath);
            }
    
            // Xóa ảnh khỏi database
            $image->delete();
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
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

        $book = Book::findOrFail($id);

        $book->update([
            'TenSach' => $request->TenSach,
            'MoTa' => $request->MoTa,
            'SoLuong' => $request->SoLuong,
            'Gia' => $request->Gia,
            'TacGiaID' => $request->TacGiaID,
            'NXB' => $request->NXB,
        ]);

        // 2. Cập nhật thể loại sách
        if ($request->has('theloais')) {
            $book->theloais()->sync($request->theloais);
        }

        // 3. Cập nhật hình ảnh
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public'); // Lưu file vào thư mục storage/app/public/images
                Image::create([
                    'BookID' => $book->BookID,
                    'ImgPath' => $path,
                ]);
            }
        }

        return redirect()->route('books.edit', $id)->with('success', 'Cập nhật sách thành công!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->back()->with('error', 'Sách không tồn tại.');
        }

        // Xóa sách
        $book->delete();

        return redirect()->route('QL_book.index')->with('success', 'Sách đã được xóa thành công.');
    }
}
