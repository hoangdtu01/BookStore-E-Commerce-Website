<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDH extends Model
{
    use HasFactory;

    protected $table = 'detailDH';
    protected $primaryKey = 'ItemID';

    protected $fillable = [
        'OrderID',
        'BookID',
        'Gia',
        'SoLuong',
    ];

    public function order()
    {
        return $this->belongsTo(DonHang::class, 'OrderID');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }

}

