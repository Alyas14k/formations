<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Formateur;
use App\Models\FormationFormateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['verifier_nom_commercial']]);
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $formations=Formation::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        $formateurs=Formateur::where('id', '!=', null)->OrderBy('created_at', 'desc')->get();
        return view('formation.index', compact('formations','formateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        if($request->hasFile('image'))
                    {
                        $file=$request->file('image');
                        $annee=date("Y", strtotime(now()));                        
                        $mois=date("M", strtotime(now()));
                        $jour=date("D", strtotime(now()));
                        $extension=$file->getClientOriginalExtension();
                        $fileName= $jour.'-'.$mois.'-'.$annee.'.'.$extension;
                        $emp='public/files/'.$annee;
                        $url_file=$request->file('image')->storeAs($emp, $fileName);
                }
                
        $formations=Formation::create([
            'titre'=>$request->titre,
            'prix'=>$request->prix,
            'lieu'=>$request->lieu,
            'place'=>$request->place,
            'objectif'=>$request->objectif,
            'date_debut'=>$request->debut,
            'date_fin'=>$request->fin,
            'description'=>$request->description,
            'user'=>Auth::user()->id,
            'url'=>$url_file
        ]);
        if($formations){
            $store=FormationFormateur::create([
                'formation_id'=>$formations->id,
                'formateur_id'=>$request->formateur
            ]);
        }
        session()->flash('message', "Formation ajoutée avec succès !");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        
        $formation=Formation::find($id);
        $formateurs=Formateur::where('id', '!=', null)->OrderBy('created_at', 'desc')->get();
        //dd($formateurs);
        return view('formation.edit', compact('formation','formateurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $formation)
    {
        //
        //dd($request->all());
        $formation=Formation::find($formation);
        $formateur=FormationFormateur::where('formation_id', $formation->id)->first();
        if($request->hasFile('image'))
                    {
                        $file=$request->file('image');
                        $annee=date("Y", strtotime(now()));
                        $mois=date("M", strtotime(now()));
                        $jour=date("D", strtotime(now()));
                        $extension=$file->getClientOriginalExtension();
                        $fileName= $jour.'-'.$mois.'-'.$annee.'_'.$formation->id.'.'.$extension;
                        $emp='public/files/'.$annee;
                        $url_file=$request->file('image')->storeAs($emp, $fileName);
                }
                else{
                 $url_file=$formation->url;   
                }
        if($formation){
            $formation->update([
                'titre'=>$request->titre,
                'prix'=>$request->prix,
                'lieu'=>$request->lieu,
                'place'=>$request->place,
                'objectif'=>$request->objectif,
                'date_debut'=>$request->debut,
                'date_fin'=>$request->fin,
                'description'=>$request->description,
                'modify_by'=>Auth::user()->id,
                'url'=>$url_file
            ]);
            
            if($formateur->formateur_id != $request->formateur){
                $formateur->update([
                    'formateur_id'=>$request->formateur
                ]);
            }
        }

        session()->flash('message', "Formation modifiée avec succès !");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
