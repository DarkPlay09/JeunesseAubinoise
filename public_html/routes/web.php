<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.public.home')->name('home');

Route::view('/safari', 'pages.public.safari')->name('safari');

Route::view('/storm', 'pages.public.storm')->name('storm');

Route::view('/programme', 'pages.public.placeholder', [
    'title' => 'Programme',
    'description' => 'Le programme arrive bientôt.',
])->name('programme');

Route::view('/galerie', 'pages.public.placeholder', [
    'title' => 'Galerie',
    'description' => 'La galerie arrive bientôt.',
])->name('galerie');

Route::view('/contact', 'pages.public.placeholder', [
    'title' => 'Contact',
    'description' => 'La page de contact arrive bientôt.',
])->name('contact');

Route::view('/a-propos', 'pages.public.placeholder', [
    'title' => 'À propos',
    'description' => 'La page À propos arrive bientôt.',
])->name('a-propos');
