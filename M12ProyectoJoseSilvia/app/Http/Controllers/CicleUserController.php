<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use App\Models\CicleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CicleUserController extends Controller
{
    //
    public function inscribirProfesorCiclo($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addCicloUser',array('id'=>$id, 'profesor'=>User::find($id), 'arrayCicles'=>Cicle::all()));
        }
    }

    public function storeCicleUser(Request $request){
        $ciclos = Cicle::find($request->input('idCiclo'));    
        $user = new UserController;
        $modificat_per = $user->modificado();
        $ciclos->userCicle()->attach($request->input('idProfe'),['modificat_per' => $modificat_per]);
    return redirect('/profesor');
    //
    }
}
