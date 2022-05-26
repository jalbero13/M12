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

    public function storeCicleUser($idciclo, $idprofe){
        $ciclos = Cicle::find($idciclo);    
        $user = new UserController;
        $modificat_per = $user->modificado();
        
        try{
            $ciclos->usuaris()->attach($idprofe,['modificat_per' => $modificat_per, 'nom_cicle' =>$idciclo]);

        }catch(QueryException $e){
            $codigoError = $e->errorInfo[1];
            if($codigoError == 1062){
                
            }
            // return view('mis_vistas.addCicloUser', array('id'=>$id, 'error'=>$error, 'profesor'=>User::find($id), 'arrayCicles'=>Cicle::all()));
        }
    //
    }
}
