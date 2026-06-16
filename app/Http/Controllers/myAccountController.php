<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\DonHang;
use App\Models\DetailDH;
use App\Models\GioHang;

class myAccountController extends Controller
{
    //
    public function index()
    {

        $user = Auth::user();

        // Lấy danh sách đơn hàng của người dùng
        $orders = DonHang::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('my-account', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    public function orderDetails($id)
    {
        $user = Auth::user();
        // Lấy danh sách sản phẩm trong đơn hàng của người dùng
        $cartItems1 = DetailDH::where('OrderID', $id)
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

        return view('detail-order', [
            'user' => $user,
            'cartItems1' => $cartItems1,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'shippingFee' => $shippingFee,
            'finalTotal' => $totalPrice + $shippingFee,
        ]);
    }

    public function updateUser(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->route('my-account')
                ->withErrors($validator)
                ->withInput();
        }

        // Cập nhật thông tin người dùng
        $user->DiaChi = $request->input('address');
        $user->DienThoai = $request->input('phone');
        $user->save();

        return redirect()->route('my-account');
    }

}
