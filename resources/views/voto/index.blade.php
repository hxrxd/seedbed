<x-app-layout>
    <input id="semilla" name="semilla" type="hidden" value="{{ $semilla }}">
    <input id="une" name="une" type="hidden" value="{{ $une }}">
    <input id="nulo" name="nulo" type="hidden" value="{{ $nulo }}">
    <input id="blanco" name="blanco" type="hidden" value="{{ $blanco }}">
    <input id="sinusar" name="sinusar" type="hidden" value="{{ $sinusar }}">

    {{-- Departamentos --}}
    <input id="GTAV" name="GTAV" type="hidden" value="{{ $GTAV->GTAV ?? 0  }}">
    <input id="GTBV" name="GTBV" type="hidden" value="{{ $GTBV->GTBV ?? 0  }}">
    <input id="GTCM" name="GTCM" type="hidden" value="{{ $GTCM->GTCM ?? 0  }}">
    <input id="GTCQ" name="GTCQ" type="hidden" value="{{ $GTCQ->GTCQ ?? 0  }}">
    <input id="GTES" name="GTES" type="hidden" value="{{ $GTES->GTES ?? 0  }}">
    <input id="GTGU" name="GTGU" type="hidden" value="{{ $GTGU->GTGU ?? 0  }}">
    <input id="GTHU" name="GTHU" type="hidden" value="{{ $GTHU->GTHU ?? 0  }}">
    <input id="GTIZ" name="GTIZ" type="hidden" value="{{ $GTIZ->GTIZ ?? 0  }}">
    <input id="GTJA" name="GTJA" type="hidden" value="{{ $GTJA->GTJA ?? 0  }}">
    <input id="GTJU" name="GTJU" type="hidden" value="{{ $GTJU->GTJU ?? 0  }}">
    <input id="GTPE" name="GTPE" type="hidden" value="{{ $GTPE->GTPE ?? 0  }}">
    <input id="GTPR" name="GTPR" type="hidden" value="{{ $GTPR->GTPR ?? 0  }}">
    <input id="GTQC" name="GTQC" type="hidden" value="{{ $GTQC->GTQC ?? 0  }}">
    <input id="GTQZ" name="GTQZ" type="hidden" value="{{ $GTQZ->GTQZ ?? 0  }}">
    <input id="GTRE" name="GTRE" type="hidden" value="{{ $GTRE->GTRE ?? 0  }}">
    <input id="GTSA" name="GTSA" type="hidden" value="{{ $GTSA->GTSA ?? 0  }}">
    <input id="GTSM" name="GTSM" type="hidden" value="{{ $GTSM->GTSM ?? 0  }}">
    <input id="GTSO" name="GTSO" type="hidden" value="{{ $GTSO->GTSO ?? 0  }}">
    <input id="GTSR" name="GTSR" type="hidden" value="{{ $GTSR->GTSR ?? 0  }}">
    <input id="GTSU" name="GTSU" type="hidden" value="{{ $GTSU->GTSU ?? 0  }}">
    <input id="GTTO" name="GTTO" type="hidden" value="{{ $GTTO->GTTO ?? 0  }}">
    <input id="GTZA" name="GTZA" type="hidden" value="{{ $GTZA->GTZA ?? 0  }}">
    <input id="max" name="max" type="hidden" value="{{ $GTGU->GTGU }}">

    <section class="bg-white dark:bg-gray-900">
        <div class="py-20 px-4 mx-auto max-w-screen-xl lg:py-20">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">

                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Votos segunda vuelta</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 pb-1">Mostramos las estadisticas registradas de mesas atendidas por fiscales.</p>
                <p class="pb-1">
                    <a href="{{url('getvotosmuestra') }}">
                        <button type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Votos Conteo Rápido</button>
                    </a>
                </p>
                <p class="text-center text-gray-500 dark:text-gray-400">{{ $votoCount }} de {{ $countMesas }} mesas computadas</p>
                <p class=" rounded-lg overflow-hidden">
                    <div id="geochart-colors"></div>
                </p>

            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Suma de votos a partidos</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Representa los resultados de subidos por fiscales reciente, en la cual se muestran los dos partidos políticos principales: Movimiento Semilla y Partido UNE..</p>
                    <div class=" rounded-lg overflow-hidden">
                        <div class="py-3 px-5 bg-gray-50">Votos registrados</div>
                        <canvas class="" id="chartPie"></canvas>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Papeletas en mesas</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Mostramos un desglose de los votos en general y una gráfica comparativa en la participación ciudadana</p>
                    <div class=" rounded-lg overflow-hidden">
                        <div class="py-3 px-5 bg-gray-50">Votos registrados</div>
                        {{-- <canvas class="p-1 ml-40 mr-40" id="chartBarra"></canvas> --}}
                        <canvas class="" id="chartBarra"></canvas>
                        <div class="py-3 px-5 bg-gray-50">Papeletas</div>
                        <canvas class="" id="chartPapeletas"></canvas>
                    </div>

                </div>
            </div>
        </div>

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400 py-2">Se muestran todos los votos registrados por JRV</p>
                        <p>

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
                            <th data-priority="1">Mesa</th>
                            <th data-priority="2">Semilla</th>
                            <th data-priority="3">UNE</th>
                            <th data-priority="3">en Blanco</th>
                            <th data-priority="3">Nulos</th>
                            <th data-priority="4">Centro de Votación</th>
                            <th data-priority="5">Municipio</th>
                            <th data-priority="5">Departamento</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($votos as $voto)
                        <tr>

                            <td>{{ $voto->jrv }}</td>
                            <td>{{ $voto->semilla }}</td>
                            <td>{{ $voto->une }}</td>
                            <td>{{ $voto->blanco }}</td>
                            <td>{{ $voto->nulo }}</td>
                            <td>{{ $voto->nombre }}</td>
                            <td>{{ $voto->municipio }}</td>
                            <td>{{ $voto->departamento }}</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>


            </div>
            <!--/Card-->
        </div>
    </section>

    <!--/container-->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12 ">
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




<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Chart pie -->
<script>
    var semilla = document.getElementById('semilla').value;
    var une = document.getElementById('une').value;
    var nulo = document.getElementById('nulo').value;
    var blanco = document.getElementById('blanco').value;
    var sinusar = document.getElementById('sinusar').value;
    var max = document.getElementById('max').value;

    //Departamentos
    var gtav = document.getElementById('GTAV').value;
    var gtbv = document.getElementById('GTBV').value;
    var gtcm = document.getElementById('GTCM').value;
    var gtcq = document.getElementById('GTCQ').value;
    var gtes = document.getElementById('GTES').value;
    var gtgu = document.getElementById('GTGU').value;
    var gthu = document.getElementById('GTHU').value;
    var gtiz = document.getElementById('GTIZ').value;
    var gtja = document.getElementById('GTJA').value;
    var gtju = document.getElementById('GTJU').value;
    var gtpe = document.getElementById('GTPE').value;
    var gtpr = document.getElementById('GTPR').value;
    var gtqc = document.getElementById('GTQC').value;
    var gtqz = document.getElementById('GTQZ').value;
    var gtre = document.getElementById('GTRE').value;
    var gtsa = document.getElementById('GTSA').value;
    var gtsm = document.getElementById('GTSM').value;
    var gtso = document.getElementById('GTSO').value;
    var gtsm = document.getElementById('GTSM').value;
    var gtsr = document.getElementById('GTSO').value;
    var gtsu = document.getElementById('GTSR').value;
    var gtto = document.getElementById('GTTO').value;
    var gtza = document.getElementById('GTZA').value;

      google.charts.load('current', {
        'packages':['geochart'],
        // Note: Because this chart requires geocoding, you'll need mapsApiKey.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings

      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['Departamento',   'Diferencia de Votos'],
            ['test', 0],
            ['GT-AV', gtav],
            ['GT-BV', gtbv],
            ['GT-CM', gtcm],
            ['GT-CQ', gtcq],
            ['GT-ES', gtes],
            ['GT-GU', gtgu],
            ['GT-HU', gthu],
            ['GT-IZ', gtiz],
            ['GT-JA', gtja],
            ['GT-JU', gtju],
            ['GT-PE', gtpe],
            ['GT-PR', gtpr],
            ['GT-QC', gtqc],
            ['GT-QZ', gtqz],
            ['GT-RE', gtre],
            ['GT-SA', gtsa],
            ['GT-SM', gtsm],
            ['GT-SO', gtso],
            ['GT-SR', gtsr],
            ['GT-SU', gtsu],
            ['GT-TO', gtto],
            ['GT-ZA', gtza],
            ['Min', -1000],
            ['Max', 1000],

        ]);

        var options = {
          region: 'GT', // Africa
          resolution: 'provinces',
          colorAxis: {colors: ['#50a700', 'white', '#d6df23']},
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
        chart.draw(data, options);
      };



    let votosvalidos = parseInt(semilla) + parseInt(une)+ parseInt(nulo)+parseInt(blanco);

    const data = {
            labels: [
            'Semilla',
            'UNE',
        ],
        datasets: [{
            label: 'Votos',
            data: [semilla, une],
            backgroundColor: [
            'rgb(214, 223, 35)',
            'rgb(80, 167, 0)',
            ]
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {}
    };

    const dataBarra = {
        labels: [
            'Semilla',
            'UNE',
            'Nulos',
            'En blanco'
            ],
        datasets: [{
            label: 'Semilla',
            data: [semilla, une,nulo,blanco],
            backgroundColor: [
            'rgb(214, 223, 35)',
            'rgb(80, 167, 0)',
            'rgb(101, 44, 144)',
            'rgb(0, 167, 157)',
            ],
        }]
        };

    const configBarra = {
        type: 'bar',
        data: dataBarra,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
        };
        const dataPapeleta = {
        labels: [
            'Votos Emitidos',
            'Abstencionismo',
            ],
        datasets: [{
            label: 'Sumatorias de votos válidos',
            data: [votosvalidos, sinusar],
            backgroundColor: [
            'rgb(101, 44, 144)',
            'rgb(0, 167, 157)',
            ],
        }]
        };

    const configPapeletas = {
        type: 'bar',
        data: dataPapeleta,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
        };




    var chartBar = new Chart(document.getElementById("chartPie"), config);
    var chartBar2 = new Chart(document.getElementById("chartBarra"), configBarra);
    var chartBar3 = new Chart(document.getElementById("chartPapeletas"), configPapeletas);
</script>

</x-app-layout>
