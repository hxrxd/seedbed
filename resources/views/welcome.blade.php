<!DOCTYPE html>
<html lang="en" class="astro-FLTEP2YP">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <meta name="generator" content="Astro v1.1.5">
        <meta name="description" content="Template built with tailwindcss using Tailus blocks v2">
        <title>Fiscales Movimiento Semilla</title>

        <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/index.350e2433.css" />
        <style>
          .custom-background-footer {
                width: auto;
                height: auto;
                background-image: url('assets/img/bg-footer.svg');
                background-repeat: no-repeat;
                background-size: cover;
            }
          </style>
      </head>
    <body class="bg-white dark:bg-gray-900 astro-FLTEP2YP">
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
                    
                    <div class="relative flex items-center lg:hidden max-h-10 astro-UY3JLCBK">
                        <label role="button" for="toggle_nav" aria-label="humburger" id="hamburger" class="relative  p-6 -mr-6 astro-UY3JLCBK">
                            <div aria-hidden="true" id="line" class="m-auto h-0.5 w-5 rounded bg-sky-900 dark:bg-gray-300 transition duration-300 astro-UY3JLCBK"></div>
                            <div aria-hidden="true" id="line2" class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 dark:bg-gray-300 transition duration-300 astro-UY3JLCBK"></div>
                        </label>
                    </div>
                </div>
                <div aria-hidden="true" class="fixed z-10 inset-0 h-screen w-screen bg-white/70 backdrop-blur-2xl origin-bottom scale-y-0 transition duration-500 peer-checked:origin-top peer-checked:scale-y-100 lg:hidden dark:bg-gray-900/70 astro-UY3JLCBK"></div>
                <div class="flex-col z-20 flex-wrap gap-6 p-8 rounded-3xl border border-gray-100 bg-white shadow-2xl shadow-gray-600/10 justify-end w-full invisible opacity-0 translate-y-1  absolute top-full left-0 transition-all duration-300 scale-95 origin-top 
                            lg:relative lg:scale-100 lg:peer-checked:translate-y-0 lg:translate-y-0 lg:flex lg:flex-row lg:items-center lg:gap-0 lg:p-0 lg:bg-transparent lg:w-7/12 lg:visible lg:opacity-100 lg:border-none
                            peer-checked:scale-100 peer-checked:opacity-100 peer-checked:visible lg:shadow-none 
                            dark:shadow-none dark:bg-gray-800 dark:border-gray-700 astro-UY3JLCBK">

                    @if (Route::has('login'))
                    
                        @auth
                            
                            <div class="mt-12 lg:mt-0 astro-UY3JLCBK">
                                <a href="{{ url('/dashboard') }}" class="relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max astro-UY3JLCBK">
                                    <span class="relative text-sm font-semibold text-white astro-UY3JLCBK">Inicio</span>
                                </a>
                            </div>
                        @else
                            
                            <div class="text-gray-600 dark:text-gray-300 lg:pr-4 lg:w-auto w-full lg:pt-0 astro-UY3JLCBK">
                                <ul class="tracking-wide font-medium lg:text-sm flex-col flex lg:flex-row gap-6 lg:gap-0 astro-UY3JLCBK">
                                    <li class="astro-UY3JLCBK">
                                        <a href="{{ route('login') }}" class="block md:px-4 transition hover:text-primary astro-UY3JLCBK">
                                            <span class="astro-UY3JLCBK">Iniciar Sesión</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            @if (Route::has('register'))
                                
                            <div class="mt-12 lg:mt-0 astro-UY3JLCBK">
                                <a href="{{ route('register') }}" style="border-radius: 0.375rem; background-color:#5a2ca0;" class="relative flex h-9 w-full items-center justify-center px-4  before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max astro-UY3JLCBK">
                                    <span class="relative text-sm font-semibold text-white astro-UY3JLCBK">Registrarme</span>
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
        <main class="space-y-40 mb-40">
        <div class="relative ">
    <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20 ">
        <div class="blur-[106px] h-56 bg-gradient-to-br from-primary to-indigo-700 dark:from-blue-700"></div>
        <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-indigo-900 dark:to-indigo-600"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    <div class="relative pt-36 ml-auto">
            <div class="lg:w-2/3 text-center mx-auto">
                <h1 class="text-teal-900 dark:text-white font-bold text-5xl md:text-6xl xl:text-7xl" style="color:#37abc8">Sistema de Gestión de <span class="text-primary dark:text-white" style="color:#5a2ca0">Fiscales Semilla</span></h1>
                <p class="mt-8 text-gray-700 dark:text-gray-300">Registrate para iniciar tu travesía como fiscal. Selecciona tu Junta Receptora de Votos (JRV) y obtén tu acreditación digital.</p>
                <div class="mt-16 mb-8 flex flex-wrap justify-center gap-y-4 gap-x-6">
                    <a href="#" style="border-radius: 0.375rem; background-color:#5a2ca0;" class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full  hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max" >
                      <span class="relative text-base font-semibold text-white">Registrarme</span>
                    </a>

                    
                </div>
                <a href="{{ route('login') }}" class="block md:px-4 transition hover:text-primary astro-UY3JLCBK">
                                            <span class="astro-UY3JLCBK">¿Ya tienes una cuenta? <strong>Iniciar Sesión</strong></span>
                                        </a>

                <p class="text-gray-300 dark:text-gray-300" style="margin-top:64px; font-weight: 700; color:#d0d0d0">#SoyFiscalSemilla</p>
                
                
            </div>
            
        </div>
</div>
</div>
        <div>
  
</div>
        
</div>
</div>
        
</div>  
</div>




    </main>
<!--Footer container-->
<footer class="text-center text-black dark:bg-neutral-600" style="width: 100%; justify-items: center;text-align:center; margin:auto; align-items: center; position:fixed; bottom:0px;">
  <div class="container pt-9" style="margin-bottom:0px; color:#5a2ca0;">
    <div class="mb-9 flex justify-center">
      <a href="#!" class="mr-9 text-neutral-800 dark:text-neutral-200" style="margin-right:16px">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-4 w-4"
          fill="currentColor"
          viewBox="0 0 24 24">
          <path
            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
        </svg>
      </a>
      <a href="#!" class="mr-9 text-neutral-800 dark:text-neutral-200" style="margin-right:16px">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-4 w-4"
          fill="currentColor"
          viewBox="0 0 24 24">
          <path
            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
        </svg>
      </a>
      
      <a href="#!" class="mr-9 text-neutral-800 dark:text-neutral-200">
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
    class="bg-neutral-300 p-4 text-center text-neutral-700 dark:bg-neutral-700 dark:text-neutral-200" style="margin-bottom:24px; color:#5a2ca0;">
    ©2023 
    <a
      class="text-neutral-800 dark:text-neutral-400"
      href="https://votadiferente.com/" 
      >Movimiento Semilla</a
    >
  </div>
</footer>

        <!--<footer class="py-20 md:py-40">
    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    <div class="m-auto md:w-10/12 lg:w-8/12 xl:w-6/12">
        <div class="flex flex-wrap items-center justify-between md:flex-nowrap">
          <div class="flex w-full justify-center space-x-12 text-gray-600 dark:text-gray-300 sm:w-7/12 md:justify-start">
            <ul class="list-inside list-disc space-y-8">
              <li><a href="#" class="transition hover:text-primary">Home</a></li>
  
              <li><a href="#" class="transition hover:text-primary">About</a></li>
              <li><a href="#" class="transition hover:text-primary">Guide</a></li>
              <li><a href="#" class="transition hover:text-primary">Blocks</a></li>
              <li><a href="#" class="transition hover:text-primary">Contact</a></li>
              <li><a href="#" class="transition hover:text-primary">Terms of Use</a></li>
            </ul>
  
            <ul role="list" class="space-y-8">
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                  </svg>
                  <span>Github</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                  </svg>
                  <span>Twitter</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"></path>
                  </svg>
                  <span>YouTube</span>
                </a>
              </li>
  
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                  </svg>
                  <span>Facebook</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                    <path d="M9.025 8c0 2.485-2.02 4.5-4.513 4.5A4.506 4.506 0 0 1 0 8c0-2.486 2.02-4.5 4.512-4.5A4.506 4.506 0 0 1 9.025 8zm4.95 0c0 2.34-1.01 4.236-2.256 4.236-1.246 0-2.256-1.897-2.256-4.236 0-2.34 1.01-4.236 2.256-4.236 1.246 0 2.256 1.897 2.256 4.236zM16 8c0 2.096-.355 3.795-.794 3.795-.438 0-.793-1.7-.793-3.795 0-2.096.355-3.795.794-3.795.438 0 .793 1.699.793 3.795z"></path>
                  </svg>
                  <span>Medium</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="5" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"></path>
                  </svg>
                  <span>Pintrest</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <img class="h-5 w-5" width="32" height="32" src="https://c5.patreon.com/external/favicon/favicon.ico?v=69kMELnXkB" alt="patreon icon">
                  <span>Patreon</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 transition hover:text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                  </svg>
                  <span>Instagram</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="m-auto mt-16 w-10/12 space-y-6 text-center sm:mt-auto sm:w-5/12 sm:text-left">
            <span class="block text-gray-500 dark:text-gray-400">We change the way UI components librairies are used</span>
  
            <span class="block text-gray-500 dark:text-gray-400">Tailus Blocks &copy; <span id="year"></span></span>
  
            <span class="flex justify-between text-gray-600 dark:text-white">
              <a href="#" class="font-medium">Terms of Use </a>
              <a href="#" class="font-medium"> Privacy Policy</a>
            </span>
  
            <span class="block text-gray-500 dark:text-gray-400">Need help? <a href="#" class="font-semibold text-gray-600 dark:text-white"> Contact Us</a></span>
          </div>
        </div>
      </div>
</div>
</footer>-->
    </body></html>