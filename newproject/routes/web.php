<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop', 
    ['judul' => 'Harry Potter'],
    ['isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium dolor aperiam voluptatibus consectetur esse obcaecati sunt laboriosam ab labore voluptatem, doloremque, similique quae, fuga et tenetur laborum veritatis laudantium omnis.
    ']);
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact', ['contact' => '085234917876']);
});

