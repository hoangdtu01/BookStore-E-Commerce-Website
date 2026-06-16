<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    //
    use HasFactory;

    protected $table = 'tacgia'; // Tên bảng
    protected $primaryKey = 'TacGiaID'; // Khóa chính của bảng
    protected $fillable = ['TenTacGia'];

    public function books()
    {
        return $this->hasMany(Book::class, 'TacGiaID');
    }

}
