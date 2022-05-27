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
    public function updateNota($idalumno, $idmodul, $nota){
        if(Auth()->user()->role_id ==2){
            $modulo = Modul::find($idmodul);
            $user = new UserController;
            $modificat_per = $user->modificado();
            $modulo->alumnes()->updateExistingPivot($idalumno,['modificat_per'=>$modificat_per, 'nota_media'=>$nota]);
        }
    }
    public function mostrarComentario($idAlumno, $idModulo){
        if(Auth()->user()->role_id ==2){
            $alumno = Alumne::find($idAlumno);
            $modulo = Modul::find($idModulo);
            return view('mis_vistas.comentario', compact('alumno', 'modulo'));
        }
    }
    public function updateComentario(Request $request){
        $idalumno = $request->input('idAlumno');
        $comentario = $request->input('comentario');
        $idmodulo = $request->input('idModulo');
        $modulo = Modul::find($request->input('idModulo'));
        $user = new UserController;
        $modificat_per = $user->modificado();
        $modulo->alumnes()->updateExistingPivot($idalumno,['modificat_per'=>$modificat_per, 'comentario'=>$comentario]);
        $ruta = "/notesModul/$idmodulo";

        return redirect($ruta);
    }
}
