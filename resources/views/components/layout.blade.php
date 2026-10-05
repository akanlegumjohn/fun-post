@props(['title' => 'devJokes'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 text-slate-900 antialiased">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'devJokes — Where Dev Humor Lives' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-full flex flex-col font-sans">
    {{-- Top Navigation Bar --}}
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-xl tracking-tight hover:opacity-90 transition">

                    <span class="text-indigo-600 font-black">dev<span class="text-rose-600">Jokes</span></span>
                </a>
                <div>

                </div>
            </div>

            {{-- Search Bar Placeholder --}}
            <div class="hidden md:flex flex-1 max-w-md mx-4">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input
                        type="text"
                        placeholder="Search punchlines, memes, creators..."
                        class="w-full pl-9 pr-4 py-1.5 text-sm bg-slate-100 border-none rounded-full focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                </div>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">


                <a href="{{ url('/jokes/create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition text-sm font-medium">
                    Post a Joke
                </a>
            </div>
        </div>
    </header>

    {{-- Main Page Content --}}
    <main class=" max-w-6xl w-full mx-auto px-4  flex-1 gap-6 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    {{-- Minimal Footer --}}
    <footer class="border-t border-slate-200 bg-white py-6 mt-12 text-center text-xs text-slate-500">
        <p>Built with ❤️ using Laravel & Tailwind CSS • <span class="font-semibold text-slate-700">devJokes</span></p>
    </footer>
</body>

</html>