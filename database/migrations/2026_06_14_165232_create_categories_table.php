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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('name');

            $table->enum('type', [
                'income',
                'expense'
            ]);

            $table->timestamps();
        });
    } // <- Tambahan: Penutup method up()

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    } // <- Tambahan: Method down() untuk rollback
}; // <- Tambahan: Penutup anonymous class dan titik koma