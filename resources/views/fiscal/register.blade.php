<x-app-layout>

    <div class="py-3"></div>
        
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form method="POST" action="{{ route('fiscal.store') }}">
                @csrf
                
                <!-- Personal info section -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Registro de fiscal') }}
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- ID document -->
                    <div class="md:basis-1/4 mt-4">
                        <x-input-label for="dpi" :value="__('DPI')" />
                        <x-text-input id="dpi" class="block mt-1 w-full" type="number" name="dpi" :value="old('dpi')" required autofocus autocomplete="dpi" />
                        <x-input-error :messages="$errors->get('dpi')" class="mt-2" />
                    </div>

                    <!-- Birthdate -->
                    <x-text-input id="birthdate" name="fecha_nacimiento" class="hidden" type="text"/>
                    <div class="md:basis-1/4 md:ml-6 mt-4">
                        <x-input-label for="days" :value="__('Fecha de nacimiento')" />
                        <div class="flex flex-row sm:mx-auto">
                            <div class="basis-1/2">                      
                                <select id="days" class="form-control border-gray-300 rounded-lg mt-1 w-full rounded-e-none" required autofocus>
                                    <option value="">DD</option>
                                </select>
                            </div>
                            <div class="basis-1/2">                     
                                <select id="months" class="form-control border-gray-300 border-r-0 border-l-0 mt-1 w-full focus:border-indigo-700" required autofocus>
                                    <option value="">MM</option>
                                </select>
                            </div>
                            <div class="basis-1/2">                        
                                <select id="years" class="form-control border-gray-300 rounded-lg mt-1 w-full rounded-s-none" required autofocus>
                                    <option value="">AAAA</option>
                                </select>
                            </div>
                        </div>                     
                    </div>

                    <!-- Names -->
                    <div class="md:basis-1/4 md:ml-6 mt-4">
                        <x-input-label for="name" :value="__('Nombres')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="nombres" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Surnames -->
                    <div class="md:basis-1/4 md:ml-6 mt-4">
                        <x-input-label for="surname" :value="__('Apellidos')" />
                        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="apellidos" :value="old('surname')" required autofocus autocomplete="surname" />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    </div>
                </div>

                <!-- Validation alert container -->
                <div id="alert-container" class="max-w-7xl">                   
                </div>

                <!-- Location section and Gender -->
                <div class="md:flex md:flex-row">                  

                    <!-- Department -->
                    <div class="md:basis-1/3 mt-4">
                        <x-input-label for="department" :value="__('Departamento')" />
                        <select id="department" name="departamento" class="form-control border-gray-300 rounded-lg mt-1 w-full" required autofocus>
                            <option value="">Selecciona tu departamento</option>    
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

                    <!-- Sex -->
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="sex" :value="__('Sexo según DPI')" />
                        <select id="sex" name="sexo" class="form-control border-gray-300 rounded-lg mt-1 w-full" required autofocus>
                            <option value="">Elije una opción</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                    </div>
                </div>

                <!-- Contact section -->
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

                <!-- JRV selection section -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6">
                    {{ __('Asignación de mesa') }}
                    <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">Tu mesa aparecerá en el siguiente campo siempre que hayas completado la información previa. Si no ves el número de tu mesa, por favor consúltalo en <a class="hover:underline" href="">https://dondevotas2023.tse.org.gt</a> y vuelve a este formulario.</p>
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- JRV Search -->
                    <div class="md:basis-1/2 mt-4">
                        <x-input-label for="table-group" :value="__('Mesa')" />
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="input-jrv" class="block w-full p-4 pl-10 text-base font-extrabold text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Buscar una mesa" required>
                            <button id="btn-availability" class="text-white absolute right-2.5 bottom-2.5 bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900" data-modal-target="jrv-select-modal" data-modal-toggle="jrv-select-modal">Ver disponibilidad</button>
                            <button id="btn-availability-2" class="text-white absolute right-2.5 bottom-2.5 font-extrabold rounded-lg text-sm px-4 py-2 hidden" style="background-color:#84cc16;" disabled>Seleccionada</button>
                        </div>
                    </div>

                    <!-- JRV Address -->
                    <div class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="table-group" :value="__('Fiscal Informático')" />
                        <div class="flex">
                            <div class="flex items-center h-5">
                                <input id="fiscal-informatico" name="fiscal_electronico" aria-describedby="helper-checkbox-text" type="checkbox" value="" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Deseo ser un fiscal informático</label>
                                <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                    <a id="link-fiscal-info" href="#" data-modal-target="info-fiscal-modal" data-modal-toggle="info-fiscal-modal" class="underline inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                        <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        ¿Qué es un fiscal informático?
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fiscal Info modal -->
                <div id="info-fiscal-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Fiscal informático
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="info-fiscal-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6 overflow-y-auto h-64">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Un fiscal informático se encarga de supervisar y comparar los resultados preliminares de las votaciones. Su responsabilidad incluye garantizar que los fiscales y las juntas receptoras de votos reciban las certificaciones de escrutinios correspondientes. Además, verifican la consistencia de los datos entre el acta final de cierre y escrutinios y las certificaciones de escrutinios. También comparan las certificaciones de escrutinios con las actas finales publicadas. Asimismo, revisan la precisión de los datos procesados por el sistema TREP mediante la comparación con las imágenes de las actas escaneadas, entre otras tareas.
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button id="btn-fiscal-info" data-modal-hide="info-fiscal-modal" type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JRV Selection Modal -->
                <div id="jrv-select-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="jrv-select-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <!-- Modal header -->
                            <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                    Selecciona una mesa
                                </h3>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 overflow-y-auto h-64">
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Tu mesa</span>
                                <ul id="li-jrv-01" class="my-4 space-y-3 mb-8">
                                </ul>
                                
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Mesas en tu centro</span>
                                <ul id="li-jrv-02" class="my-4 space-y-3 mb-8">                
                                </ul>

                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Otras mesas en tu área</span>
                                <ul id="li-jrv-03" class="my-4 space-y-3">                 
                                </ul>   
                            </div>
                            <!-- Modal footer -->
                            <div class="grid justify-items-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <div class="flex items-center">
                                    <button id="btn-view-map" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-4">Volver</button>
                                    <button id="btn-confirm" type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900" data-modal-hide="jrv-select-modal">Confirmar mesa</button>
                                </div>
                            </div>
                        </div>
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
                            <div class="p-6 space-y-6 overflow-y-auto h-64">
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
                                <button data-modal-hide="staticModal" type="button" class="text-white bg-indigo-800 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-800 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Volver al formulario</button>
                                <!--<button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Declinar</button>-->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex items-center justify-start mt-8">                     
                    <x-text-input id="accept" class="block mt-1 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" name="accept" :value="old('accept')" required autocomplete="accept" />                       
                    <a id="btn-terms" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2" data-modal-target="staticModal" data-modal-toggle="staticModal" href="#">
                        {{ __('He leído el acuerdo de registro') }}
                    </a>                    
                </div>

                <div class="flex items-center justify-start mt-4">
                    <x-primary-button class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">
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
            var fetched = false;
            var typingTimer;
            var doneTypingInterval = 3000;
            var date_dd = '', date_mm = '', date_yyyy = '';
            var USR_NAME = '', USR_SURNAME = '', USR_DEPT = '', USR_CITY = '';
            var JRV_USR = '', JRV_SELECTED = '';       
            var alertValidation = '<div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 mt-4" role="alert"><div class="flex items-center"><svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg><span class="sr-only">Info</span><h3 class="text-lg font-medium">DPI no válido</h3></div><div class="mt-2 mb-4 text-sm">El DPI ingresado o la fecha de nacimiento no son correctos. Por favor, revisa tu fecha de nacimiento e intenta ingresar tu DPI nuevamente.</div><div class="flex"><button type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2">Entendido</button></div></div>';

            // Populate days
            populateDays();

            // Populate months
            populateMonths();

            // Populate years
            populateYears();

            // Prevent autoscrolling in terms and conditions
            document.getElementById('btn-terms').addEventListener('click', function(event) {
                event.preventDefault();         
            });

            // Prevent autoscrolling in fiscal info
            document.getElementById('btn-fiscal-info').addEventListener('click', function(event) {
                event.preventDefault();         
            });

            // Prevent autoscrolling in fiscal info
            document.getElementById('link-fiscal-info').addEventListener('click', function(event) {
                event.preventDefault();         
            });

            // Setting up buttons
            enableButtonAvailability(false); 
            enableInputEmail(false);      
            
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
                        $('#city').html('<option value="">Seleccionar Municipio</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .municipio+ '">' + value.municipio + '</option>');
                        });

                        $('#city').val(USR_CITY);
                    }
                });
            });

            // Days input change event
            $('#days').on('change', function () {
                date_dd = this.value;
                $('#birthdate').val(date_yyyy+'-'+date_mm+'-'+date_dd);
            });

            // Days input change event
            $('#months').on('change', function () {
                date_mm = this.value;
                $('#birthdate').val(date_yyyy+'-'+date_mm+'-'+date_dd);
            });

            // Days input change event
            $('#years').on('change', function () {
                date_yyyy = this.value;
                $('#birthdate').val(date_yyyy+'-'+date_mm+'-'+date_dd);

                // Get the info
                var dpi_value = $('#dpi').val().trim();
                var date_value = $('#birthdate').val()+'T06:00:00.000Z';
                var data = {"cui":`${dpi_value}`,"fecha":`${date_value}`};
                    
                $.ajax({
                    url: "https://dondevotas2023api.tse.org.gt/dondevotas/consulta",
                    type: "POST",
                    data: JSON.stringify(data),                 
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function (result) {
                        var name_usr = result.data.nombre.split(",");
                        USR_SURNAME = name_usr[0].trim();
                        USR_NAME = name_usr[1].trim();
                        USR_DEPT = result.data.departamento;
                        USR_CITY = result.data.municipio;
                        JRV_USR = result.data.nromesa

                        $('#surname').val(USR_SURNAME);
                        $('#name').val(USR_NAME); 
                        $('#input-jrv').val(JRV_USR);  
                        $('#department').val(USR_DEPT);
                        $('#department').trigger('change'); 
                        $('#input-jrv').trigger('input');                   
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 404) {
                            $('#alert-container').html(alertValidation);
                                // Dismiss the alert when the button is clicked
                            $('[data-dismiss-target="#alert-additional-content-2"]').click(function() {
                                $('#alert-additional-content-2').remove();
                                $('#dpi').val('');
                            });
                        } else {
                            //console.error(xhr.responseText);
                        }
                    }
                });
            });

            $('#input-jrv').on('input', function () {
                var inputValue = $(this).val();
                enableButtonAvailability(inputValue != '');
                changeStatusToSelected(false);
            });   
            
            $('#btn-confirm').click(function (event) {
                event.preventDefault();
                changeStatusToSelected(true);
            });

            $('#fiscal-informatico').change(function() {
                if ($(this).is(':checked')) {
                    $(this).val('Y');
                } else {
                    $(this).val('N');
                }
            });

            // JRVs populate list 
            $('#btn-availability').click(function (event) {
                event.preventDefault(); 
                enableButtonConfirm(false);
                showButtonMap(false);
                
                // Get a new JRV if usr change the number
                JRV_USR = $("#input-jrv").val();

                // Init lists
                $("#li-jrv-01").html('');
                $("#li-jrv-02").html('');
                $("#li-jrv-03").html('');

                $.ajax({
                    url: "{{url('api/fetch-jrvs-by-center')}}",
                    type: "POST",
                    data: {
                        jrv: JRV_USR,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {                      
                        $.each(result.jrvs_by_center, function (index, jrvs_by_center) {
                            if (jrvs_by_center.jrv === parseInt(JRV_USR)) {
                                $("#li-jrv-01").append(createListItem(jrvs_by_center.jrv, jrvs_by_center.nombre+', '+jrvs_by_center.ubicacion+', ZONA '+jrvs_by_center.zona, jrvs_by_center.estatus, true));
                            } else {
                                $("#li-jrv-02").append(createListItem(jrvs_by_center.jrv, jrvs_by_center.nombre+', '+jrvs_by_center.ubicacion+', ZONA '+jrvs_by_center.zona, jrvs_by_center.estatus, false));
                            }                         
                        });

                        $("#li-jrv-01").append(`<p class="inline-flex items-center text-sm font-normal text-gray-500 dark:text-gray-400"><svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>¿Qué opciones tengo si mi mesa no está disponible? Puedes elegir entre las mesas disponibles en tu mismo centro de votación o elegir alguna de tu mismo municipio.</p>`);
                        $("#li-jrv-02").append(`<p class="inline-flex items-center text-sm font-normal text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 text-gray-500 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>No hay más mesas disponibles en tu centro de votación.</p>`);                     
                    }
                });

                $.ajax({
                    url: "{{url('api/fetch-jrvs-by-city')}}",
                    type: "POST",
                    data: {
                        jrv: JRV_USR,
                        municipio: $('#city').val(),
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {                      
                        $.each(result.jrvs_by_city, function (index, jrvs_by_city) {
                            $("#li-jrv-03").append(createListItem(jrvs_by_city.jrv, jrvs_by_city.nombre+', '+jrvs_by_city.ubicacion+', ZONA '+jrvs_by_city.zona, jrvs_by_city.estatus, false));                         
                        });

                        $("#li-jrv-03").append(`<p class="inline-flex items-center text-sm font-normal text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 text-gray-500 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>No hay más mesas disponibles en tu municipio.</p>`);

                        // Add the events to all the new list items
                        const links = document.querySelectorAll('a.flex.items-center');

                        links.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                            event.preventDefault();

                            const radioButton = link.querySelector('input[type="radio"]');

                                if (!radioButton.hasAttribute('disabled')) {
                                    radioButton.checked = true;
                                    JRV_SELECTED = radioButton.value;
                                    
                                    enableButtonConfirm(radioButton.checked);
                                    showButtonMap(radioButton.checked);
                                }
                            });
                        });
                    }
                });
            });

            function enableButtonAvailability(enable) {
                if (enable) {
                    $('#btn-availability').prop('disabled', false);
                    $('#btn-availability').addClass('bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900');
                    $('#btn-availability').removeClass('cursor-not-allowed bg-indigo-300 hover:bg-indigo-400');
                } else {
                    $('#btn-availability').prop('disabled', true);
                    $('#btn-availability').removeClass('bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900');
                    $('#btn-availability').addClass('cursor-not-allowed bg-indigo-300 hover:bg-indigo-400');
                }
            }

            function enableButtonConfirm(enable) {
                if (enable) {
                    $('#btn-confirm').prop('disabled', false);
                    $('#btn-confirm').addClass('bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900');
                    $('#btn-confirm').removeClass('cursor-not-allowed bg-indigo-300 hover:bg-indigo-400');
                } else {
                    $('#btn-confirm').prop('disabled', true);
                    $('#btn-confirm').removeClass('bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900');
                    $('#btn-confirm').addClass('cursor-not-allowed bg-indigo-300 hover:bg-indigo-400');
                }
            }

            function showButtonMap(showup) {
                if (showup) {
                    $('#btn-view-map').removeClass('invisible');
                } else {
                    $('#btn-view-map').addClass('invisible');
                }
            }

            function changeStatusToSelected(change) {
                if (change) {
                    $('#input-jrv').val(JRV_SELECTED);
                    $('#btn-availability').addClass('hidden');
                    $('#btn-availability-2').removeClass('hidden');
                    //enableButtonAvailability(false);
                } else {
                    JRV_SELECTED = '';
                    $('#btn-availability-2').addClass('hidden');
                    $('#btn-availability').removeClass('hidden');
                    //enableButtonAvailability(true);
                }
            }

            function enableInputEmail(enable) {
                if (enable) {
                    $('#email').prop('disabled', false);
                } else {
                    $('#email').prop('disabled', true);
                }
            }

        });      

        // Populate days 
        function populateDays() {
            var select = document.getElementById("days");
            
            for (var i = 1; i <= 31; i++) {
                var option = document.createElement("option");
                var day = i < 10 ? "0" + i : i;
                option.value = day;
                option.text = day;
                option.setAttribute("name", day);
                select.appendChild(option);
            }
        }

        // Populate months
        function populateMonths() {
            var select = document.getElementById("months");
            
            for (var i = 1; i <= 12; i++) {
                var option = document.createElement("option");
                var month = i < 10 ? "0" + i : i;
                option.value = month;
                option.text = month;
                option.setAttribute("name", month);
                select.appendChild(option);
            }
        }

        // Populate years
        function populateYears() {
            var select = document.getElementById("years");
            var currentYear = new Date().getFullYear();

            for (var i = currentYear; i >= 1900; i--) {
                var option = document.createElement("option");
                option.value = i;
                option.text = i;
                option.setAttribute("name", i);
                select.appendChild(option);
            }
        }

        // JRV list items
        function createListItem(id_jrv, description, availability, show) {
            var listItem = '';

            if (availability === 0) {
                listItem = '<li><a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white"><div class="flex items-center"><input id="rb-'+id_jrv+'" type="radio" value="'+id_jrv+'" name="default-radio" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><div class="flex-column items-start ml-3"><span class="flex-1 whitespace-nowrap">#'+id_jrv+'<span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-50 rounded dark:text-gray-50" style="background-color: #84cc16">Disponible</span></span><p class="text-sm font-normal text-gray-600 dark:text-gray-500">'+description+'</p></div></div></a></li>'; 
            } else {
                if (show){
                    listItem = '<li><a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white"><div class="flex items-center"><input disabled id="rb-'+id_jrv+'" type="radio" value="'+id_jrv+'" name="default-radio" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><div class="flex-column items-start ml-3"><span class="flex-1 whitespace-nowrap">#'+id_jrv+'<span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-50 bg-red-500 rounded dark:bg-red-700 dark:text-gray-50">No disponible</span></span><p class="text-sm font-normal text-gray-600 dark:text-gray-500">'+description+'</p></div></div></a></li>';          
                }
            }

            return listItem;
        }
    </script>


</x-app-layout>
