<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Halaman daftar semua pengumuman (pagination 10 per halaman).
     */
    public function index(Request $request)
    {
        $notifications = Pengumuman::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(10)
            ->withQueryString();

        return view('pengumuman.index', compact('notifications'));
    }

    /**
     * Halaman detail satu pengumuman berdasarkan slug.
     */
    public function show(string $slug)
    {
        $notification = Pengumuman::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('pengumuman.show', compact('notification'));
    }
}
