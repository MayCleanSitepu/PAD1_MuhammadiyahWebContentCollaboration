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
        Schema::create('HistoryEditKajian', function (Blueprint $table) {
            $table->string('id_edit')->primary();
            $table->string('id_kajian');
            $table->string('id_user');
            $table->date('tanggal_edit');
            $table->string('commit_msg');
            
            // Menambahkan foreign key ke tabel 'user'
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_kajian')->references('id_kajian')->on('kajian')->onDelete('cascade');
            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HistoryEditKajian');
    }
};
