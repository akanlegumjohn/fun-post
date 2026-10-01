<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $post = session()->get('post', []);
    $posts = array_reverse($post);

    return view('home', ['posts' => $posts, 'search' => request('search'), 'user' => [
        'name' => 'Kwesi John',
        'email' => 'kwesi.john@example.com',
    ]]);
});

Route::post('/posts', function () {

    $content = request('content');
    $title = request('title');
    $post = ['title' => $title, 'content' => $content];
    session()->push('post', $post);

    return redirect('/')->with('success', 'Post created successfully!');
});

Route::view('/faq', 'faq');
