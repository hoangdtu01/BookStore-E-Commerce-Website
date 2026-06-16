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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('CmtID');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('BookID');
            $table->text('NoiDung');
            $table->integer('Sao');
            $table->timestamps();

            // Tham chiếu đúng cột trong bảng users và books
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('BookID')->references('BookID')->on('books')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['BookID']);
        });
        Schema::dropIfExists('comments');
    }
};
