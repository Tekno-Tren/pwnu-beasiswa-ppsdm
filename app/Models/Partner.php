<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'link',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($partner) {
            if ($partner->isDirty('thumbnail') && $partner->getOriginal('thumbnail')) {
                Storage::disk('public')->delete($partner->getOriginal('thumbnail'));
            }
        });
    }
}
