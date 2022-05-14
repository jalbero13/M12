<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\ModulUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulUserController extends Controller
{
    //
    public function inscribirProfesor($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addModuloUser',array('id'=>$id, 'profesor'=>User::find($id), 'arrayModuls'=>Modul::all()));
        }
    }

    public function storeModulUser(Request $request){
            $modul = new ModulUser;
            $modul->user_id = $request->input('idProfe');
            $modul->modul_id = $request->input('idModulo');
            $user = new UserController;
            $modul->modificat_per = $user->modificado();
            $modul->save();
        return redirect('/modul');
        //
    }
}
