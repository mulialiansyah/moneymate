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
    { // <- Tambahan: Kurung buka untuk method up()
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // User yang memiliki transaksi
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Kategori transaksi
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Jenis transaksi
            $table->enum('type', [
                'income',
                'expense',
            ]);

            // Nominal uang
            $table->decimal('amount', 15, 2);

            // Catatan transaksi
            $table->text('description')
                  ->nullable();

            // Tanggal transaksi
            $table->date('transaction_date');

            $table->timestamps();
        });
    } // <- Tambahan: Kurung tutup untuk method up()

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};