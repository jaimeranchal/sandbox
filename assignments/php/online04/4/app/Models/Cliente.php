<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // relacion 1:1
    /* public function articulo(){ */
    /*     return $this->hasOne("App\Models\Articulo"); */
    /* } */

    // relacion 1:N
    public function articulos(){
        return $this->hasMany("App\Models\Articulo");
    }

    // relacion M:N
    public function perfils(){
        return $this->belongsToMany("App\Models\Perfil");
    }

    // relación polimórfica
    public function calificaciones(){
        return $this->morphMany("App\Models\Calificaciones", "calificacion");
    }
}
