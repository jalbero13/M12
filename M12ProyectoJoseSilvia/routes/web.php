<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ModulController;

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

Route::get('/profesor', function(){
    return view('mis_vistas.profesor');
});

Route::get('/cicle', function(){
    return view('mis_vistas.ciclo');
});

Route::get('/modul', function(){
    return view('mis_vistas.modulo');
});

Route::get('/UF', function(){
    return view('mis_vistas.UF');
});

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('mis_vistas.admin');
    })->name('dashboard');
});
