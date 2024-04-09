<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolahs';
    protected $fillable = [
        'npsn',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
