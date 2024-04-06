<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'jalur_beasiswa';

    protected $fillable = [
        'nama',
        'id_cluster_beasiswa',
        'id_jurusan',
    ];
}
