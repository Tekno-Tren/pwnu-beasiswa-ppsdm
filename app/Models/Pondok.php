<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pondok extends Model
{
    use HasFactory;

    protected $table = 'pondok';

    protected $fillable = [
        'nspp',
        'nama',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'no_hp',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_pondok', 'id');
    }
}
