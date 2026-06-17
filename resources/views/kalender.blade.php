<x-layout>
    <x-slot:title>Kalender Akademik - SDN Ciledug Barat</x-slot:title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .font-headline { font-family: 'Lexend', sans-serif; }
        .font-body     { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Blob float */
        @keyframes floatBlob {
            0%,100% { transform: translate(0,0) scale(1); }
            33%      { transform: translate(12px,-16px) scale(1.05); }
            66%      { transform: translate(-8px,10px) scale(0.97); }
        }
        .blob-float { animation: floatBlob 9s ease-in-out infinite; }

        /* Hover glow */
        .hover-glow:hover {
            box-shadow: 0 0 0 3px rgba(26,141,163,.15), 0 8px 30px rgba(26,141,163,.12);
        }

        /* Glass */
        .glass {
            background: rgba(255,255,255,.72);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        /* Timeline line */
        .timeline-line::before {
            content: '';
            position: absolute;
            left: 19px;
            top: 44px;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #1A8DA3 0%, rgba(26,141,163,.1) 100%);
        }

        /* Countdown pulse */
        @keyframes pulse-ring {
            0%   { box-shadow: 0 0 0 0 rgba(26,141,163,.4); }
            70%  { box-shadow: 0 0 0 10px rgba(26,141,163,0); }
            100% { box-shadow: 0 0 0 0 rgba(26,141,163,0); }
        }
        .pulse-ring { animation: pulse-ring 2s ease-out infinite; }

        /* Animated underline */
        .animated-underline { position: relative; display: inline-block; }
        .animated-underline::after {
            content: ''; position: absolute; bottom: -4px; left: 0;
            width: 0; height: 3px; background: #1A8DA3;
            border-radius: 9999px; transition: width .4s ease;
        }
        .animated-underline:hover::after { width: 100%; }

        /* Select custom */
        select.custom-select {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%231A8DA3' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 18px;
        }
    </style>

    <div class="font-body bg-[#F8F9FA] min-h-screen text-slate-700 antialiased overflow-x-hidden"
         x-data="kalenderApp()" x-init="init()">

        {{-- =============================================
             SECTION 1 — HERO
        ============================================= --}}
        <section class="relative overflow-hidden bg-gradient-to-br from-[#0d5f72] via-[#1A8DA3] to-[#1a7a8a] pt-28 pb-20 lg:pt-36 lg:pb-28">

            {{-- Decorative blobs --}}
            <div class="pointer-events-none absolute -top-24 -left-16 w-80 h-80 rounded-full bg-white/5 blob-float"></div>
            <div class="pointer-events-none absolute top-8 right-8 w-52 h-52 rounded-full bg-[#FFF59D]/10 blob-float" style="animation-delay:2.5s"></div>
            <div class="pointer-events-none absolute bottom-0 left-1/2 -translate-x-1/2 w-[700px] h-32 bg-white/5 blur-3xl rounded-full"></div>

            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    {{-- KIRI --}}
                    <div data-aos="fade-right" data-aos-duration="800">
                        <span class="inline-flex items-center gap-2 bg-[#FFF59D] text-slate-800 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wide mb-6 shadow-sm">
                            <svg class="w-3.5 h-3.5 text-[#1A8DA3]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Kalender Akademik
                        </span>

                        <h1 class="font-headline text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight mb-6">
                            Jadwal Kegiatan Akademik<br>
                            <span class="text-[#FFF59D]">Tahun Ajaran</span>
                            @if(isset($activeYear))
                                <span class="text-[#FFF59D]">{{ $activeYear->year }}</span>
                            @endif
                        </h1>

                        <p class="text-slate-200 text-base sm:text-lg leading-relaxed mb-8 max-w-lg">
                            Temukan informasi penting mengenai kegiatan pembelajaran, ujian, libur sekolah, dan agenda akademik SDN Ciledug Barat selama satu tahun ajaran.
                        </p>

                        <ul class="space-y-3 mb-10">
                            @foreach(['Jadwal Terupdate', 'Informasi Resmi Sekolah', 'Dapat Diunduh'] as $point)
                            <li class="flex items-center gap-3 text-white font-medium">
                                <span class="flex-shrink-0 w-5 h-5 rounded-full bg-[#FFF59D] flex items-center justify-center">
                                    <svg class="w-3 h-3 text-[#1A8DA3]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                {{ $point }}
                            </li>
                            @endforeach
                        </ul>

                        <div class="flex flex-wrap gap-4">
                            <a href="#kalender-akademik"
                               class="inline-flex items-center gap-2 bg-white text-[#1A8DA3] font-semibold px-6 py-3 rounded-2xl shadow-lg hover:bg-[#FFF59D] hover:text-slate-800 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Lihat Jadwal
                            </a>
                            <a href="#download-kalender"
                               class="inline-flex items-center gap-2 bg-transparent border-2 border-white/60 text-white font-semibold px-6 py-3 rounded-2xl hover:bg-white/10 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download Kalender
                            </a>
                        </div>
                    </div>

                    {{-- KANAN --}}
                    <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200" class="relative flex justify-center lg:justify-end">
                        <div class="absolute -bottom-6 -right-6 w-40 h-40 rounded-full bg-[#FFF59D]/30 blur-2xl pointer-events-none"></div>
                        <div class="absolute -top-6 -left-6 w-28 h-28 rounded-full bg-white/10 blur-xl pointer-events-none"></div>

                        <div class="relative rounded-3xl overflow-hidden border-4 border-white/30 shadow-2xl w-full max-w-md group">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=700&q=80"
                                 alt="Kegiatan akademik SDN Ciledug Barat"
                                 class="w-full h-80 lg:h-96 object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute bottom-4 left-4 glass rounded-2xl px-4 py-2 shadow-lg">
                                <p class="text-xs text-slate-500 font-medium">Tahun Ajaran</p>
                                <p class="text-sm font-bold text-slate-800 font-headline">
                                    {{ isset($activeYear) ? $activeYear->year : '2025/2026' }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- =============================================
             SECTION 2 — FILTER TAHUN AJARAN
        ============================================= --}}
        <section class="py-10 bg-white border-b border-slate-100 sticky top-0 z-40 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">

                    <div>
                        <p class="text-xs text-slate-400 font-medium uppercase tracking-wide mb-1">Filter</p>
                        <h2 class="font-headline font-bold text-slate-900 text-lg">Pilih Tahun Ajaran</h2>
                    </div>

                    <form method="GET" action="{{ route('akademik.kalender') }}" class="flex items-center gap-3">
                        <select name="year_id"
                                onchange="this.form.submit()"
                                class="custom-select font-body text-sm text-slate-700 bg-white border-2 border-slate-200 rounded-xl px-4 py-2.5 pr-10 focus:outline-none focus:border-[#1A8DA3] hover:border-[#1A8DA3] transition-colors duration-200 cursor-pointer shadow-sm min-w-[180px]">
                            @forelse($academicYears ?? [] as $year)
                            <option value="{{ $year->id }}" {{ (isset($activeYear) && $activeYear->id === $year->id) ? 'selected' : '' }}>
                                Tahun Ajaran {{ $year->year }}
                            </option>
                            @empty
                            <option>Belum ada data</option>
                            @endforelse
                        </select>

                        {{-- Badge tahun aktif --}}
                        @if(isset($activeYear) && $activeYear->is_active)
                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Aktif
                        </span>
                        @endif
                    </form>

                </div>
            </div>
        </section>

        {{-- =============================================
             SECTION 3 — TIMELINE KALENDER AKADEMIK
        ============================================= --}}
        <section id="kalender-akademik" class="py-20 lg:py-28 bg-[#F8F9FA]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Agenda Resmi
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Kalender Tahun Ajaran
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                        Seluruh agenda akademik resmi SDN Ciledug Barat dalam satu tampilan.
                    </p>
                </div>

                @php
                    // Mapping kategori → warna & icon
                    $categoryConfig = [
                        'Semester'         => ['color' => 'bg-[#1A8DA3]',   'light' => 'bg-[#1A8DA3]/10 text-[#1A8DA3] border-[#1A8DA3]/20',   'dot' => 'bg-[#1A8DA3]'],
                        'Ujian'            => ['color' => 'bg-violet-500',   'light' => 'bg-violet-50 text-violet-700 border-violet-200',          'dot' => 'bg-violet-500'],
                        'Libur'            => ['color' => 'bg-amber-500',    'light' => 'bg-amber-50 text-amber-700 border-amber-200',             'dot' => 'bg-amber-400'],
                        'Rapat'            => ['color' => 'bg-slate-500',    'light' => 'bg-slate-100 text-slate-700 border-slate-200',            'dot' => 'bg-slate-400'],
                        'PPDB'             => ['color' => 'bg-rose-500',     'light' => 'bg-rose-50 text-rose-700 border-rose-200',               'dot' => 'bg-rose-500'],
                        'Kegiatan Sekolah' => ['color' => 'bg-emerald-500',  'light' => 'bg-emerald-50 text-emerald-700 border-emerald-200',       'dot' => 'bg-emerald-500'],
                    ];
                    $defaultConfig = ['color' => 'bg-slate-400', 'light' => 'bg-slate-100 text-slate-700 border-slate-200', 'dot' => 'bg-slate-400'];
                @endphp

                @forelse($calendarEvents ?? [] as $index => $event)
                @php
                    $cfg = $categoryConfig[$event->category] ?? $defaultConfig;
                    $isLast = $loop->last;
                @endphp
                <div class="relative flex gap-6 mb-6 {{ $isLast ? '' : '' }}"
                     data-aos="fade-up" data-aos-delay="{{ min($index * 60, 400) }}">

                    {{-- Timeline column --}}
                    <div class="flex flex-col items-center flex-shrink-0 w-10">
                        {{-- Dot --}}
                        <div class="w-10 h-10 rounded-full {{ $cfg['color'] }} flex items-center justify-center shadow-md z-10 flex-shrink-0">
                            @if($event->category === 'Ujian')
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            @elseif($event->category === 'Libur')
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            @elseif($event->category === 'PPDB')
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            @elseif($event->category === 'Rapat')
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @else
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            @endif
                        </div>
                        {{-- Vertical line --}}
                        @if(!$isLast)
                        <div class="w-0.5 flex-1 mt-2 bg-gradient-to-b from-[#1A8DA3]/30 to-transparent min-h-[24px]"></div>
                        @endif
                    </div>

                    {{-- Card --}}
                    <div class="flex-1 bg-white rounded-3xl border border-slate-100 shadow-sm p-6 hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-0.5 transition-all duration-300 group mb-2">
                        <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                            <div class="flex-1 min-w-0">
                                <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full border {{ $cfg['light'] }} mb-2">
                                    {{ $event->category }}
                                </span>
                                <h3 class="font-headline font-bold text-slate-900 text-base sm:text-lg leading-snug">
                                    {{ $event->title }}
                                </h3>
                            </div>
                            {{-- Status badge --}}
                            @php
                                $today = now()->startOfDay();
                                $start = \Carbon\Carbon::parse($event->start_date)->startOfDay();
                                $end   = isset($event->end_date) ? \Carbon\Carbon::parse($event->end_date)->startOfDay() : $start;
                                $statusLabel = $today->lt($start) ? 'Akan Datang' : ($today->gt($end) ? 'Selesai' : 'Berlangsung');
                                $statusClass = $today->lt($start)
                                    ? 'bg-blue-50 text-blue-600 border-blue-200'
                                    : ($today->gt($end)
                                        ? 'bg-slate-100 text-slate-500 border-slate-200'
                                        : 'bg-emerald-50 text-emerald-700 border-emerald-200');
                            @endphp
                            <span class="flex-shrink-0 text-xs font-semibold border rounded-full px-3 py-1 {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </div>

                        {{-- Tanggal --}}
                        <div class="flex items-center gap-2 text-sm text-[#1A8DA3] font-semibold mb-3">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            @php
                                $startFormatted = \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y');
                                $endFormatted   = isset($event->end_date) && $event->end_date !== $event->start_date
                                    ? ' — ' . \Carbon\Carbon::parse($event->end_date)->translatedFormat('d F Y')
                                    : '';
                            @endphp
                            {{ $startFormatted }}{{ $endFormatted }}
                        </div>

                        @if(!empty($event->description))
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $event->description }}</p>
                        @endif
                    </div>

                </div>
                @empty
                {{-- ── Empty State ── --}}
                <div class="text-center py-20" data-aos="fade-up">
                    <div class="w-20 h-20 rounded-3xl bg-[#1A8DA3]/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-[#1A8DA3]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                    </div>
                    <h3 class="font-headline font-bold text-slate-800 text-xl mb-2">Belum ada kalender akademik</h3>
                    <p class="text-slate-400 text-sm mb-6">Belum ada kegiatan akademik yang tersedia untuk tahun ajaran ini.</p>
                    <a href="/kontak"
                       class="inline-flex items-center gap-2 bg-[#1A8DA3] text-white font-semibold px-6 py-3 rounded-2xl hover:bg-[#157d93] transition-all duration-300 hover:scale-105">
                        Hubungi Admin
                    </a>
                </div>
                @endforelse

            </div>
        </section>

        {{-- =============================================
             SECTION 4 — KEGIATAN TERDEKAT
        ============================================= --}}
        @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
        <section class="py-20 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Segera Hadir
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Kegiatan Terdekat
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm leading-relaxed">
                        Agenda akademik yang paling dekat dari hari ini.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($upcomingEvents as $i => $event)
                    @php
                        $cfg    = $categoryConfig[$event->category] ?? $defaultConfig;
                        $start  = \Carbon\Carbon::parse($event->start_date);
                        $diff   = now()->startOfDay()->diffInDays($start->startOfDay());
                        $isToday = now()->startOfDay()->eq($start->startOfDay());
                    @endphp
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}"
                         class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl border border-slate-100 shadow-sm p-7 hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-1 transition-all duration-300">

                        {{-- Header --}}
                        <div class="flex items-start justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl {{ $cfg['color'] }} flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300 pulse-ring">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full border {{ $cfg['light'] }}">
                                {{ $event->category }}
                            </span>
                        </div>

                        <h3 class="font-headline font-bold text-slate-900 text-base leading-snug mb-3">{{ $event->title }}</h3>

                        {{-- Tanggal --}}
                        <p class="text-sm text-slate-500 mb-4">
                            {{ $start->translatedFormat('d F Y') }}
                        </p>

                        {{-- Countdown --}}
                        <div class="bg-[#1A8DA3]/8 rounded-2xl px-4 py-3 flex items-center justify-between">
                            <span class="text-xs text-slate-500 font-medium">
                                {{ $isToday ? 'Hari ini!' : 'Dalam' }}
                            </span>
                            <span class="font-headline font-extrabold text-[#1A8DA3] text-xl">
                                {{ $isToday ? '🎉' : $diff . ' hari' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        @endif

        {{-- =============================================
             SECTION 5 — DOWNLOAD KALENDER PDF
        ============================================= --}}
        <section id="download-kalender" class="py-20 lg:py-28 bg-[#F8F9FA]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 border border-[#1A8DA3]/30 text-[#1A8DA3] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 bg-[#1A8DA3]/5">
                        Unduh Dokumen
                    </div>
                    <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Unduh Kalender Akademik
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                        Dapatkan kalender akademik resmi dalam format PDF.
                    </p>
                </div>

                @forelse($calendarDocuments ?? [] as $i => $doc)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}"
                     class="group bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-1 transition-all duration-300 mb-4 flex flex-col sm:flex-row items-start sm:items-center gap-5 max-w-2xl mx-auto">

                    {{-- PDF icon --}}
                    <div class="w-14 h-16 bg-red-50 border border-red-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6M9 17h3"/>
                        </svg>
                    </div>

                    <div class="flex-1 min-w-0">
                        <span class="inline-block text-xs font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-md mb-1">PDF</span>
                        <h3 class="font-headline font-bold text-slate-900 text-sm leading-snug mb-1">{{ $doc->title }}</h3>
                        <div class="flex items-center gap-3 text-xs text-slate-400">
                            @if(isset($doc->file_size))
                            <span>{{ $doc->file_size }}</span>
                            <span>·</span>
                            @endif
                            <span>Diperbarui {{ \Carbon\Carbon::parse($doc->updated_at)->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>

                    <a href="{{ route('academic-calendar.download', $doc->id) }}"
                       class="flex-shrink-0 inline-flex items-center gap-2 bg-[#1A8DA3]/10 text-[#1A8DA3] font-semibold text-sm px-5 py-2.5 rounded-xl hover:bg-[#1A8DA3] hover:text-white transition-all duration-300 group/btn">
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover/btn:translate-y-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download PDF
                    </a>
                </div>
                @empty
                <div class="text-center py-12" data-aos="fade-up">
                    <p class="text-slate-400 text-sm">Belum ada dokumen kalender yang tersedia.</p>
                </div>
                @endforelse

            </div>
        </section>

        {{-- =============================================
             SECTION 6 — STATISTIK / QUICK INFO
        ============================================= --}}
        <section class="py-20 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-14" data-aos="fade-up">
                    <h2 class="font-headline text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                        Ringkasan Akademik
                    </h2>
                    <p class="text-slate-500 mt-2 text-sm">
                        Tahun Ajaran {{ isset($activeYear) ? $activeYear->year : '—' }}
                    </p>
                </div>

                @php
                    $stats = [
                        [
                            'value'  => isset($stats['total_events']) ? $stats['total_events'] : ($calendarEvents->count() ?? 0),
                            'suffix' => '',
                            'label'  => 'Total Agenda Akademik',
                            'icon'   => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>',
                        ],
                        [
                            'value'  => isset($stats['study_days']) ? $stats['study_days'] : 220,
                            'suffix' => '',
                            'label'  => 'Jumlah Hari Belajar',
                            'icon'   => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                        ],
                        [
                            'value'  => isset($stats['exam_count']) ? $stats['exam_count'] : ($calendarEvents->where('category','Ujian')->count() ?? 0),
                            'suffix' => '',
                            'label'  => 'Jadwal Ujian',
                            'icon'   => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
                        ],
                        [
                            'value'  => isset($stats['holiday_days']) ? $stats['holiday_days'] : ($calendarEvents->where('category','Libur')->count() ?? 0),
                            'suffix' => '',
                            'label'  => 'Total Hari Libur',
                            'icon'   => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($stats as $i => $stat)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}"
                         class="group text-center bg-gradient-to-br from-[#F8F9FA] to-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:border-[#1A8DA3]/40 hover-glow hover:-translate-y-1 transition-all duration-300"
                         x-data="counterAnim({{ $stat['value'] }}, '{{ $stat['suffix'] }}')"
                         x-init="startObserving($el)">
                        <div class="w-12 h-12 rounded-2xl bg-[#1A8DA3]/10 text-[#1A8DA3] flex items-center justify-center mx-auto mb-4 group-hover:bg-[#1A8DA3] group-hover:text-white transition-colors duration-300">
                            {!! $stat['icon'] !!}
                        </div>
                        <div class="font-headline text-4xl font-extrabold text-[#1A8DA3] mb-1" x-text="display"></div>
                        <p class="text-slate-600 text-sm font-medium">{{ $stat['label'] }}</p>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- =============================================
             SECTION 7 — CTA
        ============================================= --}}
        <section class="py-20 lg:py-28 bg-[#F8F9FA]">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center" data-aos="fade-up">
                <div class="relative bg-gradient-to-br from-[#0d5f72] via-[#1A8DA3] to-[#1a7a8a] rounded-3xl overflow-hidden p-10 lg:p-16 shadow-2xl">
                    <div class="pointer-events-none absolute top-0 right-0 w-64 h-64 rounded-full bg-white/5 blob-float"></div>
                    <div class="pointer-events-none absolute bottom-0 left-0 w-48 h-48 rounded-full bg-[#FFF59D]/10 blob-float" style="animation-delay:2s"></div>

                    <div class="relative">
                        <span class="inline-block bg-[#FFF59D] text-slate-800 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wide mb-6">
                            Ada Pertanyaan?
                        </span>
                        <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight mb-4">
                            Ingin Mengetahui Detail<br class="hidden sm:block"> Jadwal Akademik?
                        </h2>
                        <p class="text-slate-200 text-sm sm:text-base leading-relaxed max-w-xl mx-auto mb-10">
                            Hubungi kami untuk informasi lebih lanjut mengenai jadwal akademik dan kegiatan sekolah SDN Ciledug Barat.
                        </p>
                        <div class="flex flex-wrap gap-4 justify-center">
                            <a href="/kontak"
                               class="inline-flex items-center gap-2 bg-white text-[#1A8DA3] font-semibold px-7 py-3.5 rounded-2xl shadow-lg hover:bg-[#FFF59D] hover:text-slate-800 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                Hubungi Kami
                            </a>
                            <a href="{{ route('academic.curriculum') }}"
                               class="inline-flex items-center gap-2 bg-transparent border-2 border-white/60 text-white font-semibold px-7 py-3.5 rounded-2xl hover:bg-white/10 transition-all duration-300 hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                Lihat Kurikulum
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
        AOS.init({ once: true, duration: 700, easing: 'ease-out-cubic', offset: 60 });

        document.addEventListener('alpine:init', () => {
            Alpine.data('counterAnim', (target, suffix) => ({
                display: '0' + suffix,
                startObserving(el) {
                    if (isNaN(parseInt(target))) { this.display = target + suffix; return; }
                    const end = parseInt(target);
                    const observer = new IntersectionObserver((entries) => {
                        if (!entries[0].isIntersecting) return;
                        observer.disconnect();
                        let current = 0;
                        const step = Math.ceil(end / (1500 / 16));
                        const timer = setInterval(() => {
                            current = Math.min(current + step, end);
                            this.display = current + suffix;
                            if (current >= end) clearInterval(timer);
                        }, 16);
                    }, { threshold: 0.5 });
                    observer.observe(el);
                }
            }));

            Alpine.data('kalenderApp', () => ({
                init() { /* Alpine namespace for future extensions */ }
            }));
        });
    </script>

</x-layout>
