<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_lengkap'); 
            $table->bigInteger('nik')->unique();
            $table->string('jenis_kelamin', 15);
            $table->string('email')->unique(); 
            $table->string('no_hp'); 

            $table->foreignId('indonesia_village_id')
                ->nullable()
                ->constrained('indonesia_villages')
                ->onUpdate('cascade')
                ->onDelete('restrict');  
            $table->text('alamat_detail')->nullable();
            
            $table->string('password');
            $table->string('role')->default('user');
            $table->timestamps();           

        });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->primary();
        //     $table->foreignId('user_id')->nullable()->index();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('user_agent')->nullable();
        //     $table->longText('payload');
        //     $table->integer('last_activity')->index();
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
