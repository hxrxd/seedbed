<x-app-layout>
    <div class="md:py-3"></div>
    <div class="container max-w-7xl mx-auto sm:px-0.5 lg:px-8 mt-16">

        <!--Card-->
        <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
            <div class="container max-w-screen-lg mx-auto">
              <div>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                      <p class="font-medium text-lg">Acta de cierre</p>
                      <p>Ingresar la cantidad solicitada</p>
                    </div>

                    <div class="lg:col-span-2">
                      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5">
                          <label for="full_name">Movimiento Semilla</label>
                          <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                        </div>

                        <div class="md:col-span-5">
                            <label for="full_name">UNE</label>
                            <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                          </div>

                          <div class="md:col-span-5">
                            <label for="full_name">En Blanco</label>
                            <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                          </div>

                          <div class="md:col-span-5">
                            <label for="full_name">Nulo</label>
                            <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                          </div>

                          <div class="md:col-span-5">
                            <label for="full_name">Papeletas anuladas</label>
                            <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                          </div>




                        <div class="md:col-span-5 text-right">
                          <div class="inline-flex items-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar acta</button>
                          </div>
                        </div>



                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--/Card-->
    </div>
    <!--/container-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-app-layout>
