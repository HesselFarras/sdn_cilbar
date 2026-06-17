<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data tanpa filter 'where' dulu untuk tes apakah muncul
        $artikelEkskulPreview = News::latest()->take(2)->get();
        $artikelPrestasiPreview = News::latest()->take(2)->get();
        $artikelDokumentasiPreview = News::latest()->take(2)->get();

        // Ambil semua pengumuman tanpa syarat
        $pengumumans = Pengumuman::latest()->get();

        return view('home', compact(
            'artikelEkskulPreview',
            'artikelPrestasiPreview',
            'artikelDokumentasiPreview',
            'pengumumans'
        ));
    }
}
