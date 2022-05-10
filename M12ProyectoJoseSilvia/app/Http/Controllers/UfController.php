<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UfController extends Controller
{
    //
    public function storeUF(Request $request){
        $UF = new Uf;
        $UF->nom = $request->input('nombreUF');
        $UF->descripcio = $request->input('descripcionUF');
        $UF->hores = $request->input('horasUF');
        $UF->modificat_per = $request->input('modificado_por');
        $UF->save();
        return redirect('/UF');
        //
    }
}
