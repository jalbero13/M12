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
    return redirect('/login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard',[AlumneController::class, 'showAlumne'])->name('dashboard');

    Route::get('/profesor',[UserController::class, 'showProfe'])->name('showProfesor');

    Route::get('/cicle',[CicleController::class, 'showCicle'])->name('showCiclo');

    Route::get('/modul',[ModulController::class, 'showModul'])->name('showModulo');

    Route::get('/UF',[UfController::class, 'showUf'])->name('showUfs');

    Route::get('/notesModul/{id}',[NotesmodulController::class, 'showNotesModul'])->name('showNotasModulo');

    Route::get('/addProfe',[UserController::class, 'agregarProfe'])->name('addProfe');
 
    Route::get('/addAlumne',[AlumneController::class, 'addAlumne'])->name('addAlumne');

    Route::get('/addCicle', [CicleController::class , 'agregarCiclo'])->name('addCicle');

    Route::get('/addModul', [ModulController::class, 'agregarModulo'])->name('addModul');

    Route::get('/addUF', [UfController::class, 'agregarUf'])->name('addUf');

    Route::get('/modul/{id}',[ModulController::class, 'showModulProfe'])->name('showModuloProfe');

    Route::get('/UF/{id}',[UfController::class, 'showUfProfe'])->name('showUfsProfe');

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

    Route::get('/inscriureAlumneModul/{id}/{correo}', [AlumneModulController::class, 'storeAlumneModul'])->name('inscriureAlumneModul');

    Route::get('/inscriureProfessor/{id}', [ModulUserController::class, 'inscribirProfesor'])->name('inscriureProfessor'); 

    Route::get('/inscriureProfessorCicle/{id}', [CicleUserController::class, 'inscribirProfesorCiclo'])->name('inscriureProfessorCicle');
    
    Route::get('/editAlumne/{id}', [AlumneController::class, 'editAlumne'])->name('editAlumne');

    Route::get('/editCicle/{id}', [CicleController::class, 'editCicle'])->name('editCicle');

    Route::get('/editModul/{id}', [ModulController::class, 'editModul'])->name('editModul');

    Route::get('/editUf/{id}', [UfController::class, 'editUf'])->name('editUf');

    Route::get('/editProfe/{id}', [UserController::class, 'editProfe'])->name('editProfe');

    Route::get('/alumnes', [AlumneController::class, 'showAlumnes'])->name('showAlumnes');
    
    Route::get('/notes', [AlumneController::class, 'showNotesAlumne'])->name('showAlumnes');


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

    Route::put('/updateNotesUf', [AlumneUfController::class, 'updateAlumnoUf'])->name('updateNotesUf');


    Route::get('inicio/eliminarAlumno/{id?}',[AlumneController::class, 'eliminarAlumno'])->name('eliminarAlumno');

    Route::get('inicio/eliminarProfesor/{id?}',[UserController::class, 'eliminarProfesor'])->name('eliminarProfesor');

    Route::get('inicio/eliminarCiclo/{id?}',[CicleController::class, 'eliminarCiclo'])->name('eliminarCiclo');

    Route::get('inicio/eliminarModulo/{id?}',[ModulController::class, 'eliminarModulo'])->name('eliminarModulo');

    Route::get('inicio/eliminarUf/{id?}',[UfController::class, 'eliminarUf'])->name('eliminarUf');

    Route::get('notes/{id?}',[AlumneController::class, 'showNotesAlumne'])->name('showNotasAlumno');

    Route::get('descarregarButlleti/{id?}',[AlumneController::class, 'descargarPDF'])->name('descargarPDF');


});
