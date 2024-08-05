<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Affectation;
use App\Models\Departement;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affectations = Affectation::orderBy('date_affectation', 'desc')->get();
        return view('pages.affectations.liste_affectation', compact('affectations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Récupération de tous les véhicules et départements
        $vehicules = Vehicule::all();
        $departements = Departement::all();
        $vehicule = null;
    
        // Vérification de l'existence de 'vehicule_id' dans la requête
        if ($request->has('vehicule_id')) {
            $vehicule = Vehicule::find($request->vehicule_id);
        }
    
        // Générer 'numero_affectation'
        $currentYear = Carbon::now()->format('y');
    
        // Récupérer le dernier 'numero_affectation' de la base de données
        $lastAffectation = Affectation::orderBy('id', 'desc')->first(['numero_affectation']);
    
        // Déterminer le prochain numéro
        if ($lastAffectation) {
            $lastNumber = intval(substr($lastAffectation->numero_affectation, 3, 6)); // Extraire la partie numérique
            $nextNumber = str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '000001'; // Commencer à partir de 000001 s'il n'y a aucun enregistrement
        }
    
        // Formater le nouveau 'numero_affectation'
        $numero_affectation = 'AFF' . $nextNumber . '/' . $currentYear;
    
        // Retourner la vue avec les données nécessaires
        return view('pages.affectations.ajouter_affectation', compact('vehicules', 'departements', 'vehicule', 'numero_affectation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'numero_affectation' => 'required|string|max:255|unique:affectations',
            'date_affectation' => 'required|date',
            'kilometrage' => 'required|integer',
            'fonction' => 'required|string|max:255',
            'id_departement' => 'required|integer|exists:departements,id',
            'immatriculation' => 'required|string|exists:vehicules,immatriculation'
        ]);

        // Récupérer les informations du véhicule à partir de l'immatriculation
        $vehicule = Vehicule::where('immatriculation', $request->immatriculation)->first();

        if (!$vehicule) {
            return back()->withErrors(['immatriculation' => 'Véhicule non trouvé.']);
        }

        // Création de l'affectation
        $affectation = Affectation::create([
            'numero_affectation' => $request->numero_affectation,
            'date_affectation' => $request->date_affectation,
            'kilometrage' => $request->kilometrage,
            'fonction' => $request->fonction,
            'id_departement' => $request->id_departement,
            'id_vehicule' => $vehicule->id,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        // Redirection avec message de succès
        return redirect()->route('affectations.create')->with('success', 'Fiche créée avec succès.');
    }

    /**
     * Fetch vehicle information based on immatriculation for AJAX requests.
     */
    public function getImmatriculations(Request $request)
    {
        $search = $request->get('q');
        $vehicules = Vehicule::where('immatriculation', 'LIKE', "%$search%")
            ->select('immatriculation')
            ->get();

        return response()->json($vehicules);
    }

    /**
     * Fetch detailed vehicle information for AJAX requests.
     */
    public function getVehicleInfo($immatriculation)
    {
        $vehicule = Vehicule::where('immatriculation', $immatriculation)->first();

        if ($vehicule) {
            return response()->json([
                'success' => true,
                'vehicule' => [
                    'marque' => $vehicule->marque,
                    'modele' => $vehicule->modele
                ]
            ]);
        }

        return response()->json(['success' => false]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $affectation = Affectation::find($id);
        return view('pages.affectations.afficher_affectation', compact('affectation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $affectation = Affectation::find($id);
        $vehicules = Vehicule::all();
        $departements = Departement::all();

        return view('pages.affectations.editer_affectation', compact('affectation', 'vehicules', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $affectation = Affectation::find($id);

        $request->validate([
            'date_affectation' => 'required|date',
            'kilometrage' => 'required|integer',
            'fonction' => 'required|string|max:255',
            'id_departement' => 'required|integer|exists:departements,id',
        ]);

        $vehicule = Vehicule::where('immatriculation', $request->immatriculation)->first();

        if (!$vehicule) {
            return back()->withErrors(['immatriculation' => 'Véhicule non trouvé.']);
        }

        $affectation->update([
            'date_affectation' => $request->date_affectation,
            'kilometrage' => $request->kilometrage,
            'fonction' => $request->fonction,
            'id_departement' => $request->id_departement,
            'id_vehicule' => $vehicule->id,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('affectations.index')->with('success', 'Fiche d\'affectation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $affectation = Affectation::find($id);

        if ($affectation) {
            $affectation->delete();
            return redirect()->route('affectations.index')->with('success', 'Fiche d\'affectation supprimée avec succès.');
        }

        return redirect()->route('affectations.index')->withErrors('Fiche d\'affectation non trouvée.');
    }
}
