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
        Schema::create('books', function (Blueprint $table) {
            $table->id('BookID');
            $table->unsignedBigInteger('TacGiaID');
            $table->string('TenSach', 200);
            $table->string('MoTa', 1000);
            $table->string('NXB', 200);
            $table->integer('SoLuong');
            $table->integer('Gia');
            $table->timestamps();
        
            // Thêm khóa ngoại tham chiếu đến cột TacGiaID của bảng tacgia
            $table->foreign('TacGiaID')->references('TacGiaID')->on('tacgia')->onDelete('cascade');
        });
                
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['TacGiaID']);
        });
        Schema::dropIfExists('books');
    }
};
