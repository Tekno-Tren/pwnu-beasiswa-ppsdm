<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Pondok;
use App\Models\Sekolah;
use App\Models\JalurPrestasi;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'no_hp_secondary',

        'jalur_prestasi_id',
        'sekolah_id',
        'pondok_id',
        'cluster_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->email === 'admin@example.com';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->isAdmin();
        }

        return true;
    }

    public function jalurprestasi(): HasMany
    {
        return $this->hasMany(JalurPrestasi::class, 'id', 'jalur_prestasi_id');
    }

    public function pondok(): BelongsTo
    {
        return $this->belongsTo(Pondok::class, 'id', 'pondok_id');
    }

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'id', 'sekolah_id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(ClusterBeasiswa::class, 'id', 'cluster_id');
    }
}
