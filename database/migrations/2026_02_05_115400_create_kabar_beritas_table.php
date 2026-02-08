<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kabar_berita', function (Blueprint $table) {
            $table->id('id_kabar_berita');
            $table->string('judul',50);
            $table->string('body_berita',255);
            $table->text('image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kabar_beritas');
    }
};
