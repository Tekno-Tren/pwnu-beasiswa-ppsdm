<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kampus;
use App\Models\Jurusan;
use App\Models\ClusterBeasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswa';

    protected $fillable = [
        'user_id',
        'cluster_id',
        'no_registrasi_1',
        'no_registrasi_2',
        'kampus_1',
        'jurusan_1',
        'kampus_2',
        'jurusan_2',
        "berkas_1",
        "berkas_2",
        "verified_kampus_reg",
        "verified_test_reg",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'cluster_id');
    }

    public function kampus_1(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id', 'kampus_1');
    }

    public function jurusan_1(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id', 'jurusan_1');
    }

    public function kampus_2(): BelongsTo
    {
        return $this->belongsTo(Kampus::class, 'id', 'kampus_2');
    }

    public function jurusan_2(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id', 'jurusan_2');
    }
}
