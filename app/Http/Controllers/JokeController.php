<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JokeController extends Controller
{
    /**
     * Display a listing of the jokes
     */
    public function index()
    {
        $user = Auth::user();
        $jokes = Joke::latest()->get();

        return view('jokes.index', [
            'jokes' => $jokes,
            'search' => request('search'),
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jokes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5'],
            'content' => ['required', 'string', 'max:255', 'min:10'],
        ]);

        $title = request('title');
        $content = request('content');
        $user = Auth::user();

        Joke::create([
            'title' => $title,
            'content' => $content,
            'joke_owner' => $user->name,
        ]);

        return redirect('/')->with('success', 'Joke created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Joke $joke)
    {
        return view('jokes.show', [
            'joke' => $joke,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joke $joke)
    {
        return view('jokes.edit', [
            'joke' => $joke,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joke $joke)
    {

        $request->validate([
            'title' => ['required', 'string', 'min:5'],
            'content' => ['required', 'string', 'max:255', 'min:10'],
        ]);

        $joke->update(request()->only(['title', 'content']));

        return redirect("/jokes/{$joke->id}")->with('success', 'Joke updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joke $joke)
    {
        $joke->delete();

        return redirect('/')->with('success', 'Joke deleted successfully!');
    }
}
