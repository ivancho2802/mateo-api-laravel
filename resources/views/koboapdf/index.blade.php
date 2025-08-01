<x-app-layout>
  <script>
    /* $(document).ready(function() {
      //código a ejecutar cuando existe la certeza de que el DOM está listo para recibir acciones
      document.querySelector('#formSave').addEventListener('submit', (event) => {

        event.preventDefault();

        console.log("HAGO UN SUBMIT", event);
        var url = "http://ach.dyndns.info:6280/api/matriz";

        var formparmas = new FormData();
        var token = document.getElementById('token').value

        console.log("fileInput", $('#fileSave')[0].files.length);

        if ($('#fileSave')[0].files > 0) {
          formparmas.append('file', $('#fileSave')[0].files[0]);
          //formparmas.append('a', "a");
        }

        var headersNew = {
          "Authorization": "Bearer " + token,
          "Content-Type": "application/json"
        }

        //document.generate - matriz - prensa

        if (!($('#fileSave')[0].files[0]) && !token) {
          $("#responseSaved").html("error faltsan datos");
          return;
        }
        var _token = document.getElementsByName('_token')[2].value

        var dataParams = new FormData();
        jQuery.each(jQuery('#file')[0].files, function(i, file) {
          dataParams.append('file', file);
          dataParams.append('_token', _token);
          
        });


        $.ajax({

          type: "POST",
          method: 'POST',
          url: url,
          
          cache: false,
          //contentType: false,
          dataType: "json",
          contentType: "application/json",
          processData: false,

          //data: "file=" + $('#fileSave')[0].files[0] + "&_token=" + _token,//dataParams, //
          data: {"file": $('#fileSave')[0].files[0], "_token": _token},//"file=" + $('#fileSave')[0].files[0] + "&_token=" + _token,dataParams, //
          //headers: headersNew,

          success: function(datares) {
            console.log("datares", datares)
            $("#responseSaved").html(datares ? JSON.stringify(datares) : datares);
          },

          complete: function(data) {
            console.log("data", data)
            $("#responseSaved").html(JSON.stringify(data));

          },

          statusCode: {
            404: function(xhr) {
              console.error('No hay Conexion al servidor');
            }
          },
          // beforeSend: function(xhr) {
          //  xhr.setRequestHeader("Authorization", "Bearer " + token);
          //},
        });

      });
    }); */
  </script>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Formulario de descargas masivas de PDF
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
          Formulario de dedscarga masiva de PDF:
        </button>

        @if(session()->has('success'))
        <div x-data="{ show: true}" x-show="show" class="position-fixed bg-green-500 rounded top-3 text-sm text-white py-2 px-4">
          <p class="m-0 text-white">Msg: {{ session('success')}}</p>
        </div>
        @endif

        @if(session()->has('error'))
        <div x-data="{ show: true}" x-show="show" class="position-fixed bg-red-500 rounded top-3 text-sm text-white py-2 px-4">
          <p class="m-0 text-white">Msg: {{ session('error')}}</p>
        </div>
        @endif
      </li>
      >

    </ul>

    <div class="bg-white">
      <div>

        <main class="mx-auto  px-4 sm:px-6 lg:px-8">

          <section aria-labelledby="products-heading" class="pb-24 pt-6">

            <header>
              <div class="row">
                <div class="col">
                </div>
                <div class="col">

                </div>
              </div>
            </header>

            <div class=" ">
              <!-- Filters -->
              <div class="  lg:block">

                <div class="relative border-b border-gray-200 py-6" x-init="isOpen=true" x-data="{
                    isOpen: false, 
                    set(value) {
                      this.isOpen = value;
                    }
                  }">

                  <h3 class="-my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button @click="isOpen = !isOpen" type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                      <span class="font-medium text-gray-900">Formulario de descargas masivas de kobo PDF</span>
                      <span class="ml-6 flex items-center">
                        <!-- Expand icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        <!-- Collapse icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                      </span>
                    </button>


                  </h3>

                  <div class="pt-6" id="filter-section-0" x-show="isOpen">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      <h1 class="h3 mb-3 fw-normal text-center">Formulario</h1>

                      <form method="post" action="/job/deploy/exportkobo" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf

                        <label for="exampleFormControlTextarea1" class="form-label">Dominio Kobo: {{$form->dominio ?? 'no funciona'}} {{$form['dominio'] ?? 'otro no'}}</label>
                        <input type="text" placeholder="kf.acf-e.org" id="dominio" name="dominio" value="{{($form)['dominio'] ?? ''}}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <div>ejemplo de https://kf.acf-e.org/ seria: kf.acf-e.org y para https://collect.nrc.no/ seria collect.nrc.no</div>
                        <!--<x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />-->

                        <br>

                        <label for="exampleFormControlTextarea1" class="form-label">Nombre clave de la solicitud: </label>
                        <input type="text" placeholder="solicitud_insumos" id="name_key" name="name_key" value="{{($form)['name_key'] ?? ''}}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <div>formato: solicitud_insumos no usar espacios y todo en minusculas</div>
                        <!--<x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />-->
                        <br>

                        <label for="exampleFormControlTextarea1" class="form-label">uui del formulario: </label>
                        <input type="text" placeholder="a4E3J9gkULZe5eRqQph8zh" id="id" name="id" value="{{($form)['id'] ?? ''}}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <div> ejemplo seria el que esta despues de forms -> https://kf.acf-e.org/#/forms/a4E3J9gkULZe5eRqQph8zh/data/table de este seria aU9qeP6mihopvkYSu7HhKp</div>
                        <!--<x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />-->
                        <br>

                        <label for="exampleFormControlTextarea1" class="form-label">Token de acceso: </label>
                        <input type="text" placeholder="322f65e3677ee93aa3..." id="token" name="token" value="{{($form)['token'] ?? ''}}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <div>ejemplo: 322f65e3677ee93aa3... se obtiene visitando https://kf.acf-e.org/token/?format=json o el que corresponda a su dominio</div>
                        <!--<x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />-->
                        <br>

                        @if(isset($dataFormulario))

                        <label for="exampleFormControlTextarea1" class="form-label">Parametros o variables del formulario: </label>

                        <div class="pt-6" id="filter-section-mobile-0">
                          <div class="space-y-6">
                            @forelse ($dataFormulario as $dataf)
                            <div class="flex items-center">
                              @if ($dataf == '_id')
                              <input id="paramForm" name="paramForm[]" value="{{$dataf}}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" checked disabled>
                              @else
                              <input id="paramForm" name="paramForm[]" value="{{$dataf}}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" checked>
                              @endif
                              <label for="paramForm" class="ml-3 min-w-0 flex-1 text-gray-500">{{$dataf}}</label>
                            </div>
                            @empty
                            {{'>'}}
                            @endforelse
                          </div>
                        </div>
                        @else
                        {{'>'}}
                        @endif

                        @if(session()->has('errorMessageDuration'))
                        <div class="alert alert-red-500">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {{ session('errorMessageDuration') }}
                        </div>
                        @endif

                        @if(isset($form) && is_array($form['filtrar']) && array_search('filtered', $form['filtrar']) >=0 )

                        @elseif(!isset($form['filtrar']) )
                        <input id="filtrar" name="filtrar[]" value="filter" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4 bg-blue">
                          Filtrar por campos del formulario
                        </button>
                        @endif


                        <x-primary-button class="mt-4 ">Enviar Datos</x-primary-button>
                      </form>

                      <!-- <form method="put" action="/koboapdf" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <label>
                          <input id="filtrar" name="filtrar[]" value="filter" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                          <x-primary-button class="mt-4">Filtrar por campos del formulario</x-primary-button>
                        </label>
                      </form> -->

                    </div>
                  </div>

                </div>

                <div class="relative border-b border-gray-200 py-6" x-init="isOpenA=true" x-data="{
                    isOpenA: false, 
                    set(value) {
                      this.isOpenA = value;
                    }
                  }">

                  <h3 class="-my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button @click="isOpenA = !isOpenA" type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                      <span class="font-medium text-gray-900">Formulario para ver el proceso de descargas masivas de kobo PDF</span>
                      <span class="ml-6 flex items-center">
                        <!-- Expand icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        <!-- Collapse icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                      </span>
                    </button>


                  </h3>

                  <div class="pt-6" id="filter-section-0" x-show="isOpenA">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      <h1 class="h3 mb-3 fw-normal text-center">Formulario</h1>

                      <form method="post" action="/koboapdf" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf

                        <label for="exampleFormControlTextarea1" class="form-label">Buscador: </label>
                        <input type="text" placeholder="solicitud_insumos" id="name_key" name="name_key" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <div>Nombre clave de la solicitud </div>
                        <!--<x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />-->

                        <br>

                        <x-primary-button class="mt-4">Enviar Consulta</x-primary-button>
                      </form>

                      @if(!isset($data))
                      <div x-data="{ show: true}" x-show="show" class="position-fixed bg-green-500 rounded top-3 text-sm py-2 px-4">
                        <p class="m-0 text-dark">Msg: No hay datos de procesos</p>
                      </div>
                      @endif

                      @if(isset($data))
                      <h4>Registros enviados: {{count($data)}}</h4>

                      <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                        @forelse ($data as $export)
                        <li>
                          <div class="flex items-center gap-x-6">

                            @if((($export->download!=="")))
                            <td class="grid_celda grid_row_activo" id="FECHA_ACTIV" data-nombre_celda="m_kobo_formularios_FECHA_ACTIV" style="width: 80px; min-width: 80px; cursor: pointer;">
                              <a href="{{$export->download}}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 50px;fill: red; "><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                  <path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                </svg>
                              </a>
                            </td>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 50px; "><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                              <path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z" />
                            </svg>
                            @endif

                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 50px;">
                              <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z" />
                            </svg> -->

                            <div>
                              <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Nombre Clave: {{$export->name_key}}</h3>
                              <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">
                                Export. Totales:
                                @if(optional($export)->exportaciones_totales !== 0 )
                                {{$export->exportaciones_totales}}
                                @else
                                <form method="get" action="/koboapdf" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                  @csrf
                                  <input type="hidden" placeholder="solicitud_insumos" id="formid" name="formid" value="{{$formid ?? ''}}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                  <x-primary-button class="mt-4">Ver</x-primary-button>
                                </form>
                                @endif
                              </h3>
                              <p class="text-sm font-semibold leading-6 text-indigo-600">Export. Procesadas: {{$export->exportaciones_procesadas}}</p>
                              <p class="text-sm font-semibold leading-6 text-indigo-600">
                                Export. Faltantes:
                                @if(optional($export)->exportaciones_faltantes <= 0 )
                                {{$export->exportaciones_faltantes}}
                                @else
                              <form method="get" action="/koboapdf" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <input type="hidden" placeholder="solicitud_insumos" id="formid" name="formid" value="{{$formid ?? ''}}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <x-primary-button class="mt-4">Ver</x-primary-button>
                              </form>
                              @endif
                              </p>
                              <p class="text-sm font-semibold leading-6 text-indigo-600">
                                Procesos. Fallidos: {{$export->exportaciones_fallidos}}
                                @if($export->exportaciones_fallidos > 0)
                              <form method="get" action="/koboapdfrepair" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <x-primary-button class="mt-4">Reparar</x-primary-button>
                              </form>

                              @endif

                              @if(optional($export)->exportaciones_nuevas )
                              <form method="get" action="/koboapdfactualizar" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <x-primary-button class="mt-4">Actualizar</x-primary-button>
                              </form>
                              @endif
                              </p>
                              <p class="text-sm font-semibold leading-6 text-indigo-600">Export. proceso: {{$export->trabajos_en_proceso}}</p>
                            </div>
                          </div>
                        </li>
                        @empty

                        @endforelse
                      </ul>

                      @endif

                    </div>
                  </div>

                </div>


              </div>

            </div>
          </section>
        </main>
      </div>
    </div>



    <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>

    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

    </div>
  </div>
</x-app-layout>