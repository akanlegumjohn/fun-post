     @props(['type' => 'new'])

     <form action="/posts" method="POST" class="bg-white rounded-2xl p-5 space-y-4 shadow-sm border border-slate-200">
         @csrf
         <div class="my-4">
             @if ($type === 'new')
             <h1 class="text-lg font-bold text-slate-900">Create New Joke</h1>
             @else
             <h1 class="text-lg font-bold text-slate-900">Edit Joke</h1>
             @endif
         </div>

         <div class="">

             <div class="flex-1 space-y-3 bg-red-700">
                 <div class=" space-y-2">
                     <label for="title" class="text-sm">Joke Title</label>
                     <input type="text" id="title" name="title" placeholder="Joke Title" class="w-full text-slate-800 placeholder-slate-400 text-sm border-slate-200 p-2 resize-none outline-none border rounded-2xl" />
                 </div>
                 <div>
                     <label for="content" class=" text-sm">Joke Content</label>
                     <textarea
                         rows="2"
                         id="content"
                         name="content"
                         placeholder="Got a hilarious joke, pun, or meme? Share the laugh..."
                         class="w-full text-slate-800 focus:right-slate-400 placeholder-slate-400 text-sm border-slate-100  border p-2 outline-none  rounded-2xl"></textarea>
                 </div>

                 <div class="flex items-center border-t border-slate-100 pt-3 ">

                     <button
                         type="submit"
                         class="justify-end flex p-4 items-center text-xs font-semibold rounded-md bg-indigo-600 text-white hover:bg-indigo-500 transition shadow-sm">
                         Post Joke
                     </button>
                 </div>
             </div>
         </div>
     </form>