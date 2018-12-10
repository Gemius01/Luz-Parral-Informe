<?php

namespace App\Http\Controllers;
use App\Exports\PruebasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index ()
    {

    }

    public function generarReporte(Request $request)
    {
        //dd($request->all());
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_termino = $request->input('fecha_termino');
        return Excel::download(new PruebasExport($fecha_inicio, $fecha_termino), 'prueba.xlsx');
    }
}
