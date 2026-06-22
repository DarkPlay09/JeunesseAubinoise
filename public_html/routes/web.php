<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/safari', 'pages.safari')->name('safari');
Route::view('/storm', 'pages.storm')->name('storm');

Route::view('/programme', 'pages.placeholder', [
    'title' => 'Programme',
    'description' => 'La page programme arrive bientôt.',
])->name('programme');

Route::view('/galerie', 'pages.placeholder', [
    'title' => 'Galerie',
    'description' => 'La page galerie arrive bientôt.',
])->name('galerie');

Route::view('/contact', 'pages.placeholder', [
    'title' => 'Contact',
    'description' => 'La page contact arrive bientôt.',
])->name('contact');

Route::view('/a-propos', 'pages.placeholder', [
    'title' => 'À propos',
    'description' => 'La page à propos arrive bientôt.',
])->name('a-propos');

Route::view('/login', 'pages.placeholder', [
    'title' => 'Connexion',
    'description' => 'La connexion sera ajoutée dans une prochaine étape.',
])->name('login');
