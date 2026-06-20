<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FasilitasController extends Controller
{
    // 1. Tampilkan Semua Fasilitas di Dashboard Admin
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    // 2. Tampilkan Form Tambah Data
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    // 3. Proses Simpan Data Baru + Upload Foto ke Supabase Storage
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100',
            'deskripsi'      => 'required|string',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        $data = $request->only(['nama_fasilitas', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // FIX: Menggunakan penamaan unik timestamp + string acak sederhana agar aman tanpa import Str::slug
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Ambil Kredensial Supabase dari .env
            $supabaseUrl = env('SUPABASE_URL');
            $supabaseKey = env('SUPABASE_KEY'); 
            $bucketName  = 'fasilitas'; // <-- Pastikan nama bucket di storage Supabase lo adalah 'fasilitas'

            // Upload file biner langsung ke Supabase Storage via API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $supabaseKey,
                'Content-Type'  => $file->getMimeType(),
            ])->withBody(file_get_contents($file->getRealPath()), $file->getMimeType())
              ->post($supabaseUrl . '/storage/v1/object/' . $bucketName . '/' . $fileName);

            if ($response->successful()) {
                // Ambil URL Publik dari Supabase Storage untuk masuk ke DB
                $data['foto'] = $supabaseUrl . '/storage/v1/object/public/' . $bucketName . '/' . $fileName;
            } else {
                return redirect()->back()->withInput()->withErrors(['foto' => 'Gagal mengupload foto ke cloud storage Supabase.']);
            }
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas baru berhasil ditambahkan abangkuh!');
    }

    // 4. Tampilkan Halaman Form Edit dengan Data Lama
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    // 5. Proses Simpan Perubahan Data (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100',
            'deskripsi'      => 'required|string',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $data = $request->only(['nama_fasilitas', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $supabaseUrl = env('SUPABASE_URL');
            $supabaseKey = env('SUPABASE_KEY');
            $bucketName  = 'fasilitas';

            // Hapus foto lama dari Supabase Storage jika sebelumnya ada
            if ($fasilitas->foto && str_contains($fasilitas->foto, $supabaseUrl)) {
                $oldFileName = basename($fasilitas->foto);
                Http::withHeaders([
                    'Authorization' => 'Bearer ' . $supabaseKey,
                ])->delete($supabaseUrl . '/storage/v1/object/' . $bucketName . '/' . $oldFileName);
            }

            // Upload foto baru
            $file = $request->file('foto');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $supabaseKey,
                'Content-Type'  => $file->getMimeType(),
            ])->withBody(file_get_contents($file->getRealPath()), $file->getMimeType())
              ->post($supabaseUrl . '/storage/v1/object/' . $bucketName . '/' . $fileName);

            if ($response->successful()) {
                $data['foto'] = $supabaseUrl . '/storage/v1/object/public/' . $bucketName . '/' . $fileName;
            }
        }

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui, abangkuh!');
    }

    // 6. Proses Hapus Data
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        
        $supabaseUrl = env('SUPABASE_URL');
        $supabaseKey = env('SUPABASE_KEY');
        $bucketName  = 'fasilitas';

        // Hapus file dari Supabase Storage saat data dihapus
        if ($fasilitas->foto && str_contains($fasilitas->foto, $supabaseUrl)) {
            $oldFileName = basename($fasilitas->foto);
            Http::withHeaders([
                'Authorization' => 'Bearer ' . $supabaseKey,
            ])->delete($supabaseUrl . '/storage/v1/object/' . $bucketName . '/' . $oldFileName);
        }

        $fasilitas->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}