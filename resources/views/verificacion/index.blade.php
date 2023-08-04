<x-app-layout>
    <div class="md:py-3"></div>
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div id='recipients' class="py-8 md:p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <form id="form" method="POST" action="{{ route('acreditacionesdownload') }}"">
                @csrf

                <!-- JRV selection section -->
                <div class="flex flex-col md:flex-row px-8 md:px-0 items-center justify-start mb-4">
                    <div class="flex flex-row mr-auto items-center justify-start">
                        <h1 class="font-extrabold text-3xl text-gray-800 leading-tight">
                            {{ __('Acreditaciones') }}
                        </h1>
                    </div>

                    <!-- Toolbar -->
                    <div class="flex flex-row items-center md:justify-end mt-8 md:mt-0 md:ml-auto">
                        <div class="p-2 ">
                            <div>
                                <select id="municipio" name="municipio" class="rounded-lg w-full text-gray-900 border-0 border-white bg-gray-100 hover:bg-gray-200 focus:ring-white" autofocus>

                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio }}">{{ $municipio }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <div class=" p-2">
                            <div>

                                    <button class="text-indigo-800 bg-[#e9f877] hover:bg-[#f7fdcf] rounded-lg mr-2 font-extrabold text-xl px-2 py-1.5 text-center">
                                        Descargar
                                    </button>

                            </div>

                        </div>
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

</x-app-layout>
