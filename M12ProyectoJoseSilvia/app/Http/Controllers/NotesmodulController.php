<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesmodulController extends Controller
{
    //
    public function showNotesModul(){
        if(Auth::user()->role_id == 2){
            return view('mis_vistas.notasModulo');
        }
    }
}
