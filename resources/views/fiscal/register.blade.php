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
                    <div class="md:basis-1/4 mt-4">
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
                                <select id="months" class="form-control border-gray-300 mt-1 w-full" required autofocus>
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

                    <!-- Sex -->
                    <div class="md:basis-1/4 md:ml-6 mt-4">
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
                </div>

                <div id="alert-container" class="max-w-7xl">
                    <!--<div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 mt-4" role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">DPI no válido</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">El DPI ingresado o la fecha de nacimiento no son correctos. Por favor, revisa tu fecha de nacimiento e intenta ingresar tu DPI nuevamente.</div>
                        <div class="flex">
                            <button type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2">
                            Entendido
                            </button>
                            <button type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                            Dismiss
                            </button>
                        </div>
                    </div>-->
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
                    <!-- JRV Search -->
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
                                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-indigo-500" placeholder="Search Mockups, Logos, Design Templates..." required>
                                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-indigo-700 rounded-r-lg border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
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
                            <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Buscar una mesa..." required>
                            <button id="btn-availability" class="text-white absolute right-2.5 bottom-2.5 bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal">Ver disponibilidad</button>
                        </div>
                    </div>

                    <!-- JRV Address -->
                    <div class="md:basis-1/2 md:ml-6 mt-4">
                        <!-- to do -->
                    </div>
                </div>

                <!-- JRV Selection -->

<div id="crypto-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="crypto-modal">
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
            <div class="p-6 overflow-y-auto h-60">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Connect with one of our available wallet providers or create a new one.</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <div class="flex items-center">        
                                <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300 focus:ring-cyan-500 dark:focus:ring-cyan-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 mr-4">
                                <span class="flex-1 ml-3 whitespace-nowrap">MetaMask</span>
                                <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                            </div>
                        </a>
                    </li>
                    <li>
                    <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <div class="flex items-center">        
                                <input id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 mr-4">
                                <span class="flex-1 ml-3 whitespace-nowrap">MetaMask 2</span>
                                <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Opera Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">WalletConnect</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Fortmatic</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">MetaMask</span>
                            <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Coinbase Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Opera Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">WalletConnect</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Fortmatic</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">MetaMask</span>
                            <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Coinbase Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Opera Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">WalletConnect</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ml-3 whitespace-nowrap">Fortmatic</span>
                        </a>
                    </li>
                </ul>
                <div>
                    <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Why do I need to connect with my wallet?</a>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Confirmar mesa</button>
                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Ver en el mapa</button>
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
                                <button data-modal-hide="staticModal" type="button" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Volver al formulario</button>
                                <!--<button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Declinar</button>-->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex items-center justify-start mt-8">                     
                    <x-text-input id="accept" class="block mt-1" type="checkbox" name="accept" :value="old('accept')" required autocomplete="accept" />                       
                    <a id="btn-terms" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2" data-modal-target="staticModal" data-modal-toggle="staticModal" href="#">
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
            
            var typingTimer;
            var doneTypingInterval = 3000;
            var date_dd = '';
            var date_mm = '';
            var date_yyyy = '';
            // Create an alert for dpi validation
            var alertHTML = '<div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 mt-4" role="alert">' +
                    '<div class="flex items-center">' +
                    '<svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">' +
                    '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>' +
                    '</svg>' +
                    '<span class="sr-only">Info</span>' +
                    '<h3 class="text-lg font-medium">DPI no válido</h3>' +
                    '</div>' +
                    '<div class="mt-2 mb-4 text-sm">El DPI ingresado o la fecha de nacimiento no son correctos. Por favor, revisa tu fecha de nacimiento e intenta ingresar tu DPI nuevamente.</div>' +
                    '<div class="flex">' +
                    '<button type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2">' +
                    'Entendido' +
                    '</button>' +
                    '</div>' +
                    '</div>';

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

            document.getElementById('btn-availability').addEventListener('click', function(event) {
                event.preventDefault();         
            });

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
                        //$('#city').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            // DPI Change Event
            $('#dpi').on('input', function() {                                 
                
                // Validate data
                clearTimeout(typingTimer);
                typingTimer = setTimeout(function() {
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
                            console.log(result);                     
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 404) {
                                //$('[data-modal-target="popup-modal"]').click();
                                $('#alert-container').html(alertHTML);

                                // Dismiss the alert when the button is clicked
                                $('[data-dismiss-target="#alert-additional-content-2"]').click(function() {
                                    $('#alert-additional-content-2').remove();
                                    $('#dpi').val('');
                                });
                                // Handle 404 error
                                //console.error("The requested resource was not found.");
                            } else {
                                // Handle other errors
                                //console.error(xhr.responseText);
                            }
                        }
                    });
                }, doneTypingInterval);
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
            });

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


        const links = document.querySelectorAll('a.flex.items-center'); // Select all the anchor elements with the specified classes

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
            //event.preventDefault();

            const radioButton = link.querySelector('input[type="radio"]');
                radioButton.checked = true; // Selects the associated radio button
            });
        });

    </script>


</x-app-layout>
