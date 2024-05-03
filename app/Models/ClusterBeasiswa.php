<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClusterBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'cluster_beasiswa';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function jurusan(): HasMany
    {
        return $this->hasMany(Jurusan::class);
    }

    public function kampus(): HasMany
    {
        return $this->hasMany(Jurusan::class);
    }

    public function beasiswa(): HasMany
    {
        return $this->hasMany(Beasiswa::class);
    }
}
