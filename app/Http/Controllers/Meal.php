<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;
use App\Models\MMqr;
use App\Models\MFormulario;
use App\Models\MKoboRespuestas;
use App\Models\Activities;
use App\Models\Analisis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class Meal extends Controller
{
    //
    public function paginateCollection($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator(array_values($items->forPage($page, $perPage)->toArray()), $items->count(), $perPage, $page, $options);
        //ref for array_values() fix: https://stackoverflow.com/a/38712699/3553367
    }

    function getLpa(Request $request)
    {
        
        $limit_minutes = 800;
        ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
        ini_set('memory_limit', '2044M');
        set_time_limit($limit_minutes); //0
        ini_set('max_execution_time', '' . $limit_minutes . '');
        ini_set('max_input_time', '' . $limit_minutes . '');

        if ($request->pagination) {
            $mlpas = MLpa::paginate(5);//where("FECHA_ATENCION", ">=", "2024-01-01")->
            $mlpas->load(['emergencia', 'actividad']);
            return $mlpas;
        } else {
            $mlpas = MLpa::get();//where("FECHA_ATENCION", ">=", "2024-01-01")
        }

        //PONER LA PERSONA CON SU EDAD
        //=SI($O2="";"";SI(SIFECHA($O2;Lista!$V$2;"y")=122;"";SIFECHA($O2;Lista!$V$2;"y")))
        //PONER QUE SALGA LA FECHA
        //"Rango ECHO"
        //=SI(AM2="";"";SI(AM2<=5;"0 to 5";SI(AM2<=17;"6 to 17";SI(AM2<=49;"18 to 49";SI(AM2>=50;"> 50")))))
        //"Rango BHA"
        //=SI(AM2="";"";SI(AM2<=4;"0 to 4";SI(AM2<=9;"5 to 9";SI(AM2<=14;"10 to 14";SI(AM2<=18;"15 to 18";SI(AM2<=29;"19 to 29";SI(AM2<=59;"30 to 59";SI(AM2>=60;"> 60"))))))))

        $mlpas->load(['emergencia', 'actividad', 'persona']);

        /* DB::setDefaultConnection('odbc');

        $erns = DB::select("SELECT 
        ID_M_KOBO_FORMULARIOS,
        ID_M_USUARIOS,        
        FECHA,   
        FECHA_REGISTRO,  
        ID, 
        ESTATUS,     
        ID_M_FORMULARIOS, 
        FECHA_FORMULARIO,
        UID, 
        FUID, 
        NOMBRE_FORMULARIO, 
        GRUPO, 
        NOMBRE_ESTATUS, 
        NOMBRE_USUARIO, 
        FECHA_ESTADISTICA, 
        REGION,    
        DEPARTAMENTO, 
        MUNICIPIO, 
        CODIGO_ALERTA
        FROM V_M_KOBO_FORMULARIOS WHERE ID_M_FORMULARIOS = '0012';"); */

        $mlpasFormated = $mlpas->map(function ( $lpa) {
            $lpa->persona->append('edad');
            $lpaArray = $lpa->toArray();
            $lpaDoted = Arr::dot($lpaArray); 
            return  $lpaDoted;
        });

        $flattenedMlpas =  ($mlpasFormated);

        return [
            "lpas" => $flattenedMlpas,
            "analisis" => Analisis::where(["type" => "LPA"])->get(),
            //"erns" => $erns
        ];
    }

    /**
     * CONSULTA DE SEGUIMIENTO PARA UNA SOLICITUD DE MARIA Y LAS MUCHACHAS PARA SEGUIMIENTO
     */
    function getLpaSeg(Request $request)
    {
        if ($request->pagination) {
            $mlpas = MLpa::paginate(5);//where("FECHA_ATENCION", ">=", "2024-01-01")->
            $mlpas->load(['emergencia', 'actividad']);
            return $mlpas;
        } else {

            $limit_minutes = 10000;
            ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
            ini_set('memory_limit', '2044M');
            set_time_limit($limit_minutes); //0
            ini_set('max_execution_time', '' . $limit_minutes . '');
            ini_set('max_input_time', '' . $limit_minutes . '');


            $mlpas = MLpa::get();//where("FECHA_ATENCION", ">=", "2024-01-01")->
        }

        //PONER LA PERSONA CON SU EDAD
        //=SI($O2="";"";SI(SIFECHA($O2;Lista!$V$2;"y")=122;"";SIFECHA($O2;Lista!$V$2;"y")))
        //PONER QUE SALGA LA FECHA
        //"Rango ECHO"
        //=SI(AM2="";"";SI(AM2<=5;"0 to 5";SI(AM2<=17;"6 to 17";SI(AM2<=49;"18 to 49";SI(AM2>=50;"> 50")))))
        //"Rango BHA"
        //=SI(AM2="";"";SI(AM2<=4;"0 to 4";SI(AM2<=9;"5 to 9";SI(AM2<=14;"10 to 14";SI(AM2<=18;"15 to 18";SI(AM2<=29;"19 to 29";SI(AM2<=59;"30 to 59";SI(AM2>=60;"> 60"))))))))

        $mlpas->load(['emergencia', 'actividad', 'persona']);

        /* DB::setDefaultConnection('odbc');

        $erns = DB::select("SELECT 
        ID_M_KOBO_FORMULARIOS,
        ID_M_USUARIOS,        
        FECHA,   
        FECHA_REGISTRO,  
        ID, 
        ESTATUS,     
        ID_M_FORMULARIOS, 
        FECHA_FORMULARIO,
        UID, 
        FUID, 
        NOMBRE_FORMULARIO, 
        GRUPO, 
        NOMBRE_ESTATUS, 
        NOMBRE_USUARIO, 
        FECHA_ESTADISTICA, 
        REGION,    
        DEPARTAMENTO, 
        MUNICIPIO, 
        CODIGO_ALERTA
        FROM V_M_KOBO_FORMULARIOS WHERE ID_M_FORMULARIOS = '0012';"); */

        $mlpasFormated = $mlpas->map(function ( $lpa) {
            $lpa->persona->append('edad');
            $lpaArray = $lpa->toArray();
            $lpaDoted = Arr::dot($lpaArray); 
            return  $lpaDoted;
        });

        $flattenedMlpas =  ($mlpasFormated);

        return [
            "lpas" => $flattenedMlpas,
            "analisis" => Analisis::where(["type" => "LPA"])->get(),
            //"erns" => $erns
        ];
    }

    

    /**
     * funcion para generar graficos en mire sys
     * params inicio
        //params inicio https://mireview.ach.dyndns.info/ach/herramientas/genera_json/genera_json.php?tabla=V_M_GRAFICOS&campos=*&busca=CLASE&xbusca=LPA&filtro=REGISTROS&xfiltro=0&xoperadores=>&limite=1000&orden=ORDEN
     * 
     * resuktado
    {
        "tabla": {
            "registro": [{
                "QUERY": "SELECT ROTULO, COUNT(1) AS VALOR1,0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5 FROM( SELECT M_LPA_DISCAP.XDESCRIPCION AS ROTULO, M_LPA.TIPO_IDENTIF, M_LPA_TIPO_IDENTIF.XDESCRIPCION AS NOMBRE_TIPO_IDENTIF, M_LPA.NUM_IDENTIF FROM M_LPA LEFT JOIN M_LPA_TIPO_IDENTIF ON (M_LPA_TIPO_IDENTIF.TIPO_IDENTIF_ID = M_LPA.TIPO_IDENTIF) LEFT JOIN M_LPA_DISCAP ON (M_LPA_DISCAP.DISCAP_ID = M_LPA.DISCAP_ID) WHERE M_LPA.FECHA_ACTIV BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND M_LPA.DEPARTAMENTO LIKE '%{DEPARTAMENTO}%' GROUP BY ROTULO,TIPO_IDENTIF,NOMBRE_TIPO_IDENTIF,NUM_IDENTIF ) GROUP BY ROTULO"
                "XQUERY": "SELECT ROTULO, COUNT(1) AS VALOR1,0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5 FROM( SELECT M_LPA_DISCAP.XDESCRIPCION AS ROTULO, M_LPA.TIPO_IDENTIF, M_LPA_TIPO_IDENTIF.XDESCRIPCION AS NOMBRE_TIPO_IDENTIF, M_LPA.NUM_IDENTIF FROM M_LPA LEFT JOIN M_LPA_TIPO_IDENTIF ON (M_LPA_TIPO_IDENTIF.TIPO_IDENTIF_ID = M_LPA.TIPO_IDENTIF) LEFT JOIN M_LPA_DISCAP ON (M_LPA_DISCAP.DISCAP_ID = M_LPA.DISCAP_ID) WHERE M_LPA.FECHA_ACTIV BETWEEN '2020-01-01' AND '2024-02-22' AND M_LPA.DEPARTAMENTO LIKE '%%' GROUP BY ROTULO,TIPO_IDENTIF,NOMBRE_TIPO_IDENTIF,NUM_IDENTIF ) GROUP BY ROTULO"
            }],
            "query": {
                "sql": "SELECT * FROM (SELECT * FROM V_M_GRAFICOS WHERE CLASE LIKE 'LPA%'  AND REGISTROS>'0' ) ORDER BY ORDEN ROWS 1 TO 1000"
            },
            "atributos": {
                "FECHA": {
                    "TIPO": "D",
                    "LONGITUD": "10"
                },
                "FECHA_H": {
                    "TIPO": "T",
                    "LONGITUD": "8"
                },
                "FECHA_REGISTRO": {
                    "TIPO": "D",
                    "LONGITUD": "10"
                },
                "FECHA_REGISTRO_H": {
                    "TIPO": "T",
                    "LONGITUD": "8"
                },
                "ID": {
                    "TIPO": "I",
                    "LONGITUD": "4"
                },
                "FECHA_DESDE": {
                    "TIPO": "D",
                    "LONGITUD": "4"
                },
                "FECHA_HASTA": {
                    "TIPO": "D",
                    "LONGITUD": "4"
                },
                "ID_M_GRAFICOS": {
                    "TIPO": "C",
                    "LONGITUD": "16"
                },
                "ID_M_USUARIOS": {
                    "TIPO": "C",
                    "LONGITUD": "16"
                },
                "DESCRIPCION": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "TITULO": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "TITULOX": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "TITULOY": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "QUERY": {
                    "TIPO": "C",
                    "LONGITUD": "25000"
                },
                "XQUERY": {
                    "TIPO": "C",
                    "LONGITUD": "10000"
                },
                "FORMULARIO": {
                    "TIPO": "C",
                    "LONGITUD": "20000"
                },
                "FORMA": {
                    "TIPO": "C",
                    "LONGITUD": "60"
                },
                "TIPO": {
                    "TIPO": "C",
                    "LONGITUD": "60"
                },
                "SERIE1": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE2": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE3": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE4": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE5": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "ESTATUS": {
                    "TIPO": "C",
                    "LONGITUD": "3"
                },
                "CONDICION1": {
                    "TIPO": "C",
                    "LONGITUD": "1"
                },
                "COMENTARIOS": {
                    "TIPO": "C",
                    "LONGITUD": "1000"
                },
                "CLASE": {
                    "TIPO": "C",
                    "LONGITUD": "20"
                },
                "ORDEN": {
                    "TIPO": "I",
                    "LONGITUD": "4"
                },
                "NOMBRE_ESTATUS": {
                    "TIPO": "C",
                    "LONGITUD": "30"
                },
                "NOMBRE_USUARIO": {
                    "TIPO": "C",
                    "LONGITUD": "121"
                },
                "REGISTROS": {
                    "TIPO": "I",
                    "LONGITUD": "4"
                }
            },
            "totales": {
                "FECHA": "",
                "FECHA_REGISTRO": "",
                "ID": "",
                "FECHA_DESDE": "",
                "FECHA_HASTA": "",
                "ID_M_GRAFICOS": "",
                "ID_M_USUARIOS": "",
                "DESCRIPCION": "",
                "TITULO": "",
                "TITULOX": "",
                "TITULOY": "",
                "QUERY": "",
                "XQUERY": "",
                "FORMULARIO": "",
                "FORMA": "",
                "TIPO": "",
                "SERIE1": "",
                "SERIE2": "",
                "SERIE3": "",
                "SERIE4": "",
                "SERIE5": "",
                "ESTATUS": "",
                "CONDICION1": "",
                "COMENTARIOS": "",
                "CLASE": "",
                "ORDEN": "",
                "NOMBRE_ESTATUS": "",
                "NOMBRE_USUARIO": "",
                "REGISTROS": ""
            } 
        }
    }
    * resultados lleno
    {
        "tabla": {
            "registro": [
                {
                    "FECHA_H": "10:19:56",
                    "FECHA": "08/04/2024",
                    "FECHA_REGISTRO_H": "18:31:51",
                    "FECHA_REGISTRO": "04/03/2021",
                    "ID": "6",
                    "FECHA_DESDE": "01/01/2020",
                    "FECHA_HASTA": "08/04/2024",
                    "ID_M_GRAFICOS": "0016",
                    "ID_M_USUARIOS": "001152",
                    "DESCRIPCION": "ERN - NúMERO DE ERN REALIZADAS POR FECHA",
                    "TITULO": "",
                    "TITULOX": "MESES",
                    "TITULOY": "CANTIDAD",
                    "QUERY": "SELECT ROTULO, VALOR1,VALOR2, VALOR3, VALOR4, VALOR5\nFROM(\nSELECT EXTRACT(YEAR FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)||'-'||\n       CASE\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '01' THEN 'ENERO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '02' THEN 'FEBRERO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '03' THEN 'MARZO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '04' THEN 'ABRIL'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '05' THEN 'MAYO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '06' THEN 'JUNIO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '07' THEN 'JULIO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '08' THEN 'AGOSTO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '09' THEN 'SEPTIEMBRE'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '10' THEN 'OCTUBRE'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '11' THEN 'NOVIEMBRE'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '12' THEN 'DICIEMBRE'\n      END AS ROTULO\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'AFECTA%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR1\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESPLAZAMIENTO%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR2\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%CONFINAMIENTO%' AND M_KOBO_RESPUESTAS.XVALOR NOT LIKE '%COVID%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR3\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESASTRE%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR4\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR ='OTRA' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR5\n       --COUNT(1) AS VALOR1, 0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5\nFROM M_KOBO_RESPUESTAS\nLEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\nWHERE  M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IN(\n       SELECT M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS AS ID_M_KOBO_FORMULARIOS\n       FROM M_KOBO_RESPUESTAS\n       LEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\n       LEFT JOIN P_FORMULARIOS ON (P_FORMULARIOS.ID_P_FORMULARIOS = M_KOBO_RESPUESTAS.ID_P_FORMULARIOS)\n       WHERE M_KOBO_FORMULARIOS.FECHA_ESTADISTICA BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' \n       AND M_KOBO_FORMULARIOS.ID_M_FORMULARIOS = '0012'\n       AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS  ='001238'\n       AND M_KOBO_FORMULARIOS.ESTATUS = 'VERIFICADO'\n       AND M_KOBO_FORMULARIOS.DEPARTAMENTO LIKE '%{DEPARTAMENTO}%'\n       AND M_KOBO_RESPUESTAS.XVALOR LIKE '%{TIPO_EMERGENCIA}%'\n       )\nGROUP BY EXTRACT(YEAR FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA),EXTRACT(MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)\n)",
                    "XQUERY": "SELECT ROTULO, VALOR1,VALOR2, VALOR3, VALOR4, VALOR5\nFROM(\nSELECT EXTRACT(YEAR FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)||'-'||\n       CASE\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '01' THEN 'ENERO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '02' THEN 'FEBRERO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '03' THEN 'MARZO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '04' THEN 'ABRIL'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '05' THEN 'MAYO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '06' THEN 'JUNIO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '07' THEN 'JULIO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '08' THEN 'AGOSTO'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '09' THEN 'SEPTIEMBRE'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '10' THEN 'OCTUBRE'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '11' THEN 'NOVIEMBRE'\n          WHEN EXTRACT (MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)= '12' THEN 'DICIEMBRE'\n      END AS ROTULO\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'AFECTA%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR1\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESPLAZAMIENTO%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR2\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%CONFINAMIENTO%' AND M_KOBO_RESPUESTAS.XVALOR NOT LIKE '%COVID%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR3\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESASTRE%' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR4\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR ='OTRA' AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001238',1,0) ) AS VALOR5\n       --COUNT(1) AS VALOR1, 0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5\nFROM M_KOBO_RESPUESTAS\nLEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\nWHERE  M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IN(\n       SELECT M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS AS ID_M_KOBO_FORMULARIOS\n       FROM M_KOBO_RESPUESTAS\n       LEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\n       LEFT JOIN P_FORMULARIOS ON (P_FORMULARIOS.ID_P_FORMULARIOS = M_KOBO_RESPUESTAS.ID_P_FORMULARIOS)\n       WHERE M_KOBO_FORMULARIOS.FECHA_ESTADISTICA BETWEEN '01/01/2021' AND '12/30/2023' \n       AND M_KOBO_FORMULARIOS.ID_M_FORMULARIOS = '0012'\n       AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS  ='001238'\n       AND M_KOBO_FORMULARIOS.ESTATUS = 'VERIFICADO'\n       AND M_KOBO_FORMULARIOS.DEPARTAMENTO LIKE '%%'\n       AND M_KOBO_RESPUESTAS.XVALOR LIKE '%%'\n       )\nGROUP BY EXTRACT(YEAR FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA),EXTRACT(MONTH FROM M_KOBO_FORMULARIOS.FECHA_ESTADISTICA)\n)",
                    "FORMULARIO": "",
                    "FORMA": "bar",
                    "TIPO": "",
                    "SERIE1": "AFECTACION MULTIPLE",
                    "SERIE2": "DESPLAZAMIENTO MASIVO",
                    "SERIE3": "CONFINAMIENTO",
                    "SERIE4": "DESASTRES",
                    "SERIE5": "OTRA",
                    "ESTATUS": "ACT",
                    "CONDICION1": "",
                    "COMENTARIOS": "",
                    "CLASE": "ERN",
                    "ORDEN": "1",
                    "NOMBRE_ESTATUS": "ACTIVO",
                    "NOMBRE_USUARIO": "IVAN ORLANDO DÍAZ",
                    "REGISTROS": "27",
                    "registro": "1"
                },
                {
                    "FECHA_H": "10:20:07",
                    "FECHA": "08/04/2024",
                    "FECHA_REGISTRO_H": "14:47:42",
                    "FECHA_REGISTRO": "12/04/2021",
                    "ID": "34",
                    "FECHA_DESDE": "01/01/2020",
                    "FECHA_HASTA": "08/04/2024",
                    "ID_M_GRAFICOS": "00134",
                    "ID_M_USUARIOS": "001152",
                    "DESCRIPCION": "ERN - ERN POR REGION",
                    "TITULO": "",
                    "TITULOX": "REGIONES",
                    "TITULOY": "CANTIDADES",
                    "QUERY": "SELECT ROTULO, VALOR1,VALOR2, VALOR3, VALOR4, VALOR5\nFROM(\nSELECT M_KOBO_FORMULARIOS.REGION AS ROTULO\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'AFECTA%',1,0) ) AS VALOR1\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESPLAZAMIENTO%',1,0) ) AS VALOR2\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%CONFINAMIENTO%' AND M_KOBO_RESPUESTAS.XVALOR NOT LIKE '%COVID%',1,0) ) AS VALOR3\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESASTRE%',1,0) ) AS VALOR4\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR ='OTRA',1,0) ) AS VALOR5\n       --COUNT(1) AS VALOR1, 0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5\nFROM M_KOBO_RESPUESTAS\nLEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\n--LEFT JOIN M_LOCALIDADES ON (M_LOCALIDADES.DEPARTAMENTO = M_KOBO_FORMULARIOS.DEPARTAMENTO)\nWHERE  M_KOBO_RESPUESTAS.ID_P_FORMULARIOS  ='001238'\n       AND M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IN(\n       SELECT M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS AS ID_M_KOBO_FORMULARIOS\n       FROM M_KOBO_RESPUESTAS\n       LEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\n       LEFT JOIN P_FORMULARIOS ON (P_FORMULARIOS.ID_P_FORMULARIOS = M_KOBO_RESPUESTAS.ID_P_FORMULARIOS)\n       WHERE M_KOBO_FORMULARIOS.FECHA_ESTADISTICA BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}'  \n       AND M_KOBO_FORMULARIOS.ID_M_FORMULARIOS = '0012'\n       AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS  ='001238'\n       AND M_KOBO_FORMULARIOS.ESTATUS = 'VERIFICADO'\n       AND M_KOBO_FORMULARIOS.ESTATUS = 'VERIFICADO'\n       AND M_KOBO_FORMULARIOS.DEPARTAMENTO LIKE '%{REGION}%'\n       AND M_KOBO_RESPUESTAS.XVALOR LIKE '%{TIPO_EMERGENCIA}%'\n       )\nGROUP BY M_KOBO_FORMULARIOS.REGION\n)",
                    "XQUERY": "SELECT ROTULO, VALOR1,VALOR2, VALOR3, VALOR4, VALOR5\nFROM(\nSELECT M_KOBO_FORMULARIOS.REGION AS ROTULO\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'AFECTA%',1,0) ) AS VALOR1\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESPLAZAMIENTO%',1,0) ) AS VALOR2\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%CONFINAMIENTO%' AND M_KOBO_RESPUESTAS.XVALOR NOT LIKE '%COVID%',1,0) ) AS VALOR3\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR LIKE'%DESASTRE%',1,0) ) AS VALOR4\n      , SUM(IIF(M_KOBO_RESPUESTAS.XVALOR ='OTRA',1,0) ) AS VALOR5\n       --COUNT(1) AS VALOR1, 0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5\nFROM M_KOBO_RESPUESTAS\nLEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\n--LEFT JOIN M_LOCALIDADES ON (M_LOCALIDADES.DEPARTAMENTO = M_KOBO_FORMULARIOS.DEPARTAMENTO)\nWHERE  M_KOBO_RESPUESTAS.ID_P_FORMULARIOS  ='001238'\n       AND M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IN(\n       SELECT M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS AS ID_M_KOBO_FORMULARIOS\n       FROM M_KOBO_RESPUESTAS\n       LEFT JOIN M_KOBO_FORMULARIOS ON (M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS = M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS)\n       LEFT JOIN P_FORMULARIOS ON (P_FORMULARIOS.ID_P_FORMULARIOS = M_KOBO_RESPUESTAS.ID_P_FORMULARIOS)\n       WHERE M_KOBO_FORMULARIOS.FECHA_ESTADISTICA BETWEEN '01/01/2021' AND '12/30/2023'  \n       AND M_KOBO_FORMULARIOS.ID_M_FORMULARIOS = '0012'\n       AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS  ='001238'\n       AND M_KOBO_FORMULARIOS.ESTATUS = 'VERIFICADO'\n       AND M_KOBO_FORMULARIOS.ESTATUS = 'VERIFICADO'\n       AND M_KOBO_FORMULARIOS.DEPARTAMENTO LIKE '%%'\n       AND M_KOBO_RESPUESTAS.XVALOR LIKE '%%'\n       )\nGROUP BY M_KOBO_FORMULARIOS.REGION\n)",
                    "FORMULARIO": "",
                    "FORMA": "bar",
                    "TIPO": "",
                    "SERIE1": "AFECTACION MULTIPLE",
                    "SERIE2": "DESPLAZAMIENTO",
                    "SERIE3": "CONFINAMIENTO",
                    "SERIE4": "DESASTRE",
                    "SERIE5": "OTRA",
                    "ESTATUS": "ACT",
                    "CONDICION1": "",
                    "COMENTARIOS": "ERN POR REGIóN\nRóTULO: A. IDENTIFICACIÓN DE LA EMERGENCIA/4. REGIóN\nRóTULO: A. IDENTIFICACIÓN DE LA EMERGENCIA/9. ¿TIPO DE EMERGENCIA? \nUTILIZAR EL LISTADO DE DEPARTAMENTOS Y REGIONES QUE ACOMPAñA.",
                    "CLASE": "ERN",
                    "ORDEN": "5",
                    "NOMBRE_ESTATUS": "ACTIVO",
                    "NOMBRE_USUARIO": "IVAN ORLANDO DÍAZ",
                    "REGISTROS": "6",
                    "registro": "2"
                }   
            ],
            "query": {
                "sql": "SELECT * FROM (SELECT * FROM V_M_GRAFICOS WHERE CLASE LIKE 'ERN%'  AND REGISTROS>'0' ) ORDER BY ORDEN ROWS 1 TO 1000"
            },
            "atributos": {
                "FECHA": {
                    "TIPO": "D",
                    "LONGITUD": "10"
                },
                "FECHA_H": {
                    "TIPO": "T",
                    "LONGITUD": "8"
                },
                "FECHA_REGISTRO": {
                    "TIPO": "D",
                    "LONGITUD": "10"
                },
                "FECHA_REGISTRO_H": {
                    "TIPO": "T",
                    "LONGITUD": "8"
                },
                "ID": {
                    "TIPO": "I",
                    "LONGITUD": "4"
                },
                "FECHA_DESDE": {
                    "TIPO": "D",
                    "LONGITUD": "4"
                },
                "FECHA_HASTA": {
                    "TIPO": "D",
                    "LONGITUD": "4"
                },
                "ID_M_GRAFICOS": {
                    "TIPO": "C",
                    "LONGITUD": "16"
                },
                "ID_M_USUARIOS": {
                    "TIPO": "C",
                    "LONGITUD": "16"
                },
                "DESCRIPCION": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "TITULO": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "TITULOX": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "TITULOY": {
                    "TIPO": "C",
                    "LONGITUD": "200"
                },
                "QUERY": {
                    "TIPO": "C",
                    "LONGITUD": "25000"
                },
                "XQUERY": {
                    "TIPO": "C",
                    "LONGITUD": "10000"
                },
                "FORMULARIO": {
                    "TIPO": "C",
                    "LONGITUD": "20000"
                },
                "FORMA": {
                    "TIPO": "C",
                    "LONGITUD": "60"
                },
                "TIPO": {
                    "TIPO": "C",
                    "LONGITUD": "60"
                },
                "SERIE1": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE2": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE3": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE4": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "SERIE5": {
                    "TIPO": "C",
                    "LONGITUD": "300"
                },
                "ESTATUS": {
                    "TIPO": "C",
                    "LONGITUD": "3"
                },
                "CONDICION1": {
                    "TIPO": "C",
                    "LONGITUD": "1"
                },
                "COMENTARIOS": {
                    "TIPO": "C",
                    "LONGITUD": "1000"
                },
                "CLASE": {
                    "TIPO": "C",
                    "LONGITUD": "20"
                },
                "ORDEN": {
                    "TIPO": "I",
                    "LONGITUD": "4"
                },
                "NOMBRE_ESTATUS": {
                    "TIPO": "C",
                    "LONGITUD": "30"
                },
                "NOMBRE_USUARIO": {
                    "TIPO": "C",
                    "LONGITUD": "121"
                },
                "REGISTROS": {
                    "TIPO": "I",
                    "LONGITUD": "4"
                }
            },
            "totales": {
                "FECHA": "23",
                "FECHA_REGISTRO": "23",
                "ID": "501",
                "FECHA_DESDE": "23",
                "FECHA_HASTA": "23",
                "ID_M_GRAFICOS": "23",
                "ID_M_USUARIOS": "23",
                "DESCRIPCION": "23",
                "TITULO": "23",
                "TITULOX": "23",
                "TITULOY": "23",
                "QUERY": "23",
                "XQUERY": "23",
                "FORMULARIO": "23",
                "FORMA": "23",
                "TIPO": "23",
                "SERIE1": "23",
                "SERIE2": "23",
                "SERIE3": "23",
                "SERIE4": "23",
                "SERIE5": "23",
                "ESTATUS": "23",
                "CONDICION1": "23",
                "COMENTARIOS": "23",
                "CLASE": "23",
                "ORDEN": "3,820",
                "NOMBRE_ESTATUS": "23",
                "NOMBRE_USUARIO": "23",
                "REGISTROS": "216"
            }
        }
    }
     */

    function getLpaGraficos(Request $request)
    {
        DB::setDefaultConnection('firebird');

        

        $mlpas = MLpa::where("FECHA_ATENCION", ">=", "2024-01-01")->get();

        //PONER LA PERSONA CON SU EDAD
        //=SI($O2="";"";SI(SIFECHA($O2;Lista!$V$2;"y")=122;"";SIFECHA($O2;Lista!$V$2;"y")))
        //PONER QUE SALGA LA FECHA
        //"Rango ECHO"
        //=SI(AM2="";"";SI(AM2<=5;"0 to 5";SI(AM2<=17;"6 to 17";SI(AM2<=49;"18 to 49";SI(AM2>=50;"> 50")))))
        //"Rango BHA"
        //=SI(AM2="";"";SI(AM2<=4;"0 to 4";SI(AM2<=9;"5 to 9";SI(AM2<=14;"10 to 14";SI(AM2<=18;"15 to 18";SI(AM2<=29;"19 to 29";SI(AM2<=59;"30 to 59";SI(AM2>=60;"> 60"))))))))

        $mlpas->load(['emergencia', 'actividad', 'persona']);

        /* DB::setDefaultConnection('odbc');

        $erns = DB::select("SELECT 
        ID_M_KOBO_FORMULARIOS,
        ID_M_USUARIOS,        
        FECHA,   
        FECHA_REGISTRO,  
        ID, 
        ESTATUS,     
        ID_M_FORMULARIOS, 
        FECHA_FORMULARIO,
        UID, 
        FUID, 
        NOMBRE_FORMULARIO, 
        GRUPO, 
        NOMBRE_ESTATUS, 
        NOMBRE_USUARIO, 
        FECHA_ESTADISTICA, 
        REGION,    
        DEPARTAMENTO, 
        MUNICIPIO, 
        CODIGO_ALERTA
        FROM V_M_KOBO_FORMULARIOS WHERE ID_M_FORMULARIOS = '0012';"); */

        $mlpasFormated = $mlpas->map(function ( $lpa) {
            $lpa->persona->append('edad');
            $lpaArray = $lpa->toArray();
            $lpaDoted = Arr::dot($lpaArray); 
            return  $lpaDoted;
        });

        $flattenedMlpas =  ($mlpasFormated);

        return [
            "lpas" => $flattenedMlpas,
            "analisis" => Analisis::where(["type" => "LPA"])->get(),
            //"erns" => $erns
        ];
    }

    function getMqr(Request $request)
    {

        if ($request->pagination) {
            $mmqrs = MMqr::paginate(7);
        } else {
            $mmqrs = [
                "mqr" => MMqr::all(),
                "analisis" => Analisis::where(["type" => "MQR"])->get()
            ];
        }

        return $mmqrs;
    }

    /**
     * pda
     */
    function geMpd(Request $request)
    {

        /* $formulario_erns = MFormulario::where(['ACCION' => "ERN"])->get();

        $formulario_erns->load(['preguntas']);

        $formulario_erns->map(function ($formulario) {
            $preguntas = collect($formulario->preguntas);

            $preguntas->map(function ($pregunta) {
                $pregunta->load(['respuesta']);

                return $pregunta;
            });

            return $preguntas;
        }); 
        return response()->json(['status' => true, 'data' => $formulario_erns, 200]); */
        

        $mmpds = MKoboRespuestas::whereHas('formulario', function ($q) {
            $q->where('ACCION', '=', "MPD");
        })
        ->where('_ID', '=', 8914355)
        ->limit(1000)
        ->get()
        ->load('pregunta')
            ->groupBy('_ID');

        if ($request->pagination) {
            $mmpdsArray = $this->paginateCollection($mmpds, 10);
        } else {
            dd($mmpds);
            $mmpdsArray = collect([]);
            
            $mmpdsValues = ($mmpds)->values();


            $mmpdsValues->each(function ($formulario) use ($mmpdsArray){

                $objectPresuntaRespuesta = collect();
                //$formulario [{VALOR: "", pregunta: {ROTULO}}, {VALOR: "", pregunta: {ROTULO}}]
                $formulario->each(function ($respuesta) use ($objectPresuntaRespuesta){
                    //dd($respuesta->VALOR, $respuesta->pregunta);
                    
                    $objectPresuntaRespuesta[$respuesta->pregunta->CAMPO1] = $respuesta->VALOR;
                });

                $mmpdsArray->push($objectPresuntaRespuesta);
            });
        }

        return  $mmpdsArray;
    }

    function getActivity(Request $request)
    {
        $activities = Activities::get();

        return  $activities;
    }

    function setActivity(Request $request)
    {

        $data = $request->all();
        $data['sector'] = $request->sector;
        $data['cod'] = $request->cod;
        $data['actividad'] = $request->actividad;
        $data['ID_M_USUARIOS'] = Auth::user()->id ?? Auth::user()->ID;

        $activities = Activities::create($data);

        return  $activities;
    }
}
