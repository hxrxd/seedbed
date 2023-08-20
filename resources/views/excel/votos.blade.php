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
            <th>Semilla</th>
            <th>Une</th>
            <th>Blancos</th>
            <th>Nulos</th>
            <th>Papeletas sin usar</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mesasConVotos as $mesa )
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
                <td>{{ $mesa->semilla }}</td>
                <td>{{ $mesa->une }}</td>
                <td>{{ $mesa->blanco }}</td>
                <td>{{ $mesa->nulo }}</td>
                <td>{{ $mesa->sinusar }}</td>
                <td>{{ $mesa->fiscal }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
