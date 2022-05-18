<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\modulCicle;
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

    /*public function showModulo(){
        if(Auth::user()->role_id == 2){
            $modulUser = ModulUser::where('user_id',Auth::user()->id);
            //return view('mis_vistas.addModuloUser',array('id'=>$id, 'profesor'=>User::find($id), 'arrayModuls'=>Modul::all()));
        }
    }*/

    public function storeModulUser(Request $request){
            $modul = Modul::find($request->input('idModulo'));
            $user = new UserController;
            $modificat_per = $user->modificado();
            $modul->profes()->attach($request->input('idProfe'),['modificat_per'=> $modificat_per, 'nom_modul'=> $modul->descripcio]);    
            return redirect('/modul');
        //
    }
}
