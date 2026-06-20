<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/safari', 'pages.placeholder', ['title' => 'Safari'])->name('safari');
Route::view('/storm', 'pages.placeholder', ['title' => 'Storm'])->name('storm');
Route::view('/programme', 'pages.placeholder', ['title' => 'Programme'])->name('programme');
Route::view('/galerie', 'pages.placeholder', ['title' => 'Galerie'])->name('galerie');
Route::view('/contact', 'pages.placeholder', ['title' => 'Contact'])->name('contact');
Route::view('/a-propos', 'pages.placeholder', ['title' => 'À propos'])->name('about');
Route::view('/login', 'pages.placeholder', ['title' => 'Connexion'])->name('login');
