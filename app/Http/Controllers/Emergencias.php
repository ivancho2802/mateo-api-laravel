<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\helper;
use Illuminate\Support\Facades\DB;
use App\Models\MLpaEmergencia;

class Emergencias extends Controller
{
    //
    
    function fuente(Request $request){

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000);//0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        DB::setDefaultConnection('firebird'); 

        $resultados = DB::select("select CODIGO, ESTAT, cast(cast(DPTO as blob sub_type text character set ISO8859_1) as varchar(2000)) DEPARTAMENTO, cast(cast(MUNICIP as blob sub_type text character set ISO8859_1) as varchar(2000)) MUNICIP, cast(cast(ESTADO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000))ESTADO_EMERGENCIA, cast(cast(TIPO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000)) TIPO_EMERGENCIA, cast(cast(fecha_evento as blob sub_type text character set ISO8859_1) as varchar(2000)) fecha_evento, cast(cast(fuente as blob sub_type text character set ISO8859_1) as varchar(2000)) fuente, cast(cast(FECHA_ALERTA as blob sub_type text character set ISO8859_1) as varchar(2000)) FECHA_ALERTA from ( select CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA,M_KOBO_RESPUESTAS.XVALOR fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO, fuente from ( select CODIGO, ESTAT, ESTADO_EMERGENCIA, TIPO_EMERGENCIA, M_KOBO_RESPUESTAS.XVALOR fuente,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO from ( SELECT CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR FECHA_ALERTA, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO FROM ( SELECT CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO FROM( SELECT M_KOBO_RESPUESTAS.XVALOR TIPO_EMERGENCIA, m_kobo_formularios.xCODIGO_ALERTA CODIGO, m_kobo_formularios.fecha FECHA_RECEPCION, M_KOBO_FORMULARIOS.MUNICIPIO MUNICIP, M_KOBO_FORMULARIOS.DEPARTAMENTO DPTO, M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IDFORM, m_kobo_formularios.ESTATUS ESTAT FROM M_KOBO_RESPUESTAS INNER JOIN M_KOBO_FORMULARIOS ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001475' and m_kobo_formularios.id_m_formularios='0011' ) INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012173' ) INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001428' ) INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001467' ) INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001477' )    ");
        
        $resultados = helper::convert_from_latin1_to_utf8_recursively($resultados);

        $resultados = collect($resultados);

        /* $resultadosGruped = $resultados->groupBy('ID_M_KOBO_FORMULARIOS');

        $formularioNew = collect();
        $formulariosNew = collect([]);

        //$formulariosNew->keys();

        $formularioNew = $resultadosGruped->map(function ($valor, $key) use ($formularioNew, $formulariosNew) {

            $objectFormulario = collect();

            $valorFormated = $valor->each( function ($item) use ($objectFormulario){
                $objectFormulario[$item->ROTULO] = $item->VALOR;
                if($item->ROTULO == '1. Codigo' && empty($item->VALOR)){
                    $objectFormulario[$item->ROTULO] = $item->CODIGO_ALERTA;
                }
            });

            $formulariosNew->push($objectFormulario);

            return $objectFormulario;
            ['status' => true, 'data' => ($formulariosNew), 'total' => ($formularioNew)]
        }); */

        return response()->json($resultados);

    }

    
    function ruralurbano(Request $request){

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000);//0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        DB::setDefaultConnection('firebird'); 

        $resultados = DB::select("SELECT 	m_kobo_formularios.xCODIGO_ALERTA CODIGO, 	M_KOBO_FORMULARIOS.MUNICIPIO,  	M_KOBO_FORMULARIOS.DEPARTAMENTO,         M_KOBO_FORMULARIOS.ESTATUS, cast(cast(M_KOBO_RESPUESTAS.XVALOR as blob sub_type text character set ISO8859_1) as varchar(2000)) Urbano_Rural FROM M_KOBO_RESPUESTAS INNER JOIN M_KOBO_FORMULARIOS ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001681'        ");
        
        $resultados = helper::convert_from_latin1_to_utf8_recursively($resultados);

        $resultados = collect($resultados);

        /* $resultadosGruped = $resultados->groupBy('ID_M_KOBO_FORMULARIOS');

        $formularioNew = collect();
        $formulariosNew = collect([]);

        //$formulariosNew->keys();

        $formularioNew = $resultadosGruped->map(function ($valor, $key) use ($formularioNew, $formulariosNew) {

            $objectFormulario = collect();

            $valorFormated = $valor->each( function ($item) use ($objectFormulario){
                $objectFormulario[$item->ROTULO] = $item->VALOR;
                if($item->ROTULO == '1. Codigo' && empty($item->VALOR)){
                    $objectFormulario[$item->ROTULO] = $item->CODIGO_ALERTA;
                }
            });

            $formulariosNew->push($objectFormulario);

            return $objectFormulario;
            ['status' => true, 'data' => ($formulariosNew), 'total' => ($formularioNew)]
        }); */

        return response()->json($resultados);

    }

    
    function crucesector(Request $request){

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000);//0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        DB::setDefaultConnection('firebird'); 

        $resultados = DB::select("select      codigo, dpto,MUNICIP,     cast(cast(TIPO_EMERG as blob sub_type text character set ISO8859_1) as varchar(2000)) TIPO_EMERG,     cast(cast(FECHA_CIERRE as blob sub_type text character set ISO8859_1) as varchar(2000)) FECHA_CIERRE, CASE WHEN      POSITION ('PROTECCION', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION EN ERN\", CASE WHEN      POSITION ('PROTECCION-ICLA', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION ICLA EN ERN\", CASE WHEN      POSITION ('PROTECCION_-VBG', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION VBG EN ERN\", CASE WHEN      POSITION ('PROTECCION_-NNAJ', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION NNAJ EN ERN\", CASE WHEN      POSITION ('PROTECCION_-PR', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION PR EN ERN\", CASE WHEN      POSITION ('SALUD', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"SALUD  EN ERN\", CASE WHEN      POSITION ('SAN', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"SAN  EN ERN\", CASE WHEN      POSITION ('SHELTER', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"SHELTER EN ERN\", CASE WHEN      POSITION (' EDUCACION ', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"EDUCACION EN ERN\", CASE WHEN      POSITION ('WASH', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"WASH EN ERN\", CASE WHEN      POSITION ('WASH_IPC', SECTORES_NECESIDAD)<>0 THEN 'SI'      ELSE 'NO'      END AS \"WASH IPC EN ERN\", CASE WHEN      POSITION ('Proteccion', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION EN RTA\", CASE WHEN      POSITION ('R1_Proteccion', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION ICLA EN RTA\", CASE WHEN      POSITION ('R1_Proteccion_VBG', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION VBG EN RTA\", CASE WHEN      POSITION ('R1_Proteccion_PR', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION PR EN RTA\", CASE WHEN      POSITION ('R1_Proteccion_NNAJ', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"PROTECCION NNAJ EN RTA\", CASE WHEN      POSITION ('R6_Salud', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"SALUD  EN RTA\", CASE WHEN      POSITION ('R5_Seguridad_alimentaria_y_medios_de_vid', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"SAN  EN RTA\", CASE WHEN      POSITION ('R3_Shelter', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"SHELTER EN RTA\", CASE WHEN      POSITION ('R.2_EeE', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"EDUCACION EN RTA\", CASE WHEN      POSITION ('R4_Wash', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"WASH EN RTA\", CASE WHEN      POSITION ('R4_Wash_IPC', SECTORES_RTA)<>0 THEN 'SI'      ELSE 'NO'      END AS \"WASH IPC EN RTA\" FROM (           SELECT codigo, M_KOBO_FORMULARIOS.departamento as dpto, M_KOBO_FORMULARIOS.MUNICIPIO as MUNICIP, TIPO_EMERG,sectores_necesidad, M_KOBO_RESPUESTAS.XVALOR FECHA_CIERRE, sectores_rta           FROM (           SELECT codigo, M_KOBO_FORMULARIOS.departamento as dpto, M_KOBO_FORMULARIOS.MUNICIPIO as MUNICIP, TIPO_EMERG,sectores_necesidad, M_KOBO_RESPUESTAS.XVALOR sectores_rta           FROM (                SELECT TIPO_EMERG,codigo, M_KOBO_RESPUESTAS.XVALOR sectores_necesidad,IDFORM                from (                     SELECT M_KOBO_RESPUESTAS.XVALOR TIPO_EMERG,m_kobo_formularios.xCODIGO_ALERTA codigo,                     M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS IDFORM                     FROM M_KOBO_RESPUESTAS INNER JOIN M_KOBO_FORMULARIOS                     ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS                     WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001238' AND M_KOBO_FORMULARIOS.ESTATUS<>'ANULADO')                inner join M_KOBO_RESPUESTAS on M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=IDFORM                WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001313')           INNER JOIN M_KOBO_FORMULARIOS on codigo=M_KOBO_FORMULARIOS.XCODIGO_ALERTA           INNER JOIN M_KOBO_RESPUESTAS ON M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS           WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='00144')           INNER JOIN M_KOBO_FORMULARIOS on codigo=M_KOBO_FORMULARIOS.XCODIGO_ALERTA           INNER JOIN M_KOBO_RESPUESTAS ON M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS           WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0014')");
        
        $resultados = helper::convert_from_latin1_to_utf8_recursively($resultados);

        $resultados = collect($resultados);
 

        return response()->json($resultados);

    }

    
    function fce(Request $request){

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000);//0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        DB::setDefaultConnection('firebird'); 

        $resultados = DB::select("SELECT codigo,departamento, municipio, Sectores_intervencion, cast(cast(M_KOBO_RESPUESTAS.XVALOR as blob sub_type text character set ISO8859_1) as varchar(2000)) comunidades from ( SELECT m_kobo_formularios.xCODIGO_ALERTA codigo, m_kobo_formularios.municipio municipio, m_kobo_formularios.departamento departamento, cast(cast(M_KOBO_RESPUESTAS.XVALOR as blob sub_type text character set ISO8859_1) as varchar(2000)) Sectores_intervencion, M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS IDFORM FROM M_KOBO_RESPUESTAS INNER JOIN M_KOBO_FORMULARIOS ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='00144') inner join M_KOBO_RESPUESTAS on M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=IDFORM WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001724'        ");
        
        $resultados = helper::convert_from_latin1_to_utf8_recursively($resultados);

        $resultados = collect($resultados);
 

        return response()->json($resultados);

    }

    function getEmergenciaByCod(Request $request){
        $emergencia = MLpaEmergencia::where("ID", "=", $request->ID)
        ->get();

        return [
            "emergencia" => $emergencia
        ];
    }
    
}
