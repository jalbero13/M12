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
            $modul = Modul::find($request->input('idModulo'));
            $user = new UserController;
            $modificat_per = $user->modificado();
            $modul->userModul()->attach($request->input('idProfe'),['modificat_per'=> $modificat_per]);    
            return redirect('/modul');
        //
    }
}
