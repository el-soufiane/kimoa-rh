<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PosteController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EnregistrerController;
use App\Http\Controllers\HeuresTravailleesController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OccuperController;
use App\Http\Controllers\TypeContratController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\SalaryController;


Route::get('/', function () {

    // User::create([
    //     'name' => 'Pinto',
    //     'email' => 'pinto@gmail.com',
    //     'password' => Hash::make('0000')
    // ]);
    return view('Auth.login');
});
// login
Route::get('/login',[AuthController::class, 'login'])->name('auth.login');
Route::post('/login',[AuthController::class, 'dologin']);
Route::delete('/logout',[AuthController::class, 'logout'])->name('auth.logout');

//Poste
Route::get('/postes', [PosteController::class, 'index'])->name('postes.index');
Route::get('/postes/create', [PosteController::class, 'create'])->name('postes.create');
Route::post('/postes/store', [PosteController::class, 'store'])->name('postes.store');
Route::get('/postes/edit/{id}', [PosteController::class, 'edit'])->name('postes.edit');
Route::post('/postes/update/{id}', [PosteController::class, 'update'])->name('postes.update');
Route::get('/postes/delete/{id}', [PosteController::class, 'destroy'])->name('postes.delete');

Route::get('/dashboard', [PosteController::class, 'dashboard'])->name('dashboard');

//Employe
Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');
Route::get('/employes/create', [EmployeController::class, 'create'])->name('employes.create');
Route::post('/employes', [EmployeController::class, 'store'])->name('employes.store');
Route::get('/employes/{id}', [EmployeController::class, 'show'])->name('employes.show');
Route::get('/employes/{id}/edit', [EmployeController::class, 'edit'])->name('employes.edit');
Route::put('/employes/{id}', [EmployeController::class, 'update'])->name('employes.update');
Route::delete('/employes/{id}', [EmployeController::class, 'destroy'])->name('employes.destroy');


// Routes pour la gestion des contrats
Route::get('/contrats', [ContratController::class, 'index'])->name('contrats.index');
Route::get('/contrats/create', [ContratController::class, 'create'])->name('contrats.create');
Route::post('/contrats/store', [ContratController::class, 'store'])->name('contrats.store');
Route::get('/contrats/edit/{id}', [ContratController::class, 'edit'])->name('contrats.edit');
Route::put('/contrats/update/{id}', [ContratController::class, 'update'])->name('contrats.update');
Route::get('/contrats/delete/{id}', [ContratController::class, 'destroy'])->name('contrats.delete');
// Routes pour la gestion des renouvellement
Route::get('/contrats/renew/{id}', [ContratController::class, 'renew'])->name('contrats.renew');
Route::post('/contrats/storeRenewal', [ContratController::class, 'storeRenewal'])->name('contrats.storeRenewal');



Route::prefix('heures_travaillees')->group(function () {
    Route::get('/', [HeuresTravailleesController::class, 'index'])->name('heures_travaillees.index');
    Route::get('/create', [HeuresTravailleesController::class, 'create'])->name('heures_travaillees.create');
    Route::post('/', [HeuresTravailleesController::class, 'store'])->name('heures_travaillees.store');
});

Route::prefix('salaires')->group(function () {
    Route::get('/', [SalaireController::class, 'index'])->name('salaires.index');
    Route::get('/create', [SalaireController::class, 'create'])->name('salaires.create');
    Route::post('/', [SalaireController::class, 'store'])->name('salaires.store');
    Route::get('/employes/{id}/fiche_paie/pdf', [SalaireController::class, 'telechargerFichePaie'])->name('employes.fiche_paie.pdf');

});

//Evenement
Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.index');
Route::get('/evenements/create', [EvenementController::class, 'create'])->name('evenements.create');
Route::post('/evenements', [EvenementController::class, 'store'])->name('evenements.store');
Route::get('/evenements/{id}/edit', [EvenementController::class, 'edit'])->name('evenements.edit');
Route::post('/evenements/{id}', [EvenementController::class, 'update'])->name('evenements.update');
Route::get('/evenements/{id}/delete', [EvenementController::class, 'destroy'])->name('evenements.delete');

// Routes pour TypeContrat
Route::get('/type_contrats', [TypeContratController::class, 'index'])->name('type_contrats.index');
Route::get('/type_contrats/create', [TypeContratController::class, 'create'])->name('type_contrats.create');
Route::post('/type_contrats/store', [TypeContratController::class, 'store'])->name('type_contrats.store');
Route::get('/type_contrats/edit/{id}', [TypeContratController::class, 'edit'])->name('type_contrats.edit');
Route::post('/type_contrats/update/{id}', [TypeContratController::class, 'update'])->name('type_contrats.update');
Route::get('/type_contrats/delete/{id}', [TypeContratController::class, 'destroy'])->name('type_contrats.delete');

// Route pour les assignations des postes
Route::get('/occuper', [OccuperController::class, 'index'])->name('occuper.index');
Route::get('/occuper/create', [OccuperController::class, 'create'])->name('occuper.create');
Route::post('/occuper/store', [OccuperController::class, 'store'])->name('occuper.store');
Route::get('/occuper/edit/{id}', [OccuperController::class, 'edit'])->name('occuper.edit');
Route::put('/occuper/update/{id}', [OccuperController::class, 'update'])->name('occuper.update');
Route::get('/occuper/delete/{id}', [OccuperController::class, 'destroy'])->name('occuper.delete');

// Route pour les permissions
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permissions.delete');

// Routes pour la gestion des départements
Route::get('/departements', [DepartementController::class, 'index'])->name('departements.index');
Route::get('/departements/create', [DepartementController::class, 'create'])->name('departements.create');
Route::post('/departements/store', [DepartementController::class, 'store'])->name('departements.store');
Route::get('/departements/edit/{id}', [DepartementController::class, 'edit'])->name('departements.edit');
Route::put('/departements/update/{id}', [DepartementController::class, 'update'])->name('departements.update');
Route::get('/departements/delete/{id}', [DepartementController::class, 'destroy'])->name('departements.delete');

// Routes pour les presences
Route::get('/presences', [PresenceController::class, 'index'])->name('presences.index');
Route::get('/presences/create', [PresenceController::class, 'create'])->name('presences.create');
Route::post('/presences', [PresenceController::class, 'store'])->name('presences.store');
Route::get('/presences/{id}', [PresenceController::class, 'show'])->name('presences.show');
Route::get('/presences/{id}/edit', [PresenceController::class, 'edit'])->name('presences.edit');
Route::put('/presences/{id}', [PresenceController::class, 'update'])->name('presences.update');
Route::delete('/presences/{id}', [PresenceController::class, 'destroy'])->name('presences.destroy');

// Routes pour enregistrer
Route::get('/enregistrers', [EnregistrerController::class, 'index'])->name('enregistrers.index');
Route::get('/enregistrers/create', [EnregistrerController::class, 'create'])->name('enregistrers.create');
Route::post('/enregistrers', [EnregistrerController::class, 'store'])->name('enregistrers.store');
Route::get('/enregistrers/{id}/edit', [EnregistrerController::class, 'edit'])->name('enregistrers.edit');
Route::put('/enregistrers/{id}', [EnregistrerController::class, 'update'])->name('enregistrers.update');
Route::delete('/enregistrers/{id}', [EnregistrerController::class, 'destroy'])->name('enregistrers.destroy');

// Route pour afficher la liste des salaires
Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');
Route::get('/salary/create', [SalaryController::class, 'create'])->name('salary.create');
Route::post('/salary', [SalaryController::class, 'store'])->name('salary.store');
Route::get('/salary/{salary}', [SalaryController::class, 'show'])->name('salary.show');
Route::get('/salary/{salary}/imprimer', [SalaryController::class, 'imprimerFichePaie'])->name('salary.imprimer');
Route::get('/salary/{id}/fiche-paie', [SalaryController::class, 'fichePaie'])->name('salary.fiche_paie');




