<x-layout>
    <x-slot:title>Notifikasi & Pengumuman - SDN Ciledug Barat</x-slot:title>

    {{-- =====================================================
         ASSETS & FONTS
    ===================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Lucide Icons CDN --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, h4, .font-headline { font-family: 'Lexend', sans-serif; }

        :root {
            --primary:       #1A8DA3;
            --primary-light: #e0f6fa;
            --secondary:     #FFF59D;
        }

        html { scroll-behavior: smooth; }

        /* Blob animations */
        @keyframes blobFloat  { 0%,100%{transform:translateY(0) scale(1)} 50%{transform:translateY(-18px) scale(1.04)} }
        @keyframes blobFloat2 { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(14px) rotate(8deg)} }
        .blob-1 { animation: blobFloat  8s ease-in-out infinite; }
        .blob-2 { animation: blobFloat2 10s ease-in-out infinite; }

        /* Fade-up keyframe for AOS fallback */
        @keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }

        /* Animated underline breadcrumb */
        .breadcrumb-link { position:relative; }
        .breadcrumb-link::after {
            content:''; position:absolute; bottom:-1px; left:0;
            width:0; height:1.5px; background:var(--primary);
            border-radius:9999px; transition:width .3s ease;
        }
        .breadcrumb-link:hover::after { width:100%; }

        /* Filter pill active/hover */
        .filter-pill { transition: all .25s cubic-bezier(.4,0,.2,1); }
        .filter-pill.active {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 4px 16px rgba(26,141,163,.28);
            border-color: var(--primary);
        }
        .filter-pill:not(.active):hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-light);
        }

        /* Notification card */
        .notif-card {
            transition: transform .28s cubic-bezier(.4,0,.2,1),
                        box-shadow .28s ease,
                        border-color .28s ease;
        }
        .notif-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(26,141,163,.12);
            border-color: rgba(26,141,163,.35);
        }

        /* Glow dot */
        .glow-dot {
            width:8px; height:8px; border-radius:50%;
            background: var(--primary);
            box-shadow: 0 0 0 3px rgba(26,141,163,.2);
            animation: pulse-dot 2.4s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%,100%{box-shadow:0 0 0 3px rgba(26,141,163,.2)}
            50%    {box-shadow:0 0 0 7px rgba(26,141,163,.05)}
        }
        .glow-dot.important {
            background: #ef4444;
            box-shadow: 0 0 0 3px rgba(239,68,68,.2);
            animation: pulse-dot-red 2.4s ease-in-out infinite;
        }
        @keyframes pulse-dot-red {
            0%,100%{box-shadow:0 0 0 3px rgba(239,68,68,.2)}
            50%    {box-shadow:0 0 0 7px rgba(239,68,68,.05)}
        }

        /* Skeleton shimmer */
        @keyframes shimmer {
            0%  { background-position: -600px 0 }
            100%{ background-position:  600px 0 }
        }
        .skeleton {
            background: linear-gradient(90deg,#f0f0f0 25%,#e8e8e8 50%,#f0f0f0 75%);
            background-size: 600px 100%;
            animation: shimmer 1.4s ease-in-out infinite;
            border-radius: 8px;
        }

        /* Pagination custom */
        .page-btn {
            transition: all .2s ease;
        }
        .page-btn:hover:not(.active-page) {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }
        .active-page {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(26,141,163,.3);
        }

        /* Category icon colors */
        .icon-penting  { background:#fee2e2; color:#dc2626; }
        .icon-akademik { background:#fef9c3; color:#ca8a04; }
        .icon-acara    { background:#cffafe; color:#0891b2; }
        .icon-libur    { background:#ffedd5; color:#ea580c; }
        .icon-ppdb     { background:#e0f6fa; color:#1A8DA3; }
        .icon-default  { background:#f1f5f9; color:#64748b; }

        /* Badge colors (FIXED: Menyesuaikan style warna kuning halaman depan lo) */
        .badge-penting  { background:#fee2e2; color:#dc2626; }
        .badge-akademik { background:#FFF9C4; color:#F57F17; }
        .badge-acara    { background:#cffafe; color:#0e7490; }
        .badge-libur    { background:#ffedd5; color:#c2410c; }
        .badge-ppdb     { background:#e0f6fa; color:#1A8DA3; }
        .badge-default  { background:#f1f5f9; color:#475569; }

        /* Horizontal scroll filter on mobile */
        .filter-scroll { -webkit-overflow-scrolling:touch; scrollbar-width:none; }
        .filter-scroll::-webkit-scrollbar { display:none; }
    </style>

    {{-- =====================================================
         PAGE WRAPPER
    ===================================================== --}}
    <div class="min-h-screen bg-gradient-to-br from-[#f4fbfc] via-white to-[#f8f9fa]"
         x-data="notifPage()" x-init="init()">

        {{-- Decorative blobs --}}
        <div class="blob-1 fixed top-16 -left-20 w-72 h-72 rounded-full bg-[#1A8DA3]/08 blur-3xl pointer-events-none z-0"></div>
        <div class="blob-2 fixed bottom-24 -right-16 w-64 h-64 rounded-full bg-[#FFF59D]/50 blur-3xl pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 pb-20">

            {{-- =====================================================
                 BREADCRUMB + PAGE HEADER
            ===================================================== --}}
            <div class="relative" data-aos="fade-up" data-aos-duration="600">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-xs text-gray-400 mb-5">
                    <a href="{{ url('/') }}" class="breadcrumb-link hover:text-[#1A8DA3] transition-colors duration-200">
                        Beranda
                    </a>
                    <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-[#1A8DA3] font-medium">Notifikasi & Pengumuman</span>
                </nav>

                {{-- Page Title --}}
                <h1 class="font-headline text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                    Notifikasi & Pengumuman
                </h1>
                <p class="text-gray-400 text-sm md:text-base">
                    Informasi terbaru seputar kegiatan dan pengumuman SDN CILEDUG BARAT.
                </p>
            </div>

            {{-- =====================================================
                 FILTER KATEGORI
            ===================================================== --}}
            <div class="mt-8 mb-8" data-aos="fade-up" data-aos-delay="80" data-aos-duration="600">
                <div class="filter-scroll flex items-center gap-2.5 overflow-x-auto pb-1">
                    @php
                        $filters = ['Semua', 'Penting', 'Akademik', 'Acara', 'Libur', 'PPDB'];
                    @endphp
                    @foreach($filters as $filter)
                    <button
                        @click="setFilter('{{ $filter }}')"
                        :class="activeFilter === '{{ $filter }}' ? 'active' : ''"
                        class="filter-pill flex-shrink-0 px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 bg-white text-gray-500 cursor-pointer whitespace-nowrap"
                    >
                        {{ $filter }}
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- =====================================================
                 NOTIFICATION CARDS LIST
            ===================================================== --}}
            <div class="space-y-3">

                {{-- Loading skeleton --}}
                <template x-if="loading">
                    <div class="space-y-3">
                        @for($s = 0; $s < 5; $s++)
                        <div class="bg-white rounded-3xl border border-gray-100 p-5 flex items-start gap-4">
                            <div class="skeleton w-11 h-11 rounded-full flex-shrink-0"></div>
                            <div class="flex-1 space-y-2.5">
                                <div class="skeleton h-3 w-24 rounded"></div>
                                <div class="skeleton h-5 w-3/4 rounded"></div>
                                <div class="skeleton h-3 w-full rounded"></div>
                                <div class="skeleton h-3 w-2/3 rounded"></div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </template>

                {{-- Actual Cards --}}
                <template x-if="!loading">
                    <div class="space-y-3">

                        @forelse ($notifications as $index => $notification)

                        {{-- Determine category meta --}}
                        @php
                            // FIX: Kita paksa string data category menjadi lowercase/huruf kecil semua agar klop dengan pemetaan CSS
                            $cat     = strtolower($notification->category ?? 'default');
                            $iconMap = [
                                'penting'  => ['icon' => 'triangle-alert',   'wrap' => 'icon-penting',  'badge' => 'badge-penting'],
                                'akademik' => ['icon' => 'file-text',        'wrap' => 'icon-akademik', 'badge' => 'badge-akademik'],
                                'acara'    => ['icon' => 'calendar-days',     'wrap' => 'icon-acara',    'badge' => 'badge-acara'],
                                'libur'    => ['icon' => 'calendar-off',      'wrap' => 'icon-libur',    'badge' => 'badge-libur'],
                                'ppdb'     => ['icon' => 'user-plus',         'wrap' => 'icon-ppdb',     'badge' => 'badge-ppdb'],
                            ];
                            $meta  = $iconMap[$cat] ?? ['icon' => 'bell', 'wrap' => 'icon-default', 'badge' => 'badge-default'];
                            $isImportant = $notification->is_important ?? false;
                        @endphp

                        <div
                            x-show="shouldShow('{{ $notification->category }}')"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-3"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >
                            <a
                                href="{{ route('pengumuman.show', $notification->slug) }}"
                                class="notif-card group relative flex items-start gap-4 bg-white rounded-3xl border border-gray-100 p-5 shadow-sm block hover:no-underline"
                            >
                                {{-- Glow dot (top right) --}}
                                <div class="absolute top-4 right-4 {{ $isImportant ? 'glow-dot important' : 'glow-dot' }}"></div>

                                {{-- Category Icon --}}
                                <div class="flex-shrink-0 w-11 h-11 rounded-full flex items-center justify-center {{ $meta['wrap'] }}">
                                    <i data-lucide="{{ $meta['icon'] }}" class="w-5 h-5"></i>
                                </div>

                                {{-- Content --}}
                                <div class="flex-1 min-w-0 pr-4">
                                    {{-- Badge + Date --}}
                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                        <span class="inline-block text-xs font-semibold px-2.5 py-0.5 rounded-full capitalize {{ $meta['badge'] }}">
                                            {{ $notification->category }}
                                        </span>
                                        <span class="text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($notification->published_at)->locale('id')->isoFormat('D MMM YYYY') }}
                                            &bull;
                                            {{ \Carbon\Carbon::parse($notification->published_at)->format('H:i') }}
                                        </span>
                                    </div>

                                    {{-- Title --}}
                                    <h3 class="font-headline font-bold text-gray-900 text-base md:text-lg leading-snug mb-1.5 group-hover:text-[#1A8DA3] transition-colors duration-200">
                                        {{ $notification->title }}
                                    </h3>

                                    {{-- Description --}}
                                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                                        {{ $notification->description }}
                                    </p>
                                </div>
                            </a>
                        </div>

                        @empty

                        {{-- =====================================================
                             EMPTY STATE
                        ===================================================== --}}
                        <div class="flex flex-col items-center justify-center py-20 text-center" data-aos="fade-up">
                            <div class="w-20 h-20 rounded-full bg-[#e0f6fa] flex items-center justify-center mb-5 mx-auto">
                                <i data-lucide="bell-off" class="w-9 h-9 text-[#1A8DA3]"></i>
                            </div>
                            <h3 class="font-headline font-bold text-gray-800 text-lg mb-2">Belum Ada Pengumuman</h3>
                            <p class="text-gray-400 text-sm max-w-xs">
                                Belum ada notifikasi atau pengumuman yang dipublikasikan saat ini. Cek kembali nanti.
                            </p>
                            <a href="{{ url('/') }}" class="mt-6 inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-[#1A8DA3] text-white text-sm font-semibold hover:bg-[#157a8e] hover:scale-105 transition-all duration-200 shadow-md shadow-[#1A8DA3]/25">
                                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                Kembali ke Beranda
                            </a>
                        </div>

                        @endforelse

                    </div>
                </template>

            </div>

            {{-- =====================================================
                 PAGINATION
            ===================================================== --}}
            @if ($notifications->hasPages())
            <div class="mt-10 flex items-center justify-center gap-1.5" data-aos="fade-up">
                {{-- Prev --}}
                @if ($notifications->onFirstPage())
                <span class="page-btn w-9 h-9 flex items-center justify-center rounded-xl border border-gray-100 text-gray-300 bg-white cursor-not-allowed text-sm">
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </span>
                @else
                <a href="{{ $notifications->previousPageUrl() }}" class="page-btn w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 bg-white text-sm">
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </a>
                @endif

                {{-- Page numbers --}}
                @foreach ($notifications->getUrlRange(1, $notifications->lastPage()) as $page => $url)
                    @if ($page == $notifications->currentPage())
                    <span class="page-btn active-page w-9 h-9 flex items-center justify-center rounded-xl border text-sm font-semibold">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}" class="page-btn w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 bg-white text-sm font-medium">
                        {{ $page }}
                    </a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($notifications->hasMorePages())
                <a href="{{ $notifications->nextPageUrl() }}" class="page-btn w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 bg-white text-sm">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
                @else
                <span class="page-btn w-9 h-9 flex items-center justify-center rounded-xl border border-gray-100 text-gray-300 bg-white cursor-not-allowed text-sm">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </span>
                @endif
            </div>
            @endif

        </div>{{-- end max-w --}}
    </div>{{-- end x-data wrapper --}}

    {{-- =====================================================
         SCRIPTS
    ===================================================== --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        // Init AOS
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({ once: true, offset: 60, easing: 'ease-out-cubic', duration: 600 });
            // Init Lucide icons
            lucide.createIcons();
        });

        // Alpine component
        function notifPage() {
            return {
                activeFilter: 'Semua',
                loading: true,
                // AMBIL DATA DARI LARAVEL LANGSUNG KE ALPINE
                items: @json($notifications->items()), 

                init() {
                    // Simulate short load so skeleton is visible briefly
                    setTimeout(() => {
                        this.loading = false;
                        this.$nextTick(() => {
                            lucide.createIcons();
                            AOS.refresh();
                        });
                    }, 400);
                },

                setFilter(filter) {
                    this.activeFilter = filter;
                    this.$nextTick(() => lucide.createIcons());
                },

                shouldShow(category) {
                    if (this.activeFilter === 'Semua') return true;
                    return category.toLowerCase() === this.activeFilter.toLowerCase();
                }
            }
        }
    </script>
</x-layout>