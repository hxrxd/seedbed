<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form id="frm-main" class="">
                @csrf          

                @php
                    $birthdate = explode('-', $fiscal->fecha_nacimiento);
                    $year = $birthdate[0];
                    $month = str_pad($birthdate[1], 2, '0', STR_PAD_LEFT);
                    $day = str_pad($birthdate[2], 2, '0', STR_PAD_LEFT);
                @endphp

                <h1 class="font-extrabold text-3xl text-gray-800 leading-tight mb-6">
                    {{ __('Actualizar información') }}
                </h1>

                <!-- Personal info section -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Datos personales') }}
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- ID document -->
                    <div class="md:basis-1/3 mt-4">
                        <x-input-label for="dpi" :value="__('DPI')" />
                        <x-text-input id="dpi-x" class="block mt-1 w-full" type="hidden" name="dpi" :value="old('dpi')"/>
                        <x-text-input id="dpi" class="block mt-1 w-full" type="text" name="dpi" value="{{ $fiscal->dpi }}" required autofocus autocomplete="dpi" inputmode="numeric"/>
                        <x-input-error :messages="$errors->get('dpi')" class="mt-2" />
                    </div>

                    <!-- Birthdate -->
                    <x-text-input id="birthdate" name="fecha_nacimiento" class="hidden" type="text" value="{{ $fiscal->fecha_nacimiento }}"/>
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="days" :value="__('Fecha de nacimiento')" />
                        <div class="flex flex-row sm:mx-auto">
                            <div class="basis-1/2">                      
                                <select id="days" class="form-control border-gray-300 rounded-lg mt-1 w-full rounded-e-none" value="{{ $day }}" required autofocus>
                                    <option value="">DD</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        @php
                                            $dayOption = str_pad($i, 2, '0', STR_PAD_LEFT);
                                        @endphp
                                        <option value="{{ $dayOption }}" @if ($dayOption == $day) selected @endif>{{ $dayOption }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="basis-1/2">                     
                                <select id="months" class="form-control border-gray-300 border-r-0 border-l-0 mt-1 w-full focus:border-indigo-700" required autofocus>
                                    <option value="">MM</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        @php
                                            $monthOption = str_pad($i, 2, '0', STR_PAD_LEFT);
                                        @endphp
                                        <option value="{{ $monthOption }}" @if ($monthOption == $month) selected @endif>{{ $monthOption }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="basis-1/2">                        
                                <select id="years" class="form-control border-gray-300 rounded-lg mt-1 w-full rounded-s-none" required autofocus>
                                    <option value="">AAAA</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 1900;
                                    @endphp

                                    @for ($i = $currentYear; $i >= $startYear; $i--)
                                        <option value="{{ $i }}" @if ($i == $year) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>                     
                    </div>

                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <button id="btn-verify" class="hidden mt-6 text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900 w-full" style="cursor: pointer;">
                            {{ __('Verificar') }}
                        </button>                   
                    </div>    
                </div>

                <!-- Personal data section -->
                <div id="section-step-1" class="">
                <div class="md:flex md:flex-row">
                    <!-- Names -->
                    <div id="cont-name" class="md:basis-1/2 mt-4">
                        <x-input-label for="name" :value="__('Nombres')" />
                        <x-text-input id="name-x" class="block mt-1 w-full" type="hidden" name="nombres" :value="old('name')"  />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="nombres" value="{{ $fiscal->nombres }}" autofocus autocomplete="name" disabled/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Surnames -->
                    <div id="cont-surname" class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="surname" :value="__('Apellidos')" />
                        <x-text-input id="surname-x" class="block mt-1 w-full" type="hidden" name="apellidos" :value="old('surname')" />
                        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="apellidos" value="{{ $fiscal->apellidos }}" autofocus autocomplete="surname" disabled />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    </div>
                </div>

                <div class="md:flex md:flex-row">
                    <!-- Department -->
                    <div class="md:basis-1/3 mt-4">
                        <x-input-label for="department" :value="__('Departamento')" />
                        <x-text-input id="department-x" class="block mt-1 w-full" type="hidden" name="departamento" value="{{ $fiscal->departamento }}" />
                        <select id="department" name="departamento" class="form-control border-gray-300 rounded-lg mt-1 w-full" autofocus disabled>
                            <option value="" selected>Selecciona tu departamento</option>    
                            
                            @php
                                $dept = $fiscal->departamento;
                            @endphp
                            
                            @foreach ($departments as $department)
                                <option value="{{ $department }}">{{ $department }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>

                    <!-- City -->
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="city" :value="__('Municipio')" />
                        <x-text-input id="city-x" class="block mt-1 w-full" type="hidden" name="municipio" value="{{ $fiscal->municipio }}" />
                        <select id="city" name="municipio" class="form-control border-gray-300 rounded-lg mt-1 w-full" autofocus disabled>
                        </select>
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>

                    <!-- Sex -->
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="sex" :value="__('Sexo según DPI')" />
                        <x-text-input id="sex-x" class="block mt-1 w-full" type="hidden" name="sexo" value="" />
                        <select id="sex" name="sexo" class="form-control border-gray-300 rounded-lg mt-1 w-full" required>
                            <option value="">Elije una opción</option>

                            @php
                                $sex = $fiscal->sexo;
                            @endphp

                            <option value="Femenino" @if ($sex === 'Femenino') selected @endif>Femenino</option>
                            <option value="Masculino" @if ($sex === 'Masculino') selected @endif>Masculino</option>
                            <option value="Prefiero no decirlo" @if ($sex === 'Prefiero no decirlo') selected @endif>Prefiero no decirlo</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                    </div>
                </div>
                <!--</div>-->

                <!-- Contact section -->
                <!--<div id="section-step-2" class="hidden">-->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6">
                    {{ __('Contacto') }}
                </h2>

                <div class="md:flex md:flex-row">
                    <!-- Phone -->
                    <div class="md:basis-1/2 mt-4">
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone-x" class="block mt-1 w-full" type="hidden" minlength="8" maxlength="8" name="telefono" :value="old('phone')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" minlength="8" maxlength="8" name="telefono" value="{{ $fiscal->telefono }}" required autocomplete="phone" inputmode="numeric"/>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="email" :value="__('Correo')" />
                        <x-text-input id="email-x" class="block mt-1 w-full" type="hidden" name="correo" value="{{Auth::user()->email}}" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="correo" value="{{Auth::user()->email}}" autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                </div>

                <!-- JRV selection section -->
                <div id="section-step-2" class="hidden">
                <h1 class="font-extrabold text-3xl text-gray-800 leading-tight mt-10 mb-6">
                    {{ __('Paso 2') }}
                </h1>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6">
                    {{ __('Asignación de mesa') }}
                </h2>
                <p class="text-md mt-4 text-gray-800">La mesa en la que votas aparecerá de manera predeterminada en el siguiente campo, pero debes revisar la disponiblidad para confirmarla. Si ya no está disponible, podrás seleccionar entre otras mesas de tu mismo centro o municipio.</p>

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
                            <input type="hidden" id="jrv-x" class="" name="jrv" value="">
                            <input type="search" id="input-jrv" class="block w-full p-4 pl-10 text-base font-extrabold text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Buscar una mesa" required disabled>
                            <!--<button id="btn-availability" class="text-white absolute right-2.5 bottom-2.5 bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900" data-modal-target="jrv-select-modal" data-modal-toggle="jrv-select-modal">Ver disponibilidad</button>-->
                            <!--<button id="btn-availability-2" class="text-white absolute right-2.5 bottom-2.5 font-extrabold rounded-lg text-sm px-4 py-2 hidden" style="background-color:#84cc16;" disabled>Seleccionada</button>-->
                            <a id="btn-availability-2" class="absolute right-5 bottom-2.5 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 px-4 py-2 hidden" data-modal-target="jrv-select-modal" data-modal-toggle="jrv-select-modal" style="cursor: pointer;">Cambiar</a>
                        </div>
                    </div> 
                </div>
                </div>

                <div id="section-step-2-1" class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
                    {{ __('Aplicar como fiscal informático (Opcional)') }}
                </h2>
                <a data-modal-target="info-fiscal-modal" data-modal-toggle="info-fiscal-modal" class="underline text-md mt-8 mb-2 font-bold text-indigo-600" style="cursor: pointer; margin-top:6">¿Qué es un fiscal informático?</a>
                <!--<p class="text-md mt-6 text-gray-800">Un fiscal informático se encarga de supervisar y comparar los resultados preliminares de las votaciones. Su responsabilidad incluye garantizar que los fiscales y las juntas receptoras de votos reciban las certificaciones de escrutinios correspondientes. Además, verifican la consistencia de los datos entre el acta final de cierre y escrutinios y las certificaciones de escrutinios. También comparan las certificaciones de escrutinios con las actas finales publicadas. Asimismo, revisan la precisión de los datos procesados por el sistema TREP mediante la comparación con las imágenes de las actas escaneadas, entre otras tareas.</p>-->
                <p class="text-md mt-2 mb-2 text-gray-800">Si accedes a ser fiscal informático, ingresarás a una lista en la que serás contactado para continuar este proceso especial.</p>

                <div class="md:flex md:flex-row">
                    
                    <div class="md:basis-1/2 md:ml-6 mt-4 mb-6">
                        <!--<x-input-label for="table-group" :value="__('Fiscal Informático')" />-->
                        <div class="flex">
                            <div class="flex items-center h-5">
                                <input id="fiscal-informatico" name="fiscal_electronico" aria-describedby="helper-checkbox-text" type="checkbox" value="{{ $fiscal->fiscal_electronico }}" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Sí, quiero ser un fiscal informático</label>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div id="section-step-3" class="hidden">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
                    {{ __('¡Todo listo!') }}
                </h2>
                <p class="text-md mt-6 text-gray-800">Para finalizar el registro, debes leer el acuerdo de registro haciendo clic en el texto <strong>He leído el acuerdo de registro</strong>. Al terminar, marca la casilla de confirmación.</p>

                <div class="flex items-center justify-start mt-8 mb-6">                     
                    <x-text-input id="accept" class="block mt-1 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" name="accept" :value="old('accept')" disabled />                       
                    <a id="link-terms" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2" data-modal-target="staticModal" data-modal-toggle="staticModal" href="#">
                        {{ __('He leído el acuerdo de registro') }}
                    </a>                    
                </div>
                
                </div>

                

                <!-- Fiscal Info modal -->
                <div id="info-fiscal-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            
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
                            
                            <div class="p-6 space-y-6 overflow-y-auto h-64">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Un fiscal informático se encarga de supervisar y comparar los resultados preliminares de las votaciones. Su responsabilidad incluye garantizar que los fiscales y las juntas receptoras de votos reciban las certificaciones de escrutinios correspondientes. Además, verifican la consistencia de los datos entre el acta final de cierre y escrutinios y las certificaciones de escrutinios. También comparan las certificaciones de escrutinios con las actas finales publicadas. Asimismo, revisan la precisión de los datos procesados por el sistema TREP mediante la comparación con las imágenes de las actas escaneadas, entre otras tareas.
                                </p>
                            </div>
                            
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
                            <div id="list-jrv-loading" class="flex items-center justify-center p-6 h-64 hidden">
                                <div class="flex items-center justify-center w-56 h-56">
                                    <div role="status">
                                        <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-indigo-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div id="list-jrv" class="p-6 overflow-y-auto h-64">
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Mesa en donde votas</span>
                                <ul id="li-jrv-01" class="my-4 space-y-3 mb-8">
                                </ul>
                                
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Mesas en tu centro</span>
                                <ul id="li-jrv-02" class="my-4 space-y-3 mb-8">                
                                </ul>

                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Otras mesas en tu municipio</span>
                                <ul id="li-jrv-03" class="my-4 space-y-3">                 
                                </ul>   
                            </div>
                            <!-- Modal footer -->
                            <div class="grid justify-items-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <div class="flex items-center">
                                    <!--<button id="btn-view-map" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-4">Volver</button>-->
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
                                <!--<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>-->
                            </div>
                            <!-- Modal body -->
                            <div id="modalContent" class="p-6 space-y-6 overflow-y-auto h-64">
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
                                <button id="btn-terms" data-modal-hide="staticModal" type="button" class="text-white bg-indigo-800 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-800 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Volver al formulario</button>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div id="control-buttons" class="flex flex-row items-center justify-start mt-4 mb-6">
                    <button id="btn-update" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">    
                        {{ __('Actualizar') }}
                    </button>
                    <button id="btn-cancel" type="button" class="ml-4 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-4">Cancelar</button>
                </div>
            </form>


            <!-- Danger Zone -->
            <div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 mt-12">
                <h2 class="font-semibold text-xl text-red-800 leading-tight mt-12">
                    {{ __('Darme de baja como fiscal') }}
                </h2>
                <p class="text-md mt-4 text-gray-800">Tu registro será removido de la lista de fiscales y la JRV que seleccionaste será desbloqueada. Para darte de baja como fiscal, por favor ingresa tu número de DPI en el siguiente campo:</p>

                <div class="md:flex md:flex-row">
                    <!-- JRV Search -->
                    <div class="md:basis-1/2 mt-4">
                        <x-text-input id="input-confirm" class="block mt-1 w-full" type="text" name="input-confirm" value="" required autofocus autocomplete="dpi" inputmode="numeric"/>
                    </div> 
                </div>

                <div class="flex items-center justify-start mt-4 mb-3">
                    <button id="btn-downgrade" class="text-white bg-red-800 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 w-full md:w-3/12" style="cursor: pointer;">
                        {{ __('Darme de baja') }}
                    </button>
                </div>

            </div>

        </div>
        <!--/Card-->
    </div>
    <!--/container-->
    <style>.animate{animation:expandFromTop 0.6s;animation-fill-mode:forwards}.move-button{animation:bounceButton 0.9s;animation-fill-mode:forwards}.pop-up{animation:modalPopUp 0.3s ease-out}.modal-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5)}.modal{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);padding:20px;background-color:#fff;box-shadow:0 0 10px rgba(0,0,0,0.1);border-radius:10px}.swal-button--confirm{background-color:#442178}.swal-button--confirm:hover{background-color:#8787de!important}@media (min-width:768px){.modal{width:600px;transform:translate(-50%,-50%)}}@media (max-width:767px){.modal{width:90%;transform:translate(-50%,-50%)}}@keyframes expandWithBounce{0%{height:0;opacity:0;transform-origin:top}40%{opacity:.7;height:100%;transform:scaleY(1.3)}60%{opacity:1;transform:scaleY(.7)}80%{height:100%;transform:scaleY(1.1)}90%{transform:scaleY(.9)}100%{height:100%;transform:scaleY(1)}}@keyframes expandFromTop{0%{height:0;opacity:0;transform-origin:top;transform:scaleY(0)}100%{opacity:1;height:100%;transform:scaleY(1)}}@keyframes moveButton{0%{transform:translateY(0);opacity:0}40%{opacity:1}60%{transform:translateY(calc(100% + 1px))}100%{transform:translateY(0)}}@keyframes bounceButton{0%{opacity:1;transform:scale(1)}20%{transform:scale(1.2)}40%{opacity:0;transform:scale(0)}60%{opacity:1;transform:scale(1.2)}100%{transform:scale(1)}}@keyframes modalPopUp{0%{opacity:0}100%{opacity:1}}</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        $(document).ready(function () {
            var fetched = false;
            var typingTimer;
            var doneTypingInterval = 3000;
            var date_dd = '', date_mm = '', date_yyyy = '';
            const API_URL_TSE = 'https://dondevotas2023api.tse.org.gt/dondevotas/consulta';
            var USR_NAME = '', USR_SURNAME = '', USR_DEPT = '', USR_CITY = '', USR_MAIL = '';
            var JRV_USR = '', JRV_SELECTED = '';       
            let CURRENT_STEP = 'STEP_0';
            var terms_read = false;

            selectedDept = $('#department-x').val();
        
            setTimeout(() => {
                $('#department').val(selectedDept);
                $('#department').trigger('change');
                initializeFiscalInformaticoCheck();
            }, 500);

            initializeEdit();

            $('#dpi').on('focusout', function () {
                const inputValue = $(this).val();

                if(inputValue != ''){
                    const trimmedValue = inputValue.replace(/\s+/g, ''); // Remove leading and trailing spaces
                    const pattern = /^[0-9]+$/;

                    if (pattern.test(trimmedValue)) {
                        if (trimmedValue.length != 13) {
                            showSimpleAlert('Longitud no válida', 'Por favor, ingresa nuevamente tu número de DPI.', 'Entendido',null);
                            $('#dpi').val('');
                        }
                    } else {
                        showSimpleAlert('Formato no válido','Evita colocar guiones, espacios o caracteres especiales al ingresar tu DPI','Entendido',null);
                        $('#dpi').val('');
                    }
                }
            });

            $('#phone').on('focusout', function () {
                const inputValue = $(this).val();

                if (inputValue != '') {
                    const trimmedValue = inputValue.replace(/\s+/g, ''); // Remove leading and trailing spaces
                    const pattern = /^[0-9]+$/;

                    if (pattern.test(trimmedValue)) {
                        if (trimmedValue.length != 8) {
                            showSimpleAlert('Longitud no válida','Por favor, ingresa tú número nuevamente','Entendido',null);
                            $('#phone').val('');
                        }
                    } else {
                        showSimpleAlert('Formato no válido','Ingresa tu número sin código de área. Evita guiones o espacios.','Entendido',null);
                        $('#phone').val('');
                    }
                } else {
                    showSimpleAlert('Debes ingresar número de teléfono','Ingresa tu número sin código de área. Evita guiones o espacios.','Entendido',null);
                }
            });

            $('#btn-verify').click(function (event) {
                event.preventDefault(); 

                if($('#days').val() === '' || $('#months').val() === '' || $('#years').val() === ''){
                    showSimpleAlert('Falta información', 'Por favor, completa tu fecha de nacimiento', 'Entendido',null);
                } else {
                    // Get the user info from TSE API
                    fetchUserInfo();
                }
            });

            $('#btn-downgrade').click(function (event) {
                event.preventDefault(); 

                if($('#input-confirm').val() === ''){
                    showSimpleAlert('Completa el campo de confirmación', 'Para darte de baja como fiscal, debes ingresar tu DPI', 'Entendido',null);
                } else {
                    if($('#input-confirm').val() === $('#dpi').val()) {
                        swal({
                            title: '¿Estás seguro que deseas darte de baja como fiscal?',
                            text: "Tu información será eliminada y la JRV que seleccionaste será desbloqueada",
                            icon: 'warning',
                            buttons:  {
                                cancel: "No, volver al formulario",
                                confirm: "Sí",
                            },
                            //cancelButtonColor: '#5a2ca0',

                        }).then((willStore ) => {
                            if (willStore) {
                                downgrade();
                            }
                        });
                    } else {
                        showSimpleAlert('DPI no coincide', 'El número de DPI ingresado no coincide', 'Volver a intentar',null);
                    }
                }
            });

            // City Dropdown Change Event
            $('#department').on('change', function () {
                fetchCities();
            });

            // Days input change event
            $('#days').on('change', function () {
                date_dd = this.value;
                updateBirthdate();
            });

            // Days input change event
            $('#months').on('change', function () {
                date_mm = this.value;
                updateBirthdate();
            });

            // Days input change event
            $('#years').on('change', function () {
                date_yyyy = this.value;
                updateBirthdate();
            });

            // Save action button
            $('#btn-update').click(function (event) {
                event.preventDefault();
                
                if($('#phone').val() === '') {
                    showSimpleAlert('Información incompleta: Teléfono','Por favor, ingrese su número de teléfono','Entendido',null);
                } else if($('#sex').val() === '') {
                    showSimpleAlert('Información incompleta: Sexo según DPI','Por favor, ingrese su sexo','Entendido',null);
                } else {
                    updateAll();
                }
            });

            $('#fiscal-informatico').change(function() {
                if ($(this).is(':checked')) {
                    $(this).val('Y');
                } else {
                    $(this).val('N');
                }
            });

            $('#btn-cancel').click(function(event){
                event.preventDefault();
                swal({
                    title: '¿Estás seguro que deseas salir?',
                    text: "La información ingresada no será guardada.",
                    icon: 'warning',
                    buttons:  {
                        cancel: "No, volver al formulario",
                        confirm: "Sí",
                    },
                    //cancelButtonColor: '#5a2ca0',

                }).then((willStore ) => {
                    if (willStore) {
                        var redirectUrl = "{{ url('/dashboard') }}";
                        window.location.href = redirectUrl;
                    }
                });
            });
            
            function fetchCities() {
                var idDep = $('#department').val();             

                if (USR_CITY === '') {
                    USR_CITY = $('#city-x').val();
                }

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
                        //$('#city-x').val(USR_CITY);
                    }
                });
            }

            function fetchUserInfo() {
                const dpi_value = $('#dpi').val().trim();
                const date_value = `${$('#birthdate').val()}T06:00:00.000Z`;
                const data = { "cui": dpi_value, "fecha": date_value };
                    
                $.ajax({
                    url: API_URL_TSE,
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
                        JRV_USR = result.data.nromesa;
                        JRV_SELECTED = JRV_USR;

                        $('#surname').val(USR_SURNAME);
                        $('#name').val(USR_NAME); 
                        $('#input-jrv').val(JRV_USR);  
                        $('#department').val(USR_DEPT);
                        $('#department').trigger('change'); 
                        $('#input-jrv').trigger('input');
                        
                        $('#surname-x').val(USR_SURNAME);
                        $('#name-x').val(USR_NAME); 
                        $('#jrv-x').val(JRV_USR);  
                        $('#department-x').val(USR_DEPT);  
                        $('#dpi-x').val(dpi_value);

                        showEditMode(true);
                        disablePersonalData(true);
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 404) {
                            showSimpleAlert('Datos no encontrados','Por favor, revisa que tu número de DPI y fecha de nacimiento son correctos e intenta nuevamente.','Entendido',null);
                        } else {
                            //console.error(xhr.responseText);
                        }
                    }
                });
            }

            function updateAll() {
                USR_MAIL = $('#email').val();

                $.ajax({
                    url: "{{url('api/update-fiscal')}}",
                    type: "POST",
                    data: {
                        nombres:$('#name').val(),
                        apellidos:$('#surname').val(),
                        dpi:$('#dpi').val(),
                        departamento:$('#department').val(),
                        municipio:$('#city').val(),
                        telefono:$('#phone').val(),
                        fecha_nacimiento:$('#birthdate').val(),
                        sexo:$('#sex').val(),
                        correo:$('#email').val(),
                        fiscal_electronico:$('#fiscal-informatico').val(),
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'json',
                    success: function (result) {
                        //console.log(result);
                        
                        showSimpleAlert('¡Genial!', 'Tus datos fueron actualizados', 'NO_BUTTON','success');
                        
                        setTimeout(() => {
                            var redirectUrl = result.redirect_url;
                            window.location.href = redirectUrl;
                        }, 1000);

                    }
                });
            }

            function downgrade() {
                $.ajax({
                    url: "{{url('api/downgrade-fiscal')}}",
                    type: "POST",
                    data: {
                        correo: $('#email').val(),
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        showSimpleAlert('Fuiste dado de baja', 'Tus datos fueron removidos.', 'NO_BUTTON','success');
                        
                        setTimeout(() => {
                            var redirectUrl = result.redirect_url;
                            window.location.href = redirectUrl;
                        }, 1000);
                    }
                });
            }

            function updateBirthdate() {
                const birthdate = `${date_yyyy}-${date_mm}-${date_dd}`;
                $('#birthdate').val(birthdate);
            }

            // Initialize check for Fiscal Informatico
            function initializeFiscalInformaticoCheck() {
                $("#fiscal-informatico").prop("checked", $('#fiscal-informatico').val() === 'Y');
            }

            // Validation for initialize components when fiscal was pre-registered 
            function initializeEdit() {
                if($('#name').val() === '') {
                    showEditMode(false);
                    disablePersonalData(false);
                } else {
                    disablePersonalData(true);
                }
            }

            // Show the components for edit
            function showEditMode(show) {
                if(show) {
                    $('#btn-verify').addClass('hidden');
                    $('#section-step-1').removeClass('hidden');
                    $('#section-step-2-1').removeClass('hidden');
                    $('#control-buttons').removeClass('hidden');
                } else {
                    $('#btn-verify').removeClass('hidden');
                    $('#section-step-1').addClass('hidden');
                    $('#section-step-2-1').addClass('hidden');
                    $('#control-buttons').addClass('hidden');
                }
            }

            // Disables specific fields in form
            function disablePersonalData(flag) {
                $('#surname').prop('disabled', flag);
                $('#name').prop('disabled', flag); 
                $('#department').prop('disabled', flag);
                $('#city').prop('disabled', flag); 
                $('#dpi').prop('disabled', flag); 
                $('#days').prop('disabled', flag);
                $('#months').prop('disabled', flag);
                $('#years').prop('disabled', flag);
                $('#email').prop('disabled', flag);

                $('#surname').addClass('disabled:opacity-60');
                $('#name').addClass('disabled:opacity-60');
                $('#department').addClass('disabled:opacity-60');
                $('#city').addClass('disabled:opacity-60'); 
                $('#dpi').addClass('disabled:opacity-60'); 
                $('#days').addClass('disabled:opacity-60');
                $('#months').addClass('disabled:opacity-60');
                $('#years').addClass('disabled:opacity-60');
                $('#email').addClass('disabled:opacity-60');
            }

            function showSimpleAlert(title, msg, buttonOption, type) {
                if (buttonOption === 'NO_BUTTON') {
                    swal({
                        title: title,
                        text: msg,
                        icon: type,
                    });
                } else {
                    swal({
                        title: title,
                        text: msg,
                        icon: type,
                        buttons:  {
                            confirm: buttonOption,
                        },
                    });
                }
            }
        });      
    </script>
</x-app-layout>