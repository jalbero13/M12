<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Modul extends Model
{
    use HasFactory;
    public function cicle(){
        return $this->belongsTo(Cicle::class);
    }
    public function ufs(){
        return $this->hasMany(Uf::class);
    }
    public function alumnes(){
        return $this->belongsToMany(Alumne::class, 'alumne_modul');
    }
    public function profes(){
        return $this->belongsToMany(User::class, 'modul_user');
    }
}
