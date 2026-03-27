<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('anggota_tani', function (Blueprint $table) {
        $table->id('id_anggota');
        $table->string('nama_lengkap'); 
        $table->bigInteger('nik')->unique();
        $table->string('jenis_kelamin', 15);
        $table->string('email')->unique()->nullable(); 
        $table->string('no_hp'); 

        $table->foreignId('indonesia_village_id')
            ->nullable()
            ->constrained('indonesia_villages')
            ->onUpdate('cascade')
            ->onDelete('restrict');    
        
        $table->text('alamat_detail',50)->nullable();
        
        $table->foreignId('id_kelompok_tani')
              ->constrained('kelompok_tani', 'id_kelompok_tani')-> nullable(); 
        $table->string('jabatan', 50)->nullable(); //bisa kosong ketika daftar mandiri
        $table->string('password');
        $table->string('role')->default('anggota');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('anggota_tani');
    }
};
