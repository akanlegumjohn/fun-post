<x-layout title="Register — devJokes">
    <div class="max-w-md mx-auto py-6">
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
            <div class="text-center py-4">
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Create your account</h1>
                <p class="text-sm text-slate-500 mt-1">Join devJokes to share and enjoy coding humor.</p>
            </div>

            <form action="{{ url('/auth/register') }}" method="POST" class="space-y-4 p-4">
                @csrf

                {{-- Full Name --}}
                <div class="space-y-1.5">
                    <label for="name" class="block text-sm font-medium text-slate-700">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Your name"
                        value="{{ old('name') }}"
                        class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 p-2.5 outline-none border rounded-xl focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                        required />
                    <x-forms.error name="name" />
                </div>

                {{-- Email Address --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Your email"
                        value="{{ old('email') }}"
                        class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 p-2.5 outline-none border rounded-xl focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                        required />
                    <x-forms.error name="email" />
                </div>

                {{-- Password --}}
                <div class="space-y-1.5">
                    <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 p-2.5 outline-none border rounded-xl focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                        required />
                    <x-forms.error name="password" />
                </div>

                {{-- Confirm Password --}}
                <div class="space-y-1.5">
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="••••••••"
                        class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 p-2.5 outline-none border rounded-xl focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                        required />
                    <x-forms.error name="password_confirmation" />
                </div>

                {{-- Submit Button --}}
                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full p-2 text-sm font-semibold rounded-xl bg-indigo-600 text-white hover:bg-indigo-500 transition shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        Create Account
                    </button>
                </div>

                {{-- Login Link Helper --}}
                <p class="text-center text-xs text-slate-500 pt-2">
                    Already have an account?
                    <a href="{{ url('/auth/login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition">
                        Sign in
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-layout>