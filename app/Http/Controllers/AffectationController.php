<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Departement;
use App\Models\Vehicule;
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
    public function create()
    {
        $vehicules = Vehicule::orderBy('id', 'asc')->get();
        $departements = Departement::orderBy('id', 'asc')->get();
        return view('pages.affectations.ajouter_affectation', compact('vehicules', 'departements'));
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
        return view('pages.affectations.detail_affectation');
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
