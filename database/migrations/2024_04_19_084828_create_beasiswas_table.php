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
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi');
            // $table->string('jalur_prestasi');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('cluster_id')->nullable();
            $table->foreign('cluster_id')->references('id')->on('cluster_beasiswas')->onDelete('cascade');

            $table->unsignedBigInteger('kampus_id')->nullable();
            $table->foreign('kampus_id')->references('id')->on('kampuses')->onDelete('cascade');

            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswas');
    }
};
