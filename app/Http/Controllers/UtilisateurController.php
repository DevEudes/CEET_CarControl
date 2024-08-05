<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        ], [
            'matricule.required' => 'Le matricule est requis.',
            'nom.required' => 'Le nom est requis.',
            'prenom.required' => 'Le prénom est requis.',
            'contact.required' => 'Le contact est requis.',
            'email.required' => "L'adresse e-mail est requise.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'email.unique' => "Cette adresse e-mail est déjà utilisée.",
            'password.required' => 'Le mot de passe est requis.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'id_profil.required' => 'Le profil est requis.',
            'id_profil.exists' => 'Le profil sélectionné est invalide.',
            'id_departement.required' => 'Le département est requis.',
            'id_departement.exists' => 'Le département sélectionné est invalide.',
            'role.required' => 'Le rôle est requis.',
            'role.exists' => 'Le rôle sélectionné est invalide.',
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $profils = Profil::all();
        $roles = \Spatie\Permission\Models\Role::all();
        $departements = Departement::all();

        return view('pages.utilisateurs.modifier_utilisateur', compact('user', 'profils', 'roles', 'departements'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données entrantes
        $request->validate([
            'matricule' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'id_profil' => ['required', 'exists:profils,id'],
            'id_departement' => ['required', 'exists:departements,id'],
            'role' => ['required', 'exists:roles,name'],
        ], [
            'matricule.required' => 'Le matricule est requis.',
            'nom.required' => 'Le nom est requis.',
            'prenom.required' => 'Le prénom est requis.',
            'contact.required' => 'Le contact est requis.',
            'email.required' => "L'adresse e-mail est requise.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'email.unique' => "Cette adresse e-mail est déjà utilisée.",
            'id_profil.required' => 'Le profil est requis.',
            'id_profil.exists' => 'Le profil sélectionné est invalide.',
            'id_departement.required' => 'Le département est requis.',
            'id_departement.exists' => 'Le département sélectionné est invalide.',
            'role.required' => 'Le rôle est requis.',
            'role.exists' => 'Le rôle sélectionné est invalide.',
        ]);

        // Récupération de l'utilisateur existant
        $user = User::findOrFail($id);

        // Mise à jour des informations de l'utilisateur
        $user->update([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'contact' => $request->contact,
            'email' => $request->email,
            'id_profil' => $request->id_profil,
            'id_departement' => $request->id_departement,
        ]);

        // Synchronisation du rôle de l'utilisateur
        $user->syncRoles([$request->role]);

        // Redirection avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string',
        ], [
            'password.required' => 'Le mot de passe est requis pour supprimer un utilisateur.',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return response()->json(['success' => false, 'message' => 'Mot de passe incorrect.'], 401);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true, 'message' => 'Utilisateur supprimé avec succès.']);
    }
}
