<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/theme', function () {
    return view('theme');
})->name('theme');

Route::get('/components', function () {
    return view('components');
})->name('components');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/docs', function () {
    return view('docs');
})->name('docs');

Route::get('/get-it', function () {
    return view('get-it');
})->name('get-it');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/imprint', function () {
    return view('imprint');
})->name('imprint');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/accessibility', function () {
    return view('accessibility');
})->name('accessibility');

Route::get('/tall-stack', function () {
    return view('tall-stack');
})->name('tall-stack');

Route::get('/laravel', function () {
    return view('laravel');
})->name('laravel');

Route::get('/alpinejs', function () {
    return view('alpinejs');
})->name('alpinejs');

Route::get('/livewire', function () {
    return view('livewire');
})->name('livewire');

Route::get('/tailwind', function () {
    return view('tailwind');
})->name('tailwind');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/roadmap', function () {
    return view('roadmap');
})->name('roadmap');

Route::get('/issues', function () {
    return view('issues');
})->name('issues');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
