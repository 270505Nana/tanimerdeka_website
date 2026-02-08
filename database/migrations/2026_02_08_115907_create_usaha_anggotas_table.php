<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usaha_anggota', function (Blueprint $table) {
            $table->id('id_usaha');
            $table->foreignId('id_anggota')->constrained('anggota_tani','id_anggota');
            $table->string('nama_produk', 50);
            $table->foreignId('id_jenis_usaha')->constrained('jenis_usaha','id_jenis_usaha');
            $table->decimal('luas_lahan', 10, 2);
            
            $table->foreignId('indonesia_village_id')
                ->nullable()
                ->constrained('indonesia_villages')
                ->onUpdate('cascade')
                ->onDelete('restrict');    
            $table->text('alamat_detail',50)->nullable();
            
            $table->date('tanggal_tanam')->nullable();
            $table->date('tanggal_panen')->nullable();

            // Potensi Panen Per Pohon
            $table->decimal('potensi_panen_pohon', 10, 2)->nullable();
            $table->string('satuan_panen_pohon', 20)->nullable(); // Dropdown: kg, gr, ons
            
            $table->integer('jumlah_pohon')->default(0)->nullable();

            // Potensi Panen (Total)
            $table->decimal('potensi_panen', 15, 2)->nullable(); 
            $table->string('satuan_panen', 20)->nullable(); // Dropdown: ton, kwintal, kg
            $table->string('durasi_panen', 50)->nullable(); //3 bulan, 2 minggu, dst
            $table->string('potensi_produksi', 50)->nullable(); 

            $table->decimal('bobot_hewan', 10, 2)->nullable();
            $table->string('satuan_bobot', 10)->nullable();
            $table->integer('jumlah_hewan')->nullable();
            $table->integer('umur_hewan')->nullable();
            
            $table->decimal('harga', 15, 2);
            $table->text('image')->nullable(); 
            $table->text('deskripsi')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usaha_anggotas');
    }
};
