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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('no_pendaftaran_tes');
            $table->string('status_tes');
            $table->string('no_registrasi_pwnu');
            $table->string('dokumen_pendukung');
            $table->string('surat_rekom_pondok');
            $table->string('surat_rekom_pcnu');
            $table->foreignId('id_sekolah')->constrained('sekolah');
            $table->foreignId('id_pondok')->constrained('pondok');
            $table->foreignId('id_jalur_beasiswa')->constrained('jalur_beasiswa');
            $table->foreignId('id_cluster_beasiswa')->constrained('cluster_beasiswa');
            $table->foreignId('id_tes')->constrained('tes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
