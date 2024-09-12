<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Parametros de finanzas adn fase 2
    </h2>
    @if(session()->has('error'))
    <div x-data="{ show: true}" x-show="show" class="position-fixed bg-danger rounded top-3 text-sm py-2 px-4">
      <p class="m-0 text-danger">Msg: {{ session('error')}}</p>
    </div>
    @endif

    @if(session()->has('success'))
    <div x-data="{ show: true}" x-show="show" class="position-fixed bg-success rounded top-3 text-sm py-2 px-4">
      <p class="m-0 text-dark">Msg: {{ session('success')}}</p>
    </div>
    @endif

  </x-slot>

  <div class="  mx-auto p-4 sm:p-6 lg:p-8">
    <table id="m_lpa_encabezado" class="table table-responsive table-bordered" style="    width: 100%;">

      <thead class="text-center  bg-info">
        <tr>
          <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: left; text-align:left">Presupuesto ACH</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
          </td>
          <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: left; text-align:left">Presupuesto total</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
          </td>

          <td class="grid_encab" id="rm_lpa_1" data-campo="FECHA_ACTIV" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: center; text-align:center">Otro dato</div><span id="m_lpa_asc_1" class="ascendente" style="display:none"></span><span id="m_lpa_des_1" class="descendente" style="display:none"></span>
          </td>

          <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: left; text-align:left">Dinero ahorrado por persona</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
          </td>
          <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: left; text-align:left">Grupo Ahorro</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
          </td>

          <td class="grid_encab" id="rm_lpa_1" data-campo="FECHA_ACTIV" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: center; text-align:center">Personas Bancarizadas</div><span id="m_lpa_asc_1" class="ascendente" style="display:none"></span><span id="m_lpa_des_1" class="descendente" style="display:none"></span>
          </td>

          <td class="grid_encab" id="rm_lpa_1" data-campo="FECHA_ACTIV" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: center; text-align:center">Tasa Cambio</div><span id="m_lpa_asc_1" class="ascendente" style="display:none"></span><span id="m_lpa_des_1" class="descendente" style="display:none"></span>
          </td>

          
        </tr>
      </thead>

      <tbody class="text-center">
        @forelse ($adns as $adn)
        <tr>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->presupuesto_ach}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->presupuesto_total}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->otro}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->dinero_ahorrado_x_persona}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->grupo_ahorro}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->personas_bancarizadas}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$adn->tasa_cambio}}
          </td>
        </tr>
        @empty
        <tr>
          <td class="text-center " colspan="9">Lo sentimos pero no hay resultados</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    <form method="post" action="/finanzas/adn" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
      @csrf

      <label for="exampleFormControlTextarea1" class="form-label">Presupuesto ACH: </label>
      <input type="text" placeholder="" id="presupuesto_ach" name="presupuesto_ach" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

      
      <label for="exampleFormControlTextarea1" class="form-label">Presupuesto total: </label>
      <input type="text" placeholder="" id="presupuesto_total" name="presupuesto_total" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

      
      <label for="exampleFormControlTextarea1" class="form-label">Otro dato: </label>
      <input type="text" placeholder="" id="otro" name="otro" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

      <label for="exampleFormControlTextarea1" class="form-label">Dinero ahorrado por persona: </label>
      <input type="text" placeholder="" id="dinero_ahorrado_x_persona" name="dinero_ahorrado_x_persona" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

      
      <label for="exampleFormControlTextarea1" class="form-label">Grupo Ahorro: </label>
      <input type="text" placeholder="" id="grupo_ahorro" name="grupo_ahorro" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

      
      <label for="exampleFormControlTextarea1" class="form-label">Personas Bancarizadas: </label>
      <input type="text" placeholder="" id="personas_bancarizadas" name="personas_bancarizadas" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">


      <label for="exampleFormControlTextarea1" class="form-label">Tasa Cambio: </label>
      <input type="text" placeholder="" id="tasa_cambio" name="personas_bancarizadas" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

      <br>

      <x-primary-button class="mt-4">Enviar Datos</x-primary-button>
    </form>


  </div>


</x-app-layout>