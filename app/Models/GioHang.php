<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    protected $primaryKey = 'CartID';

    protected $fillable = [
        'user_id',
        'BookID',
        'SoLuong',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }
}
