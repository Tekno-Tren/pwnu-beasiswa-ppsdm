<?php

namespace App\Models;

use App\Models\Kampus;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';

    protected $fillable = [
        'nama',
        'kampus_id',
    ];

    public function jurusan(): HasMany
    {
        return $this->hasMany(Jurusan::class);
    }
    public function kampus(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
}
