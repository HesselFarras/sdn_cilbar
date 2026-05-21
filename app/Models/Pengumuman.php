<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumans';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'category',       // Penting | Akademik | Acara | Libur
        'is_important',   // boolean
        'is_published',   // boolean
        'published_at',
    ];

    protected $casts = [
        'is_important' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
