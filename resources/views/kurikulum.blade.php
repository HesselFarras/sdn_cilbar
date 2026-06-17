<x-layout>
    <x-slot:title>Kurikulum - SDN Ciledug Barat</x-slot:title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .font-headline { font-family: 'Lexend', sans-serif; }
        .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }

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
            background: #1A8DA3;
            border-radius: 9999px;
            transition: width 0.4s ease;
        }
        .animated-underline:hover::after { width: 100%; }

        /* Hover glow primary */
        .hover-glow:hover {
            box-shadow: 0 0 0 3px rgba(26, 141, 163, 0.15), 0 8px 30px rgba(26, 141, 163, 0.12);
        }

        /* Counter animation */
        @keyframes countUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .counter-animate { animation: countUp 0.6s ease forwards; }

        /* Floating blob */
        @keyframes floatBlob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%       { transform: translate(10px, -15px) scale(1.05); }
            66%       { transform: translate(-8px, 8px) scale(0.97); }
        }
        .blob-float { animation: floatBlob 8s ease-in-out infinite; }

        /* Stagger cards */
        [data-stagger] { opacity: 0; transform: translateY(24px); transition: opacity 0.5s ease, transform 0.5s ease; }
        [data-stagger].stagger-visible { opacity: 1; transform: translateY(0); }

        /* Glass */
        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>

    <div class="font-body bg-[#F8F9FA] min-h-screen text-slate-700 antialiased overflow-x-hidden">

        {{-- =============================================
             SECTION 1 — HERO KURIKULUM
        ============================================= --}}
        <section class="relative overflow-hidden bg-gradient-to-br from-[#0d5f72] via-[#1A8DA3] to-[#1a7a8a] pt-28 pb-20 lg:pt-36 lg:pb-28">

            {{-- Decorative blobs --}}
            <div class="pointer-events-none absolute -top-20 -left-20 w-80 h-80 rounded-full bg-white/5 blob-float"></div>
            <div class="pointer-events-none absolute top-10 right-10 w-56 h-56 rounded-full bg-[#FFF59D]/10 blob-float" style="animation-delay:2s"></div>
            <div class="pointer-events-none absolute bottom-0 left-1/2 -translate-x-1/2 w-[600px] h-40 bg-white/5 blur-3xl rounded-full"></div>

            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    {{-- KIRI --}}
                    <div data-aos="fade-right" data-aos-duration="800">
                        {{-- Badge --}}
                        <span class="inline-flex items-center gap-2 bg-[#FFF59D] text-slate-800 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wide mb-6 shadow-sm">
                            <svg class="w-3.5 h-3.5 text-[#1A8DA3]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            Kurikulum
                        </span>

                        <h1 class="font-headline text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight mb-6">
                            Kurikulum yang Membangun<br>
                            <span class="text-[#FFF59D]">Generasi Cerdas</span> dan Berkarakter
                        </h1>

                        <p class="text-slate-200 text-base sm:text-lg leading-relaxed mb-8 max-w-lg">
                            SDN Ciledug Barat menerapkan kurikulum yang dirancang untuk mengembangkan kemampuan akademik, karakter, kreativitas, dan keterampilan abad ke-21 secara seimbang.
                        </p>

                        {{-- Poin --}}
                        <ul class="space-y-3 mb-10">
                            @foreach([
                                'Berorientasi pada Kompetensi',
                                'Penguatan Karakter Siswa',
                                'Pembelajaran Aktif dan Kreatif'
                            ] as $point)
                            <li class="flex items-center gap-3 text-white font-medium">
                                <span class="flex-shrink-0 w-5 h-5 rounded-full bg-[#FFF59D] flex items-center justify-center">
                                    <svg class="w-3 h-3 text-[#1A8DA3]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                {{ $point }}
                            </li>
                            @endforeach
                        </ul>

                        {{-- Buttons --}}
                        <div class="flex flex-wrap gap-4">
                            <a href="#struktur-pembelajaran"
                               class="inline-flex items-center gap-2 bg-white text-[#1A8DA3] font-semibold px-6 py-3 rounded-2xl shadow-lg hover:bg-[#FFF59D] hover:text-slate-800 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                Lihat Struktur Pembelajaran
                            </a>
                            <a href="#dokumen-kurikulum"
                               class="inline-flex items-center gap-2 bg-transparent border-2 border-white/60 text-white font-semibold px-6 py-3 rounded-2xl hover:bg-white/10 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download Kurikulum
                            </a>
                        </div>
                    </div>

                    {{-- KANAN — Gambar --}}
                    <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200" class="relative flex justify-center lg:justify-end">
                        {{-- Yellow blob decorative --}}
                        <div class="absolute -bottom-6 -right-6 w-40 h-40 rounded-full bg-[#FFF59D]/30 blur-2xl pointer-events-none"></div>
                        <div class="absolute -top-6 -left-6 w-28 h-28 rounded-full bg-white/10 blur-xl pointer-events-none"></div>

                        <div class="relative rounded-3xl overflow-hidden border-4 border-white/30 shadow-2xl w-full max-w-md group">
                            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=700&q=80"
                                 alt="Aktivitas belajar siswa SDN Ciledug Barat"
                                 class="w-full h-80 lg:h-96 object-cover transition-transform duration-700 group-hover:scale-105">
                            {{-- Overlay badge --}}
                            <div class="absolute bottom-4 left-4 glass rounded-2xl px-4 py-2 shadow-lg">
                                <p class="text-xs text-slate-500 font-medium">Kurikulum</p>
                                <p class="text-sm font-bold text-slate-800 font-headline">Merdeka Belajar</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- =============================================
             SECTION 2 — PENGANTAR KURIKULUM
        ============================================= --}}
        <section class="py-20 lg:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                {{-- Section heading --}}
                <div class="text-center mb-14" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Tentang Kurikulum
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Pengantar Kurikulum
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                        Kurikulum yang mendukung perkembangan akademik dan karakter siswa.
                    </p>
                </div>

                @php
                    $introCards = [
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                            'title' => 'Kurikulum yang Digunakan',
                            'desc'  => 'SDN Ciledug Barat mengimplementasikan Kurikulum Merdeka yang berfokus pada pendalaman konsep esensial dan penguatan kompetensi siswa secara holistik.',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
                            'title' => 'Pendekatan Pembelajaran',
                            'desc'  => 'Pembelajaran berbasis proyek, diskusi interaktif, dan eksplorasi mandiri mendorong siswa berpikir kritis, kreatif, dan kolaboratif dalam setiap proses belajar.',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>',
                            'title' => 'Fokus Pengembangan Siswa',
                            'desc'  => 'Setiap program dirancang memperhatikan aspek kognitif, afektif, dan psikomotorik untuk menghasilkan pribadi yang unggul secara intelektual dan berbudi pekerti luhur.',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>',
                            'title' => 'Integrasi Karakter & Kompetensi',
                            'desc'  => 'Nilai-nilai Pancasila dan karakter mulia diintegrasikan ke dalam setiap mata pelajaran, membangun pondasi moral yang kuat bagi generasi penerus bangsa.',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($introCards as $i => $card)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}"
                         class="group bg-white rounded-3xl border border-slate-100 shadow-sm p-6 hover:border-[#1A8DA3]/40 hover-glow transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-2xl bg-[#1A8DA3]/10 text-[#1A8DA3] flex items-center justify-center mb-5 group-hover:bg-[#1A8DA3] group-hover:text-white transition-colors duration-300">
                            {!! $card['icon'] !!}
                        </div>
                        <h3 class="font-headline font-bold text-slate-900 text-base mb-2">{{ $card['title'] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $card['desc'] }}</p>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 3 — STRUKTUR PEMBELAJARAN
        ============================================= --}}
        <section id="struktur-pembelajaran" class="py-20 lg:py-28 bg-[#F8F9FA]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Mata Pelajaran
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Struktur Pembelajaran
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                        Mata pelajaran yang membentuk fondasi kompetensi siswa.
                    </p>
                </div>

                @php
                    // Data siap dari database: @foreach($subjects as $subject)
                    $subjects = $subjects ?? [
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>',
                            'name' => 'Matematika',
                            'desc' => 'Penguasaan numerasi dasar, logika berpikir, dan pemecahan masalah secara sistematis.',
                            'jam'  => '5 jam/minggu',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                            'name' => 'Bahasa Indonesia',
                            'desc' => 'Pengembangan kemampuan literasi, komunikasi lisan dan tulisan yang efektif.',
                            'jam'  => '6 jam/minggu',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>',
                            'name' => 'IPA',
                            'desc' => 'Eksplorasi alam, sains dasar, dan teknologi sederhana berbasis eksperimen.',
                            'jam'  => '3 jam/minggu',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/></svg>',
                            'name' => 'IPS',
                            'desc' => 'Mengenal lingkungan sosial, budaya, sejarah bangsa, dan kewarganegaraan.',
                            'jam'  => '3 jam/minggu',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg>',
                            'name' => 'PPKn',
                            'desc' => 'Pembentukan karakter Pancasila, nilai kebangsaan, dan kewarganegaraan aktif.',
                            'jam'  => '2 jam/minggu',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
                            'name' => 'PJOK',
                            'desc' => 'Kesehatan fisik, olahraga, dan pengembangan gaya hidup sehat sejak dini.',
                            'jam'  => '4 jam/minggu',
                        ],
                        [
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>',
                            'name' => 'Seni Budaya',
                            'desc' => 'Pengembangan ekspresi estetika, kreativitas seni, dan penghargaan budaya lokal.',
                            'jam'  => '2 jam/minggu',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    @foreach($subjects as $i => $subject)
                    <div data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}"
                         class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-1 transition-all duration-300 cursor-default">
                        <div class="w-11 h-11 rounded-xl bg-[#1A8DA3]/10 text-[#1A8DA3] flex items-center justify-center mb-4 group-hover:bg-[#1A8DA3] group-hover:text-white transition-colors duration-300">
                            {!! $subject['icon'] !!}
                        </div>
                        <h3 class="font-headline font-bold text-slate-900 text-base mb-1.5">{{ $subject['name'] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-3">{{ $subject['desc'] }}</p>
                        @if(!empty($subject['jam']))
                        <span class="inline-block text-xs font-semibold text-[#1A8DA3] bg-[#1A8DA3]/8 px-3 py-1 rounded-full">
                            {{ $subject['jam'] }}
                        </span>
                        @endif
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 4 — PROGRAM UNGGULAN
        ============================================= --}}
        <section class="py-20 lg:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Program Sekolah
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Program Unggulan
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                        Fokus pengembangan kompetensi siswa SDN Ciledug Barat.
                    </p>
                </div>

                @php
                    $programs = $programs ?? [
                        [
                            'icon'    => '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                            'title'   => 'Literasi',
                            'color'   => 'from-blue-50 to-blue-100 border-blue-200',
                            'icon_bg' => 'bg-blue-100 text-blue-600',
                            'desc'    => 'Membangun budaya membaca kritis dan kemampuan memahami berbagai teks secara mendalam.',
                            'manfaat' => ['Membaca 15 menit/hari', 'Pojok Baca di kelas', 'Jurnal literasi siswa'],
                        ],
                        [
                            'icon'    => '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>',
                            'title'   => 'Numerasi',
                            'color'   => 'from-emerald-50 to-emerald-100 border-emerald-200',
                            'icon_bg' => 'bg-emerald-100 text-emerald-600',
                            'desc'    => 'Penerapan matematika praktis dalam kehidupan sehari-hari dan pemecahan masalah nyata.',
                            'manfaat' => ['Soal kontekstual', 'Matematika berbasis proyek', 'Kompetisi numerasi'],
                        ],
                        [
                            'icon'    => '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>',
                            'title'   => 'Pendidikan Karakter',
                            'color'   => 'from-rose-50 to-rose-100 border-rose-200',
                            'icon_bg' => 'bg-rose-100 text-rose-600',
                            'desc'    => 'Penerapan 5S (Senyum, Sapa, Salam, Sopan, Santun) secara konsisten dalam kehidupan sekolah.',
                            'manfaat' => ['Program 5S harian', 'Kultum pagi', 'Pembiasaan positif'],
                        ],
                        [
                            'icon'    => '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>',
                            'title'   => 'Projek P5',
                            'color'   => 'from-amber-50 to-yellow-100 border-yellow-200',
                            'icon_bg' => 'bg-yellow-100 text-yellow-600',
                            'desc'    => 'Projek Penguatan Profil Pelajar Pancasila berbasis kearifan lokal dan tema aktual.',
                            'manfaat' => ['Tema kearifan lokal', 'Pameran karya siswa', 'Refleksi kolaboratif'],
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($programs as $i => $program)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}"
                         class="group bg-gradient-to-br {{ $program['color'] }} border rounded-3xl p-6 hover:shadow-xl hover:border-[#1A8DA3]/40 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl {{ $program['icon_bg'] }} flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                            {!! $program['icon'] !!}
                        </div>
                        <h3 class="font-headline font-bold text-slate-900 text-lg mb-2">{{ $program['title'] }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">{{ $program['desc'] }}</p>
                        <ul class="space-y-1.5">
                            @foreach($program['manfaat'] as $m)
                            <li class="flex items-center gap-2 text-xs text-slate-600">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1A8DA3] flex-shrink-0"></span>
                                {{ $m }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 5 — IMPLEMENTASI P5
        ============================================= --}}
        <section class="py-20 lg:py-28 bg-gradient-to-br from-[#0d5f72] via-[#1A8DA3] to-[#1a7a8a] relative overflow-hidden">

            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-white/5 blob-float"></div>
                <div class="absolute bottom-0 left-10 w-64 h-64 rounded-full bg-[#FFF59D]/10 blob-float" style="animation-delay:3s"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-white/30 text-white text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-white/10">
                        Kurikulum Merdeka
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-white tracking-tight">
                        Projek Penguatan Profil Pelajar Pancasila
                    </h2>
                    <p class="text-slate-200 mt-3 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                        P5 adalah pendekatan pembelajaran berbasis proyek yang dirancang untuk menguatkan pencapaian kompetensi
                        dan karakter sesuai Profil Pelajar Pancasila melalui eksplorasi isu-isu nyata.
                    </p>
                </div>

                @php
                    $steps = [
                        [
                            'no'    => '01',
                            'title' => 'Eksplorasi',
                            'desc'  => 'Siswa mengidentifikasi tema, menggali informasi, dan memahami konteks permasalahan nyata di lingkungan sekitar.',
                            'icon'  => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>',
                        ],
                        [
                            'no'    => '02',
                            'title' => 'Diskusi',
                            'desc'  => 'Kelompok siswa berdiskusi, bertukar ide, dan merumuskan solusi kreatif bersama guru sebagai fasilitator.',
                            'icon'  => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>',
                        ],
                        [
                            'no'    => '03',
                            'title' => 'Implementasi',
                            'desc'  => 'Siswa mewujudkan ide menjadi karya nyata: produk, aksi sosial, atau solusi inovatif yang berdampak.',
                            'icon'  => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                        ],
                        [
                            'no'    => '04',
                            'title' => 'Presentasi Hasil',
                            'desc'  => 'Siswa mempresentasikan karya kepada komunitas sekolah, orang tua, dan lingkungan sekitar sebagai bentuk pertanggungjawaban.',
                            'icon'  => '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($steps as $i => $step)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}"
                         class="relative group glass rounded-3xl border border-white/20 p-6 hover:border-white/40 hover:bg-white/80 transition-all duration-300 hover:-translate-y-1">

                        {{-- Connector line (desktop only) --}}
                        @if(!$loop->last)
                        <div class="hidden lg:block absolute top-10 -right-3 w-6 border-t-2 border-dashed border-white/30 z-10"></div>
                        @endif

                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-white/20 group-hover:bg-[#1A8DA3] text-white flex items-center justify-center transition-colors duration-300">
                                {!! $step['icon'] !!}
                            </div>
                            <span class="font-headline font-extrabold text-[#FFF59D] text-2xl">{{ $step['no'] }}</span>
                        </div>

                        <h3 class="font-headline font-bold text-white text-base mb-2">{{ $step['title'] }}</h3>
                        <p class="text-slate-200 text-sm leading-relaxed group-hover:text-slate-600 transition-colors duration-300">{{ $step['desc'] }}</p>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 6 — DOWNLOAD DOKUMEN
        ============================================= --}}
        <section id="dokumen-kurikulum" class="py-20 lg:py-28 bg-[#F8F9FA]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Unduh Dokumen
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Dokumen Kurikulum
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                        Unduh dokumen resmi kurikulum dan modul pembelajaran.
                    </p>
                </div>

                @php
                    // Data dari database: @foreach($documents as $document)
                    $documents = $documents ?? [
                        [
                            'id'      => 1,
                            'name'    => 'Kurikulum Sekolah 2024/2025',
                            'size'    => '2.4 MB',
                            'updated' => '01 Juli 2024',
                            'type'    => 'PDF',
                        ],
                        [
                            'id'      => 2,
                            'name'    => 'Modul Pembelajaran Kelas 1–3',
                            'size'    => '5.1 MB',
                            'updated' => '15 Juli 2024',
                            'type'    => 'PDF',
                        ],
                        [
                            'id'      => 3,
                            'name'    => 'Kalender Akademik 2024/2025',
                            'size'    => '890 KB',
                            'updated' => '01 Juli 2024',
                            'type'    => 'PDF',
                        ],
                        [
                            'id'      => 4,
                            'name'    => 'Panduan Projek P5',
                            'size'    => '3.2 MB',
                            'updated' => '10 Agustus 2024',
                            'type'    => 'PDF',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @foreach($documents as $i => $document)
                    <div data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}"
                         class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-1 transition-all duration-300">

                        {{-- PDF Icon --}}
                        <div class="w-12 h-14 bg-red-50 border border-red-100 rounded-xl flex items-center justify-center mb-5 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6M9 17h3"/>
                            </svg>
                        </div>

                        <span class="inline-block text-xs font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-md mb-2">{{ $document['type'] ?? 'PDF' }}</span>
                        <h3 class="font-headline font-bold text-slate-900 text-sm mb-3 leading-snug">{{ $document['name'] }}</h3>

                        <div class="flex items-center justify-between text-xs text-slate-400 mb-5">
                            <span>{{ $document['size'] }}</span>
                            <span>{{ $document['updated'] }}</span>
                        </div>

                        <a href="{{ route('documents.download', $document['id']) }}"
                           class="flex items-center justify-center gap-2 w-full bg-[#1A8DA3]/10 text-[#1A8DA3] font-semibold text-sm py-2.5 rounded-xl hover:bg-[#1A8DA3] hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 7 — STATISTIK PEMBELAJARAN
        ============================================= --}}
        <section class="py-20 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <h2 class="font-headline text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                        Angka yang Bicara
                    </h2>
                    <p class="text-slate-500 mt-2 text-sm">Komitmen kami dalam angka dan pencapaian nyata.</p>
                </div>

                @php
                    $stats = [
                        [
                            'value' => '7',
                            'suffix' => '+',
                            'label' => 'Mata Pelajaran Inti',
                            'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                        ],
                        [
                            'value' => '4',
                            'suffix' => '',
                            'label' => 'Program Unggulan',
                            'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>',
                        ],
                        [
                            'value' => '100',
                            'suffix' => '%',
                            'label' => 'Implementasi P5',
                            'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>',
                        ],
                        [
                            'value' => 'A',
                            'suffix' => '',
                            'label' => 'Akreditasi Sekolah',
                            'icon'  => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($stats as $i => $stat)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}"
                         class="group text-center bg-gradient-to-br from-[#F8F9FA] to-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 rounded-2xl bg-[#1A8DA3]/10 text-[#1A8DA3] flex items-center justify-center mx-auto mb-4 group-hover:bg-[#1A8DA3] group-hover:text-white transition-colors duration-300">
                            {!! $stat['icon'] !!}
                        </div>
                        <div class="font-headline text-4xl font-extrabold text-[#1A8DA3] mb-1" x-data="counterAnim('{{ $stat['value'] }}', '{{ $stat['suffix'] }}')" x-init="init()" x-text="display">
                            {{ $stat['value'] }}{{ $stat['suffix'] }}
                        </div>
                        <p class="text-slate-600 text-sm font-medium">{{ $stat['label'] }}</p>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 8 — CALL TO ACTION
        ============================================= --}}
        <section class="py-20 lg:py-28 bg-[#F8F9FA]">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center" data-aos="fade-up">

                <div class="relative bg-gradient-to-br from-[#0d5f72] via-[#1A8DA3] to-[#1a7a8a] rounded-3xl overflow-hidden p-10 lg:p-16 shadow-2xl">

                    {{-- Blobs --}}
                    <div class="pointer-events-none absolute top-0 right-0 w-64 h-64 rounded-full bg-white/5 blob-float"></div>
                    <div class="pointer-events-none absolute bottom-0 left-0 w-48 h-48 rounded-full bg-[#FFF59D]/10 blob-float" style="animation-delay:2s"></div>

                    <div class="relative">
                        <span class="inline-block bg-[#FFF59D] text-slate-800 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wide mb-6">
                            Punya Pertanyaan?
                        </span>

                        <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight mb-4">
                            Ingin Mengetahui Program Akademik Kami<br class="hidden sm:block"> Lebih Lanjut?
                        </h2>

                        <p class="text-slate-200 text-sm sm:text-base leading-relaxed max-w-xl mx-auto mb-10">
                            Tim kami siap membantu Anda memahami program pembelajaran, jadwal akademik, dan berbagai kegiatan unggulan SDN Ciledug Barat.
                        </p>

                        <div class="flex flex-wrap gap-4 justify-center">
                            {{-- Ganti '/kontak' dengan route yang sesuai di proyek Anda --}}
                            <a href="/kontak"
                               class="inline-flex items-center gap-2 bg-white text-[#1A8DA3] font-semibold px-7 py-3.5 rounded-2xl shadow-lg hover:bg-[#FFF59D] hover:text-slate-800 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                Hubungi Kami
                            </a>
                            {{-- Ganti dengan route name kalender yang ada di web.php Anda --}}
                            <a href="{{ route('akademik.kalender') }}"
                               class="inline-flex items-center gap-2 bg-transparent border-2 border-white/60 text-white font-semibold px-7 py-3.5 rounded-2xl hover:bg-white/10 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Lihat Kalender Akademik
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>{{-- end wrapper --}}

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        // Init AOS
        AOS.init({
            once: true,
            duration: 700,
            easing: 'ease-out-cubic',
            offset: 60,
        });

        // Alpine counter animation component
        document.addEventListener('alpine:init', () => {
            Alpine.data('counterAnim', (target, suffix) => ({
                display: '0' + suffix,
                init() {
                    // Only animate numeric values
                    if (isNaN(parseInt(target))) {
                        this.display = target + suffix;
                        return;
                    }
                    const end = parseInt(target);
                    const duration = 1500;
                    const step = Math.ceil(end / (duration / 16));
                    let current = 0;
                    const observer = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting) {
                            observer.disconnect();
                            const timer = setInterval(() => {
                                current = Math.min(current + step, end);
                                this.display = current + suffix;
                                if (current >= end) clearInterval(timer);
                            }, 16);
                        }
                    }, { threshold: 0.5 });
                    observer.observe(this.$el);
                }
            }));
        });
    </script>

</x-layout>
