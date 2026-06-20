<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

// Pages publiques prévues pour la suite.
Route::view('/safari', 'pages.placeholder')->name('safari');
Route::view('/storm', 'pages.placeholder')->name('storm');
Route::view('/programme', 'pages.placeholder')->name('programme');
Route::view('/galerie', 'pages.placeholder')->name('gallery');
Route::view('/contact', 'pages.placeholder')->name('contact');
