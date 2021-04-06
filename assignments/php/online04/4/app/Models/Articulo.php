<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Si la tabla no se llama como el modelo
    // vinculamos el modelo con la tabla
    /* protected $table="articulos"; */
    // Si no tienes un campo id como clave primaria
    /* protected $primaryKey="articulo_id"; */
    
    // permite manipular campos en masa
    protected $fillable=[
        "nombre_articulo",
        "precio",
        "pais_origen",
        "seccion",
        "observaciones"
    ];

    // habilita el soft delete
    protected $dates = ['delete_at'];

    // relation 1:1 inversa
    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }

    // relación polimórfica
    public function calificaciones(){
        return $this->morphMany("App\Models\Calificaciones", "calificacion");
    }
}
