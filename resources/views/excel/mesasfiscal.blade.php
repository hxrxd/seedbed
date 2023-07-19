<table>
    <thead>
        <tr>
            <th>JRV</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Comunidad</th>
            <th>Empadronados</th>
            <th>Sector</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Zona</th>
            <th>Fiscal</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mesas as $mesa )
            <tr>
                <td>{{ $mesa->jrv }}</td>
                <td>{{ $mesa->departamento }}</td>
                <td>{{ $mesa->municipio }}</td>
                <td>{{ $mesa->comunidad }}</td>
                <td>{{ $mesa->empadronados }}</td>
                <td>{{ $mesa->sector }}</td>
                <td>{{ $mesa->nombre }}</td>
                <td>{{ $mesa->ubicacion }}</td>
                <td>{{ $mesa->zona }}</td>
                <td>{{ $mesa->nombres }} {{ $mesa->apellidos }}</td>
                <td>{{ $mesa->telefono }}</td>
                <td>{{ $mesa->fiscal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
