<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/ach/herramientas/estilo/bootstrap/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/ach/herramientas/estilo/nblue/estilo.css?609cdc1f744d8f00ccbd22e3179ff78c">
    <link rel="stylesheet" type="text/css" href="/ach/variables.css?609cdc1f744d8f00ccbd22e3179ff78c">
    <link rel="stylesheet" type="text/css" href="/ach/herramientas/estilo/bulma/bulma.min.css?609cdc1f744d8f00ccbd22e3179ff78c">
    <link rel="stylesheet" type="text/css" href="/ach/herramientas/estilo/fontawesome/css/all.min.css">
</head>

<div id="grid_container_m_lpa" data-origen="auditoria_atendidas/m_lpa" class="grid_contenedor origen grid_activo" data-grid="m_lpa" style="height: auto; min-height: 530px; z-index: 2; display: block;">
    <h4>Registros enviados: {{$record_excel}}</h4>
    <h4>Registros guardados: {{($record_saved)}}</h4>
    <div id="grid_tabla" class="grid_cuadro_activo" style="overflow: hidden; width: 915px;">
        <table id="m_lpa_encabezado table table-responsive table-bordered">
            <thead class="text-center  bg-info">
                <tr>
                    <td class="grid_encab" id="rm_lpa_9" data-campo="rango" style="width: 13px; min-width: 13px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Fecha Creacion</div>
                        <span id="m_lpa_asc_9" class="ascendente" style="display:none"></span>
                        <span id="m_lpa_des_9" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_0" data-campo="Org" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Organizaci&oacute;n que reporta</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_1" data-campo="Consecutivo" style="max-width: 50px; width: 50px; min-width: 50px; cursor: pointer;">
                        <div style=" float: center; text-align:center">Consecutivo casos</div><span id="m_lpa_asc_1" class="ascendente" style="display:none"></span><span id="m_lpa_des_1" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_2" data-campo="Mes" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Mes de reporte</div><span id="m_lpa_asc_2" class="ascendente" style="display:none"></span><span id="m_lpa_des_2" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_3" data-campo="Fecha" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Fecha de ingreso</div><span id="m_lpa_asc_3" class="ascendente" style="display:none"></span><span id="m_lpa_des_3" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="Canal" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Canal ingreso</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_5" data-campo="categoria" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Categor&iacute;a</div>
                        <span id="m_lpa_asc_5" class="ascendente" style="display:none"></span>
                        <span id="m_lpa_des_5" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_6" data-campo="subcategoria" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Subcategor&iacute;a</div>
                        <span id="m_lpa_asc_6" class="ascendente" style="display:none"></span>
                        <span id="m_lpa_des_6" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_7" data-campo="etnia" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Etnia</div>
                        <span id="m_lpa_asc_7" class="ascendente" style="display:none"></span>
                        <span id="m_lpa_des_7" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_8" data-campo="sexo" style="width: 100px; min-width: 100px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Sexo</div>
                        <span id="m_lpa_asc_8" class="ascendente" style="display:none"></span>
                        <span id="m_lpa_des_8" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_9" data-campo="rango" style="width: 13px; min-width: 13px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Rango Etario</div>
                        <span id="m_lpa_asc_9" class="ascendente" style="display:none"></span>
                        <span id="m_lpa_des_9" class="descendente" style="display:none"></span>
                    </td>
                </tr>
            </thead>

            <tbody class="text-center">
                @forelse ($mmqrs as $mmqr)
                <tr>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->created_at}}
                    </td>
                    <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mmqr->ORG_REPORT}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="FECHA_ACTIV" data-nombre_celda="m_kobo_formularios_FECHA_ACTIV" style="width: 50px; min-width: 50px; cursor: pointer;">
                        {{$mmqr->CONSECUTIVOS_CASES}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ENTIDAD_D" data-nombre_celda="m_kobo_formularios_ENTIDAD_D" style="width: 220px; min-width: 220px; cursor: pointer;">
                        {{$mmqr->MONTH_REPORT}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="COMUNIDAD" data-nombre_celda="m_kobo_formularios_COMUNIDAD" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->DATE_IN}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="COMUNIDAD" data-nombre_celda="m_kobo_formularios_COMUNIDAD" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->CHANNEL_IN}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->CATEGORY}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->SUB_CATEGORY}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->ETNIA}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->SEXO}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 90px; min-width: 90px; cursor: pointer;">
                        {{$mmqr->RANGE_EDAD}}
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
</div>

{{$mmqrs->links() }}