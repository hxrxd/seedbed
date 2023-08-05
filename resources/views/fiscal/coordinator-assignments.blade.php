<x-app-layout>
    <div class="md:py-3"></div>    
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="py-8 md:p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            
            <form id="frm-main" class="">
                @csrf          

                <!-- JRV selection section -->
                <div class="flex flex-col md:flex-row px-8 md:px-0 items-center justify-start mb-4">
                    <div class="flex flex-row mr-auto items-center justify-start">
                        <h1 class="font-extrabold text-3xl text-gray-800 leading-tight">
                            {{ __('Fiscales') }}
                        </h1>
                    </div>

                    <!-- Toolbar -->
                    <div class="flex flex-col items-center md:justify-end mt-8 md:mt-0 md:ml-auto">
                        <div class="grid md:grid-cols-2 gap-4 sm:grid-cols-1 ">
                            <div>
                                <select id="department" name="departamento" class="rounded-lg w-full text-gray-900 border-0 border-white bg-gray-100 hover:bg-gray-200 focus:ring-white" autofocus>
                                    <option value="">Todos los municipios</option>    
                                    @foreach ($cities as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-row items-center md:justify-end md:mt-0 md:ml-auto">
                                <div class="relative mr-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="searchInput" class="block p-2 pl-10 text-base font-bold text-gray-900 rounded-lg border-0 border-white bg-gray-100 hover:bg-gray-200 focus:ring-white" placeholder="Buscar fiscal">
                                </div>

                                <a id="sortButton" href="#" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                                    <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6v13m0 0 3-3m-3 3-3-3m11-2V1m0 0L9 4m3-3 3 3"/>
                                    </svg>
                                </a>
                                <a id="addButton" href="{{ route('admin.fiscales.create') }}" class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center cursor-pointer">
                                    <svg class="w-6 h-6 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="downloadOptions" class="hidden flex flex-row px-8 items-center justify-center md:mt-0 md:ml-auto w-full">
                    <a id="downloadButton1" href="{{url('getfiscal') }}" class="text-white bg-indigo-800 hover:bg-indigo-900 rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">Lista General de Fiscales</a>
                    <a id="downloadButton2" href="{{url('getfiscalelectronico') }}" class="text-white bg-indigo-800 hover:bg-indigo-900 rounded-lg font-extrabold text-sm px-2 py-1.5 text-center">Interesados Fiscales Informáticos</a>
                </div>

                <div id="loading" class="flex items-center justify-center p-6 h-64">
                    <div class="flex items-center justify-center w-56 h-56">
                        <div role="status" class="flex flex-col items-center justify-center">
                            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-indigo-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span id="loading-msg">Cargando...</span>
                        </div>
                    </div>
                </div>

                <div id="itemsContainer" class="md:p-1 hidden">
                    @foreach ($data as $fiscal)
                    <div class="flex items-center p-6 md:p-3 font-bold text-gray-900 border-b-2 border-dotted hover:bg-gray-50 group item-list">
                        <div class="flex items-center">
                            <div class="flex-column items-start ml-3">
                                <h2 class="item-data text-sm text-xl flex-row items-center" data-nombre="{{ $fiscal->apellidos }}">{{ $fiscal->apellidos }}, {{ $fiscal->nombres }}
                                    @if($fiscal->nombres == '')    
                                    <span class="item-data mb-2 text-xs px-1 text-gray-700 bg-[#ffbf00] rounded-md">PRECARGADO</span>
                                    @endif
                                </h2>         
                                <span class="text-sm py-1 px-2 font-bold mt-2 mb-2 bg-[#e9f877] rounded-md text-indigo-800">{{ $fiscal->dpi }}</span> 
                                <p class="text-sm font-bold mt-2 mb-2 text-gray-400"><span class="text-sm mt-2 mb-2 text-gray-500"><span class="text-sm mt-2 mb-2 text-gray-500">CONTACTO: </span>+502 {{ $fiscal->telefono }} / {{ $fiscal->correo }}</p>
                                <p class="text-sm mt-2 mb-2 text-gray-500">{{ $fiscal->departamento }}, {{ $fiscal->municipio }}</p>
                                <div class="flex flex-row items-center justify-start mt-4 mb-2">
                                    @if ($fiscal->status == 'Active')
                                    <a href="{{url('fiscal/'.$fiscal->correo.'/edit')}}" data-jrv="{{ $fiscal->dpi }}" class="add-jrv-button text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-5 h-5 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z"/>
                                            </svg>
                                            <span class="ml-2">Editar</span>
                                        </div>
                                    </a>
                                    <a href="{{url('admin/assignments/'.$fiscal->correo)}}" data-jrv="{{ $fiscal->dpi }}" class="add-jrv-button text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-5 h-5 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4"/>
                                            </svg>
                                            <span class="ml-2">Asignar</span>
                                        </div>
                                    </a>
                                    <span class="text-indigo-800 hover:bg-[#e9f877] rounded-lg mr-2 font-extrabold text-sm px-2 py-1.5 text-center opacity-50 cursor-not-allowed">
                                        <div class="flex flex-row items-center justify-start">
                                            <svg class="w-5 h-5 text-indigo-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/>
                                            </svg>
                                            <span class="ml-2">Acreditar</span>
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
                        <span class="text-md text-gray-500 mt-8">No hay más registros</span>
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

            setTimeout(() => {
                $('#loading-msg').text('Preparando los registros...');
            }, 500);

            setTimeout(() => {
                $('#loading').addClass('hidden');
                $('#itemsContainer').removeClass('hidden');
            }, 100);

            // City Dropdown Change Event
            $('#department').on('change', function () {
                filterItems('SELECT');
            });

            // download button action
            $('#downloadButton').on('click', function() {
                $('#downloadOptions').removeClass('hidden');
            });

            $('#downloadButton1').on('click', function() {
                $('#downloadOptions').addClass('hidden');
            });

            $('#downloadButton2').on('click', function() {
                $('#downloadOptions').addClass('hidden');
            });

            /*var addButtons = document.querySelectorAll(".add-jrv-button");
            addButtons.forEach(function(button) {
                //console.log('flag');
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    var jrv = this.dataset.jrv; 
                    updateJRV(jrv);
                });
            });*/

            function updateJRV(currentJRV) {

                $.ajax({
                    url: "{{url('api/update-jrv')}}",
                    type: "POST",
                    data: {
                        jrv: currentJRV,
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
            function filterItems(searchType) {
                let input = document.getElementById("searchInput").value.toLowerCase();

                if (searchType === 'SELECT') {
                    input = document.getElementById("department").value.toLowerCase();
                } else if (searchType === 'SORT') {
                    if (SORT_ASC) {
                        input = 'sin asignar'
                        SORT_ASC = false;
                    } else {
                        input = 'asignada'
                        SORT_ASC = true;
                    }
                    console.log(input);
                }

                const items = document.querySelectorAll("#itemsContainer > div");
                let hasResults = false;
                
                items.forEach(item => {
                const textElements = item.querySelectorAll(".item-data, .text-xl, .text-sm");
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
            //document.getElementById("searchInput").addEventListener("keyup", filterItems);
            document.getElementById("sortButton").addEventListener("click", sortItems);

            document.getElementById("searchInput").addEventListener("keyup", function(event) {
                $('#department').val('');
                filterItems('INPUT');
            });

            //sortItems();
        });  
    </script>
</x-app-layout>
