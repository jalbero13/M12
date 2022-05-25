<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use App\Models\CicleUser;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CicleUserController extends Controller
{
    //
    public function inscribirProfesorCiclo($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addCicloUser',array('id'=>$id, 'error'=>'', 'profesor'=>User::find($id), 'arrayCicles'=>Cicle::all()));
        }
    }

    public function storeCicleUser(Request $request){
        $id =$request->input('idCiclo');
        $ciclos = Cicle::find($id);    
        $user = new UserController;
        $modificat_per = $user->modificado();
        try{
            $ciclos->usuaris()->attach($request->input('idProfe'),['modificat_per' => $modificat_per, 'nom_cicle' =>$ciclos->nom]);
            return redirect('/profesor');
            
        }catch(QueryException $e){
            $codigoError = $e->errorInfo[1];
            if($codigoError == 1062){
                $error ='Ya esta el profesor en el ciclo';
            }
            return view('mis_vistas.addCicloUser', array('id'=>$id, 'error'=>$error, 'arrayCicles'=>Cicle::all()));
        }
    //
    }
}
