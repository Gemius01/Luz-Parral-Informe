<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($registers as $register)
        <tr>
            <td>{{ $register }}</td>
            <td>{{ $register }}</td>
        </tr>
    @endforeach
    </tbody>
</table>