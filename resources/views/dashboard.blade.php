<x-app-layout>
    <div class="py-1 custom-background">
        <div class="w-full p-6 text-start">

            @if (Auth::user()->rol == "Voluntario")
    
            <input id="name" class="hidden" value="{{Auth::user()->name}}"></input>
            <h5 id="saludo" class="mt-24 mb-6 md:ml-8 md:mr-8 text-4xl font-bold text-indigo-900 dark:text-white"></h5>
            <h5 class="mb-0 md:ml-8 md:mr-8 text-2xl font-extrabold text-indigo-900 dark:text-white">Bienvenido a <strong>Movimiento Semilla,</strong></h5>
            <p class="mb-6 md:ml-8 md:mr-8 text-2xl font-extrabold text-indigo-800 dark:text-white">Gracias por sumarte.</p>
            <p class="mb-8 md:ml-8 md:mr-8 text-base text-gray-700 sm:text-lg dark:text-gray-700">Nos complace enormemente darte la bienvenida como voluntario. Tu compromiso y dedicación son fundamentales para asegurar que las elecciones se lleven a cabo de manera justa, transparente y democrática.</p>
        
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 mb-16">
                <!-- Card for Timeline-->
                <div class="w-full p-4 text-start bg-white border border-gray-200 rounded-lg shadow sm:p-8 sm:rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <p class="mb-6 ml-8 mr-8 text-2xl font-extrabold text-gray-600 dark:text-white">Conoce el proceso</p>
                    <!-- Timeline -->
                    <ol class="relative border-l border-l-2 ml-6 mr-8 border-gray-200 dark:border-gray-700">                  
                        <li class="mb-10 ml-6">            
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-indigo-700 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900" style="background-color: #84cc16">
                                <svg class="w-4 h-4 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </span>
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Registrarme como fiscal<span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 ml-3">Disponible</span></h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">¡El registro se encuentra disponible ahora!</time>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Para registrarte como fiscal, deberás completar información necesaria para elegir una Junta Receptora de Votos (JRV). <strong>Podrás encontrar la opción para inscribirte al final de esta página.</strong></p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-indigo-700 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-4 h-4 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Capacitación virtual</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Del 22 de julio al 7 de agosto</time>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Después de completar el registro, participarás en sesiones de inducción a través de videoconferencias en Zoom. Durante estas sesiones, se te proporcionará información detallada sobre tus roles y responsabilidades como fiscal, así como los procedimientos legales y requisitos a seguir durante el día de las elecciones.</p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-indigo-700 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-4 h-4 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Capacitación presencial (opcional)</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Del 8 al 10 de agosto</time>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Las capacitaciones presenciales serán anunciadas oportunamente y con registro previo.</p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-indigo-700 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-4 h-4 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Acreditación</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Disponible a partir del 1 de agosto</time>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Una vez completada la inducción, recibirás tu acreditación oficial como fiscal del Movimiento Semilla. Esta acreditación te permitirá desempeñar tu función durante el día de las elecciones y será generada como un archivo digital a través de esta plataforma.</p>
                        </li>
                        <li class="ml-6 mb-8">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-indigo-700 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg class="w-4 h-4 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Día de las elecciones</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">20 de agosto</time>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">En el día de las elecciones, estarás presentes en las Juntas Receptoras de Votos (JRV) para supervisar el proceso electoral y garantizar la transparencia del mismo. Tu principal tarea será informar del resultado de las votaciones y reportar cualquier incidencia o irregularidad que se presente durante el proceso. Se promoverá el uso de herramientas de comunicación descentralizadas para que puedas informar de manera eficiente y oportuna.</p>
                        </li>
                    </ol>
                </div><!--end of Card-->

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-16 mb-16">
                    <div class="flex items-center justify-center mt-4">
                        <p class=" md:ml-2 md:mr-2 text-base text-gray-700 sm:text-lg dark:text-gray-700">Haz clic en el botón para iniciar</p>
                    </div>  
                    <div class="flex items-center justify-center mt-4">
                        <a id="inscrib" href="{{ route('fiscal.create') }}" class="text-white font-extrabold bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg text-xl px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Inscribirme</a>
                    </div>
                </div>
            </div>

            @endif

            @if (Auth::user()->rol == "Fiscal")

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-16 mb-12  h-full">
                <div class="flex items-center justify-start mt-4 mb-4">
                    <h5 class="mb-0 md:ml-2 md:mr-8 text-3xl font-extrabold text-indigo-900 dark:text-white">Tablero</h5>
                </div> 
                <div class="grid md:grid-cols-3 gap-4 sm:grid-cols-1 ">                  
                    <div class="custom-background-card bg-cover bg-fixed h-52 p-10 md:p-8 text-start rounded-lg shadow sm:rounded-lg">
                        <div class="flex flex-col items-start">
                            <div class="flex space-x-2 items-center">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12" style="color:#84cc16;">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                                <h3 class="text-xl font-extrabold text-white">Registro</h3>
                            </div>
                            <div class="flex flex-col items-start justify-start mt-4">
                                <div class="flex flex-row items-center justify-start">
                                    <p class="text-white ml-8 mr-1">Fiscal: <strong>{{Auth::user()->name}}</strong></p>
                                    <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/>
                                    </svg>
                                </div>
                                <p class="text-white ml-8 mb-2">JRV: <strong>#22380</strong></p>
                                <a id="inscrib" href="#recom" class="ml-8 text-indigo-800 font-extrabold bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg text-sm px-5 py-1.5 text-center">Ver ID Virtual</a>
                            </div>
                        </div>     
                    </div>
                    <div class="custom-background-card bg-cover bg-fixed h-52 p-10 md:p-8 text-start rounded-lg shadow sm:rounded-lg">
                        <div class="flex flex-col items-start">
                            <div class="flex space-x-2 items-center">
                                <svg class="w-6 h-6 text-indigo-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                                <h3 class="text-xl font-extrabold text-white">Capacitación</h3>
                            </div>
                            <div class="flex flex-col items-start justify-start mt-4">
                                <p class="text-white ml-8">Fecha: <strong>1 de agosto</strong></p>
                                <p class="text-white ml-8 mb-2">Modalidad: <strong>Virtual</strong></p>
                                <a class="ml-8 text-indigo-800 font-extrabold bg-[#f7fdcf] hover:bg-[#f7fdcf] rounded-lg text-sm px-5 py-1.5 text-center" disabled>Convocatoria próxima</a>
                            </div>
                        </div>     
                    </div>
                    <div class="custom-background-card bg-cover bg-fixed h-52 p-10 md:p-8 text-start rounded-lg shadow sm:rounded-lg">
                        <div class="flex flex-col items-start">
                            <div class="flex space-x-2 items-center">
                                <svg class="w-6 h-6 text-indigo-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                                <h3 class="text-xl font-extrabold text-white">Acreditación</h3>
                            </div>
                            <div class="flex flex-col items-start justify-start mt-4">
                                <p class="text-white ml-8 mb-2">Fecha: <strong>10 de agosto</strong></p>
                                <a class="ml-8 text-indigo-800 font-extrabold bg-[#f7fdcf] hover:bg-[#f7fdcf] rounded-lg text-sm px-5 py-1.5 text-center" disabled>No disponible</a>
                            </div>
                        </div>     
                    </div>
                    <div class="custom-background-card bg-cover bg-fixed h-52 p-10 md:p-8 text-start rounded-lg shadow sm:rounded-lg">
                        <div class="flex flex-col items-start">
                            <div class="flex space-x-2 items-center">
                                <svg class="w-6 h-6 text-indigo-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                                <h3 class="text-xl font-extrabold text-white">Tu reporte</h3>
                            </div>
                            <div class="flex flex-col items-start justify-start mt-4">
                                <p class="text-white ml-8"><strong>20 de agosto</strong></p>
                                <p class="text-white ml-8 mb-2">Día de las elecciones</p>
                                <a class="ml-8 text-indigo-800 font-extrabold bg-[#f7fdcf] hover:bg-[#f7fdcf] rounded-lg text-sm px-5 py-1.5 text-center" disabled>No disponible</a>
                            </div>
                        </div>     
                    </div>
                    <div class="custom-background-card bg-cover bg-fixed h-52 p-10 md:p-8 text-start rounded-lg shadow sm:rounded-lg">
                        <div class="flex flex-col items-start">
                            <div class="flex space-x-2 items-center">
                                <svg class="w-6 h-6 text-[#e9f877] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold text-white">Recursos</h3>
                            </div>
                            <div class="flex flex-col items-start justify-start mt-4">
                                <p class="text-white ml-8">Acuerdo de registro</strong></p>
                                <p class="text-white ml-8 mb-2">Código de Ética</strong></p>
                                <a href="#" class="ml-8 text-indigo-800 font-extrabold bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg text-sm px-5 py-1.5 text-center" disabled>Descargar</a>
                            </div>
                        </div>     
                    </div>
                </div> 

                <div id="recom" class="flex items-center justify-start mt-8 mb-4">
                    <h5 class="mb-0 md:ml-2 md:mr-8 text-3xl font-extrabold text-indigo-900 dark:text-white">Recomendaciones</h5>
                </div> 
                <div class="grid md:grid-cols-3 gap-4 sm:grid-cols-1">                  
                    <div class="p-4 text-start">
                        <p class="mb-2 text-xl font-extrabold text-indigo-800 dark:text-white">Antes del proceso</p>
                        <!-- List -->
                        <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Descarga e imprime tu constancia que te acredita como Fiscal</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Llega al centro de votación a las 5:45 am, para estar al momento en que abren y preparan las papeletas.</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Acreditate como fiscal ante la junta receptora de votos </span>
                            </li>
                            
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Verifica el conteo de apertura de las boletas en la junta receptora de votos asignada</span>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4 text-start">
                        <p class="mb-2 text-xl font-extrabold text-indigo-800 dark:text-white">Durante el proceso</p>
                        <!-- List -->
                        <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Verifica la normalidad del proceso</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Comportate de acuerdo a nuestro código de ética</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Reporta cualquier anomalía a la junta receptora de votos</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Si presentas una emergencia puedes reportarlo al grupo de Whatsapp o al contacto 5820 6501</span>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4 text-start">
                        <p class="mb-2 text-xl font-extrabold text-indigo-800 dark:text-white">Después del proceso</p>
                        <!-- List -->
                        <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Verifica el conteo de los votos.</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Vigila la anulación de la papelería electoral no utilizada con el sello "NO USADA"</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Solicita una copia de las actas de todas las mesas que se te hayan asignado</span>
                            </li>
                            <li class="flex space-x-2 items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Purple" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="leading-tight">Reporta incidencias y votos impugnados al grupo de Whatsapp</span>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
            
            

            @endif

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12 mb-12">
            <div class="flex flex-col items-center justify-center mt-4">
                <svg class="flex-shrink-0 w-8 h-8 text-green-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.054 7.55929C17.9643 7.39438 17.7898 7.29361 17.6021 7.29838C16.1141 7.33616 12.7603 8.18772 10.8653 11.3002C8.8165 10.0069 6.58714 10.1901 5.76875 10.4277C5.60431 10.4754 5.47573 10.604 5.42799 10.7685C5.11597 11.8432 4.93393 14.4565 6.79472 16.3173C7.67344 17.196 8.58139 17.551 9.40487 17.5649C10.0522 17.5758 10.6174 17.3751 11.0403 17.0971C11.3139 17.3855 11.6032 17.6065 11.8648 17.7575C12.4735 18.1089 13.4851 18.4008 14.6 18.1765C15.7373 17.9477 16.9201 17.1943 17.8624 15.5622C19.7376 12.3143 18.7777 8.88972 18.054 7.55929ZM10.4439 16.2914C10.324 16.0793 10.2185 15.8481 10.1343 15.5982C9.81977 14.6649 9.81623 13.5142 10.3989 12.1892C8.83822 11.1732 7.1316 11.1846 6.32091 11.3266C6.11905 12.3387 6.14296 14.2513 7.50183 15.6102C8.22455 16.3329 8.89392 16.5561 9.42174 16.565C9.82986 16.5719 10.1826 16.4514 10.4439 16.2914ZM11.6331 11.9657C13.1571 9.32619 15.8906 8.45757 17.3147 8.31802C17.9058 9.62105 18.5204 12.4227 16.9964 15.0622C16.1787 16.4785 15.2233 17.031 14.4028 17.1961C13.983 17.2806 13.5823 17.2669 13.2328 17.2011L15.9393 12.2393C16.0715 11.9969 15.9822 11.6932 15.7397 11.561C15.4973 11.4287 15.1936 11.5181 15.0614 11.7605L13.6458 14.3558L13.4745 13.8419C13.3872 13.5799 13.104 13.4383 12.842 13.5257C12.58 13.613 12.4385 13.8962 12.5258 14.1581L12.9915 15.5552L12.288 16.8449C11.8686 16.5783 11.3405 16.0459 11.0819 15.2788C10.8146 14.4857 10.8154 13.382 11.6331 11.9657Z" fill="#47495F"/>
                </svg>
                <p class="md:ml-2 md:mr-2 text-sm text-gray-700 sm:text-sm dark:text-gray-700">© 2023 Movimiento Semilla</p>
                <p class="md:ml-2 md:mr-2 text-sm text-gray-700 sm:text-sm font-bold dark:text-gray-700">Sistema de Gestión de Fiscales Semilla</p>
            </div>  
        </div>

    </div><!--end of background-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            const name_usr = $('#name').val();
            const first_name = name_usr.split(" ")[0];

            $('#saludo').html("¡Hola "+first_name+"!");
        });
    </script>


</x-app-layout>
