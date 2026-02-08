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
        Schema::create('masukan', function (Blueprint $table) {
            $table->id('id_masukan');
            $table->foreignId('id_anggota')->constrained('anggota_tani','id_anggota')->cascadeOnDelete();
            $table->foreignId('id_user')->constrained('users','id_user')->cascadeOnDelete();
            $table->foreignId('id_kategori')->constrained('kategori_masukan','id_kategori')->cascadeOnDelete();
            $table->string('body',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masukans');
    }
};
