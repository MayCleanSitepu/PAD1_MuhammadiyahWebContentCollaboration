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
        Schema::create('kajian', function (Blueprint $table) {
            $table->string('id_kajian')->primary();
            $table->string('id_user');
            $table->string('id_file_kajian');
            $table->string('judul_kajian');
            $table->string('file_kajian');
            $table->string('deskripsi_kajian');
            $table->date('tanggal_postingan');
            $table->string('lokasi_kajian');
            $table->string('keyword_kajian');
            
            // Menambahkan foreign key ke tabel 'user'
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kajian');
    }
};
