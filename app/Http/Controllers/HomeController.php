<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Formateur;
use App\Models\Inscrits;
use App\Models\Paiement;
use App\Models\FormationFormateur;
class HomeController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['verifier_nom_commercial']]);
        $this->middleware('auth');
    }
    public function admin()
    {
        //
        $nbr_paye=Inscrits::where('statut', 2)->get();
        $nbrnon_paye=Inscrits::where('statut', 0)->orWhere('statut', 1)->get();
        $nbr_tranch=Paiement::where('reste', '!=', 0)->get();
        $nbr_formation=Formation::where('id', '!=', null)->get();
        $nbr_formateur=Formateur::where('id', '!=', null)->get();
        
        $formation_tabs = Formation::withCount([
            'inscrits', // Total des inscrits
            'inscrits as inscrits_payes_count' => function ($query) {
                $query->where('statut', 2); // Filtre : Payé
            },
            'inscrits as inscrits_non_payes_count' => function ($query) {
                $query->where('statut', 0)
                ->orWhere('statut', 1); // Filtre : Non payé
            },
        ])->get();
        
        $formateur_tabs = FormationFormateur::with(['formation:id,titre,prix', 'formateur:id,nom,prenom'])
        ->get();
          // dd($formateur_tabs);
        $paye=count($nbr_paye);
        $non_paye=count($nbrnon_paye);
        $tranch=count($nbr_tranch);
        $formation=count($nbr_formation);
        $formateur=count($nbr_formateur);

        $data=[
            'paye'=>$paye,
            'non_paye'=>$non_paye,
            'tranch'=>$tranch,
            'formation'=>$formation,
            'formateur'=>$formateur,
            'formation_tabs'=>$formation_tabs,
            'formateur_tabs'=>$formateur_tabs
        ];
        //return redirect()->route('login');
        return view('backend.dash.dashboard', $data);
    }
}
