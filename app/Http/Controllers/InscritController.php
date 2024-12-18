<?php

namespace App\Http\Controllers;

use App\Models\Inscrits;
use App\Models\Paiement;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class InscritController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        //$this->middleware('auth', ['except' => ['verifier_nom_commercial']]);
        $this->middleware('auth', ['except'=>['create','store']]);
    }

    public function index()
    {
        //
        $date= new \Date();
        $inscrits=Inscrits::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        $formations=Formation::where('id','!=', null)
        ->orderBy('created_at', 'desc')->get();
        return view('inscrits.index', compact('inscrits','formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($formation_id = null)
    {
        return view('inscrits.create', compact('formation_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // $validated = $request->validate([
        //     'nom' => 'required|string|max:255',
        //     'prenom' => 'required|string|max:255',
        //     'sexe' => 'required|integer|in:0,1',
        //     'email' => 'nullable|email|max:255',
        //     'mobile_1' => 'required|string|max:15',
        //     'mobile_2' => 'nullable|string|max:15',
        //     'objectif' => 'nullable|string|max:1000',
        //     'statut' => 0,
        //     'type' => 'required|integer|in:0,1',
        //     'type_formation' => 'required|integer|in:0,1'
        // ]);

        // $validated['formation_id'] = $request->formation_id;
        // //$validated['user'] = auth()->id() ?? null; // Associer l'utilisateur connecté

        // Inscrits::create($validated); // Enregistrer les données dans la base

        $inscrits=Inscrits::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'formation_id'=>$request->formation_id,
            'objectif'=>$request->objectif,
            'email'=>$request->email,
            'mobile_1'=>$request->mobile_1,
            'mobile_2'=>$request->mobile_2,
            'type'=>1, // Pour admin Enregistrement
            'type_formation'=>$request->type,
            'statut'=>0
        ]);
        session()->flash('message', "Candidature Envoyée avec succès, Veuillez procéder au Paiement à l'agence !");

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        //dd($id);
        $formations=Formation::where('id','!=', null)
        ->orderBy('created_at', 'desc')->get();
        $inscrit=Inscrits::find($id);
        return view ('inscrits.edit', compact('inscrit','formations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $inscrit)
    {
        //dd($request->all());
        $inscrit=Inscrits::find($inscrit);
        if($inscrit){
            $inscrit_up=$inscrit->update([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'sexe'=>$request->sexe,
                'formation_id'=>$request->formation,
                'objectif'=>$request->objectif,
                'email'=>$request->email,
                'mobile_1'=>$request->mobile_1,
                'mobile_2'=>$request->mobile_2,
                'type_formation'=>$request->type,
                'modify_by'=>Auth::user()->id
            ]);
            if($inscrit_up){
                $paies=Paiement::where('inscrit_id', $inscrit->id)->get();
                if($paies->isNotEmpty()){
                    foreach ($paies as $paie)
                    if ($paie->formation_id != $request->formation) {
                        $paie->update([
                            'formation_id' => $request->formation,
                            'modify_by'=>Auth::user()->id
                        ]);
                    }
                }
            }
        }
        session()->flash('message', "Candidat modifié avec succès !");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function admin_store(Request $request){
       // dd($request->all());
        $inscrits=Inscrits::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'formation_id'=>$request->formation,
            'objectif'=>$request->objectif,
            'email'=>$request->email,
            'mobile_1'=>$request->mobile_1,
            'mobile_2'=>$request->mobile_2,
            'type'=>0, // Pour admin Enregistrement
            'type_formation'=>$request->type,
            'user'=>Auth::user()->id,
            'statut'=>0
        ]);
        session()->flash('message', "Candidat inscrit avec succès !");
        return back();
    }
}
