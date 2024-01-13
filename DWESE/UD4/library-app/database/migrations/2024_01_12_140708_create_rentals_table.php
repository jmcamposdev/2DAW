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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id('rental_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->date('loan_date');
            $table->date('return_date')->nullable();
            
            $table->foreign('book_id')->references('id_book')->on('books')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('CASCADE');
            
            $table->index('book_id');
            $table->index('user_id');
            $table->index('loan_date');
            
            $table->unique(['book_id', 'user_id', 'loan_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
