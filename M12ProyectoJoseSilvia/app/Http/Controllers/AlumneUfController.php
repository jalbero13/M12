<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlumneUf;
use App\Models\Uf;
use Illuminate\Http\Request;

class AlumneUfController extends Controller
{
    //
        // public function showModul(){
    //     if(Auth::user()->role_id == 1){
    //         return view('mis_vistas.modulo',array('arrayModuls'=>Modul::all()));
    //     }
    // }

    public function storeAlumnoUf($idmodulo, $idAlumno){
        $ufs = Uf::where('modul_id', $idmodulo);
        foreach($ufs as $uf){
            $alumnoUf = new AlumneUf;
            $alumnoUf->alumne_id = $idAlumno;
            $alumnoUf->id_modul = $uf->id;
            
            //$modul->modificat_per = $request->input('modificado_por');
            $alumnoUf->save();
        }
        //
    }
}
