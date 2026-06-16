<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\GioHang;
use App\Models\Book;
use App\Models\User;
use App\Models\DonHang;
use App\Models\DetailDH;

class checkoutController extends Controller
{
    //
    public function showDH(Request $request)
    {
        $user = Auth::user();

        // Lấy danh sách sản phẩm trong giỏ hàng của người dùng
        $cartItems1 = GioHang::where('user_id', $user->id)
            ->with('book') 
            ->get();

        // Tính tổng giá trị sách và tổng giá trị từng cuốn
        $cartItems1->map(function ($item) {
            $item->totalPrice = $item->SoLuong * $item->book->Gia;
            return $item;
        });

        //Của quick cart
        $cartItems = GioHang::where('user_id', $user->id)
            ->with(['book.images' => function ($query) {
                $query->select('BookID', 'ImgPath');
            }])
            ->latest()
            ->take(3)
            ->get();

        // Tổng giá trị giỏ hàng
        $totalPrice = $cartItems1->sum('totalPrice');

        // Tiền ship cố định
        $shippingFee = 30000;

        return view('checkout', [
            'user' => $user,
            'cartItems1' => $cartItems1,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'shippingFee' => $shippingFee,
            'finalTotal' => $totalPrice + $shippingFee,
        ]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            $user = Auth::user();
            \Log::info('Bắt đầu lưu hóa đơn', ['user_id' => $user->id]);

            // Tạo hóa đơn (DonHang)
            $order = DonHang::create([
                'user_id' => $user->id,
                'NgayMua' => today(),
                'TrangThai' => 0, // Trạng thái chưa duyệt đơn hàng
            ]);
            \Log::info('Hóa đơn đã được tạo', ['OrderID' => $order->OrderID]);

            // Lưu chi tiết hóa đơn (DetailDH)
            foreach ($request->input('books', []) as $bookId => $details) {
                \Log::info('Thêm sản phẩm vào chi tiết hóa đơn', ['BookID' => $bookId, 'details' => $details]);

                DetailDH::create([
                    'OrderID' => $order->OrderID,
                    'BookID' => $bookId,
                    'Gia' => $details['price'],
                    'SoLuong' => $details['quantity'],
                ]);
            }

            // Xóa sản phẩm khỏi giỏ hàng
            GioHang::where('user_id', $user->id)->delete();
            \Log::info('Giỏ hàng đã được xóa', ['user_id' => $user->id]);
            DB::commit();

            return redirect()->back()->with('success', 'Đơn hàng đã được đặt thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Lỗi khi lưu hóa đơn', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.');
        }
    }
}
