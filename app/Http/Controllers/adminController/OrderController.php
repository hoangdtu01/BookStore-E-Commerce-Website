<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\DetailDH;


class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = DonHang::with('user')->orderBy('NgayMua', 'desc')->get();

        return view('admin.Order', compact('orders'));
    }

    public function show($id)
    {
        $order = DonHang::with(['user', 'details.book'])->findOrFail($id);

        // Tính tổng số tiền phải thanh toán
        $totalAmount = $order->details->sum(function ($detail) {
            return $detail->Gia * $detail->SoLuong;
        });

        return view('admin.order_details', compact('order', 'totalAmount'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = DonHang::findOrFail($id);

        $currentStatus = $request->input('TrangThai');

        if ($currentStatus == 0) { // Chưa duyệt -> Đã duyệt
            $order->TrangThai = 1;
        } elseif ($currentStatus == 1) { // Đã duyệt -> Hoàn thành
            $order->TrangThai = 2;
        } elseif ($currentStatus == 2) { // Hoàn thành -> Chưa duyệt 
            $order->TrangThai = 0;
        }

        $order->save();

        return redirect()->route('orders.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }

    public function destroy($id)
    {
        $order = DonHang::with('details')->findOrFail($id);

        // Duyệt qua từng mục chi tiết đơn hàng và cập nhật số lượng sách
        foreach ($order->details as $detail) {
            $book = $detail->book; 
            if ($book) {
                $book->SoLuong += $detail->SoLuong; 
                $book->save(); 
            }
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa và số lượng sách đã được cập nhật.');
    }



}
