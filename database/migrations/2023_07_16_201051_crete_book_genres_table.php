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
        Schema::create('book_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('SET NULL');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genres');
        
    }
};
