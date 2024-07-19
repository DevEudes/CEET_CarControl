<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Affectation;
use App\Models\Departement;
use App\Models\GenreVehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departement = Departement::where('nom', 'parc auto')->first();

        $vehicules_parc_auto = Vehicule::whereHas('affectations', function($query) use ($departement) {
            $query->where('id_departement', $departement->id);
        })->with('genre_vehicule')->get();

        return view('index', compact('vehicules_parc_auto'));
    }
    
    public function list()
    {
        $affectations = Affectation::orderBy('created_at', 'desc')->with('vehicule')->with('departement')->get();

        return view('pages.vehicules.liste_vehicule', compact('affectations'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = GenreVehicule::orderBy('id', 'asc')->get();

        return view('pages.vehicules.ajouter_vehicule', compact('genres'));
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:vehicules,code',
            'immatriculation' => 'required|string|unique:vehicules,immatriculation',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'numero_moteur' => 'required|string|unique:vehicules,numero_moteur',
            'numero_chassis' => 'required|string|unique:vehicules,numero_chassis',
            'date_obtention' => 'required|date',
            'numero_carte_grise' => 'required|integer|unique:vehicules,numero_carte_grise',
            'image_carte_grise' => 'required|string|unique:vehicules,image_carte_grise',
            'validite_garantie' => 'nullable|date',
            'index' => 'required|integer',
            'liste_outillage' => 'required|string',
            'etat_vehicule' => 'required|in:neuf,bon_etat,indisponible,en_maintenance,etat_passable,mauvais_etat,rebut',
            'id_genre_vehicule' => 'required|exists:genre_vehicules,id',
        ]);

        $vehicule = new Vehicule();
        $vehicule->code = $request->code;
        $vehicule->immatriculation = $request->immatriculation;
        $vehicule->marque = $request->marque;
        $vehicule->modele = $request->modele;
        $vehicule->numero_moteur = $request->numero_moteur;
        $vehicule->numero_chassis = $request->numero_chassis;
        $vehicule->date_obtention = $request->date_obtention;
        $vehicule->numero_carte_grise = $request->numero_carte_grise;
        $vehicule->image_carte_grise = $request->image_carte_grise;
        $vehicule->validite_garantie = $request->validite_garantie;
        $vehicule->index = $request->index;
        $vehicule->liste_outillage = $request->liste_outillage;
        $vehicule->etat_vehicule = $request->etat_vehicule;
        $vehicule->id_genre_vehicule = $request->id_genre_vehicule;

        // Ajouter les userstamps
        $vehicule->created_by = Auth::id();
        $vehicule->updated_by = Auth::id();

        try {
            $vehicule->save();

            // Utilisation de Log pour enregistrer une information de succès
            Log::info('Véhicule créé avec succès.', $vehicule->toArray());

            return redirect()->route('vehicules.index')->with('success', 'Véhicule créé avec succès');
        } catch (\Exception $e) {
            // Utilisation de Log pour enregistrer une erreur
            Log::error('Erreur lors de la création du véhicule : ' . $e->getMessage());

            return redirect()->back()->with('error', 'Erreur lors de la création du véhicule : ' . $e->getMessage())->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.vehicules.detail_vehicule');
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
