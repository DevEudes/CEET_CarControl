<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Chauffeur;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appvnmts = Approvisionnement::all();
        return view('pages.approvisionnements.liste_fiche_appvnmt', compact('appvnmts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicules = Vehicule::all();
        $typeAppvnmts = Approvisionnement::all();
        $chauffeurs = Chauffeur::all();
        return view('pages.approvisionnements.ajouter_fiche_appvnmt', compact('vehicules', 'typeAppvnmts', 'chauffeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.approvisionnements.detail_fiche_appvnmt');
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
