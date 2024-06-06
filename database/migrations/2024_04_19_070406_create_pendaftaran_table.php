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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran_tes')->nullable();
            $table->string('no_pendaftaran_kampus')->nullable();
            $table->string('no_pendaftaran_pwnu')->nullable();
            $table->string('no_kipk')->nullable();
            $table->string('status_tes')->nullable();
            $table->string('status_pwnu')->nullable();

            $table->string('bukti_prestasi')->nullable();
            $table->string('bukti_pendaftaran_tes')->nullable();
            $table->string('bukti_pendaftaran_kampus')->nullable();
            $table->string('bukti_kipk')->nullable();
            $table->string('surat_rekom_pondok')->nullable();
            $table->string('surat_rekom_pcnu')->nullable();

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jurusan_1')->nullable();
            $table->unsignedBigInteger('id_fakultas_1')->nullable();
            $table->unsignedBigInteger('id_kampus_1')->nullable();
            $table->unsignedBigInteger('id_cluster_kampus_1')->nullable();
            $table->unsignedBigInteger('id_jurusan_2')->nullable();
            $table->unsignedBigInteger('id_fakultas_2')->nullable();
            $table->unsignedBigInteger('id_kampus_2')->nullable();
            $table->unsignedBigInteger('id_cluster_kampus_2')->nullable();
            $table->unsignedBigInteger('id_jalur_prestasi')->nullable();
            $table->string('deskripsi_prestasi')->nullable();
            $table->unsignedBigInteger('id_jalur_tes')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_jurusan_1')->references('id')->on('jurusan')->onDelete('set null');
            $table->foreign('id_fakultas_1')->references('id')->on('fakultas')->onDelete('set null');
            $table->foreign('id_kampus_1')->references('id')->on('kampus')->onDelete('set null');
            $table->foreign('id_cluster_kampus_1')->references('id')->on('cluster_kampus')->onDelete('set null');
            $table->foreign('id_jurusan_2')->references('id')->on('jurusan')->onDelete('set null');
            $table->foreign('id_fakultas_2')->references('id')->on('fakultas')->onDelete('set null');
            $table->foreign('id_kampus_2')->references('id')->on('kampus')->onDelete('set null');
            $table->foreign('id_cluster_kampus_2')->references('id')->on('cluster_kampus')->onDelete('set null');
            $table->foreign('id_jalur_prestasi')->references('id')->on('jalur_prestasi')->onDelete('set null');
            $table->foreign('id_jalur_tes')->references('id')->on('jalur_tes')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
