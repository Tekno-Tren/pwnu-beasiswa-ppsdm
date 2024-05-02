<?php

namespace App\Models;

use App\Models\Fakultas;
use App\Models\ClusterBeasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relationships\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',

        'fakultas_id',
        'cluster_id'
    ];

    public function kampus() : BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'kampus_id', 'id');
    }

    public function fakultas() : BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    public function cluster() : BelongsTo
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'cluster_id', 'id');
    }

    public function beasiswa1() : HasMany
    {
        return $this->hasMany(Beasiswa::class, 'jurusan_1', 'id');
    }

    public function beasiswa2() : HasMany
    {
        return $this->hasMany(Beasiswa::class, 'jurusan_2', 'id');
    }
}

