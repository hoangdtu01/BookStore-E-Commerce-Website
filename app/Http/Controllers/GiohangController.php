<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\GioHang;
use App\Models\Book;

class GiohangController extends Controller
{
    //
    public function addToCart(Request $request)
    {   
        // \Log::info('Request Received', $request->all());
        // \Log::info('CSRF Token:', [$request->header('X-CSRF-TOKEN')]);
        if (!Auth::check()) {
            // \Log::info('User not authenticated');
            Session::flash('error', 'Bạn cần đăng nhập để thực hiện hành động này.');
            return response()->json([
                'success' => false,
                'redirect_url' => route('login'),
            ], 401);
        }        

        $request->validate([
            'BookID' => 'required|exists:books,BookID',
            'SoLuong' => 'required|integer|min:1',
        ]);
        // \Log::info('Validation passed');
        $user = Auth::user();
        $book = Book::findOrFail($request->BookID);
        // \Log::info('Book found:', $book->toArray());
        // Trừ số lượng sách trong kho
        if ($book->SoLuong < $request->SoLuong) {
            // \Log::info('Not enough stock');
            $cartQuantity1 = GioHang::where('user_id', $user->id)->sum('SoLuong');

            $totalPrice1 = GioHang::where('user_id', $user->id)
            ->with('book')
            ->get()
            ->sum(function ($cartItem) {
                return $cartItem->SoLuong * $cartItem->book->Gia;
            });
            $totalPriceFormatted1 = number_format($totalPrice1, 0, ',', '.') . '₫';

            return response()->json([
                'success' => false,
                'message' => 'Số lượng sách trong kho không đủ.',
                'cartQuantity' => $cartQuantity1,
                'totalPrice' => $totalPriceFormatted1
            ]);
        }
        // \Log::info('Updating stock');
        $book->SoLuong -= $request->SoLuong;
        $book->save();
        
        // Thêm hoặc cập nhật sản phẩm trong giỏ hàng
        $cartItem = GioHang::where('user_id', $user->id)
        ->where('BookID', $request->BookID)
        ->first();

        if ($cartItem) {
            $cartItem->SoLuong += $request->SoLuong;
            $cartItem->save();
        } else {
            $cartItem = GioHang::create([
                'user_id' => $user->id,
                'BookID' => $request->BookID,
                'SoLuong' => $request->SoLuong,
            ]);
        }

        // Tổng số lượng sản phẩm trong giỏ hàng
        $cartQuantity = GioHang::where('user_id', $user->id)->sum('SoLuong');

        // Lấy danh sách sản phẩm mới nhất trong giỏ hàng
        $latestItems = GioHang::where('user_id', $user->id)
            ->with(['book.images' => function ($query) {
                    $query->select('BookID', 'ImgPath'); // Lấy hình ảnh của sách
                }
            ])
            ->latest()
            ->take(3)
            ->get();
        
        // Tính tổng giá trị giỏ hàng
        $totalPrice = GioHang::where('user_id', $user->id)
        ->with('book')
        ->get()
        ->sum(function ($cartItem) {
            return $cartItem->SoLuong * $cartItem->book->Gia;
        });

         // Định dạng tổng giá trị
        $totalPriceFormatted = number_format($totalPrice, 0, ',', '.') . '₫';

        // Trả về JSON
        return response()->json([
            'success' => true,
            'message' => 'Thêm vào giỏ hàng thành công!',
            'cartQuantity' => $cartQuantity,
            'totalPrice' => $totalPriceFormatted,
            'SoLuong' => $book->SoLuong,
            'cartItems' => view('layouts.sub_header', ['cartItems' => $latestItems])->render()
        ]);
    }

    public function deleteFromCart($bookId)
    {

        $user = Auth::user();
        $cartItem = GioHang::where('user_id', $user->id)
            ->where('BookID', $bookId)
            ->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Sách không tồn tại trong giỏ hàng.',
            ]);
        }

        $cartItem->SoLuong -= 1;

        if ($cartItem->SoLuong <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->save();
        }

        // Cập nhật lại số lượng sách trong kho
        $book = Book::find($bookId);
        if ($book) {
            $book->SoLuong += 1;
            $book->save();
        }

        $cartQuantity = GioHang::where('user_id', $user->id)->sum('SoLuong');

        // Lấy danh sách sản phẩm mới nhất trong giỏ hàng
        $latestItems = GioHang::where('user_id', $user->id)
            ->with(['book.images' => function ($query) {
                    $query->select('BookID', 'ImgPath'); // Lấy hình ảnh của sách
                }
            ])
            ->latest()
            ->take(3)
            ->get();

        $totalPrice = GioHang::where('user_id', $user->id)
            ->with('book')
            ->get()
            ->sum(function ($item) {
                return $item->SoLuong * $item->book->Gia;
            });

        $totalPriceFormatted = number_format($totalPrice, 0, ',', '.') . '₫';

        return response()->json([
            'success' => true,
            'cartQuantity' => $cartQuantity,
            'totalPrice' => $totalPriceFormatted,
            'BookID' => $bookId,
            'SoLuong' => $book->SoLuong,
            'cartItems' => view('layouts.sub_header', ['cartItems' => $latestItems])->render()
        ]);
    }
}
