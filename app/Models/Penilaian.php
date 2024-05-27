<?php

namespace App\Models;

use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'id_pendaftaran',
        'nilai_tes_tulis',
        'nilai_tes_praktek',
    ];

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }

}
