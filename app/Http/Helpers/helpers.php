<?php

use App\Models\User;
use App\Models\Valeur;
use App\Models\Paiement;
use App\Models\Formation;
use App\Models\Formateur;
use App\Models\FormationFormateur;
use App\Models\Inscrits;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

if (!function_exists('getlibelle')) {
    function getlibelle($id)
        {
            $record = Valeur::where('id', $id)->first();
            $libelle = isset($record['libelle']) ? $record['libelle'] : "";
                return $libelle;
        }
    }

    if (!function_exists('getformateur')) {
        function getformateur($id)
            {
                //dd($id);
                $query = FormationFormateur::where('formation_id', $id)->first();
                //dd($query);
                if($query){
                
                $value=Formateur::where('id', $query->formateur_id)->first();
                if($value){
                    $array = array('id'=>$value->id,
                                    'nom'=>$value->nom,
                                    'prenom'=>$value->prenom,
                                    'email'=>$value->email,
                                    'mobile'=>$value->mobile,
                                    'matiere'=>$value->matiere                                    
                                    );
                }
                
                    return $array;
            }
            }
        }

    if (!function_exists('getrole')) {
        function getrole($id)
            {
                $value=DB::table('role_user')->where('user_id', $id)->first();
                //dd($value);
                if($value){
                
                $role=Role::where('id', $value->role_id)->first();

                $libelle= $role->nom;
                }
                else{
                    $libelle='Aucun';
                }
                return $libelle;

            }
        }

        if (!function_exists('gettotal')) {
            function gettotal($id)
                {
                    //$value=DB::table('role_user')->where('user_id', $id)->first();
                    $value=Inscrits::where('id', $id)->first();
                    $montant=0;
                    if($value){
                    $formation=Formation::where('id', $value->formation_id)->first();
                        if($formation)
                        {
                            $montant=$formation->prix;
                        }
                        else{
                            $montant=0;
                        }
                    
                    }      
                    
                    return $montant;
    
                }
            }

            if (!function_exists('getreste')) {
                function getreste($id)
                    {
                        
                        //$value=DB::table('role_user')->where('user_id', $id)->first();
                        $value=Inscrits::where('id', $id)->first();
                        $montant=0;
                        if($value){
                            $paiement=Paiement::where('inscrit_id', $value->id)
                            ->orderBy('created_at', 'desc') // Tri par la date de création (ou une autre colonne)
                            ->first(); // Récupère la première ligne après le tri
                            if($paiement)
                            {
                                $montant=$paiement->reste;
                            }
                            else{
                                $montant=gettotal($id);
                            }
                        
                        }
                    //dd($montant);             
                        
                        return $montant;
        
                    }
                } 
                
                if (!function_exists('getformation')) {
                    function getformation($id)
                        {
                            
                            $value=Formation::where('id', $id)->first();
                            if($value){
                                $array = array('id'=>$value->id,
                                    'titre'=>$value->titre,
                                    'prix'=>$value->prix,
                                    'description'=>$value->description,
                                    'objectif'=>$value->objectif,
                                    'lieu'=>$value->lieu,
                                    'place'=>$value->place
                                    );
                                    return $array;
                            }
            
                        }
                    } 

                    if (!function_exists('countPaiement')) {
                        function countPaiement($id)
                            {
                                
                                $c=count($id);
                                return $c;
                
                            }
                        } 

                    if (!function_exists('getinscrit')) {
                        function getinscrit($id)
                            {
                                
                                $value=Inscrits::where('id', $id)->first();
                               // dd($value);
                                if($value){
                                    $array = array('id'=>$value->id,
                                        'nom'=>$value->nom,
                                        'prenom'=>$value->prenom,
                                        'email'=>$value->email,
                                        'objectif'=>$value->objectif,
                                        'mobile_1'=>$value->mobile_1,
                                        'statut'=>$value->statut,
                                        'sexe'=>$value->sexe,
                                        'formation'=>$value->formation_id,
                                        'type_formation'=>$value->type_formation
                                        );
                                        return $array;
                                }
                
                            }
                        } 

        if (!function_exists('getvaleur')) {
            function getvaleur($id) 
                {
                   //dd($id);
                    $value = Valeur::where('id', $id)->first();                   
                        $array = array('id'=>$value->id,
                        'libelle'=>$value->libelle,
                        'code'=>$value->code,
                        'description'=>$value->description);
                    //dd($value);
                        return $array;
                }
            }
        
    if (!function_exists('getuser')) {
        function getuser($id)
            {
                $value=User::where('id', $id)->first();
                if($value){
                $array = array('nom'=>$value->name,
                'prenom'=>$value->prenom,
                'email'=>$value->email,
                'tel'=>$value->telephone
                
                );
            }
            else{
                $array=[];
            }
                return $array;
            }
        }

    if (!function_exists('getdescription')) {
        function getdescription($id)
            {
                $record = Valeur::where('id', $id)->first();
                $description = isset($record['description']) ? $record['description'] : "";
                    return $description;
            }
        }
    
        if(!function_exists('format_date')){
            function format_date($date){
                return  date('d-m-Y', strtotime($date));
            }          
            
        }
        
        if(!function_exists('calculer_age')){
            function calculer_age($date){
                $date =strtotime($date);
                    $age = date('Y') - $date;
                   if (date('md') < date('md', strtotime($date))) {
                       return $age - 1;
                   }
                   return $age;
            }
        }
            // {{Auth::user()->name}} {{Auth::user()->Prenom}}
          
            
        
?>