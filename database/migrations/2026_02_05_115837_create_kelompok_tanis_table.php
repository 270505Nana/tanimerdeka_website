<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelompok_tani', function (Blueprint $table) {
            $table->id('id_kelompok_tani');
            $table->string('nama_kelompok',50);
            $table->string('nomor_sk',250);
            
            $table->foreignId('indonesia_village_id')
                ->nullable()
                ->constrained('indonesia_villages') 
                ->onUpdate('cascade')
                ->onDelete('restrict');   
            $table->text('alamat_detail')->nullable();

            $table->text('sk',250);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelompok_tanis');
    }
};
