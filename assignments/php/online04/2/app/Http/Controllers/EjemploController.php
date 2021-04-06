<?php
// espacio de nombre
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* controlador de ejemplo
 * enruta nuestra aplicación
 */
class EjemploController extends Controller {

    public function inicio(){
        return "Estás en el inicio del sitio";
    }
}
?>
