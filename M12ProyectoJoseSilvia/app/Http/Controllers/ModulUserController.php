<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\ModulUser;
use Illuminate\Http\Request;

class ModulUserController extends Controller
{
    //
     //
    // public function showModul(){
    //     if(Auth::user()->role_id == 1){
    //         return view('mis_vistas.modulo',array('arrayModuls'=>Modul::all()));
    //     }
    // }

    public function storeModulUser(Request $request){
        $modulos = Modul::where('cicle_id' ,$request->input('idCiclo'))->get();
        foreach($modulos as $modulo){
            $modul = new ModulUser;
            $modul->user_id = $request->input('idProfe');
            $modul->id_modul = $modulo->id;
            $user = new UserController;
            $modul->modificat_per = $user->modificado();
            $modul->save();
        }
        return redirect('/modul');
        //
    }
}
