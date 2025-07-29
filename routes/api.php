<?php

use App\Http\Controllers\Emergencias;
use App\Models\Departamentos;
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

  /*   try { */
  DB::setDefaultConnection('pgsql');

  /* 
  {
  "event_id": "01K19E1ZW6B3DM313560APNZGF",
  "event_type": "form_response",
  "form_response": {
    "form_id": "VyMQ7Zx4",
    "token": "01K19E1ZW6B3DM313560APNZGF",
    "landed_at": "2025-07-28T21:12:14Z",
    "submitted_at": "2025-07-28T21:12:14Z",
    "calculated": {
      "score": 0
    },
    "variables": [
      {
        "key": "counter_20ecbef2_8e8b_4958_bbfd_1fb1394e48ff",
        "type": "number",
        "number": 0
      },
      {
        "key": "score",
        "type": "number",
        "number": 0
      },
      {
        "key": "winning_outcome_id",
        "type": "text",
        "text": "02549f80-392b-4a2b-9f00-170832f022a4"
      }
    ],
    "definition": {
      "id": "VyMQ7Zx4",
      "title": "Mi nuevo formulario",
      "fields": [
        {
          "id": "SjgNnEde2K7D",
          "ref": "553b5ba8-4822-4880-9fec-6f3cec766ff0",
          "type": "short_text",
          "title": "Nombre",
          "properties": {}
        },
        {
          "id": "WQ3Rx2qPKAsY",
          "ref": "316d44a4-e87b-467e-b8a9-74ff6a159def",
          "type": "short_text",
          "title": "Organización",
          "properties": {}
        },
        {
          "id": "txvCncfjcRdp",
          "ref": "d0d9ae12-de39-4942-87ad-597b21d8853d",
          "type": "dropdown",
          "title": "Tipo de actor",
          "properties": {}
        },
        {
          "id": "pc6Z6t1XGdGe",
          "ref": "10116f77-2740-46c3-bedb-f1dce7e5ddbf",
          "type": "dropdown",
          "title": "Ciudad",
          "properties": {}
        },
        {
          "id": "YPTIg1cIwKWh",
          "ref": "5d1307d0-0167-4312-89db-0f6cd6fb0c56",
          "type": "short_text",
          "title": "Correo electrónico",
          "properties": {}
        },
        {
          "id": "y7HTRROJ5JfE",
          "ref": "380c3554-59d2-4857-a4b4-bc233a15e0ff",
          "type": "picture_choice",
          "title": "Las transiciones se entienden en tres (3) preguntas centrales",
          "properties": {},
          "choices": [
            {
              "id": "gkwtfH3OSKNf",
              "ref": "2410aed1-b667-4e0c-af65-d5fed0f8f835",
              "label": "¿Qué es? Definición"
            },
            {
              "id": "djrdFMFs2YrX",
              "ref": "ce2a3ce8-97ce-4793-8955-6e75e52c6b3a",
              "label": "¿Quiénes? Actores"
            },
            {
              "id": "UCHBSMdZVwRf",
              "ref": "d916e64f-c72c-482f-b931-3f19df28ae9a",
              "label": "¿Cómo? Proceso"
            }
          ]
        },
        {
          "id": "yoCzNt9WBQOn",
          "ref": "2857924a-538f-43b4-9029-583d93ba24f6",
          "type": "multiple_choice",
          "title": "Naturaleza de la transición",
          "properties": {},
          "choices": [
            {
              "id": "QM2IsjJAIvFP",
              "ref": "71e5ed03-5a6c-4ef4-8daf-0d0f19d9725b",
              "label": "\"Lo más importante en la transición es proteger los ecosistemas, incluso por encima de las necesidades humanas inmediatas.\""
            },
            {
              "id": "9yI7mpYKhJGa",
              "ref": "645590a5-428c-4bd5-9139-939507e0e969",
              "label": "\"Debemos cuidar el ambiente, pero sin olvidar a las personas que pueden verse afectadas por los cambios.\""
            },
            {
              "id": "t0cF2NHjqFmX",
              "ref": "262f15dc-67a5-4959-a6a2-0ed8526fc70c",
              "label": "\"La transición debe cuidar tanto la naturaleza como a las personas al mismo tiempo.\""
            },
            {
              "id": "xJkE8MxkjjLN",
              "ref": "28e9b793-5bd8-41fb-aec6-9d856d27e1d6",
              "label": "\"Para cuidar el clima, primero debemos reducir la desigualdad y crear empleos verdes.\""
            },
            {
              "id": "WU1yuF4ZGDpd",
              "ref": "36e51fff-94e1-4e2c-8539-ee1a6db7c4f6",
              "label": "\"El cambio climático es un problema de injusticia social, y la transición debe centrarse en mejorar la vida de las personas más vulnerables.\""
            }
          ]
        },
        {
          "id": "tHcrfEoG3DOh",
          "ref": "4c510a95-7473-4b33-9aa7-db8879e9c095",
          "type": "multiple_choice",
          "title": "Tipos de transición",
          "properties": {},
          "choices": [
            {
              "id": "qByOhSv6BaGD",
              "ref": "ee06f1b8-dea0-402f-8c99-b29854a4933d",
              "label": "\"La transición debe ser una ruptura profunda con el modelo actual, para restaurar el equilibrio del planeta y detener el colapso ecológico.\""
            },
            {
              "id": "xXBk1s5oFiTs",
              "ref": "45e88e8b-8b40-4d94-9573-41da0c7c89df",
              "label": "\"Debemos avanzar hacia una economía baja en carbono mediante innovación tecnológica y regulación ambiental, sin detener el crecimiento económico.\""
            },
            {
              "id": "BFY46QeLncIf",
              "ref": "51e31e82-d19c-469a-b8fb-e183b611dfc1",
              "label": "\"La transición debe cambiar la relación entre humanos y naturaleza, haciendo compatibles el bienestar social y los límites ecológicos.\""
            },
            {
              "id": "RBaBPrEoEAOy",
              "ref": "c3b2ed36-aed8-44e6-88de-0e664bd6d196",
              "label": "\"La transición debe cambiar nuestros estilos de vida y patrones de consumo para que todos vivamos bien, dentro de las capacidades del planeta.\""
            },
            {
              "id": "MBM5T9kTym1H",
              "ref": "3b492577-4b49-4960-a1b0-f36eaf3283cd",
              "label": "\"La verdadera transición debe corregir las desigualdades estructurales, priorizando a quienes más han sufrido los impactos del sistema actual.\""
            }
          ]
        },
        {
          "id": "qRIsMMPzhV1B",
          "ref": "83dd972d-af0b-4c82-b622-09f04a5f556c",
          "type": "multiple_choice",
          "title": "Ritmo",
          "properties": {},
          "choices": [
            {
              "id": "qO7wVpKI5765",
              "ref": "6f53bb5a-3897-4f10-8377-3b6cb95b7246",
              "label": "\"La transición debe comenzar ya, antes de que los daños al planeta sean irreversibles.\""
            },
            {
              "id": "l4EneVcnf7lL",
              "ref": "46846e1a-e71e-42f3-b657-6f1001a2cad0",
              "label": "\"Necesitamos transiciones rápidas, pero bien organizadas para no generar impactos negativos en las personas.\""
            },
            {
              "id": "YIo4RbPDHuZw",
              "ref": "6fe0b4ef-c2ef-48a7-a583-3471e2e86e8a",
              "label": "\"La transición debe avanzar paso a paso, equilibrando el cuidado ambiental con el bienestar social.\""
            },
            {
              "id": "WdcCTtqUseAX",
              "ref": "283dceb9-369e-4552-8e58-4a99665f6467",
              "label": "\"Las transiciones toman tiempo porque implican cambios en cómo vivimos, trabajamos y nos relacionamos.\""
            },
            {
              "id": "th6V1BRvtDoi",
              "ref": "3d286053-fdfe-4a1a-9e93-cbb6339c1cd3",
              "label": "\"La transición debe construirse con paciencia, priorizando la reparación de desigualdades históricas antes que la velocidad.\""
            }
          ]
        },
        {
          "id": "qkA6nNBaQoZ7",
          "ref": "5008b1c8-797c-4e32-97ec-7de4605f7c85",
          "type": "multiple_choice",
          "title": "Escala",
          "properties": {},
          "choices": [
            {
              "id": "FLWTfCcJHmss",
              "ref": "313522ce-7779-4010-99c0-3ed224523f02",
              "label": "\"La transición debe abordarse desde una perspectiva global, ya que los efectos y soluciones del cambio climático trascienden fronteras.\""
            },
            {
              "id": "a3WbFCFPaDMM",
              "ref": "dae94d96-3a6e-4790-aa29-85d7cbfb50d1",
              "label": "\"Los Estados deben liderar la transición con políticas públicas integrales, adaptadas a las condiciones y prioridades del país.\""
            },
            {
              "id": "71Wpih00mwoO",
              "ref": "7758290a-6edc-4c7e-9496-7505368ad732",
              "label": "\"Es necesario hacer cambios desde los territorios, por sus realidades propias, y desde lo global, para lograr una transformación climática más amplia.\""
            },
            {
              "id": "V5HHnF3NQ1Ha",
              "ref": "ae234065-e017-4da2-8a51-c2b9ad71bc98",
              "label": "\"La transición necesita arraigarse en lo local, donde se viven directamente los impactos y se pueden construir soluciones concretas.\""
            },
            {
              "id": "lFaycz0b03C0",
              "ref": "9f430cf9-00f0-489c-84c1-d728efd137cb",
              "label": "\"La transición debe centrarse en los espacios históricamente invisibilizados, donde el cambio es más urgente y necesario.\""
            }
          ]
        },
        {
          "id": "rAFbjxNlKok8",
          "ref": "a00daff9-6391-463b-ba8b-9771ea372172",
          "type": "multiple_choice",
          "title": "Actores involucrados",
          "properties": {},
          "choices": [
            {
              "id": "XQgspeUcxRO6",
              "ref": "c338e360-cf30-42a6-89c4-5d3efef4a521",
              "label": "\"La transición solo es posible si todos los actores —gobiernos, empresas, comunidades, organizaciones y academia— participan de forma activa y con responsabilidades compartidas.\""
            },
            {
              "id": "8BTA0QGd26JX",
              "ref": "f2449f02-3b1b-44b8-a362-ec1ed5682aa6",
              "label": "\"Los procesos de transición deben construirse en alianza entre el Estado y las comunidades, permitiendo participación pero con liderazgo institucional.\""
            },
            {
              "id": "OvRS9DF1RGSR",
              "ref": "164acc06-9a49-4805-a88b-6159fa7425f8",
              "label": "\"Se requiere la participación de varios actores, pero con un actor coordinador que oriente y articule los esfuerzos, sin perder la diversidad de voces.\""
            },
            {
              "id": "Y6hHrQLmxWqV",
              "ref": "f35ffaa4-6c61-4cac-ae2f-a22436272b7f",
              "label": "\"Un actor debe asumir el liderazgo de la transición —como el Estado o las comunidades—, recibiendo aportes de otros, pero sin depender de ellos.\""
            },
            {
              "id": "vHBwr3SPXCiE",
              "ref": "edb066a8-d437-41fc-a944-b67ac77eb5eb",
              "label": "\"La transición debe ser dirigida por un solo actor con legitimidad y capacidad, para garantizar coherencia y evitar interferencias externas.\""
            }
          ]
        },
        {
          "id": "3heJYKbXUziW",
          "ref": "db374eb4-32e6-457c-9e5d-f70deb1e87b2",
          "type": "multiple_choice",
          "title": "Rol Estado",
          "properties": {},
          "choices": [
            {
              "id": "MbWH7gM0wQ5I",
              "ref": "17a3f192-a042-46b6-b0ee-86d2df6e0309",
              "label": "\"El Estado debe limitarse a generar las condiciones básicas para que otros actores —como el mercado, la sociedad civil o las comunidades— lideren los procesos de transición.\""
            },
            {
              "id": "Wf8U45yfN5f7",
              "ref": "97b4ec51-8ad5-4dd8-bf74-e00f9d49547c",
              "label": "\"El Estado debe actuar como mediador y conector entre sectores, garantizando que la transición sea incluyente, sin imponer rutas únicas.\""
            },
            {
              "id": "RCMYn5DXzh3E",
              "ref": "9dbcac2d-3fe0-42cc-8daf-d0f0a81eb8b8",
              "label": "\"El Estado debe tener un rol activo, guiando la transición con políticas claras, pero permitiendo que comunidades, empresas y otros actores definan cómo implementarlas.\""
            },
            {
              "id": "CQcfv9DudpZl",
              "ref": "ba0d2976-7b31-4188-84a8-1d61ac33eb4b",
              "label": "\"El Estado debe liderar la transición con decisiones firmes, inversiones públicas y regulación, pero escuchando a los territorios y actores sociales.\""
            },
            {
              "id": "Z6GGlfxdOoTL",
              "ref": "d4282388-abef-4bd6-a376-c60357e040da",
              "label": "\"Solo el Estado tiene la legitimidad y capacidad para dirigir la transición de forma coherente y justa; debe asumir el control total del proceso.\""
            }
          ]
        },
        {
          "id": "nacJxKep9HZ6",
          "ref": "6f846b69-c6eb-475b-8adc-4854ad8017e0",
          "type": "multiple_choice",
          "title": "Rol Empresas",
          "properties": {},
          "choices": [
            {
              "id": "nYy2CwC2IJsc",
              "ref": "c85b1e5e-6e50-4e7c-8882-d604de23e1b6",
              "label": "\"Las empresas deben limitarse a cumplir regulaciones; no pueden liderar la transición porque sus intereses económicos no siempre se alinean con el bien común.\""
            },
            {
              "id": "bJkXZVABgFOk",
              "ref": "e24db4c5-7bcf-451f-bc15-b5511e5dcf39",
              "label": "\"Las empresas pueden participar en la transición, pero deben estar fuertemente reguladas por el Estado para asegurar que sus acciones no generen más desigualdad o daño ambiental.\""
            },
            {
              "id": "qA7Ww8HFKF52",
              "ref": "1d23c11e-120a-4491-8de6-5bf0444ca625",
              "label": "\"Las empresas tienen un papel importante, pero compartido: deben actuar junto al Estado y la sociedad civil para lograr una transición equilibrada y justa.\""
            },
            {
              "id": "Zj8zrbITGacd",
              "ref": "688a605c-7ccd-4491-bd69-15cd0d2201d8",
              "label": "\"Las empresas pueden acelerar la transición a través de innovación, inversión y escalamiento de soluciones, siempre que integren criterios sociales y ambientales en su modelo de negocio.\""
            },
            {
              "id": "DU2zl3rgar3F",
              "ref": "f36c4677-9f30-4ba1-8d13-efc2361ed583",
              "label": "\"La verdadera transformación vendrá del sector empresarial; la eficiencia, tecnología, generación de valor y capacidad de adaptación del mercado son clave para enfrentar el cambio climático.\""
            }
          ]
        },
        {
          "id": "O4rzkJUbply0",
          "ref": "f7530e88-0690-421a-a7c0-038b9e0f2818",
          "type": "multiple_choice",
          "title": "Rol Comunidades",
          "properties": {},
          "choices": [
            {
              "id": "thqaFiZlQFyn",
              "ref": "3a03f13b-c799-434c-8a94-0349e2258402",
              "label": "“Las comunidades deben adaptarse a los planes definidos por expertos, gobiernos o empresas, ya que no tienen la capacidad técnica para liderar procesos complejos.”"
            },
            {
              "id": "Ro8C1jcvcsWn",
              "ref": "3e359d38-2d19-494a-9dcf-f0818591d8a2",
              "label": "\"Las comunidades pueden implementar acciones de transición, pero dentro de marcos definidos por actores institucionales o técnicos.\""
            },
            {
              "id": "BgnvNv7EBwem",
              "ref": "946c9100-0d61-4385-8de6-91d9b0208890",
              "label": "\"Las comunidades deben compartir responsabilidades en los procesos de transición, ya que entienden mejor su territorio y pueden liderar procesos desde lo local.\""
            },
            {
              "id": "uXTXSJOCHMOZ",
              "ref": "0c4a1d1d-e78c-4c64-ad3f-21954a6d3fb6",
              "label": "\"Las comunidades deben participar activamente para que la transición sea efectiva y sostenible, aportando conocimiento, experiencia y legitimidad local.\""
            },
            {
              "id": "bFD4NmHsOcAw",
              "ref": "55fc45cb-6c3b-47c3-8408-dd4a39751068",
              "label": "\"Las comunidades deben ser protagonistas de la transición, decidiendo por sí mismas cómo transformar su forma de vida, su economía y su relación con el entorno.\""
            }
          ]
        },
        {
          "id": "2ktuE4cJBaDR",
          "ref": "bae93355-e334-4765-a967-d53eebc2f424",
          "type": "multiple_choice",
          "title": "OSC",
          "properties": {},
          "choices": [
            {
              "id": "aD1Hch3XtoEl",
              "ref": "f59910cb-8d88-4b7c-a970-1e9253758367",
              "label": "“Las organizaciones de la sociedad civil pueden opinar o acompañar, pero no deben interferir en las decisiones técnicas o de gobierno sobre la transición.\""
            },
            {
              "id": "LH5TKuGBPKXW",
              "ref": "2c83bc84-d2b7-46ff-be5c-4fedbd4b2e0e",
              "label": "\"Las OSC pueden cumplir una función útil como veedoras, generando presión social o ayudando a traducir decisiones institucionales hacia las comunidades.\""
            },
            {
              "id": "9tn9AeiVjiVq",
              "ref": "6422178a-ff26-403c-8b49-206902087555",
              "label": "\"Las OSC deben participar activamente junto con el Estado, las empresas y comunidades en el diseño e implementación de la transición.\""
            },
            {
              "id": "7bEcORf9C9wq",
              "ref": "d53f17f1-3e64-48cd-997e-ae19aa0e1ff2",
              "label": "\"Las OSC juegan un papel clave en conectar actores, generar conciencia, movilizar comunidades y democratizar las transiciones desde abajo.\""
            },
            {
              "id": "xfnxLAcW4gGo",
              "ref": "ffdf3ce7-2359-4d67-8ad4-a595bee80276",
              "label": "\"Las organizaciones sociales deben liderar las transiciones como expresión de poder ciudadano, impulsando cambios estructurales desde la base social y la justicia climática.\""
            }
          ]
        },
        {
          "id": "6x4H9m16AOze",
          "ref": "07f8da00-cc71-4afe-aea5-7743896c5150",
          "type": "multiple_choice",
          "title": "Toma de decisiones",
          "properties": {},
          "choices": [
            {
              "id": "Hij7MBNxOASC",
              "ref": "881e7c58-c502-47a4-a96d-0d253bf2c87b",
              "label": "\"Las decisiones sobre la transición deben ser tomadas por expertos y autoridades centrales, ya que requieren conocimientos técnicos y visión global.\""
            },
            {
              "id": "7LNByHTghQWT",
              "ref": "4bf06e12-58db-4c89-b911-4113a701f47e",
              "label": "\"El Estado debe liderar la transición, incorporando aportes de otros sectores a través de mecanismos consultivos, sin perder la dirección técnica del proceso.\""
            },
            {
              "id": "NiF98YuFOefz",
              "ref": "d1a598cd-df03-4b34-a14b-640f748a43b4",
              "label": "\"Las decisiones deben ser producto del diálogo entre Estado, empresas, comunidades y sociedad civil, con mecanismos reales de corresponsabilidad.\""
            },
            {
              "id": "nNssjI6jgidN",
              "ref": "c133b769-cc26-41ab-a0f1-e0eeedd4d8ee",
              "label": "\"Las decisiones deben construirse desde los territorios y con participación activa de los actores locales, articulando saberes y prioridades diversas, con participación de la institucionalidad.\""
            },
            {
              "id": "TT3kkZaTmvCD",
              "ref": "7d48e62b-46c0-45c7-a725-602e996e916f",
              "label": "\"Las transiciones deben ser decididas directamente por las comunidades y movimientos sociales, como ejercicio de soberanía y justicia territorial.\""
            }
          ]
        },
        {
          "id": "KghuAE3dqgnS",
          "ref": "758a68c0-d2ab-4e6a-8827-b5b8aef330bf",
          "type": "multiple_choice",
          "title": "Espacios",
          "properties": {},
          "choices": [
            {
              "id": "o67mukLd7Mm8",
              "ref": "49bc22ce-2078-444b-9851-f513576f3a19",
              "label": "\"Los espacios institucionales actuales —gobiernos, organismos multilaterales, foros técnicos— ya tienen la legitimidad y capacidad para liderar la transición.\""
            },
            {
              "id": "Mtg36dmClmzd",
              "ref": "74b7697c-5cd9-462a-87be-1009e1f0bd19",
              "label": "\"Los espacios existentes son útiles, pero necesitan abrirse más a otros actores y renovar su legitimidad mediante mayor inclusión y transparencia.\""
            },
            {
              "id": "Z4tGyKnWHjlw",
              "ref": "7bfaf90d-3b30-4aea-bde9-c699f53f9e7a",
              "label": "\"La transición debe apoyarse tanto en instituciones ya establecidas como en nuevos espacios de participación creados desde lo territorial y sectorial.\""
            },
            {
              "id": "K3wGzvGxskXX",
              "ref": "686ba4af-e70c-4e3f-aa12-50991f4bdacf",
              "label": "\"La gran mayoría de espacios existentes carecen de legitimidad; la transición requiere espacios más democráticos desde los territorios y las comunidades.\""
            },
            {
              "id": "ZG1Pn9S2qM1b",
              "ref": "50a4542f-e375-4588-93c2-1cafa4e8a7db",
              "label": "\"Los espacios legítimos para la transición deben ser creados por los pueblos y movimientos sociales, al margen de las instituciones tradicionales que han fallado.\""
            }
          ]
        },
        {
          "id": "eGQiuoOqVv1t",
          "ref": "9908e10c-9196-48cb-a2e4-3d0d14291719",
          "type": "multiple_choice",
          "title": "Marcos",
          "properties": {},
          "choices": [
            {
              "id": "2SqBcFiZj6qX",
              "ref": "980342c3-299c-4c95-964d-71a050daa424",
              "label": "\"Ya existen los tratados, leyes y políticas necesarios para impulsar la transición; lo que falta es voluntad y aplicación efectiva.\""
            },
            {
              "id": "PPtYdt2YUzax",
              "ref": "b44d9c82-255f-4cae-a4ad-30b136b6e0fa",
              "label": "\"Las normas actuales son una buena base, pero deben modernizarse para responder a los desafíos específicos del cambio climático y los contextos locales.\""
            },
            {
              "id": "QKH2FvdphlXm",
              "ref": "54196455-8528-4535-984a-b504df1da0b7",
              "label": "\"La transición necesita articular leyes nacionales e internacionales con nuevos marcos adaptados a sectores estratégicos o realidades regionales.\""
            },
            {
              "id": "Ba8gRsPKOEPF",
              "ref": "27afc1d2-f23e-459d-bda2-840b93799ae2",
              "label": "\"Los marcos legales actuales no reflejan la diversidad de los territorios ni las voces comunitarias; es necesario construir nuevas normativas desde lo local.\""
            },
            {
              "id": "FRRtGQdYMkqN",
              "ref": "7e66d603-1a2c-4135-9e68-677c7f2c0b5c",
              "label": "\"Los marcos normativos vigentes han sostenido el modelo que queremos cambiar; debemos crear nuevas reglas desde las comunidades, con base en justicia climática, derechos de la naturaleza y autonomía.\""
            }
          ]
        },
        {
          "id": "kdOJsbZ2NNE3",
          "ref": "e760bb3b-7721-407f-b56f-162bf2ab7a33",
          "type": "multiple_choice",
          "title": "Colaboración",
          "properties": {},
          "choices": [
            {
              "id": "rPILp5YKKFSw",
              "ref": "184ba6c8-4ce5-4e50-97c8-4129e5f245a5",
              "label": "\"La transición climática solo será posible si todos los países y territorios cooperan y se coordinan globalmente.\""
            },
            {
              "id": "FjVL3ypEaCOG",
              "ref": "7673bb87-d6e7-4d61-bb0a-93c36e18e1f5",
              "label": "\"La transición requiere alianzas entre regiones, sectores y comunidades que compartan tecnologías, recursos y aprendizajes.\""
            },
            {
              "id": "epUlzlgHCx3v",
              "ref": "7aabf26e-7923-482a-a3a9-bb217680db39",
              "label": "\"La transición debe combinar colaboración internacional con capacidad local para decidir qué cambios hacer y cómo hacerlos.\""
            },
            {
              "id": "WZN52gn58zuC",
              "ref": "afba18f8-e99b-48b5-ab52-2b25baee79c4",
              "label": "\"Los territorios deben tener el control de sus procesos de transición, pero sin aislarse de las redes de apoyo y aprendizaje global.\""
            },
            {
              "id": "NhFbWbW0fJNy",
              "ref": "8d675aed-cefb-4c96-8542-4f40bfc2faed",
              "label": "\"Cada comunidad debe definir su propio camino de transición, con base en su cultura, sus necesidades y su autonomía, sin imposiciones externas.\""
            }
          ]
        },
        {
          "id": "e0du0Cby8xyd",
          "ref": "f9a4da9c-e441-4241-9775-53f54a0afe0d",
          "type": "multiple_choice",
          "title": "Priorización",
          "properties": {},
          "choices": [
            {
              "id": "4NXGmBIW9LhV",
              "ref": "42acce20-6f32-4daa-a9bf-6df51ae6908b",
              "label": "\"Las acciones climáticas deben postergarse hasta garantizar la reparación integral de los impactos sociales y ambientales acumulados.\""
            },
            {
              "id": "BtrTtJ1GkqMU",
              "ref": "31a6bd78-d4ea-42ca-9eb3-fefd0a1c5edd",
              "label": "\"La acción climática debe implementarse en paralelo con mecanismos de justicia ambiental y social que atiendan impactos históricos.\""
            },
            {
              "id": "WhYAWoEFkCib",
              "ref": "1859ce9d-bf4e-48c8-8803-98cd9d6bdb0c",
              "label": "\"La transición climática debe equilibrar la urgencia de actuar con la atención a los efectos sociales y ambientales asociados.\""
            },
            {
              "id": "w9Jo6VdfZqfh",
              "ref": "ffb7f99c-b045-443c-963a-5ecb8743c2b3",
              "label": "\"La respuesta climática debe priorizar acciones inmediatas, incorporando medidas progresivas de mitigación de impactos.\""
            },
            {
              "id": "PP2quJZTeypF",
              "ref": "7ff9c244-c2e5-4285-802b-5d8dc84cab6d",
              "label": "\"La prioridad es avanzar con rapidez en la acción climática, asumiendo que los impactos se abordarán de forma complementaria.\""
            }
          ]
        }
      ],
      "outcome": {
        "variable": "winning_outcome_id",
        "choices": [
          {
            "id": "k0qMj0p0Hsz3",
            "ref": "02549f80-392b-4a2b-9f00-170832f022a4",
            "title": "Agradecemos tu participación",
            "counter_variable": "counter_20ecbef2_8e8b_4958_bbfd_1fb1394e48ff",
            "thankyou_screen_ref": "459f8353-02e1-4f70-8ee8-da272b73c85e"
          }
        ]
      },
      "endings": [
        {
          "id": "a2GOoTSqptj3",
          "ref": "459f8353-02e1-4f70-8ee8-da272b73c85e",
          "title": "Agradecemos tu participación",
          "type": "thankyou_screen",
          "properties": {
            "button_text": "Finalizar",
            "show_button": true,
            "share_icons": true,
            "button_mode": "default_redirect"
          }
        }
      ],
      "settings": {
        "partial_responses_to_all_integrations": true
      }
    },
    "answers": [
      {
        "type": "text",
        "text": "Lorem ipsum dolor",
        "field": {
          "id": "SjgNnEde2K7D",
          "type": "short_text",
          "ref": "553b5ba8-4822-4880-9fec-6f3cec766ff0"
        }
      },
      {
        "type": "text",
        "text": "Lorem ipsum dolor",
        "field": {
          "id": "WQ3Rx2qPKAsY",
          "type": "short_text",
          "ref": "316d44a4-e87b-467e-b8a9-74ff6a159def"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "EuVfH8ZPzxZM",
          "label": "1. Organizaciones de la Sociedad Civil",
          "ref": "c5ac8aaf-6a24-4258-a4e7-be20db9b1c6d"
        },
        "field": {
          "id": "txvCncfjcRdp",
          "type": "dropdown",
          "ref": "d0d9ae12-de39-4942-87ad-597b21d8853d"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "cMpqV3O4ba0u",
          "label": "Apartadó (Antioquia)",
          "ref": "e1283a56-a452-44b7-bc1d-7f174e4f5a80"
        },
        "field": {
          "id": "pc6Z6t1XGdGe",
          "type": "dropdown",
          "ref": "10116f77-2740-46c3-bedb-f1dce7e5ddbf"
        }
      },
      {
        "type": "text",
        "text": "Lorem ipsum dolor",
        "field": {
          "id": "YPTIg1cIwKWh",
          "type": "short_text",
          "ref": "5d1307d0-0167-4312-89db-0f6cd6fb0c56"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "gkwtfH3OSKNf",
          "label": "¿Qué es? Definición",
          "ref": "2410aed1-b667-4e0c-af65-d5fed0f8f835"
        },
        "field": {
          "id": "y7HTRROJ5JfE",
          "type": "picture_choice",
          "ref": "380c3554-59d2-4857-a4b4-bc233a15e0ff"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "QM2IsjJAIvFP",
          "label": "\"Lo más importante en la transición es proteger los ecosistemas, incluso por encima de las necesidades humanas inmediatas.\"",
          "ref": "71e5ed03-5a6c-4ef4-8daf-0d0f19d9725b"
        },
        "field": {
          "id": "yoCzNt9WBQOn",
          "type": "multiple_choice",
          "ref": "2857924a-538f-43b4-9029-583d93ba24f6"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "qByOhSv6BaGD",
          "label": "\"La transición debe ser una ruptura profunda con el modelo actual, para restaurar el equilibrio del planeta y detener el colapso ecológico.\"",
          "ref": "ee06f1b8-dea0-402f-8c99-b29854a4933d"
        },
        "field": {
          "id": "tHcrfEoG3DOh",
          "type": "multiple_choice",
          "ref": "4c510a95-7473-4b33-9aa7-db8879e9c095"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "qO7wVpKI5765",
          "label": "\"La transición debe comenzar ya, antes de que los daños al planeta sean irreversibles.\"",
          "ref": "6f53bb5a-3897-4f10-8377-3b6cb95b7246"
        },
        "field": {
          "id": "qRIsMMPzhV1B",
          "type": "multiple_choice",
          "ref": "83dd972d-af0b-4c82-b622-09f04a5f556c"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "FLWTfCcJHmss",
          "label": "\"La transición debe abordarse desde una perspectiva global, ya que los efectos y soluciones del cambio climático trascienden fronteras.\"",
          "ref": "313522ce-7779-4010-99c0-3ed224523f02"
        },
        "field": {
          "id": "qkA6nNBaQoZ7",
          "type": "multiple_choice",
          "ref": "5008b1c8-797c-4e32-97ec-7de4605f7c85"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "XQgspeUcxRO6",
          "label": "\"La transición solo es posible si todos los actores —gobiernos, empresas, comunidades, organizaciones y academia— participan de forma activa y con responsabilidades compartidas.\"",
          "ref": "c338e360-cf30-42a6-89c4-5d3efef4a521"
        },
        "field": {
          "id": "rAFbjxNlKok8",
          "type": "multiple_choice",
          "ref": "a00daff9-6391-463b-ba8b-9771ea372172"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "MbWH7gM0wQ5I",
          "label": "\"El Estado debe limitarse a generar las condiciones básicas para que otros actores —como el mercado, la sociedad civil o las comunidades— lideren los procesos de transición.\"",
          "ref": "17a3f192-a042-46b6-b0ee-86d2df6e0309"
        },
        "field": {
          "id": "3heJYKbXUziW",
          "type": "multiple_choice",
          "ref": "db374eb4-32e6-457c-9e5d-f70deb1e87b2"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "nYy2CwC2IJsc",
          "label": "\"Las empresas deben limitarse a cumplir regulaciones; no pueden liderar la transición porque sus intereses económicos no siempre se alinean con el bien común.\"",
          "ref": "c85b1e5e-6e50-4e7c-8882-d604de23e1b6"
        },
        "field": {
          "id": "nacJxKep9HZ6",
          "type": "multiple_choice",
          "ref": "6f846b69-c6eb-475b-8adc-4854ad8017e0"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "thqaFiZlQFyn",
          "label": "“Las comunidades deben adaptarse a los planes definidos por expertos, gobiernos o empresas, ya que no tienen la capacidad técnica para liderar procesos complejos.”",
          "ref": "3a03f13b-c799-434c-8a94-0349e2258402"
        },
        "field": {
          "id": "O4rzkJUbply0",
          "type": "multiple_choice",
          "ref": "f7530e88-0690-421a-a7c0-038b9e0f2818"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "aD1Hch3XtoEl",
          "label": "“Las organizaciones de la sociedad civil pueden opinar o acompañar, pero no deben interferir en las decisiones técnicas o de gobierno sobre la transición.\"",
          "ref": "f59910cb-8d88-4b7c-a970-1e9253758367"
        },
        "field": {
          "id": "2ktuE4cJBaDR",
          "type": "multiple_choice",
          "ref": "bae93355-e334-4765-a967-d53eebc2f424"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "Hij7MBNxOASC",
          "label": "\"Las decisiones sobre la transición deben ser tomadas por expertos y autoridades centrales, ya que requieren conocimientos técnicos y visión global.\"",
          "ref": "881e7c58-c502-47a4-a96d-0d253bf2c87b"
        },
        "field": {
          "id": "6x4H9m16AOze",
          "type": "multiple_choice",
          "ref": "07f8da00-cc71-4afe-aea5-7743896c5150"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "o67mukLd7Mm8",
          "label": "\"Los espacios institucionales actuales —gobiernos, organismos multilaterales, foros técnicos— ya tienen la legitimidad y capacidad para liderar la transición.\"",
          "ref": "49bc22ce-2078-444b-9851-f513576f3a19"
        },
        "field": {
          "id": "KghuAE3dqgnS",
          "type": "multiple_choice",
          "ref": "758a68c0-d2ab-4e6a-8827-b5b8aef330bf"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "2SqBcFiZj6qX",
          "label": "\"Ya existen los tratados, leyes y políticas necesarios para impulsar la transición; lo que falta es voluntad y aplicación efectiva.\"",
          "ref": "980342c3-299c-4c95-964d-71a050daa424"
        },
        "field": {
          "id": "eGQiuoOqVv1t",
          "type": "multiple_choice",
          "ref": "9908e10c-9196-48cb-a2e4-3d0d14291719"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "rPILp5YKKFSw",
          "label": "\"La transición climática solo será posible si todos los países y territorios cooperan y se coordinan globalmente.\"",
          "ref": "184ba6c8-4ce5-4e50-97c8-4129e5f245a5"
        },
        "field": {
          "id": "kdOJsbZ2NNE3",
          "type": "multiple_choice",
          "ref": "e760bb3b-7721-407f-b56f-162bf2ab7a33"
        }
      },
      {
        "type": "choice",
        "choice": {
          "id": "4NXGmBIW9LhV",
          "label": "\"Las acciones climáticas deben postergarse hasta garantizar la reparación integral de los impactos sociales y ambientales acumulados.\"",
          "ref": "42acce20-6f32-4daa-a9bf-6df51ae6908b"
        },
        "field": {
          "id": "e0du0Cby8xyd",
          "type": "multiple_choice",
          "ref": "f9a4da9c-e441-4241-9775-53f54a0afe0d"
        }
      }
    ],
    "ending": {
      "id": "a2GOoTSqptj3",
      "ref": "459f8353-02e1-4f70-8ee8-da272b73c85e"
    }
  }
}
*/

  dd("request", $request->answers);

  $m_formulario = MFormulario::updateOrCreate(
    ['ID_M_FORMULARIOS' => $request->ending->id],
    [
      'ACCION' => "CREERSS",
      'ID_M_FORMULARIOS' => $request->ending->id,
      "ASSET_UID" => $request->ending->ref,
      "UID" => $request->ending->ref,
      "URL_DATA" => "url",
      "URL_CAMPOS" => "url",
      "ESTATUS" => true,
      "FECHA" => Carbon\Carbon::now(),
      "FECHA_REGISTRO" => Carbon\Carbon::now(),
      "ID_M_USUARIOS" => 1
    ]
  );


  $m_formulario = MFormulario::where(["ID_M_FORMULARIOS" => $request->ending->id])->first();

  $m_formulario_id = $m_formulario->ID_M_FORMULARIOS;

  if (!isset($m_formulario_id)) {
    return response()->json(['status' => false, 'message' => "error en la creacion del formulario maestro", "data" => $m_formulario], 503);
  }
  //llamo todas las preguntas de este formulario las desactivo

  $creation_failed = [];
  $count = 0;

  for ($i = 0; $i < count($request->answers); $i++) {
    //ojo esto actualiza o crea una
    $object = (object) helper::formatObject($request->answers[$i], "");

    //crear preguntas

    $id_kobo_respuesta = $request->answers[$i]->_id;

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
          "ID_M_USUARIOS" => 1,
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
          "FECHA" => $request->answers[$i]->_submission_time,
          "FECHA_REGISTRO" => $request->answers[$i]->start,
          "_ID" => $id_kobo_respuesta,
          "VALOR" => json_encode($respuesta),
          "ID_M_KOBO_FORMULARIOS" => $desired_object->id,
          "ID_M_FORMULARIOS" => $m_formulario_id,
          "ID_M_USUARIOS" => 1
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

  return response()->json(['status' => true, 'data' => [count($request->answers), $count]], 200);
  /* } else {
    // Manejar el error de la solicitud
    $msg = 'Error al realizar la solicitud GET: ' . error_get_last()['message'];
    return response()->json(['status' => false, 'message' => $msg], 503);
  } */
});

Route::prefix('finanzas')->group(function () {
  //SERVICIO PARA CONSULTAR PARAMETROS DEL POWER BI ADN y1 y2
  Route::get('/adn/fase2', [App\Http\Controllers\Finanzas::class, 'all']);
  Route::post('/adn/fase2', [App\Http\Controllers\Finanzas::class, 'set']);
  Route::get('/adn/loaextra', [App\Http\Controllers\Finanzas::class, 'getLoaExtra']);
  Route::get('/adn/indivhogares', [App\Http\Controllers\Finanzas::class, 'getCuaIndHog']);

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
      ] */
    ;
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
