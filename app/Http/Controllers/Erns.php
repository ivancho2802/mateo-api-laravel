<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MKoboFormularios;
use App\Models\MKoboRespuestas;
use App\Models\MFormulario;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\helper;
use App\Models\migrateCustom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Erns extends Controller
{
    //
    /**
     * el objetivo es recibir un formulario kobo 
     * con las credenciales de token acceder a los datos 
     * obtener un json 
     * verificar los datos y llenar las tablas correspondientes 
     * kobo_url https://eu.kobotoolbox.org/assets/aERiZwVqPrcEbYzhFux5au/submissions/?format=json
     */
    function stored(Request $request)
    {
        $m_formularios = MFormulario::where(['ACCION' => "ERN"]);
        $m_formulario_ids = $m_formularios->pluck('ID_M_FORMULARIOS');
        MKoboRespuestas::whereIn('ID_M_FORMULARIOS', $m_formulario_ids)->delete();
        MKoboFormularios::whereIn('ID_M_FORMULARIOS', $m_formulario_ids)->delete();
        $m_formularios->delete();

        if (!$request->kobo_url || !strpos($request->kobo_url, "assets") || !strpos($request->kobo_url, "submissions/?format=json")) {
            return response()->json(['status' => false, 'message' => "formato de kobo_url incorrecto o faltante"], 402);
        }

        /*  try { */

        //FALTA TERMINAR SACAR DEL TOKEN
        $ID_USER = Auth::user()->id ?? Auth::user()->ID;

        //iobtener los datos segun el kobo recibido
        //procesar los datos y registrarlos en los kobo preguntas y respuestas
        //

        // URL a la que se enviará la solicitud GET
        $url = $request->kobo_url;
        //$hash = helper::extactHash($request->kobo_url);

        // Credenciales de autorización
        /* $username = 'tu_usuario';
                $password = 'tu_contraseña'; */

        // Crear la cadena de autorización en formato Basic
        $token = Config::get('app.tokenkobonrc');

        $auth_header = 'Authorization: Token ' . $token; //base64_encode($username . ':' . $password)

        // Crear opciones de contexto de flujo
        $context = stream_context_create([
            'http' => [
                'header' => $auth_header
            ]
        ]);

        //id para save history
        $id_m_formulario = [];

        // Enviar la solicitud GET aQxrcJYzPy4nzzVRXZVSBC
        $response = file_get_contents($url, false, $context);


        // Verificar si la solicitud fue exitosa
        if ($response !== false) {
            // Procesar la respuesta obtenida

            $json_response = json_decode($response);

            //cantidad de registros kobo 1124
            //dd(count($json_response));

            $m_formulario_id = null;

            $m_formulario = MFormulario::updateOrCreate(
                ['ID_M_FORMULARIOS' => $json_response[0]->_xform_id_string],
                [
                    'ACCION' => "ERN",
                    'ID_M_FORMULARIOS' => $json_response[0]->_xform_id_string,
                    "ASSET_UID" => $json_response[0]->_xform_id_string,
                    "UID" => $json_response[0]->_uuid,
                    "URL_DATA" => $url,
                    "URL_CAMPOS" =>  $url,
                    "ESTATUS" => $json_response[0]->_status,
                    "FECHA" => $json_response[0]->_submission_time,
                    "FECHA_REGISTRO" => $json_response[0]->start,

                    //"formhub\/uuid": "5ac352c78ba544559fed4783264c14df",
                    //"meta\/instanceID": "uuid:f58da61d-dffd-4dc6-b770-3670807f7c6b",

                    "ID_M_USUARIOS" => $ID_USER
                ]
            );


            $m_formulario = MFormulario::where(["ID_M_FORMULARIOS" => $json_response[0]->_xform_id_string])->first();

            $m_formulario_id = $m_formulario->ID_M_FORMULARIOS;

            if (!isset($m_formulario_id)) {
                return response()->json(['status' => false, 'message' => "error en la creacion del formulario maestro", "data" => $m_formulario], 503);
            }
            //llamo todas las preguntas de este formulario las desactivo

            $creation_failed = [];
            $count = 0;

            for ($i = 0; $i < count($json_response); $i++) {
                //ojo esto actualiza o crea una
                $object = (object)helper::formatObject($json_response[$i], "");

                //crear preguntas

                $id_kobo_respuesta = $json_response[$i]->_id;

                //$object->preguntas 34
                //dd(count($object->preguntas));

                $body_m_kobo_preguntas = [];
                $body_respuestas = [];

                for ($j = 0; $j < count($object->preguntas); $j++) {

                    $pregunta = $object->preguntas[$j];

                    array_push(
                        $body_m_kobo_preguntas,
                        [
                            "ID_M_KOBO_FORMULARIOS" => "nextId",
                            "_ID" => $id_kobo_respuesta,
                            "CAMPO1" => $pregunta,
                            "ID_M_FORMULARIOS" => $m_formulario_id,
                            "ESTATUS" => 1,
                            "ID_M_USUARIOS" => $ID_USER,
                        ]
                    );
                }

                //dd("body_m_kobo_preguntas", $body_m_kobo_preguntas);

                $m_kobo_preguntas = MKoboFormularios::insert(
                    //The method's first argument consists of the values to insert or update
                    $body_m_kobo_preguntas,
                    // second argument lists the column(s) that uniquely identify records within the associated table.
                    //El segundo argumento enumera las columnas que identifican de forma única los registros dentro de la tabla asociada.
                    //['CAMPO1'], //, '_ID' error reaprar
                    //The method's third and final argument is an array of the columns that should be updated if a matching record already exists in the database.
                    //El tercer y último argumento del método es una matriz de columnas que deben actualizarse si ya existe un registro coincidente en la base de datos.
                    //['ID_M_FORMULARIOS', 'ESTATUS', 'ID_M_USUARIOS']
                );

                if (!$m_kobo_preguntas) { //!== count($body_m_kobo_preguntas)
                    array_push(
                        $creation_failed,
                        ["preguntas" => $body_m_kobo_preguntas]
                    );
                }


                //crear respuesta
                $preguntas_created = collect(MKoboFormularios::where(["_ID" => $id_kobo_respuesta])->get());
                $ids_kobo_respuesta = [];

                for ($k = 0; $k < count($object->respuestas); $k++) {

                    $count++;

                    $respuesta = $object->respuestas[$k];
                    $pregunta = $object->preguntas[$k];

                    $desired_object = $preguntas_created->filter(function ($item) use ($pregunta) {
                        return $item->CAMPO1 == $pregunta;
                    })->first();

                    if (optional($desired_object)->id) {
                        array_push($body_respuestas, [
                            "FECHA" => $json_response[$i]->_submission_time,
                            "FECHA_REGISTRO" => $json_response[$i]->start,
                            "_ID" => $id_kobo_respuesta,
                            "VALOR" => json_encode($respuesta),
                            "ID_M_KOBO_FORMULARIOS" => $desired_object->id,
                            "ID_M_FORMULARIOS" => $m_formulario_id,
                            "ID_M_USUARIOS" => $ID_USER
                        ]);
                        $ids_kobo_respuesta[] = $id_kobo_respuesta;
                    }
                }

                //dd($body_respuestas);

                //crean respuestas
                $m_respuestas = MKoboRespuestas::insert($body_respuestas);
                //dd($body_respuestas);

                if (!$m_respuestas) {
                    array_push(
                        $creation_failed,
                        ["respuestas" => $body_respuestas] //$body_respuestas
                    );
                }

                migrateCustom::create([
                    'table' => 'M_KOBO_RESPUESTAS',
                    'table_id' => implode(", ", $ids_kobo_respuesta),
                    'file_ref' => '-',
                ]);
            }

            if (count($creation_failed) > 0) {
                return response()->json([
                    'status' => false,
                    'message' => "no se terminaron de cargar los registros ponte en contacto con soporte",
                    'data' => $creation_failed
                ], 503);
            }

            return response()->json(['status' => true, 'data' => [count($json_response), $count]], 200);
        } else {
            // Manejar el error de la solicitud
            $msg = 'Error al realizar la solicitud GET: ' . error_get_last()['message'];
            return response()->json(['status' => false, 'message' => $msg], 503);
        }

        //MKoboFormularios


        //code...
        /* } catch (\Exception $th) {
            
            return response()->json(['status' => false, 'message' => $th], 503);
        } */
    }

    function refresh(Request $request)
    {

        try {

            $count = 0;

            //FALTA TERMINAR SACAR DEL TOKEN
            $ID_USER = Auth::user()->id ?? Auth::user()->ID;

            // Procesar la respuesta obtenida

            $json_response = $request;

            if (!optional($request->_xform_id_string)) {
                return response()->json(['status' => false, 'message' => optional($request->_xform_id_string), 'data' => $request->all()], 503);
            }

            $url = 'https://collect.nrc.no/assets/ ' . $request->_xform_id_string . ' /submissions/?format=json';

            $m_formulario_id = null;

            $m_formulario = MFormulario::updateOrCreate(
                ['ID_M_FORMULARIOS' => $json_response->_xform_id_string],
                [
                    'ACCION' => "ERN",
                    'ID_M_FORMULARIOS' => $json_response->_xform_id_string,
                    "ASSET_UID" => $json_response->_xform_id_string,
                    "UID" => $json_response->_uuid,
                    "URL_DATA" => $url,
                    "URL_CAMPOS" =>  $url,
                    "ESTATUS" => $json_response->_status,
                    "FECHA" => $json_response->_submission_time,
                    "FECHA_REGISTRO" => $json_response->start,

                    //"formhub\/uuid": "5ac352c78ba544559fed4783264c14df",
                    //"meta\/instanceID": "uuid:f58da61d-dffd-4dc6-b770-3670807f7c6b",

                    "ID_M_USUARIOS" => $ID_USER
                ]
            );

            $m_formulario = MFormulario::where(["ID_M_FORMULARIOS" => $json_response->_xform_id_string])->first();

            $m_formulario_id = $m_formulario->ID_M_FORMULARIOS;

            if (!isset($m_formulario_id)) {
                return response()->json(['status' => false, 'message' => "error en la creacion del formulario maestro", "data" => $m_formulario], 503);
            }
            //llamo todas las preguntas de este formulario las desactivo

            $creation_failed = [];

            //ojo esto actualiza o crea una
            $object = (object)helper::formatObject($json_response, "");

            //crear preguntas

            $id_kobo_respuesta = $json_response->_id;

            $body_m_kobo_preguntas = [];
            $body_respuestas = [];

            for ($j = 0; $j < count($object->preguntas); $j++) {

                $pregunta = $object->preguntas[$j];

                array_push(
                    $body_m_kobo_preguntas,
                    [
                        "ID_M_KOBO_FORMULARIOS" => "nextId",
                        "_ID" => $id_kobo_respuesta,
                        "CAMPO1" => $pregunta,
                        "ID_M_FORMULARIOS" => $m_formulario_id,
                        "ESTATUS" => 1,
                        "ID_M_USUARIOS" => $ID_USER,
                    ]
                );
            }

            $m_kobo_preguntas = MKoboFormularios::insert(
                $body_m_kobo_preguntas,
                //['CAMPO1'], //, '_ID'
                //['ID_M_KOBO_FORMULARIOS', '_ID', 'ID_M_FORMULARIOS', 'ESTATUS', 'ID_M_USUARIOS']
            );

            if (!$m_kobo_preguntas) {// !== count($body_m_kobo_preguntas)
                array_push(
                    $creation_failed,
                    ["preguntas" => $body_m_kobo_preguntas]
                );
            }


            //crear respuesta
            $preguntas_created = collect(MKoboFormularios::where(["_ID" => $id_kobo_respuesta])->get());
            $ids_kobo_respuesta = [];

            for ($k = 0; $k < count($object->respuestas); $k++) {

                $respuesta = $object->respuestas[$k];
                $pregunta = $object->preguntas[$k];

                $desired_object = $preguntas_created->filter(function ($item) use ($pregunta) {
                    return $item->CAMPO1 == $pregunta;
                })->first();

                array_push($body_respuestas, [
                    "FECHA" => $json_response->_submission_time,
                    "FECHA_REGISTRO" => $json_response->start,
                    "_ID" => $id_kobo_respuesta,
                    "VALOR" => $respuesta,
                    "ID_M_KOBO_FORMULARIOS" => $desired_object->id,
                    "ID_M_FORMULARIOS" => $m_formulario_id,
                    "ID_M_USUARIOS" => $ID_USER
                ]);
                $ids_kobo_respuesta[] = $id_kobo_respuesta;
                $count++;
            }

            //crean respuestas
            $m_respuestas = MKoboRespuestas::insert($body_respuestas);

            if (!$m_respuestas) {
                array_push(
                    $creation_failed,
                    ["respuestas" => $body_respuestas] //$body_respuestas
                );
            }

            migrateCustom::create([
                'table' => 'M_KOBO_RESPUESTAS',
                'table_id' => implode(", ", $ids_kobo_respuesta),
                'file_ref' => '-',
            ]);

            if (count($creation_failed) > 0) {
                return response()->json([
                    'status' => false,
                    'message' => "no se terminaron de cargar los registros ponte en contacto con soporte",
                    'data' => $creation_failed
                ], 503);
            }

            return response()->json(['status' => true, 'data' => [($json_response), $count]], 200);
        } catch (\Exception $th) {

            return response()->json(['status' => false, 'message' => $th, 'data' => $request->all()], 503);
        }
    }
    
    
    /**
     *  select 
     *      "_ID" 
        from 
            "M_KOBO_RESPUESTAS" 
        where "ID_M_FORMULARIOS" = 'aERiZwVqPrcEbYzhFux5au' group by "_ID"

     */

    function all(Request $request){

        
        ini_set('memory_limit', '2044M');
        set_time_limit(3000000);//0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

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
        return response()->json(['status' => true, 'data' => $formulario_erns, 200]);
        
        */

        //alternativa

        DB::setDefaultConnection('firebird'); 

        $resultados = DB::select("SELECT * FROM v_M_KOBO_RESPUESTAS WHERE ID_M_FORMULARIOS = '0012'");

        
        $resultados = helper::convert_from_latin1_to_utf8_recursively($resultados);

        $resultados = collect($resultados);

        $resultadosGruped = $resultados->groupBy('ID_M_KOBO_FORMULARIOS');

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
        });

        return response()->json(['status' => true, 'data' => ($formulariosNew), 'total' => ($formularioNew)]);

    }
}
