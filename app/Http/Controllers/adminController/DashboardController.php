<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\User;
use App\Models\Book;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalOrders = DonHang::count();

        $totalUsers = User::count();

        $totalBooks = Book::sum('SoLuong');

        $totalRevenue = DonHang::where('TrangThai', '>=', 2) // Đã Hoàn thành
            ->with('details')
            ->get()
            ->flatMap(function ($order) {
                return $order->details;
            })
            ->sum(function ($detail) {
                return $detail->Gia * $detail->SoLuong;
            });

        return view('admin.dashboard', compact('totalOrders', 'totalUsers', 'totalBooks', 'totalRevenue'));
    }
}
