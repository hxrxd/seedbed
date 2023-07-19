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
            </tr>
        @endforeach
    </tbody>
</table>
