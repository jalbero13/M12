<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ModulController;
use App\Http\Controllers\CicleController;
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

    Route::get('/addProfe', function(){
        return view('mis_vistas.addProfe');
    });

    Route::get('/addAlumne', function(){
        return view('mis_vistas.addAlumno');
    });

    Route::get('/addCicle', function(){
        return view('mis_vistas.addCiclo');
    });

    Route::get('/addModul', function(){
        return view('mis_vistas.addModulo');
    });

    Route::get('/addUF', function(){
        return view('mis_vistas.addUF');
    });

    Route::post('/storeAlumno',[AlumneController::class, 'storeAlumno'])->name('storeAlumno');

    Route::post('/storeProfe',[UserController::class, 'storeProfe'])->name('storeProfe');

    Route::post('/storeModulo',[ModulController::class, 'storeModulo'])->name('storeModulo');

    Route::post('/storeCiclo',[CicleController::class, 'storeCiclo'])->name('storeCiclo');

    Route::post('/storeUF',[UFController::class, 'storeUF'])->name('storeUF');

});
