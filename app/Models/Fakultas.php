<?php

namespace App\Models;

use App\Models\Kampus;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',

        'kampus_id',
    ];

    public function jurusans()
    {
        return $this->hasMany(Jurusan::class);
    }
    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
}
