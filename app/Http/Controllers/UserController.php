<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        //$this->middleware('auth', ['except' => ['verifier_nom_commercial']]);
        $this->middleware('auth');
    }
    public function index(){
        $users= User::where('id', '!=', null)->orderBy('created_at', 'desc')->get();
        //$employes=Employe::where('id', '!=', null)->orderby('created_at','desc')->get();
        $roles= Role::all();
        return view('user._index', compact("users","roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if (Auth::user()) {
            $request->validate([
                "nom"=>"required",
                "email"=>"required|email",
                "password"=>"required"                       
            ]);
            
           $user= User::create([
                "name"=>$request['nom'],
                "email"=>$request['email'],
                'prenom'=> $request ['prenom'],
                //'id_employe' => $request['employe'],
                'password' => bcrypt($request->password)
            ]);
            $user->roles()->sync($request->roles);
            session()->flash('message', "Utilisateur Créé Avec Succès !");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        //
        //dd($user);
        $user=User::find($user);
        $roles= Role::all();
        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        //
        $user=User::find($user);
        
        if($user){
            $request->validate([
                "nom"=>"required",
                "email"=>"required|email"                           
            ]);

                $user->update([
                    'name'=>$request->nom,
                    'prenom'=>$request->prenom,
                    'email'=>$request->email
                ]);
            
            if(!empty($request['password'])){
            $user->update([
                'password' => bcrypt($request['password'])                
            ]);
            }
        }
        $user->roles()->sync($request->roles);
        session()->flash('message', "Utilisateur Modifié Avec Succès !");
            return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
