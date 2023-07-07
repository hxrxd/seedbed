<x-app-layout>

    <div class="py-3"></div>
        
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form method="POST" action="{{ route('fiscal.store') }}">
                @csrf
                
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Registro de fiscal') }}
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- Names -->
                    <div class="md:basis-1/2 mt-4">
                        <x-input-label for="name" :value="__('Nombre completo')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="nombres" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Surnames -->
                    <!--<div class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="surname" :value="__('Apellidos')" />
                        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="apellidos" :value="old('surname')" required autofocus autocomplete="surname" />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    </div>-->
                    <!-- Age -->
                    <div class="md:basis-1/4 md:ml-6 mt-4">
                        <x-input-label for="age" :value="__('Rango de edad')" />
                        <select id="age" name="rango_edad" class="form-control border-gray-300 rounded-lg mt-1 w-full" required autofocus>
                            <option value="">-- Selecciona tu rango de edad --</option>
                            <option value="Menor de edad">Menor de edad</option>
                            <option value="18 - 25">18 - 25</option>
                            <option value="26 - 35">26 - 35</option>
                            <option value="36 - 45">36 - 45</option>
                            <option value="46 - 55">46 - 55</option>
                            <option value="56 - 65">56 - 65</option>
                            <option value="+66 años">66 años o más</option>
                        </select>
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>

                    <!-- Sex -->
                    <div class="md:basis-1/4 md:ml-6 mt-4">
                        <x-input-label for="sex" :value="__('Sexo según DPI')" />
                        <select id="sex" name="sexo" class="form-control border-gray-300 rounded-lg mt-1 w-full" required autofocus>
                            <option value="">-- Selecciona una opción --</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                    </div>
                </div>

                <div class="md:flex md:flex-row">
                    <!-- ID document -->
                    <div class="md:basis-1/3 mt-4">
                        <x-input-label for="dpi" :value="__('DPI')" />
                        <x-text-input id="dpi" class="block mt-1 w-full" type="number" name="dpi" :value="old('dpi')" required autofocus autocomplete="dpi" />
                        <x-input-error :messages="$errors->get('dpi')" class="mt-2" />
                    </div>

                    <!-- Department -->
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="department" :value="__('Departamento')" />
                        <select id="department" name="departamento" class="form-control border-gray-300 rounded-lg mt-1 w-full" required autofocus>
                            @foreach ($departments as $department)
                                <option value="{{ $department }}">{{ $department }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>

                    <!-- City -->
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="city" :value="__('Municipio')" />
                        <select id="city" name="municipio" class="form-control border-gray-300 rounded-lg mt-1 w-full" required autofocus>
                        </select>
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                </div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6">
                    {{ __('Contacto') }}
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- Phone -->
                    <div class="md:basis-1/2 mt-4">
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="telefono" :value="old('phone')" required autofocus autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="email" :value="__('Correo')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="correo" :value="old('email') ?? Auth::user()->email" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6">
                    {{ __('Asignación de mesa') }}
                    <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">Ingresa el número de tu mesa para conocer si está disponible. Si tu mesa no está disponible, intenta con una mesa del mismo centro o de tu localidad.</p>
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- Table Search -->
                    <div class="md:basis-1/2 mt-4">
                        <x-input-label for="table-group" :value="__('Mesa')" />
                        <!--<div class="flex">
                            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                                </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required>
                                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>-->
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar una mesa..." required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver disponibilidad</button>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="txt-mesa" :value="__('Mesa Info')" />
                        <x-text-input id="txt-mesa" class="block mt-1 w-full" type="email" name="correo" :value="old('email') ?? Auth::user()->email" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Terms and conditions -->
                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Acuerdo de registro
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Al completar este formulario, acepto trabajar como fiscal voluntario/a para el movimiento Semilla en las elecciones. Reconozco que mi participación es completamente voluntaria y que no estoy obligado/a a desempeñar ninguna función en contra de mi voluntad.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Entiendo y acepto que los datos personales proporcionados en este formulario serán tratados de manera confidencial y utilizados únicamente con el propósito de organizar y coordinar las actividades relacionadas con mi rol como fiscal.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Asimismo, comprendo que el movimiento Semilla no se hace responsable de las acciones o decisiones que pueda tomar durante mi participación como fiscal voluntario/a. Entiendo que soy responsable de cumplir con las leyes y regulaciones aplicables, así como de actuar de manera ética y responsable en el ejercicio de mis funciones.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Me comprometo a asistir al centro de votación y desempeñar las siguientes funciones como fiscal voluntario/a:
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400 ml-6">
                                    <li>Observar y supervisar el proceso de votación para garantizar su transparencia y legalidad.</li>
                                    <li>Verificar la apertura y cierre de las urnas, así como el correcto funcionamiento de los equipos de votación.</li>
                                    <li>Registrar cualquier irregularidad o incidencia que pueda comprometer la integridad del proceso electoral.</li>
                                    <li>Velar por el cumplimiento de los procedimientos establecidos en la legislación electoral.</li>
                                    <li>Resguardar el secreto del voto y asegurar que cada ciudadano pueda ejercer su derecho de manera libre y sin coacción.</li>
                                    <li>Participar activamente en el escrutinio y conteo de votos, asegurando su precisión y veracidad.</li>
                                    <li>Reportar cualquier anomalía, violación o sospecha de fraude a las autoridades competentes.</li>
                                    </ol>
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Declaro que he leído y comprendido este descargo de responsabilidad y acepto sus términos y condiciones. Además, me comprometo a estar presente en el día de las elecciones y a cumplir con mis funciones como fiscal voluntario/a de manera diligente y responsable. Estoy dispuesto/a a recibir las capacitaciones necesarias para desempeñar adecuadamente mi labor.
                                </p>                          
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Volver al formulario</button>
                                <!--<button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Declinar</button>-->
                            </div>
                        </div>
                    </div>
                </div>


               <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  BUSCAR
</button>

<button id="test-button" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  VER MESA
</button>

<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 id="txt-test" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>



                <div class="flex items-center justify-start mt-8">                     
                    <x-text-input id="accept" class="block mt-1" type="checkbox" name="accept" :value="old('accept')" required autocomplete="accept" />                       
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2" data-modal-target="staticModal" data-modal-toggle="staticModal" href="#">
                        {{ __('He leído el acuerdo de registro') }}
                    </a>                    
                </div>

                <div class="flex items-center justify-start mt-4">
                    <x-primary-button class="">
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
        <!--/Card-->


    </div>
    <!--/container-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            // City Dropdown Change Event
            $('#department').on('change', function () {
                var idDep = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        departamento: idDep,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city').html('<option value="">-- Seleccionar Municipio --</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .municipio+ '">' + value.municipio + '</option>');
                        });
                        //$('#city').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            // City Dropdown Change Event
            $('#test-button').click(function () {
                var dpi_v = '2399588532001';
                var date_v = '1993-06-23T06:00:00.000Z';
                var data = '{"cui":"'+dpi_v+'","fecha":"'+date_v+'"}';
                
                $.ajax({
                    url: "https://dondevotas2023api.tse.org.gt/dondevotas/consulta",
                    type: "POST",
                    /*data: {
                        "cui":'"'+dpi_v+'"',
                        "fecha":'"'+date_v+'"'                    
                    },*/
                    data: JSON.stringify(data),
                    dataType: 'application/json',
                    success: function (result) {
                        console.log(result);                     
                    }
                });
            });
  
        });
    </script>


</x-app-layout>
