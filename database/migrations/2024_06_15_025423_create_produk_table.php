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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('namaproduk');
            $table->string('foto');
            $table->string('harga');
            $table->string('descproduk');
            $table->foreignId('post_id')->constrained('post')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
