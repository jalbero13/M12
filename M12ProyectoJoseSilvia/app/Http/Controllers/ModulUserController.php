<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cicle;
use App\Models\Modul;
use App\Models\modulCicle;
use App\Models\ModulUser;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulUserController extends Controller
{
    //
    public function inscribirProfesor($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addModuloUser',array('id'=>$id,'error'=>'', 'profesor'=>User::find($id), 'arrayModuls'=>Modul::all()));
        }
    }

    /*public function showModulo(){
        if(Auth::user()->role_id == 2){
            $modulUser = ModulUser::where('user_id',Auth::user()->id);
            //return view('mis_vistas.addModuloUser',array('id'=>$id, 'profesor'=>User::find($id), 'arrayModuls'=>Modul::all()));
        }
    }*/

    public function storeModulUser(Request $request){
            $id = $request->input('idModulo');
            $modul = Modul::find($id);
            $user = new UserController;
            $modificat_per = $user->modificado();
            $ciclo = new CicleUserController;
            $ciclo->storeCicleUser($modul->cicle_id, $request->input('idProfe'));
            try{
                $modul->profes()->attach($request->input('idProfe'),['modificat_per'=> $modificat_per, 'nom_modul'=> $modul->descripcio]);    
                return redirect('/profesor'); 
            }catch(QueryException $e){
                $codigoError = $e->errorInfo[1];
                if($codigoError == 1062){
                    $error ='Ya esta el profesor en el modulo';
                }
                return view('mis_vistas.addModuloUser',array('id'=>$id,'error'=>$error, 'profesor'=>User::find($id), 'arrayModuls'=>Modul::all()));
            }
        //
    }
}
