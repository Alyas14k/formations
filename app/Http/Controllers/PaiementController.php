<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Inscrits;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class PaiementController extends Controller
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
        $inscrits=Inscrits::where('statut', 0)->orWhere('statut', 1)->get();
        $paiements=Paiement::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        return view('paiement.index', compact('paiements','inscrits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        //dd($request->all());

        $inscrit=Inscrits::where('id', $request->inscrit)->first();
        $ins=0;
        //dd($inscrit);
        return view('paiement.create', compact('inscrit','ins'));
    }

    public function ins_payer($id)
    {
        //
        //dd($id);

        $inscrit=Inscrits::where('id', $id)->first();
        $ins=1;
        //dd($inscrit);
        return view('paiement.create', compact('inscrit','ins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       //dd($request->all());
       $date = new \DateTime();
        $annee=date("Y", strtotime(now()));
        $last_id=DB::table('paiements')->latest('id')->first();
        if($last_id){
            $nombre=$last_id->id+1;
        }
        else{
            $nombre=1;
        }
        $code='0'.$nombre.'-'.$request->formation.'-'.$annee;
       $formation=Formation::where('id', $request->formation)->first();
       $prix=$formation->prix;
        $mode=$request->mode;

       $paiement=Paiement::where('inscrit_id', $request->id)
                            ->orderBy('created_at', 'desc') // Tri par la date de création (ou une autre colonne)
                            ->first(); // Récupère la première ligne après le tri
        if(!$paiement){       
            
        if($mode==0){
            $tranche=0;
            $montant=$request->montant_2;
            $reste=0;
        }
        else{
            $tranche=1;
            $montant=$request->montant_1;
            $reste=$prix-$montant;
        }
        }
        else{
            $prix=$paiement->reste;
            if($mode==0){
                $tranche=0;
                $montant=$request->montant_2;
                $reste=0;
            }
            else{
                $tranche=1;
                $montant=$request->montant_1;
                $reste=$prix-$montant;
            }
                        
        }
        //dd($reste);

        $paiement=Paiement::create([
            'formation_id'=>$request->formation,
            'inscrit_id'=>$request->id,
            'montant'=>$montant,
            'tranche'=>$tranche,
            'reste'=>$reste,
            'user'=>Auth::user()->id,
            'code'=>$code
        ]);
        if($paiement){
            $inscrit=Inscrits::where('id', $request->id)->first();

            if($reste==0){
            $inscrit->update([
                'statut'=>2
            ]);
            }
            else{
                $inscrit->update([
                    'statut'=>1
                ]);
            }
        }
        if($request->ins==0){
        session()->flash('message', "Paiement Effectué avec succès !");
        return redirect()->route('paiement.index');
        }
        else{
            session()->flash('message', "Paiement Effectué avec succès !");
        return redirect()->route('inscrit.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }

    public function recu(Request $request, $id)
    {
        //
        //dd($id);
        //dd($request->all());
        $inscrit=Inscrits::find($id);
        $current=Paiement::find($id);
        //dd($paiement_id);

        if($inscrit){
        $last=Paiement::where('inscrit_id', $inscrit->id)->orderBy('created_at', 'desc')->first();        
        $paiementss=Paiement::where('inscrit_id', $inscrit->id)
        ->orderBy('created_at', 'desc')
        ->get();
        //dd($paiementss);
        $c=count($paiementss);
        //dd($c);
        if($c==1){

            $last=Paiement::where('inscrit_id', $inscrit->id)->orderBy('created_at', 'desc')->first(); 
        }
        else{
            //dd('depasse3');
            // Retirer le dernier paiement de la collection
           $paiements= $paiementss->slice(1); // Supprime le premier élément de la collection
          // dd($paiements);
        }
        }
        if($current){
            $inscrit=Inscrits::where('id', $current->inscrit_id)->first();
          
            $last=$current;
            $paiements=Paiement::where('inscrit_id', $current->inscrit_id)
            ->where('id', '<=', $current->id)
            ->orderBy('created_at', 'asc')
            //->skip(1)
            ->get();
            $total=$paiements->sum('montant');
            
        }
        //dd($last);

        $pdf = Pdf::loadView('paiement.recu', compact('inscrit','last','paiements','total'));
        //dd($paiements);
        return  $pdf->download('sereeni-2024 reçu.pdf');  

        //return view('paiement.recu', compact('inscrit','last','paiements'));
    }
}
