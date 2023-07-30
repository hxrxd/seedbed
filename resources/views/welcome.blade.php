<!DOCTYPE html>
<html lang="en" class="astro-FLTEP2YP">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width">
      <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
      <meta name="generator" content="Astro v1.1.5">
      <meta name="description" content="Template built with tailwindcss using Tailus blocks v2">
      <title>SoyFiscalSemilla</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="assets/index.350e2431.css" />
      <style>
         .container-semilla {
            position: relative;
            width: 120px;
            height: 60px;
            background-image: url('assets/img/plant-emoji.svg');
            background-size: cover;
            background-position: center;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
         }

         .scroll-button {
            cursor: pointer;
         }
      </style>
   </head>
   <body class="bg-white astro-FLTEP2YP">
      <header class="astro-UY3JLCBK">
         <nav class="z-10 w-full absolute astro-UY3JLCBK">
            <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
               <div class="flex flex-wrap items-center justify-between py-2 gap-6 md:py-4 md:gap-0 relative astro-UY3JLCBK">
                  <input aria-hidden="true" type="checkbox" name="toggle_nav" id="toggle_nav" class="hidden peer astro-UY3JLCBK">
                  <div class="relative z-20 w-full flex justify-between lg:w-max md:px-0 astro-UY3JLCBK">
                     <div class="shrink-0 flex items-center">
                        <a href="#">
                           <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                     </div>
                     <div class="relative flex items-center lg:hidden  max-h-10 justify-end w-full astro-UY3JLCBK">
                        <label role="button" for="toggle_nav" aria-label="humburger" id="hamburger" class="relative  p-6 -mr-6 astro-UY3JLCBK">
                           <div aria-hidden="true" id="line" class="m-auto h-0.5 w-5 rounded bg-gray-900 transition duration-300 astro-UY3JLCBK"></div>
                           <div aria-hidden="true" id="line2" class="m-auto mt-2 h-0.5 w-5 rounded bg-gray-900 transition duration-300 astro-UY3JLCBK"></div>
                        </label>
                     </div>
                  </div>
                  <div aria-hidden="true" class="fixed z-10 inset-0 h-screen w-screen bg-white/70 backdrop-blur-2xl origin-bottom scale-y-0 transition duration-500 peer-checked:origin-top peer-checked:scale-y-100 lg:hidden astro-UY3JLCBK"></div>
                  <div class="flex-col z-20 flex-wrap gap-6 p-8 rounded-3xl border border-gray-100 bg-white shadow-2xl shadow-gray-600/10 justify-end w-full invisible opacity-0 translate-y-1  absolute top-full left-0 transition-all duration-300 scale-95 origin-top
                     lg:relative lg:scale-100 lg:peer-checked:translate-y-0 lg:translate-y-0 lg:flex lg:flex-row lg:items-center lg:gap-0 lg:p-0 lg:bg-transparent lg:w-7/12 lg:visible lg:opacity-100 lg:border-none
                     peer-checked:scale-100 peer-checked:opacity-100 peer-checked:visible lg:shadow-none
                     astro-UY3JLCBK">
                     @if (Route::has('login'))
                     @auth
                     <div class="mt-12 lg:mt-0 astro-UY3JLCBK">
                        <a href="{{ url('/dashboard') }}" class="relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max astro-UY3JLCBK">
                        <span class="relative text-sm font-semibold text-white astro-UY3JLCBK">Inicio</span>
                        </a>
                     </div>
                     @else
                     <div class="text-gray-600 lg:pr-4 lg:w-auto w-full lg:pt-0 astro-UY3JLCBK">
                        <ul class="tracking-wide font-medium lg:text-sm flex-col flex lg:flex-row gap-6 lg:gap-0 astro-UY3JLCBK">
                           <li class="astro-UY3JLCBK">
                              <a href="{{ route('login') }}" class="block md:px-4 text-primary hover:text-primary transition astro-UY3JLCBK">
                              <span class="astro-UY3JLCBK">Iniciar Sesión</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                     @if (Route::has('register'))
                     <div class="mt-12 lg:mt-0 astro-UY3JLCBK">
                        <a href="{{ route('register') }}" class="relative flex h-10 w-full items-center justify-center bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg text-sm px-4 py-1.5 text-center sm:w-max astro-UY3JLCBK">
                        <span class="relative text-base font-medium text-primary astro-UY3JLCBK">Registrarme</span>
                        </a>
                     </div>
                     @endif
                     @endauth
                     @endif
                  </div>
               </div>
            </div>
         </nav>
      </header>
      <main class="space-y-40 mb-6 mt-48">
         <div class="relative ">
            <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40">
               <div class="blur-[106px] h-56 bg-gradient-to-br from-primary to-indigo-700"></div>
               <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-indigo-900"></div>
            </div>
            <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
               <div class="relative pt-48 sm:pt-36 ml-auto">
                  <div class="lg:w-2/3 text-center mx-auto">
                     <div class="mx-auto container-semilla">
                        <!--<p class="text-secondary font-extrabold text-2xl md:text-3xl xl:text-5xl">#SOY</p>-->
                     </div>
                     <h1 class="text-indigo-800 font-black text-7xl md:text-5xl xl:text-9xl">FISCAL SEMILLA</h1>
                     <p class="mt-2 text-gray-500">Sistema de Gestión de Fiscales Semilla</p>
                     @if (Route::has('login'))
                     @auth
                     <div class="mt-16 mb-8 flex flex-wrap justify-center gap-y-4 gap-x-6">
                        <a href="{{ url('/dashboard') }}" style="border-radius: 0.375rem; background-color:#5a2ca0;" class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full  hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max" >
                        <span class="relative text-base font-semibold text-white">Inicio</span>
                        </a>
                     </div>
                     @else
                     @if (Route::has('register'))
                     <div class="mt-16 mb-8 flex flex-wrap justify-center gap-y-4 gap-x-6">
                        <a href="{{ route('register') }}" class="relative flex h-12 w-full items-center justify-center bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg text-sm px-6 py-1.5 text-center sm:w-max">
                        <span class="relative text-2xl font-bold text-primary">Registrarme</span>
                        </a>
                        <a onclick="scrollToSection('section-s1')" class="scroll-button relative flex h-12 w-full items-center justify-center bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg text-sm px-6 py-1.5 text-center sm:w-max">
                        <span class="relative text-2xl font-bold text-primary">Conocer más</span>
                        </a>
                     </div>
                     <span class="text-base text-gray-600">¿Ya tienes una cuenta?</span>
                     <a href="{{ route('login') }}" class="block px-4  w-full items-center justify-center rounded-lg text-sm px-4 py-1.5 text-center astro-UY3JLCBK">
                     <span class="text-lg text-primary hover:text-primary font-semibold">Iniciar Sesión</span></a>
                     @endif
                     @endauth
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <!-- ADS -->
         <section id="section-s1" class="pt-20">
            <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
               <div class="max-w-screen-md mx-auto">
               <h2 class="mb-6 text-4xl md:text-4xl font-extrabold tracking-tight text-center text-secondary lg:mb-8 lg:text-3xl">Proceso Fiscal Semilla</h2>
               <div class="grid md:grid-cols-3 gap-8 sm:grid-cols-1 ">
                    <div class="h-64 p-10 md:p-8 rounded-lg text-center">
                        <div class="flex flex-col items-center">
                            <div class="flex flex-row items-center justify-start mt-4">
                            <svg class="w-32 h-32 text-third" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            </div>
                            <h2 class="text-primary mt-4 mb-2">1. Registro</h2>
                            <p class="text-sm text-gray-500">Accede al registro oficial para fiscales Semilla a través de la plataforma.</p>
                        </div>
                    </div>
                    <div class="h-64 p-10 md:p-8 rounded-lg text-center">
                        <div class="flex flex-col items-center">
                            <div class="flex flex-row items-center justify-start mt-4">
                            <svg class="w-32 h-32 text-third" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 1v3m5-3v3m5-3v3M1 7h18M5 11h10M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/>
                            </svg>
                            </div>
                            <h2 class="text-primary mt-4 mb-2">2. Capacitación</h2>
                            <p class="text-sm text-gray-500">Recibe sesiones de inducción virtuales o presenciales.</p>
                        </div>
                    </div>
                    <div class="h-64 p-10 md:p-8 rounded-lg text-center">
                        <div class="flex flex-col items-center">
                            <div class="flex flex-row items-center justify-start mt-4">
                            <svg class="w-32 h-32 text-third" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/>
                            </svg>
                            </div>
                            <h2 class="text-primary mt-4 mb-2">3. Acreditación</h2>
                            <p class="text-sm text-gray-500">Obtén tus documentos oficiales ante las Junta Receptora de Votos</p>
                        </div>
                    </div>
                </div>
               </div>
            </div>
         </section>
         <!--FAQ-->
         <section class="bg-white mb-8">
            <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
               <h2 class="mb-6 text-4xl md:text-4xl font-extrabold tracking-tight text-center text-secondary lg:mb-8 lg:text-3xl">Preguntas frecuentes</h2>
               <div class="max-w-screen-md mx-auto">
                  <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
                     <h3 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                           <span>¿Por qué debo crear una cuenta?</span>
                           <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </h3>
                     <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200">
                           <p class="mb-2 text-gray-500">Una cuenta es necesaria para gestionar tu información personal, como por ejemplo, tu registro verificado de fiscal. Además, dentro de la plataforma podrás generar documentos válidos ante las Juntas Receptoras de Votos (JRV).</p>
                        </div>
                     </div>
                     <h3 id="accordion-flush-heading-2">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                           <span>¿Cómo me registro en la plataforma?</span>
                           <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </h3>
                     <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200">
                           <ol class="pl-5 text-gray-500 list-disc">
                              <li>Haz clic en <a href="{{ route('register') }}" class="text-primary underline hover:underline">Registrarme</a></li>
                              <li>Ingresa tu nombre, correo electrónico (recomendamos que sea un correo personal; evita utilizar correos institucionales o de iCloud), elige una contraseña y haz clic en el botón para confirmar. Un enlace será enviado al correo registrado, esto puede tardar unos minutos.</li>
                              <li>Revisa tu bandeja de correos y haz clic en el botón que aparece en el mensaje. En ese momento tu cuenta será activada y te redirigirá a la pantalla de inicio de sesión. Si no ves el mensaje en tu bandeja de entrada, revisa la bandeja de SPAM.</li>
                              <li>En la pantalla de inicio de sesión, ingresa tu correo y contraseña registrados. Hecho esto, estarás dentro de la plataforma.</li>
                           </ol>
                        </div>
                     </div>
                     <h3 id="accordion-flush-heading-3">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                           <span>¿Cómo me registro como fiscal?</span>
                           <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </h3>
                     <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200">
                           <p class="mb-2 text-gray-500">El registro como fiscal consta de 2 pasos: registro de datos personales y asignación de Junta Receptora de Votos (JRV). El registro es guiado, esto significa que solo se te mostrarán los campos que debes completar en cada paso. Para registrarte como fiscal:</p>
                           <ul class="pl-5 text-gray-500 list-disc">
                              <li>Dentro de la plataforma, selecciona el botón <strong>Registrarme como fiscal</strong></li>
                              <li>Ingresa tus datos personales según te indique el mismo formulario.</li>
                              <li>Elije una Junta Receptora de Votos (JRV). En el caso que la JRV en donde votas no está disponible, puedes elegir otra del mismo centro. Si todas las mesas de tu centro no están están disponibles, puedes elegir una de tu mismo municipio. Si tu municipio estuviera lleno, envíanos un mensaje al correo @html_mailto(preguntas@fiscalsemilla.com) </li>
                              <li>Al llegar al acuerdo de registro, es importante que lo leas para que conozcas tu compromiso como fiscal.</li>
                              <li>Cuando hayas leído el acuerdo, marca la casilla de verificación.</li>
                              <li>Haz clic en <strong>Finalizar</strong> y estarás registrado como fiscal en la JRV que seleccionaste</li>
                           </ul>
                        </div>
                     </div>
                     <h3 id="accordion-flush-heading-4">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                           <span>¿Qué es un ID Virtual?</span>
                           <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </h3>
                     <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 border-b border-gray-200">
                           <p class="mb-2 text-gray-500">Un ID Virtual es una tarjeta virtual que te presenta como fiscal verificado. Puedes verla en la opción <strong>ID Virtual</strong> que aparece en el primer cuadro de tu tablero personal. Este ID Virtual también es accesible desde un código QR en el documento físico de acreditación que presentarás ante la Junta Receptora de Votos (JRV).</p>
                        </div>
                     </div>
                     <h3 id="accordion-flush-heading-5">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                           <span>¿Cómo puedo obtener mi acreditación?</span>
                           <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </h3>
                     <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                        <div class="py-5 border-b border-gray-200">
                           <p class="mb-2 text-gray-500">Puedes descargarla desde el apartado de Acreditación en tu tablero personal. Este documento estará disponible siempre y cuando hayas completado una capacitación (virtual o presencial) en fechas específicas. Este proceso puede variar dependiendo del municipio o departamento en el que te localices </p>
                        </div>
                     </div>
                     <h3 id="accordion-flush-heading-6">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                           <span>¿Que pasará con mi información después de las elecciones?</span>
                           <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </h3>
                     <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
                        <div class="py-5 border-b border-gray-200">
                           <p class="mb-2 text-gray-500">Después de completar el proceso de elecciones, nuestro sistema se preparará para una etapa posterior. Durante esta fase, se habilitará una opción especial que permitirá a los usuarios eliminar sus cuentas y los datos personales registrados en nuestra plataforma.</p>
                        </div>
                     </div>
                     <h3 id="accordion-flush-heading-7">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">
                            <span>¿Mi registro representa una afiliación al Movimiento Semilla?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                     </h3>
                        <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">No, la información proporcionada al registrarte como fiscal será utilizada únicamente para reconocerte como fiscal en la segunda vuelta electoral. Tu información no se utilizará para ningún otro propósito diferente al mencionado.</p>
                        </div>
                        </div>

                     <h3 id="accordion-flush-heading-8">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">
                            <span>¿Recibiré alguna compensación económica por ser Fiscal o voluntario en el proceso?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                     </h3>
                        <div id="accordion-flush-body-8" class="hidden" aria-labelledby="accordion-flush-heading-8">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">No, la participación como Fiscal o voluntario en el proceso de segunda vuelta electoral es completamente voluntario y no conlleva ninguna compensación económica. Todos los Fiscales que colaboran en este proceso lo hacen de manera desinteresada y comprometida con el bienestar de la comunidad y la integridad del proceso electoral. Agradecemos sinceramente a aquellos que deciden dedicar su tiempo y esfuerzo para contribuir al desarrollo democrático de nuestra sociedad. Su participación es fundamental para asegurar la transparencia y legitimidad de las elecciones.</p>
                        </div>
                        </div>

                     <h3 id="accordion-flush-heading-9">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-9" aria-expanded="false" aria-controls="accordion-flush-body-9">
                            <span>¿Por qué se solicitan datos personales para postular como Fiscal Electoral?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0 accordion-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                     </h3>
                        <div id="accordion-flush-body-9" class="hidden" aria-labelledby="accordion-flush-heading-9">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">La solicitud de datos personales como el Documento Personal de Identificación -DPI- y fecha de nacimiento, junto con la confirmación del correo electrónico, tiene como objetivo garantizar la integridad y transparencia del proceso de convocatoria para Fiscales. Estas medidas adicionales de seguridad están diseñadas para prevenir cualquier intento de interferencia malintencionada o de afectar la convocatoria de Fiscales en la Segunda Vuelta.</p>
                        </div>
                        </div>
                    </div>
               </div>
            </div>
         </section>
      </main>
      <!--Footer container-->
      <footer class="text-center items-center justify-center w-full m-auto" >
         <div class="">
            <p class="text-base font-semibold text-gray-300 mb-16">#SoyFiscalSemilla</p>
            <div class="mb-0 flex items-center justify-center">
               <a href="https://www.facebook.com/msemillagt" class="mr-9 text-gray-500">
                  <svg
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                     <path
                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                  </svg>
               </a>
               <a href="https://www.twitter.com/msemillagt" class="mr-9 text-gray-500">
                  <svg
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                     <path
                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                  </svg>
               </a>
               <a href="https://www.instagram.com/msemillagt" class="text-gray-500">
                  <svg
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                     <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                  </svg>
               </a>
            </div>
         </div>
         <!--Copyright section-->
         <div
            class="p-4 mb-8 text-center text-xs font-base text-gray-500">
            ©{{ date("Y") }}
            <a
               class=""
               href="https://votadiferente.com/"
               >Movimiento Semilla</a
               >
         </div>
      </footer>
      <script>
         const accordionItems = [
           {
             id: 'accordion-flush-heading-1',
             triggerEl: document.querySelector('#accordion-flush-heading-1'),
             targetEl: document.querySelector('#accordion-flush-body-1'),
             active: true,
           },
           {
             id: 'accordion-flush-heading-2',
             triggerEl: document.querySelector('#accordion-flush-heading-2'),
             targetEl: document.querySelector('#accordion-flush-body-2'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-3',
             triggerEl: document.querySelector('#accordion-flush-heading-3'),
             targetEl: document.querySelector('#accordion-flush-body-3'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-4',
             triggerEl: document.querySelector('#accordion-flush-heading-4'),
             targetEl: document.querySelector('#accordion-flush-body-4'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-5',
             triggerEl: document.querySelector('#accordion-flush-heading-5'),
             targetEl: document.querySelector('#accordion-flush-body-5'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-6',
             triggerEl: document.querySelector('#accordion-flush-heading-6'),
             targetEl: document.querySelector('#accordion-flush-body-6'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-7',
             triggerEl: document.querySelector('#accordion-flush-heading-7'),
             targetEl: document.querySelector('#accordion-flush-body-7'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-8',
             triggerEl: document.querySelector('#accordion-flush-heading-8'),
             targetEl: document.querySelector('#accordion-flush-body-8'),
             active: false,
           },
           {
             id: 'accordion-flush-heading-9',
             triggerEl: document.querySelector('#accordion-flush-heading-9'),
             targetEl: document.querySelector('#accordion-flush-body-9'),
             active: false,
           },
         ];

         const options = {
           alwaysOpen: true,
           activeClasses: 'bg-gray-100 text-gray-900',
           inactiveClasses: 'text-gray-500',
           onOpen: (item) => {
             //console.log('accordion item has been shown');console.log(item);
           },
           onClose: (item) => {
             //console.log('accordion item has been hidden');console.log(item);
           },
           onToggle: (item) => {
             //console.log('accordion item has been toggled');console.log(item);
           },
         };

         // Function to toggle accordion items
         function toggleAccordion(item) {
           if (item.active) {
             // If item is active, close it
             item.triggerEl.setAttribute('aria-expanded', 'false');
             item.targetEl.classList.add('hidden');
             item.active = false;
             options.onClose(item);
           } else {
             // If item is inactive, open it
             item.triggerEl.setAttribute('aria-expanded', 'true');
             item.targetEl.classList.remove('hidden');
             item.active = true;
             options.onOpen(item);
           }
           options.onToggle(item);
         }

         // Add click event listeners to accordion triggers (buttons)
         accordionItems.forEach((item) => {
           item.triggerEl.addEventListener('click', () => toggleAccordion(item));
         });

         // Automatically open the first accordion item if alwaysOpen option is true
         if (options.alwaysOpen && accordionItems.length > 0) {
           toggleAccordion(accordionItems[0]);
         }

       function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }
      </script>
   </body>
</html>
