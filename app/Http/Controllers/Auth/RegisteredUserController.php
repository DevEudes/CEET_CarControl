<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $profils = Profil::all();
        $roles = \Spatie\Permission\Models\Role::all();

        return view('auth.register', compact('profils', 'roles'));
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'id_profil' => ['required', 'exists:profils,id'],
            'role' => ['required', 'exists:roles,name'],
        ]);

        $user = User::create([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_profil' => $request->id_profil,
        ]);

        // Attribuer le rôle à l'utilisateur
        $user->assignRole($request->role);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('vehicules.index')->with('success', 'Utilisateur créé avec succès.');
    }
}
