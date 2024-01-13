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
            $table->id('id_book');
            $table->string('title', 60);
            $table->string('category', 30);
            $table->unsignedBigInteger('author_id');
            $table->string('description', 100);
            $table->decimal('price', 10, 2);
            $table->timestamps();
            
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
