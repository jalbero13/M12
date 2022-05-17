<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    use HasFactory;
    public function moduls(){
        return $this->hasMany(Modul::class);
    }

    public function usuaris(){
        return $this->belongsToMany(User::class, 'cicle_user');
    }
}
