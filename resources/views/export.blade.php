<table>
    <thead>
    <tr>
        <th>Rut Empresa</th>
        <th>DV</th>
        <th>Código de la Empresa STI</th>
        <th>Región</th>
        <th>Comuna</th>
        <th>Localidad</th>
        <th>Código Denomicación AP</th>
        <th>Fecha inicio servicio</th>
        <th>Nro Servicio</th>
        <th>Fecha inicio Conexión</th>
        <th>Hora Inicio Conexión</th>
        <th>Fecha Termino Conexión</th>
        <th>Hora Termino Conexión</th>
        <th>Usuario (MAC) Conectado</th>
        <th>Tráfico UP (en Mbps)</th>
        <th>Tráfico down (en Mbps)</th>
        <th>Uptime (minutos)</th>
        <th>Tipo dispositivo (PC/Tablet/Smartphone)</th>
        <th>Primera URL de navegación</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->rutempresa }}</td>
            <td>{{ $user->dv }}</td>
            <td>{{ $user->sti }}</td>
            <td>{{ $user->region }}</td>
            <td>{{ $user->comuna }}</td>
            <td>{{ $user->localidad }}</td>
            <td>{{ $user->ap }}</td>
            <td>{{ $user->iniserv }}</td>
            <td>{{ $user->numserv }}</td>
            <td>{{ $user->acctstarttime }}</td>
            <td>{{ $user->horatstarttime }}</td>
            <td>{{ $user->acctstarttime}} </td>
            <td>{{ $user->acctstoptime}} </td>
            <td>{{ $user->horaacctstoptime}} </td>
            <td>{{ $user->mac}} </td>
            <td>{{ $user->traficoup}} </td>
            <td>{{ $user->traficodown}} </td>
            <td>{{ $user->uptime }}</td>
            <td>{{ $user->typedevice }}</td>
            <td>{{ $user->destino }}</td>
        </tr>
    @endforeach
    </tbody>
</table>