<?php

namespace App\Exports;

use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Illuminate\Support\Carbon;


class PruebasExport implements FromView, WithColumnFormatting
{

    protected $inicio;
    protected $termino;
    public function __construct($fecha_inicio, $fecha_termino)
    {
        
        $this->inicio = $fecha_inicio;
        $this->termino = $fecha_termino;

    }
    public function view(): View
    {
        $fechaIn = Carbon::parse($this->inicio.'00:00:00');
        $fechaTer = Carbon::parse( $this->termino.'23:59:59');
        //dd(''.$fechaIn. ' '. $fechaTer. '');
        //SELECT fecha from mi_tabla WHERE CAST(fecha AS DATE) between 'yyyy-mm-ss' AND 'yyyy-mm-ss'
        //$users = DB::connection('mysql')->select("select username as MAC from `radiusdb`.`radacct` WHERE CAST(acctstarttime AS DATE) between '".$fechaIn."' AND '".$fechaTer."'");
        $users= DB::connection('mysql')->select("select 96884450 as rutempresa,
                4 as dv,
                420 as sti,
                7 as region,
                null as comuna, 
                null as localidad, 
                    null as ap,
                null as iniserv,
                null as numserv,
                DATE_FORMAT(`acctstarttime`, '%d-%m-%Y') as acctstarttime,
                DATE_FORMAT(`acctstarttime`, '%H:%i:%s') as horatstarttime,
                DATE_FORMAT(`acctstoptime`, '%d-%m-%Y') as acctstoptime,
                DATE_FORMAT(`acctstoptime`, '%H:%i:%s') as horaacctstoptime,
                `mac`,
                null as traficoup,
                null as traficodown,
                TIMESTAMPDIFF(MINUTE, `acctstarttime`, `acctstoptime`)  as uptime,
                null as typedevice,
                `destino`
                from `radiusdb`.`radacct`, `asd`.`maclist` WHERE (`mac`=`username`) AND (CAST(acctstarttime AS DATE) between '".$fechaIn."' AND '".$fechaTer."')");
        
        return view('export', compact(['users']));
    }

    public function columnFormats(): array
    {
        return [
            'J' => 'dd-mmm-yy',
            'L' => 'dd-mmm-yy',
            'M' => 'dd-mmm-yy',
           
        ];
    }
}


