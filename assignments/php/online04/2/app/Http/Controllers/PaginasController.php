<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controlador para crear la estructura del sitio
class PaginasController extends Controller
{
    // devuelve la vista inicio
    public function inicio(){
        return view ("welcome");
    }
    // devuelve la vista quienesSomos
    public function quienesSomos(){
        return view ("quienesSomos");
    }
    // devuelve la vista dondeEstamos
    public function dondeEstamos(){
        return view ("dondeEstamos");
    }
    // devuelve la vista foro
    public function foro(){
        return view ("foro");
    }
}
