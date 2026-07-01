<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Public\AccountController;
use App\Http\Controllers\Public\AccountTicketController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\ProgrammeController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\StormArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.public.home')->name('home');

Route::view('/safari', 'pages.public.safari')->name('safari');

Route::view('/storm', 'pages.public.storm')->name('storm');
Route::get('/storm/artistes/{artist}', [StormArtistController::class, 'show'])
    ->name('storm.artists.show');

Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme');
Route::get('/programme/{slug}/calendrier', [ProgrammeController::class, 'calendar'])->name('programme.calendar');

Route::get('/galerie', [GalleryController::class, 'index'])->name('galerie');
Route::get('/galerie/{slug}', [GalleryController::class, 'show'])->name('galerie.show');

Route::view('/contact', 'pages.public.contact')->name('contact');
Route::get('/contact/ecrire/{recipient?}', [ContactController::class, 'create'])
    ->name('contact.form');
Route::post('/contact/ecrire', [ContactController::class, 'send'])
    ->name('contact.send');


/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::view('/connexion', 'pages.auth.login')->name('login');
    Route::view('/inscription', 'pages.auth.register')->name('register');

    Route::post('/connexion', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'is_active' => true,
        ], $remember)) {
            $request->session()->regenerate();

            $request->user()->forceFill([
                'last_login_at' => now(),
            ])->save();

            return redirect()->intended(route('account.tickets'));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Les identifiants sont incorrects ou le compte est désactivé.',
            ]);
    })->name('login.store');

    Route::get('/mot-de-passe-oublie', [ForgotPasswordController::class, 'create'])
        ->name('password.request');

    Route::post('/mot-de-passe-oublie', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reinitialiser-mot-de-passe/{token}', [ResetPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reinitialiser-mot-de-passe', [ResetPasswordController::class, 'store'])
        ->name('password.update');
});

Route::post('/deconnexion', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
})->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| Billetterie publique
|--------------------------------------------------------------------------
*/

Route::view('/billetterie', 'pages.public.tickets.index')->name('tickets.index');
Route::view('/billetterie/participants', 'pages.public.tickets.participants')->name('tickets.participants');
Route::view('/billetterie/recapitulatif', 'pages.public.tickets.summary')->name('tickets.summary');
Route::view('/billetterie/succes', 'pages.public.tickets.success')->name('tickets.success');


/*
|--------------------------------------------------------------------------
| Espace membre
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::view('/notifications', 'pages.public.notifications.index')
        ->name('notifications.index');

    Route::get('/mon-profil', [AccountController::class, 'profile'])
        ->name('account.profile');

    Route::patch('/mon-profil', [AccountController::class, 'updateProfile'])
        ->name('account.profile.update');

    Route::patch('/mon-profil/mot-de-passe', [AccountController::class, 'updatePassword'])
        ->name('account.password.update');

    Route::get('/mes-achats', [AccountController::class, 'purchases'])
        ->name('account.purchases');

    Route::get('/mes-tickets', [AccountController::class, 'tickets'])
        ->name('account.tickets');

    Route::get('/mes-tickets/{ticket}', [AccountTicketController::class, 'show'])
        ->name('account.tickets.show');

    Route::get('/mes-tickets/{ticket}/modifier-nom', [AccountTicketController::class, 'editName'])
        ->name('account.tickets.edit-name');

    Route::post('/mes-tickets/{ticket}/modifier-nom', [AccountTicketController::class, 'updateName'])
        ->name('account.tickets.update-name');

    Route::get('/mes-tickets/{ticket}/telecharger', [AccountTicketController::class, 'download'])
        ->name('account.tickets.download');
});
