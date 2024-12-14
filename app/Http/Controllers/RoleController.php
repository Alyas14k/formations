<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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
        $roles=Role::orderBy('updated_at', 'desc')->get();
        $permissions=Permission::where('id', '!=', null)->orderBy('created_at', 'desc')->get();

                return view('role._index',compact('roles','permissions'));
                
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
    public function store(Request $request)
    {
     if (Auth::user()) {
        $role= Role::create([
            'nom'=> $request ['nom'],
        ]);
        $role->permissions()->sync($request->permission);
        session()->flash('message', "Pays Par Catégorie Ajouté Avec Succès !");
        //flash("Role créer avec succes!!!")->error();
        //return redirect(route('role.index'));
        return back();
     }
     else{
         flash("Vous n'avez pas le droit d'acceder à cette resource. Veillez contacter l'administrateur!!!")->error();
         return back();
     }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
        //
        $role=Role::find($role);
        $permissions=Permission::where('id', '!=', null)->orderBy('created_at', 'desc')->get();

        return view('role.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        //
        $role=Role::find($role);
        if($role){
            $role->update([
                'nom'=>$request->nom
            ]);
            $role->permissions()->sync($request->permissions);
        }

        session()->flash('message', "Rôle Modifié Avec Succès !");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
