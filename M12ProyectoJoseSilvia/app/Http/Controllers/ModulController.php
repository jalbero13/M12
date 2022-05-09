<?php

namespace App\Http\Controllers;
use App\Models\Modul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    //
    public function storeModulo(Request $request){
        $modul = new Modul;
        $modul->nom = $request->input('nombreModulo');
        $modul->descripcio = $request->input('descripcionModulo');
        $modul->hores = $request->input('horasModulo');
        $modul->cicle_id = $request->input('idCiclo');
        //$modul->modificat_per = $request->input('modificado_por');
        $modul->save();
        return redirect('/modul');
        //
    }
}
