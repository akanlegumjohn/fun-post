<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = [
        ['title' => 'Post 1', 'content' => 'This is the content of post 1.'],
        ['title' => 'Post 2', 'content' => 'This is the content of post 2.'],
        ['title' => 'Post 3', 'content' => 'This is the content of post 3.'],
    ];

    return view('home', ['posts' => $posts, 'search' => request('search'), 'user' => [
        'name' => 'Kwesi John',
        'email' => 'kwesi.john@example.com',
    ]]);
});

Route::view('/faq', 'faq');
