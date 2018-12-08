<?php

namespace App\Exports;

use App\User;

use Illuminate\Support\Facades\DB;



use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function collection()
    {
        return collect(DB::connection('mysql')->select("select 96884450 as rutempresa,
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
                                                                      from `radiusdb`.`radacct`, `asd`.`maclist` WHERE (`mac`=`username`)"));
    }

    public function headings(): array
    {
        return [
            'Rut Empresa',
            'DV',
            'Código de la Empresa STI',
            'Región',
            'Comuna',
            'Localidad',
            'Código Denomicación AP',
            'Fecha inicio servicio',
            'Nro Servicio',
            'Fecha inicio Conexión',
            'Hora Inicio Conexión',
            'Fecha Termino Conexión',
            'Hora Termino Conexión',
            'Usuario (MAC) Conectado',
            'Tráfico UP (en Mbps)',
            'Tráfico down (en Mbps)',
            'Uptime (minutos)',
            'Tipo dispositivo (PC/Tablet/Smartphone)',
            'Primera URL de navegación',
        ];
    }
}
