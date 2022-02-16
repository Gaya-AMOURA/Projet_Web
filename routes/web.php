<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('acceuil');
});

Route::get('/connexion', [AuthenticatedSessionController::class,'form'])
    ->name('connexion');
Route::post('/connexion', [AuthenticatedSessionController::class,'connexion']);

Route::get('/déconnexion', [AuthenticatedSessionController::class,'déconnexion'])
    ->name('déconnexion')->middleware('auth');

Route::get('/enregistrement', [RegisterUserController::class,'form'])
    ->name('enregistrement');
Route::post('/enregistrement', [RegisterUserController::class,'enregistrer'])->name('enregistrement');

Route::get('/changerMdp', [RegisterUserController::class,'changer'])
    ->name('mdpChanger')->middleware('auth');

Route::post('/mdp/{id}/modifier', [RegisterUserController::class,'modifier'])->name('changerMdp');

Route::view('/admin','admin.admin')->name('admin_acceuil')->middleware('auth')->middleware('est_admin');

Route::view('/erreur','erreur')->middleware('auth');

Route::get('/showUsers',[AdminController::class,'showUser'])->name('showUsers')->middleware('auth')->middleware('est_admin');

Route::get('/showEtudiants',[AdminController::class,'showEudiant'])->name('showEtudiants')->middleware('auth')->middleware('est_admin');

Route::get('/showEnseignants',[AdminController::class,'showEnseignant'])->name('showEnseignants')->middleware('auth')->middleware('est_admin');

Route::get('/modifierInfos',[AdminController::class,'modifierAdmin'])->name('admin_modifier')->middleware('auth')->middleware('est_admin');

Route::post('/modifierInfos',[AdminController::class,'modifier'])->name('admin_modifier')->middleware('auth')->middleware('est_admin');

Route::get('/infosModifier', [UserController::class,'formModifier'])
    ->name('infos.modifier')->middleware('auth');

Route::post('/infosModifier/{id}/modifier', [UserController::class,'modifier'])->name('infosmodifier')->middleware('auth');

Route::get('/listeCours',[AdminController::class,'showCours'])->name('listeCours')->middleware('auth')->middleware('est_admin');

Route::get('/ajoutCours',[AdminController::class,'formCours'])->name('AjoutCours')->middleware('auth')->middleware('est_admin');
Route::post('/ajoutCours',[AdminController::class,'créerCours'])->name('AjoutCours')->middleware('auth')->middleware('est_admin');

Route::get('/modificationCours',[AdminController::class,'formModifierCours'])->name('ModifierCours')->middleware('auth')->middleware('est_admin');
Route::post('/modificationCours',[AdminController::class,'modifierCours'])->name('ModifierCours')->middleware('auth')->middleware('est_admin');

Route::get('/listeFormation',[AdminController::class,'showFormations'])->name('listeFormation')->middleware('auth')->middleware('est_admin');

Route::get('/modificationFormation',[AdminController::class,'formModifierFormation'])->name('ModifierFormation')->middleware('auth')->middleware('est_admin');
Route::post('/modificationFormation',[AdminController::class,'modifierFormation'])->name('ModifierFormation')->middleware('auth')->middleware('est_admin');

Route::view('/etudiantAcceuil','etudiant.acceuil')->name('etudiant_acceuil')->middleware('auth')->middleware('est_etudiant');

Route::view('/enseignantAcceuil','enseignant.acceuil')->name('enseignant_acceuil')->middleware('auth')->middleware('est_enseignant');

Route::get('/AjoutFormation',[AdminController::class,'formFormation'])->name('ajoutFromation')->middleware('auth')->middleware('est_admin');
Route::post('/AjoutFormation',[AdminController::class,'créerFormation'])->name('ajoutFormation')->middleware('auth')->middleware('est_admin');

Route::get('/listeCours', [UserController::class,'listCours'])->name('ListeCours')->middleware('est_etudiant');

Route::get('/listeCoursResponsable', [UserController::class,'listCoursResp'])->name('ListeCoursResponsable')->middleware('est_enseignant');

Route::get('/nouveauEnregistrement', [AdminController::class,'formCréer'])
    ->name('admin_créer')->middleware('auth')->middleware('est_admin');
Route::post('/nouveauEnregistrement', [AdminController::class,'créerUser'])->name('admin_créer')->middleware('auth')->middleware('est_admin');

Route::get('/enseignantPlanning', [UserController::class,'planningCours'])->name('PlanningCours')->middleware('est_enseignant');

Route::get('/nouveauPlanning',[UserController::class,'formCréerPlanning'])->name('NouveauPlanning')->middleware('auth')->middleware('est_enseignant');
Route::post('/nouveauPlanning',[UserController::class,'créerPlanning'])->name('NouveauPlanning')->middleware('auth')->middleware('est_enseignant');

Route::get('/modificationPlanning',[UserController::class,'formModifierPlanning'])->name('ModifierPlanning')->middleware('auth')->middleware('est_enseignant');
Route::post('/modificationPlanning',[UserController::class,'modifierPlanning'])->name('ModifierPlanning')->middleware('auth')->middleware('est_enseignant');