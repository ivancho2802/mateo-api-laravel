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
            {{$activitiy->name_key}}
          </td>
          <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
            {{$activitiy->sector}}
          </td>
          <td class="grid_celda grid_row_activo" id="FECHA_ACTIV" data-nombre_celda="m_kobo_formularios_FECHA_ACTIV" style="width: 80px; min-width: 80px; cursor: pointer;">
            {{$activitiy->actividad}}
          </td>
          @if(optional($activitiy->download))
          <td class="grid_celda grid_row_activo" id="FECHA_ACTIV" data-nombre_celda="m_kobo_formularios_FECHA_ACTIV" style="width: 80px; min-width: 80px; cursor: pointer;">
            <a href="{{$activitiy->download}}" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
              </svg>
            </a>
          </td>
          @endif
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