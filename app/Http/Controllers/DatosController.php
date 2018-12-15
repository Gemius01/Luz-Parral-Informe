<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datos;
use App\Http\Requests\DatosRequest;

class DatosController extends Controller
{
    
    public function index()
    {
        $datos = Datos::find(1);
        return view('datos.index', compact(['datos']));
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $dato = Datos::find($id);
        return view('datos.edit', compact(['dato']));
    }

    
    public function update(DatosRequest $request, $id)
    {
        $datos = Datos::find($id);
        $datos->update($request->all());

        return redirect()->route('datos.index', $datos->id)
            ->with('info', 'Se ha actualizado correctamente');
        
    }

    
    public function destroy($id)
    {
        //
    }
}
