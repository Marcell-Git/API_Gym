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
        Schema::create('data_pemesanans', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("namaPengguna");
            $table->string("namaKelas");
            $table->string("namaTrainer");
            $table->string("namaAlat");
            $table->string("jadwalKelas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemesanans');
    }
};
