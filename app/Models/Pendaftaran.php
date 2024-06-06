<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'no_pendaftaran_tes',
        'no_pendaftaran_kampus',
        'no_pendaftaran_pwnu',
        'status_tes',
        'status_pwnu',
        'bukti_prestasi',
        'bukti_pendaftaran_tes',
        'bukti_pendaftaran_kampus',
        'surat_rekom_pondok',
        'surat_rekom_pcnu',
        'id_user',
        'id_jurusan_1',
        'id_fakultas_1',
        'id_kampus_1',
        'id_cluster_kampus_1',
        'id_jurusan_2',
        'id_fakultas_2',
        'id_kampus_2',
        'id_cluster_kampus_2',
        'id_jalur_prestasi',
        'deskripsi_prestasi',
        'id_jalur_tes',
        'no_kipk',
        'bukti_kipk',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function jurusan1(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan_1');
    }

    public function fakultas1(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas_1');
    }

    public function kampus1(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id_kampus_1');
    }

    public function jurusan2(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan_2');
    }

    public function fakultas2(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas_2');
    }

    public function kampus2(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id_kampus_2');
    }

    public function jalur_prestasi(): BelongsTo
    {
        return $this->belongsTo(JalurPrestasi::class, 'id_jalur_prestasi');
    }

    public function jalur_tes(): BelongsTo
    {
        return $this->belongsTo(JalurTes::class, 'id_jalur_tes');
    }
}
