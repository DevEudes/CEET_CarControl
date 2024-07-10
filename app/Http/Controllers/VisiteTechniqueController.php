<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisiteTechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.documents.visite_techniques.liste_visite_technique');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.documents.visite_techniques.ajouter_visite_technique');
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
        return view('pages.documents.assurances.detaill_assurance');
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
