<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $demandes=Demande::where('id', '!=', null)->orderBy('created_at')->get();
        return view('demande.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($formation_id = null)
    {
        return view('demande.create', compact('formation_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|integer|in:0,1',
            'email' => 'nullable|email|max:255',
            'mobile_1' => 'required|string|max:15',
            'mobile_2' => 'nullable|string|max:15',
            'objectif' => 'nullable|string|max:1000',
            'libelle' => 'required|string|max:255',
        ]);

        Demande::create($validated); // Enregistrer les données dans la base

        session()->flash('message', "Demande Envoyée avec succès, Le support vous contactera !");

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
