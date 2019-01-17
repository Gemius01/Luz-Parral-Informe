<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Illuminate\Support\Facades\DB;
use App\Datos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ReporteController extends Controller
{
    public function index ()
    {
        
    }

    public function generarReporte(Request $request)
    {
        //dd($request->all());
        $fecha = $this->returnMes($request->input('fecha_inicio'));
        
        ini_set('memory_limit',-1);
        set_time_limit(0);
        $fechaIn = Carbon::parse($request->input('fecha_inicio').'00:00:00');
        $fechaTer = Carbon::parse($request->input('fecha_termino').'23:59:59');
        
        $datos = Datos::find(1);
        $rut_empresa = (int)$datos->rut_empresa;
        $dv = (int)$datos->dv;
        $cod_empresa = (int)$datos->cod_empresa;
        $region = (int)$datos->region;
        $nombreArchivo = "Reporte_Tráfico_".$fecha['mes']."_".$fecha['año']."";
        $filePath = storage_path(). "/app/public/".$nombreArchivo.".xlsx";

        $users = DB::select(DB::raw("select * FROM (SELECT calling_station_id, SUBSTRING_INDEX(user_ip, '.', 3) as nas_port_id, DATE_FORMAT(from_time, '%d-%m-%Y') as fecha_inicio, DATE_FORMAT(from_time, '%d-%m-%Y') as fecha_comparacion, DATE_FORMAT(from_time, '%H:%i:%s') as hora_inicio, DATE_FORMAT(till_time, '%d-%m-%Y') as fecha_termino, DATE_FORMAT(till_time, '%H:%i:%s') as hora_termino, round(download/1000000, 1) as descarga, round(upload/1000000, 1) as subida, (hour(uptime ) * 60 + minute (uptime )) as sesion FROM hotspot.servidor WHERE from_time BETWEEN '".$fechaIn."' AND '".$fechaTer."') AS fecha, (SELECT mac, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha, tipo, CASE WHEN web = '' THEN 'http://www.google.cl/' ELSE web END AS web FROM hotspot.webtipo GROUP BY DATE_FORMAT(fecha, '%d-%m-%Y'),mac) AS mac, (select id, SUBSTRING_INDEX(ip, '.', 3) as ip,zona, localidad, comuna, servicio from hotspot.zonaswifi) as zonaswifi WHERE (fecha.calling_station_id=mac.mac and zonaswifi.ip = fecha.nas_port_id and fecha.fecha_comparacion = mac.fecha)"));        
        
        if($users==null){
            return redirect()->route('home')
            ->with('danger', '!Problemas¡ No se encontraron datos en las fechas indicadas');
            //exit;
        }
        else{
            $writer = WriterFactory::create(Type::XLSX);
            
            $writer->openToFile($filePath);
            
            $writer->addRow(['Rut Empresa', 'DV', 'Código de la Empresa STI', 'Región', 'Comuna', 'Localidad', 'Código Denomicación AP', 'Fecha inicio servicio', 'Nro Servicio', 'Fecha inicio Conexión', 'Hora Inicio Conexión', 'Fecha Termino Conexión', 'Hora Termino Conexión', 'Usuario (MAC) Conectado', 'Tráfico UP (en Mbps)', 'Tráfico down (en Mbps)', 'Uptime (minutos)', 'Tipo dispositivo (PC/Tablet/Smartphone)', 'Primera URL de navegación' ]);
            

            foreach($users as $user)
            {

                $writer->addRow([$rut_empresa, $dv,$cod_empresa,$region,$user->comuna,$user->localidad,$user->zona, $user->servicio,$user->id,$user->fecha_inicio,$user->hora_inicio, $user->fecha_termino,$user->hora_termino, $user->calling_station_id, $user->descarga, $user->subida, $user->sesion, $user->tipo, $user->web]);
           
            }
            
            
            $writer->close();
            Session::flash('download.in.the.next.request','/download?route='.$nombreArchivo.'.xlsx');
            //return response()->download($filePath);
            return redirect()->route('home')
            ->with('info', '!LISTO¡ Espere unos segundos para la descarga del archivo');
            //exit;
        }
            
            
            
    }

    public function download()
    {
        //dd(request()->route);
        if(request()->route != null)
        {
            $pathToFile = storage_path().'/app/public/'.request()->route;
            return response()->download($pathToFile);
        }else{
            return redirect('home');
        }
        

    }

    public function returnMes($fechaInicio)
    {
        
        $time=strtotime($fechaInicio);
        $mes=date("m",$time);
        $año=date("Y",$time);
        
        if($mes == '01')
        {
            return ["mes"=> 'Enero', "año"=> $año];
        }
        else if($mes == '02')
        {
            return ["mes"=> 'Febrero', "año"=> $año];
        }
        else if($mes == '03')
        {
            return ["mes"=> 'Marzo', "año"=> $año];
        }
        else if($mes == '04')
        {
            return ["mes"=> 'Abril', "año"=> $año];
        }
        else if($mes == '05')
        {
            return ["mes"=> 'Mayo', "año"=> $año];
        }
        else if($mes == '06')
        {
            return ["mes"=> 'Junio', "año"=> $año];
        }
        else if($mes == '07')
        {
            return ["mes"=> 'Julio', "año"=> $año];
        }
        else if($mes == '08')
        {
            return ["mes"=> 'Agosto', "año"=> $año];
        }
        else if($mes == '09')
        {
            return ["mes"=> 'Septiembre', "año"=> $año];
        }
        else if($mes == '10')
        {
            return ["mes"=> 'Octubre', "año"=> $año];
        }
        else if($mes == '11')
        {
            return ["mes"=> 'Noviembre', "año"=> $año];
        }
        else if($mes == '12')
        {
            return ["mes"=> 'Diciembre', "año"=> $año];
        }
    }
}
