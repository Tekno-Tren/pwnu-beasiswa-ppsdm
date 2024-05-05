<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kampus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'no_pendaftaran_tes',
        'no_registrasi_pwnu',
        'status_tes',
        'status_pwnu',
        'bukti_prestasi',
        'bukti_pendaftaran_tes',
        'bukti_pendaftaran_kampus',
        'surat_rekom_pondok',
        'surat_rekom_pcnu',
        'id_kampus_prestasi',
        'id_kampus_mandiri',
        'id_kampus_ptnu',
        'id_jalur_prestasi',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id_pendaftaran', 'id');
    }

    public function kampus_prestasi(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id_kampus_prestasi');
    }

    public function kampus_mandiri(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id_kampus_mandiri');
    }

    public function kampus_PTNU(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id_kampus_ptnu');
    }

    public function jalur_prestasi(): BelongsTo
    {
        return $this->belongsTo(JalurPrestasi::class, 'id_jalur_prestasi');
    }
}
