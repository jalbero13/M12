<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;
    public function moduls2(){
        return $this->belongsTo(Modul::class);
    }
    public function alumneUf(){
        return $this->belongsToMany(Alumne::class,'alumne_uf');
    }
}
