<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form id="frm-user-edit" class="">
                @csrf          

                <!-- Title -->
                <div class="flex flex-col md:flex-row md:px-0 items-center justify-start mb-4">
                    <div class="flex flex-row mr-auto items-center justify-start">
                        <a href="{{url('admin/users')}}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                            </svg>
                        </a>
                        <h1 class="font-extrabold text-3xl text-gray-800 leading-tight">
                            {{ __('Actualizar usuario') }}
                        </h1>
                    </div>
                </div>

                <!-- User data section -->
                <div class="md:flex md:flex-row">
                    <!-- Names -->
                    <div id="cont-name" class="md:basis-1/2 mt-4">
                        <x-input-label for="name" :value="__('Nombre de usuario')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="nome" value="{{ $user->name }}" autofocus autocomplete="name" disabled/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div id="cont-email" class="md:basis-1/2 md:ml-6 mt-4">
                        <x-input-label for="email" :value="__('Correo')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{ $user->email }}" autofocus autocomplete="email" disabled />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="md:flex md:flex-row mb-2">
                    <!-- Roll -->
                    <div class="md:basis-1/3 mt-4">
                        <x-input-label for="rol" :value="__('Rol')" />
                        <select id="rol" name="rol" class="form-control border-gray-300 rounded-lg mt-1 w-full" autofocus>
                            <option value="" selected>Seleccionar rol</option>                       
                            @php
                                $userRoll = $user->rol;
                            @endphp
                            <option value="Voluntario" @if($userRoll == 'Voluntario') selected  @endif>Voluntario</option>
                            <option value="Fiscal" @if($userRoll == 'Fiscal') selected  @endif>Fiscal</option>
                            <option value="Coordinador" @if($userRoll == 'Coordinador') selected  @endif>Coordinador</option>
                            <option value="Admin" @if($userRoll == 'Admin') selected  @endif>Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('roll')" class="mt-2" />
                    </div>

                    <!-- Department -->
                    <div class="md:basis-1/3 md:ml-6 mt-4">
                        <x-input-label for="location" :value="__('Departamento')" />
                        <select id="department" name="location" class="form-control border-gray-300 rounded-lg mt-1 w-full" autofocus>
                            <option value="" selected>Seleccionar departamentp</option>                              
                            @php
                                $userDept = $user->location;
                            @endphp
                            
                            @foreach ($departments as $department)
                                <option value="{{ $department }}" @if($department == $userDept) selected  @endif>{{ $department }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>
                </div>
                
                <a data-modal-target="info-rol-modal" data-modal-toggle="info-rol-modal" class="underline text-md font-bold text-indigo-800" style="cursor: pointer;">¿Qué permisos tiene cada rol?</a>

                <!-- Fiscal Info modal -->
                <div id="info-rol-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Roles y permisos
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="info-rol-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            
                            <!-- Modal body -->
                            <div id="modalContent" class="p-6 space-y-6 overflow-y-auto h-64">
                                <p class="text-lg font-bold leading-relaxed text-indigo-800">
                                    Administrador (Admin)
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">
                                    <ul class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-700 ml-6">
                                    <li>Acceso al registro completo de Fiscales. Puede editar información de fiscales, así como gestionar asignaciones y acreditaciones del fiscal. También tiene la opción de generar reportes.</li>
                                    <li>Acceso al registro completo de Mesas y ver su estado. Puede generar reportes</li>
                                    <li>Acceso a la administración de usuarios para cambio de roles de usuarios.</li>
                                    <li>Acceso a dashboard para visualizar métricas generales y por departamento.</li>
                                    </ul>
                                </p> 
                                <p class="mt-8 text-lg font-bold leading-relaxed text-indigo-800">
                                    Coordinador
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">
                                    <ul class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-700 ml-6">
                                    <li>Acceso al registro de Fiscales del departamento del cual es coodinador. Puede editar información de fiscales, así como gestionar asignaciones y acreditaciones del fiscal. También tiene la opción de generar reportes.</li>
                                    <li>Acceso al registro de Mesas del departamento asignado. Puede generar reportes</li>
                                    </ul>
                                </p>
                                <p class="mt-8 text-lg font-bold leading-relaxed text-indigo-800">
                                    Fiscal
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">
                                    <ul class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-700 ml-6">
                                    <li>Acceso al tablero de fiscal para gestionar su información personal, así como descargar su acreditación cuando la opción se encuentre disponible.</li>
                                    <li>Puede darse de baja si lo desea.</li>
                                    </ul>
                                </p> 
                                <p class="mt-8 text-lg font-bold leading-relaxed text-indigo-800">
                                    Voluntario
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">
                                    <ul class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-700 ml-6">
                                    <li>Rol de inicio en la plataforma. Solo tiene opción de registrarse como fiscal.</li>
                                    </ul>
                                </p>                         
                            </div>
                            
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button id="btn-fiscal-info" data-modal-hide="info-rol-modal" type="button" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="control-buttons" class="flex flex-row items-center justify-start mt-6 mb-4">
                    <button id="btn-update" class="text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:ring-indigo-900">    
                        {{ __('Actualizar') }}
                    </button>
                    <button id="btn-cancel" type="button" class="ml-4 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-4">Cancelar</button>
                </div>
            </form>


            <!-- Danger Zone -->
            <!--<div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 mt-12">
                <h2 class="font-semibold text-xl text-red-800 leading-tight mt-12">
                    {{ __('Darme de baja como fiscal') }}
                </h2>
                <p class="text-md mt-4 text-gray-800">Tu registro será removido de la lista de fiscales y la JRV que seleccionaste será desbloqueada. Para darte de baja como fiscal, por favor ingresa tu número de DPI en el siguiente campo:</p>

                <div class="md:flex md:flex-row">
                    
                    <div class="md:basis-1/2 mt-4">
                        <x-text-input id="input-confirm" class="block mt-1 w-full" type="text" name="input-confirm" value="" required autofocus autocomplete="dpi" inputmode="numeric"/>
                    </div> 
                </div>

                <div class="flex items-center justify-start mt-4 mb-3">
                    <button id="btn-downgrade" class="text-white bg-red-800 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 w-full md:w-3/12" style="cursor: pointer;">
                        {{ __('Darme de baja') }}
                    </button>
                </div>

            </div>-->

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
            var ROL_SELECTED = '';

            $('#rol').on('change', function (event) {
                if ($('#rol').val() === 'Coordinador'){
                    $('#department').prop('disabled', false);
                } else {
                    $('#department').val('');
                    $('#department').prop('disabled', true);
                }
            });

            // Save action button
            $('#btn-update').click(function (event) {
                event.preventDefault();
                
                if ($('#rol').val() === 'Coordinador' && $('#department').val() === '') {
                    showSimpleAlert('Rol coordinador requiere departamento','Por favor, seleccione un dartamento','Entendido',null);
                } else {
                    if ($('#rol').val() === '') {
                        showSimpleAlert('Debe seleccionar un rol','Usuario no puede ser guardado sin rol','Entendido',null);
                    } else {
                        updateAll();
                    }
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
                        var redirectUrl = "{{ url('admin/users') }}";
                        window.location.href = redirectUrl;
                    }
                });
            });

            function updateAll() {
                ROL_SELECTED = $('#rol').val();

                $.ajax({
                    url: "{{url('admin/users/update')}}",
                    type: "POST",
                    data: {
                        email:$('#email').val(),
                        rol:ROL_SELECTED,
                        location:$('#department').val(),                      
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'json',
                    success: function (result) {
                        //console.log(result);
                        
                        showSimpleAlert('¡Éxito!', 'El usuario fue actualizado', 'NO_BUTTON','success');
                        
                        setTimeout(() => {
                            var redirectUrl = result.redirect_url;
                            window.location.href = redirectUrl;
                        }, 1000);

                    }
                });
            }

            // Downgrade User
            /*function downgrade() {
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
            });*/

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
