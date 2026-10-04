<x-layout title="{{ $joke->title }} — devJokes">
    <div class="grid gap-6">
        <div class="flex gap-2 items-center">
            <a href="{{ url('/') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition text-sm font-medium">
                &larr; Back to Jokes
            </a>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
            <div class="space-y-4">
                <div class="flex items-center justify-between gap-4">
                    <h1 class="text-xl font-bold text-slate-900">{{ $joke->title }}</h1>

                    <div class="flex items-center gap-2">
                        <a href="{{ url('/jokes/' . $joke->id . '/edit') }}" class="bg-white text-indigo-600 px-3 py-1.5 rounded-lg border border-indigo-600 hover:bg-indigo-50 transition text-sm font-medium">
                            Edit
                        </a>

                        <form action="{{ url('/jokes/' . $joke->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this joke?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-white text-red-600 px-3 py-1.5 rounded-lg border border-red-300 hover:bg-red-50 hover:border-red-500 transition text-sm font-medium">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <p class="text-base text-slate-800 leading-relaxed">{{ $joke->content }}</p>

                <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-xs text-slate-500">
                    <span>Posted by <strong class="text-slate-700">{{ $joke->joke_owner ?? 'Anonymous' }}</strong> &bull; {{ $joke->created_at?->diffForHumans() ?? 'Just now' }}</span>

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
</x-layout>