<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('follower', function (Blueprint $table) {
            $table->id('id_follow');

            $table->unsignedBigInteger('follow_from');//si usernya
            $table->unsignedBigInteger('follow_to');//si anggota tani nya
            $table->timestamps();

            $table->foreign('follow_from')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('follow_to')
                ->references('id_anggota')
                ->on('anggota_tani')
                ->onDelete('cascade');

            $table->unique(['follow_from', 'follow_to']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follower');
    }
};
