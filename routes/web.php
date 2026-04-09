<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/movies', function () {
    return view('film');
});

Route::get('/favorite', function () {
    return view('fav');
});