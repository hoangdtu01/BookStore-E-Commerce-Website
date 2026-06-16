<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Lấy danh sách sản phẩm mới nhất (giới hạn 10 sản phẩm)
        $newBooks = Book::with('images')->orderBy('created_at', 'desc')->take(8)->get();

        // Truyền dữ liệu xuống view
        return view('index', compact('newBooks'));
    }
}
