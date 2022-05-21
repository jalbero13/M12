<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesmodulController extends Controller
{
    //
    public function showNotesModul($id){
        if(Auth::user()->role_id == 2){
            return view('mis_vistas.notasModulo', array('modulo'=>Modul::find($id), 'ufs'=>Uf::where('modul_id',$id)));
        }
    }
}
