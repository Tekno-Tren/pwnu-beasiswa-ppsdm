<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JalurTes extends Model
{
    use HasFactory;

    protected $table = 'jalur_tes';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'id_jalur_tes', 'id');
    }
}
