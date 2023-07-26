<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form id="frm-main" class="">
                @csrf          

                <!-- JRV selection section -->
                <h1 class="font-extrabold text-3xl text-gray-800 leading-tight mb-6">
                    {{ __('Nueva asignación de mesa') }}
                </h1>
                <p class="text-md mt-2 mb-2 text-gray-800">Presiona el botón "Buscar" para seleccionar una Junta Receptora de Votos (JRV)</p>

                <div class="md:flex md:flex-row">
                    <!-- JRV Search -->
                    <div class="md:basis-1/2 mt-4">
                        <x-input-label for="table-group" :value="__('')" />
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="hidden" id="jrv-x" class="" name="jrv-x" value="{{$jrv}}">
                            <input type="search" id="input-jrv" class="block w-full p-4 pl-10 text-base font-extrabold text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="JRV" required disabled>
                            <!--<button id="btn-availability" class="text-white absolute right-2.5 bottom-2.5 bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900" data-modal-target="jrv-select-modal" data-modal-toggle="jrv-select-modal">Ver disponibilidad</button>-->
                            <!--<button id="btn-availability-2" class="text-white absolute right-2.5 bottom-2.5 font-extrabold rounded-lg text-sm px-4 py-2 hidden" style="background-color:#84cc16;" disabled>Seleccionada</button>-->
                            <a id="btn-availability-2" class="absolute right-5 bottom-2.5 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 px-4 py-2" data-modal-target="jrv-select-modal" data-modal-toggle="jrv-select-modal" style="cursor: pointer;">Buscar</a>
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
                                <!--<span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Mesa en donde votas</span>
                                <ul id="li-jrv-01" class="my-4 space-y-3 mb-8">
                                </ul>-->
                                
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Mesas en tu centro</span>
                                <ul id="li-jrv-02" class="my-4 space-y-3 mb-8">                
                                </ul>

                                <span class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Otras mesas en tu municipio</span>
                                <ul id="li-jrv-03" class="my-4 space-y-3">
                                    <button id="btn-load-more" type="button" class="ml-4 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-4">Mostrar más mesas de tu municipio</button>                
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

                <div id="control-buttons" class="flex flex-row items-center justify-start mt-4 mb-6">
                    <button id="btn-update" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">    
                        {{ __('Reservar') }}
                    </button>
                    <button id="btn-cancel" type="button" class="ml-4 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-4">Cancelar</button>
                </div>
            </form>

        </div>
        <!--/Card-->
    </div>
    <!--/container-->
    <style>.animate{animation:expandFromTop 0.6s;animation-fill-mode:forwards}.move-button{animation:bounceButton 0.9s;animation-fill-mode:forwards}.pop-up{animation:modalPopUp 0.3s ease-out}.modal-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5)}.modal{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);padding:20px;background-color:#fff;box-shadow:0 0 10px rgba(0,0,0,0.1);border-radius:10px}.swal-button--confirm{background-color:#442178}.swal-button--confirm:hover{background-color:#8787de!important}@media (min-width:768px){.modal{width:600px;transform:translate(-50%,-50%)}}@media (max-width:767px){.modal{width:90%;transform:translate(-50%,-50%)}}@keyframes expandWithBounce{0%{height:0;opacity:0;transform-origin:top}40%{opacity:.7;height:100%;transform:scaleY(1.3)}60%{opacity:1;transform:scaleY(.7)}80%{height:100%;transform:scaleY(1.1)}90%{transform:scaleY(.9)}100%{height:100%;transform:scaleY(1)}}@keyframes expandFromTop{0%{height:0;opacity:0;transform-origin:top;transform:scaleY(0)}100%{opacity:1;height:100%;transform:scaleY(1)}}@keyframes moveButton{0%{transform:translateY(0);opacity:0}40%{opacity:1}60%{transform:translateY(calc(100% + 1px))}100%{transform:translateY(0)}}@keyframes bounceButton{0%{opacity:1;transform:scale(1)}20%{transform:scale(1.2)}40%{opacity:0;transform:scale(0)}60%{opacity:1;transform:scale(1.2)}100%{transform:scale(1)}}@keyframes modalPopUp{0%{opacity:0}100%{opacity:1}}</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        $(document).ready(function () {
            var USR_NAME = '', USR_SURNAME = '', USR_DEPT = '', USR_CITY = '', USR_MAIL = '';
            var JRV_USR = '', JRV_SELECTED = '';     
            
            enableButtonUpdate(false);

            // Save action button
            $('#btn-update').click(function (event) {
                event.preventDefault();
                
                if($('#input-jrv').val() === '') {
                    showSimpleAlert('No se ha seleccionada una JRV','Por favor, presiona el botón Buscar para seleccionar una JRV','Entendido',null);
                } else {
                    updateJRV();
                }
            });

            $('#btn-availability-2').click(function(event){
                enableButtonConfirm(false);
                loadJRVS(true);
            });

            $('#btn-confirm').click(function (event) {
                event.preventDefault();
                changeStatusToSelected();
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

            $('#btn-load-more').click(function(event){
                fetchJRVsByCity();
            });

            function loadJRVS(reload) {
                if (reload) {
                    $('#list-jrv-loading').removeClass('hidden');
                    $('#list-jrv').addClass('hidden');
                    
                    fetchJRVs();
                    
                    setTimeout(() => {
                        $('#list-jrv-loading').addClass('hidden');
                        $('#list-jrv').removeClass('hidden');
                    }, 600);
                } else {
                    $('#list-jrv-loading').removeClass('hidden');
                    $('#list-jrv').addClass('hidden');

                    setTimeout(() => {
                        $('#list-jrv-loading').addClass('hidden');
                        $('#list-jrv').removeClass('hidden');
                    }, 150);
                }
            }

            function fetchJRVs() {
                // Init value with a location ref
                JRV_USR = $('#jrv-x').val();
                // Init lists
                //$("#li-jrv-01").html('');
                $("#li-jrv-02").html('');

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
                            // Show only JRVs from the same center
                            $("#li-jrv-02").append(createListItem(jrvs_by_center.jrv, jrvs_by_center.nombre+', '+jrvs_by_center.ubicacion+', ZONA '+jrvs_by_center.zona, jrvs_by_center.estatus, false));
                            USR_CITY = jrvs_by_center.municipio;
                            JRV_USR = jrvs_by_center.jrv;
                            /*if (jrvs_by_center.jrv === parseInt(JRV_USR)) {
                                $("#li-jrv-01").append(createListItem(jrvs_by_center.jrv, jrvs_by_center.nombre+', '+jrvs_by_center.ubicacion+', ZONA '+jrvs_by_center.zona, jrvs_by_center.estatus, true));
                            } else {
                                $("#li-jrv-02").append(createListItem(jrvs_by_center.jrv, jrvs_by_center.nombre+', '+jrvs_by_center.ubicacion+', ZONA '+jrvs_by_center.zona, jrvs_by_center.estatus, false));
                            }*/                         
                        });

                        //$("#li-jrv-01").append(`<p class="inline-flex items-center text-sm font-normal text-gray-500 dark:text-gray-400"><svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>¿Qué opciones tengo si mi mesa no está disponible? Puedes elegir entre las mesas disponibles en tu mismo centro de votación o elegir alguna de tu mismo municipio.</p>`);
                        $("#li-jrv-02").append(`<p class="inline-flex items-center text-sm font-normal text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 text-gray-500 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>No hay más mesas disponibles en tu centro de votación.</p>`);                     
                        
                        //addListItemEvents('li-jrv-01');
                        addListItemEvents('li-jrv-02');

                        //fetchJRVsByCity();
                    }
                });

                
            }

            function fetchJRVsByCity(){
                $("#li-jrv-03").html('');

                $.ajax({
                    url: "{{url('api/fetch-jrvs-by-city')}}",
                    type: "POST",
                    data: {
                        jrv: JRV_USR,
                        municipio: USR_CITY,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {                      
                        $.each(result.jrvs_by_city, function (index, jrvs_by_city) {
                            $("#li-jrv-03").append(createListItem(jrvs_by_city.jrv, jrvs_by_city.nombre+', '+jrvs_by_city.ubicacion+', ZONA '+jrvs_by_city.zona, jrvs_by_city.estatus, false));                         
                        });

                        $("#li-jrv-03").append(`<p class="inline-flex items-center text-sm font-normal text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 text-gray-500 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>No hay más mesas disponibles en tu municipio.</p>`);

                        addListItemEvents('li-jrv-03');
                    }
                });
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

            function addListItemEvents(list){
                const liJrvContainer = document.getElementById(list);

                liJrvContainer.addEventListener('click', function (event) {
                    event.preventDefault();
                    const target = event.target.closest('a.flex.items-center');

                    if (target) {
                        const radioButton = target.querySelector('input[type="radio"]');
                        if (!radioButton.hasAttribute('disabled')) {
                            radioButton.checked = true;
                            JRV_SELECTED = radioButton.value;

                            enableButtonConfirm(radioButton.checked);
                            //showButtonMap(radioButton.checked);
                        }
                    }
                });
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

            function changeStatusToSelected() {
                $('#input-jrv').val(JRV_SELECTED);
                enableButtonUpdate(true);
            }

            function enableButtonUpdate(enable) {
                if (enable) {
                    $('#btn-update').prop('disabled', false);
                    $('#btn-update').removeClass('disabled:opacity-60');
                } else {
                    $('#btn-update').prop('disabled', true);
                    $('#btn-update').addClass('disabled:opacity-60');
                }
            }

            function updateJRV() {

                $.ajax({
                    url: "{{url('api/update-jrv')}}",
                    type: "POST",
                    data: {
                        jrv: JRV_SELECTED,
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'json',
                    success: function (result) {
                        //console.log(result);
                        
                        showSimpleAlert('¡Proceso exitoso!', 'La JRV fue asociada a tu usuario', 'NO_BUTTON','success');
                        
                        setTimeout(() => {
                            var redirectUrl = result.redirect_url;
                            window.location.href = redirectUrl;
                        }, 1000);

                    }
                });
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
