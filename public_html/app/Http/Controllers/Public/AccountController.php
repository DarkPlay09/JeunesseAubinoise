<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function profile(): View
    {
        return view('pages.public.account.profile');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
        ]);

        $request->user()->update($validated);

        return back()->with('profile_status', 'Vos informations ont bien été mises à jour.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-ZÀ-Ý]/',
                'regex:/[0-9]/',
                'confirmed',
            ],
        ], [
            'password.regex' => 'Le nouveau mot de passe doit contenir au moins une majuscule et un chiffre.',
        ]);

        $request->user()->forceFill([
            'password' => $validated['password'],
        ])->save();

        return back()->with('password_status', 'Votre mot de passe a bien été modifié.');
    }

    public function tickets(): View
    {
        $tickets = auth()->user()
            ->tickets()
            ->with(['event', 'ticketType', 'order'])
            ->latest()
            ->get();

        return view('pages.public.account.tickets', [
            'tickets' => $tickets,
        ]);
    }

    public function purchases(): View
    {
        $orders = auth()->user()
            ->orders()
            ->with(['items.ticketType'])
            ->latest()
            ->get();

        return view('pages.public.account.purchases', [
            'orders' => $orders,
        ]);
    }
}
