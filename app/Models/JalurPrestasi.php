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
        'deskripsi',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_jalur_prestasi', 'id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(ClusterKampus::class, 'id_cluster_kampus');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
