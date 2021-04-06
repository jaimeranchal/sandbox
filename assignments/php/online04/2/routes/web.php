<?php

use Illuminate\Support\Facades\Route;

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

// La comento para el ejercicio d
/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */

// Ejercicio a: Rutas
/* --------------------------------------------------------------------*/
/*
Route::get('/sobrenosotros', function () {
    return "Esta es la página que habla sobre nosotros";
});

Route::get('/contacto', function () {
    return "Aquí se muestra información de contacto y un formulario";
});

Route::get('/foro', function () {
    return "Aquí estará el foro";
});

Route::get('/post/{id}/{nombre}', function ($id, $nombre) {
    return "Este es el post nº ".$id." creado por ".$nombre;
})->where('nombre', '[a-zA-Z]+');
*/

// Ejercicio b: Enrutamiento con controlador
/* --------------------------------------------------------------------*/
/* Route::get('/inicio', 'App\Http\Controllers\EjemploController@inicio'); */

// Ejercicio c: Enrutamiento con controlador
/* --------------------------------------------------------------------*/
/* Route::get('/inicio', 'App\Http\Controllers\Ejemplo3Controller@index'); */

// Ejercicio d: parámetros a controladores
/* --------------------------------------------------------------------*/
/* Route::get('/inicio/{id}', 'App\Http\Controllers\Ejemplo3Controller@index'); */

// Ejercicio d: estructura de una página
/* --------------------------------------------------------------------*/
/* Route::get('/', 'App\Http\Controllers\PaginasController@inicio'); */
/* Route::get('/inicio', 'App\Http\Controllers\PaginasController@inicio'); */
/* Route::get('/quienesSomos', 'App\Http\Controllers\PaginasController@quienesSomos'); */
/* Route::get('/dondeEstamos', 'App\Http\Controllers\PaginasController@dondeEstamos'); */
/* Route::get('/foro', 'App\Http\Controllers\PaginasController@foro'); */

// Ejercicio e: crear estructura de página con métodos CRUD
/* --------------------------------------------------------------------*/
Route::resource("posts", "App\Http\Controllers\Ejemplo3Controller");

