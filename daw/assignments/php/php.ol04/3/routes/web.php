<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;

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

Route::get("/","CustomController@index");
Route::get("/crear",[CustomController::class, "create"]);
Route::get("/articulos",[CustomController::class, "store"]);
Route::get("/mostrar",[CustomController::class, "show"]);
Route::get("/contactar",[CustomController::class, "contactar"]);
Route::get("/galeria",[CustomController::class, "galeria"]);

