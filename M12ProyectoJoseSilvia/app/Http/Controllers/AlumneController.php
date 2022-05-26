<?php

namespace App\Http\Controllers;
use App\Models\Alumne;
use App\Http\Controllers\Controller;
use App\Models\AlumneModul;
use App\Models\Cicle;
use App\Models\CicleUser;
use App\Models\Modul;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

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
        return view('mis_vistas.addAlumno', array('error'=>'', 'arrayCicles'=>Cicle::all()));
    }

    public function editAlumne($id){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.editAlumno',array('id' => $id, 'error'=>'', 'arrayCicles'=>Cicle::all(), 'Alumno' => Alumne::find($id)));
        }
    }

    public function showNotesAlumne($id){
        if(Auth::user()->role_id == 2){
            return view('mis_vistas.notasAlumno', array('id' => $id, 'alumno' => Alumne::find($id)));
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
        try{
            $alum->save();
            $ruta = "/inscriureAlumneModul/".$request->input('idCiclo')."/".$request->input('correoAlumno');
            return redirect($ruta);
        }catch(QueryException $e){
            $codigoError = $e->errorInfo[1];
            if($codigoError == 1062){
                $error ='Ya hay un alumno con ese dni/correo';
            }
            return view('mis_vistas.addAlumno', array('error'=>$error, 'arrayCicles'=>Cicle::all()));
        }
        //
    }
    
    public function updateAlumno(Request $request){
        $id = $request->input('idAlumno');
        $alum = Alumne::find($id);
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
        try{
            $alum->ufs()->detach();
            $alum->moduls()->detach();
            $alum->save();
            $modul = new AlumneModulController;
            $modul->storeAlumnoModul($request->input('idCiclo'),$request->input('idAlumno'));
            return redirect('/dashboard');
        }catch(QueryException $e){
            $codigoError = $e->errorInfo[1];
            if($codigoError == 1062){
                $error ='Ya hay un alumno con ese dni/correo';
            }
            return view('mis_vistas.editAlumno', array('error'=>$error, 'arrayCicles'=>Cicle::all()));
        }
    }

    public function eliminarAlumno($id){
        $alumno = Alumne::find($id);
        $alumno->ufs()->detach();
        $alumno->moduls()->detach();
        $alumno->delete();
        return redirect('/dashboard');
    }

    public function descargarPDF($id){
        $pdf = PDF::loadView('mis_vistas.butlleti', array('alumno'=>Alumne::find($id)));
        return $pdf->download('butlleti.pdf');
        
    }

    public function enviarPDF($id){
        $datos["mail"] = Auth::user()->email;
        $datos["nombre"] = Auth::user()->nom;
        $datos["asunto"] = "Butlletí de notes";

        $pdf = PDF::loadView('mis_vistas.butlleti', array('alumno'=>Alumne::find($id)));

        try{
            Mail::send('mis_vistas.mailBoletin', $datos, function($message)use($datos,$pdf){
                $message->to($datos["mail"], $datos["nombre"])
                ->subject($datos["asunto"])
                ->attachData($pdf->output(), 'butlleti.pdf');
            });

        }catch(JWTException $excepcion){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $excepcion->getMessage();
        }

        return redirect()->back();
    }



   
}
