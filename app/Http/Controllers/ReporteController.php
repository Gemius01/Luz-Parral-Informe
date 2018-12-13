<?php

namespace App\Http\Controllers;
use App\Exports\PruebasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReporteController extends Controller
{
    public function index ()
    {

    }

    public function generarReporte(Request $request)
    {
        //dd($request->all());
        ini_set('memory_limit',-1);
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_termino = $request->input('fecha_termino');
        ///setlocale(LC_ALL,"es_ES");
        //$string = "24/11/2014";
        
        //$fechaIn = Carbon::parse($fecha_inicio.'00:00:00')->format('F');
        //dd(strftime( '%B' [, int $fechaIn = time() ] ));
        //dd($fechaIn);
        
        //dd(strftime("%V,%G,%Y", strtotime("12/28/2002")))
        return (new PruebasExport($fecha_inicio, $fecha_termino))->download('invoices.xlsx');
        //return Excel::download(new PruebasExport($fecha_inicio, $fecha_termino), 'Reporte_Tráfico__2018.xlsx');
    }
}
