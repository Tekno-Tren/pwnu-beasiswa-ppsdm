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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi')->unique();
            $table->foreign('no_registrasi')->references('no_registrasi_1')->on('beasiswaa')->onDelete('cascade');
            $table->foreign('no_registrasi')->references('no_registrasi_2')->on('beasiswaa')->onDelete('cascade');

            $table->int('tes_tulis')->nullable();
            $table->int('tes_praktek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
