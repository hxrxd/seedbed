<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="py-8 md:p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form>
                @csrf          

                <!-- Title -->
                <div class="flex flex-col md:flex-row px-4 md:px-0 items-center justify-start mb-4">
                    <div class="flex flex-row mr-auto items-center justify-start">
                        <a href="{{url('/dashboard')}}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                            </svg>
                        </a>
                        <h1 class="font-extrabold text-3xl text-gray-800 leading-tight">
                            {{ __('Información') }}
                        </h1>
                    </div>
                </div>

                
                <!--Info-->
                <section class="bg-white mt-8 mb-4">
                    <div class="max-w-screen-xl px-8 pb-8 mx-auto lg:pb-24 lg:px-6 ">
                    <span class="text-xl px-2 py-1 text-indigo-800 rounded-sm font-extrabold bg-primary">Fiscal Semilla</span>
                    <div class="mt-2 mx-auto">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
                            <h3 id="accordion-flush-heading-1">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                                    <span>¿Qué es una Junta Receptora de Votos (JRV)?</span>
                                    <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                <div class="py-5 border-b border-gray-200">
                                    <p class="mb-2 text-gray-700">La Junta Receptora de Votos es un órgano electoral temporal encargado de recibir los votos de la ciudadanía durante las elecciones, así como de realizar el cómputo y escrutinio de estos. Está compuesta por un vocal, presidente, secretario y vocal.</p>
                                </div>
                            </div>
                            <h3 id="accordion-flush-heading-2">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                                    <span>¿Qué es un fiscal de una Junta Receptora de Votos (JRV)?</span>
                                    <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-3">
                            <div class="py-5 border-b border-gray-200">
                                <p class="mb-2 text-gray-700">Un Fiscal de JRV es una persona designada por un partido político o comité cívico electoral para vigilar las actividades de una o varias Juntas Receptoras de Votos y está debidamente acreditada.</p>
                                </div>
                            </div>
                            <h3 id="accordion-flush-heading-3">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                    <span>¿Cómo se acredita un Fiscal de JRV?</span>
                                    <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                                <div class="py-5 border-b border-gray-200">
                                    <ul class="pl-5 text-gray-700 list-disc">
                                        <li>La designación debe presentarse en original y copia al presidente de la Junta Receptora de Votos.</li>
                                        <li>Inicia la acreditación el número de mesa con el número más bajo.</li>
                                        <li>El presidente traslada la designación al secretario para su registro, anotando en el reverso de la copia el nombre del fiscal y la organización política que lo designa.</li>
                                        <li>El original se entrega al acreditado y también la copia razonada.</li>
                                        <li>Si se está asignado a más de una mesa deberá repetir el procedimiento en las mesas asignadas.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <!-- Guide -->
                <section class="bg-white mt-6 mb-8">
                    <div class="max-w-screen-xl px-8 pb-8 mx-auto lg:pb-24 lg:px-6 ">
                    <span class="text-xl px-2 py-1 text-indigo-800 rounded-sm font-extrabold bg-primary">Recomendaciones y funciones</span>
                    <div class="mt-2 mx-auto">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
                            <h3 id="accordion-flush-heading-4">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                                <span>Antes del proceso</span>
                                <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                                <div class="py-5 border-b border-gray-200">
                                    <ul class="pl-5 text-gray-700 list-disc">
                                        <li>Llevar ropa cómoda, incluyendo suéter y tenis.</li>
                                        <li>Llevar una silla plástica o plegable (en dollar city y algunas tiendas de variedades pueden encontrar algunas muy cómodas).</li>
                                        <li>Llevar lapicero para hacer anotaciones.</li>
                                        <li>Llevar cargador de teléfono (si tiene una batería para celular es sugerido que la lleve).</li>
                                        <li><strong class="text-indigo-800">Llegar al centro de votación a las 5:45 am</strong>, para estar al momento en que abren y preparan los materiales para la elección (papeletas).</li>
                                        <li>Verifica en el listado e intenta ubicar a los otros fiscales de Semilla asignados al centro.</li>
                                        <li>Estar presente en la apertura de las cajas electorales de una de las juntas receptoras de votos asignada.</li>
                                        <li>Verificar el conteo de apertura de las boletas en la junta receptora de votos asignada.</li>
                                    </ul>
                                </div>
                            </div>
                            <h3 id="accordion-flush-heading-5">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                                <span>Durante el proceso</span>
                                <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                                <div class="py-5 border-b border-gray-200">
                                    <ul class="pl-5 text-gray-700 list-disc">
                                        <li>Ingerir alimentos cuando creas conveniente.</li>
                                        <li>Toma descansos regulares pudiendo salir del centro de votación para efecto.</li>
                                        <li>Puedes usar tu teléfono pero no tomar fotografías a los votantes, debido a que puede malinterpretarse.</li>
                                        <li>Verificar la normalidad del proceso y cualquier anomalía detectada hacerla de conocimiento de la junta receptora.</li>
                                        <li>En caso de dudas consultar en el grupo de WhatsApp asignado por zona.</li>
                                        <li>Los fiscales están facultados para impugnar verbalmente un votante en el caso que no se identificara adecuadamente con su DPI <strong class="text-indigo-800">(según las disposiciones del Congreso y del TSE es posible votar con DPI vencido).</strong></li>
                                        <li><strong class="text-indigo-800">No salgas del centro después de las 16:00 horas.</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <h3 id="accordion-flush-heading-6">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                                <span>Al finalizar el proceso</span>
                                <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
                                <div class="py-5 border-b border-gray-200">
                                    <ul class="pl-5 text-gray-700 list-disc">
                                        <li>Al momento del cierre de las urnas y empezar el conteo de votos, quedarse en una sola mesa, puede ser en la que veas más afluencia o en la que tu intuición te diga que es necesario observar porque algo está sucediendo.</li>
                                        <li><strong class="text-indigo-800">Verificar el conteo de los votos.</strong></li>
                                        <li>Impugnar los votos durante el escrutinio que, correspondiendo a Movimiento Semilla, fueran declarados nulos o asignados a otra organización política .</li>
                                        <li>La impugnación se realiza por escrito mediante el formulario que te proporcionará el secretario de la JRV.</li>
                                        <li><strong class="text-indigo-800">Vigilar que la Junta Receptora de Votos anule la papelería electoral no utilizada con el sello "NO USADA".</strong></li>
                                        <li>Posteriormente una vez terminado el conteo en la mesa recorrer todas las mesas asignadas solicitando una <strong class="text-indigo-800">copia de las actas</strong> (si impugnaste también copia del acta).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <!-- Reminders -->
                <section class="bg-white mt-6 mb-8">
                    <div class="max-w-screen-xl px-8 pb-8 mx-auto lg:pb-24 lg:px-6 ">
                    <span class="text-xl px-2 py-1 text-indigo-800 rounded-sm font-extrabold bg-primary">El día de las elecciones</span>
                    <div class="mt-2 mx-auto">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
                            <h3 id="accordion-flush-heading-7">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">
                                <span>Recordatorios</span>
                                <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">
                                <div class="py-5 border-b border-gray-200">
                                    <ul class="pl-5 text-gray-700 list-disc">
                                        <li>Las urnas se abrirán a las <strong class="text-indigo-800">7:00 am.</strong></li>
                                        <li><strong class="text-indigo-800">Es importante llevar DPI, acreditación original y copia.</strong></li>
                                        <li>No portar ningún logo o insignia de Movimiento Semilla.</li>
                                        <li>Puedes emitir tu voto en cualquier momento, preferiblemente cuando no haya muchas personas en la fila.</li>
                                        <li>El formulario de impugnación debe ser llenado en el momento en que se realiza la impugnación.</li>
                                        <li>Después reportar los datos puedes retirarte a casa.</li>
                                    </ul>
                                </div>
                            </div>
                            <h3 id="accordion-flush-heading-8">
                                <button type="button" class="flex items-center justify-between w-full py-5 font-extrabold text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">
                                <span>Recomendaciones de seguridad</span>
                                <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h3>
                            <div id="accordion-flush-body-8" class="hidden" aria-labelledby="accordion-flush-heading-8">
                                <div class="py-5 border-b border-gray-200">
                                    <p class="px-2 py-1">Existe poca probabilidad de incidentes o cualquier situación de desorden y descontrol, sin embargo, en caso de suceder, recomendamos ponerse a salvo e informar de inmediato.</p>
                                    <ul class="pl-5 text-gray-700 list-disc">
                                        <li>Estar atento ante cualquier riesgo.</strong></li>
                                        <li>Ubicar a policías asignados al Centro de Votación.</li>
                                        <li>Mantenerse dentro del perímetro del Centro de Votación.</li>
                                        <li>No caer en provocación y evitar agresiones físicas o verbales con fiscales de otros partidos o personal del TSE.</li>
                                        <li>Únicamente si es posible, documentar con sus teléfonos.</li>
                                        <li>Procura que alguien vaya a dejarte y vaya por ti después del conteo de votos.</li>
                                        <li>Si llevas vehículo, procurar parquear en un lugar cercano al centro de votación.</li>
                                        <li>No llevar accesorios de valor.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>


                <div class="max-w-screen-xl px-8 pb-8 mx-auto lg:pb-24 lg:px-6">
                    <div class="flex flex-col p-8 mr-auto items-center rounded-lg bg-[#f7fdcf]">
                        <svg class="mb-4 w-6 h-6 text-[#d6df23] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z"/>
                        </svg>
                        <p class="text-center"><strong class="text-indigo-800">Movimiento Semilla</strong> agradece tu valiosa contribución a defender el voto y la democracia de manera voluntaria. Esto solo es posible porque estamos trabajando juntos.</p>  
                    </div>
                </div>
            </form>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->
</x-app-layout>
