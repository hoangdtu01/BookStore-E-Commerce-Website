<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Comment;
use App\Models\Book;
use App\Models\GioHang;
use App\Models\Image;

class DetailBookController extends Controller
{
    //
    public function show(Request $request, $id)
    {
        // Tải thông tin sách, bao gồm hình ảnh, tác giả, và thể loại
        $book = Book::with(['images', 'tacGia', 'theloais'])->findOrFail($id);

        $cartItems = collect([]);
        $totalPriceFormatted = '0₫';
        if (auth()->check()) {
            $userId = auth()->id();

            $cartItems = GioHang::where('user_id', $userId)
                ->with(['book.images' => function ($query) {
                    $query->select('BookID', 'ImgPath');
                }])
                ->latest()
                ->take(3)
                ->get();
            
            $totalPrice = GioHang::where('user_id', $userId)
                ->with('book')
                ->get()
                ->sum(function ($item) {
                    return $item->SoLuong * $item->book->Gia;
                });
    
            $totalPriceFormatted = number_format($totalPrice, 0, ',', '.') . '₫';
        }

        // Lấy tất cả bình luận của sách này
        $comments = $book->comments()->with('user')->get();

        // Kiểm tra nếu không có bình luận
        if ($comments->isEmpty()) {
            return view('detail-book', [
                'book' => $book,
                'comments' => collect([]), 
                'total' => 0,
                'perPage' => 5,
                'currentPage' => 1,
                'totalPrice' => $totalPriceFormatted,
                'cartItems' => $cartItems
            ]);
        }

       

        $perPage = 5; // Số bình luận mỗi trang
        $currentPage = $request->input('page', 1); // Trang hiện tại
        $total = $comments->count(); // Tổng số bình luận

        $items = $comments->slice(($currentPage - 1) * $perPage, $perPage)->all();

        return view('detail-book', [
            'book' => $book,
            'comments' => $items,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $currentPage,
            'totalPrice' => $totalPriceFormatted,
            'cartItems' => $cartItems
        ]);
    }

    public function storeComment(Request $request)
    {
        if (!Auth::check()) {
            // \Log::info('User not authenticated');
            Session::flash('error', 'Bạn cần đăng nhập để thực hiện hành động này.');
            return response()->json([
                'success' => false,
                'redirect_url' => route('login'),
            ], 401);
        }

        $request->validate([
            'book_id' => 'required|exists:books,BookID',
            'content' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Tạo bình luận mới
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'BookID' => $request->book_id,
            'NoiDung' => $request->content,
            'Sao' => $request->rating,
        ]);

        $book = Book::findOrFail($request->book_id);
        $comments = $book->comments()->with('user')->get();
        $total = $comments->count();
        // \Log::info('Tong Cmt:', ['total' => $total]);

        // Trả về bình luận mới thêm dưới dạng JSON
        return response()->json([
            'success' => true,
            'total' => $total,
            'comment' => [
                'user' => Auth::user()->name,
                'content' => $comment->NoiDung,
                'rating' => $comment->Sao,
                'created_at' => $comment->created_at->format('d/m/Y H:i'),
            ],
        ]);
    }
}
