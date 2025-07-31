<?php

namespace App\Http\Controllers;

use App\Models\MFormulario;
use App\Models\MKoboFormularios;
use App\Models\MKoboRespuestas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class Media extends Controller
{
  //

  function downloadMedia()
  {

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );
    /* $file = public_path() . "/download/LPA_MIRE+_V1.xlsx";

        if ($nameFile == "lpa") {
            $file = "LPA_MIRE+_V1.xlsx";
        }

        return Storage::download($file, 'LPA_MIRE+_V1.xlsx', $headers); */
    $filename = "LPA_MIRE+_V3.xlsx";
    // Get path from storage directory storage_path no funcionó
    // Get path from storage directory public_path si funcionó
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }

  function downloadMediaPqr()
  {

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );

    $filename = "Formato_PQR_2024_MIREVIEW.xlsx";
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }

  function downloadMediaPqrPath(Request $request)
  {
    //migrationsMqr/nLOPShZMEMu1AjqYuNWsP7miBWl32gTyO72Lu2ex.xlsx
    $filepath = $request->url;

    //$file = Storage::path($filepath);

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );

    $filename = "Formato_PQR_2024.xlsx";

    return Storage::download($filepath, $filename, $headers);

    /* $path = (public_path() . '/download/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, $headers); */
  }


  function downloadMediaMatriz()
  {

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );

    $filename = "1. Matriz lite  - paso 1.csv";
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }

  function downloadMediaCustom($filename)
  {

    $path = public_path($filename);

    $headers = $headers = [
      'Content-Type' => 'text/css',
    ];

    if (strpos($filename, '.zip') !== false) {
      return response()->download($path, $filename, $headers)->deleteFileAfterSend(true);
    }

    // Download file with custom headers

    return response()->download(urlencode($path), $filename, $headers);
  }

  function downloadMediaCustomFolder($folder, $filename)
  {
    $filenameUpper = ucfirst(strtolower($filename));

    return response()->download(storage_path('app/' . $folder . '/' . $filenameUpper)); //->deleteFileAfterSend(true);

  }


  function downloadMediaProdinfo()
  {

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );
    /* $file = public_path() . "/download/LPA_MIRE+_V1.xlsx";

        if ($nameFile == "lpa") {
            $file = "LPA_MIRE+_V1.xlsx";
        }

        return Storage::download($file, 'LPA_MIRE+_V1.xlsx', $headers); */
    $filename = "RR_Actualización_productos_de_información.xlsx";
    // Get path from storage directory storage_path no funcionó
    // Get path from storage directory public_path si funcionó
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }

  function mateoAnelicaHps(Request $request)
  {
    $mformulario = MFormulario::get()->load(['respuestas', 'preguntas']);
    $mkoboformulario = MKoboFormularios::get();
    $mkoborespuesta = MKoboRespuestas::get();

    dd($mkoboformulario);

    $preguntas = collect([
      "1. ¿Qué es?: Definición" => [
        "1.1 Naturaleza de la tránsición" => [ //"1.1.1 Frente a estas afirmaciones en cuál se siente más representado",
          "1.1.1.1 “Lo más importante en la transición es proteger los ecosistemas, incluso por encima de las necesidades humanas inmediatas”.A	a: Ambiental", // e: Social 
          "1.1.1.2 “Debemos cuidar el ambiente, pero sin olvidar a las personas que pueden verse afectadas por los cambios”.	B	10: Ambiental", // 50: Social 
          "1.1.1.3 “La transición debe cuidar tanto la naturaleza como a las personas al mismo tiempo”.	30	10: Ambiental", // 50: Social 
          "1.1.1.4 “Para cuidar el clima, primero debemos reducir la desigualdad y crear empleos verdes”.	40	10: Ambiental", // 50: Social
          "1.1.1.5 “El cambio climático es un problema de injusticia social, y la transición debe centrarse en mejorar la vida de las personas más vulnerables”.	50	10: Ambiental ", // 50: Social 
        ],
        "1.2 Tipos de transición" => [ // 1.2.1 Frente a estas afirmaciones en cuál se siente más representado
          "1.2.1.1 “La transición debe ser una ruptura profunda con el modelo actual, para restaurar el equilibrio del planeta y detener el colapso ecológico”.	10	10: Restauración ambiental",  // 50: Justicia social
          "1.2.1.2 “Debemos avanzar hacia una economía baja en carbono mediante innovación tecnológica y regulación ambiental, sin detener el crecimiento económico”.	20	10: Restauración ambiental", // 50: Justicia social
          "1.2.1.3 “La transición debe cambiar la relación entre humanos y naturaleza, haciendo compatibles el bienestar social y los límites ecológicos”.	30	10: Restauración ambiental", // 50: Justicia social
          "1.2.1.4 “La transición debe cambiar nuestros estilos de vida y patrones de consumo para que todos vivamos bien, dentro de las capacidades del planeta”.	40	10: Restauración ambiental", // 50: Justicia social
          "1.2.1.5 “La verdadera transición debe corregir las desigualdades estructurales, priorizando a quienes más han sufrido los impactos del sistema actual”.	50	10: Restauración ambiental", // 50: Justicia social
        ],
        "1.3 Ritmo" => [ //1.3.1 Frente a estas afirmaciones en cuál se siente más representado
          "1.3.1.1  “La transición debe comenzar ya, antes de que los daños al planeta sean irreversibles”.	10	10: Inmediato", // 50: Gradual
          "1.3.1.2 “Necesitamos transiciones rápidas, pero bien organizadas para no generar impactos negativos en las personas”.	20	10: Inmediato",  // 50: Gradual
          "1.3.1.3 “La transición debe avanzar paso a paso, equilibrando el cuidado ambiental con el bienestar social”.	30	10: Inmediato", // 50: Gradual
          "1.3.1.4 “Las transiciones toman tiempo porque implican cambios en cómo vivimos, trabajamos y nos relacionamos”.	40	10: Inmediato", // 50: Gradual
          "1.3.1.5 “La transición debe construirse con paciencia, priorizando la reparación de desigualdades históricas antes que la velocidad”.	50	10: Inmediato", // 50: Gradual
        ],
        "1.4 Escala" => [ //	1.4.1 Frente a estas afirmaciones en cuál se siente más representado
          "1.4.1.1 “La transición debe abordarse desde una perspectiva global, ya que los efectos y soluciones del cambio climático trascienden fronteras”.	10	10: Global", // 50: Local
          "1.4.1.2 “Los Estados deben liderar la transición con políticas públicas integrales, adaptadas a las condiciones y prioridades del país”.	20	10: Global", // 50: Local
          "1.4.1.3 Es necesario hacer cambios desde los territorios, por sus realidades propias, y desde lo global, para lograr una transformación climática más amplia.	30	10: Global", // 50: Local
          "1.4.1.4 “La transición necesita arraigarse en lo local, donde se viven directamente los impactos y se pueden construir soluciones concretas”.	40	10: Global", // 50: Local
          "1.4.1.5 “La transición debe centrarse en los espacios históricamente invisibilizados, donde el cambio es más urgente y necesario”.	50	10: Global", // 50: Local
        ],
      ],
      "2. ¿ Quiénes?:  Actores" => [
        "2.1. Actores involucrados" => [ //	2.1.1 Frente a estas afirmaciones en cuál se siente más representado
          "2.1.1.1   La transición solo es posible si todos los actores —gobiernos, empresas, comunidades, organizaciones y academia— participan de forma activa y con responsabilidades compartidas .	10	10: Multiactor", // 50: Actor único 
          "2.1.1.2 “Los procesos de transición deben construirse en alianza entre el Estado y las comunidades, permitiendo participación pero con liderazgo institucional”.	20	10: Multiactor",  // 50: Actor único
          "2.1.1.3 “Se requiere la participación de varios actores, pero con un actor coordinador que oriente y articule los esfuerzos, sin perder la diversidad de voces”.	30	10: Multiactor",  // 50: Actor único
          "2.1.1.4 “Un actor debe asumir el liderazgo de la transición —como el Estado o las comunidades—, recibiendo aportes de otros, pero sin depender de ellos”.	40	10: Multiactor",  // 50: Actor único
          "2.1.1.5 “La transición debe ser dirigida por un solo actor con legitimidad y capacidad, para garantizar coherencia y evitar interferencias externas”.	50	10: Multiactor",  // 50: Actor único
        ],
        "2.2 Rol Estado" => [ //  	2.2.1 Frente a estas afirmaciones en cuál se siente más representado
          "2.2.1.1  El Estado debe limitarse a generar las condiciones básicas para que otros actores —como el mercado, la sociedad civil o las comunidades— lideren los procesos de transición .	10	10: Rol minimo", // 50: Protagonismo
          "2.2.1.2 “El Estado debe actuar como mediador y conector entre sectores, garantizando que la transición sea incluyente, sin imponer rutas únicas”.	20	10: Rol minimo", // 50: Protagonismo
          "2.2.1.3 “El Estado debe tener un rol activo, guiando la transición con políticas claras, pero permitiendo que comunidades, empresas y otros actores definan cómo implementarlas”.	30	10: Rol minimo", // 50: Protagonismo
          "2.2.1.4 “El Estado debe liderar la transición con decisiones firmes, inversiones públicas y regulación, pero escuchando a los territorios y actores sociales”.	40	10: Rol minimo", // 50: Protagonismo
          "2.2.1.5 “Solo el Estado tiene la legitimidad y capacidad para dirigir la transición de forma coherente y justa; debe asumir el control total del proceso”.	50	10: Rol minimo", // 50: Protagonismo
        ],
        "2.3 Rol Empresas" => [ // 	2.3.1 Frente a estas afirmaciones en cuál se siente más representado
          "2.3.1.1 “Las empresas deben limitarse a cumplir regulaciones; no pueden liderar la transición porque sus intereses económicos no siempre se alinean con el bien común”.	10	10: Rol minimo", // 50: Protagonismo
          "2.3.1.2 “Las empresas pueden participar en la transición, pero deben estar fuertemente reguladas por el Estado para asegurar que sus acciones no generen más desigualdad o daño ambiental”.	20	10: Rol minimo", // 50: Protagonismo
          "2.3.1.3 “Las empresas tienen un papel importante, pero compartido: deben actuar junto al Estado y la sociedad civil para lograr una transición equilibrada y justa”.	30	10: Rol minimo", // 50: Protagonismo
          "2.3.1.4 “Las empresas pueden acelerar la transición a través de innovación, inversión y escalamiento de soluciones, siempre que integren criterios sociales y ambientales en su modelo de negocio”.	40	10: Rol minimo", // 50: Protagonismo
          "2.3.1.5 “La verdadera transformación vendrá del sector empresarial; la eficiencia, tecnología, generación de valor y capacidad de adaptación del mercado son clave para enfrentar el cambio climático”.	50	10: Rol minimo", // 50: Protagonismo
        ],
        "2.4 Rol Comunidades" => [ //	2.4.1 Frente a estas afirmaciones en cuál se siente más representado
          "2.4.1.1 “Las comunidades deben adaptarse a los planes definidos por expertos, gobiernos o empresas, ya que no tienen la capacidad técnica para liderar procesos complejos”.	10	10: Rol minimo", // 50: Protagonismo
          "2.4.1.2 “Las comunidades pueden implementar acciones de transición, pero dentro de marcos definidos por actores institucionales o técnicos”.	20	10: Rol minimo", // 50: Protagonismo
          "2.4.1.3  “Las comunidades deben compartir responsabilidades en los procesos de transición, ya que entienden mejor su territorio y pueden liderar procesos desde lo local”.	30	10: Rol minimo", // 50: Protagonismo
          "2.4.1.4 1. “Las comunidades deben participar activamente para que la transición sea efectiva y sostenible, aportando conocimiento, experiencia y legitimidad local”.	40	10: Rol minimo", // 50: Protagonismo
          "2.4.1.5 “Las comunidades deben ser protagonistas de la transición, decidiendo por sí mismas cómo transformar su forma de vida, su economía y su relación con el entorno”.	50	10: Rol minimo", // 50: Protagonismo
        ],
        "2.5 OSC" => [ //	2.5.1 Frente a estas afirmaciones en cuál se siente más representado
          "2.5.1.1 “Las organizaciones de la sociedad civil pueden opinar o acompañar, pero no deben interferir en las decisiones técnicas o de gobierno sobre la transición”.	10	10: Rol minimo", // 50: Protagonismo
          "2.5.1.2 “Las OSC pueden cumplir una función útil como veedoras, generando presión social o ayudando a traducir decisiones institucionales hacia las comunidades”.	20	10: Rol minimo", // 50: Protagonismo
          "2.5.1.3 “Las OSC deben participar activamente junto con el Estado, las empresas y comunidades en el diseño e implementación de la transición”.	30	10: Rol minimo", // 50: Protagonismo
          "2.5.1.4 “Las OSC juegan un papel clave en conectar actores, generar conciencia, movilizar comunidades y democratizar las transiciones desde abajo”.	40	10: Rol minimo", // 50: Protagonismo
          "2.5.1.5 “Las organizaciones sociales deben liderar las transiciones como expresión de poder ciudadano, impulsando cambios estructurales desde la base social y la justicia climática”.	50	10: Rol minimo", // 50: Protagonismo
        ],
      ],
      "3. ¿Cómo?: Proceso" => [
        "3.1 Toma de decisiones" => [ //3.1.1 Frente a estas afirmaciones en cuál se siente más representado
          "3.1.1.1 “Las decisiones sobre la transición deben ser tomadas por expertos y autoridades centrales, ya que requieren conocimientos técnicos y visión global”.	10	10: Nivel central y técnico",  // 50: Nivel local y participativo
          "3.1.1.2 “El Estado debe liderar la transición, incorporando aportes de otros sectores a través de mecanismos consultivos, sin perder la dirección técnica del proceso”.	20	10: Nivel central y técnico ", // 50: Nivel local y participativo
          "3.1.1.3 “Las decisiones deben ser producto del diálogo entre Estado, empresas, comunidades y sociedad civil, con mecanismos reales de corresponsabilidad”.	30	10: Nivel central y técnico ", // 50: Nivel local y participativo
          "3.1.1.4  “Las decisiones deben construirse desde los territorios y con participación activa de los actores locales, articulando saberes y prioridades diversas, con participación de la institucionalidad”.	40	10: Nivel central y técnico ", // 50: Nivel local y participativo
          "3.1.1.5 “Las transiciones deben ser decididas directamente por las comunidades y movimientos sociales, como ejercicio de soberanía y justicia territorial”.	50	10: Nivel central y técnico ", // 50: Nivel local y participativo
        ],
        "3.2 Espacios" => [ //3.2.1  Frente a estas afirmaciones en cuál se siente más representado
          "3.2.1.1 “Los espacios institucionales actuales —gobiernos, organismos multilaterales, foros técnicos— ya tienen la legitimidad y capacidad para liderar la transición”.	10	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.2 “Los espacios existentes son útiles, pero necesitan abrirse más a otros actores y renovar su legitimidad mediante mayor inclusión y transparencia”.	20	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.3 “La transición debe apoyarse tanto en instituciones ya establecidas como en nuevos espacios de participación creados desde lo territorial y sectorial”.	30	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.4 “La gran mayoría de espacios existentes carecen de legitimidad; la transición requiere espacios más democráticos desde los territorios y las comunidades”.	40	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
          "3.2.1.5 “Los espacios legítimos para la transición deben ser creados por los pueblos y movimientos sociales, al margen de las instituciones tradicionales que han fallado”.	50	10: Confianza en espacios actuales", // 50: Necesidad de  nuevos espacios
        ],
        "3.3 Marcos" => [ //3.3.1  Frente a estas afirmaciones en cuál se siente más representado
          "3.3.1.1 “Ya existen los tratados, leyes y políticas necesarios para impulsar la transición; lo que falta es voluntad y aplicación efectiva”. 	10	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
          "3.3.1.2 “Las normas actuales son una buena base, pero deben modernizarse para responder a los desafíos específicos del cambio climático y los contextos locales”.	20	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
          "3.3.1.3 “La transición necesita articular leyes nacionales e internacionales con nuevos marcos adaptados a sectores estratégicos o realidades regionales”.	30	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
          "3.3.1.4 “Los marcos legales actuales no reflejan la diversidad de los territorios ni las voces comunitarias; es necesario construir nuevas normativas desde lo local”.	40	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
          "3.3.1.5 “Los marcos normativos vigentes han sostenido el modelo que queremos cambiar; debemos crear nuevas reglas desde las comunidades, con base en justicia climática, derechos de la naturaleza y autonomía”.	50	10: Confianza en marcos actuales", // 50: Necesidad de nuevos marcos
        ],
        "3.4 Colaboración" => [ //3.4.1  Frente a estas afirmaciones en cuál se siente más representado
          "3.4.1.1 “La transición climática solo será posible si todos los países y territorios cooperan y se coordinan globalmente”.	10	10: Interdependencia ", //50: Soberania
          "3.4.1.2 “La transición requiere alianzas entre regiones, sectores y comunidades que compartan tecnologías, recursos y aprendizajes”.	20	10: Interdependencia ", //50: Soberania
          "3.4.1.3 “La transición debe combinar colaboración internacional con capacidad local para decidir qué cambios hacer y cómo hacerlos”.	30	10: Interdependencia ", //50: Soberania
          "3.4.1 4 “Los territorios deben tener el control de sus procesos de transición, pero sin aislarse de las redes de apoyo y aprendizaje global”.	40	10: Interdependencia ", //50: Soberania
          "3.4.1.5 “Cada comunidad debe definir su propio camino de transición, con base en su cultura, sus necesidades y su autonomía, sin imposiciones externas”.	50	10: Interdependencia ", //50: Soberania 
        ],
        "3.5 Priorización" => [ //3.5.1  Frente a estas afirmaciones en cuál se siente más representado
          "3.5.1.1 “Las acciones climáticas deben postergarse hasta garantizar la reparación integral de los impactos sociales y ambientales acumulados.”	10	10: Atención de impactos pasado", // 50: Atención sobre acción climática
          "3.5.1.2 La acción climática debe implementarse en paralelo con mecanismos de justicia ambiental y social que atiendan impactos históricos.	20	10: Atención de impactos pasado", // 50: Atención sobre acción climática
          "3.5.1.3 La transición climática debe equilibrar la urgencia de actuar con la atención a los efectos sociales y ambientales asociados.	30	10: Atención de impactos pasado", // 50: Atención sobre acción climática
          "3.5.1.4 La respuesta climática debe priorizar acciones inmediatas, incorporando medidas progresivas de mitigación de impactos.	40	10: Atención de impactos pasado", // 50: Atención sobre acción climática
          "3.5.1.5 La prioridad es avanzar con rapidez en la acción climática, asumiendo que los impactos se abordarán de forma complementaria.	50	10: Atención de impactos pasado", // 50: Atención sobre acción climática
        ]
      ],
    ]);

    //return response()->json(["mkoboformulario" => $mformulario, "preguntas" => $preguntas]);
    return view('welcome', ["mkoboformulario" => $mkoboformulario, "preguntas" => $preguntas]);
  }
}
