<x-layout title="Edit Joke — devJokes">
    <div class="grid gap-6 max-w-2xl mx-auto">
        <div class="flex items-center gap-2">
            <a href="{{ url('/jokes/' . $joke->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition text-sm font-medium">
                &larr; Back to Joke
            </a>
            <h1 class="text-xl font-bold text-slate-900">Edit Joke #{{ $joke->id }}</h1>
        </div>

        <x-joke-form type="edit" :joke="$joke" />
    </div>
</x-layout>