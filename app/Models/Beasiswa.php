<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_registrasi',

        'user_id',
        'cluster_id',
        'kampus_id',
        'jurusan_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cluster()
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'cluster_id');
    }
    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
