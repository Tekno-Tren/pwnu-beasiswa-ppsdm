<?php

namespace App\Models;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kampus extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kode',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function fakultas()
    {
        return $this->hasMany(Fakultas::class);
    }
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }
    public function cluster()
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'cluster_id');
    }
}

