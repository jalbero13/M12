<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;
    public function ufs(){
        return $this->belongsToMany(Uf::class, 'alumne_uf')->withTimestamps()
                                                            ->withPivot('nota');
    }
    
    public function moduls(){
        return $this->belongsToMany(Modul::class, 'alumne_modul')->withTimestamps()
                                                                ->withPivot('nota_media','comentario');
    }

    public function cicles(){
        return $this->belongsTo(Cicle::class, 'cicle_id');
    }
}
