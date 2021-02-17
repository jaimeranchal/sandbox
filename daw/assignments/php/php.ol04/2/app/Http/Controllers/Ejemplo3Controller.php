<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Ejemplo de controlador creado con artisan y la opción --resource
// que incluye métodos para manejar recursos: CRUD
class Ejemplo3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // versión para el ejercicio d)
    
    /* public function index($id) */
    /* { */
    /*     return "Estás en la página ".$id." de inicio del sitio"; */
    /* } */

    // versión para el ejercicio e)
    public function index()
    {
        return "Estás en la página de inicio del sitio (ej. e)";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ejercicio e)
        return "Estas en el método create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ejercicio e)
        return "Estás accediendo al método edit con el parámetro ".$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
