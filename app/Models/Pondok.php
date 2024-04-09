<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pondok extends Model
{
    use HasFactory;
    
    protected $table = 'pondoks';
    protected $fillable = [
        'nspp',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
