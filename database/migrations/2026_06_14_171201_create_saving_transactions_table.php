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
        Schema::create('saving_transactions', function (Blueprint $table) {
            $table->id();

            // Target tabungan yang dimiliki
            $table->foreignId('saving_goal_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Jumlah uang yang ditabung
            $table->decimal('amount', 15, 2);

            // Tanggal menabung
            $table->date('saving_date');

            // Catatan tambahan
            $table->text('note')
                  ->nullable();

            $table->timestamps();
        }); // <- Cukup ditutup sekali di sini
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saving_transactions');
    }
};