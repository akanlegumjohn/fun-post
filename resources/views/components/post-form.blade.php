     @props(['type' => 'new'])
     
     <form class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
      @if ($type === 'new')
       <h1 class="text-lg font-bold text-slate-900">Create New Post</h1>
       @else
       <h1 class="text-lg font-bold text-slate-900">Edit Post</
      @endif
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
            </form>