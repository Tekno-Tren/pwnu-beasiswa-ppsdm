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
            $table->string('no_pendaftaran_pwnu')->nullable();
            $table->string('status_tes')->nullable();
            $table->string('status_pwnu')->nullable();

            $table->string('bukti_prestasi')->nullable();
            $table->string('bukti_pendaftaran_tes')->nullable();
            $table->string('bukti_pendaftaran_kampus')->nullable();
            $table->string('surat_rekom_pondok')->nullable();
            $table->string('surat_rekom_pcnu')->nullable();

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kampus_prestasi')->nullable();
            $table->unsignedBigInteger('id_kampus_mandiri')->nullable();
            $table->unsignedBigInteger('id_kampus_ptnu')->nullable();
            $table->unsignedBigInteger('id_jalur_prestasi')->nullable();
            $table->unsignedBigInteger('id_jalur_tes')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kampus_prestasi')->references('id')->on('kampus')->onDelete('set null');
            $table->foreign('id_kampus_mandiri')->references('id')->on('kampus')->onDelete('set null');
            $table->foreign('id_kampus_ptnu')->references('id')->on('kampus')->onDelete('set null');
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
