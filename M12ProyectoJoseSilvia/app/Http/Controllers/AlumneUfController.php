<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function inscribirAlumnoUf($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addAlumnoUf', array('id'=>$id, 'alumne'=>Alumne::find($id), 'arrayCicles'=>Cicle::all()));
        }
    }

    public function storeAlumnoUf(Request $request){
        $modulos = Modul::where('cicle_id' ,$request->input('idCiclo'))->get();
        foreach($modulos as $modulo){
            $ufs = Uf::where('modul_id', $modulo->id);

            foreach($ufs as $uf){
                $alumnoUf = new AlumneUf;
                $alumnoUf->alumne_id = $request->input('idAlumno');
                $alumnoUf->id_modul = $uf->id;
                $user = new UserController;
                $alumnoUf->modificat_per = $user->modificado();
                $alumnoUf->save();
            }
        }
        //
        return redirect('/dashboard');
    }
}
