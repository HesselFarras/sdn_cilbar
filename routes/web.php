<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tentang', function () {
    return view('about');
})->name('tentang');

Route::get('/akademik', function () {
    return view('academic');
})->name('akademik');

Route::get('/akademik/kurikulum', function () {
    return view('academic');
})->name('akademik.kurikulum');

Route::get('/akademik/ekstrakurikuler', function () {
    return view('academic');
})->name('akademik.ekskul');

Route::get('/akademik/prestasi', function () {
    return view('academic');
})->name('akademik.prestasi');

Route::get('/tentang/visi-misi', function () {
    return view('about');
})->name('tentang.visi');

Route::get('/tentang/struktur-organisasi', function () {
    return view('about');
})->name('tentang.struktur');

Route::get('/kegiatan', function () {
    return view('kegiatan');
})->name('kegiatan');

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::get('/kontak', function () {
    return view('contact');
})->name('kontak');

Route::get('/lokasi', function () {
    return view('contact');
})->name('lokasi');

use App\Http\Controllers\PengumumanController;

Route::get('/pengumuman',         [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}',  [PengumumanController::class, 'show']) ->name('pengumuman.show');
