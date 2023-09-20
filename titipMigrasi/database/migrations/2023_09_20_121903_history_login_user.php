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
        Schema::create('HistoryLoginUser', function (Blueprint $table) {
            $table->string('id_login')->primary();
            $table->string('id_user');
            $table->string('waktu_login');
            
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
        Schema::dropIfExists('HistoryLoginUser');
    }
};