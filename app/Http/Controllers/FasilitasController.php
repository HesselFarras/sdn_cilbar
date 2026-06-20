<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    // 1. Tampilkan Semua Fasilitas
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

    // 3. Proses Simpan Data Baru (Hanya Simpan Link Teks)
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100',
            'deskripsi'      => 'required|string',
            'foto'           => 'nullable|url', // Validasi memastikan input adalah format link/URL valid
        ]);

        // Ambil semua input termasuk teks link foto
        $data = $request->only(['nama_fasilitas', 'deskripsi', 'foto']);

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas baru berhasil ditambahkan, abangkuh!');
    }

    // 4. Tampilkan Halaman Form Edit
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    // 5. Proses Simpan Perubahan Data (Update Link)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100',
            'deskripsi'      => 'required|string',
            'foto'           => 'nullable|url',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $data = $request->only(['nama_fasilitas', 'deskripsi', 'foto']);

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui, abangkuh!');
    }

    // 6. Proses Hapus Data
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}