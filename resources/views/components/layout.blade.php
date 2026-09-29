<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 text-slate-900 antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'FunPost — Where Humor Lives' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col font-sans">
    {{-- Top Navigation Bar --}}
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-xl tracking-tight text-slate-900 hover:opacity-90 transition">
                    <span class="text-2xl">🎭</span>
                    <span class="bg-gradient-to-r from-amber-500 via-rose-500 to-indigo-600 bg-clip-text text-transparent">FunPost</span>
                </a>
                <span class="hidden sm:inline-flex items-center rounded-full bg-amber-50 px-2 py-0.5 text-xs font-semibold text-amber-700 ring-1 ring-inset ring-amber-600/20">
                    Laughter Engine
                </span>
            </div>

            {{-- Search Bar Placeholder --}}
            <div class="hidden md:flex flex-1 max-w-md mx-4">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                    <input 
                        type="text" 
                        placeholder="Search punchlines, memes, creators..." 
                        class="w-full pl-9 pr-4 py-1.5 text-sm bg-slate-100 border-none rounded-full focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    >
                </div>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">
                <button 
                    type="button" 
                    class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-sm font-semibold rounded-full bg-indigo-600 text-white hover:bg-indigo-500 shadow-sm transition"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>New Laugh</span>
                </button>

                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-amber-400 to-rose-400 flex items-center justify-center text-white text-xs font-bold ring-2 ring-white shadow-sm cursor-pointer">
                    FP
                </div>
            </div>
        </div>
    </header>

    {{-- Main Page Content --}}
    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    {{-- Minimal Footer --}}
    <footer class="border-t border-slate-200 bg-white py-6 mt-12 text-center text-xs text-slate-500">
        <p>Built with ❤️ using Laravel & Tailwind CSS • <span class="font-semibold text-slate-700">FunPost</span></p>
    </footer>
</body>
</html>
