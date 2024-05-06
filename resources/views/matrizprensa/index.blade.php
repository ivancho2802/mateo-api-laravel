<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Matriz de Prensa
    </h2>
  </x-slot>

  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Matriz con diccionario de datos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Matriz lite</button>
      </li>
    </ul>

    <div class="bg-white">
      <div>

        <main class="mx-auto  px-4 sm:px-6 lg:px-8">

          <section aria-labelledby="products-heading" class="pb-24 pt-6">

            <div class=" ">
              <!-- Filters -->
              <form class="  lg:block">

                <div class="relative border-b border-gray-200 py-6" x-init="isOpen=false" x-data="{
                    isOpen: false, 
                    set(value) {
                      this.isOpen = value;
                    }
                  }">

                  <h3 class="-my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button @click="isOpen = !isOpen" type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                      <span class="font-medium text-gray-900">Matriz con diccionario de datos</span>
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
                      <h1 class="h3 mb-3 fw-normal text-center">Formulario de generacion de matriz </h1>

                      <form method="post" action="https://tools.api.ach.dyndns.info/generate-founts" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf

                        <label for="exampleFormControlTextarea1" class="form-label">Pais de Busqueda</label>
                        <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" aria-label="Default select example" id="cr" name="cr">
                          <option value="CO" selected>Colombia</option>
                          <option value="US">Estados Unidos</option>
                          <option value="VE">Venezuela</option>
                          <option value="OTRO">Otro</option>
                        </select>
                        <x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />

                        <label for="floatingPassword">Fecha Rango Restriccion</label>
                        <!-- validar para que la fecha no sea mayor a la actual -->
                        <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" aria-label="Default select example" id="dateRestrictType" name="dateRestrictType">
                          <option value="d" selected>Dia(s)</option>
                          <option value="w">Semana(s)</option>
                          <option value="m">Mes(es)</option>
                          <option value="y">Año(s)</option>
                        </select>
                        <input type="number" min="0" value="6" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="dateRestrictNum" name="dateRestrictNum" placeholder="Cantidad">

                        <x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />

                        <label for="exampleFormControlTextarea1" class="form-label">Cantidad de resultados deseados</label>
                        <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" aria-label="Default select example" id="num" name="num">

                          <option value="10" selected>10 resultados</option>
                          <option value="20">20 resultados</option>
                        </select>

                        <x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />


                        <div class="row">

                          <div class="col">

                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Tipo de contenido</label>
                              <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" aria-label="Default select example" id="noticia" name="noticia">
                                <option value="">Articulos, invetigaciones u otros</option>
                                <option value="news" selected>Noticia</option>
                              </select>
                            </div>

                          </div>

                          <div class="col">


                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Ciudad Objetivo</label>
                              <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" aria-label="Default select example" id="city" name="city">
                                <option value="" selected>Ninguna</option>
                                <option value="Arauca">Arauca</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Barranquilla">Barranquilla</option>
                                <option selected value="Bogotá">Bogotá</option>
                                <option value="Bucaramanga">Bucaramanga</option>
                                <option value="Cali">Cali</option>
                                <option value="Cartagena">Cartagena</option>
                                <option value="Cúcuta">Cúcuta</option>
                                <option value="Florencia">Florencia</option>
                                <option value="Ibagué">Ibagué</option>
                                <option value="Leticia">Leticia</option>
                                <option value="Manizales">Manizales</option>
                                <option value="Medellín">Medellín</option>
                                <option value="Mitú">Mitú</option>
                                <option value="Mocoa">Mocoa</option>
                                <option value="Montería">Montería</option>
                                <option value="Neiva">Neiva</option>
                                <option value="Pasto">Pasto</option>
                                <option value="Pereira">Pereira</option>
                                <option value="Popayán">Popayán</option>
                                <option value="Puerto Carreño">Puerto Carreño</option>
                                <option value="Puerto Inírida">Puerto Inírida</option>
                                <option value="Quibdó">Quibdó</option>
                                <option value="Riohacha">Riohacha</option>
                                <option value="San Andrés">San Andrés</option>
                                <option value="San José del Guaviare">San José del Guaviare</option>
                                <option value="Santa Marta">Santa Marta</option>
                                <option value="Sincelejo">Sincelejo</option>
                                <option value="Tunja">Tunja</option>
                                <option value="Valledupar">Valledupar</option>
                                <option value="Villavicencio">Villavicencio</option>
                                <option value="Yopal">Yopal</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <x-input-error :messages="$errors->store->get('title') ?? ''" class="mt-2" />


                        <div class="mb-3">
                          <label for="file" class="form-label">Archivo de diccionario de datos</label>
                          <input class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="file" id="file" name="file">
                          <div id="emailHelp" class="form-text">Si no adjunta el diccionario, hay uno por defecto el cual es el mismo
                            formato
                            de abajo.</div>
                        </div>

                        <div class="mb-3">

                          <a target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4" type="button" href="https://tools.api.ach.dyndns.info/generate-founts/templates/diccionario_de_datos.csv">
                            Descargar Template
                          </a>
                        </div>


                        <x-primary-button class="mt-4">Enviar Datos</x-primary-button>
                      </form>

                      <form method="post" action="https://tools.api.ach.dyndns.info/generate-founts" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>


                      </form>

                    </div>
                  </div>

                </div>


                <div class="border-b border-gray-200 py-6" x-data="{ isOpenB: false }">
                  <h3 class="-my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button @click="isOpenB = !isOpenB" type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                      <span class="font-medium text-gray-900">Matriz lite</span>
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
                  <!-- Filter section, show/hide based on section state. -->
                  <div class="pt-6" id="filter-section-1" x-show="isOpenB">
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                      <form method="post" action="https://tools.api.ach.dyndns.info/generate-founts-lite" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        <h1 class="h3 mb-3 fw-normal text-center">Formulario de generacion de matriz </h1>

                        <div class="row">
                          <div class="col">
                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Pais de Busqueda</label>
                              <select class="form-select" aria-label="Default select example" id="cr" name="cr">
                                <option value="CO" selected>Colombia</option>
                                <option value="US">Estados Unidos</option>
                                <option value="VE">Venezuela</option>
                                <option value="OTRO">Otro</option>
                              </select>
                            </div>

                          </div>

                          <div class="col">
                            <div class="mb-3">
                              <label for="floatingPassword">Fecha Rango Restriccion</label>
                              <!-- validar para que la fecha no sea mayor a la actual -->
                              <select class="form-select" aria-label="Default select example" id="dateRestrictType" name="dateRestrictType">
                                <option value="d">Dia(s)</option>
                                <option value="w">Semana(s)</option>
                                <option value="m" selected>Mes(es)</option>
                                <option value="y">Año(s)</option>
                              </select>
                              <input type="number" min="0" value="2" class="form-control" id="dateRestrictNum" name="dateRestrictNum" placeholder="Cantidad">
                            </div>

                          </div>

                          <div class="col">
                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Cantidad de resultados deseados</label>
                              <select class="form-select" aria-label="Default select example" id="num" name="num">

                                <option value="10" selected>10 resultados</option>
                                <option value="20">20 resultados</option>
                              </select>
                            </div>

                          </div>
                        </div>

                        <div class="row">
 
                          <div class="col">

                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Tipo de contenido</label>
                              <select class="form-select" aria-label="Default select example" id="noticia" name="noticia">
                                <option value="">Articulos, invetigaciones u otros</option>
                                <option value="news" selected>Noticia</option>
                              </select>
                            </div>

                          </div>

                          <div class="col">


                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Ciudad Objetivo</label>
                              <select class="form-select" aria-label="Default select example" id="city" name="city">
                                <option value="" selected>Ninguna</option>
                                <option value="Arauca">Arauca</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Barranquilla">Barranquilla</option>
                                <option value="Bogotá">Bogotá</option>
                                <option value="Bucaramanga">Bucaramanga</option>
                                <option value="Cali">Cali</option>
                                <option value="Cartagena">Cartagena</option>
                                <option value="Cúcuta">Cúcuta</option>
                                <option value="Florencia">Florencia</option>
                                <option value="Ibagué">Ibagué</option>
                                <option value="Leticia">Leticia</option>
                                <option value="Manizales">Manizales</option>
                                <option value="Medellín">Medellín</option>
                                <option value="Mitú">Mitú</option>
                                <option value="Mocoa">Mocoa</option>
                                <option value="Montería">Montería</option>
                                <option value="Neiva">Neiva</option>
                                <option value="Pasto">Pasto</option>
                                <option value="Pereira">Pereira</option>
                                <option value="Popayán">Popayán</option>
                                <option value="Puerto Carreño">Puerto Carreño</option>
                                <option value="Puerto Inírida">Puerto Inírida</option>
                                <option value="Quibdó">Quibdó</option>
                                <option value="Riohacha">Riohacha</option>
                                <option value="San Andrés">San Andrés</option>
                                <option value="San José del Guaviare">San José del Guaviare</option>
                                <option value="Santa Marta">Santa Marta</option>
                                <option value="Sincelejo">Sincelejo</option>
                                <option value="Tunja">Tunja</option>
                                <option value="Valledupar">Valledupar</option>
                                <option value="Villavicencio">Villavicencio</option>
                                <option value="Yopal">Yopal</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <!-- highRange -->

                        <!-- lowRange -->

                        <div class="mb-3">
                          <label for="file" class="form-label">Archivo de diccionario de datos</label>
                          <input class="form-control" type="file" id="file" name="file">
                          <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">

                          <a target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4" type="button" href="https://mireview.api.ach.dyndns.info/api/matriz/diccionario/download">
                            Descargar Template
                          </a>
                        </div>

                        <!-- <button class="w-100 btn btn-lg btn-primary" type="submit">Enviar Datos</button> -->
                        <x-primary-button class="mt-4">Enviar Datos</x-primary-button>

                        <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>
                      </form>

                    </div>

                  </div>
                </div>
              </form>

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