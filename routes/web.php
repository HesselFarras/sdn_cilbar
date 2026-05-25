<?php

use Illuminate\Support\Facades\Route;


Route::get('/tentang', function () {
    return view('about');
})->name('tentang');

// Akademik
Route::get('/akademik', function () {
    return view('academic');
})->name('akademik');

Route::get('/akademik/kurikulum', function () {
    return view('academic');
})->name('akademik.kurikulum');

Route::get('/akademik/kalender', function () {
    return view('academic');
})->name('akademik.kalender');

Route::get('/akademik/tenaga-pendidik', function () {
    return view('academic');
})->name('akademik.pendidik');

// Kegiatan
Route::get('/kegiatan', function () {
    return view('kegiatan');
})->name('kegiatan');

Route::get('/kegiatan/ekstrakurikuler', function () {
    return view('kegiatan');
})->name('kegiatan.ekskul');

Route::get('/kegiatan/prestasi', function () {
    return view('kegiatan');
})->name('kegiatan.prestasi');

Route::get('/kegiatan/dokumentasi', function () {
    return view('kegiatan');
})->name('kegiatan.dokumentasi');

Route::get('/kegiatan/berita', function () {
    return view('kegiatan');
})->name('kegiatan.berita');

// Lainnya
Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::get('/kontak', function () {
    return view('contact');
})->name('kontak');

Route::get('/lokasi', function () {
    return view('contact');
})->name('lokasi');

Route::get('/tentang/visi-misi', function () {
    return view('about');
})->name('tentang.visi');

Route::get('/tentang/struktur-organisasi', function () {
    return view('about');
})->name('tentang.struktur');

use App\Http\Controllers\PengumumanController;

Route::get('/pengumuman',         [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}',  [PengumumanController::class, 'show']) ->name('pengumuman.show');

#Rutes Artikel===================================================================================================
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;

// Home — pastikan HomeController::index() memanggil ArtikelController::dataForHome()
Route::get('/', [HomeController::class, 'index'])->name('home');

// Artikel per kategori (ekstrakurikuler / prestasi / dokumentasi)
Route::get('/artikel/{kategori}',       [ArtikelController::class, 'kategori'])->name('artikel.kategori');
Route::get('/artikel/{kategori}/{slug}',[ArtikelController::class, 'show'])    ->name('artikel.show');


// ============================================================
// HomeController.php — pastikan data artikel dikirim ke view
// ============================================================
//
// public function index()
// {
//     $data = \App\Controllers\ArtikelController::dataForHome();
//
//     // merge dengan data lain yang sudah ada (pengumuman, dsb)
//     return view('home', array_merge($data, [
//         // ... data lainnya
//     ]));
// }
