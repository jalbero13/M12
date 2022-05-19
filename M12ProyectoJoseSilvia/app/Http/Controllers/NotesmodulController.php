<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesmodulController extends Controller
{
    //
    public function showNotesModul($id){
        if(Auth::user()->role_id == 2){
            return view('mis_vistas.notasModulo', array('id'=>$id, 'ufs'=>Uf::where('modul_id',$id)));
        }
    }
}
