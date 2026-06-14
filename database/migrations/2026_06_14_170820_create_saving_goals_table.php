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
        Schema::create('saving_goals', function (Blueprint $table) {
            $table->id();

            // Pemilik target tabungan
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Nama target tabungan
            $table->string('title');

            // Jumlah uang yang ingin dicapai
            $table->decimal('target_amount', 15, 2);

            // Batas waktu mencapai target
            $table->date('deadline')->nullable();

            // Status target tabungan
            $table->enum('status', [
                'progress',
                'completed',
            ])->default('progress');

            $table->timestamps();
        });
    } // <- Tambahan: Kurung tutup untuk method up() ada di sini

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saving_goals');
    }
};