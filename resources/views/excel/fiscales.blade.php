<table>
    <thead>
        <tr>
            <th>DPI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Municipio</th>
            <th>Departamento</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fiscales as $fiscal )
            <tr>
                <td>{{ substr($fiscal->dpi, 0, 4).' '.substr($fiscal->dpi, 4, 5).' '.substr($fiscal->dpi, 9, 4) }}</td>
                <td>{{ $fiscal->nombres }}</td>
                <td>{{ $fiscal->apellidos }}</td>
                <td>{{ $fiscal->telefono }}</td>
                <td>{{ $fiscal->municipio }}</td>
                <td>{{ $fiscal->departamento }}</td>
                <td>{{ $fiscal->correo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
