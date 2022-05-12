<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\ModulUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulUserController extends Controller
{
    //
    public function inscribirProfesor($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addModuloUser',array('id'=>$id));
        }
    }

    public function storeModulUser(Request $request){
        $modulos = Modul::all();
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
