<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\AlumneModulController;
use App\Http\Controllers\AlumneUfController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ModulController;
use App\Http\Controllers\CicleController;
use App\Http\Controllers\CicleUserController;
use App\Http\Controllers\ModulUserController;
use App\Http\Controllers\NotesmodulController;
use App\Http\Controllers\UfController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard',[AlumneController::class, 'showAlumne'])->name('dashboard');

    Route::get('/profesor',[UserController::class, 'showProfe'])->name('showProfesor');

    Route::get('/cicle',[CicleController::class, 'showCicle'])->name('showCiclo');

    Route::get('/modul',[ModulController::class, 'showModul'])->name('showModulo');

    Route::get('/UF',[UfController::class, 'showUf'])->name('showUfs');

    Route::get('/notesModul',[NotesmodulController::class, 'showNotesModul'])->name('showNotasModulo');

    Route::get('/addProfe',[UserController::class, 'agregarProfe'])->name('addProfe');
 
    Route::get('/addAlumne',[AlumneController::class, 'agregarAlumno'])->name('addAlumne');

    Route::get('/addCicle', [CicleController::class , 'agregarCiclo'])->name('addCicle');

    Route::get('/addModul', [ModulController::class, 'agregarModulo'])->name('addModul');

    Route::get('/addUF', [UfController::class, 'agregarUf'])->name('addUf');

    // Route::get('/addProfe', function(){
    //     return view('mis_vistas.addProfe');
    // });

    // Route::get('/addAlumne', function(){
    //     return view('mis_vistas.addAlumno');
    // });

    // Route::get('/addCicle', function(){
    //     return view('mis_vistas.addCiclo');
    // });

    // Route::get('/addModul', function(){
    //     return view('mis_vistas.addModulo');
    // });  

    // Route::get('/addUF', function(){
    //     return view('mis_vistas.addUF');
    // });

    Route::get('/inscriureAlumne/{id}', [AlumneModulController::class, 'inscribirAlumno'])->name('inscriureAlumne');

    Route::get('/inscriureAlumneUf/{id}/{idCiclo}', [AlumneUfController::class, 'inscribirAlumnoUf'])->name('inscriureAlumneUf');
    // Route::get('/inscriureAlumneUf/{id}', [AlumneUfController::class, 'inscribirAlumnoUf'])->name('inscriureAlumneUf');
 
    Route::get('/inscriureProfessor/{id}', [ModulUserController::class, 'inscribirProfesor'])->name('inscriureProfessor'); 

    Route::get('/inscriureProfessorCicle/{id}', [CicleUserController::class, 'inscribirProfesorCiclo'])->name('inscriureProfessorCicle');
    
    Route::get('/editAlumne/{id}', [AlumneController::class, 'editAlumne'])->name('editAlumne');

    Route::get('/editCicle/{id}', [CicleController::class, 'editCicle'])->name('editCicle');

    Route::get('/editModul/{id}', [ModulController::class, 'editModul'])->name('editModul');

    Route::get('/editUf/{id}', [UfController::class, 'editUf'])->name('editUf');

    Route::get('/editProfe/{id}', [UserController::class, 'editProfe'])->name('editProfe');


    Route::post('/storeAlumnoModul', [AlumneModulController::class, 'storeAlumnoModul'])->name('storeAlumneModul');

    Route::post('/storeAlumnoUf', [AlumneUfController::class, 'storeAlumnoUf'])->name('storeAlumneUf');

    Route::post('/storeModulUser', [ModulUserController::class, 'storeModulUser'])->name('storeModulUser');

    Route::post('/storeCicleUser', [CicleUserController::class, 'storeCicleUser'])->name('storeCicleUser');

    Route::post('/storeAlumno',[AlumneController::class, 'storeAlumno'])->name('storeAlumno');

    Route::post('/storeProfe',[UserController::class, 'storeProfe'])->name('storeProfe');

    Route::post('/storeModulo',[ModulController::class, 'storeModulo'])->name('storeModulo');

    Route::post('/storeCiclo',[CicleController::class, 'storeCiclo'])->name('storeCiclo');

    Route::post('/storeUF',[UFController::class, 'storeUF'])->name('storeUF');

    Route::put('/updateAlumno', [AlumneController::class, 'updateAlumno'])->name('updateAlumno');

    Route::put('/updateCicle', [CicleController::class, 'updateCicle'])->name('updateCicle');

    Route::put('/updateModul', [ModulController::class, 'updateModul'])->name('updateModul');

    Route::put('/updateUf', [UfController::class, 'updateUf'])->name('updateUf');

    Route::put('/updateProfe', [UserController::class, 'updateProfe'])->name('updateProfe');

    Route::delete('inicio/eliminarAlumno/{id?}',[AlumneController::class, 'eliminarAlumno'])->name('eliminarAlumno');

    Route::delete('inicio/eliminarProfesor/{id?}',[UserController::class, 'eliminarProfesor'])->name('eliminarProfesor');

    Route::delete('inicio/eliminarCiclo/{id?}',[CicleController::class, 'eliminarCiclo'])->name('eliminarCiclo');

    Route::delete('inicio/eliminarModulo/{id?}',[ModulController::class, 'eliminarModulo'])->name('eliminarModulo');

    Route::delete('inicio/eliminarUf/{id?}',[UfController::class, 'eliminarUf'])->name('eliminarUf');

});
