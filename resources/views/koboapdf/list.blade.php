<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Formulario de descargas masivas de PDF
    </h2>
  </x-slot>

  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <table id="m_lpa_encabezado" class="table table-responsive table-bordered">

      <thead class="text-center  bg-info">
        <tr>
          <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: left; text-align:left">Codigo Actividad</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
          </td>
          <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: left; text-align:left">Sector</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
          </td>

          <td class="grid_encab" id="rm_lpa_1" data-campo="FECHA_ACTIV" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            <div style=" float: center; text-align:center">Actividad</div><span id="m_lpa_asc_1" class="ascendente" style="display:none"></span><span id="m_lpa_des_1" class="descendente" style="display:none"></span>
          </td>
        </tr>
      </thead>

      <tbody class="text-center">
        @forelse ($activities as $activitiy)
        <tr>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$activitiy->cod}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$activitiy->sector}}
          </td>
          <td class="grid_celda grid_row_activo" id="FECHA_ACTIV" data-nombre_celda="m_kobo_formularios_FECHA_ACTIV" style="width: 80px; min-width: 80px; cursor: pointer;">
            {{$activitiy->actividad}}
          </td>
        </tr>
        @empty
        <tr>
          <td class="text-center " colspan="9">Lo sentimos pero no hay resultados</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</x-app-layout>