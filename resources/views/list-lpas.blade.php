<head>
    <link rel="stylesheet" type="text/css" href="/herramientas/estilo/bootstrap/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/herramientas/estilo/nblue/estilo.css?609cdc1f744d8f00ccbd22e3179ff78c">
    <link rel="stylesheet" type="text/css" href="/variables.css?609cdc1f744d8f00ccbd22e3179ff78c">
    <link rel="stylesheet" type="text/css" href="/herramientas/estilo/bulma/bulma.min.css?609cdc1f744d8f00ccbd22e3179ff78c">
    <link rel="stylesheet" type="text/css" href="/herramientas/estilo/fontawesome/css/all.min.css">
</head>

<h4>Registros enviados: {{$record_excel}}</h4>
<h4>Registros guardados: {{count($mlpas)}}</h4>

<div id="grid_container_m_lpa" data-origen="auditoria_atendidas/m_lpa" class="grid_contenedor origen grid_activo container" data-grid="m_lpa" style="height: auto; min-height: 530px; z-index: 2; display: block;">
    <div id="grid_tabla" class="grid_cuadro_activo" style="overflow: hidden; width: 915px;">
        <table id="m_lpa_encabezado" class="table table-responsive">

            <thead class="text-center">
                <tr>
                    <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Codigo Actividad</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_0" data-campo="CODIGO" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Codigo Emergencia</div><span id="m_lpa_asc_0" class="ascendente" style="display:none"></span><span id="m_lpa_des_0" class="descendente" style="display:none"></span>
                    </td>

                    <td class="grid_encab" id="rm_lpa_1" data-campo="FECHA_ACTIV" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: center; text-align:center">Fecha ate.</div><span id="m_lpa_asc_1" class="ascendente" style="display:none"></span><span id="m_lpa_des_1" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_2" data-campo="ENTIDAD_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Proveedor</div><span id="m_lpa_asc_2" class="ascendente" style="display:none"></span><span id="m_lpa_des_2" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_3" data-campo="COMUNIDAD" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Representante</div><span id="m_lpa_asc_3" class="ascendente" style="display:none"></span><span id="m_lpa_des_3" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Monto</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Modo</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Donante</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">PROVEEDOR FINANCIERO</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">ID PERSONA</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                    <td class="grid_encab" id="rm_lpa_4" data-campo="STATUS" style="width: 80px; min-width: 80px; cursor: pointer;">
                        <div style=" float: left; text-align:left">Estatus</div><span id="m_lpa_asc_4" class="ascendente" style="display:none"></span><span id="m_lpa_des_4" class="descendente" style="display:none"></span>
                    </td>
                </tr>
            </thead>

            <tbody class="text-center">
                @forelse ($mlpas as $mlpa)
                <tr>
                    <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->COD_ACTIVIDAD}}
                    </td>
                    <td class="grid_celda grid_celda_resaltada" align="center" id="m_kobo_formularios_c_0" data-nombre_celda="m_kobo_formularios_FECHA_FORMULARIO" style="max-width: 80px; width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->emergencia->COD_EMERGENCIAS}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="FECHA_ACTIV" data-nombre_celda="m_kobo_formularios_FECHA_ACTIV" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->FECHA_ATENCION}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ENTIDAD_D" data-nombre_celda="m_kobo_formularios_ENTIDAD_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->PROVEEDOR_FINANCIERO}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="COMUNIDAD" data-nombre_celda="m_kobo_formularios_COMUNIDAD" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->REPRESENTANTE}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->MONTO_MENSUAL}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->MODO_ENTREGA}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->DONANTE}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->PROVEEDOR_FINANCIERO}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->FK_LPA_PERSONA}}
                    </td>
                    <td class="grid_celda grid_row_activo" id="ETNIA_D" data-nombre_celda="m_kobo_formularios_ETNIA_D" style="width: 80px; min-width: 80px; cursor: pointer;">
                        {{$mlpa->STATUS}}
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

{{$mlpas->links() }}