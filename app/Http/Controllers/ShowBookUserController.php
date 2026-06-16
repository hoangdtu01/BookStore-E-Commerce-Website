<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Image;
use App\Models\TheLoai;
use App\Models\TacGia;
use App\Models\GioHang;

class ShowBookUserController extends Controller
{
    public function index()
    {
        $books = Book::select('BookID', 'TenSach', 'Gia')
            ->with(['images' => function ($query) {
                $query->select('BookID', 'ImgPath'); 
            }])
            ->paginate(2);
        
        $theloais = TheLoai::all();
        $tacgias = TacGia::all();

        $cartItems = collect([]);
        if (auth()->check()) {
            $userId = auth()->id();

            $cartItems = GioHang::where('user_id', $userId)
                ->with(['book.images' => function ($query) {
                    $query->select('BookID', 'ImgPath');
                }])
                ->latest()
                ->take(3)
                ->get();

            $totalPrice0 = GioHang::where('user_id', $userId)
                ->with('book')
                ->get()
                ->sum(function ($item) {
                    return $item->SoLuong * $item->book->Gia;
                });
    
            $totalPrice = number_format($totalPrice0, 0, ',', '.') . '₫';

            return view('shop-grid-sidebar-left', compact('books', 'theloais', 'tacgias', 'cartItems', 'totalPrice'));
        }

        // Trả về view với các dữ liệu cần thiết
        return view('shop-grid-sidebar-left', compact('books', 'theloais', 'tacgias', 'cartItems'));
    }


    // Phương thức lọc sách theo thể loại
    public function filter(Request $request)
    {
        $theLoaiIds = $request->input('theloais', []);
        $priceRange = $request->input('price_range', '');
        $priceMin = 0;
        $priceMax = 0;
        
        if ($priceRange) {
            list($priceMin, $priceMax) = explode('-', $priceRange);
        }

        // Chỉ cần sách phải có tất cả các thể loại đã chọn, không cần số lượng thể loại chính xác
        $books = Book::select('BookID', 'TenSach', 'Gia', 'Created_at')
        ->with(['images' => function ($query) {
            $query->select('BookID', 'ImgPath'); 
        }])
        ->when(count($theLoaiIds) > 0, function ($query) use ($theLoaiIds) {
            return $query->whereHas('theLoais', function ($q) use ($theLoaiIds) {
                $q->whereIn('book_theloai.TheLoaiID', $theLoaiIds) // Lọc theo các thể loại đã chọn
                    ->join('book_theloai as trungGian', 'trungGian.BookID', '=', 'books.BookID');
            });
        })
        ->when($priceMin && $priceMax, function ($query) use ($priceMin, $priceMax) {
            return $query->whereBetween('Gia', [(int)$priceMin, (int)$priceMax]);  // Lọc theo khoảng giá
        })
        ->paginate(4);

        // Giữ lại các tham số trong phân trang
        $books->appends(['theloais' => $theLoaiIds, 'price_range' => $priceRange]);

        $theloais = TheLoai::all();
        $tacgias = TacGia::all();

        return view('shop-grid-sidebar-left', compact('books', 'theloais', 'tacgias'));
    }

    // Phương thức lọc sách theo tác giả
    public function filterbyAuthor(Request $request, $tacGiaID){

        $books = Book::select('BookID', 'TenSach', 'Gia')
        ->with(['images' => function ($query) {
            $query->select('BookID', 'ImgPath');
        }])
        ->where('TacGiaID', $tacGiaID)
        ->paginate(4);

        $theloais = TheLoai::all();
        $tacgias = TacGia::all();
    
        return view('shop-grid-sidebar-left', compact('books', 'theloais', 'tacgias'));
    }

    // Phương thức tìm kiếm sách
    public function search(Request $request)
    {
        $search = $request->input('search'); 

        // Lọc sách dựa trên từ khóa
        $books = Book::query()
            ->select('BookID', 'TenSach', 'Gia')
            ->with(['images' => function ($query) {
                $query->select('BookID', 'ImgPath');
            }])
            ->where('TenSach', 'like', '%' . $search . '%')
            ->paginate(4);

        $theloais = TheLoai::all();
        $tacgias = TacGia::all();

        return view('shop-grid-sidebar-left', compact('books', 'theloais', 'tacgias', 'search'));
    }

}