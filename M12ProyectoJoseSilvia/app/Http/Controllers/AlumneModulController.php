<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumne;
use App\Models\AlumneModul;
use App\Models\Cicle;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumneModulController extends Controller
{
    //
    public function inscribirAlumno($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addAlumnoModul', array('id'=>$id, 'alumne'=>Alumne::find($id), 'arrayCicles'=>Cicle::all()));
        }
    }

    public function storeAlumnoModul(Request $request){
        $modulos = Modul::where('cicle_id' ,$request->input('idCiclo'))->get();
        foreach($modulos as $modulo){
            $modul = Modul::find($modulo->id);
            $user = new UserController;
            $modificat_per = $user->modificado();
            $modul->alumneModul()->attach($request->input('idAlumno'),['modificat_per'=> $modificat_per]);
        }
        $id = $request->input('idAlumno');
        $idCiclo = $request->input('idCiclo');
        $ruta = "/inscriureAlumneUf/$id/$idCiclo";
        return redirect($ruta);
        //
    }
}
