{{--
    footer.blade.php
    Navigation disesuaikan dengan navbar: Beranda, Tentang, Akademik, Kegiatan, PPDB
--}}

@php
    $footerNav = [
        ['label' => 'Beranda',              'route' => 'home'],
        ['label' => 'Tentang Kami',         'route' => 'tentang'],
        ['label' => 'Akademik',             'route' => 'akademik'],
        ['label' => 'Kurikulum',            'route' => 'akademik.kurikulum'],
        ['label' => 'Kalender Akademik',    'route' => 'akademik.kalender'],
        ['label' => 'Tenaga Pendidik',      'route' => 'akademik.pendidik'],
        ['label' => 'Ekstrakurikuler',      'route' => 'kegiatan.ekskul'],
        ['label' => 'Prestasi',             'route' => 'kegiatan.prestasi'],
        ['label' => 'Dokumentasi',          'route' => 'kegiatan.dokumentasi'],
        ['label' => 'Berita Sekolah',       'route' => 'kegiatan.berita'],
        ['label' => 'PPDB',                 'route' => 'ppdb'],
        ['label' => 'Pengumuman',           'route' => 'pengumuman.index'],
    ];

    // Kelompokkan nav per kolom
    $navGroups = [
        'Umum' => [
            ['label' => 'Beranda',           'route' => 'home'],
            ['label' => 'Tentang Kami',      'route' => 'tentang'],
            ['label' => 'PPDB',              'route' => 'ppdb'],
            ['label' => 'Pengumuman',        'route' => 'pengumuman.index'],
        ],
        'Akademik' => [
            ['label' => 'Akademik',          'route' => 'akademik'],
            ['label' => 'Kurikulum',         'route' => 'akademik.kurikulum'],
            ['label' => 'Kalender Akademik', 'route' => 'akademik.kalender'],
            ['label' => 'Tenaga Pendidik',   'route' => 'akademik.pendidik'],
        ],
        'Kegiatan' => [
            ['label' => 'Ekstrakurikuler',   'route' => 'kegiatan.ekskul'],
            ['label' => 'Prestasi',          'route' => 'kegiatan.prestasi'],
            ['label' => 'Dokumentasi',       'route' => 'kegiatan.dokumentasi'],
            ['label' => 'Berita Sekolah',    'route' => 'kegiatan.berita'],
        ],
    ];

    $contact = [
        'address' => 'Jl. H Rean, Benda Baru, Pamulang, Kota Tangerang Selatan, Banten',
        'phone'   => '(021) 585-0123',
        'email'   => 'info@sdnciledugbarat.sch.id',
    ];

    $socials = [
        [
            'label' => 'Facebook',
            'href'  => '#',
            'icon'  => '<path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>',
        ],
        [
            'label' => 'Instagram',
            'href'  => '#',
            'icon'  => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>',
        ],
        [
            'label' => 'YouTube',
            'href'  => '#',
            'icon'  => '<path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.95C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58z"/>
                        <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>',
        ],
    ];
@endphp

<footer class="bg-white border-t border-gray-100" aria-label="Footer SDN Ciledug Barat">

    {{-- ── Main footer body ── --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-14">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1.6fr_1fr_1fr_1fr] gap-10 lg:gap-12">

            {{-- Column 1: Brand --}}
            <div class="flex flex-col gap-5">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="group inline-flex items-center gap-2.5 w-fit" aria-label="SDN Ciledug Barat">
                    <div class="w-8 h-8 rounded-lg bg-[#1A8DA3] flex items-center justify-center
                                ring-2 ring-[#1A8DA3]/20 group-hover:ring-[#1A8DA3]/40 transition-all duration-200 flex-shrink-0">
                        <svg viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-white" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5z"/>
                            <path d="M9 21V12h6v9"/>
                        </svg>
                    </div>
                    <span class="font-headline font-bold text-[14px] tracking-tight text-[#1A8DA3] group-hover:text-[#157a8e] transition-colors duration-200">
                        SDN CILEDUG BARAT
                    </span>
                </a>

                {{-- Tagline --}}
                <p class="text-[13px] leading-relaxed text-gray-400 max-w-[220px]">
                    Mendidik dengan hati, membentuk generasi cerdas dan berkarakter untuk masa depan gemilang.
                </p>

                {{-- Social icons --}}
                <div class="flex items-center gap-2" role="list" aria-label="Media sosial">
                    @foreach ($socials as $s)
                        <a href="{{ $s['href'] }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           role="listitem"
                           aria-label="{{ $s['label'] }}"
                           class="group w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center
                                  text-gray-400 hover:text-[#1A8DA3] hover:border-[#1A8DA3]/40 hover:bg-[#e0f6fa]
                                  transition-all duration-200 hover:scale-110 active:scale-95">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="w-3.5 h-3.5" aria-hidden="true">
                                {!! $s['icon'] !!}
                            </svg>
                        </a>
                    @endforeach
                </div>

                {{-- Kontak singkat --}}
                <div class="flex flex-col gap-2 pt-1">
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact['phone']) }}"
                       class="flex items-center gap-2 text-[12.5px] text-gray-400 hover:text-[#1A8DA3] transition-colors duration-150">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                        {{ $contact['phone'] }}
                    </a>
                    <a href="mailto:{{ $contact['email'] }}"
                       class="flex items-center gap-2 text-[12.5px] text-gray-400 hover:text-[#1A8DA3] transition-colors duration-150 break-all">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $contact['email'] }}
                    </a>
                    <div class="flex items-start gap-2 text-[12.5px] text-gray-400">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21s-7-6.5-7-11a7 7 0 1114 0c0 4.5-7 11-7 11z"/><circle cx="12" cy="10" r="2"/>
                        </svg>
                        <span class="leading-relaxed">{{ $contact['address'] }}</span>
                    </div>
                </div>
            </div>

            {{-- Column 2: Umum --}}
            <div>
                <h3 class="font-headline font-semibold text-[11px] tracking-widest text-[#1A8DA3] uppercase mb-4">
                    Umum
                </h3>
                <ul class="flex flex-col gap-2.5" role="list">
                    @foreach ($navGroups['Umum'] as $item)
                        <li>
                            <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                               class="group inline-flex items-center gap-2 text-[13px] text-gray-500 hover:text-[#1A8DA3] transition-colors duration-150">
                                <span class="w-0 h-0.5 bg-[#1A8DA3] rounded-full transition-all duration-200 group-hover:w-3 flex-shrink-0" aria-hidden="true"></span>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Akademik --}}
            <div>
                <h3 class="font-headline font-semibold text-[11px] tracking-widest text-[#1A8DA3] uppercase mb-4">
                    Akademik
                </h3>
                <ul class="flex flex-col gap-2.5" role="list">
                    @foreach ($navGroups['Akademik'] as $item)
                        <li>
                            <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                               class="group inline-flex items-center gap-2 text-[13px] text-gray-500 hover:text-[#1A8DA3] transition-colors duration-150">
                                <span class="w-0 h-0.5 bg-[#1A8DA3] rounded-full transition-all duration-200 group-hover:w-3 flex-shrink-0" aria-hidden="true"></span>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 4: Kegiatan --}}
            <div>
                <h3 class="font-headline font-semibold text-[11px] tracking-widest text-[#1A8DA3] uppercase mb-4">
                    Kegiatan
                </h3>
                <ul class="flex flex-col gap-2.5" role="list">
                    @foreach ($navGroups['Kegiatan'] as $item)
                        <li>
                            <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                               class="group inline-flex items-center gap-2 text-[13px] text-gray-500 hover:text-[#1A8DA3] transition-colors duration-150">
                                <span class="w-0 h-0.5 bg-[#1A8DA3] rounded-full transition-all duration-200 group-hover:w-3 flex-shrink-0" aria-hidden="true"></span>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    {{-- ── Copyright bar ── --}}
    <div class="border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-[12px] text-gray-400 text-center sm:text-left">
                &copy; {{ date('Y') }} SDN Ciledug Barat. Hak cipta dilindungi undang-undang.
            </p>
            <p class="text-[12px] text-gray-400">
                Dibuat dengan <span class="text-[#1A8DA3]" aria-label="cinta">♥</span> untuk pendidikan
            </p>
        </div>
    </div>

    {{-- ── Back to top ── --}}
    <button
        id="back-to-top"
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        aria-label="Kembali ke atas"
        class="fixed bottom-6 right-6 z-40 w-9 h-9 rounded-lg bg-[#1A8DA3] hover:bg-[#157a8e]
               text-white shadow-md shadow-[#1A8DA3]/30 hover:shadow-lg
               flex items-center justify-center transition-all duration-200 hover:scale-110 active:scale-95
               opacity-0 pointer-events-none"
    >
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" aria-hidden="true">
            <path d="M18 15l-6-6-6 6"/>
        </svg>
    </button>

</footer>

<script>
    (function () {
        var btn = document.getElementById('back-to-top');
        if (!btn) return;
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                btn.style.opacity = '1';
                btn.style.pointerEvents = 'auto';
            } else {
                btn.style.opacity = '0';
                btn.style.pointerEvents = 'none';
            }
        }, { passive: true });
    })();
</script>
