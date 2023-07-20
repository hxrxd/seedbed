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
    <input id="max" name="max" type="hidden" value="{{ $MAX }}">

    <section class="bg-white dark:bg-gray-900">
        <div class="py-20 px-4 mx-auto max-w-screen-xl lg:py-20">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">

                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Dashboard segunda vuelta</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Mostramos las estadisticas registradas de mesas atendidas por fiscales.</p>
                <p class="text-justify text-gray-500 dark:text-gray-400">{{ $votoCount }} de {{ $countMesas }} mesas computadas</p>
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
    </section>



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
            ['Min', -max],
            ['Max', max],

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
