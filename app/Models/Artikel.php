<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',       // ringkasan singkat (preview card)
        'body',          // konten lengkap (rich text)
        'thumbnail',     // path storage image
        'kategori',      // ekstrakurikuler | prestasi | dokumentasi
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->orderByDesc('published_at');
    }

    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}
