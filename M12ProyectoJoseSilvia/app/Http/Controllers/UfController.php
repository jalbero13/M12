<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UfController extends Controller
{
    //
    public function showUf(){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.UF',array('arrayUfs'=>Uf::all()));
        }
    }

    public function storeUF(Request $request){
        $UF = new Uf;
        $UF->nom = $request->input('nombreUF');
        $UF->descripcio = $request->input('descripcionUF');
        $UF->hores = $request->input('horasUF');
        $UF->modul_id = $request->input('idModulo');
        $UF->modificat_per = $request->input('modificado_por');
        $UF->save();
        return redirect('/UF');
        //
    }
}
