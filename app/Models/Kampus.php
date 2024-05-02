<?php

namespace App\Models;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'kampuses';
    protected $fillable = [
        'no_kode',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function fakultas() : HasMany
    {
        return $this->hasMany(Fakultas::class, 'kampus_id', 'id');
    }
    public function jurusan() : HasMany
    {
        return $this->hasMany(Jurusan::class, 'kampus_id', 'id');
    }
    public function beasiswa1() : HasMany
    {
        return $this->hasMany(Beasiswa::class, 'kampus_1', 'id');
    }
    public function beasiswa2() : HasMany
    {
        return $this->hasMany(Beasiswa::class, 'kampus_2', 'id');
    }
    public function cluster() : BelongsTo
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'id', 'cluster_id');
    }
}

