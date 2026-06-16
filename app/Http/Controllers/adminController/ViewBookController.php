<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class ViewBookController extends Controller
{
    public function show(Request $request, $id)
    {
        $book = Book::with(['images', 'tacGia', 'theloais'])->findOrFail($id);

        // Lấy tất cả bình luận của sách này
        $comments = $book->comments()->with('user')->get();

       
        if ($comments->isEmpty()) {
            return view('admin.detail_book', [
                'book' => $book,
                'comments' => collect([]),
                'total' => 0,
                'perPage' => 5,
                'currentPage' => 1,
            ]);
        }

        $perPage = 5; // Số bình luận mỗi trang
        $currentPage = $request->input('page', 1); // Trang hiện tại
        $total = $comments->count(); // Tổng số bình luận

        $items = $comments->slice(($currentPage - 1) * $perPage, $perPage);

        return view('admin.detail_book', [
            'book' => $book,
            'comments' => $items,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $currentPage,
        ]);
    }
}
