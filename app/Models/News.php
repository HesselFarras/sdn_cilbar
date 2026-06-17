<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Kunci nama tabel secara eksplisit agar Eloquent tidak bingung
    protected $table = 'news';

    // Daftarkan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'published_at'
    ];

    // Nonaktifkan timestamps jika di tabel Supabase Anda hanya memakai created_at manual
    public $timestamps = false;
}
