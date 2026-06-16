<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\GioHang;
use App\Models\Image;

class DetailCartController extends Controller
{
    //
    public function showCart(Request $request)
    {  

        $user = Auth::user();
        
        // Lấy danh sách cho quick cart
        $latestItems = GioHang::where('user_id', $user->id)
            ->with(['book.images' => function ($query) {
                    $query->select('BookID', 'ImgPath'); // Lấy hình ảnh của sách
                }
            ])
            ->latest()
            ->take(3)
            ->get();

        // Lấy tất cả sách trong giỏ hàng của người dùng
        $detailItems = GioHang::where('user_id', $user->id)
        ->with(['book.images' => function ($query) {
                $query->select('BookID', 'ImgPath'); // Lấy hình ảnh của sách
            }
        ])
        ->latest()
        ->get();
        
        // Tính tổng giá trị giỏ hàng
        $totalPrice = GioHang::where('user_id', $user->id)
        ->with('book')
        ->get()
        ->sum(function ($cartItem) {
            return $cartItem->SoLuong * $cartItem->book->Gia;
        });
        
        $totalPricehaveShip = $totalPrice + 30000;
         // Định dạng tổng giá trị
        $totalPriceFormatted1 = number_format($totalPrice, 0, ',', '.') . '₫';
        $totalPriceFormatted2 = number_format($totalPricehaveShip, 0, ',', '.') . '₫';
        return view('cart', [
            'totalPrice' => $totalPriceFormatted1,
            'totalPricehaveShip' => $totalPriceFormatted2,
            'detailItems' => $detailItems,
            'cartItems' => $latestItems
        ]);
    }
    public function RemoveItem($bookId)
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

        // Cập nhật lại số lượng sách trong kho
        $book = Book::find($bookId);
        if ($book) {
            $book->SoLuong += $cartItem->SoLuong;
            $book->save();
        }

        // Xóa sách khỏi giỏ hàng
        $cartItem->delete();

        // Tính toán lại tổng số lượng
        $cartQuantity = GioHang::where('user_id', $user->id)->sum('SoLuong');

        // Tính tổng giá trị giỏ hàng
        $totalPrice = GioHang::where('user_id', $user->id)
        ->with('book')
        ->get()
        ->sum(function ($cartItem) {
            return $cartItem->SoLuong * $cartItem->book->Gia;
        });
        
        $totalPricehaveShip = $totalPrice + 30000;

        // Định dạng tổng giá trị
        $totalPriceFormatted1 = number_format($totalPrice, 0, ',', '.') . '₫';
        $totalPriceFormatted2 = number_format($totalPricehaveShip, 0, ',', '.') . '₫';

        // Lấy danh sách cho quick cart
        $latestItems = GioHang::where('user_id', $user->id)
            ->with(['book.images' => function ($query) {
                    $query->select('BookID', 'ImgPath'); // Lấy hình ảnh của sách
                }
            ])
            ->latest()
            ->take(3)
            ->get();

        // Lấy tất cả sách trong giỏ hàng của người dùng
        $detailItems = GioHang::where('user_id', $user->id)
        ->with(['book.images' => function ($query) {
                $query->select('BookID', 'ImgPath'); // Lấy hình ảnh của sách
            }
        ])
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Sách đã được xóa khỏi giỏ hàng.',
            'cartQuantity' => $cartQuantity,
            'totalPrice' => $totalPriceFormatted1,
            'totalPricehaveShip' => $totalPriceFormatted2,
            'cartItems' => view('layouts.sub_header', ['cartItems' => $latestItems])->render(),
            'detailItems' =>  view('sub_cart', ['detailItems' => $detailItems])->render()
        ]);
    }

    public function updateCart(Request $request)
    {
        
        $user = Auth::user();

        // Lấy dữ liệu số lượng từ form
        $quantities = $request->input('quantities', []);
        $bookIds = $request->input('book_ids', []);

        // Duyệt qua từng sách và cập nhật số lượng
        foreach ($bookIds as $bookId) {
            $quantity = isset($quantities[$bookId]) ? intval($quantities[$bookId]) : 0;

            GioHang::where('user_id', $user->id)
                ->where('BookID', $bookId)
                ->update(['SoLuong' => $quantity]);
            
            $book = Book::find($bookId);
            if ($book) {
                $book->SoLuong -= $quantity;
                $book->save();
            }
        }

        return redirect()->route('showCart')->with('success', 'Giỏ hàng đã được cập nhật.');
    }   
}
