<?php

namespace App\Http\Controllers;

use App\Models\DemandeAchat;
use App\Models\Departement;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achats = DemandeAchat::orderBy('date', 'desc')->get();

        return view('pages.achats.liste_demande_achat', compact('achats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::orderBy('id', 'asc')->get();
        return view('pages.achats.ajouter_demande_achat', compact('departements'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        // $request->validate([
        //     'numero_demande' => 'required|numerique',
        //     'date' => 'required|date',
        //     'numero_oT' => 'required|string|max:255',
        //     'centre_cout_machine' => 'required|string|max:255',
        //     'depense_engagement_concedent' => 'required|string|max:255',
        //     'motif' => 'required|string|max:255',
        //     'id_departement' => 'required|numeric',
        //     'label' => 'required|string|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le dossier de destination est accessible en écriture
        // ]);

        // // Enregistrer les données dans la base de données
        // $university = new University();
        // $university->name = $request->name;
        // $university->address = $request->address;
        // $university->headmaster = $request->headmaster;
        // $university->tuition = $request->tuition;
        // $university->create_date = $request->create_date;
        // $university->marks = $request->marks;
        // $university->population = $request->population;
        // $university->label = $request->label;
        // $university->category_id = $request->category_id;

        // // Enregistrer l'image
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        //     $university->image = $imageName;
        // }

        // $university->save();

        // // Rediriger l'utilisateur vers une page de confirmation ou une autre vue
        // return redirect()->route('schools_list')->with('success', 'Université enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.achats.detail_demande_achat');

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