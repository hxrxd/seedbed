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
                        @if (Auth::user()->rol == "Admin" || Auth::user()->rol == "Coordinador")
                        <a href="{{url('admin/assignments/'.$email)}}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                            </svg>
                        </a>
                        @else
                        <a href="{{url('assignments')}}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                            <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                            </svg>
                        </a>
                        @endif
                        <h1 class="font-extrabold text-3xl text-gray-800 leading-tight">
                            {{ __('Nueva asignación') }}
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
                    </div>
                </div>

                <div id="itemsContainer" class="md:p-1">
                <input id="email" type="hidden" value="{{$email}}"/>
                @foreach ($data as $jrv)
                    <div class="flex items-center p-6 md:p-3 font-bold text-gray-900 border-b-2 border-dotted hover:bg-gray-50 group item-list">
                        <div class="flex items-center">
                            <div class="flex-column items-start ml-3">
                                <input id="current-jrv" type="hidden" value="{{ $jrv->jrv }}"/>
                                <h2 class="text-xl flex-row items-center whitespace-nowrap" data-jrv="#{{ $jrv->jrv }}">#{{ $jrv->jrv }} 
                                    @if($jrv->estatus == 0)    
                                    <span class="mb-2 text-xs px-1 text-white bg-[#72b30f] rounded-md">Disponible</span>
                                    @else
                                    <span class="text-xs px-1 text-white bg-[#d35f5f] rounded-md">No disponible</span>
                                    @endif
                                </h2>         
                                <p class="text-sm mt-2 mb-2 text-gray-700"><span data-nombre="{{ $jrv->nombre }}">{{ $jrv->nombre }}</span></p>
                                <p class="text-sm mt-2 mb-2 text-gray-500">{{ $jrv->ubicacion }}, ZONA {{ $jrv->zona }}. {{ $jrv->departamento }}, {{ $jrv->municipio }}.</p>
                                <div class="flex flex-row items-center justify-start mt-4 mb-2">
                                    @if ($jrv->estatus == 0)
                                    <a data-jrv="{{ $jrv->jrv }}" class="add-jrv-button text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center cursor-pointer">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-4 h-4 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <span class="ml-2">Confirmar asignación</span>
                                        </div>
                                    </a>
                                    @else 
                                    <span class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center opacity-50 cursor-not-allowed">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-4 h-4 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <span class="ml-2">Confirmar asignación</span>
                                        </div>
                                    </span>
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
                        <span class="text-md text-gray-500 mt-8">No hay más mesas en tu municipio</span>
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

            var addButtons = document.querySelectorAll(".add-jrv-button");
            addButtons.forEach(function(button) {
                //console.log('flag');
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    var jrv = this.dataset.jrv; 
                    updateJRV(jrv);
                });
            });

            function updateJRV(currentJRV) {

                $.ajax({
                    url: "{{url('api/update-jrv')}}",
                    type: "POST",
                    data: {
                        jrv: currentJRV,
                        email: $('#email').val(),
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
