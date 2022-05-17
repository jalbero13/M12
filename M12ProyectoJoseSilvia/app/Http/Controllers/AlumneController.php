<?php

namespace App\Http\Controllers;
use App\Models\Alumne;
use App\Http\Controllers\Controller;
use App\Models\CicleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumneController extends Controller
{
    //
    public function showAlumne(){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.admin',array('arrayAlumnes'=>Alumne::all()));
        }else if(Auth::user()->role_id == 2){
            return view('mis_vistas.cicloProfe',array('arrayCicles'=>CicleUser::where('user_id',Auth::user()->id)));
        }
    }

    public function editAlumne($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.editAlumno',array('id' => $id, 'Alumno' => Alumne::find($id)));
        }
    }

    public function storeAlumno(Request $request){
        $alum = new Alumne;
        $alum->nom = $request->input('nombreAlumno');
        $alum->cognoms = $request->input('apellidosAlumno');
        $alum->direccio = $request->input('direccionAlumno');
        $alum->data_naixement = $request->input('fecha_nacimientoAlumno');
        $alum->dni = $request->input('dniAlumno');
        $alum->telefon = $request->input('telefonoAlumno');
        $alum->mail = $request->input('correoAlumno');
        $alum->modificat_per = $request->input('modificado_por');
        $alum->save();
        return redirect('/dashboard');
        //
    }
    
    public function updateAlumno(Request $request){
        
        $alum = Alumne::find($request->input('idAlumno'));
        $alum->nom = $request->input('nombreAlumno');
        $alum->cognoms = $request->input('apellidosAlumno');
        $alum->direccio = $request->input('direccionAlumno');
        $alum->data_naixement = $request->input('fecha_nacimientoAlumno');
        $alum->dni = $request->input('dniAlumno');
        $alum->telefon = $request->input('telefonoAlumno');
        $alum->mail = $request->input('correoAlumno');
        $user = new UserController;
        $alum->modificat_per = $user->modificado();
        $alum->save();
        return redirect('/dashboard');
    }
}
