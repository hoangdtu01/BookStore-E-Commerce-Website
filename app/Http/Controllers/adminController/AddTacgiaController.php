<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TacGia;

class AddTacgiaController extends Controller
{
    //
    public function index()
    {
        $tacgias = TacGia::all();

        return view('admin.add_tacgia', compact('tacgias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'txtnewauthor' => 'required|max:200|unique:tacgia,TenTacGia',
        ]);

        TacGia::create([
            'TenTacGia' => $request->txtnewauthor,
        ]);

        return redirect()->back()->with('success', 'Tác giả mới đã được thêm!');
    }

    public function destroy($id)
    {
        $tacgia = TacGia::find($id);

        if (!$tacgia) {
            return redirect()->route('tacgia.add')->with('error', 'Tác giả không tồn tại.');
        }

        // Xóa tác giả
        $tacgia->delete();

        return redirect()->route('tacgia.add')->with('success', 'Tác giả đã được xóa thành công.');
    }

}
