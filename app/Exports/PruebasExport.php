<?php

namespace App\Exports;

use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class PruebasExport implements FromCollection
{
    use Exportable;
    protected $inicio;
    protected $termino;
    public function __construct($fecha_inicio, $fecha_termino)
    {
        
        $this->inicio = $fecha_inicio;
        $this->termino = $fecha_termino;

    }
    public function collection()
    {
        $fechaIn = Carbon::parse($this->inicio.'00:00:00');
        $fechaTer = Carbon::parse( $this->termino.'23:59:59');
        set_time_limit(0);

        $users = DB::select(DB::raw("select * FROM (SELECT username, DATE_FORMAT(`acctstarttime`, '%d-%m-%Y') as acctstarttime,DATE_FORMAT(`acctstarttime`, '%H:%i:%s') as horatstarttime, DATE_FORMAT(`acctstoptime`, '%d-%m-%Y') as acctstoptime, DATE_FORMAT(`acctstoptime`, '%H:%i:%s') as horaacctstoptime,round(acctinputoctets/1000000, 1) as acctinputoctets, round(acctoutputoctets/1000000, 1) as acctoutputoctets,  round(acctsessiontime/60, 1) AS session FROM radiusdb.radacct WHERE acctstarttime BETWEEN '".$fechaIn."' AND '".$fechaTer."') AS fecha, (SELECT mac, SUBSTRING_INDEX(SUBSTRING_INDEX(ip,'.',-2),'.',1) as ipmac, destino, case  when system like '%Android%' then 'Smarthphone' when  system like '%Apple%' then 'Smarthphone' else 'PC' end as type FROM radiusrepodb.maclist GROUP BY mac) AS mac, (select id, zona, localidad, comuna, servicio from radiusrepodb.zonaswifi) as zonaswifi WHERE (fecha.username=mac.mac and zonaswifi.id = mac.ipmac)"));
        return collect($users);
        
        //return view('export', compact(['users']));
    } 

    // public function columnFormats(): array
    // {
    //     return [
    //         'H' => 'dd-mmm-yy',
    //         'J' => 'dd-mmm-yy',
    //         'L' => 'dd-mmm-yy',
           
    //     ];
    // }

    
}


