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

    public function storeAlumneModul($id, $correo){
        $alumnos = Alumne::where('mail', $correo)->get();
        foreach($alumnos as $alumno){
            AlumneModulController::storeAlumnoModul($id, $alumno->id);
        }
        return redirect('/dashboard');
    }

    public function storeAlumnoModul($idCiclo, $idAlumno){
        $modulos = Modul::where('cicle_id' ,$idCiclo)->get();
        foreach($modulos as $modulo){
            $modul = Modul::find($modulo->id);
            $uf = new AlumneUfController;
            $uf->storeAlumnoUf($modulo,$idAlumno);
            $user = new UserController;
            $modificat_per = $user->modificado();
            $modul->alumnes()->attach($idAlumno,['modificat_per'=> $modificat_per]);
        }
        return redirect('dashboard');
        //
    }
}
