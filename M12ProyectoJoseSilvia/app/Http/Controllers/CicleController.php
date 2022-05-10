<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CicleController extends Controller
{
    public function showCicle(){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.ciclo',array('arrayCicles'=>Cicle::all()));
        }
    }
    //
    public function storeCiclo(Request $request){
        $ciclo = new Cicle;
        $ciclo->nom = $request->input('nombreCiclo');
        $ciclo->modificat_per = $request->input('modificado_por');
        $ciclo->save();
        return redirect('/cicle');
        //
    }
}
