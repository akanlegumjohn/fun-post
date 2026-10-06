<x-layout title="FunPost — The Funniest Place on the Internet">
        <div class="grid gap-6">
                @auth
                <h1 class="text-xl font-bold text-slate-800">Welcome back, {{ $user->name }}!</h1>
                @endauth

                <div>
                        Here are some jokes you might enjoy:
                </div>
                <div class="grid gap-6">
                        @if ($jokes->isEmpty())
                        <p class="text-slate-500">No jokes found.</p>
                        @else
                        @foreach ($jokes as $joke)
                        <a href="/jokes/{{ $joke->id }}" class="block hover:opacity-95 transition">
                                <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
                                        <div class="flex gap-3">
                                                <div class="flex-1 space-y-3">
                                                        <div class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-md inline-block font-bold text-sm">
                                                                {{ $joke->title }}
                                                        </div>
                                                        <p class="text-sm text-slate-800">{{ $joke->content }}</p>
                                                        <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                                                <div class="flex items-center gap-2">
                                                                        <button type="button" class="p-2 hover:bg-slate-100 rounded-full text-slate-600 transition" title="Like">
                                                                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                                                </svg>
                                                                        </button>
                                                                        <button type="button" class="p-2 hover:bg-slate-100 rounded-full text-slate-600 transition" title="Comment">
                                                                                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                                                </svg>
                                                                        </button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </a>
                        @endforeach
                        @endif
                </div>

                @if ($search)
                <p class="text-sm text-slate-600">Search results for: {{ $search }}</p>
                @else
                <p class="text-sm text-slate-500">Showing all jokes</p>
                @endif
        </div>
</x-layout>