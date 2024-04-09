<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClusterBeasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function jurusans()
    {
        return $this->hasMany(Jurusan::class);
    }

}
