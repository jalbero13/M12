<?php

namespace App\Http\Controllers;
use App\Models\Alumne;
use App\Http\Controllers\Controller;
use App\Models\Cicle;
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
            $profe = User::find(Auth()->user()->id);
            return view('mis_vistas.cicloProfe', compact('profe'));
        }
    }

    public function showAlumnes(){
        $alumnos = Alumne::all();
        return view('mis_vistas.alumnos', compact('alumnos'));
    }

    public function addAlumne(){
        return view('mis_vistas.addAlumno', array('arrayCicles'=>Cicle::all()));
    }

    public function editAlumne($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.editAlumno',array('id' => $id, 'arrayCicles'=>Cicle::all(), 'Alumno' => Alumne::find($id)));
        }
    }

    public function showNotesAlumne(){
        if(Auth::user()->role_id == 2){
            return view('mis_vistas.notasAlumno');
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
        $alum->cicle_id = $request->input('idCiclo');
        $user =  new UserController;
        $alum->modificat_per= $user->modificado();
        $alum->save();
        $ruta = "/inscriureAlumneModul/".$request->input('idCiclo')."/".$request->input('correoAlumno');
        return redirect($ruta);
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
        $alum->cicle_id = $request->input('idCiclo');
        $user = new UserController;
        $alum->modificat_per = $user->modificado();
        $alum->ufs()->detach();
        $alum->moduls()->detach();
        $alum->save();
        $modul = new AlumneModulController;
        $modul->storeAlumnoModul($request->input('idCiclo'),$request->input('idAlumno'));
        return redirect('/dashboard');
    }

    public function eliminarAlumno($id){
        $alumno = Alumne::find($id);
        $alumno->ufs()->detach();
        $alumno->moduls()->detach();
        $alumno->delete();
        return redirect('/dashboard');
    }
}
