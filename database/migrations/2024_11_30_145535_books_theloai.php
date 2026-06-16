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
        Schema::create('Book_Theloai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('BookID');
            $table->unsignedBigInteger('TheLoaiID');
            $table->timestamps();

            $table->foreign('BookID')->references('BookID')->on('books')->onDelete('cascade');
            $table->foreign('TheLoaiID')->references('TheLoaiID')->on('theloai')->onDelete('cascade'); // Tham chiếu đúng cột id
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('Book_Theloai', function (Blueprint $table) {
            $table->dropForeign(['BookID']);
            $table->dropForeign(['TheLoaiID']);
        });
        Schema::dropIfExists('Book_Theloai');
    }
};
