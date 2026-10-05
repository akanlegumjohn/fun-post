<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    /**
     * Display a listing of the jokes
     */
    public function index()
    {
        $jokes = Joke::latest()->get();

        return view('jokes.index', [
            'jokes' => $jokes,
            'search' => request('search'),
            'user' => [
                'name' => 'Kwesi John',
                'email' => 'kwesi.john@example.com',
            ],
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

        Joke::create([
            'title' => $title,
            'content' => $content,
            'joke_owner' => 'System Admin',
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
