<x-layout>
    <x-slot:title>Beranda - SDN Ciledug Barat</x-slot:title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, .font-headline { font-family: 'Lexend', sans-serif; }

        :root {
            --primary: #1A8DA3;
            --primary-light: #e0f6fa;
            --secondary: #FFF59D;
            --secondary-dark: #c9b800;
        }

        html { scroll-behavior: smooth; }

        /* Blob animations */
        @keyframes blobFloat {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.04); }
        }
        @keyframes blobFloat2 {
            0%, 100% { transform: translateY(0px) scale(1) rotate(0deg); }
            50% { transform: translateY(15px) scale(0.97) rotate(8deg); }
        }
        @keyframes floatUp {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        @keyframes ripple {
            0% { transform: scale(0); opacity: 0.6; }
            100% { transform: scale(4); opacity: 0; }
        }
        @keyframes staggerReveal {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes cursorGlow {
            0%, 100% { opacity: 0.15; }
            50% { opacity: 0.3; }
        }

        .blob-1 { animation: blobFloat 7s ease-in-out infinite; }
        .blob-2 { animation: blobFloat2 9s ease-in-out infinite; }
        .float-element { animation: floatUp 4s ease-in-out infinite; }

        /* Animated underline */
        .animated-underline {
            position: relative;
            display: inline-block;
        }
        .animated-underline::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--primary);
            border-radius: 9999px;
            transition: width 0.4s ease;
        }
        .animated-underline:hover::after { width: 100%; }

        /* Ripple button */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        .btn-ripple::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.35);
            width: 100px; height: 100px;
            margin-left: -50px; margin-top: -50px;
            top: 50%; left: 50%;
            transform: scale(0);
            opacity: 0;
            transition: none;
        }
        .btn-ripple:active::after {
            animation: ripple 0.5s linear;
        }

        /* Hero image tilt */
        .hero-img-wrap {
            transition: transform 0.15s ease-out;
            transform-style: preserve-3d;
        }

        /* Card stagger */
        .card-stagger:nth-child(1) { animation-delay: 0.05s; }
        .card-stagger:nth-child(2) { animation-delay: 0.15s; }
        .card-stagger:nth-child(3) { animation-delay: 0.25s; }
        .card-stagger:nth-child(4) { animation-delay: 0.35s; }

        /* Glow hover */
        .hover-glow:hover {
            box-shadow: 0 0 0 3px rgba(26,141,163,0.25), 0 8px 32px rgba(26,141,163,0.18);
        }

        /* Image zoom */
        .img-zoom img {
            transition: transform 0.5s cubic-bezier(0.25,0.46,0.45,0.94);
        }
        .img-zoom:hover img { transform: scale(1.07); }

        /* Section underline accent */
        .section-title-bar {
            display: inline-block;
            position: relative;
        }
        .section-title-bar::after {
            content: '';
            display: block;
            width: 52px;
            height: 4px;
            background: var(--primary);
            border-radius: 9999px;
            margin-top: 8px;
        }

        /* Glassmorphism card */
        .glass-card {
            background: rgba(255,255,255,0.72);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Cursor glow */
        .cursor-glow-element {
            pointer-events: none;
            position: fixed;
            border-radius: 50%;
            width: 340px;
            height: 340px;
            background: radial-gradient(circle, rgba(26,141,163,0.18) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            transition: left 0.18s ease, top 0.18s ease;
            z-index: 0;
            animation: cursorGlow 3s ease-in-out infinite;
        }
    </style>

    {{-- Cursor glow --}}
    <div id="cursor-glow" class="cursor-glow-element"></div>

    {{-- ===========================
          SECTION 1 — HERO
    =========================== --}}
    <section class="relative min-h-[92vh] flex items-center bg-gradient-to-br from-[#f0fbfc] via-white to-[#fafff7] overflow-hidden px-6 md:px-12 lg:px-20 py-20">

        <div class="blob-1 absolute -top-24 -left-24 w-80 h-80 rounded-full bg-[#1A8DA3]/10 blur-3xl pointer-events-none"></div>
        <div class="blob-2 absolute top-10 right-0 w-64 h-64 rounded-full bg-[#FFF59D]/60 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-96 h-40 rounded-full bg-[#1A8DA3]/05 blur-2xl pointer-events-none"></div>

        <div class="float-element absolute top-20 right-1/4 w-3 h-3 rounded-full bg-[#1A8DA3]/30 pointer-events-none"></div>
        <div class="float-element absolute bottom-32 left-16 w-2 h-2 rounded-full bg-[#FFF59D] border border-yellow-300 pointer-events-none" style="animation-delay:1.5s"></div>

        <div class="relative z-10 max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-7" data-aos="fade-right" data-aos-duration="800">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#e0f6fa] border border-[#1A8DA3]/25 text-[#1A8DA3] text-xs font-semibold tracking-widest uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#1A8DA3] animate-pulse"></span>
                    Mencerdaskan & Menyenangkan
                </div>

                <h1 class="font-headline text-4xl md:text-5xl lg:text-[3.4rem] font-bold leading-tight text-gray-900">
                    Wujudkan Masa Depan
                    <span class="text-[#1A8DA3] relative">
                        Gemilang
                        <svg class="absolute -bottom-1 left-0 w-full" height="6" viewBox="0 0 200 6" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path d="M0 4 Q50 0 100 4 Q150 8 200 4" stroke="#1A8DA3" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </span>
                    Buah Hati Anda
                </h1>

                <p class="text-gray-500 text-base md:text-lg leading-relaxed max-w-md">
                    Di SDN Ciledug Barat, kami memadukan kurikulum unggulan dengan lingkungan belajar yang suportif untuk membentuk karakter siswa yang berprestasi.
                </p>

                <div class="flex flex-wrap gap-4 pt-1">
                    <a href="/ppdb" class="btn-ripple group inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#1A8DA3] text-white font-semibold text-sm shadow-lg shadow-[#1A8DA3]/30 hover:bg-[#157a8e] hover:scale-105 hover:shadow-[#1A8DA3]/40 transition-all duration-300">
                        Daftar Sekarang
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#program" class="btn-ripple group inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#FFF59D] text-gray-800 font-semibold text-sm border border-yellow-200 hover:bg-yellow-200 hover:scale-105 transition-all duration-300 shadow-md shadow-yellow-100">
                        Jelajahi Program
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="flex flex-wrap gap-8 pt-4">
                    @foreach([['500+','Siswa Aktif'],['20+','Ekskul'],['A','Akreditasi']] as $stat)
                    <div>
                        <div class="font-headline text-2xl font-bold text-[#1A8DA3]">{{ $stat[0] }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">{{ $stat[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left" data-aos-duration="900">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-72 h-72 rounded-full bg-[#1A8DA3]/20 blur-3xl"></div>
                </div>
                <div class="absolute top-0 right-8 w-32 h-32 rounded-full bg-[#FFF59D]/70 blur-2xl pointer-events-none"></div>

                <div id="hero-img" class="hero-img-wrap relative w-full max-w-lg cursor-none">
                    <div class="img-zoom rounded-3xl overflow-hidden border-[5px] border-white shadow-2xl shadow-[#1A8DA3]/20 relative z-10">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=800&q=80" alt="SDN Ciledug Barat" class="w-full h-80 md:h-96 object-cover">
                    </div>

                    <div class="float-element absolute -bottom-5 -left-5 z-20 glass-card rounded-2xl px-5 py-3 shadow-xl border border-white/60">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-[#1A8DA3] flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-sm text-gray-800">Akreditasi A</div>
                                <div class="text-xs text-gray-400">Terakreditasi BAN-S/M</div>
                            </div>
                        </div>
                    </div>

                    <div class="float-element absolute -top-4 -right-4 z-20 rounded-2xl shadow-xl overflow-hidden" style="animation-delay:1s">
                        <div class="bg-white border border-gray-100 px-4 py-2.5 flex items-center gap-2.5">
                            <div class="w-1.5 h-8 rounded-full bg-gradient-to-b from-[#1A8DA3] to-[#c9e84f]"></div>
                            <div>
                                <div class="font-headline text-[9px] font-semibold tracking-widest text-gray-400 uppercase leading-none mb-0.5">Terakreditasi</div>
                                <div class="font-headline text-sm font-bold text-gray-800 leading-tight">Sekolah Unggulan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===========================
          SECTION 2 — PENGUMUMAN
    =========================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-end justify-between mb-10" data-aos="fade-up">
                <div>
                    <h2 class="font-headline text-2xl md:text-3xl font-bold text-gray-900 section-title-bar">
                        Pengumuman Terbaru
                    </h2>
                </div>
                <a href="{{ route('pengumuman.index') }}" class="animated-underline flex items-center gap-1.5 text-[#1A8DA3] font-semibold text-sm hover:gap-2.5 transition-all duration-300">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                // SEMUA KEY DIUBAH JADI HURUF KECIL BIAR COCOK SAMA DATABASE
                $badgeColor = [
                    'penting'  => 'bg-red-100 text-red-700',
                    'akademik' => 'bg-[#FFF9C4] text-[#F57F17]', // Kuning soft estetik lo
                    'acara'    => 'bg-[#e0f6fa] text-[#1A8DA3]',
                    'libur'    => 'bg-orange-100 text-orange-600',
                    'ppdb'     => 'bg-green-100 text-green-700',
                ];
                $badgeIcon = [
                    'penting'  => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
                    'akademik' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                    'acara'    => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                    'libur'    => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                    'ppdb'     => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z',
                ];
                $defaultColor = 'bg-gray-100 text-gray-600';
                $defaultIcon  = 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9';
                @endphp

                {{-- LOOPING DATA PENGUMUMAN DINAMIS --}}
                @forelse($pengumumans ?? [] as $i => $item)
                @php
                    // BALIKIN KE PAKAI CATEGORY, TAPI DIPAKSA LOWERCASE BIAR SINKRON SAMA KEY ARRAY
                    $cat   = strtolower($item->category ?? 'default');
                    $color = $badgeColor[$cat] ?? $defaultColor;
                    $icon  = $badgeIcon[$cat]  ?? $defaultIcon;
                    $isImportant = $item->is_important ?? false;
                @endphp
                <a href="{{ route('pengumuman.show', $item->slug) }}" class="card-stagger group relative flex flex-col bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover-glow hover:-translate-y-1.5 hover:border-[#1A8DA3]/40 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    @if($isImportant)
                    <span class="absolute top-4 right-4 w-2 h-2 rounded-full bg-red-400 animate-pulse"></span>
                    @endif

                    <div class="flex items-center gap-2 text-[#1A8DA3] text-xs font-medium mb-3">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($item->published_at)->locale('id')->isoFormat('D MMM YYYY') }}
                    </div>

                    <h3 class="font-headline text-lg font-bold text-gray-900 mb-2 group-hover:text-[#1A8DA3] transition-colors duration-200 line-clamp-2">
                        {{ $item->title }}
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">
                        {{ $item->description }}
                    </p>

                    <!-- TETEP MENGGUNAKAN CATEGORY, TAMBAH CLASS UPPERCASE BIAR HURUF BESAR -->
                    <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full w-fit capitalize {{ $color }}">
                        {{ $item->category }}
                    </span>

                    <div class="absolute bottom-5 right-5 w-7 h-7 rounded-full bg-[#1A8DA3]/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:bg-[#1A8DA3]/20">
                        <svg class="w-3.5 h-3.5 text-[#1A8DA3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </a>
                @empty
                <div class="col-span-3 flex flex-col items-center justify-center py-16 text-center">
                    <div class="w-14 h-14 rounded-full bg-[#e0f6fa] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#1A8DA3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <p class="text-gray-400 text-sm">Belum ada pengumuman saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===========================
          SECTION 3 — PROFIL SEKOLAH & GURU SAMPLING
    =========================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-[#f8fffe]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative" data-aos="fade-right" data-aos-duration="800">
                <div class="grid grid-cols-2 gap-4">
                    <div class="img-zoom col-span-1 row-span-2 rounded-2xl overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=500&q=80" alt="Kelas" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-[#FFF59D] rounded-2xl p-5 flex flex-col justify-center shadow-md border border-yellow-200">
                        <div class="font-headline text-5xl font-black text-gray-800">A</div>
                        <div class="text-xs text-gray-600 mt-1 font-medium">Akreditasi Sekolah</div>
                    </div>
                    
                    {{-- INTEGRASI FOTO GURU PERTAMA DINAMIS SEBAGAI SAMPEL PREVIEW --}}
                    <div class="img-zoom rounded-2xl overflow-hidden shadow-md bg-white flex items-center justify-center">
                        @if(isset($gurus) && $gurus->count() > 0)
                            <img src="{{ $gurus->first()->foto_url }}" alt="Guru" class="w-full h-28 object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=400&q=80" alt="Belajar" class="w-full h-28 object-cover">
                        @endif
                    </div>
                </div>

                <div class="float-element absolute -bottom-6 -left-4 bg-[#1A8DA3] text-white rounded-2xl px-6 py-4 shadow-xl shadow-[#1A8DA3]/30 z-10">
                    <div class="font-headline text-3xl font-bold">20+</div>
                    <div class="text-xs mt-0.5 text-white/80">Ekstrakurikuler Unggulan</div>
                </div>
                <div class="absolute -top-6 -right-6 w-20 h-20 rounded-full border-4 border-[#1A8DA3]/20 pointer-events-none"></div>
                <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full border-2 border-[#FFF59D] pointer-events-none"></div>
            </div>

            <div class="space-y-7" data-aos="fade-left" data-aos-duration="800">
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                    Membentuk Generasi <span class="text-[#1A8DA3]">Cerdas Berkarakter</span>
                </h2>
                <p class="text-gray-500 leading-relaxed">
                    SDN Ciledug Barat berkomitmen untuk menjadi institusi pendidikan yang tidak hanya unggul secara akademis, tetapi juga menanamkan nilai-nilai luhur dan kreativitas pada setiap siswa.
                </p>

                <div class="group rounded-2xl border border-gray-100 bg-white p-5 shadow-sm hover:border-[#1A8DA3]/40 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#e0f6fa] flex items-center justify-center flex-shrink-0 group-hover:bg-[#1A8DA3] transition-colors duration-300">
                            <svg class="w-5 h-5 text-[#1A8DA3] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-headline font-bold text-gray-800 mb-1">Visi Kami</div>
                            <p class="text-gray-500 text-sm leading-relaxed">Menjadi sekolah dasar unggulan yang menghasilkan lulusan berakhlak mulia, cerdas, kreatif, dan mandiri.</p>
                        </div>
                    </div>
                </div>

                <div class="group rounded-2xl border border-gray-100 bg-white p-5 shadow-sm hover:border-[#1A8DA3]/40 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-50 flex items-center justify-center flex-shrink-0 group-hover:bg-[#FFF59D] transition-colors duration-300">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-headline font-bold text-gray-800 mb-1">Misi Kami</div>
                            <p class="text-gray-500 text-sm leading-relaxed">Menyelenggarakan pendidikan berkualitas, mengembangkan bakat minat, dan membangun ekosistem sekolah yang menyenangkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===========================
          SECTION 4 — KATEGORI ARTIKEL / KEGIATAN & KALENDER AKADEMIK
    =========================== --}}
    <section id="program" class="py-20 px-6 md:px-12 lg:px-20 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-14" data-aos="fade-up">
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                    Jelajahi Kegiatan Kami
                </h2>
                <p class="text-gray-400 max-w-lg mx-auto text-sm leading-relaxed">
                    Temukan informasi lengkap seputar kegiatan, capaian, dan momen berharga di SDN Ciledug Barat.
                </p>
            </div>

            {{-- 3 Menu Utama Kategori Kegiatan --}}
            @php
            $kategoriArtikel = [
                [
                    'label'       => 'Ekstrakurikuler',
                    'url'         => route('kegiatan.kategori', ['kategori' => 'ekstrakurikuler']),
                    'deskripsi'   => 'Berbagai kegiatan pengembangan bakat dan minat siswa di luar jam pelajaran.',
                    'icon_bg'     => 'bg-[#e0f6fa]',
                    'icon_color'  => 'text-[#1A8DA3]',
                    'glow'        => 'hover:shadow-[#1A8DA3]/15',
                    'icon_path'   => 'M13 10V3L4 14h7v7l9-11h-7z',
                ],
                [
                    'label'       => 'Prestasi',
                    'url'         => route('kegiatan.kategori', ['kategori' => 'prestasi']),
                    'deskripsi'   => 'Raihan dan penghargaan membanggakan yang ditorehkan siswa dan sekolah.',
                    'icon_bg'     => 'bg-yellow-50',
                    'icon_color'  => 'text-yellow-600',
                    'glow'        => 'hover:shadow-yellow-100/60',
                    'icon_path'   => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                ],
                [
                    'label'       => 'Dokumentasi',
                    'url'         => route('kegiatan.kategori', ['kategori' => 'dokumentasi']),
                    'deskripsi'   => 'Kumpulan foto dan rekaman kegiatan sekolah dari berbagai momen spesial.',
                    'icon_bg'     => 'bg-purple-50',
                    'icon_color'  => 'text-purple-500',
                    'glow'        => 'hover:shadow-purple-100/60',
                    'icon_path'   => 'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z M15 13a3 3 0 11-6 0 3 3 0 016 0z',
                ],
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($kategoriArtikel as $i => $kat)
                <a href="{{ $kat['url'] }}" class="card-stagger group relative flex flex-col bg-white rounded-3xl border border-gray-100 p-7 shadow-sm hover:border-gray-200 hover:-translate-y-2 hover:shadow-xl {{ $kat['glow'] }} transition-all duration-300 cursor-pointer overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full {{ $kat['icon_bg'] }} opacity-60 group-hover:opacity-100 group-hover:scale-125 transition-all duration-500 pointer-events-none"></div>

                    <div class="relative w-14 h-14 rounded-2xl {{ $kat['icon_bg'] }} flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-sm">
                        <svg class="w-6 h-6 {{ $kat['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $kat['icon_path'] }}"/>
                        </svg>
                    </div>

                    <div class="flex items-center gap-2 mb-2">
                        <h3 class="font-headline font-bold text-gray-900 text-lg group-hover:text-[#1A8DA3] transition-colors duration-200">
                            {{ $kat['label'] }}
                        </h3>
                    </div>

                    <p class="text-gray-400 text-sm leading-relaxed flex-1">
                        {{ $kat['deskripsi'] }}
                    </p>

                    <div class="flex items-center gap-1.5 mt-5 text-sm font-semibold text-[#1A8DA3] opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        Lihat Semua
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>

                    <div class="absolute bottom-0 left-0 h-[3px] w-0 group-hover:w-full {{ $kat['icon_bg'] }} transition-all duration-400 rounded-b-3xl"></div>
                </a>
                @endforeach
            </div>

            {{-- ── 🌟 INTEGRASI LIVE DATA KEDUA ── --}}
            <div class="mt-16 grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Kolom 1 & 2 Satuan: Berita / Kegiatan Terbaru --}}
                <div class="lg:col-span-2 space-y-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-headline font-bold text-gray-700 text-sm uppercase tracking-wider">Berita & Kegiatan Terbaru</h4>
                        <a href="{{ route('kegiatan.kategori', ['kategori' => 'berita']) }}" class="text-xs text-[#1A8DA3] font-semibold hover:underline">
                            Lihat Semua Berita →
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($kegiatans ?? [] as $artikel)
                        <a href="/kegiatan/{{ \Illuminate\Support\Str::startsWith($artikel->slug, 'berita-') ? 'berita' : $artikel->kategori }}/{{ $artikel->slug }}" class="group flex flex-col bg-white rounded-2xl border border-gray-100 overflow-hidden hover:border-[#1A8DA3]/30 hover:shadow-md transition-all duration-250 block">
                            <div class="img-zoom relative h-40 w-full overflow-hidden bg-slate-100">
                                <img src="{{ $artikel->thumbnail }}" alt="" class="w-full h-full object-cover">
                                
                                {{-- FIX REWRITE VISUAL BADGE: SINKRON KATEGORI IKUT SLUG PREFIX --}}
                                <span class="absolute top-3 left-3 px-2 py-0.5 text-[9px] font-bold text-white bg-[#1A8DA3] rounded-md uppercase tracking-wide shadow-sm">
                                    @if($artikel->kategori == 'dokumentasi' && \Illuminate\Support\Str::startsWith($artikel->slug, 'berita-'))
                                        Berita Sekolah
                                    @elseif($artikel->kategori == 'ekstrakurikuler' || $artikel->kategori == 'ekskul')
                                        Ekskul
                                    @else
                                        {{ $artikel->kategori == 'dokumentasi' ? 'Dokumentasi' : $artikel->kategori }}
                                    @endif
                                </span>
                            </div>
                            <div class="p-4 min-w-0 flex-1 flex flex-col justify-between">
                                <p class="text-sm font-bold text-gray-800 group-hover:text-[#1A8DA3] transition-colors duration-200 line-clamp-2 leading-snug">{{ $artikel->title }}</p>
                                <p class="text-[11px] text-gray-400 mt-2 flex items-center gap-1">
                                    <span>🕒</span> {{ \Carbon\Carbon::parse($artikel->published_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                </p>
                            </div>
                        </a>
                        @empty
                        <div class="p-8 rounded-2xl border border-dashed border-gray-200 text-center col-span-2">
                            <p class="text-xs text-gray-300">Belum ada kegiatan terbaru yang diisi.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                {{-- Kolom 3 Satuan: Kalender Agenda Sekolah --}}
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-headline font-bold text-gray-700 text-sm uppercase tracking-wider">📅 Agenda Sekolah Terdekat</h4>
                        <a href="/akademik/kalender" class="text-xs text-[#1A8DA3] font-semibold hover:underline">Lihat Semua →</a>
                    </div>
                    
                    <div class="space-y-3">
                        @forelse($agendas ?? [] as $agenda)
                        <div class="flex items-center gap-3.5 p-3 rounded-2xl border border-gray-100 bg-white hover:border-[#1A8DA3]/20 hover:shadow-sm transition-all duration-200">
                            {{-- Mini Kotak Kalender Tanggal --}}
                            <div class="bg-[#1A8DA3]/10 text-[#1A8DA3] p-2.5 rounded-xl font-bold text-center min-w-[58px] flex-shrink-0">
                                <span class="text-[9px] font-semibold block text-slate-500 uppercase leading-none mb-1">
                                    {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->locale('id')->isoFormat('MMM') }}
                                </span>
                                <span class="text-base leading-none">
                                    {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('d') }}
                                </span>
                            </div>
                            {{-- Judul Agenda --}}
                            <div class="min-w-0">
                                <h5 class="font-bold text-gray-800 text-xs truncate leading-tight">{{ $agenda->nama_kegiatan }}</h5>
                                <p class="text-[10px] text-gray-400 mt-1 truncate">
                                    {{ $agenda->keterangan ?? 'Agenda Resmi Sekolah' }}
                                </p>
                            </div>
                        </div>
                        @empty
                        <div class="p-4 rounded-2xl border border-dashed border-gray-200 text-center">
                            <p class="text-xs text-gray-300">Belum ada agenda akademik terjadwal.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- AOS Library --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 80,
            easing: 'ease-out-cubic',
            duration: 700,
        });

        const glow = document.getElementById('cursor-glow');
        document.addEventListener('mousemove', (e) => {
            glow.style.left = e.clientX + 'px';
            glow.style.top  = e.clientY + 'px';
        });

        const heroImg = document.getElementById('hero-img');
        if (heroImg) {
            heroImg.addEventListener('mousemove', (e) => {
                const rect  = heroImg.getBoundingClientRect();
                const cx    = rect.left + rect.width  / 2;
                const cy    = rect.top  + rect.height / 2;
                const dx    = (e.clientX - cx) / rect.width;
                const dy    = (e.clientY - cy) / rect.height;
                heroImg.style.transform = `perspective(900px) rotateY(${dx * 8}deg) rotateX(${-dy * 6}deg)`;
            });
            heroImg.style.transition = 'transform 0.1s ease-out';
            heroImg.addEventListener('mouseleave', () => {
                heroImg.style.transform = 'perspective(900px) rotateY(0deg) rotateX(0deg)';
            });
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        const cards = document.querySelectorAll('.card-stagger');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'staggerReveal 0.55s ease forwards';
                    entry.target.style.opacity = '1';
                }
            });
        }, { threshold: 0.15 });

        cards.forEach(card => {
            card.style.opacity = '0';
            observer.observe(card);
        });
    </script>
</x-layout>