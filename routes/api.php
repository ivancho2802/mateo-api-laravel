<?php

use App\Http\Controllers\Emergencias;
use App\Models\Departamentos;
use App\Models\MKoboRespuestas;
use App\Models\MLpaEmergencia;
use App\Models\Municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\MFormulario;
use App\Models\MFormularios;
use App\Models\MKoboFormularios;
use App\Models\DContactos;
use App\Http\Controllers\helper;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
//use Excel;
use App\Http\Controllers\Auth;
use App\Http\Controllers\echoController;
use App\Models\MGrupos;
use App\Models\MUsuarios;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Diff\Chunk;
use App\Http\Controllers\Jobs;
use App\Models\migrateCustom;
use App\Models\Reports;
use App\Models\MLpaMongo;
use Jenssegers\Mongodb\MongodbServiceProvider;
//use Jenssegers\Mongodb\MongodbServiceProvider::class,


//ini_set('internal_encoding', 'utf-8');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/querytest', function (Request $request) {

  /*   try { */

  return response()->json([
    ["name" => "asd", "code" => "asd1"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
  ]);
  /* } catch (\Throwable $exception) {
    return response()->json(['Error' => $exception->getMessage()]);
  } */
});

Route::middleware(['auth:sanctum'])->post('/typeform', function (Request $request) {

  DB::setDefaultConnection('pgsql');

  //dd("request", $request->form_response["answers"]);
  //dd("request", $request->form_response["form_id"]);

  $m_formulario = MFormulario::updateOrCreate(
    ['ID_M_FORMULARIOS' => $request->form_response["form_id"]],
    [
      'ACCION' => "CREER",
      'ID_M_FORMULARIOS' => $request->form_response["form_id"],
      "ASSET_UID" => $request->token,
      "UID" => $request->token,
      "URL_DATA" => "url",
      "URL_CAMPOS" => "url",
      "ESTATUS" => true,
      "FECHA" => Carbon\Carbon::now(),
      "FECHA_REGISTRO" => Carbon\Carbon::now(),
      "ID_M_USUARIOS" => 1
    ]
  );

  $m_formulario = MFormulario::where(["ID_M_FORMULARIOS" => $request->form_response["form_id"]])->first();

  $m_formulario_id = $m_formulario->ID_M_FORMULARIOS;

  if (!isset($m_formulario_id)) {
    return response()->json(['status' => false, 'message' => "error en la creacion del formulario maestro", "data" => $m_formulario], 503);
  }
  //llamo todas las preguntas de este formulario las desactivo

  $creation_failed = [];
  $count = 0;
  $definition = collect($request->form_response["definition"]["fields"]);

  //dd($definition->where('id', $request->form_response["answers"][0]["field"]["id"])->first()["title"]);

  for ($i = 0; $i < count($request->form_response["answers"]); $i++) {
    //ojo esto actualiza o crea una
    //$object = (object) helper::formatObject($request->form_response["answers"][$i], "");
    $object = $request->form_response["answers"][$i];

    //crear preguntas

    $id_kobo_respuesta = $object["field"]["id"];

    $body_m_kobo_preguntas = [];
    $body_respuestas = [];
    //respuesta
    //$object->text;
    $pregunta = $definition->where('id', $object["field"]["id"])->first()["title"];
    $respuesta = $object["text"] ?? "N/A";
    //dd("respuesta", $respuesta);

    array_push(
      $body_m_kobo_preguntas,
      [
        "ID_M_KOBO_FORMULARIOS" => $id_kobo_respuesta,
        "_ID" => $id_kobo_respuesta,
        "CAMPO1" => $pregunta,
        "ID_M_FORMULARIOS" => $m_formulario_id,
        "ESTATUS" => 1,
        "ID_M_USUARIOS" => 1,
        "created_at" => Carbon\Carbon::now(),
      ]
    );

    $m_kobo_preguntas = MKoboFormularios::updateOrCreate(
      ['ID_M_FORMULARIOS' => $m_formulario_id],
      $body_m_kobo_preguntas[0]
    );

    if (!$m_kobo_preguntas) {
      array_push(
        $creation_failed,
        ["preguntas" => $body_m_kobo_preguntas]
      );
    }

    //crear respuesta
    $preguntas_created = MKoboFormularios::where(["_ID" => $id_kobo_respuesta])->first();

    array_push($body_respuestas, [
      "FECHA" => Carbon\Carbon::now(),
      "FECHA_REGISTRO" => Carbon\Carbon::now(),
      "_ID" => $id_kobo_respuesta,
      "REFERENCIA" => $pregunta,
      "VALOR" => $respuesta,
      "ID_M_KOBO_FORMULARIOS" => $preguntas_created->id,
      "ID_M_FORMULARIOS" => $m_formulario_id,
      "ID_M_USUARIOS" => 1,
      "created_at" => Carbon\Carbon::now(),
    ]);
    $m_respuestas = MKoboRespuestas::insert($body_respuestas);

    if (!$m_respuestas) {
      array_push(
        $creation_failed,
        ["respuestas" => $body_respuestas] //$body_respuestas
      );
    }

    migrateCustom::create([
      'table' => 'CREER',
      'table_id' => $preguntas_created->id,
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

  return response()->json(['status' => true, 'data' => [count($request->form_response["answers"]), $count]], 200);
  /* } else {
    // Manejar el error de la solicitud
    $msg = 'Error al realizar la solicitud GET: ' . error_get_last()['message'];
    return response()->json(['status' => false, 'message' => $msg], 503);
  } */
});

Route::get('/typeform', function (Request $request) {
  $mformulario = MFormulario::get()->load(['respuestas', 'preguntas']);
  $mkoboformulario = MKoboFormularios::get();
  $mkoborespuesta = MKoboRespuestas::get();

  $preguntas = [
    "1. ¿Qué es?: Definición" => [
      "1.1 Naturaleza de la tránsición	1.1.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "1.1.1.1 “Lo más importante en la transición es proteger los ecosistemas, incluso por encima de las necesidades humanas inmediatas”.A	a: Ambiental", // e: Social 
        "1.1.1.2 “Debemos cuidar el ambiente, pero sin olvidar a las personas que pueden verse afectadas por los cambios”.	B	10: Ambiental", // 50: Social 
        "1.1.1.3 “La transición debe cuidar tanto la naturaleza como a las personas al mismo tiempo”.	30	10: Ambiental", // 50: Social 
        "1.1.1.4 “Para cuidar el clima, primero debemos reducir la desigualdad y crear empleos verdes”.	40	10: Ambiental", // 50: Social
        "1.1.1.5 “El cambio climático es un problema de injusticia social, y la transición debe centrarse en mejorar la vida de las personas más vulnerables”.	50	10: Ambiental ", // 50: Social 
      ],
      "1.2 Tipos de transición	1.2.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "1.2.1.1 “La transición debe ser una ruptura profunda con el modelo actual, para restaurar el equilibrio del planeta y detener el colapso ecológico”.	10	10: Restauración ambiental",  // 50: Justicia social
        "1.2.1.2 “Debemos avanzar hacia una economía baja en carbono mediante innovación tecnológica y regulación ambiental, sin detener el crecimiento económico”.	20	10: Restauración ambiental", // 50: Justicia social
 	      "1.2.1.3 “La transición debe cambiar la relación entre humanos y naturaleza, haciendo compatibles el bienestar social y los límites ecológicos”.	30	10: Restauración ambiental", // 50: Justicia social
 	      "1.2.1.4 “La transición debe cambiar nuestros estilos de vida y patrones de consumo para que todos vivamos bien, dentro de las capacidades del planeta”.	40	10: Restauración ambiental", // 50: Justicia social
 	      "1.2.1.5 “La verdadera transición debe corregir las desigualdades estructurales, priorizando a quienes más han sufrido los impactos del sistema actual”.	50	10: Restauración ambiental", // 50: Justicia social
      ],
      "1.3 Ritmo	1.3.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "1.3.1.1  “La transición debe comenzar ya, antes de que los daños al planeta sean irreversibles”.	10	10: Inmediato", // 50: Gradual
        "1.3.1.2 “Necesitamos transiciones rápidas, pero bien organizadas para no generar impactos negativos en las personas”.	20	10: Inmediato",  // 50: Gradual
        "1.3.1.3 “La transición debe avanzar paso a paso, equilibrando el cuidado ambiental con el bienestar social”.	30	10: Inmediato", // 50: Gradual
        "1.3.1.4 “Las transiciones toman tiempo porque implican cambios en cómo vivimos, trabajamos y nos relacionamos”.	40	10: Inmediato", // 50: Gradual
        "1.3.1.5 “La transición debe construirse con paciencia, priorizando la reparación de desigualdades históricas antes que la velocidad”.	50	10: Inmediato", // 50: Gradual
      ],
      "1.4 Escala	1.4.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "1.4.1.1 “La transición debe abordarse desde una perspectiva global, ya que los efectos y soluciones del cambio climático trascienden fronteras”.	10	10: Global", // 50: Local
        "1.4.1.2 “Los Estados deben liderar la transición con políticas públicas integrales, adaptadas a las condiciones y prioridades del país”.	20	10: Global",// 50: Local
        "1.4.1.3 Es necesario hacer cambios desde los territorios, por sus realidades propias, y desde lo global, para lograr una transformación climática más amplia.	30	10: Global",// 50: Local
        "1.4.1.4 “La transición necesita arraigarse en lo local, donde se viven directamente los impactos y se pueden construir soluciones concretas”.	40	10: Global", // 50: Local
 	      "1.4.1.5 “La transición debe centrarse en los espacios históricamente invisibilizados, donde el cambio es más urgente y necesario”.	50	10: Global",// 50: Local
      ],
    ],
    "2. ¿ Quiénes?:  Actores" => [
      "2.1. Actores involucrados	2.1.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "2.1.1.1   La transición solo es posible si todos los actores —gobiernos, empresas, comunidades, organizaciones y academia— participan de forma activa y con responsabilidades compartidas .	10	10: Multiactor", // 50: Actor único 
        "2.1.1.2 “Los procesos de transición deben construirse en alianza entre el Estado y las comunidades, permitiendo participación pero con liderazgo institucional”.	20	10: Multiactor",  // 50: Actor único
        "2.1.1.3 “Se requiere la participación de varios actores, pero con un actor coordinador que oriente y articule los esfuerzos, sin perder la diversidad de voces”.	30	10: Multiactor",  // 50: Actor único
        "2.1.1.4 “Un actor debe asumir el liderazgo de la transición —como el Estado o las comunidades—, recibiendo aportes de otros, pero sin depender de ellos”.	40	10: Multiactor",  // 50: Actor único
        "2.1.1.5 “La transición debe ser dirigida por un solo actor con legitimidad y capacidad, para garantizar coherencia y evitar interferencias externas”.	50	10: Multiactor",  // 50: Actor único
      ],
      "2.2 Rol Estado  	2.2.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "2.2.1.1  El Estado debe limitarse a generar las condiciones básicas para que otros actores —como el mercado, la sociedad civil o las comunidades— lideren los procesos de transición .	10	10: Rol minimo", // 50: Protagonismo
        "2.2.1.2 “El Estado debe actuar como mediador y conector entre sectores, garantizando que la transición sea incluyente, sin imponer rutas únicas”.	20	10: Rol minimo", // 50: Protagonismo
        "2.2.1.3 “El Estado debe tener un rol activo, guiando la transición con políticas claras, pero permitiendo que comunidades, empresas y otros actores definan cómo implementarlas”.	30	10: Rol minimo", // 50: Protagonismo
        "2.2.1.4 “El Estado debe liderar la transición con decisiones firmes, inversiones públicas y regulación, pero escuchando a los territorios y actores sociales”.	40	10: Rol minimo", // 50: Protagonismo
        "2.2.1.5 “Solo el Estado tiene la legitimidad y capacidad para dirigir la transición de forma coherente y justa; debe asumir el control total del proceso”.	50	10: Rol minimo", // 50: Protagonismo
      ],
      "2.3 Rol Empresas 	2.3.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "2.3.1.1 “Las empresas deben limitarse a cumplir regulaciones; no pueden liderar la transición porque sus intereses económicos no siempre se alinean con el bien común”.	10	10: Rol minimo", // 50: Protagonismo
        "2.3.1.2 “Las empresas pueden participar en la transición, pero deben estar fuertemente reguladas por el Estado para asegurar que sus acciones no generen más desigualdad o daño ambiental”.	20	10: Rol minimo", // 50: Protagonismo
        "2.3.1.3 “Las empresas tienen un papel importante, pero compartido: deben actuar junto al Estado y la sociedad civil para lograr una transición equilibrada y justa”.	30	10: Rol minimo",// 50: Protagonismo
        "2.3.1.4 “Las empresas pueden acelerar la transición a través de innovación, inversión y escalamiento de soluciones, siempre que integren criterios sociales y ambientales en su modelo de negocio”.	40	10: Rol minimo", // 50: Protagonismo
        "2.3.1.5 “La verdadera transformación vendrá del sector empresarial; la eficiencia, tecnología, generación de valor y capacidad de adaptación del mercado son clave para enfrentar el cambio climático”.	50	10: Rol minimo", // 50: Protagonismo
      ],
      "2.4 Rol Comunidades	2.4.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "2.4.1.1 “Las comunidades deben adaptarse a los planes definidos por expertos, gobiernos o empresas, ya que no tienen la capacidad técnica para liderar procesos complejos”.	10	10: Rol minimo", // 50: Protagonismo
        "2.4.1.2 “Las comunidades pueden implementar acciones de transición, pero dentro de marcos definidos por actores institucionales o técnicos”.	20	10: Rol minimo", // 50: Protagonismo
        "2.4.1.3  “Las comunidades deben compartir responsabilidades en los procesos de transición, ya que entienden mejor su territorio y pueden liderar procesos desde lo local”.	30	10: Rol minimo", // 50: Protagonismo
        "2.4.1.4 1. “Las comunidades deben participar activamente para que la transición sea efectiva y sostenible, aportando conocimiento, experiencia y legitimidad local”.	40	10: Rol minimo", // 50: Protagonismo
        "2.4.1.5 “Las comunidades deben ser protagonistas de la transición, decidiendo por sí mismas cómo transformar su forma de vida, su economía y su relación con el entorno”.	50	10: Rol minimo", // 50: Protagonismo
      ],
      "2.5 OSC	2.5.1 Frente a estas afirmaciones en cuál se siente más representado" => [
        "2.5.1.1 “Las organizaciones de la sociedad civil pueden opinar o acompañar, pero no deben interferir en las decisiones técnicas o de gobierno sobre la transición”.	10	10: Rol minimo",// 50: Protagonismo
        "2.5.1.2 “Las OSC pueden cumplir una función útil como veedoras, generando presión social o ayudando a traducir decisiones institucionales hacia las comunidades”.	20	10: Rol minimo",// 50: Protagonismo
        "2.5.1.3 “Las OSC deben participar activamente junto con el Estado, las empresas y comunidades en el diseño e implementación de la transición”.	30	10: Rol minimo",// 50: Protagonismo
        "2.5.1.4 “Las OSC juegan un papel clave en conectar actores, generar conciencia, movilizar comunidades y democratizar las transiciones desde abajo”.	40	10: Rol minimo",// 50: Protagonismo
        "2.5.1.5 “Las organizaciones sociales deben liderar las transiciones como expresión de poder ciudadano, impulsando cambios estructurales desde la base social y la justicia climática”.	50	10: Rol minimo",// 50: Protagonismo
      ],
    ],
    "3. ¿Cómo?: Proceso" => [
      "3.1 Toma de decisiones" => [
        "3.1.1 Frente a estas afirmaciones en cuál se siente más representado" => [
          "3.1.1.1 “Las decisiones sobre la transición deben ser tomadas por expertos y autoridades centrales, ya que requieren conocimientos técnicos y visión global”.	10	10: Nivel central y técnico",  // 50: Nivel local y participativo
          "3.1.1.2 “El Estado debe liderar la transición, incorporando aportes de otros sectores a través de mecanismos consultivos, sin perder la dirección técnica del proceso”.	20	10: Nivel central y técnico ",// 50: Nivel local y participativo
          "3.1.1.3 “Las decisiones deben ser producto del diálogo entre Estado, empresas, comunidades y sociedad civil, con mecanismos reales de corresponsabilidad”.	30	10: Nivel central y técnico ",// 50: Nivel local y participativo
          "3.1.1.4  “Las decisiones deben construirse desde los territorios y con participación activa de los actores locales, articulando saberes y prioridades diversas, con participación de la institucionalidad”.	40	10: Nivel central y técnico ",// 50: Nivel local y participativo
          "3.1.1.5 “Las transiciones deben ser decididas directamente por las comunidades y movimientos sociales, como ejercicio de soberanía y justicia territorial”.	50	10: Nivel central y técnico ",// 50: Nivel local y participativo
        ],
      ],
      "3.2 Espacios" => [
        "3.2.1  Frente a estas afirmaciones en cuál se siente más representado" => [
          "3.2.1.1 “Los espacios institucionales actuales —gobiernos, organismos multilaterales, foros técnicos— ya tienen la legitimidad y capacidad para liderar la transición”.	10	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.2 “Los espacios existentes son útiles, pero necesitan abrirse más a otros actores y renovar su legitimidad mediante mayor inclusión y transparencia”.	20	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.3 “La transición debe apoyarse tanto en instituciones ya establecidas como en nuevos espacios de participación creados desde lo territorial y sectorial”.	30	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.4 “La gran mayoría de espacios existentes carecen de legitimidad; la transición requiere espacios más democráticos desde los territorios y las comunidades”.	40	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.5 “Los espacios legítimos para la transición deben ser creados por los pueblos y movimientos sociales, al margen de las instituciones tradicionales que han fallado”.	50	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
        ],
        "3.3 Marcos" => [
          "3.3.1  Frente a estas afirmaciones en cuál se siente más representado" => [
            "3.3.1.1 “Ya existen los tratados, leyes y políticas necesarios para impulsar la transición; lo que falta es voluntad y aplicación efectiva”. 	10	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
            "3.3.1.2 “Las normas actuales son una buena base, pero deben modernizarse para responder a los desafíos específicos del cambio climático y los contextos locales”.	20	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
            "3.3.1.3 “La transición necesita articular leyes nacionales e internacionales con nuevos marcos adaptados a sectores estratégicos o realidades regionales”.	30	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
            "3.3.1.4 “Los marcos legales actuales no reflejan la diversidad de los territorios ni las voces comunitarias; es necesario construir nuevas normativas desde lo local”.	40	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
            "3.3.1.5 “Los marcos normativos vigentes han sostenido el modelo que queremos cambiar; debemos crear nuevas reglas desde las comunidades, con base en justicia climática, derechos de la naturaleza y autonomía”.	50	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
          ]
        ],
        "3.4 Colaboración" => [
          "3.4.1  Frente a estas afirmaciones en cuál se siente más representado" => [
            "3.4.1.1 “La transición climática solo será posible si todos los países y territorios cooperan y se coordinan globalmente”.	10	10: Interdependencia ",//50: Soberania
            "3.4.1.2 “La transición requiere alianzas entre regiones, sectores y comunidades que compartan tecnologías, recursos y aprendizajes”.	20	10: Interdependencia ",//50: Soberania
            "3.4.1.3 “La transición debe combinar colaboración internacional con capacidad local para decidir qué cambios hacer y cómo hacerlos”.	30	10: Interdependencia ",//50: Soberania
            "3.4.1 4 “Los territorios deben tener el control de sus procesos de transición, pero sin aislarse de las redes de apoyo y aprendizaje global”.	40	10: Interdependencia ",//50: Soberania
            "3.4.1.5 “Cada comunidad debe definir su propio camino de transición, con base en su cultura, sus necesidades y su autonomía, sin imposiciones externas”.	50	10: Interdependencia ",//50: Soberania 
          ]
        ],
        "3.5 Priorización" => [
          "3.5.1  Frente a estas afirmaciones en cuál se siente más representado" => [
            "3.5.1.1 “Las acciones climáticas deben postergarse hasta garantizar la reparación integral de los impactos sociales y ambientales acumulados.”	10	10: Atención de impactos pasado", // 50: Atención sobre acción climática
            "3.5.1.2 La acción climática debe implementarse en paralelo con mecanismos de justicia ambiental y social que atiendan impactos históricos.	20	10: Atención de impactos pasado", // 50: Atención sobre acción climática
            "3.5.1.3 La transición climática debe equilibrar la urgencia de actuar con la atención a los efectos sociales y ambientales asociados.	30	10: Atención de impactos pasado", // 50: Atención sobre acción climática
            "3.5.1.4 La respuesta climática debe priorizar acciones inmediatas, incorporando medidas progresivas de mitigación de impactos.	40	10: Atención de impactos pasado", // 50: Atención sobre acción climática
            "3.5.1.5 La prioridad es avanzar con rapidez en la acción climática, asumiendo que los impactos se abordarán de forma complementaria.	50	10: Atención de impactos pasado", // 50: Atención sobre acción climática
          ]
        ]
      ]
    ],

  ];
  
  return response()->json(["mkoboformulario" => $mformulario, "preguntas" => $preguntas]);

  return view('welcome', ["mkoboformulario" => $mkoboformulario]);
});

Route::get('departamentos', function (Request $request) {
  $departamento = Departamentos::all();
  return response()->json($departamento);
});

Route::get('municipios', function (Request $request) {

  $municipios = Municipios::all();

  return response()->json($municipios);
});

Route::get('municipios/{departamento}', function (Request $request) {
  $municipios = [];

  if (isset($request->departamento)) {
    $departamento_finded = Reports::where('departamento', $request->departamento);

    $municipios = $departamento_finded->get()->groupBy('municipio')->keys();
  } else {
    $municipios = Municipios::all();
  }

  return response()->json($municipios);
});

Route::post('codigo_emergencia', function (Request $request) {

  $respuesta = "";

  if (isset($request->departamento) && isset($request->municipio)) {
    $letterdep = strtoupper(substr($request->departamento, 0, 2));
    $lettermun = strtoupper(substr($request->municipio, 0, 2));


    //mas la logica de 
    $emergencias = DB::table('M_LPA_EMERGENCIAS')
      ->where("COD_EMERGENCIAS", "like", "" . $letterdep . $lettermun . "%")
      //->orWhereRaw('"COD_EMERGENCIAS" LIKE ?', [strtoupper($letterdep . $lettermun) . "%"])
      ->orWhereRaw("convert_from(convert_to('MUNICIPIO', 'LATIN1'), 'UTF8') = ?", [strtoupper($request->municipio)])
      ->orWhereRaw("convert_from(convert_to('DEPARTAMENTO', 'LATIN1'), 'UTF8') = ?", [strtoupper($request->departamento)])
      ->get();

    if (count($emergencias) == 0) {
      $respuesta .= $letterdep;
      $respuesta .= $lettermun;
      $respuesta .= "-";
      $emergencia_number = optional(MLpaEmergencia::query()
        ->orderBy("created_at", "desc")
        ->where("COD_EMERGENCIAS", "like", $letterdep . $lettermun . "%")
        ->first())
        ->COD_EMERGENCIAS;
      $numero_extraido = filter_var($emergencia_number, FILTER_SANITIZE_NUMBER_INT) ?? 0;
      $numero_extraido++;
      $respuesta .= $numero_extraido;

      $emergencia = MLpaEmergencia::create(
        [
          'COD_EMERGENCIAS' => $respuesta,
          'TIPO_EVENTO' => optional($request->TIPO_EVENTO),
          'SOCIO' => optional($request->SOCIO),
          'DEPARTAMENTO' => strtoupper($request->departamento),
          'MUNICIPIO' => strtoupper($request->municipio),
          'LUGAR_ATENCION' => optional($request->LUGAR_ATENCION)
        ]
      );
      $emergencias = [$emergencia];
    }

    return response()->json($emergencias);
  }
  return response()->json([]);
});

Route::prefix('meal')->group(function () {

  //lista de personas atendidas
  Route::get('/lpa/download', [App\Http\Controllers\Media::class, 'downloadMedia']);

  //Route::post('/lpa/upload', [App\Http\Controllers\PersonAttended::class, 'stored']);
  Route::post('/lpa/upload', [App\Http\Controllers\PersonAttendedMongo::class, 'stored']);

  //carga de discapacitados
  Route::post('/lpa/discapacitadosFix', [App\Http\Controllers\PersonAttended::class, 'storeFixDiscapacitados']);

  Route::middleware(['auth:sanctum'])->get('/lpa/discapacitadosFix', [App\Http\Controllers\PersonAttended::class, 'fixDiscapacitados']);

  Route::post('/lpaActivities/upload', [App\Http\Controllers\PersonAttended::class, 'storedActivities']);

  Route::middleware(['auth:sanctum'])->post('/lpa/checked', [App\Http\Controllers\PersonAttended::class, 'checked']);

  Route::middleware(['auth:sanctum'])->post('/lpa/process', [App\Http\Controllers\PersonAttended::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/lpa/refreshMigrations', [App\Http\Controllers\PersonAttended::class, 'refreshMigrations']);

  Route::middleware(['auth:sanctum'])->get('/lpa', [App\Http\Controllers\Meal::class, 'getLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi/{from}/{to}', [App\Http\Controllers\Meal::class, 'getLpaPBI']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi', [App\Http\Controllers\Meal::class, 'getLpaPBI']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi/filters', [App\Http\Controllers\Meal::class, 'getLpaPBIFilters']);
  //migraciones
  Route::middleware(['auth:sanctum'])->get('/lpa_migrations', [App\Http\Controllers\Meal::class, 'getLpaMigrations']);

  Route::middleware(['auth:sanctum'])->post('/lpaGraficos', [App\Http\Controllers\Meal::class, 'getLpaGraficos']);

  //seguuimiento
  Route::middleware(['auth:sanctum'])->get('/lpaseg', [App\Http\Controllers\Meal::class, 'getLpaSeg']);

  //usada en el power bi
  Route::middleware(['auth:sanctum'])->get('/lpasegOnly', [App\Http\Controllers\Meal::class, 'getLpaOnly']);
  Route::middleware(['auth:sanctum'])->get('/lpasegOnlyCount', [App\Http\Controllers\Meal::class, 'lpasegOnlyCount']);

  //lpa para emergencias
  Route::middleware(['auth:sanctum'])->get('/lpa/onlyEmergencias', [App\Http\Controllers\Emergencias::class, 'getEmergencias']);
  //lpa para emergencias
  Route::middleware(['auth:sanctum'])->get('/lpa/onlyActividad', [App\Http\Controllers\Activity::class, 'getActividades']);
  //lpa para personas
  Route::middleware(['auth:sanctum'])->get('/lpa/onlypersonas', [App\Http\Controllers\PersonAttended::class, 'getPersonas']);
  Route::middleware(['auth:sanctum'])->get('/lpa/persona/discapacitadoRt', [App\Http\Controllers\PersonAttended::class, 'getPersonaValidDiscapacidad']);
  Route::middleware(['auth:sanctum'])->get('/lpa/persona', [App\Http\Controllers\PersonAttended::class, 'getPersonaByID']);

  Route::middleware(['auth:sanctum'])->get('/lpasegOnlyPage', [App\Http\Controllers\Meal::class, 'getLpaOnlyPage']);

  Route::middleware(['auth:sanctum'])->get('/lpa/emergencia', [App\Http\Controllers\Emergencias::class, 'getEmergenciaByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/actividad', [App\Http\Controllers\Activity::class, 'getActividadByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareobha', [App\Http\Controllers\PersonAttended::class, 'getRangeBha']);
  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareoecho', [App\Http\Controllers\PersonAttended::class, 'getRangeEcho']);
  Route::middleware(['auth:sanctum'])->get('/lpa/tipo', [App\Http\Controllers\PersonAttended::class, 'getTipoLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpa/donante', [App\Http\Controllers\PersonAttended::class, 'getDonante']);

  Route::get('/lpa/consorcio', [App\Http\Controllers\PersonAttended::class, 'dataLpaConsorcio']);

  Route::middleware(['auth:sanctum'])->get('/lpadiscapacitados', [App\Http\Controllers\Meal::class, 'getLpaPBIDiscapacidades']);

  //monitorio post distribucion pda
  Route::middleware(['auth:sanctum'])->get('/mpd', [App\Http\Controllers\Meal::class, 'geMpd']);
  //MIGRACIONS DESDE EL KOBO
  Route::middleware(['auth:sanctum'])->post('/mpd/update', [App\Http\Controllers\MonitorPostDist::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/mpd/process', [App\Http\Controllers\MonitorPostDist::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/mpd/refresh', [App\Http\Controllers\MonitorPostDist::class, 'refresh']); //receptor

  //MIGRACION DE IVON MEAL REGIONAL
  Route::middleware(['auth:sanctum'])->post('/mpd/update', [App\Http\Controllers\MonitorPostDist::class, 'stored']);

  //ALERTAS

  Route::middleware(['auth:sanctum'])->post('/alerta/update', [App\Http\Controllers\Alertas::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/alerta/refresh', [App\Http\Controllers\Alertas::class, 'refresh']); //receptor

  Route::middleware(['auth:sanctum'])->get('/alerta', [App\Http\Controllers\Alertas::class, 'all']); //receptor

  Route::middleware(['auth:sanctum'])->post('/alertacontactscopy', [App\Http\Controllers\Alertas::class, 'contactscopy']); //receptor

  //ERN

  Route::middleware(['auth:sanctum'])->post('/ern/update', [App\Http\Controllers\Erns::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/ern/refresh', [App\Http\Controllers\Erns::class, 'refresh']); //receptor

  //firebird
  Route::middleware(['auth:sanctum'])->get('/erns', [App\Http\Controllers\Erns::class, 'all']);


  //seguimiento de emergencias
  Route::middleware(['auth:sanctum'])->get('/alertasFirebird', [App\Http\Controllers\Alertas::class, 'allFirebird']);

  Route::middleware(['auth:sanctum'])->get('/alertasFirebirdNumFamiHogares', [App\Http\Controllers\Alertas::class, 'allFirebirdNumFamiHogares']);

  Route::middleware(['auth:sanctum'])->get('/alertasSectores', [App\Http\Controllers\Alertas::class, 'allAlertasSectores']);

  Route::middleware(['auth:sanctum'])->get('/fuente', [App\Http\Controllers\Emergencias::class, 'fuente']);

  Route::middleware(['auth:sanctum'])->get('/ruralurbano', [App\Http\Controllers\Emergencias::class, 'ruralurbano']);

  Route::middleware(['auth:sanctum'])->get('/crucesector', [App\Http\Controllers\Emergencias::class, 'crucesector']);

  Route::middleware(['auth:sanctum'])->get('/fce', [App\Http\Controllers\Emergencias::class, 'fce']);

  //monitoreo y evaluacion

  Route::middleware(['auth:sanctum'])->get('/moni_eva/report', [App\Http\Controllers\Monitoreo::class, 'reports']);

  Route::get('/moni_eva/report/download/{path}', [App\Http\Controllers\Monitoreo::class, 'reportDownload']);

  //http://ach.dyndns.info:6280/api/meal/analisis_departamenta/download/02_Situacion Humanitaria por conflicto armado.pdf
  Route::get('/analisis_departamenta/download/{path}', [App\Http\Controllers\Monitoreo::class, 'reportDownloadAnalisis']);

  //FIN MIGRACIONS DESDE EL KOBO

  //quejas y reclamos
  Route::get('/mqr/download', [App\Http\Controllers\Media::class, 'downloadMediaPqr']);

  Route::post('/mqr/download/path', [App\Http\Controllers\Media::class, 'downloadMediaPqrPath']);

  Route::post('/mqr/upload', [App\Http\Controllers\PersonComplainted::class, 'stored']);

  Route::middleware(['auth:sanctum'])->get('/mqr', [App\Http\Controllers\Meal::class, 'getMqr']);

  Route::middleware(['auth:sanctum'])->get('/mqrMetadatos', [App\Http\Controllers\Meal::class, 'getMqrMetadatos']);

  Route::middleware(['auth:sanctum'])->get('/mqrspaces', [App\Http\Controllers\Meal::class, 'getMqrSpaces']);

  Route::middleware(['auth:sanctum'])->get('/mqrscaminos', [App\Http\Controllers\Meal::class, 'getMqrCaminos']);

  //carga de actividades
  Route::middleware(['auth:sanctum'])->post('/actividades/upload', [App\Http\Controllers\Activity::class, 'stored']);

  Route::middleware(['auth:sanctum'])->get('/actividades', [App\Http\Controllers\Meal::class, 'getActivity']);

  Route::middleware(['auth:sanctum'])->post('/actividades', [App\Http\Controllers\Meal::class, 'setActivity']);

  Route::middleware(['auth:sanctum'])->post('/echo/upload', [App\Http\Controllers\echoController::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/bha/upload', [App\Http\Controllers\BhaController::class, 'stored']);

  //respuesta rapida
  Route::middleware(['auth:sanctum'])->get('/rr/report', [App\Http\Controllers\Meal::class, 'getRrProdsReport']);

  Route::get('/rr/report/departamentos', function (Request $request) {

    $departamentos = Reports::all()->groupBy('departamento')->keys();

    /*  $departamentos->each(function ($departamento) use ($departamentos) {
       return Departamentos::insert([
         'name' => $departamento
       ]);
     }); */

    return response()->json($departamentos);
  });

  Route::get('/rr/report/municipios', function (Request $request) {

    $municipios = Reports::all()->groupBy('municipio')->keys();

    /* $municipios->each(function ($municipio) use ($municipios) {
      return Municipios::insert([
        'name' => $municipio,
      ]);
    }); */

    return response()->json($municipios);
  });

  Route::get('/rr/report/municipios/{departamento}', function (Request $request) {

    if (isset($request->departamento)) {
      $departamento_finded = Reports::where('departamento', $request->departamento);
      //dd($departamento_finded->get());

      $municipios = $departamento_finded->get()->groupBy('municipio')->keys();
    } else {
      $municipios = Reports::all()->groupBy('municipio')->keys();
    }

    return response()->json($municipios);
  });

  Route::middleware(['auth:sanctum'])->post('/rr/upload', [App\Http\Controllers\ReportController::class, 'stored']);

  //middleware(['auth:sanctum'])->
  Route::post('/rr/prod_info/upload', [App\Http\Controllers\Meal::class, 'uploadProdinfo']);

  Route::get('/rr/prod_info/download', [App\Http\Controllers\Media::class, 'downloadMediaProdinfo']);

  Route::get('/prod_info/exportdownload', [App\Http\Controllers\Meal::class, 'exportReportsProdInfo']);

  //servicio para la recepcion de solicitudes de accso a la plataforma del mireview
  Route::post('/request_register', [App\Http\Controllers\Meal::class, 'requestRegister']);

  //migracion activity info
  Route::post('/migration_kobo_activityinfo', [App\Http\Controllers\Meal::class, 'migracionKoboActivityinfo']);
});

Route::prefix('firebird')->group(function () {

  Route::middleware(['auth:sanctum'])->get('/formularios_master', function (Request $request) {

    DB::setDefaultConnection('firebird');

    $body = [
      "NOMBRES",

      'ID_M_FORMULARIOS',
      //'email',
      //'password',
      "FECHA",
      "FECHA_REGISTRO",
      "ACCION",
      "UNICO",
      "BARCODE",
      "ID_EMPRESA",
      "CAMPO1",
      "CAMPO2",
      "CAMPO3",
      "CAMPO4",
      "CAMPO5",
      "ESTATUS",
      "VIA",
      "TIPO",
      "UID",
      "URL_DATA",
      "URL_CAMPOS",
      /* 
       */
      "COMENTARIOS",
      "GRUPO",
      //relacionales
      "ID_M_CLIENTES",
      "ID_M_USUARIOS",
      "ID_M_AREAS",
    ];

    try {
      $results = [];

      $results = MFormularios::select($body)
        /*
          ->where(['ID_M_FORMULARIOS'=> '0012'])
           ->foreach($form=>{

          }) */
        ->get();

      //$results = helper::convert_from_latin1_to_utf8_recursively($results);
      return response()->json(["formularios_master" => json_decode($results)]);

      //return $results[0];//mb_convert_encoding($results[0]['NOMBRES'], 'UTF-8', 'UTF-8');
      //return response(["message" => "Model status successfully updated!", "data" =>  json_encode($results->toArray())], 200);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  Route::middleware(['auth:sanctum'])->get('/formularios_kobo_master', function (Request $request) {

    //DB::setDefaultConnection('odbc');
    DB::setDefaultConnection('firebird');

    return MKoboFormularios::get();

    /* $formulario = MKoboFormularios::with(
          ['localidad', 'usuario', 'area', 'master_f']
      );

      //return utf8_encode($formulario->get());
      return response()->json(["formularios_kobo_master" => json_decode($formulario->get())]); */
  });

  Route::middleware(['auth:sanctum'])->post('/mireusers', function (Request $request) {

    try {

      DB::setDefaultConnection('firebird');

      $body = $request->body ?? [

        //"NOMBRES",
        //"APELLIDOS",
        //"NOMBRE_COMPLETO",
        "CORREO",
        "ID_M_USUARIO",
        "LOGIN",
        "CLAVE",
        "FECHA",
        "ACCION",
        "UNICO",
        "ID",
        "ID_EMPRESA",

        "HUELLA",
        "SESSION_ID",
        "ESTATUS",
        "IP",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "NIVEL",
        "ROTULO",
        "FECHA_REGISTRO",
        "CODIGO1",
        "CODIGO2",
        "CODIGO3",

        "FRASE",
        "FORMULA",
        "FECHA_NAC",
        "CONDICION_SESION",
        "AGENTE_ESTATUS",
        "LLAVE",
        "NAVEGADOR",

        //relacionales
        "ID_M_NIVELES",
        "ID_M_VENDEDORES",
        "ID_M_CLIENTES",
        "ID_M_DEPARTAMENTOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        //relacionales

        //NO EXISTE
        "ID_M_GRUPOS"
      ];

      $m_usuarios = MUsuarios::select($body)->get(); //where("CORREO" , "!=", "testroles@gmail.com")->

      return response()->json(["users" => helper::convert_from_latin1_to_utf8_recursively($m_usuarios)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  Route::middleware(['auth:sanctum'])->get('/contactos', function (Request $request) {

    try {

      DB::setDefaultConnection('firebird');

      $resultados = DB::select("SELECT * FROM V_D_CONTACTOS_2");

      return response()->json(["resultados" => helper::convert_from_latin1_to_utf8_recursively($resultados)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  Route::middleware(['auth:sanctum'])->post('/grupos', function (Request $request) {

    try {

      DB::setDefaultConnection('firebird');

      $m_grupos = MGrupos::get();

      return response()->json(["grupos" => helper::convert_from_latin1_to_utf8_recursively($m_grupos)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });


  Route::middleware(['auth:sanctum'])->post('/lpamigracion', function (Request $request) {

    try {

      DB::setDefaultConnection('firebird');

      $m_grupos = MGrupos::get();

      return response()->json(["grupos" => helper::convert_from_latin1_to_utf8_recursively($m_grupos)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });



  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {

    /*   try { */

    DB::setDefaultConnection('firebird');

    $resultados = DB::select($request->sql);

    return response()->json(["resultados" => helper::convert_from_latin1_to_utf8_recursively($resultados)]);
    /* } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    } */
  });
});

Route::prefix('firebirdcopy')->group(function () {

  Route::middleware(['auth:sanctum'])->get('/formularios_master', function (Request $request) {

    DB::setDefaultConnection('firebirdcopy');

    $body = [
      "NOMBRES",

      'ID_M_FORMULARIOS',
      //'email',
      //'password',
      "FECHA",
      "FECHA_REGISTRO",
      "ACCION",
      "UNICO",
      "BARCODE",
      "ID_EMPRESA",
      "CAMPO1",
      "CAMPO2",
      "CAMPO3",
      "CAMPO4",
      "CAMPO5",
      "ESTATUS",
      "VIA",
      "TIPO",
      "UID",
      "URL_DATA",
      "URL_CAMPOS",
      /* 
       */
      "COMENTARIOS",
      "GRUPO",
      //relacionales
      "ID_M_CLIENTES",
      "ID_M_USUARIOS",
      "ID_M_AREAS",
    ];

    try {
      $results = [];

      $results = MFormularios::select($body)
        /*
          ->where(['ID_M_FORMULARIOS'=> '0012'])
           ->foreach($form=>{

          }) */
        ->get();

      //$results = helper::convert_from_latin1_to_utf8_recursively($results);
      return response()->json(["formularios_master" => json_decode($results)]);

      //return $results[0];//mb_convert_encoding($results[0]['NOMBRES'], 'UTF-8', 'UTF-8');
      //return response(["message" => "Model status successfully updated!", "data" =>  json_encode($results->toArray())], 200);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  Route::middleware(['auth:sanctum'])->get('/formularios_kobo_master', function (Request $request) {

    //DB::setDefaultConnection('odbc');
    DB::setDefaultConnection('firebirdcopy');

    return MKoboFormularios::get();

    /* $formulario = MKoboFormularios::with(
          ['localidad', 'usuario', 'area', 'master_f']
      );

      //return utf8_encode($formulario->get());
      return response()->json(["formularios_kobo_master" => json_decode($formulario->get())]); */
  });

  Route::middleware(['auth:sanctum'])->post('/mireusers', function (Request $request) {

    try {

      DB::setDefaultConnection('firebirdcopy');

      $body = $request->body ?? [

        //"NOMBRES",
        //"APELLIDOS",
        //"NOMBRE_COMPLETO",
        "CORREO",
        "ID_M_USUARIO",
        "LOGIN",
        "CLAVE",
        "FECHA",
        "ACCION",
        "UNICO",
        "ID",
        "ID_EMPRESA",

        "HUELLA",
        "SESSION_ID",
        "ESTATUS",
        "IP",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "NIVEL",
        "ROTULO",
        "FECHA_REGISTRO",
        "CODIGO1",
        "CODIGO2",
        "CODIGO3",

        "FRASE",
        "FORMULA",
        "FECHA_NAC",
        "CONDICION_SESION",
        "AGENTE_ESTATUS",
        "LLAVE",
        "NAVEGADOR",

        //relacionales
        "ID_M_NIVELES",
        "ID_M_VENDEDORES",
        "ID_M_CLIENTES",
        "ID_M_DEPARTAMENTOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        //relacionales

        //NO EXISTE
        "ID_M_GRUPOS"
      ];

      $m_usuarios = MUsuarios::select($body)->get(); //where("CORREO" , "!=", "testroles@gmail.com")->

      return response()->json(["users" => helper::convert_from_latin1_to_utf8_recursively($m_usuarios)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  Route::middleware(['auth:sanctum'])->post('/grupos', function (Request $request) {

    try {

      DB::setDefaultConnection('firebirdcopy');

      $m_grupos = MGrupos::get();

      return response()->json(["grupos" => helper::convert_from_latin1_to_utf8_recursively($m_grupos)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });


  Route::middleware(['auth:sanctum'])->post('/lpamigracion', function (Request $request) {

    try {

      DB::setDefaultConnection('firebird');

      $m_grupos = MGrupos::get();

      return response()->json(["grupos" => helper::convert_from_latin1_to_utf8_recursively($m_grupos)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });



  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {


    DB::setDefaultConnection('firebirdcopy');

    $resultados = DB::select($request->sql);

    return response()->json(["resultados" => helper::convert_from_latin1_to_utf8_recursively($resultados)]);

    /*   try { */

    /* DB::setDefaultConnection('firebirdcopy');

    $resultados = collect(DB::select($request->sql)); */

    //DB::setDefaultConnection('firebird');
    //$resultados_danados = collect(DB::select($request->sql));

    /* return response()->json([
      "resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados),
      "resultados_danados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados_danados),
    ]); */

    /* $resultados->each(function ( $m_formulario, int $key) use ($resultados_danados){
        // ...
        $resultados_danados->each(function ( $m_formulario_danados, int $key_danado) use($m_formulario){
            // ...
            if($m_formulario_danados->ID_M_FORMULARIOS == $m_formulario->ID_M_FORMULARIOS ){
              DB::setDefaultConnection('firebird');

              DB::select("UPDATE M_FORMULARIOS SET UID='".$m_formulario->UID."', URL_DATA='".$m_formulario->URL_DATA."', URL_CAMPOS='".$m_formulario->URL_CAMPOS."' WHERE ID_M_FORMULARIOS = '".$m_formulario->ID_M_FORMULARIOS."' ");

            }

        });

    }); 

    return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados)]);*/
    /* } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    } */
  });
});

Route::prefix('mongo')->group(function () {

  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {

    /*   try { */

    DB::setDefaultConnection('mongodb');

    $formluario = new MLpaMongo();

    $formluario->id = "1";
    $formluario->_ID = "1";
    $formluario->ID_M_USUARIOS = "1";
    $formluario->ID_M_FORMULARIOS = "1";
    $formluario->ESTATUS = "1";

    $formluario->save();

    $resultados = MLpaMongo::all();

    //
    $cliente = MongodbServiceProvider::class;

    /* $queryRandom = DB::setDefaultConnection('mongodb')->collection($request->collection)//'movies'
    ->where($request->where, $request->wherevalue)//'imdb.rating' 9.3 
    ->get(); */

    return response()->json([
      //"res" => $queryRandom,
      "resultados" => helper::convert_from_latin1_to_utf8_recursively($resultados)
    ]);
    /* } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
      } */
  });

  Route::post('/lpa/upload', [App\Http\Controllers\PersonAttendedMongo::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/lpa/checked', [App\Http\Controllers\PersonAttendedMongo::class, 'checked']);

  Route::middleware(['auth:sanctum'])->post('/lpa/process', [App\Http\Controllers\PersonAttendedMongo::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/lpa/refreshMigrations', [App\Http\Controllers\PersonAttendedMongo::class, 'refreshMigrations']);

  Route::middleware(['auth:sanctum'])->get('/lpasegOnly', [App\Http\Controllers\MealMongo::class, 'getLpaOnly']);
  Route::middleware(['auth:sanctum'])->get('/lpasegOnlyCount', [App\Http\Controllers\MealMongo::class, 'getLpaOnlyCount']);

  Route::middleware(['auth:sanctum'])->delete('/lpa', [App\Http\Controllers\PersonAttendedMongo::class, 'delete']); //receptor

  // este solicitud crea tantos trabajos para hacer solicitudes a la funcion que hace refresh tantas veces como sea neceasatio de forma asyncrona o en paralelo a las respuestas
  Route::middleware(['auth:sanctum'])->get('/lpa/repairJobsCreateRefresh', [App\Http\Controllers\PersonAttendedMongo::class, 'repairJobsCreateRefresh']);

  Route::middleware(['auth:sanctum'])->get('/lpa/emergencia', [App\Http\Controllers\EmergenciasMongo::class, 'getEmergenciaByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/actividad', [App\Http\Controllers\ActivityMongo::class, 'getActividadByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/persona', [App\Http\Controllers\PersonAttendedMongo::class, 'getPersonaByID']);

  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareobha', [App\Http\Controllers\PersonAttended::class, 'getRangeBha']);
  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareoecho', [App\Http\Controllers\PersonAttended::class, 'getRangeEcho']);
  Route::middleware(['auth:sanctum'])->get('/lpa/tipo', [App\Http\Controllers\PersonAttendedMongo::class, 'getTipoLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpa/donante', [App\Http\Controllers\PersonAttendedMongo::class, 'getDonante']);

  Route::middleware(['auth:sanctum'])->get('/emergencia', [App\Http\Controllers\EmergenciasMongo::class, 'getEmergenciaS']);
});

Route::middleware((['auth:sanctum']))->prefix('pgsql')->group(function () {

  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {

    /*   try { */
    $resultados = DB::select($request->sql);

    return response()->json(["resultados" => helper::convert_from_latin1_to_utf8_recursively($resultados)]);
    /* } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
      } */
  });
});


Route::middleware(['auth:sanctum'])->prefix('kobo')->group(function () {
  Route::get('{uui}/export/{token}', function ($uui, $token) {

    //dd($uui, $token);

    //https://kc.acf-e.org/api/v1/forms?id_string=a4E3J9gkULZe5eRqQph8zh
    $jsonurlform = "https://kc.acf-e.org/api/v1/forms?id_string=" . $uui;

    $dataForm = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => '*/*'
    ])
      ->get($jsonurlform)
      ->json();

    $formid = collect($dataForm[0])->get('formid');


    //submissions es lo mismo que data
    //...{_id_formulario}
    //https://kc.acf-e.org/api/v1/data/2486
    $jsonurlData = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

    $dataSubmissionsResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlData)
      ->json();

    $dataSubmissionsData = collect($dataSubmissionsResponse);

    //contruccion de json con los datos para generar links de keto temporar para generar html luego ajustar html luego generar pdf

    /* $dataSubmissionsData->each(function (Collection $item) {
            // ...
        }); */

    $dataId = $dataSubmissionsData->first()['_id'];

    //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
    //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
    $jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;

    $dataEnketoResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlDataEnketo)
      ->json();

    $dataEnketo = collect($dataEnketoResponse);

    //$urlHtmlPdf = $dataEnketo->first();

    //return ($urlHtmlPdf);
    //onbtener url de lso iagens https://kc.acf-e.org/api/v1/media/2486

    //imagenes del formulario
    /* $urlMedia = "https://kc.acf-e.org/api/v1/media/";

        $dataMediaResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($urlMedia); */
    //return $dataEnketo;,

    //contruyrndo las imagenes del formulario

    $dataEnketoWithImage = $dataEnketo->map(function ($chield) {
      $formulario = collect($chield); //->forget('name');

      $claves = $formulario->keys();
      $valores = array_values($chield);
      //!id_object($valor) && 

      for ($i = 0; $i < count($claves); $i++) {
        # code...
        $clave = $claves[$i];
        $valor = $valores[$i];

        if (!is_array($valor) && isset($clave)) {

          if (
            (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
            (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
            (stripos($valor, '.jpeg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
            (stripos($valor, '.svg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png')))
          ) {
            $chield_attachments = collect($chield['_attachments']);

            $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
              return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
            });

            $urlImg = collect($urlImgFirst);

            $formulario->$clave = $urlImg->first()['download_url'];
          }
        }
      }

      return $formulario;
    });

    return view('pdf.formulario', ["data" => $dataEnketo->first()]);

      /* $pdf = Pdf::loadView('pdf.formulario', ["data" => $dataEnketo->first()]);
      return $pdf->download('invoice.pdf'); */

      /* [
          "status" => $response->getStatusCode(),
          "data" => $response->body(),
          "json" => $response->json() ,
          "object" => $response->object() ,
          "status" => $response->status() ,
          "successful" => $response->successful() ,
          "clientError" => $response->clientError() ,
          //"mkoboformulario" => $formulario->get()
      ] */;
  });

  Route::get('{id}/exportByid/{token}', [App\Http\Controllers\Kobo::class, 'exportByid']);

  Route::get('{id}/exportByuui/{token}', [App\Http\Controllers\Kobo::class, 'exportByuui']);

  Route::get('{uui}/data/{token}', [App\Http\Controllers\Kobo::class, 'getKoboLabels']);

  Route::get('{uui}/datawithid/{token}', [App\Http\Controllers\Kobo::class, 'getKoboWidthId']);

  Route::post('seach', [App\Http\Controllers\Kobo::class, 'getKoboSaved']);

  Route::put('{uui}/updatekobomireview/{token}', [App\Http\Controllers\Kobo::class, 'puKoboMireView']);

  Route::get('{uui}/exportTemplate/{token}', [App\Http\Controllers\Kobo::class, 'exportTemplateByid']);
});

Route::prefix('kobo_')->group(function () {
  Route::get('{uui}/data/{token}/{dominioTi}', [App\Http\Controllers\Kobo::class, 'getKobo']);
});

//creacion de matriz de palabras clave

Route::middleware(['auth:sanctum'])->post('/matriz/minas', [App\Http\Controllers\MatrizController::class, 'stored']);

Route::middleware(['auth:sanctum'])->post('/matriz/{origin}', [App\Http\Controllers\MatrizController::class, 'storedMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/minas', [App\Http\Controllers\MatrizController::class, 'all']);

Route::middleware(['auth:sanctum'])->get('/matriz/MAPAEI', [App\Http\Controllers\MatrizController::class, 'getMAPAEI']);

Route::middleware(['auth:sanctum'])->get('/matriz', [App\Http\Controllers\MatrizController::class, 'getMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/{tipo}', [App\Http\Controllers\MatrizController::class, 'getMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/MAPAEICustomDictionary', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::middleware(['auth:sanctum'])->get('/matriz/customDictionary', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::middleware(['auth:sanctum'])->get('/matriz/customDictionary/{tipo}', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::get('/matriz/diccionario/download', [App\Http\Controllers\Media::class, 'downloadMediaMatriz']);

// jobs
Route::middleware(['auth:sanctum'])->post('/job/deploy/{id}/{token}', [App\Http\Controllers\Jobs::class, 'exportByuui']);
Route::middleware(['auth:sanctum'])->post('/job/deploy/exportkobo', [App\Http\Controllers\Jobs::class, 'exportByuui']);
Route::middleware(['auth:sanctum'])->get('/job/deploy/exportkobo', [App\Http\Controllers\Jobs::class, 'getProccessExport']);



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [Auth::class, 'login'])->name('api/login');

//Route::post('register', [Auth::class, 'register']);

Route::post('logout', [Auth::class, 'logout']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('/testmd5', function (Request $request) {

  $string = "";

  if ($request->obj == "d") {
    $string = md5($request->text);
  } else {
    $string = md5($request->text);
  }

  return response()->json(["obj" => $request->obj, "data" => $string]);
});

//ejemplo con roles
/* 
Route::get('/orders', function () {
    // Token has the "check-status" or "place-orders" ability...
})->middleware(['auth:sanctum', 'ability:check-status,place-orders']);
*/

//verificacion de roles

/* 
return $request->user()->id === $server->user_id &&
       $request->user()->tokenCan('server:update')
*/

//revocar tokens

/* // Revoke all tokens...
$user->tokens()->delete();

// Revoke the token that was used to authenticate the current request...
$request->user()->currentAccessToken()->delete();

// Revoke a specific token...
$user->tokens()->where('id', $tokenId)->delete(); */
