<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\AlumneUf;
use App\Models\Cicle;
use App\Models\Modul;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumneUfController extends Controller
{
    //
    public function inscribirAlumnoUf($id, $idCiclo){
        if(Auth::user()->role_id == 1){
            return view('mis_vistas.addAlumnoUf', array('id'=>$id, 'idCiclo'=>$idCiclo, 'alumne'=>Alumne::find($id), 'arrayCicles'=>Cicle::find($idCiclo)));
        }
    }

    public function storeAlumnoUf($modulo, $idAlumno){
        $ufs = Uf::where('modul_id', $modulo->id)->get();

        foreach($ufs as $uf){                
            $user = new UserController;
            $modificat_per = $user->modificado();
            $uf->alumnes()->attach($idAlumno,['modificat_per'=> $modificat_per]);
        }
    
    }
    public function updateAlumnoUf(Request $request){
        $id = $request->input('id');
        $user = new UserController;
        $modificat_per = $user->modificado();
        $modul = Modul::find($id);
        $aluMod = new AlumneModulController;

        foreach($modul->alumnes as $alumne){
            $nota0 = 1;
            $notafinal = 0;
            foreach($alumne->ufs as $uf){
                if($uf->modul_id==$id){
                    $nota = 'nota_'.$alumne->id.'_'.$uf->id;
                    $uf->alumnes()->updateExistingPivot($alumne->id, ['modificat_per'=>$modificat_per, 'nota'=>$request->input($nota)]);
                    if($request->input($nota) >4){
                        $notafinal = $notafinal + ($request->input($nota)* $uf->hores);
                    }else{
                        $nota0 = 0;
                    }
                    echo "$nota0 en el bucle de uf $notafinal "; 
                }
            }
            echo "$nota0 fuera del bucle $notafinal ";
            if($nota0!=0){
                $notafinal = $notafinal / $modul->hores;
                $notafinal = round($notafinal, 0, PHP_ROUND_HALF_UP);  
                $aluMod->updateNota($alumne->id, $id, $notafinal);
                echo $notafinal;
            }else{
                $aluMod->updateNota($alumne->id, $id, $nota0);
                echo $nota0;
            }

        }
        $ruta = "/notesModul/$id";
        return redirect($ruta);
    }
    
}


