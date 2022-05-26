<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function showProfe(){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.profesor',array('arrayUsers'=>User::all()));
        }
    }

    public function editProfe($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.editProfe',array('id' => $id, 'error'=>'', 'Profe' => User::find($id)));
        }
    }

    public function agregarProfe(){
        if (Auth::user()->id == 1){
            return view('mis_vistas.addProfe',array('error'=>''));

        }
    }

    public function storeProfe(Request $request){
        $prof = new User;
        $prof->nom = $request->input('nombreProfe');
        $prof->cognoms = $request->input('apellidosProfe');
        $prof->email = $request->input('correoProfe');
        $prof->role_id = $request->input('idRol');
        $user =  new UserController;
        $prof->modificat_per= $user->modificado();
        $prof->password = Hash::make($request->input('contra'));
        try{
            $prof->save();
            return redirect('/profesor');    
        }catch(QueryException $e){
            $codigoError = $e->errorInfo[1];
            if($codigoError == 1062){
                $error ='Ya hay un profesor con ese correo';
            }
            echo $codigoError;
            exit;
            return view('mis_vistas.addProfe',array('error'=>$error, 'arrayUsers'=>User::all()));
        }
        //
    }

    public function modificado(){
        $modificado = explode("@", Auth()->user()->email);
        return $modificado[0];
    }

    public function updateProfe(Request $request){
        $id = $request->input('idProfe');
        $prof = User::find($id);
        $prof->nom = $request->input('nombreProfe');
        $prof->cognoms = $request->input('apellidosProfe');
        $prof->email = $request->input('correoProfe');
        $user =  new UserController;
        $prof->role_id = $request->input('idRol');
        $prof->modificat_per= $user->modificado();
        $prof->role_id = $request->input('role_id');
        try{
            $prof->save();
            return redirect('/profesor');    
        }catch(QueryException $e){
            $codigoError = $e->errorInfo[1];
            if($codigoError == 1062){
                $error ='Ya hay un profesor con ese correo';
            }
            return view('mis_vistas.editProfe',array('id' => $id, 'error'=>$error, 'Profe' => User::find($id)));
        }
    }

    public function eliminarProfesor($id){
        $profesor = User::find($id);
        $profesor->modulUser()->detach();
        $profesor->cicles()->detach();
        $profesor->delete();
        return redirect('/profesor');      
    }
}
