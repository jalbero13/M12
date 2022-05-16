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

    public function storeAlumnoUf(Request $request){
        $modulos = Modul::where('cicle_id' ,$request->input('idCiclo'))->get();

        
        foreach($modulos as $modulo){
            $ufs = Uf::where('modul_id', $modulo->id)->get();

            foreach($ufs as $uf){                
                $alumnoUf = Uf::find($uf->id);
                $user = new UserController;
                $modificat_per = $user->modificado();
                $alumnoUf->alumneUf()->attach($request->input('idAlumno'),['modificat_per'=> $modificat_per]);
            }
        }
        
        return redirect('/dashboard');
    }
}


