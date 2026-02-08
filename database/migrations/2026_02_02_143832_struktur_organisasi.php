<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
         Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id('id_organisasi');
            $table->string('nama_lengkap',50);
            $table->string('jabatan',50);
            $table->text('image',50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
