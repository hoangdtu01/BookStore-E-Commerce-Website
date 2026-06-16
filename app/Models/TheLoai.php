<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;

    protected $table = 'theloai'; // Tên bảng
    protected $primaryKey = 'TheLoaiID'; // Khóa chính của bảng
    protected $fillable = ['TenTheLoai']; // Các cột có thể thêm dữ liệu

    public function books()
    {
        return $this->belongsToMany(Book::class, 'Book_Theloai', 'TheLoaiID', 'BookID');
    }
}

