<?php

use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\ProgrammeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.public.home')->name('home');

Route::view('/safari', 'pages.public.safari')->name('safari');

Route::view('/storm', 'pages.public.storm')->name('storm');

Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme');
Route::get('/programme/{slug}/calendrier', [ProgrammeController::class, 'calendar'])->name('programme.calendar');

Route::get('/galerie', [GalleryController::class, 'index'])->name('galerie');
Route::get('/galerie/{slug}', [GalleryController::class, 'show'])->name('galerie.show');

Route::view('/contact', 'pages.public.contact')->name('contact');
