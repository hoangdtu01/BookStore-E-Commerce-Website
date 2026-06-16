<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'BookID';
    protected $fillable = [
        'TacGiaID',   
        'TenSach',
        'MoTa',
        'NXB',
        'SoLuong',
        'Gia',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'BookID');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'BookID');
    }

    public function theloais()
    {
        return $this->belongsToMany(TheLoai::class, 'Book_Theloai', 'BookID', 'TheLoaiID');
    }

    public function tacGia()
    {
        return $this->belongsTo(TacGia::class, 'TacGiaID');
    }
}

