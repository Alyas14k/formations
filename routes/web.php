<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ValeurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\InscritController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DemandeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'admin'])->name("dashboard");

});
 
Route::post('/inscrit/store', [InscritController::class, 'admin_store'])->name('admin.store');
Route::post('/inscrit/payer/create', [PaiementController::class, 'create'])->name('payer.create');
Route::get('/payer/create/{id}', [PaiementController::class, 'ins_payer'])->name('inscrit.payer');
Route::post('/inscrit/payer/store', [PaiementController::class, 'store'])->name('payer.store');
Route::get('/inscrit/recu/{id}', [PaiementController::class, 'recu'])->name('payer.recu');
Route::get('/inscrit/edit/{id}', [InscritController::class, 'edit'])->name('inscrit.edit');
Route::get('/formation/edit/{id}', [FormationController::class, 'edit'])->name('formation.edit');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');


// Les routes ressources
Route::resource('user', UserController::class);
//Route::resource('requete', RequeteController::class);
//Route::resource('contenu', ContenuController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('role', RoleController::class);
Route::resource("parametre",ParametreController::class);
Route::resource("paiement",PaiementController::class);
Route::resource("valeur",ValeurController::class);
Route::resource("formation",FormationController::class);
Route::resource("formateur",FormateurController::class);
Route::resource("inscrit",InscritController::class);
Route::resource("demande",DemandeController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');


 //Route pour inscription
 Route::prefix('inscrit')->group(function () {
    Route::get('/inscription/create/{formation_id}', [InscritController::class, 'create'])->name('inscrits.create');
    Route::post('/inscription/store', [InscritController::class, 'store'])->name('inscrits.store');

    //Route pour demande
    Route::prefix('demande')->group(function () {
        Route::get('/demande/create', [DemandeController::class, 'create'])->name('demande.create');
        Route::post('/demande/store', [DemandeController::class, 'store'])->name('demande.store');
    });
});

