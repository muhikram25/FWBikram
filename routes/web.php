<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
// Route::controller(HalamanController::class)->group(function () {
//     Route::get('/home', 'home')->name('home');
//     Route::get('/about', 'about')->name('about');
//     Route::get('/contact', 'contact')->name('contact');
//     Route::get('/properties', 'properties')->name('properties');
//     Route::get('/blog', 'blog')->name('blog');
});
