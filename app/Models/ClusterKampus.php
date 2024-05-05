<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClusterKampus extends Model
{
    use HasFactory;

    protected $table = 'cluster_kampus';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id_cluster_kampus', 'id');
    }

    public function kampus(): HasMany
    {
        return $this->hasMany(Kampus::class, 'id_kampus', 'id');
    }
}
