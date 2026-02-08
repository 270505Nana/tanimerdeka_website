<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_masukan', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('jenis',50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
