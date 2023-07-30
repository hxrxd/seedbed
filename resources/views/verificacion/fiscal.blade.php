    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config('app.name', 'Movimiento Semilla') }}</title>

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <!-- Datatable -->
            <!--Regular Datatables CSS-->
            <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
            <!--Responsive Extension Datatables CSS-->
            <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

            <style type="text/css">
                body{
                    /*background-image: url('https://source.unsplash.com/XGHG4EmuPWE');*/

                    background-image: url({{url('assets/img/wall.png')}} );

                    background-position: center center;

                    /* Background image doesn't tile */
                    background-repeat: no-repeat;

                    /* Background image is fixed in the viewport so that it doesn't move when
                    the content's height is greater than the image's height */
                    background-attachment: fixed;

                    /* This is what makes the background image rescale based
                    on the container's size */
                    background-size: cover;

                    /* Set a background color that will be displayed
                    while the background image is loading */
                    background-color: #464646;
                }
            </style>



    </head>
    <body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
        style="">



        <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

            <!--Main Col-->
            <div id="profile"
                class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">


                <div class="p-4 md:p-12 text-center lg:text-left">
                    <!-- Image for mobile view-->
                    <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                        style="background-image:  url({{url('assets/img/logo.png')}} ); box-shadow:none;"></div>

                    <h1 class="text-3xl font-bold pt-8 lg:pt-0" style="color:#652C90">Fiscal Autorizado</h1>
                    <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25" style="border-color:#D7DF28"></div>
                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                         Nombre: {{ mb_strtoupper($fiscal->nombres); }} {{ mb_strtoupper($fiscal->apellidos) }}
                    </p>
                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                         DPI: {{ $fiscal->dpi }}
                    </p>

                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                         Centro de Votación: {{ $mesas->first()->nombre }}
                    </p>

                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                         Mesas: {{ $mesas->first()->jrv }}
                         @foreach ($mesas->slice(1) as $mesa )
                         , {{ $mesa->jrv }}
                         @endforeach
                    </p>
                    </br>
                    @auth
                    <div class="pt-12 pb-8">
                        <a href="{{ url('dashboard') }}">
                            <button class="text-indigo-800 bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg mr-2 font-extrabold text-md px-2 py-1.5 text-center">
				         Regresar
				            </button>
                        </a>
                    </div>
                    @endauth

                    <p class="pt-8 text-xs">Un Fiscal de JRV es la persona designada por un partido político o comité cívico electoral para vigilar las actividades de una o varias Juntas Receptoras de Votos y está debidamente acreditada.</p>

                </div>

            </div>

            <!--Img Col-->
            <div class="w-full lg:w-2/5">
                <!-- Big profile image for side bar (desktop) -->
                {{-- <img src="https://source.unsplash.com/MP0IUfwrn0A" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block"> --}}
                {{ HTML::image('assets/img/card.png', 'alt text', array('class' => 'rounded-none lg:rounded-lg shadow-2xl hidden lg:block')) }}
                <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->

            </div>




        </div>

        <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@4"></script>
        <script>
            //Init tooltips
            tippy('.link',{
              placement: 'bottom'
            })

            //Toggle mode
            const toggle = document.querySelector('.js-change-theme');
            const body = document.querySelector('body');
            const profile = document.getElementById('profile');


            toggle.addEventListener('click', () => {

              if (body.classList.contains('text-gray-900')) {
                toggle.innerHTML = "☀️";
                body.classList.remove('text-gray-900');
                body.classList.add('text-gray-100');
                profile.classList.remove('bg-white');
                profile.classList.add('bg-gray-900');
              } else
              {
                toggle.innerHTML = "🌙";
                body.classList.remove('text-gray-100');
                body.classList.add('text-gray-900');
                profile.classList.remove('bg-gray-900');
                profile.classList.add('bg-white');

              }
            });

        </script>

    </body>
    </html>
