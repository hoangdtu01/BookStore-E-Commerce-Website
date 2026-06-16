<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book; 

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 9; // Số bản ghi mỗi trang
        $currentPage = $request->input('page', 1); // Trang hiện tại
        $books = Book::all(); // Lấy tất cả dữ liệu
        $total = $books->count(); // Tổng số bản ghi

        $items = $books->slice(($currentPage - 1) * $perPage, $perPage)->all();

        return view('admin.QL_book', [
            'books' => $items,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $currentPage,
        ]); 
    }
}
