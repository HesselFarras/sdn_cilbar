<x-layout>
    <x-slot:title>Tentang Kami - SDN Ciledug Barat</x-slot:title>

    {{-- =====================================================
         ASSETS
    ===================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1,h2,h3,h4,.font-headline { font-family: 'Lexend', sans-serif; }
        html { scroll-behavior: smooth; }

        :root {
            --primary:       #1A8DA3;
            --primary-light: #e0f6fa;
            --secondary:     #FFF59D;
            --secondary-dark: #c9b800;
        }

        @keyframes blobFloat  { 0%,100%{transform:translateY(0px) scale(1)} 50%{transform:translateY(-20px) scale(1.04)} }
        @keyframes blobFloat2 { 0%,100%{transform:translateY(0px) scale(1) rotate(0deg)} 50%{transform:translateY(15px) scale(0.97) rotate(8deg)} }
        @keyframes floatUp    { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
        @keyframes ripple     { 0%{transform:scale(0);opacity:.6} 100%{transform:scale(4);opacity:0} }
        @keyframes staggerReveal { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }
        @keyframes cursorGlow { 0%,100%{opacity:.15} 50%{opacity:.3} }
        @keyframes tDot { 0%,100%{box-shadow:0 0 0 3px rgba(26,141,163,.2)} 50%{box-shadow:0 0 0 7px rgba(26,141,163,.05)} }

        .blob-1  { animation: blobFloat  7s ease-in-out infinite; }
        .blob-2  { animation: blobFloat2 9s ease-in-out infinite; }
        .float-el { animation: floatUp 4s ease-in-out infinite; }
        .t-dot   { animation: tDot 2.5s ease-in-out infinite; }

        /* Hover glow — sama persis homepage */
        .hover-glow:hover { box-shadow: 0 0 0 3px rgba(26,141,163,0.25), 0 8px 32px rgba(26,141,163,0.18); }

        /* Image zoom */
        .img-zoom img { transition: transform 0.5s cubic-bezier(0.25,0.46,0.45,0.94); }
        .img-zoom:hover img { transform: scale(1.07); }

        /* Glassmorphism */
        .glass-card { background:rgba(255,255,255,0.72); backdrop-filter:blur(12px); -webkit-backdrop-filter:blur(12px); }

        /* Hero tilt */
        .hero-img-wrap { transition: transform 0.15s ease-out; transform-style: preserve-3d; }

        /* Ripple btn */
        .btn-ripple { position:relative; overflow:hidden; }
        .btn-ripple::after { content:''; position:absolute; border-radius:50%; background:rgba(255,255,255,.35); width:100px;height:100px; margin-left:-50px;margin-top:-50px; top:50%;left:50%; transform:scale(0); opacity:0; transition:none; }
        .btn-ripple:active::after { animation:ripple .5s linear; }

        /* Section title bar — sama homepage */
        .section-title-bar { display:inline-block; position:relative; }
        .section-title-bar::after { content:''; display:block; width:52px; height:4px; background:var(--primary); border-radius:9999px; margin-top:8px; }

        /* Card stagger */
        .card-stagger:nth-child(1){animation-delay:.05s}
        .card-stagger:nth-child(2){animation-delay:.15s}
        .card-stagger:nth-child(3){animation-delay:.25s}
        .card-stagger:nth-child(4){animation-delay:.35s}

        /* Cursor glow — sama homepage */
        #cursor-glow {
            pointer-events:none; position:fixed; border-radius:50%;
            width:340px; height:340px;
            background:radial-gradient(circle,rgba(26,141,163,0.18) 0%,transparent 70%);
            transform:translate(-50%,-50%);
            transition:left .18s ease,top .18s ease;
            z-index:0;
            animation:cursorGlow 3s ease-in-out infinite;
        }

        .stat-num { font-variant-numeric: tabular-nums; }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration:.01ms !important; transition-duration:.01ms !important; }
        }
    </style>

    {{-- Cursor glow — sama homepage --}}
    <div id="cursor-glow"></div>

    {{-- =====================================================
         SECTION 1 — HERO ABOUT
    ===================================================== --}}
    <section class="relative min-h-[92vh] flex items-center bg-gradient-to-br from-[#f0fbfc] via-white to-[#fafff7] overflow-hidden px-6 md:px-12 lg:px-20 py-20">

        {{-- Background blobs — sama homepage --}}
        <div class="blob-1 absolute -top-24 -left-24 w-80 h-80 rounded-full bg-[#1A8DA3]/10 blur-3xl pointer-events-none"></div>
        <div class="blob-2 absolute top-10 right-0 w-64 h-64 rounded-full bg-[#FFF59D]/60 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-96 h-40 rounded-full bg-[#1A8DA3]/05 blur-2xl pointer-events-none"></div>

        {{-- Decorative floating dots --}}
        <div class="float-el absolute top-20 right-1/4 w-3 h-3 rounded-full bg-[#1A8DA3]/30 pointer-events-none"></div>
        <div class="float-el absolute bottom-32 left-16 w-2 h-2 rounded-full bg-[#FFF59D] border border-yellow-300 pointer-events-none" style="animation-delay:1.5s"></div>

        <div class="relative z-10 max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            {{-- LEFT --}}
            <div class="space-y-7" data-aos="fade-right" data-aos-duration="750">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#e0f6fa] border border-[#1A8DA3]/20 text-[#1A8DA3] text-xs font-semibold tracking-widest uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#1A8DA3] animate-pulse"></span>
                    Tentang Kami
                </div>

                {{-- Headline --}}
                <h1 class="font-headline text-4xl md:text-5xl lg:text-[3.2rem] font-bold leading-tight text-gray-900">
                    Membangun Generasi
                    <span class="relative text-[#1A8DA3]">
                        Unggul
                        <svg class="absolute -bottom-1 left-0 w-full" height="6" viewBox="0 0 160 6" fill="none" preserveAspectRatio="none">
                            <path d="M0 4 Q40 0 80 4 Q120 8 160 4" stroke="#1A8DA3" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </span>
                    Sejak Dini
                </h1>

                {{-- Description --}}
                <p class="text-gray-500 text-base md:text-lg leading-relaxed max-w-lg">
                    {{ $school->about_intro ?? 'SDN Ciledug Barat berkomitmen menyediakan lingkungan pendidikan yang aman, inklusif, dan inovatif. Kami fokus pada pengembangan potensi akademik serta pembentukan karakter anak yang berintegritas dan siap menghadapi masa depan.' }}
                </p>

                {{-- Akreditasi badge --}}
                <div class="inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-md">
                    <div class="w-9 h-9 rounded-full bg-[#1A8DA3] flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-headline font-bold text-sm text-gray-900">Terakreditasi A Resmi</div>
                        <div class="text-xs text-gray-400">Badan Akreditasi Nasional S/M</div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="flex flex-wrap gap-4 pt-1">
                    <a href="{{ Route::has('kontak') ? route('kontak') : '#' }}"
                       class="btn-ripple group inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#1A8DA3] text-white font-semibold text-sm shadow-lg shadow-[#1A8DA3]/25 hover:bg-[#157a8e] hover:scale-105 transition-all duration-300">
                        Hubungi Kami
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#program"
                       class="btn-ripple group inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#FFF59D] text-gray-800 font-semibold text-sm border border-yellow-200 hover:bg-yellow-200 hover:scale-105 transition-all duration-300 shadow-sm">
                        Jelajahi Program
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- RIGHT — Hero Image --}}
            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left" data-aos-duration="850">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-72 h-72 rounded-full bg-[#1A8DA3]/18 blur-3xl"></div>
                </div>
                <div class="absolute top-0 right-6 w-28 h-28 rounded-full bg-[#FFF59D]/65 blur-2xl pointer-events-none"></div>

                <div id="about-hero-img" class="hero-img-wrap relative w-full max-w-lg cursor-none">
                    <div class="img-zoom rounded-3xl overflow-hidden border-[5px] border-white shadow-2xl shadow-[#1A8DA3]/20 relative z-10">
                        <img
                            src="{{ $school->about_image ?? 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=800&q=80' }}"
                            alt="SDN Ciledug Barat"
                            class="w-full h-80 md:h-96 object-cover"
                        >
                    </div>

                    {{-- Float card — tahun berdiri --}}
                    <div class="float-el absolute -bottom-5 -left-5 z-20 glass-card rounded-2xl px-5 py-3 shadow-xl border border-white/60">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-[#FFF59D] border border-yellow-200 flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-headline font-bold text-sm text-gray-800">Berdiri {{ $school->founded_year ?? '1985' }}</div>
                                <div class="text-xs text-gray-400">{{ now()->year - ($school->founded_year ?? 1985) }}+ tahun pengalaman</div>
                            </div>
                        </div>
                    </div>

                    {{-- Float badge top right --}}
                    <div class="float-el absolute -top-4 -right-4 z-20 rounded-2xl shadow-xl overflow-hidden" style="animation-delay:1s">
                        <div class="bg-white border border-gray-100 px-4 py-2.5 flex items-center gap-2.5">
                            <div class="w-1.5 h-8 rounded-full bg-gradient-to-b from-[#1A8DA3] to-[#FFF59D]"></div>
                            <div>
                                <div class="font-headline text-[9px] font-semibold tracking-widest text-gray-400 uppercase leading-none mb-0.5">Akreditasi</div>
                                <div class="font-headline text-sm font-bold text-gray-800">Nilai A</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =====================================================
         SECTION 2 — VISI & MISI
    ===================================================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-white">
        <div class="max-w-7xl mx-auto">

            {{-- Header --}}
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 mb-3">Visi & Misi</h2>
                <p class="text-gray-400 text-sm max-w-md mx-auto">Arah dan komitmen kami dalam menyelenggarakan pendidikan berkualitas.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Visi --}}
                <div class="group rounded-3xl border border-gray-100 bg-white p-8 shadow-sm hover:border-[#1A8DA3]/35 hover:shadow-xl hover-glow hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 rounded-2xl bg-[#e0f6fa] flex items-center justify-center mb-6 group-hover:bg-[#1A8DA3] transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#1A8DA3] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div class="text-xs font-semibold tracking-widest text-[#1A8DA3] uppercase mb-2">Visi Kami</div>
                    <h3 class="font-headline text-xl font-bold text-gray-900 mb-4 leading-snug">
                        {{ $school->vision_title ?? 'Sekolah Unggulan yang Melahirkan Generasi Berkarakter' }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        {{ $school->vision ?? 'Menjadi sekolah dasar unggulan yang menghasilkan lulusan berakhlak mulia, cerdas, kreatif, dan mandiri, serta mampu bersaing di era global dengan tetap menjunjung tinggi nilai-nilai budaya bangsa.' }}
                    </p>
                </div>

                {{-- Misi --}}
                <div class="group rounded-3xl border border-gray-100 bg-white p-8 shadow-sm hover:border-[#1A8DA3]/35 hover:shadow-xl hover-glow hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-2xl bg-yellow-50 flex items-center justify-center mb-6 group-hover:bg-[#FFF59D] transition-colors duration-300">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <div class="text-xs font-semibold tracking-widest text-yellow-600 uppercase mb-2">Misi Kami</div>
                    <h3 class="font-headline text-xl font-bold text-gray-900 mb-4 leading-snug">Langkah Nyata Menuju Pendidikan Berkualitas</h3>
                    <ul class="space-y-3">
                        @php
                        $missions = $school->mission ?? [
                            'Menyelenggarakan pembelajaran aktif, inovatif, kreatif, dan menyenangkan.',
                            'Mengembangkan bakat dan minat siswa melalui kegiatan intrakurikuler dan ekstrakurikuler.',
                            'Membangun karakter siswa yang berakhlak mulia, disiplin, dan bertanggung jawab.',
                            'Menjalin kemitraan harmonis antara sekolah, orang tua, dan masyarakat.',
                        ];
                        @endphp
                        @foreach((is_array($missions) ? $missions : [$missions]) as $m)
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="w-5 h-5 rounded-full bg-[#e0f6fa] flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3 h-3 text-[#1A8DA3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            {{ $m }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- =====================================================
         SECTION 3 — SEJARAH SEKOLAH
    ===================================================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-[#f8fffe]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            {{-- LEFT — image --}}
            <div class="relative" data-aos="fade-right" data-aos-duration="750">
                <div class="img-zoom rounded-3xl overflow-hidden shadow-xl border-4 border-white">
                    <img src="{{ $school->history_image ?? 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=700&q=80' }}"
                         alt="Sejarah SDN Ciledug Barat"
                         class="w-full h-96 object-cover">
                </div>
                {{-- Overlay card --}}
                <div class="float-el absolute -bottom-5 -right-5 glass-card rounded-2xl px-5 py-4 shadow-xl border border-white/60 z-10">
                    <div class="text-xs text-gray-400 font-medium mb-0.5">Berdiri Sejak</div>
                    <div class="font-headline text-3xl font-black text-[#1A8DA3]">{{ $school->founded_year ?? '1985' }}</div>
                </div>
                {{-- Decorative --}}
                <div class="absolute -top-5 -left-5 w-16 h-16 rounded-full border-4 border-[#1A8DA3]/20 pointer-events-none"></div>
                <div class="absolute -top-2 -left-2 w-6 h-6 rounded-full bg-[#FFF59D] border border-yellow-200 pointer-events-none"></div>
            </div>

            {{-- RIGHT — Content + Timeline --}}
            <div data-aos="fade-left" data-aos-duration="750">
                <div class="text-xs font-semibold tracking-widest text-[#1A8DA3] uppercase mb-3">Perjalanan Kami</div>
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-5">
                    Sejarah SDN Ciledug Barat
                </h2>
                <p class="text-gray-500 leading-relaxed mb-10 text-sm md:text-base">
                    {{ $school->history ?? 'SDN Ciledug Barat didirikan pada tahun 1985 sebagai salah satu sekolah dasar negeri yang melayani masyarakat Ciledug dan sekitarnya. Selama lebih dari tiga dekade, sekolah ini telah melewati berbagai tahapan pengembangan mulai dari renovasi sarana prasarana, pembaruan kurikulum, hingga pencapaian akreditasi A dari Badan Akreditasi Nasional.' }}
                </p>

                {{-- Timeline --}}
                @php
                $timeline = $school->timeline ?? [
                    ['year' => '1985', 'title' => 'Pendirian Sekolah',         'desc' => 'SDN Ciledug Barat resmi berdiri dan mulai menerima siswa angkatan pertama.'],
                    ['year' => '1998', 'title' => 'Renovasi Gedung Pertama',   'desc' => 'Renovasi besar-besaran untuk meningkatkan fasilitas belajar mengajar.'],
                    ['year' => '2010', 'title' => 'Perolehan Akreditasi A',    'desc' => 'Berhasil meraih akreditasi A dari BAN-S/M untuk pertama kalinya.'],
                    ['year' => '2023', 'title' => 'Era Digital & Inovasi',     'desc' => 'Integrasi teknologi pembelajaran dan pengembangan kurikulum merdeka belajar.'],
                ];
                @endphp

                <div class="relative space-y-0">
                    {{-- Vertical line --}}
                    <div class="absolute left-[18px] top-2 bottom-2 w-px bg-gray-100"></div>

                    @foreach($timeline as $i => $item)
                    <div class="relative flex gap-5 pb-8 last:pb-0" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        {{-- Dot --}}
                        <div class="flex-shrink-0 w-9 h-9 rounded-full bg-white border-2 border-[#1A8DA3] flex items-center justify-center z-10 t-dot">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#1A8DA3]"></div>
                        </div>
                        {{-- Content --}}
                        <div class="group bg-white rounded-2xl border border-gray-100 p-4 flex-1 hover:border-[#1A8DA3]/30 hover:shadow-md transition-all duration-250">
                            <div class="font-headline text-xs font-bold text-[#1A8DA3] mb-1">{{ is_array($item) ? $item['year'] : $item->year }}</div>
                            <div class="font-headline font-bold text-gray-800 text-sm mb-1">{{ is_array($item) ? $item['title'] : $item->title }}</div>
                            <div class="text-xs text-gray-400 leading-relaxed">{{ is_array($item) ? $item['desc'] : $item->desc }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- =====================================================
         SECTION 4 — NILAI-NILAI SEKOLAH
    ===================================================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-white">
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 mb-3">Nilai-Nilai Kami</h2>
                <p class="text-gray-400 text-sm max-w-sm mx-auto">Landasan karakter yang kami tanamkan pada setiap siswa sejak dini.</p>
            </div>

            @php
            $nilais = [
                ['judul'=>'Integritas',  'desc'=>'Membangun kejujuran dan tanggung jawab sebagai fondasi karakter siswa dalam setiap tindakan.', 'icon_bg'=>'bg-[#e0f6fa]', 'icon_color'=>'text-[#1A8DA3]', 'hover_border'=>'hover:border-[#1A8DA3]/35',
                 'icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['judul'=>'Disiplin',    'desc'=>'Menumbuhkan kebiasaan tertib dan konsisten agar siswa mampu mengelola diri dan waktu dengan baik.', 'icon_bg'=>'bg-yellow-50', 'icon_color'=>'text-yellow-600', 'hover_border'=>'hover:border-yellow-200',
                 'icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['judul'=>'Kreativitas', 'desc'=>'Mendorong siswa untuk berpikir inovatif, berani berkarya, dan mengekspresikan ide secara bebas.', 'icon_bg'=>'bg-purple-50', 'icon_color'=>'text-purple-500', 'hover_border'=>'hover:border-purple-200',
                 'icon'=>'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                ['judul'=>'Kepedulian', 'desc'=>'Menanamkan rasa empati dan kepekaan sosial agar siswa tumbuh menjadi individu yang peduli sesama.', 'icon_bg'=>'bg-rose-50', 'icon_color'=>'text-rose-500', 'hover_border'=>'hover:border-rose-200',
                 'icon'=>'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
            ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach($nilais as $i => $nilai)
                <div class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm {{ $nilai['hover_border'] }} hover:shadow-lg hover:-translate-y-1 hover-glow transition-all duration-300"
                     data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-12 h-12 rounded-2xl {{ $nilai['icon_bg'] }} flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                        <svg class="w-5 h-5 {{ $nilai['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $nilai['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="font-headline font-bold text-gray-900 mb-2">{{ $nilai['judul'] }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $nilai['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =====================================================
         SECTION 5 — KEUNGGULAN SEKOLAH
    ===================================================== --}}
    <section id="program" class="py-20 px-6 md:px-12 lg:px-20 bg-[#f8fffe]">
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 mb-3">Mengapa Memilih SDN Ciledug Barat?</h2>
                <p class="text-gray-400 text-sm max-w-md mx-auto">Kami hadir dengan komitmen penuh untuk memberikan pengalaman belajar terbaik.</p>
            </div>

            @php
            $keunggulan = [
                ['judul'=>'Guru Berpengalaman',     'desc'=>'Tenaga pengajar bersertifikat dengan pengalaman lebih dari 10 tahun di bidang pendidikan dasar.', 'icon_bg'=>'bg-[#e0f6fa]', 'icon_color'=>'text-[#1A8DA3]',
                 'icon'=>'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                ['judul'=>'Kurikulum Berkualitas',  'desc'=>'Menerapkan Kurikulum Merdeka dengan pendekatan pembelajaran aktif yang menyenangkan dan relevan.', 'icon_bg'=>'bg-yellow-50', 'icon_color'=>'text-yellow-600',
                 'icon'=>'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['judul'=>'Ekskul Beragam',         'desc'=>'Lebih dari 20 kegiatan ekstrakurikuler untuk mengasah bakat, minat, dan kreativitas siswa.', 'icon_bg'=>'bg-purple-50', 'icon_color'=>'text-purple-500',
                 'icon'=>'M13 10V3L4 14h7v7l9-11h-7z'],
                ['judul'=>'Lingkungan Aman',        'desc'=>'Area sekolah yang aman, bersih, dan ramah anak dengan pengawasan terpadu sepanjang waktu belajar.', 'icon_bg'=>'bg-green-50', 'icon_color'=>'text-green-600',
                 'icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['judul'=>'Fasilitas Memadai',      'desc'=>'Ruang kelas modern, perpustakaan, lapangan olahraga, laboratorium, dan fasilitas penunjang lengkap.', 'icon_bg'=>'bg-orange-50', 'icon_color'=>'text-orange-500',
                 'icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['judul'=>'Pendidikan Karakter',    'desc'=>'Program pembentukan karakter terintegrasi dalam seluruh mata pelajaran dan kegiatan sekolah.', 'icon_bg'=>'bg-rose-50', 'icon_color'=>'text-rose-500',
                 'icon'=>'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
            ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($keunggulan as $i => $item)
                <div class="group flex items-start gap-4 bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:border-gray-200 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300"
                     data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                    <div class="w-11 h-11 rounded-xl {{ $item['icon_bg'] }} flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 {{ $item['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $item['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-gray-800 text-sm mb-1.5">{{ $item['judul'] }}</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =====================================================
         SECTION 6 — STATISTIK
    ===================================================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-[#1A8DA3] relative overflow-hidden">

        {{-- BG texture blobs --}}
        <div class="absolute -top-16 -left-16 w-64 h-64 rounded-full bg-white/05 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -right-16 w-80 h-80 rounded-full bg-white/05 blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-headline text-3xl md:text-4xl font-bold text-white mb-2">SDN Ciledug Barat dalam Angka</h2>
                <p class="text-white/60 text-sm">Pencapaian nyata yang menjadi kebanggaan bersama.</p>
            </div>

            @php
            $stats = [
                ['angka'=>'500+', 'label'=>'Siswa Aktif',        'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                ['angka'=>'30+',  'label'=>'Guru & Staf',        'icon'=>'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                ['angka'=>'20+',  'label'=>'Ekstrakurikuler',    'icon'=>'M13 10V3L4 14h7v7l9-11h-7z'],
                ['angka'=>'A',    'label'=>'Nilai Akreditasi',   'icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ];
            @endphp

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach($stats as $i => $stat)
                <div class="group text-center bg-white/10 border border-white/15 rounded-3xl p-7 hover:bg-white/18 hover:border-white/30 hover:-translate-y-1 transition-all duration-300"
                     data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center mx-auto mb-4 group-hover:bg-white/25 transition-colors duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $stat['icon'] }}"/>
                        </svg>
                    </div>
                    <div class="font-headline text-4xl font-black text-white stat-num mb-1">{{ $stat['angka'] }}</div>
                    <div class="text-white/65 text-xs font-medium">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =====================================================
         SECTION 7 — CALL TO ACTION
    ===================================================== --}}
    <section class="py-20 px-6 md:px-12 lg:px-20 bg-white">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">

            {{-- Decorative blobs --}}
            <div class="relative">
                <div class="absolute -top-12 left-1/4 w-48 h-48 rounded-full bg-[#1A8DA3]/06 blur-3xl pointer-events-none"></div>
                <div class="absolute -top-8 right-1/4 w-32 h-32 rounded-full bg-[#FFF59D]/50 blur-2xl pointer-events-none"></div>

                <div class="relative z-10 bg-gradient-to-br from-[#f0fbfc] to-white border border-[#1A8DA3]/12 rounded-3xl p-12 shadow-sm">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#e0f6fa] border border-[#1A8DA3]/20 text-[#1A8DA3] text-xs font-semibold tracking-widest uppercase mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#1A8DA3] animate-pulse"></span>
                        Bergabung Bersama Kami
                    </div>

                    <h2 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        Bersama Membangun Masa Depan Anak
                    </h2>
                    <p class="text-gray-400 text-sm md:text-base leading-relaxed mb-8 max-w-xl mx-auto">
                        Percayakan pendidikan buah hati Anda kepada kami. Daftarkan sekarang dan jadilah bagian dari keluarga besar SDN Ciledug Barat.
                    </p>

                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="{{ Route::has('kontak') ? route('kontak') : '#' }}"
                           class="btn-ripple group inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-[#1A8DA3] text-white font-semibold text-sm shadow-lg shadow-[#1A8DA3]/25 hover:bg-[#157a8e] hover:scale-105 transition-all duration-300">
                            Hubungi Kami
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="{{ Route::has('kegiatan.ekskul') ? route('kegiatan.ekskul') : '#' }}"
                           class="btn-ripple group inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-[#FFF59D] text-gray-800 font-semibold text-sm border border-yellow-200 hover:bg-yellow-200 hover:scale-105 transition-all duration-300 shadow-sm">
                            Jelajahi Program
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =====================================================
         SCRIPTS — sama persis homepage
    ===================================================== --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Init AOS
        AOS.init({ once: true, offset: 80, easing: 'ease-out-cubic', duration: 700 });

        // Cursor glow follow
        const glow = document.getElementById('cursor-glow');
        document.addEventListener('mousemove', (e) => {
            glow.style.left = e.clientX + 'px';
            glow.style.top  = e.clientY + 'px';
        });

        // Hero image tilt on mousemove
        const heroImg = document.getElementById('about-hero-img');
        if (heroImg) {
            heroImg.addEventListener('mousemove', (e) => {
                const rect = heroImg.getBoundingClientRect();
                const cx   = rect.left + rect.width  / 2;
                const cy   = rect.top  + rect.height / 2;
                const dx   = (e.clientX - cx) / rect.width;
                const dy   = (e.clientY - cy) / rect.height;
                heroImg.style.transform = `perspective(900px) rotateY(${dx * 8}deg) rotateX(${-dy * 6}deg)`;
            });
            heroImg.addEventListener('mouseleave', () => {
                heroImg.style.transform = 'perspective(900px) rotateY(0deg) rotateX(0deg)';
            });
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
            });
        });

        // Stagger card reveal on scroll
        const cards = document.querySelectorAll('.card-stagger');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'staggerReveal 0.55s ease forwards';
                    entry.target.style.opacity = '1';
                }
            });
        }, { threshold: 0.15 });
        cards.forEach(card => { card.style.opacity = '0'; observer.observe(card); });
    </script>

</x-layout>
