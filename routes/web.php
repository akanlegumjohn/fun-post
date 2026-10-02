<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $posts = Post::all();

    return view('home', ['posts' => $posts, 'search' => request('search'), 'user' => [
        'name' => 'Kwesi John',
        'email' => 'kwesi.john@example.com',
    ]]);
});

Route::post('/posts', function () {

    $content = request('content');
    $title = request('title');

    Post::create([
        'title' => $title,
        'content' => $content,
        'post_owner' => 'System Admin',
    ]);

    return redirect('/')->with('success', 'Post created successfully!');
});

Route::view('/faq', 'faq');
