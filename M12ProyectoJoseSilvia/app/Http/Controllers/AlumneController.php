<?php

namespace App\Http\Controllers;
use App\Models\Alumne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumneController extends Controller
{
    //
    public function showAlumne(){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.admin',array('arrayAlumnes'=>Alumne::all()));
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
}

/*    public function store(Request $request){
        $add = new Anuncio;
        $add->direccion = $request->input('direccion');
        $add->letra = $request->input('letra');
        $add->piso = $request->input('piso');
        $add->localidad = $request->input('localidad');
        $add->provincia = $request->input('provincia');
        $add->codigo_postal = $request->input('codigo_postal');
        $add->num_habitaciones = $request->input('num_habitaciones');
        $add->precio = $request->input('precio');
        $add->estado = $request->input('estado');
        $add->tipo = $request->input('tipo');
        $add->interesados = $request->input('interesados');
        $add->descripcion = $request->input('descripcion');
        $add->id_propietario = $request->input('id_propietario');
        $add->foto = $request->input('foto');
        $add->save();
        return redirect('/inicio');
    } */