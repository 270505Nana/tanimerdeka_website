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
        Schema::create('jenis_usaha', function (Blueprint $table) {
            $table->id('id_jenis_usaha');
            $table->foreignId('id_bidang')
                ->constrained('bidang_usaha','id_bidang')
                ->cascadeOnDelete();
            $table->string('nama_jenis_usaha',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_usahas');
    }
};
