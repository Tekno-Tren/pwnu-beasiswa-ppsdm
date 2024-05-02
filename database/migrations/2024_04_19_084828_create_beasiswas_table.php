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
            $table->string('no_registrasi_1');
            $table->foreign('no_registrasi_1')->references('no_registrasi')->on('penilaian')->onDelete('cascade');

            $table->string('no_registrasi_2');
            $table->foreign('no_registrasi_2')->references('no_registrasi')->on('penilaian')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('cluster_id')->nullable();
            $table->foreign('cluster_id')->references('id')->on('cluster_beasiswas')->onDelete('cascade');

            $table->unsignedBigInteger('kampus_1')->nullable();
            $table->foreign('kampus_1')->references('id')->on('kampuses')->onDelete('cascade');

            $table->unsignedBigInteger('kampus_2')->nullable();
            $table->foreign('kampus_2')->references('id')->on('kampuses')->onDelete('cascade');

            $table->unsignedBigInteger('jurusan_1')->nullable();
            $table->foreign('jurusan_1')->references('id')->on('jurusans')->onDelete('cascade');

            $table->unsignedBigInteger('jurusan_2')->nullable();
            $table->foreign('jurusan_2')->references('id')->on('jurusans')->onDelete('cascade');

            $table->string('berkas_1')->nullable();
            $table->string('berkas_2')->nullable();

            $table->boolean('verified_kampus_reg')->default(false);
            $table->boolean('verified_test_reg')->default(false);

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
