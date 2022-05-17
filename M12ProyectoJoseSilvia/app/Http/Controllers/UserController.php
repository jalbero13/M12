<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
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
            return view('mis_vistas.editProfe',array('id' => $id, 'Profe' => User::find($id)));
        }
    }

    public function storeProfe(Request $request){
        $prof = new User;
        $prof->nom = $request->input('nombreProfe');
        $prof->cognoms = $request->input('apellidosProfe');
        $prof->email = $request->input('correoProfe');
        $prof->modificat_per = $request->input('modificado_por');
        $prof->password = Hash::make($request->input('contra'));
        $prof->role_id = $request->input('role_id');
        $prof->save();
        return redirect('/profesor');
        //
    }

    public function modificado(){
        $modificado = explode("@", Auth()->user()->email);
        return $modificado[0];
    }

    public function updateProfe(Request $request){
        
        $prof = User::find($request->input('idProfe'));
        $prof->nom = $request->input('nombreProfe');
        $prof->cognoms = $request->input('apellidosProfe');
        $prof->email = $request->input('correoProfe');
        $user = new UserController;
        $prof->modificat_per = $user->modificado();
        $prof->role_id = $request->input('role_id');
        $prof->save();
        return redirect('/profesor');
    }
}
