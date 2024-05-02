<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relationships\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JalurPrestasi extends Model
{
    use HasFactory;

    protected $table = 'jalur_prestasis';
    protected $fillable = [
        'nama',
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'jalur_prestasi_id', 'id');
    }
}
