<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'jalur_prestasi_id',
        'tes_tulis',
        'tes_praktek',
    ];

    public function prestasi_1(): BelongsTo
    {
        return $this->belongsTo(JalurPrestasi::class, 'jalur_prestasi_1', 'jalur_prestasi_id');
    }

    public function prestasi_2(): BelongsTo
    {
        return $this->belongsTo(JalurPrestasi::class, 'jalur_prestasi_2', 'jalur_prestasi_id');
    }
}
