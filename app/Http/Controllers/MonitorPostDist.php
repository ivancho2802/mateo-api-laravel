<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MKoboFormularios;
use App\Models\MKoboRespuestas;
use App\Models\MFormulario;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\helper;
use App\Models\migrateCustom;

class MonitorPostDist extends Controller
{
    /**
     * el objetivo es recibir un formulario kobo 
     * con las credenciales de token acceder a los datos 
     * obtener un json 
     * verificar los datos y llenar las tablas correspondientes
     * kobo_url https://eu.kobotoolbox.org/assets/aQxrcJYzPy4nzzVRXZVSBC/submissions/?format=json
     */
    function stored(Request $request)
    {
        MKoboFormularios::truncate();
        MKoboRespuestas::truncate();
        MFormulario::truncate();

        if (!$request->kobo_url || !strpos($request->kobo_url, "assets") || !strpos($request->kobo_url, "submissions/?format=json")) {
            return response()->json(['status' => false, 'message' => "formato de kobo_url incorrecto o faltante"], 402);
        }

        try {

            //FALTA TERMINAR SACAR DEL TOKEN
            $ID_USER = 1;

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
            $token = Config::get('app.tokenkobo');

            $auth_header = 'Authorization: Token ' . $token; //base64_encode($username . ':' . $password)

            // Crear opciones de contexto de flujo
            $context = stream_context_create([
                'http' => [
                    'header' => $auth_header
                ]
            ]);

            //id para save history
            $id_m_formulario = [];

            // Enviar la solicitud GET
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
                        'ACCION' => "MPD",
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

                for ($i = 0; $i < count($json_response); $i++) {
                    //ojo esto actualiza o crea una
                    $object = (object)helper::formatObject($json_response[$i], "/_");

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
                    
                    $m_kobo_preguntas = MKoboFormularios::upsert(
                        $body_m_kobo_preguntas,
                        ['CAMPO1'],
                        ['ID_M_KOBO_FORMULARIOS', '_ID', 'ID_M_FORMULARIOS', 'ESTATUS', 'ID_M_USUARIOS']
                    );
                    
                    if ($m_kobo_preguntas !== count($body_m_kobo_preguntas)) {
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
                            "FECHA" => $json_response[$i]->_submission_time,
                            "FECHA_REGISTRO" => $json_response[$i]->start,
                            "_ID" => $id_kobo_respuesta,
                            "VALOR" => $respuesta,
                            "ID_M_KOBO_FORMULARIOS" => $desired_object->id,
                            "ID_M_FORMULARIOS" => $m_formulario_id,
                            "ID_M_USUARIOS" => $ID_USER
                        ]);
                        $ids_kobo_respuesta[] = $id_kobo_respuesta;
                    }

                    //crean respuestas
                    $m_respuestas = MKoboRespuestas::insert($body_respuestas);

                    if (!$m_respuestas) {
                        array_push(
                            $creation_failed,
                            ["respuestas" => $body_respuestas]//$body_respuestas
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

                return response()->json(['status' => true, 'data' => count($json_response)], 200);
            } else {
                // Manejar el error de la solicitud
                $msg = 'Error al realizar la solicitud GET: ' . error_get_last()['message'];
                return response()->json(['status' => false, 'message' => $msg], 503);
            }

            //MKoboFormularios


            //code...
        } catch (\Exception $th) {
            
            return response()->json(['status' => false, 'message' => $th], 503);
        }
    }

    function refresh(Request $request){

       /*  return response()
            ->json([
                'code'      =>  500,
                 'message'   =>  $request
            ], 500); */

        dd("data_servicio_de_migracion_automatizado_a_miresys", $request);

        return $request;
    }


}
