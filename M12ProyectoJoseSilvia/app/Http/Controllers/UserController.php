<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
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

    public function modificado($correo){
        $modificado = explode("@",$correo);
        return $modificado[0];
    }
}
