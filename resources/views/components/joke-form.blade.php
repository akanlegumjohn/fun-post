@props(['type' => 'new', 'joke' => null, 'endpoint' => null])

@php
    $action = $endpoint ?? ($type === 'edit' && $joke ? url('/jokes/' . $joke->id) : url('/jokes'));
@endphp

<form action="{{ $action }}" method="POST" class="bg-white rounded-2xl p-5 space-y-4 shadow-sm border border-slate-200">
    @csrf

    @if ($type === 'edit')
        @method('PUT')
    @endif

    <div class="my-4">
        @if ($type === 'new')
            <h1 class="text-lg font-bold text-slate-900">Create New Joke</h1>
        @else
            <h1 class="text-lg font-bold text-slate-900">Edit Joke</h1>
        @endif
    </div>

    <div>
        <div class="flex-1 space-y-3">
            <div class="space-y-2">
                <label for="title" class="text-sm font-medium text-slate-700">Joke Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Joke Title"
                    value="{{ old('title', $joke->title ?? '') }}"
                    class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 p-2 outline-none border rounded-2xl focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                    required
                />
            </div>

            <div class="space-y-2">
                <label for="content" class="text-sm font-medium text-slate-700">Joke Content</label>
                <textarea
                    rows="3"
                    id="content"
                    name="content"
                    placeholder="Got a hilarious joke, pun, or meme? Share the laugh..."
                    class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 border p-2 outline-none rounded-2xl focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                    required>{{ old('content', $joke->content ?? '') }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-3">
                @if ($type === 'edit' && $joke)
                    <a href="{{ url('/jokes/' . $joke->id) }}" class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition">
                        Cancel
                    </a>
                @endif

                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-semibold rounded-lg bg-indigo-600 text-white hover:bg-indigo-500 transition shadow-sm">
                    {{ $type === 'new' ? 'Post Joke' : 'Update Joke' }}
                </button>
            </div>
        </div>
    </div>
</form>