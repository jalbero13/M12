<?php

namespace App\Http\Controllers;
use App\Models\Modul;
use App\Http\Controllers\Controller;
use App\Models\Cicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    //
    public function showModul(){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.modulo',array('arrayModuls'=>Modul::all()));
        }else if(Auth::user()->role_id == 2){
            return view('mis_vistas.moduloProfe');
        }
    }

    public function editModul($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.editModulo',array('id' => $id, 'Modul' => Modul::find($id), 'arrayCiclos' => Cicle::all()));
        }
    }

    public function agregarModulo(){
        if (Auth::user()->id == 1){
            return view('mis_vistas.addModulo');
        }
    }

    public function storeModulo(Request $request){
        $modul = new Modul;
        $modul->nom = $request->input('nombreModulo');
        $modul->descripcio = $request->input('descripcionModulo');
        $modul->hores = $request->input('horasModulo');
        $modul->cicle_id = $request->input('idCiclo');
        $user = new UserController;
        $modul->modificat_per = $user->modificado();
        $modul->save();
        return redirect('/modul');
        //
    }

    public function updateModul(Request $request){
        
        $Modulo = Modul::find($request->input('idModulo'));
        $Modulo->nom = $request->input('nombreModulo');
        $Modulo->descripcio = $request->input('descripcionModulo');
        $Modulo->hores = $request->input('horasModulo');
        $Modulo->cicle_id = $request->input('idCiclo');
        $user = new UserController;
        $Modulo->modificat_per = $user->modificado();
        $Modulo->save();
        return redirect('/modul');
    }

    public function eliminarModulo($id){
        $modulo = Modul::find($id);
        $modulo->delete();
        return redirect('/modul');      
    }
}
