<?php

namespace App\Models;

use App\Models\Fakultas;
use App\Models\ClusterBeasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',

        'fakultas_id',
        'cluster_id'
    ];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
    public function cluster()
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'cluster_id');
    }
    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }
}

