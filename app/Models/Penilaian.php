<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaians';

    protected $fillable = [
        'jalur_prestasi_id',
        'tes_tulis',
        'tes_praktek',
    ];

    public function prestasi1() : BelongsTo
    {
        return $this->belongsTo(JalurPrestasi::class, 'jalur_prestasi_1', 'jalur_prestasi_id');
    }

    public function prestasi2() : BelongsTo
    {
        return $this->belongsTo(JalurPrestasi::class, 'jalur_prestasi_2', 'jalur_prestasi_id');
    }
}
