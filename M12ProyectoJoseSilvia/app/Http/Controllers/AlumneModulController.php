<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlumneModul;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumneModulController extends Controller
{
    //
    // public function showModul(){
    //     if(Auth::user()->role_id == 1){
    //         return view('mis_vistas.modulo',array('arrayModuls'=>Modul::all()));
    //     }
    // }

    public function storeAlumneModul(Request $request){
        $modulos = Modul::where('cicle_id' ,$request->input('idCiclo'))->get();
        foreach($modulos as $modulo){
            $modul = new AlumneModul;
            $modul->alumne_id = $request->input('idAlumno');
            $modul->id_modul = $modulo->id;
            $ufAlumno = new AlumneUfController;
            $ufAlumno->storeAlumneUf($modulo->id,$request->input('idAlumno'));
            $user = new UserController;
            $modul->modificat_per = $user->modificado();
            $modul->save();
        }
        return redirect('/modul');
        //
    }
}
