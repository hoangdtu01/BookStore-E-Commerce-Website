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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('user_id');
            $table->date('NgayMua');
            $table->integer('TrangThai');
            $table->timestamps();

            // Tham chiếu đúng cột trong bảng users
            $table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('donhang', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('donhang');
    }
};
