<x-app-layout>
    <style>
        .swal-overlay {
        background-color: rgba(215, 223, 40, 0.45);
        }
        .swal-button--confirm {
        background-color: #652c90;
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="md:py-3"></div>
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div class="min-h-screen p-6 bg-gray-100 flex  justify-center">
            <div class="container max-w-screen-lg mx-auto">
              <div>
                <form id="form" method="POST" action="{{ route('voto.store') }}">
                    @csrf

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                      <p class="font-medium text-lg">Acta de cierre mesa {{ $mesa->jrv }}</p>
                      <p>Se presenta el ingreso de los votos y papeletas registradas en su mesa, por favor consigne la cantidad de votos válidos, nulos y en blanco registrados; además de las papeletas que que no fueron utiizadas</p>
                    </div>

                    <div class="lg:col-span-2">
                      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <input id="jrv" name="jrv" type="hidden" value="{{ $mesa->jrv }}">


                        <div class="md:col-span-5">
                          <label for="full_name">Movimiento Semilla</label>
                          <input type="number" min="0" pattern="^[0-9]+" name="semilla" id="semilla" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" required/>
                          @error('semilla')
                          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error: </span> este campo es obligatorio</p>
                          @enderror
                        </div>

                        <div class="md:col-span-5">
                            <label for="full_name">UNE</label>
                            <input type="number" min="0" pattern="^[0-9]+" name="une" id="une" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" required/>
                            @error('une')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error: </span> este campo es obligatorio</p>
                            @enderror
                          </div>

                          <div class="md:col-span-5">
                            <label for="full_name">En Blanco</label>
                            <input type="number" min="0" pattern="^[0-9]+" name="blanco" id="blanco" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" required/>
                            @error('blanco')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error: </span> este campo es obligatorio</p>
                            @enderror
                          </div>

                          <div class="md:col-span-5">
                            <label for="full_name">Nulos</label>
                            <input type="number" min="0" pattern="^[0-9]+" name="nulo" id="nulo" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" required/>
                            @error('nulo')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error: </span> este campo es obligatorio</p>
                            @enderror
                          </div>

                          <div class="md:col-span-5">
                            <label for="full_name">Papeletas anuladas</label>
                            <input type="number" min="0" pattern="^[0-9]+" name="sinusar" id="sinusar" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" required/>
                            @error('sinusar')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error: </span> este campo es obligatorio</p>
                            @enderror
                          </div>

                        <div class="md:col-span-5 text-right">
                          <div class="mt-8 inline-flex items-end">
                            <button class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Enviar acta</button>
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
        <!--/Card-->
    </div>
    <!--/container-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: 'Registro de votos',
                text: "¿Está seguro que los datos son correctos?",
                icon: 'warning',
                buttons:  {
                    cancel: "Cancelar",
                    confirm: "Enviar",
                },
                cancelButtonColor: '#d33',

            }).then((willStore ) => {
                if (willStore) {
                    form.submit();
                }
            });
        });
</script>
</x-app-layout>
