<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel - SDN Ciledug Barat' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-headline { font-family: 'Lexend', sans-serif; }
    </style>
</head>
<body class="bg-[#F8F9FA] text-slate-700 antialiased min-h-screen flex flex-col md:flex-row">

    <header class="md:hidden bg-[#1A8DA2] text-white p-4 flex justify-between items-center sticky top-0 z-40 shadow-md">
        <div>
            <h2 class="font-headline font-bold text-sm leading-tight">SDN Ciledug Barat</h2>
            <span class="text-[9px] text-[#FFF59D] font-semibold uppercase tracking-wider">Admin Panel</span>
        </div>
        <button id="menuToggle" class="p-2 rounded-lg hover:bg-white/10 active:bg-white/20 focus:outline-none transition-all">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </header>

    <div id="sidebarBackdrop" class="fixed inset-0 bg-black/40 z-40 hidden md:hidden transition-opacity duration-300"></div>

    <aside id="sidebarAdmin" class="w-64 bg-[#1A8DA2] text-white p-5 flex flex-col justify-between fixed md:sticky left-0 top-0 bottom-0 h-screen z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-xl md:shadow-none">
        <div class="space-y-6">
            <div class="border-b border-white/20 pb-4 flex justify-between items-center">
                <div>
                    <h2 class="font-headline font-bold text-lg leading-tight tracking-tight">SDN Ciledug Barat</h2>
                    <span class="text-[10px] text-[#FFF59D] font-semibold tracking-wider uppercase">Panel Kendali Admin</span>
                </div>
                <button id="menuClose" class="md:hidden p-1.5 rounded-lg hover:bg-white/10 text-white/80 hover:text-white">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="space-y-1 overflow-y-auto max-h-[calc(100vh-160px)] pr-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.kegiatan.create') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>📰</span> Kelola Kegiatan
                </a>
                <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.pengumuman.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>📢</span> Pengumuman Sekolah
                </a>
                <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.fasilitas.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>🏫</span> Fasilitas Sekolah
                </a>
                <a href="{{ route('admin.guru.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.guru.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>👨‍🏫</span> Guru & Tendik
                </a>
                <a href="{{ route('ekskul.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.ekskul.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>⚽</span> Ekstrakurikuler
                </a>
                <a href="{{ route('admin.kalender.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.kalender.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>📅</span> Kalender Akademik
                </a>
                <a href="{{ route('admin.kurikulum.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all {{ request()->routeIs('admin.kurikulum.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span>📚</span> Kurikulum
                </a>
                <a href="{{ route('admin.ppdb.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all flex justify-between {{ request()->routeIs('admin.ppdb.*') ? 'bg-white/15 text-[#FFF59D]' : '' }}">
                    <span class="flex items-center gap-3"><span>📩</span> Data PPDB</span>
                </a>
            </nav>
        </div>

        <div class="border-t border-white/20 pt-4">
            <a href="/" class="flex items-center gap-3 px-4 py-2 text-xs font-semibold text-slate-200 hover:text-white transition-all">
                <span>⬅</span> Kembali ke Web Utama
            </a>
        </div>
    </aside>

    <main class="flex-1 min-h-screen p-5 sm:p-8 md:p-10 w-full overflow-x-hidden">
        {{ $slot }}
    </main>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const menuClose = document.getElementById('menuClose');
        const sidebar = document.getElementById('sidebarAdmin');
        const backdrop = document.getElementById('sidebarBackdrop');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        menuToggle.addEventListener('click', toggleSidebar);
        menuClose.addEventListener('click', toggleSidebar);
        backdrop.addEventListener('click', toggleSidebar);
    </script>

</body>
</html>