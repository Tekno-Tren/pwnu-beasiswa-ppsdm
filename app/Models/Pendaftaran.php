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
        'id_jurusan',
        'id_fakultas',
        'id_kampus',
        'id_jalur_prestasi',
        'id_jalur_tes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }

    public function kampus(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id_kampus');
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
