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
        Schema::create('topic', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address', 255); // Sesuaikan panjang maksimum sesuai kebutuhan
            $table->string('contact', 255); // Sesuaikan panjang maksimum sesuai kebutuhan
            $table->text('image')->nullable(); // Perbaiki pengejaan 'nullable()'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
