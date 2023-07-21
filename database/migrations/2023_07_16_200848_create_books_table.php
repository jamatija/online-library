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
            $table->id();
            $table->string('title');
            $table->integer('page_count');
            $table->integer('quantity_count');
            $table->integer('rented_count');
            $table->string('body');
            $table->string('year');
            $table->string('pdf');
            $table->string('ISBN');
            $table->unsignedBigInteger('letter_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('binding_id')->nullable();
            $table->unsignedBigInteger('format_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            
            $table->foreign('letter_id')->references('id')->on('letters')->onDelete('SET NULL');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('SET NULL');
            $table->foreign('binding_id')->references('id')->on('bindings')->onDelete('SET NULL');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('SET NULL');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('SET NULL');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
