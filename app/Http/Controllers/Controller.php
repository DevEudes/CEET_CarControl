<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Vehicule;

abstract class Controller
{
    // public function index(){
    //     $departement = Departement::where('nom', 'parc auto')->first();

    //     if ($departement) {
    //         // Récupérer les véhicules dont l'affectation correspond au département "parc auto"
    //         $vehicules_parc_auto = Vehicule::whereHas('affectations', function($query) use ($departement) {
    //             $query->where('id_departement', $departement->id);
    //         })->with('genre_vehicule')->get();

    //         return view('index', compact('vehicules_parc_auto')); 
    //     }
    // }
}
