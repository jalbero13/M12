<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;
    public function ufAlumne(){
        return $this->belongsToMany(Uf::class, 'alumne_uf');
    }
    
    public function modulAlumne(){
        return $this->belongsToMany(Modul::class, 'alumne_modul');
    }
}
