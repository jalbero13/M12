<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\AlumneUf;
use App\Models\Cicle;
use App\Models\Modul;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumneUfController extends Controller
{
    //
    public function inscribirAlumnoUf($id, $idCiclo){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addAlumnoUf', array('id'=>$id, 'idCiclo'=>$idCiclo, 'alumne'=>Alumne::find($id), 'arrayCicles'=>Cicle::find($idCiclo)));
        }
    }

    public function storeAlumnoUf($modulo, $idAlumno){
        $ufs = Uf::where('modul_id', $modulo->id)->get();

        foreach($ufs as $uf){                
            $user = new UserController;
            $modificat_per = $user->modificado();
            $uf->alumnes()->attach($idAlumno,['modificat_per'=> $modificat_per]);
        }
    
    }
    public function updateAlumnoUf(Request $request){
        $id = $request->input('id');
        $user = new UserController;
        $modificat_per = $user->modificado();
        $ufs = Uf::where('modul_id', $id)->get();
        foreach($ufs as $uf){
            foreach($uf->alumnes as $alumne){
                $nota = 'nota_'.$alumne->id.'_'.$uf->id;
                $uf->alumnes()->updateExistingPivot($alumne->id, ['modificat_per'=>$modificat_per, 'nota'=>$request->input($nota)]);
            }
            
        }
        $ruta = "/notesModul/$id";
        return redirect($ruta);
    }
}


