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
            <td>96884450</td> 
            <td>4</td>
            <td>420</td>
            <td>7</td>
            <td>{{ $user->comuna}}</td>
            <td>{{ $user->localidad}}</td>
            <td>{{ $user->zona}}</td>
            <td>{{ $user->servicio}}</td>
            <td>{{ $user->id}}</td>
            <td>{{ $user->acctstarttime }}</td>
            <td>{{ $user->horatstarttime }}</td>
            <td>{{ $user->acctstoptime}} </td>
            <td>{{ $user->horaacctstoptime}}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->acctinputoctets }}</td>
            <td>{{ $user->acctoutputoctets}}</td>
            <td>{{ $user->session }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->destino }}</td>
        </tr>
    @endforeach
    </tbody>
</table>