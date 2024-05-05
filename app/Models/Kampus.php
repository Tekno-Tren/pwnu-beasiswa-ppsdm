<?php

namespace App\Models;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'kampus';

    protected $fillable = [
        'no_kode',
        'nama',
        'id_cluster_kampus',
    ];

    public function fakultas(): HasMany
    {
        return $this->hasMany(Fakultas::class, 'id_kampus', 'id');
    }

    public function cluster_kampus(): BelongsTo
    {
        return $this->belongsTo(ClusterKampus::class, 'id_cluster_kampus', 'id');
    }
}
