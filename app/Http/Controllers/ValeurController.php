<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\Valeur;
use Illuminate\Http\Request;

class ValeurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['listevaleur', 'selection']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametres = Parametre::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        $valeurs= Valeur::with("parametre")->orderBy('updated_at', 'desc')->get();
        return view('valeur._index', compact('valeurs', 'parametres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $valeurs = Valeur::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        $parametres = Parametre::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        return view('valeur.create', compact('parametres','valeurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Valeur::create([
            'parametre_id'=>$request->parametre,
            'valeur_id'=>$request->parent,
            'libelle'=>$request->libelle,
            'description'=>$request->description,
            'code'=>$request->code,
        ]);
        return redirect(route('valeur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Valeur  $valeur
     * @return \Illuminate\Http\Response
     */
    public function show(Valeur $valeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Valeur  $valeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Valeur $valeur)
    {
        $vals= Valeur::all();
        $parametres= Parametre::all();
        return view('valeur.edit',compact('valeur', 'parametres', 'vals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Valeur  $valeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valeur $valeur)
    {
        $valeur->parametre_id= $request->parametre;
        $valeur->valeur_id= $request->parent;
        $valeur->libelle=$request->libelle;
        $valeur->description= $request->description;
        $valeur->save();
        return redirect(route('valeur.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Valeur  $valeur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Valeur::destroy($id);
       return redirect()->route("valeur.index");
    }
    public function selection(Request $request)
    {
        //dd($request->all());
        $idparent_val = $request->idparent_val;
        $id_param = $request->id_param;

        $parent = $request->parent;
        $valeurs = Valeur::where(['parametre_id' => $id_param , 'valeur_id' =>$idparent_val ])->get();
        
         if ($valeurs->count() == 0) {

            $valeurs = Valeur::where('id', $idparent_val)->first();
            $array[] = array("id" => $valeurs->id, "name" => $valeurs->libelle);
        } else {
            foreach ($valeurs as $valeur) {
                $array[] = array("id" => $valeur->id, "name" => $valeur->libelle);
            }
        }
        //dd($array);
        return json_encode($array);
    }
    public function listevaleur(Request $request)
    {
      //dd($request->all());
        $parent=$request->idparent_val;
      //dd($parent);
    
      $valeurs = Valeur::where(['parametre_id' => 48 , 'valeur_id' =>$parent ])->get();

         //$valeurs = Valeur::where('parametre_id', 48)->where('valeur_id', $parent)->get();        
         //dd($valeurs);
                foreach ($valeurs as $valeur)
                    {
                        $array[] = array("id" => $valeur->id, "libelle" => $valeur->description);
                    }

                 return json_encode($array) ;

    }
}
