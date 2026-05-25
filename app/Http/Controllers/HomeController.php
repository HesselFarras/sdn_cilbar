<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Http\Controllers\ArtikelController;

class HomeController extends Controller
{
    public function index()
    {
        // 3 pengumuman terbaru dari database
        $pengumumans = Pengumuman::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        // Data artikel per kategori untuk section kegiatan
        $artikelData = ArtikelController::dataForHome();

        return view('home', array_merge(
            ['pengumumans' => $pengumumans],
            $artikelData
        ));
    }
}
