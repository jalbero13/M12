<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CicleController extends Controller
{
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
