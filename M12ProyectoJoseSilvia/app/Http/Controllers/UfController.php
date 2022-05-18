<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use App\Models\Modul;
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

    public function editUf($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.editUf',array('id' => $id, 'Uf' => Uf::find($id), 'arrayModulos' => Modul::all()));
        }
    }

    public function agregarUf(){
        if (Auth::user()->id == 1){
            return view('mis_vistas.addUF');
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

    public function updateUf(Request $request){
        
        $UF = Uf::find($request->input('idUf'));
        $UF->nom = $request->input('nombreUF');
        $UF->descripcio = $request->input('descripcionUF');
        $UF->hores = $request->input('horasUF');
        $user = new UserController;
        $UF->modificat_per = $user->modificado();
        $UF->modul_id = $request->input('idModulo');
        $UF->save();
        return redirect('/UF');
    }

    public function eliminarUf($id){
        $UF = Uf::find($id);
        $UF->delete();
        return redirect('/UF');      
    }
}
