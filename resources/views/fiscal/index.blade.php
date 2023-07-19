<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 4rem;">
            {{ __('Fiscales') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400 py-2">Se muestran todas las mesas registradas, puede consultar mas información descargado los reportes</p>
                    <p>
                        <a href="{{url('getfiscal') }}">
                            <button type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Fiscales</button>
                        </a>
                        <a href="{{url('getfiscalelectronico') }}">
                            <button type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Fiscales Electronicos Interesados</button>
                        </a>
                    </p>
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
                        <th data-priority="1">DPI</th>
                        <th data-priority="2">NOMBRES</th>
                        <th data-priority="3">APELLIDOS</th>
                        <th data-priority="4">TELÉFONO</th>
                        <th data-priority="5">CORREO</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($fiscales as $fiscal)
                    <tr>
                        <td>{{ intval($fiscal->dpi) }}</td>
                        <td>{{ $fiscal->nombres }}</td>
                        <td>{{ $fiscal->apellidos }}</td>
                        <td>{{ $fiscal->telefono }}</td>
                        <td>{{ $fiscal->correo }}</td>


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
