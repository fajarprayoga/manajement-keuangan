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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // ForeignKey ke model User
            $table->foreignId('category_id')->constrained('category'); // ForeignKey ke model Kategori
            $table->foreignId('topic_id')->constrained('topic'); // ForeignKey ke model Topik/Toko
            $table->date('transaction_date'); // Tanggal Transaksi
            $table->decimal('amount', 10, 2); // Jumlah Transaksi (maksimal 10 digit, 2 desimal)
            $table->enum('type', ['income', 'expense']); // Jenis Transaksi (Contoh: 'pendapatan' atau 'pengeluaran')
            $table->text('description'); // Deskripsi Transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
