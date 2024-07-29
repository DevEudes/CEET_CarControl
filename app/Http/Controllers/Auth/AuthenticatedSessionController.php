<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        if (Auth::check()){
            return redirect()->route('vehicules.index');
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();

            // Ajout de logs pour le débogage
            Log::info('Utilisateur authentifié', ['user_id' => $user->id, 'email' => $user->email]);

            // Redirections en fonction des rôles
            if ($user->hasAnyRole(['admin', 'chef_service', 'exploitant'])) {
                return redirect()->intended(route('vehicules.index'));
            } elseif ($user->hasRole('controleur')) {
                return redirect()->intended(route('sorties.index'));
            } elseif ($user->hasRole('mecanicien')) {
                return redirect()->intended(route('maintenances.index'));
            } elseif ($user->hasRole('magasinier')) {
                return redirect()->intended(route('magasins.index'));
            } elseif ($user->hasRole('pompiste')) {
                return redirect()->intended(route('approvisionnements.index'));
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'authentication' => 'Rôle non autorisé.',
                ])->withInput();
            }
        }
        

        return redirect()->route('login')->withErrors([
            'authentication' => 'Email ou mot de passe incorrect.',
        ])->withInput();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
