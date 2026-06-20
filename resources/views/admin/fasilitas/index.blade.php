<x-admin-layout>
    <x-slot:title>Kelola Fasilitas Sekolah</x-slot:title>

    <div class="space-y-6">
        <div class="flex justify-between items-center bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div>
                <h2 class="text-lg font-bold text-gray-900 font-headline">Fasilitas Sekolah</h2>
                <p class="text-gray-500 text-xs mt-0.5">Daftar sarana prasarana dinamis SDN Ciledug Barat.</p>
            </div>
            <a href="{{ route('admin.fasilitas.create') }}" class="px-4 py-2 bg-[#1A8DA3] hover:bg-[#157a8e] text-white text-xs font-bold rounded-xl shadow-md transition-all">
                ➕ Tambah Fasilitas
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-xl text-xs font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel List --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full text-left text-xs text-gray-600">
                <thead class="bg-gray-50 text-gray-700 font-bold uppercase tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="p-4 w-16">Foto</th>
                        <th class="p-4">Nama Fasilitas</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4 w-24 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium">
                    @forelse($fasilitas as $f)
                        <tr class="hover:bg-gray-50/80">
                            <td class="p-4">
                                <div class="w-12 h-10 rounded-lg overflow-hidden bg-gray-100 border flex items-center justify-center">
                                    {{-- FIX LOGIC: Deteksi URL Cloud Supabase secara dinamis --}}
                                    @if(!empty($f->foto) && str_starts_with($f->foto, 'http'))
                                        <img src="{{ $f->foto }}" class="w-full h-full object-cover" alt="Foto">
                                    @elseif(!empty($f->foto) && file_exists(public_path('img/' . $f->foto)))
                                        <img src="{{ asset('img/' . $f->foto) }}" class="w-full h-full object-cover" alt="Foto">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=150" class="w-full h-full object-cover" alt="Default">
                                    @endif
                                </div>
                            </td>
                            <td class="p-4 text-gray-900 font-bold">{{ $f->nama_fasilitas }}</td>
                            <td class="p-4 text-gray-500 line-clamp-2 max-w-md mt-3">{{ $f->deskripsi }}</td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-4">
                                    {{-- Tombol Menuju Halaman Edit --}}
                                    <a href="{{ route('admin.fasilitas.edit', $f->id) }}" class="text-[#1A8DA3] hover:text-[#13697a] font-bold text-[11px]">
                                        Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.fasilitas.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus fasilitas ini, abangkuh?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-rose-600 hover:text-rose-900 font-bold text-[11px] cursor-pointer">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400 italic">Belum ada data fasilitas. Silakan klik tombol Tambah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>