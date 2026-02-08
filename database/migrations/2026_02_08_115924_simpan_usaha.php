<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
         Schema::create('simpan_usaha', function (Blueprint $table) {
            $table->id('id_simpan');
            $table->foreignId('id_user')->constrained('users','id_user')->cascadeOnDelete();
            $table->ForeignId('id_usaha')->constrained('usaha_anggota','id_usaha')->cascadeOnDelete();
            $table->timestamps();           

        });

    }

    public function down(): void
    {
        //
    }
};
