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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("namaPengguna");
            $table->string("nomorIdentitas");
            $table->string("jenisKelamin");
            $table->string("email");
            $table->string("umur");
            $table->string("kataSandi");
            $table->string("nomorTelepon");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
