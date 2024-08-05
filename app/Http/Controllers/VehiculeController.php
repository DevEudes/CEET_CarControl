<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Affectation;
use App\Models\Chauffeur;
use App\Models\Departement;
use App\Models\Fichesortie;
use App\Models\Fournisseur;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\GenreVehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class VehiculeController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $departement = Departement::where('nom', 'Parc Auto')->first();

        // Récupérer l'identifiant de la dernière affectation pour chaque véhicule
        $latestAffectationIds = Affectation::selectRaw('MAX(id) as latest_id')
            ->groupBy('id_vehicule');

        // Récupérer les véhicules dont la dernière affectation est au département "Parc Auto"
        $vehicules_parc_auto = Vehicule::whereHas('affectations', function (Builder $query) use ($latestAffectationIds, $departement) {
            $query->whereIn('id', $latestAffectationIds)
                ->where('id_departement', $departement->id);
        })->with(['genre_vehicule', 'affectations', 'marque', 'modele' => function ($query) use ($latestAffectationIds) {
            $query->whereIn('id', $latestAffectationIds)
                ->orderBy('created_at', 'desc');
        }])->get();

        // Calculer les données pour les cartes
        $countVehiculesDisponibles = Vehicule::where('etat_vehicule', 'bon etat')->count();
        $countVehiculesMaintenance = Vehicule::where('etat_vehicule', 'maintenance')->count();
        $countChauffeursDisponibles = Chauffeur::where('disponibilite', true)->count();
        $countSortiesEnCours = Fichesortie::where('etat_fiche', 'en cours')->count();

        // Calculer le nombre de véhicules par catégorie
        $vehiculesParCategorie = Vehicule::select('id_genre_vehicule', DB::raw('count(*) as count'))
            ->groupBy('id_genre_vehicule')
            ->with('genre_vehicule')
            ->get();

        // Calculer le flux de sortie de véhicules
        $fluxSortieVehicules = $this->getFluxSortieVehicules();

        return view('index', compact(
            'vehicules_parc_auto',
            'countVehiculesDisponibles',
            'countVehiculesMaintenance',
            'countChauffeursDisponibles',
            'countSortiesEnCours',
            'vehiculesParCategorie',
            'fluxSortieVehicules'
        ));
    }

    private function getFluxSortieVehicules()
    {
        // Dummy data - replace with actual logic
        return [
            'hours' => ['08:00', '09:00', '10:00', '11:00', '12:00'],
            'data' => [5, 10, 15, 8, 6]
        ];
    }


    /**
     * Affiche la liste des véhicules.
     */
    public function list()
    {
        $departement = Departement::where('nom', 'Parc Auto')->first();
        // Récupérer l'identifiant de la dernière affectation pour chaque véhicule
        $latestAffectationIds = Affectation::selectRaw('MAX(id) as latest_id')
        ->groupBy('id_vehicule');
        // Récupérer les véhicules dont la dernière affectation est au département "Parc Auto"
        $vehicules_parc_auto = Vehicule::whereHas('affectations', function (Builder $query) use ($latestAffectationIds, $departement) {
            $query->whereIn('id', $latestAffectationIds)
                ->where('id_departement', $departement->id);
        })->with(['genre_vehicule', 'affectations', 'modele', 'marque' => function ($query) use ($latestAffectationIds) {
            $query->whereIn('id', $latestAffectationIds)
                ->orderBy('created_at', 'desc');
        }])->get();


        // Retrouver la derniere affectation pour chaque vehicules
        $latestAffectationIds = Affectation::select(DB::raw('MAX(id) as latest_id'))
        ->groupBy('id_vehicule')
        ->pluck('latest_id');
        // Retrouver tous les vehicules avec leurs affectation rt department
        $vehicules_all = Vehicule::whereHas('affectations', function (Builder $query) use ($latestAffectationIds) {
            $query->whereIn('id', $latestAffectationIds);
        })->with(['genre_vehicule', 'affectations', 'modele', 'marque' => function ($query) use ($latestAffectationIds) {
            $query->whereIn('id', $latestAffectationIds)
                ->orderBy('created_at', 'desc');
        }, 'affectations.departement'])->get();
        
        $vehicules_neuf = Vehicule::where('etat_vehicule', 'neuf')->with('genre_vehicule', 'affectations.departement')->get();

        $count_all = $vehicules_all->count();
        $count_parc_auto = $vehicules_parc_auto->count();
        $count_neuf = $vehicules_neuf->count();
    
        return view('pages.vehicules.liste_vehicule', compact('vehicules_all', 'vehicules_parc_auto', 'vehicules_neuf', 'count_all', 'count_parc_auto', 'count_neuf'));
    }



    /**
     * Montre le formulaire pour créer une nouvelle ressource.
     */
    public function create()
    {
        $genres = GenreVehicule::all();
        $fournisseurs = Fournisseur::all();
        $marques = Marque::all();
        $modeles = Modele::all();
        $types_moteur = [
            'essence' => 'Essence',
            'diesel' => 'Diesel',
            'microhybride' => 'Microhybride',
            'hybride autorechargeable' => 'Hybride Autorechargeable',
            'hybride rechargeable' => 'Hybride Rechargeable',
            'gaz naturel' => 'Gaz Naturel',
            'gaz de petrole liquéfié' => 'Gaz de Pétrole Liquéfié',
            '100% électrique' => '100% Électrique',
            'pile à combustible' => 'Pile à Combustible'
        ];

        return view('pages.vehicules.ajouter_vehicule', compact('genres', 'fournisseurs', 'marques', 'modeles', 'types_moteur'));
    }

    /**
     * Enregistre une nouvelle ressource.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules',
            'type_moteur' => 'required|string',
            'id_marque' => 'required|integer|exists:marques,id',
            'id_modele' => 'required|integer|exists:modeles,id',
            'numero_moteur' => 'required|string|max:255|unique:vehicules',
            'numero_chassis' => 'required|string|max:255|unique:vehicules',
            'date_achat' => 'required|date|before_or_equal:today',
            'numero_carte_grise' => 'required|string|unique:vehicules',
            'image_carte_grise' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'validite_garantie' => 'required|date|after:date_achat',
            'kilometrage' => 'required|integer',
            'liste_outillage' => 'required|string',
            'id_genre_vehicule' => 'required|integer|exists:genre_vehicules,id',
            'id_fournisseur' => 'required|integer|exists:fournisseurs,id',
        ], [
            'immatriculation.required' => 'L\'immatriculation est requise.',
            'immatriculation.unique' => 'L\'immatriculation que vous avez saisie existe déjà.',
            'id_marque.required' => 'La marque est requise.',
            'id_modele.required' => 'Le modèle est requis.',
            'numero_moteur.required' => 'Le numéro de moteur est requis.',
            'numero_moteur.unique' => 'Le numéro de moteur doit être unique.',
            'numero_chassis.required' => 'Le numéro de châssis est requis.',
            'numero_chassis.unique' => 'Le numéro de châssis doit être unique.',
            'date_achat.required' => 'La date d\'achat est requise.',
            'date_achat.date' => 'La date d\'achat doit être une date valide.',
            'date_achat.after' => 'La date d\'achat ne peut pas être antérieure à la date d\'aujourd\'hui.',
            'date_achat.before_or_equal' => 'La date d\'achat ne peut pas être dans le futur.',
            'numero_carte_grise.required' => 'Le numéro de carte grise est requis.',
            'numero_carte_grise.unique' => 'Le numéro de carte grise existe déjà.',
            'image_carte_grise.required' => 'Une image de la carte grise est requise.',
            'image_carte_grise.image' => 'Le fichier doit être une image.',
            'image_carte_grise.mimes' => 'L\'image doit être au format jpeg, png, jpg ou gif.',
            'image_carte_grise.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'validite_garantie.required' => 'La validité de la garantie est requise.',
            'validite_garantie.date' => 'La validité de la garantie doit être une date valide.',
            'validite_garantie.after' => 'La validité de la garantie doit être après la date d\'achat.',
            'kilometrage.required' => 'Le kilométrage est requis.',
            'kilometrage.integer' => 'Le kilométrage doit être un nombre entier.',
            'liste_outillage.required' => 'La liste d\'outillage est requise.',
            'id_genre_vehicule.required' => 'Le genre de véhicule est requis.',
            'id_genre_vehicule.exists' => 'Le genre de véhicule sélectionné n\'est pas valide.',
            'id_fournisseur.required' => 'Le fournisseur est requis.',
            'id_fournisseur.exists' => 'Le fournisseur sélectionné n\'est pas valide.',
        ]);

        // Gestion de l'image de la carte grise
        if ($request->hasFile('image_carte_grise')) {
            $image = $request->file('image_carte_grise');
            $imagePath = $image->store('carte_grise_images', 'public');
        }

        // Création du véhicule
        $vehicule = Vehicule::create([
            'immatriculation' => $request->immatriculation,
            'id_marque' => $request->id_marque,
            'id_modele' => $request->id_modele,
            'numero_moteur' => $request->numero_moteur,
            'type_moteur' => $request->type_moteur,
            'numero_chassis' => $request->numero_chassis,
            'date_achat' => $request->date_achat,
            'numero_carte_grise' => $request->numero_carte_grise,
            'image_carte_grise' => $imagePath ?? null,
            'validite_garantie' => $request->validite_garantie,
            'kilometrage' => $request->kilometrage,
            'liste_outillage' => $request->liste_outillage,
            'etat_vehicule' => 'neuf',
            'id_genre_vehicule' => $request->id_genre_vehicule,
            'id_fournisseur' => $request->id_fournisseur,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        // Redirection avec message de succès
        return redirect()->route('vehicules.create')->with('success', 'Véhicule créé avec succès.')->with('newVehiculeId', $vehicule->id);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(string $id)
    {
        return view('pages.vehicules.detail_vehicule');
    }

    /**
     * Montre le formulaire pour éditer la ressource spécifiée.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Met à jour la ressource spécifiée.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Supprime la ressource spécifiée.
     */
    public function destroy(string $id)
    {
        //
    }
}
