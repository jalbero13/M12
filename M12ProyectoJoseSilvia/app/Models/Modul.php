<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;
    public function cicle(){
        return $this->belongsTo(Cicle::class);
    }
    public function ufs(){
        return $this->hasMany(Uf::class);
    }
}
