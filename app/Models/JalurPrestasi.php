<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JalurPrestasi extends Model
{
    use HasFactory;

    protected $table = 'jalur_prestasis';
    protected $fillable = [
        'nama',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
