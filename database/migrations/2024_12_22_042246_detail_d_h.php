<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('detailDH', function (Blueprint $table) {
            $table->id('ItemID'); // Khóa chính
            $table->unsignedBigInteger('OrderID'); // Khóa ngoại tới bảng DonHang
            $table->unsignedBigInteger('BookID');
            $table->integer('Gia'); 
            $table->integer('SoLuong'); 
            $table->timestamps();

            // Định nghĩa khóa ngoại
            $table->foreign('OrderID')->references('OrderID')->on('donhang')->onDelete('cascade');
            $table->foreign('BookID')->references('BookID')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('detailDH', function (Blueprint $table) {
            $table->dropForeign(['OrderID']);
        });
        Schema::dropIfExists('detaildh');
    }
};
