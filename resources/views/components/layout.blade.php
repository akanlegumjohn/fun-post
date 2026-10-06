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

            {{-- Nav Items in Middle --}}
            <nav class="flex items-center gap-6">
                <a href="{{ url('/') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">
                    Jokes
                </a>
                <a href="{{ url('/jokes/create') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">
                    Post a Joke
                </a>
                <a href="{{ url('/faq') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">
                    FAQ
                </a>
            </nav>

            {{-- Right Actions: Register CTA --}}
            @guest
            <div class="flex items-center gap-3">
                <a href="{{ url('/auth/register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition text-sm font-semibold shadow-sm">
                    Register
                </a>

                <a href="{{ url('/auth/login') }}" class="text-sm border border-indigo-600 font-medium text-slate-600 hover:text-indigo-600 transition hover:bg-indigo-100  px-4 py-2 rounded-lg ">
                    Login
                </a>
            </div>
            @endguest

            @auth
            <form action="{{ url('/auth/logout') }}" method="post" class="flex items-center gap-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm  font-medium text-slate-600 hover:text-indigo-600 transition">
                    Logout
                </button>
            </form>

            @endauth
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