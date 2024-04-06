<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'email',
        'no_pendaftaran_tes',
        'status_tes',
        'no_registrasi_pwnu',
        'dokumen_pendukung',
        'surat_rekom_pondok',
        'surat_rekom_pcnu',
        'id_sekolah',
        'id_pondok',
        'id_jalur_beasiswa',
        'id_cluster_beasiswa',
        'id_tes',
    ];
}
