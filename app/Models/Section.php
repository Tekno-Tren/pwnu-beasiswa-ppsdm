<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'thumbnail',
        'content',
        'post_as',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($section) {
            if ($section->isDirty('thumbnail') && $section->getOriginal('thumbnail')) {
                Storage::disk('public')->delete($section->getOriginal('thumbnail'));
            }
        });
    }
}
