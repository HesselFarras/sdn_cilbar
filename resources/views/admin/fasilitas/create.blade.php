<x-admin-layout>
    <x-slot:title>Tambah Fasilitas Baru</x-slot:title>

    <div class="max-w-2xl mx-auto bg-white p-6 md:p-8 rounded-2xl border border-gray-100 shadow-sm space-y-6">
        <div>
            <h2 class="text-lg font-bold text-gray-900 font-headline">Formulir Tambah Fasilitas</h2>
            <p class="text-gray-500 text-xs mt-0.5">Aset gambar menggunakan tautan internet (URL) publik website.</p>
        </div>

        {{-- Note: enctype dihapus karena sekarang murni kirim teks URL gambar biasa --}}
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" class="space-y-5 text-xs">
            @csrf

            <div class="space-y-1.5">
                <label class="font-bold text-gray-700 uppercase tracking-wide">Nama Fasilitas</label>
                <input type="text" name="nama_fasilitas" required placeholder="Contoh: Laboratorium Komputer Digital" class="w-full p-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#1A8DA3]">
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-gray-700 uppercase tracking-wide">Deskripsi Fasilitas</label>
                <textarea name="deskripsi" required rows="4" placeholder="Jelaskan spesifikasi ruang atau keunggulan fasilitas..." class="w-full p-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#1A8DA3]"></textarea>
            </div>

            {{-- FIX: Mengubah input file menjadi input url teks biasa --}}
            <div class="space-y-1.5">
                <label class="font-bold text-gray-700 uppercase tracking-wide">Link Foto Dokumentasi (Opsional)</label>
                <input type="url" name="foto" placeholder="Contoh: https://images.unsplash.com/photo-1580582932707-520aed937b7b" class="w-full p-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#1A8DA3]">
                <p class="text-[10px] text-gray-400">Salin "Image Address" dari Google atau Unsplash. Pastikan berakhiran format gambar (JPG, PNG, atau WEBP).</p>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.fasilitas.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-600 rounded-xl font-bold">Batal</a>
                <button type="submit" class="px-5 py-2.5 bg-[#1A8DA3] hover:bg-[#157a8e] text-white rounded-xl font-bold shadow-md">💾 Simpan Aset</button>
            </div>
        </form>
    </div>
</x-admin-layout>