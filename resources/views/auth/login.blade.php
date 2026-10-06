<x-layout title="Register — devJokes">
    <div class="max-w-md mx-auto py-6">
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
            <div class="text-center py-4">
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Login to your account</h1>
                <p class="text-sm text-slate-500 mt-1">Welcome back! Please enter your details.</p>
            </div>

            <form action="{{ url('/auth/login') }}" method="POST" class="space-y-4 p-4">
                @csrf



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

                </div>

                <div>
                    <x-forms.error name="password" />
                    <x-forms.error name="email" />
                </div>

                {{-- Submit Button --}}
                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full p-2 text-sm font-semibold rounded-xl bg-indigo-600 text-white hover:bg-indigo-500 transition shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        Login
                    </button>
                </div>

                {{-- Login Link Helper --}}
                <p class="text-center text-xs text-slate-500 pt-2">
                    Don't have an account yet?
                    <a href="{{ url('/auth/register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition">
                        Sign up
                    </a>
                </p>


            </form>
        </div>
    </div>
</x-layout>