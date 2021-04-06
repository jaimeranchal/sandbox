<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CustomController;
use App\Models\Articulo;
use App\Models\Cliente;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */

/* Route::get("/","CustomController@index"); */
Route::get("/",[CustomController::class, "index"]);
Route::get("/crear",[CustomController::class, "create"]);
Route::get("/articulos",[CustomController::class, "store"]);
Route::get("/mostrar",[CustomController::class, "show"]);
Route::get("/contactar",[CustomController::class, "contactar"]);
Route::get("/galeria",[CustomController::class, "galeria"]);

// crear rutas para manejar el CRUD
//--------------------------------------------------------------------------
// Insertar
/* Route::get("/insertar", function() { */
/*     // insertamos datos */
/*     DB::insert("INSERT INTO articulos (nombre_articulo, precio, pais_origen, seccion, observaciones) VALUES(?,?,?,?,?)", [ */
/*         "Jarron", */
/*         15.2, */
/*         "Japon", */
/*         "Ceramica", */
/*         "ganga" */
/*     ]); */
/* }); */

// Leer datos
/* Route::get("/leer", function() { */
/*     // insertamos datos */
/*     $resultados = DB::select("SELECT * from articulos WHERE id=?", [1]); */

/*     foreach ($resultados as $articulo) { */
/*         return $articulo->nombre_articulo; */
/*     } */
/* }); */

// Actualizar
/* Route::get("/actualiza", function() { */
/*     // actualizamos la sección del primer artículo que creamos */
/*     DB::update("UPDATE articulos SET seccion='decoracion' WHERE id=?", [1]); */
/* }); */

// Borrar
/* Route::get("/borrar", function() { */
/*     // elimina el primer articulo */
/*     DB::delete("DELETE from articulos WHERE id=?", [1]); */
/* }); */

// Ver datos con Eloquent
//--------------------------------------------------------------------------

Route::get("/leer", function(){
    // almacena todos los articulos
    /* $articulos=Articulo::all(); */

    /* foreach ($articulos as $articulo) { */
    /*     echo 'Nombre: '.$articulo->nombre_articulo." Precio: ".$articulo->precio."<br>"; */
    /* } */

    // recuperar solo los articulos de China
    $articulos = Articulo::where('pais_origen', 'China')->get();
    // el precio del artículo de china más caro
    /* $articulo = Articulo::where('pais_origen', 'China')->max('precio'); */
    /* return $articulo; */

    foreach ($articulos as $articulo) {
        echo 'Nombre: '.$articulo->nombre_articulo
            ." Precio: ".$articulo->precio
            ." Origen: ".$articulo->pais_origen
            ."<br>";
    }
});


Route::get("/insertar", function(){

    $articulo = new Articulo();

    $articulo->nombre_articulo = 'Reloj';
    $articulo->precio = 176.35;
    $articulo->pais_origen = 'Suiza';
    $articulo->observaciones = 'Nada que observar';
    $articulo->seccion = 'Accesorios';

    $articulo->save();
});

Route::get("/actualizar", function(){

    $articulo = Articulo::find(9);

    $articulo->nombre_articulo = 'Reloj';
    $articulo->precio = 106.35;
    $articulo->pais_origen = 'Suiza';
    $articulo->observaciones = 'Nada que observar';
    $articulo->seccion = 'Accesorios';

    $articulo->save();
});

Route::get("/actualizar_varios", function(){

    Articulo::where('seccion', 'Ropa')->update([
        'seccion'=>'Moda'
    ]);

});


Route::get("/actualizar_varios2", function(){

    Articulo::where('pais_origen', 'China')
        ->where('seccion', 'Cocina')
        ->increment('precio', 10);

});

Route::get("/borrar", function(){
    // borrar un artículo por su id
    /* $articulo=Articulo::find(2); */
    /* $articulo->delete(); */

    // borrar buscandolo con condicion
    Articulo::where('pais_origen', 'Alemania')->delete();
});

// Insertar registros con create()
Route::get("/insertar_varios", function(){
    Articulo::create([
        'nombre_articulo'=>'Chaqueta',
        'precio'=>73.12,
        'pais_origen'=>'Alemania',
        'observaciones'=>'Nada que añadir',
        'seccion'=>'Moda'
    ]);
});

Route::get("/soft_delete", function(){
    // borrar un artículo por su id
    Articulo::find(4)->delete();
});

Route::get("/leer_papelera", function(){
    // borrar un artículo por su id
    $articulos = Articulo::withTrashed()
        ->where('id', 4)
        ->get();

    return $articulos;
});

Route::get("/restaurar_papelera", function(){
    // borrar un artículo por su id
    $articulos = Articulo::withTrashed()
        ->where('id', 4)
        ->restore();

    // devuelve 1 si la accion se ha realizado
    return $articulos;
});

Route::get("/hard_delete", function(){
    // borrar un artículo por su id
    $articulos = Articulo::withTrashed()
        ->where('id', 4)
        ->forceDelete();

    // devuelve 1 si la accion se ha realizado
    return $articulos;
});

/* Relaciones 1:1 */
// Añado parámetro para poder comprobar con más flexibilidad
/* Route::get("/cliente/{id}/articulo", function($id){ */
/*     return Cliente::find($id)->articulo; */
/* }); */

Route::get("/articulo/{id}/cliente", function($id){
    return Articulo::find($id)->cliente->nombre;
});

/* Relaciones 1:N */
Route::get("/cliente/{id}/articulos", function($id){

    $articulos = Cliente::find($id)->articulos;

    foreach ($articulos as $articulo) {
        echo "Nombre: ".$articulo->nombre_articulo." Precio: ".$articulo->precio."<br>";
    }
});

/* Relaciones M:N */
Route::get("/cliente/{id}/perfil", function($id){
    $cliente = Cliente::find($id);

    foreach ($cliente->perfils as $perfil) {
        return $perfil->nombre;
    }
});

/* Relación polimórfica */
Route::get("/cliente/{id}/notas", function($id){
    $cliente = Cliente::find($id);

    foreach ($cliente->calificaciones as $calificacion) {
        return $calificacion->calificacion;
    }
});

Route::get("/articulo/{id}/notas", function($id){
    $articulo = Articulo::find($id);

    foreach ($articulo->calificaciones as $calificacion) {
        return $calificacion->calificacion;
    }
});
