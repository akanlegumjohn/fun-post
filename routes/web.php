<?php

use App\Models\Joke;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $jokes = Joke::latest()->get();

    return view('jokes.index', [
        'jokes' => $jokes,
        'search' => request('search'),
        'user' => [
            'name' => 'Kwesi John',
            'email' => 'kwesi.john@example.com',
        ],
    ]);
});

Route::get('/jokes/{id}', function ($id) {
    $joke = Joke::findOrFail($id);

    return view('jokes.show', [
        'joke' => $joke,
    ]);
});

Route::get('/jokes/{id}/edit', function ($id) {
    $joke = Joke::findOrFail($id);

    return view('jokes.edit', [
        'joke' => $joke,
    ]);
});

Route::put('/jokes/{id}', function ($id) {
    $joke = Joke::findOrFail($id);
    $joke->update(request()->only(['title', 'content']));

    return redirect('/jokes/'.$id)->with('success', 'Joke updated successfully!');
});

// Backward compatibility alias if /jokes/{id}/edit is requested with PUT
Route::put('/jokes/{id}/edit', function ($id) {
    $joke = Joke::findOrFail($id);
    $joke->update(request()->only(['title', 'content']));

    return redirect('/jokes/'.$id)->with('success', 'Joke updated successfully!');
});

Route::post('/jokes', function () {
    $title = request('title');
    $content = request('content');

    Joke::create([
        'title' => $title,
        'content' => $content,
        'joke_owner' => 'System Admin',
    ]);

    return redirect('/')->with('success', 'Joke created successfully!');
});

Route::delete('/jokes/{id}', function ($id) {
    $joke = Joke::findOrFail($id);
    $joke->delete();

    return redirect('/')->with('success', 'Joke deleted successfully!');
});

Route::view('/faq', 'faq');
