<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->id('id_tentang_kami');
            $table->foreignId('id_organisasi')->constrained('struktur_organisasi','id_organisasi')->cascadeOnDelete();
            $table->string('deskripsi_program',255);
            $table->string('visi',50);
            $table->string('misi',50);
            $table->text('image',50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tentang_kamis');
    }
};
