<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;

class AddTheloaiController extends Controller
{
    //
    public function index()
    {
        $theloais = TheLoai::all();

        return view('admin.add_theLoai', compact('theloais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'txtnewcategory' => 'required|max:200|unique:theloai,TenTheLoai',
        ]);

        TheLoai::create([
            'TenTheLoai' => $request->txtnewcategory,
        ]);

        return redirect()->back()->with('success', 'Thể loại mới đã được thêm!');
    }

    public function destroy($id)
    {
        $theloai = TheLoai::find($id);

        if (!$theloai) {
            return redirect()->route('theloai.add')->with('error', 'Thể loại không tồn tại.');
        }

        // Xóa thể loại
        $theloai->delete();

        return redirect()->route('theloai.add')->with('success', 'Thể loại đã được xóa thành công.');
    }

}
