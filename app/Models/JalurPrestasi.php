<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JalurPrestasi extends Model
{
    use HasFactory;

    protected $table = 'jalur_prestasi';

    protected $fillable = [
        'nama',
        'cluster_id',
        'jurusan_id'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'jalur_prestasi_id', 'id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'cluster_id');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
