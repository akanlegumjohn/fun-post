<x-layout title="FunPost — The Funniest Place on the Internet">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        {{-- Main Feed Area (8 columns on lg) --}}
        <div class="lg:col-span-8 space-y-6">
            
            {{-- Quick Post Creator Box (Ready for Form implementation) --}}
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
                <div class="flex gap-3">
                    <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm shrink-0">
                        Me
                    </div>
                    <div class="flex-1 space-y-3">
                        <textarea 
                            rows="2" 
                            placeholder="Got a hilarious joke, pun, or meme? Share the laugh..." 
                            class="w-full text-slate-800 placeholder-slate-400 text-sm border-0 focus:ring-0 p-0 resize-none outline-none"
                        ></textarea>
                        
                        <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                            <div class="flex items-center gap-1 text-slate-500">
                                <button type="button" class="p-2 hover:bg-slate-100 rounded-full text-slate-600 transition" title="Add Image / Meme">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                                <button type="button" class="p-2 hover:bg-slate-100 rounded-full text-slate-600 transition" title="Add Emoji">
                                    <span class="text-base leading-none">😂</span>
                                </button>
                            </div>
                            <button 
                                type="button" 
                                class="px-4 py-1.5 text-xs font-semibold rounded-full bg-indigo-600 text-white hover:bg-indigo-500 transition shadow-sm"
                            >
                                Post Joke
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Feed Category Filter Tabs --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-1 text-xs font-medium">
                <button class="px-3 py-1.5 rounded-full bg-slate-900 text-white font-semibold">🔥 Trending</button>
                <button class="px-3 py-1.5 rounded-full bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">✨ Latest</button>
                <button class="px-3 py-1.5 rounded-full bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">👨 Dad Jokes</button>
                <button class="px-3 py-1.5 rounded-full bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">💻 Dev Humor</button>
                <button class="px-3 py-1.5 rounded-full bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">🐱 Pet Memes</button>
            </div>

            {{-- Post Feed --}}
            <div class="space-y-4">
                {{-- Sample Post 1 (Text Joke) --}}
                <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:border-slate-300 transition">
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-amber-400 to-orange-500 flex items-center justify-center text-white font-bold text-sm">
                                JD
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm text-slate-900">John Developer</h3>
                                <p class="text-xs text-slate-400">@john_codes • 2 hours ago</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-2.5 py-0.5 text-xs font-medium text-indigo-700">
                            Dev Humor
                        </span>
                    </div>

                    <div class="text-slate-800 text-base leading-relaxed mb-4">
                        <p class="font-medium text-slate-900 mb-1">Why do programmers prefer dark mode?</p>
                        <p class="text-slate-600">Because light attracts bugs! 🪲</p>
                    </div>

                    {{-- Reactions / Comments / Share Action Bar --}}
                    <div class="flex items-center gap-6 pt-3 border-t border-slate-100 text-xs font-semibold text-slate-500">
                        <button class="flex items-center gap-1.5 hover:text-rose-600 transition group">
                            <span class="group-hover:scale-125 transition-transform">❤️</span>
                            <span>142 Likes</span>
                        </button>
                        <button class="flex items-center gap-1.5 hover:text-indigo-600 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>18 Comments</span>
                        </button>
                        <button class="flex items-center gap-1.5 hover:text-slate-900 transition ml-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                            <span>Share</span>
                        </button>
                    </div>
                </article>

                {{-- Sample Post 2 (Dad Joke) --}}
                <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:border-slate-300 transition">
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-400 to-teal-500 flex items-center justify-center text-white font-bold text-sm">
                                SG
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm text-slate-900">Sarah Giggles</h3>
                                <p class="text-xs text-slate-400">@sarah_punny • 4 hours ago</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-800">
                            Dad Joke
                        </span>
                    </div>

                    <div class="text-slate-800 text-base leading-relaxed mb-4">
                        <p class="font-medium text-slate-900 mb-1">I told my wife she was drawing her eyebrows too high.</p>
                        <p class="text-slate-600">She looked surprised. 😲</p>
                    </div>

                    <div class="flex items-center gap-6 pt-3 border-t border-slate-100 text-xs font-semibold text-slate-500">
                        <button class="flex items-center gap-1.5 hover:text-rose-600 transition group">
                            <span class="group-hover:scale-125 transition-transform">❤️</span>
                            <span>308 Likes</span>
                        </button>
                        <button class="flex items-center gap-1.5 hover:text-indigo-600 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>42 Comments</span>
                        </button>
                        <button class="flex items-center gap-1.5 hover:text-slate-900 transition ml-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                            <span>Share</span>
                        </button>
                    </div>
                </article>
            </div>
        </div>

        {{-- Sidebar Area (4 columns on lg) --}}
        <aside class="lg:col-span-4 space-y-6">
            
            {{-- Who to Follow --}}
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
                <h2 class="font-bold text-sm text-slate-900 mb-4 flex items-center justify-between">
                    <span>Fun Creators to Follow</span>
                    <span class="text-xs text-indigo-600 font-medium cursor-pointer hover:underline">View all</span>
                </h2>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center font-bold text-xs">
                                MK
                            </div>
                            <div>
                                <h4 class="font-semibold text-xs text-slate-900">Meme King</h4>
                                <p class="text-[11px] text-slate-400">@memeking</p>
                            </div>
                        </div>
                        <button class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-900 text-white hover:bg-slate-800 transition">
                            Follow
                        </button>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-xs">
                                DC
                            </div>
                            <div>
                                <h4 class="font-semibold text-xs text-slate-900">Daily Chuckle</h4>
                                <p class="text-[11px] text-slate-400">@chuckle</p>
                            </div>
                        </div>
                        <button class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                            Follow
                        </button>
                    </div>
                </div>
            </div>

            {{-- Trending Tags --}}
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
                <h2 class="font-bold text-sm text-slate-900 mb-3">Trending Topics</h2>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 cursor-pointer transition">#programmerhumor</span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 cursor-pointer transition">#dadjokes</span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 cursor-pointer transition">#worklife</span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 cursor-pointer transition">#catmemes</span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 cursor-pointer transition">#punintended</span>
                </div>
            </div>

            {{-- Backend Dev Note --}}
            <div class="rounded-2xl p-4 bg-gradient-to-br from-indigo-50 to-purple-50 border border-indigo-100/80 text-xs text-indigo-900 leading-relaxed">
                <p class="font-bold mb-1 flex items-center gap-1.5 text-indigo-950">
                    <span>💡</span> Backend Focus
                </p>
                <p class="text-indigo-800/90">
                    Markup and Tailwind are ready. When building features, focus entirely on <strong>Routes &rarr; Controllers &rarr; Eloquent Models &rarr; PHPUnit Tests</strong>. Replace mock post cards with <code>@@foreach($posts as $post)</code>.
                </p>
            </div>

        </aside>
    </div>
</x-layout>