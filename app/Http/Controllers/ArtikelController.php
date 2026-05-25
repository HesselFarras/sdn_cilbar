<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    // ── Home: kirim preview + count ke view home ──────────────────
    // Panggil method ini dari HomeController atau route '/'
    public static function dataForHome(): array
    {
        $preview = fn(string $kat) => Artikel::published()->kategori($kat)->limit(2)->get();
        $count   = fn(string $kat) => Artikel::published()->kategori($kat)->count();

        return [
            'artikelEkskulPreview'    => $preview('ekstrakurikuler'),
            'artikelPrestasiPreview'  => $preview('prestasi'),
            'artikelDokumentasiPreview' => $preview('dokumentasi'),
            'artikelEkskul'           => $count('ekstrakurikuler'),
            'artikelPrestasi'         => $count('prestasi'),
            'artikelDokumentasi'      => $count('dokumentasi'),
        ];
    }

    // ── Halaman daftar per kategori ───────────────────────────────
    public function kategori(string $slug)
    {
        $allowed = ['ekstrakurikuler', 'prestasi', 'dokumentasi'];

        abort_unless(in_array($slug, $allowed), 404);

        $artikels = Artikel::published()
            ->kategori($slug)
            ->paginate(9)
            ->withQueryString();

        $labelMap = [
            'ekstrakurikuler' => 'Ekstrakurikuler',
            'prestasi'        => 'Prestasi',
            'dokumentasi'     => 'Dokumentasi',
        ];

        return view('artikel.kategori', [
            'artikels'      => $artikels,
            'kategoriSlug'  => $slug,
            'kategoriLabel' => $labelMap[$slug],
        ]);
    }

    // ── Halaman detail satu artikel ───────────────────────────────
    public function show(string $slug)
    {
        $artikel = Artikel::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Artikel terkait (same kategori, exclude current)
        $related = Artikel::published()
            ->kategori($artikel->kategori)
            ->where('id', '!=', $artikel->id)
            ->limit(3)
            ->get();

        return view('artikel.show', compact('artikel', 'related'));
    }
}
