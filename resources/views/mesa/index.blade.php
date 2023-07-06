<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mesas') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Listado de mesas con fiscales asignados") }} 
                </div>
            </div>
        </div>
    </div>
    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover " data-role="table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Mesa</th>
                        <th data-priority="2">Departamento</th>
                        <th data-priority="3">Municipio</th>
                        <th data-priority="4">Centro de Votación</th>
                        <th data-priority="5">Fiscal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($mesas as $mesa)
                    <tr>
                        <td>{{ intval($mesa->jrv) }}</td>
                        <td>{{ $mesa->departamento }}</td>
                        <td>{{ $mesa->municipio }}</td>
                        <td>{{ $mesa->nombre }}</td>
                        <td>
                             @if($mesa->fiscal==null)
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Pendiente</span>
                             @else 
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Asignado</span>
                             @endif

                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>

            </table>


        </div>
        <!--/Card-->


    </div>
    <!--/container-->

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>


</x-app-layout>
