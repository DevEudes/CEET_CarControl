<?php
// UtilisateurController.php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;


class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = User::all();
        return view('pages.utilisateurs.liste_utilisateur', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $profils = Profil::all();
    $roles = \Spatie\Permission\Models\Role::all();
    $departements = Departement::all();

    return view('pages.utilisateurs.ajouter_utilisateur', compact('profils', 'roles', 'departements'));
}

    /**
     * Store a newly created resource in storage.
     */
    // UtilisateurController.php

public function store(Request $request)
{
    $request->validate([
        'matricule' => ['required', 'string', 'max:255'],
        'nom' => ['required', 'string', 'max:255'],
        'prenom' => ['required', 'string', 'max:255'],
        'contact' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'id_profil' => ['required', 'exists:profils,id'],
        'id_departement' => ['required', 'exists:departements,id'],
        'role' => ['required', 'exists:roles,name'],
    ]);

    $user = User::create([
        'matricule' => $request->matricule,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'contact' => $request->contact,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'id_profil' => $request->id_profil,
        'id_departement' => $request->id_departement,
    ]);

    // Attribuer le rôle à l'utilisateur
    $user->assignRole($request->role);

    event(new Registered($user));

    return redirect()->route('utilisateurs.create')->with('success', 'Utilisateur créé avec succès.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
