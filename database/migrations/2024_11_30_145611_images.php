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
        Schema::create('images', function (Blueprint $table) {
            $table->id('ImgID');
            $table->unsignedBigInteger('BookID');
            $table->string('ImgPath', 200);
            $table->timestamps();

            // Tham chiếu đúng cột trong bảng users và books
            $table->foreign('BookID')->references('BookID')->on('books')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['BookID']);
        });
        Schema::dropIfExists('images');
    }
};
