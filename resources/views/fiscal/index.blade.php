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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12" style="margin-bottom: 0">
        <div class="flex flex-col items-center justify-center mt-4">
            <svg class="flex-shrink-0 w-8 h-8 text-green-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.054 7.55929C17.9643 7.39438 17.7898 7.29361 17.6021 7.29838C16.1141 7.33616 12.7603 8.18772 10.8653 11.3002C8.8165 10.0069 6.58714 10.1901 5.76875 10.4277C5.60431 10.4754 5.47573 10.604 5.42799 10.7685C5.11597 11.8432 4.93393 14.4565 6.79472 16.3173C7.67344 17.196 8.58139 17.551 9.40487 17.5649C10.0522 17.5758 10.6174 17.3751 11.0403 17.0971C11.3139 17.3855 11.6032 17.6065 11.8648 17.7575C12.4735 18.1089 13.4851 18.4008 14.6 18.1765C15.7373 17.9477 16.9201 17.1943 17.8624 15.5622C19.7376 12.3143 18.7777 8.88972 18.054 7.55929ZM10.4439 16.2914C10.324 16.0793 10.2185 15.8481 10.1343 15.5982C9.81977 14.6649 9.81623 13.5142 10.3989 12.1892C8.83822 11.1732 7.1316 11.1846 6.32091 11.3266C6.11905 12.3387 6.14296 14.2513 7.50183 15.6102C8.22455 16.3329 8.89392 16.5561 9.42174 16.565C9.82986 16.5719 10.1826 16.4514 10.4439 16.2914ZM11.6331 11.9657C13.1571 9.32619 15.8906 8.45757 17.3147 8.31802C17.9058 9.62105 18.5204 12.4227 16.9964 15.0622C16.1787 16.4785 15.2233 17.031 14.4028 17.1961C13.983 17.2806 13.5823 17.2669 13.2328 17.2011L15.9393 12.2393C16.0715 11.9969 15.9822 11.6932 15.7397 11.561C15.4973 11.4287 15.1936 11.5181 15.0614 11.7605L13.6458 14.3558L13.4745 13.8419C13.3872 13.5799 13.104 13.4383 12.842 13.5257C12.58 13.613 12.4385 13.8962 12.5258 14.1581L12.9915 15.5552L12.288 16.8449C11.8686 16.5783 11.3405 16.0459 11.0819 15.2788C10.8146 14.4857 10.8154 13.382 11.6331 11.9657Z" fill="#47495F"/>
            </svg>
            <p class="md:ml-2 md:mr-2 text-sm text-gray-700 sm:text-sm dark:text-gray-700">© 2023 Movimiento Semilla</p>
            <p class="md:ml-2 md:mr-2 text-sm text-gray-700 sm:text-sm font-bold dark:text-gray-700">Sistema de Gestión de Fiscales Semilla</p>
            <p><br></p>
        </div>
    </div>

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
