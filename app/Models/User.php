<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Pondok;
use App\Models\Sekolah;
use App\Models\JalurPrestasi;
use App\Models\ClusterBeasiswa;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
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

        'jalur_prestasi_id',
        'sekolah_id',
        'pondok_id',
        'cluster_id'
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

    public function jalurprestasi()
    {
        return $this->belongsTo(JalurPrestasi::class);
    }
    public function pondok()
    {
        return $this->belongsTo(Pondok::class);
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
    public function cluster()
    {
        return $this->belongsTo(ClusterBeasiswa::class);
    }
    public function beasiswa()
    {
        return $this->hasOne(Beasiswa::class);
    }
}
