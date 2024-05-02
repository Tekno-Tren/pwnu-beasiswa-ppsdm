<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClusterBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'cluster_beasiswas';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function jurusans() : HasMany
    {
        return $this->hasMany(Jurusan::class);
    }

    public function kampuses() : HasMany
    {
        return $this->hasMany(Jurusan::class);
    }

    public function beasiswas() : HasMany
    {
        return $this->hasMany(Beasiswa::class);
    }

}
