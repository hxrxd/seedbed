<x-app-layout>
    <div class="md:py-3"></div>
    <input id="semilla" name="semilla" type="hidden" value="{{ $voto->semilla }}">
    <input id="une" name="une" type="hidden" value="{{ $voto->une }}">
    <input id="nulo" name="nulo" type="hidden" value="{{ $voto->nulo }}">
    <input id="blanco" name="blanco" type="hidden" value="{{ $voto->blanco }}">
    <input id="sinusar" name="sinusar" type="hidden" value="{{ $voto->sinusar }}">

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-3 mb-8">

                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">Datos Registrados Mesa {{ $voto->jrv }}</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Te mostramos un desglose de los datos que ingresaste al sistema</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">

                    <h2 class="text-gray-900 dark:text-white text-2xl font-extrabold mb-2">Votos por partidos</h2>
                    <div class=" rounded-lg overflow-hidden">
                        <div class="py-3 px-5 bg-gray-50">Votos registrados</div>
                        <canvas class="" id="chartPie"></canvas>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <h2 class="text-gray-900 dark:text-white text-2xl font-extrabold mb-2">Votos registrados en la mesa</h2>
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

<!-- Chart pie -->
<script>
var semilla = document.getElementById('semilla').value;
var une = document.getElementById('une').value;
var nulo = document.getElementById('nulo').value;
var blanco = document.getElementById('blanco').value;
var sinusar = document.getElementById('sinusar').value;

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
        'En sinusar'
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
        'Votos Válidos',
        'Papeletas Anuladas',
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
