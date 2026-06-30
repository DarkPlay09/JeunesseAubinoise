<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_THROTTLED) {
            return back()
                ->withInput($request->only('email'))
                ->with('cooldown', 60)
                ->with('status', 'Un e-mail a déjà été envoyé récemment. Veuillez patienter avant de réessayer.');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('cooldown', 60)
            ->with('status', 'Si un compte existe avec cette adresse, un e-mail de réinitialisation vient d’être envoyé.');
    }
}
