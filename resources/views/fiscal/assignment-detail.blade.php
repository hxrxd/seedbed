<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form id="frm-main" class="">
                @csrf          

                <!-- JRV selection section -->
                <h1 class="font-extrabold text-3xl text-gray-800 leading-tight mb-6">
                    {{ __('Detalle de JRV #'.$jrv->jrv) }}
                </h1>
                <input id="current-jrv" type="hidden" value="{{ $jrv->jrv }}" />
                <p class="text-lg mt-2 mb-2 text-gray-800"><strong>Centro: </strong>{{ $jrv->nombre }}</p>
                <p class="text-lg mt-2 mb-2 text-gray-800"><strong>Dirección: </strong>{{ $jrv->ubicacion }}, ZONA {{ $jrv->zona }}</p>
                <p class="text-lg mt-2 mb-2 text-gray-800"><strong>Departamento: </strong>{{ $jrv->departamento }}</p>
                <p class="text-lg mt-2 mb-2 text-gray-800"><strong>Municipio: </strong>{{ $jrv->municipio }}</p>

                <div id="control-buttons" class="flex flex-row items-center justify-start mt-4 mb-6">
                    <button id="btn-cancel" type="button" class="text-indigo-800 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-indigo-800 border-2 text-sm font-bold px-5 py-2.5 hover:text-indigo-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 w-full md:w-3/12">Volver al tablero</button>
                </div>
            </form>

            <!-- Danger Zone -->
            <div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 mt-12">
                <h2 class="font-semibold text-xl text-red-800 leading-tight mt-12">
                    {{ __('Desvincularme de esta JRV') }}
                </h2>
                <p class="text-md mt-4 text-gray-800">La JRV #{{$jrv->jrv}} será removida de tu perfil de Fiscal y estará disponible para reservar.</p>

                <div class="flex items-center justify-start mt-4 mb-3">
                    <button id="btn-remove" class="text-white bg-red-800 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 w-full md:w-3/12" style="cursor: pointer;">
                        {{ __('Remover') }}
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
            var CURRENT_JRV = '';     

            // Remove the JRV
            $('#btn-remove').click(function (event) {
                event.preventDefault();
                
                swal({
                    title: '¿Estás seguro que quieres desvincular esta JRV de tu perfil?',
                    text: "La JRV será removida de tu perfil y estará disponible para alguien más",
                    icon: 'warning',
                    buttons:  {
                        cancel: "No, volver al detalle",
                        confirm: "Sí",
                    },

                }).then((willStore ) => {
                    if (willStore) {
                        remove();
                    }
                });               
            });

            $('#btn-cancel').click(function(event){
                event.preventDefault();
                var redirectUrl = "{{ url('/dashboard') }}";
                window.location.href = redirectUrl;
            });

            function remove() {
                CURRENT_JRV = $('#current-jrv').val();

                $.ajax({
                    url: "{{url('api/remove-jrv')}}",
                    type: "POST",
                    data: {
                        jrv: CURRENT_JRV,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        showSimpleAlert('JRV removida', 'La JRV fue desvinculada de tu perfil', 'NO_BUTTON','success');
                        
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
