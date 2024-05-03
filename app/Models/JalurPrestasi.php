<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JalurPrestasi extends Model
{
    use HasFactory;

    protected $table = 'jalur_prestasi';

    protected $fillable = [
        'nama',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'jalur_prestasi_id', 'id');
    }
}
