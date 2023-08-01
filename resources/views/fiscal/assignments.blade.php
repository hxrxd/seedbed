<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="py-8 md:p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form id="frm-main" class="">
                @csrf          

                <!-- JRV selection section -->
                <div class="flex flex-col md:flex-row px-4 md:px-0 items-center justify-start mb-4">
                    <div class="flex flex-row mr-auto items-center justify-start">
                        @if (Auth::user()->rol == "Admin")
                        <a href="{{url('admin/fiscales')}}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                            </svg>
                        </a>
                        @else
                        <a href="{{url('/dashboard')}}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                            </svg>
                        </a>
                        @endif
                        <h1 class="font-extrabold text-3xl text-gray-800 leading-tight">
                            {{ __('Asignaciones') }}
                        </h1>
                    </div>

                    <!-- Toolbar -->
                    <div class="flex flex-row items-center md:justify-end mt-8 md:mt-0 md:ml-auto">
                        <div class="relative mr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" class="block p-2 pl-10 text-base font-bold text-gray-900 rounded-lg border-0 border-white bg-gray-100 focus:ring-white" placeholder="Buscar una JRV">
                        </div>
                        <a id="sortButton" href="#" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 17V1m0 0L1 4m3-3 3 3m4-3h6l-6 6h6m-7 10 3.5-7 3.5 7m-6.125-2H16"/>
                            </svg>
                        </a>
                        @if (Auth::user()->rol == "Admin")
                        <a id="addButton" href="{{ url('admin/assignments/'.$email.'/new') }}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 1v16M1 9h16"/>
                            </svg>
                        </a>
                        @else
                            @if (count($assignments) < 2)
                            <span class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center opacity-50 cursor-not-allowed">
                                <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 1v16M1 9h16"/>
                                </svg>
                            </span>
                            @endif
                        @endif
                        
                    </div>
                </div>

                <div id="itemsContainer" class="md:p-1">
                @foreach ($assignments as $jrv)
                    <div class="flex items-center p-6 md:p-3 font-bold text-gray-900 border-b-2 border-dotted hover:bg-gray-50 group item-list">
                        <div class="flex items-center">
                            <div class="flex-column items-start ml-3">
                                <input id="current-jrv" type="hidden" value="{{ $jrv->jrv }}"/>
                                <h2 class="text-xl flex-1 whitespace-nowrap" data-jrv="#{{ $jrv->jrv }}">#{{ $jrv->jrv }}</h2>         
                                <p class="text-sm mt-2 mb-2 text-gray-700"><span data-nombre="{{ $jrv->nombre }}">{{ $jrv->nombre }}</span></p>
                                <p class="text-sm mt-2 mb-2 text-gray-500">{{ $jrv->ubicacion }}, ZONA {{ $jrv->zona }}. {{ $jrv->departamento }}, {{ $jrv->municipio }}.</p>
                                <div class="flex flex-row items-center justify-start mt-4 mb-2">
                                    <span class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center opacity-50 cursor-not-allowed">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-4 h-4 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12V1m0 0L4 5m4-4 4 4m3 5v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                            </svg>
                                            <span class="ml-2">Acta</span>
                                        </div>
                                    </span>
                                    @if ($jrv->votos == 1)
                                    <a href="#" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-5 h-5 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M9 4.025A7.5 7.5 0 1 0 16.975 12H9V4.025Z"/>
                                                <path d="M12.5 1c-.169 0-.334.014-.5.025V9h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 12.5 1Z"/>
                                                </g>
                                            </svg>
                                            <span class="ml-2">Resultados</span>
                                        </div>
                                    </a>
                                    @else 
                                    <span class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center opacity-50 cursor-not-allowed">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-5 h-5 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M9 4.025A7.5 7.5 0 1 0 16.975 12H9V4.025Z"/>
                                                <path d="M12.5 1c-.169 0-.334.014-.5.025V9h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 12.5 1Z"/>
                                                </g>
                                            </svg>
                                            <span class="ml-2">Resultados</span>
                                        </div>
                                    </span>
                                    @endif
                                    @if(Auth::user()->rol == "Admin")
                                    <a href="#" data-jrv="{{ $jrv->jrv }}" class="remove-jrv-button text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-5 h-5 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                            </svg>
                                            <span class="ml-2">Desvincular</span>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>         
                @endforeach
                </div>
                <div id="noResults" class="hidden">
                    <div class="flex flex-col items-center justyfy-center p-12 mt-16 mb-16 font-bold text-gray-900 w-full">
                        <svg class="w-24 h-24 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>   
                        <h1 class="text-xl text-gray-500 mt-8">No se encontraron resultados relacionados a tu búsqueda en esta lista...</h1>
                    </div>
                </div>
                <div id="endOfResults">
                    <div class="flex flex-col items-center justyfy-center mt-3 mb-3 font-bold text-gray-900 w-full">   
                        <span class="text-md text-gray-500 mt-8">No tienes más asignaciones</span>
                    </div>
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
            var SORT_ASC = false;

            // Remove the JRV
            function removeJRV(currentJRV, button) {
                swal({
                    title: '¿Estás seguro que quieres desvincular esta JRV?',
                    text: "La JRV será liberada y estará disponible para alguien más",
                    icon: 'warning',
                    buttons:  {
                        cancel: "No, volver al detalle",
                        confirm: "Sí",
                    },

                }).then((willStore ) => {
                    if (willStore) {
                        remove(currentJRV, button);
                    }
                });               
            };

            $('#btn-cancel').click(function(event){
                event.preventDefault();
                var redirectUrl = "{{ url('/dashboard') }}";
                window.location.href = redirectUrl;
            });

            function remove(currentJRV, button) {
                $.ajax({
                    url: "{{url('api/remove-jrv')}}",
                    type: "POST",
                    data: {
                        jrv: currentJRV,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        showSimpleAlert('JRV removida', 'La JRV fue desvinculada de tu perfil', 'NO_BUTTON','success');
                        
                        // Remove the item from the list in the DOM
                        var item = button.closest(".item-list");
                        item.remove();
                    }
                });
            }

            function showLimitMessage() {
                showSimpleAlert('No puedes asignarte más', 'Llegaste al número máximo de asignaciones', 'NO_BUTTON', 'info');
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

            var removeButtons = document.querySelectorAll(".remove-jrv-button");
            removeButtons.forEach(function(button) {
                //console.log('flag');
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    var jrv = this.dataset.jrv; 
                    removeJRV(jrv, this);
                });
            });


            // Function to handle filtering based on search input
            function filterItems() {
                const input = document.getElementById("searchInput").value.toLowerCase();
                const items = document.querySelectorAll("#itemsContainer > div");
                let hasResults = false;
                
                items.forEach(item => {
                const textElements = item.querySelectorAll(".text-xl, .text-sm");
                let foundMatch = false;
                textElements.forEach(textElement => {
                    const text = textElement.textContent.toLowerCase();
                    if (text.includes(input)) {
                    foundMatch = true;
                    }
                });

                item.style.display = foundMatch ? "flex" : "none";

                if (foundMatch) {
                    hasResults = true;
                }
                });

                // Show/hide "No results" message
                const noResultsMessage = document.getElementById("noResults");
                const lastItemMessage = document.getElementById("endOfResults");
                noResultsMessage.style.display = hasResults ? "none" : "block";
                lastItemMessage.style.display = !hasResults ? "none" : "block";
            
            }

            // Function to handle sorting based on select option
            function sortItems() {
                const sortBy = 'nombre';//document.getElementById("sortButton").value;
                const itemsContainer = document.getElementById("itemsContainer");
                const items = Array.from(itemsContainer.children);
                    
                if (!SORT_ASC){
                    items.sort((a, b) => {
                        const aValue = a.querySelector(`[data-${sortBy}]`).dataset[sortBy];
                        const bValue = b.querySelector(`[data-${sortBy}]`).dataset[sortBy];
                        return aValue.localeCompare(bValue);
                    });

                    SORT_ASC = true;
                } else {
                    items.sort((b, a) => {
                        const aValue = a.querySelector(`[data-${sortBy}]`).dataset[sortBy];
                        const bValue = b.querySelector(`[data-${sortBy}]`).dataset[sortBy];
                        return aValue.localeCompare(bValue);
                    });

                    SORT_ASC = false;
                }
                items.forEach(item => itemsContainer.appendChild(item));
            }

            // Attach event listeners
            document.getElementById("searchInput").addEventListener("keyup", filterItems);
            document.getElementById("sortButton").addEventListener("click", sortItems);

            //sortItems();
        });  
    </script>
</x-app-layout>
