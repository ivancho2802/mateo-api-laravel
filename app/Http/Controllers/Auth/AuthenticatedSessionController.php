<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\MKoboRespuestas;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create_()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.consulta');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->email);
        //$mkoborespuesta = MKoboRespuestas::where("VALOR", $request->email)->get();

        //dd($mkoborespuesta);

        $preguntas = collect([
            "¿Qué es?: Definición" => [
                "Naturaleza de la tránsición" => [ //"1.1.1 Frente a estas afirmaciones en cuál se siente más representado",
                    "“Lo más importante en la transición es proteger los ecosistemas, incluso por encima de las necesidades humanas inmediatas.”>Predominante Ambiental", // e: Social 
                    "“Debemos cuidar el ambiente, pero sin olvidar a las personas que pueden verse afectadas por los cambios.”>Ambiental con enfoque social", // B	10: Ambiental 50: Social 
                    "“La transición debe cuidar tanto la naturaleza como a las personas al mismo tiempo.”>Enfoque socioambiental", // 	C	10: Ambiental50: Social 
                    "“Para cuidar el clima, primero debemos reducir la desigualdad y crear empleos verdes.”>Social con enfoque ambiental", // D	10: Ambiental 50: Social
                    "“El cambio climático es un problema de injusticia social, y la transición debe centrarse en mejorar la vida de las personas más vulnerables.”>Predominante Social", //	E	10: Ambiental  50: Social 
                ],
                "Tipos de transición" => [ // 1.2.1 Frente a estas afirmaciones en cuál se siente más representado
                    " “La transición debe ser una ruptura profunda con el modelo actual, para restaurar el equilibrio del planeta y detener el colapso ecológico.”>Transición como restauración ecológica",  //	10	10: Restauración ambiental 50: Justicia social
                    " “Debemos avanzar hacia una economía baja en carbono mediante innovación tecnológica y regulación ambiental, sin detener el crecimiento económico.”>Transición como reconfiguración tecnológica y ambiental controlada", //.	20	10: Restauración ambiental 50: Justicia social
                    "“La transición debe cambiar la relación entre humanos y naturaleza, haciendo compatibles el bienestar social y los límites ecológicos.”>Transición como reequilibrio entre naturaleza y sociedad", //.	30	10: Restauración ambiental 50: Justicia social
                    "“La transición debe cambiar nuestros estilos de vida y patrones de consumo para que todos vivamos bien, dentro de las capacidades del planeta.”>Transición como transformación de modelos de vida y justicia social", //.	40	10: Restauración ambiental 50: Justicia social
                    " “La verdadera transición debe corregir las desigualdades estructurales, priorizando a quienes más han sufrido los impactos del sistema actual.”>Transición como reparación histórica y redistribución social", //.	50	10: Restauración ambiental 50: Justicia social
                ],
                "Ritmo" => [ //1.3.1 Frente a estas afirmaciones en cuál se siente más representado
                    "“La transición debe comenzar ya, antes de que los daños al planeta sean irreversibles.”>Urgencia ecológica inmediata", //.	10	10: Inmediato 50: Gradual
                    "“Necesitamos transiciones rápidas, pero bien organizadas para no generar impactos negativos en las personas.”>Ritmo rápido pero planificado",  //	20	10: Inmediato 50: Gradual
                    "“La transición debe avanzar paso a paso, equilibrando el cuidado ambiental con el bienestar social.”>Ritmo gradual con equilibrio", // 	30	10: Inmediato 50: Gradual
                    "“Las transiciones toman tiempo porque implican cambios en cómo vivimos, trabajamos y nos relacionamos.”>Tiempo como proceso cultural y social", // 	40	10: Inmediato 50: Gradual
                    "“La transición debe construirse con paciencia, priorizando la reparación de desigualdades históricas antes que la velocidad.”>Largo plazo desde enfoque de reparación y sostenibilidad económica", //	50	10: Inmediato 50: Gradual
                ],
                "Escala" => [ //	1.4.1 Frente a estas afirmaciones en cuál se siente más representado
                    "“La transición debe abordarse desde una perspectiva global, ya que los efectos y soluciones del cambio climático trascienden fronteras.”>Escala global", //	10	10: Global 50: Local
                    "“Los Estados deben liderar la transición con políticas públicas integrales, adaptadas a las condiciones y prioridades del país.”>Escala nacional", //	20	10: Global 50: Local
                    "Es necesario hacer cambios desde los territorios, por sus realidades propias, y desde lo global, para lograr una transformación climática más amplia. >Escala regional/territorial", //	30	10: Global 50: Local
                    "“La transición necesita arraigarse en lo local, donde se viven directamente los impactos y se pueden construir soluciones concretas.”>Escala local/comunitaria", //.	40	10: Global 50: Local
                    "“La transición debe centrarse en los espacios históricamente invisibilizados, donde el cambio es más urgente y necesario.”>Escala de lo marginal/excluido", //	50	10: Global 50: Local
                ],
            ],
            "¿Quiénes?:  Actores" => [
                "Actores involucrados" => [ //	2.1.1 Frente a estas afirmaciones en cuál se siente más representado
                    " La transición solo es posible si todos los actores —gobiernos, empresas, comunidades, organizaciones y academia— participan de forma activa y con responsabilidades compartidas.>Multiactor integral", //  	10	10: Multiactor50: Actor único 
                    "“Los procesos de transición deben construirse en alianza entre el Estado y las comunidades, permitiendo participación pero con liderazgo institucional.”>Co-gobernanza focalizada",  // .	20	10: Multiactor50: Actor único
                    " “Se requiere la participación de varios actores, pero con un actor coordinador que oriente y articule los esfuerzos, sin perder la diversidad de voces.”>Participación equilibrada con rol conductor",  // .	30	10: Multiactor 50: Actor único
                    " “Un actor debe asumir el liderazgo de la transición —como el Estado o las comunidades—, recibiendo aportes de otros, pero sin depender de ellos.”>Actores predominantes con apoyo complementario",  // .	40	10: Multiactor 50: Actor único
                    " “La transición debe ser dirigida por un solo actor con legitimidad y capacidad, para garantizar coherencia y evitar interferencias externas.”>Actor único",  //.	50	10: Multiactor 50: Actor único
                ],
                "Rol Estado" => [ //  	2.2.1 Frente a estas afirmaciones en cuál se siente más representado
                    "El Estado debe limitarse a generar las condiciones básicas para que otros actores —como el mercado, la sociedad civil o las comunidades— lideren los procesos de transición.>Facilitar condiciones generales", //	10	10: Rol minimo 50: Protagonismo
                    "“El Estado debe actuar como mediador y conector entre sectores, garantizando que la transición sea incluyente, sin imponer rutas únicas.”>Articulador", //	20	10: Rol minimo 50: Protagonismo
                    " “El Estado debe tener un rol activo, guiando la transición con políticas claras, pero permitiendo que comunidades, empresas y otros actores definan cómo implementarlas.”>Coordinador con participación", // .	30	10: Rol minimo50: Protagonismo
                    "“El Estado debe liderar la transición con decisiones firmes, inversiones públicas y regulación, pero escuchando a los territorios y actores sociales.”>Protagonista con apoyo social", //.	40	10: Rol minimo 50: Protagonismo
                    "“Solo el Estado tiene la legitimidad y capacidad para dirigir la transición de forma coherente y justa; debe asumir el control total del proceso.”>Centralizado", // .	50	10: Rol minimo50: Protagonismo
                ],
                "Rol Empresas" => [ // 	2.3.1 Frente a estas afirmaciones en cuál se siente más representado
                    " “Las empresas deben limitarse a cumplir regulaciones; no pueden liderar la transición porque sus intereses económicos no siempre se alinean con el bien común.”>Participación solo enmarcada en cumplimiento marco", //.	10	10: Rol minimo 50: Protagonismo
                    " “Las empresas pueden participar en la transición, pero deben estar fuertemente reguladas por el Estado para asegurar que sus acciones no generen más desigualdad o daño ambiental.”>Participación sujetas a regulaciones activas ", // .	20	10: Rol minimo 50: Protagonismo
                    " “Las empresas tienen un papel importante, pero compartido: deben actuar junto al Estado y la sociedad civil para lograr una transición equilibrada y justa.”>Corresponsables con otros actores", // .	30	10: Rol minimo50: Protagonismo
                    "“Las empresas pueden acelerar la transición a través de innovación, inversión y escalamiento de soluciones, siempre que integren criterios sociales y ambientales en su modelo de negocio.”>Dinamizadores del cambio", //.	40	10: Rol minimo 50: Protagonismo
                    " “La verdadera transformación vendrá del sector empresarial; la eficiencia, tecnología, generación de valor y capacidad de adaptación del mercado son clave para enfrentar el cambio climático.”>Lideres de la transición ", // .	50	10: Rol minimo 50: Protagonismo
                ],
                "Rol Comunidades" => [ //	2.4.1 Frente a estas afirmaciones en cuál se siente más representado
                    "“Las comunidades deben adaptarse a los planes definidos por expertos, gobiernos o empresas, ya que no tienen la capacidad técnica para liderar procesos complejos.”>Receptoras pasivas", //.	10	10: Rol minimo 50: Protagonismo
                    "“Las comunidades pueden implementar acciones de transición, pero dentro de marcos definidos por actores institucionales o técnicos.”>Ejecutoras de decisiones externas", //.	20	10: Rol minimo 50: Protagonismo
                    "“Las comunidades deben compartir responsabilidades en los procesos de transición, ya que entienden mejor su territorio y pueden liderar procesos desde lo local.”>Aliadas corresponsables ", //.	30	10: Rol minimo 50: Protagonismo
                    " “Las comunidades deben participar activamente para que la transición sea efectiva y sostenible, aportando conocimiento, experiencia y legitimidad local.”>Impulsoras territoriales del cambio", //.	40	10: Rol minimo 50: Protagonismo
                    "“Las comunidades deben ser protagonistas de la transición, decidiendo por sí mismas cómo transformar su forma de vida, su economía y su relación con el entorno.”>Actor principal en la transición", //.	50	10: Rol minimo 50: Protagonismo
                ],
                "OSC" => [ //	2.5.1 Frente a estas afirmaciones en cuál se siente más representado
                    "“Las organizaciones de la sociedad civil pueden opinar o acompañar, pero no deben interferir en las decisiones técnicas o de gobierno sobre la transición.”>Acompañamiento", //.	10	10: Rol minimo 50: Protagonismo
                    "“Las OSC pueden cumplir una función útil como veedoras, generando presión social o ayudando a traducir decisiones institucionales hacia las comunidades.”>Veeduría", //.	20	10: Rol minimo 50: Protagonismo
                    "“Las OSC deben participar activamente junto con el Estado, las empresas y comunidades en el diseño e implementación de la transición.”>Co-gestores del cambio ", //.	30	10: Rol minimo 50: Protagonismo
                    "“Las OSC juegan un papel clave en conectar actores, generar conciencia, movilizar comunidades y democratizar las transiciones desde abajo.”>Articulador social", //.	40	10: Rol minimo 50: Protagonismo
                    "“Las organizaciones sociales deben liderar las transiciones como expresión de poder ciudadano, impulsando cambios estructurales desde la base social y la justicia climática.”>Actor político transformador", // .	50	10: Rol minimo50: Protagonismo
                ],
            ],
            "¿Cómo?: Proceso" => [
                "Toma de decisiones" => [ //3.1.1 Frente a estas afirmaciones en cuál se siente más representado
                    "“Las decisiones sobre la transición deben ser tomadas por expertos y autoridades centrales, ya que requieren conocimientos técnicos y visión global.”>Tecnocrática y centralizada",  //.	10	10: Nivel central y técnico 50: Nivel local y participativo
                    "“El Estado debe liderar la transición, incorporando aportes de otros sectores a través de mecanismos consultivos, sin perder la dirección técnica del proceso.”>Institucional con consulta acotada  ", //.	20	10: Nivel central y técnico 50: Nivel local y participativo
                    "“Las decisiones deben ser producto del diálogo entre Estado, empresas, comunidades y sociedad civil, con mecanismos reales de corresponsabilidad.”>Decisiones compartidas y multiactor", //.	30	10: Nivel central y técnico  50: Nivel local y participativo
                    "“Las decisiones deben construirse desde los territorios y con participación activa de los actores locales, articulando saberes y prioridades diversas, con participación de la institucionalidad.”>Participativa desde territorios ", //.	40	10: Nivel central y técnico  50: Nivel local y participativo
                    "“Las transiciones deben ser decididas directamente por las comunidades y movimientos sociales, como ejercicio de soberanía y justicia territorial.”>Autónomas desde la base social", //.	50	10: Nivel central y técnico  50: Nivel local y participativo
                ],
                "Espacios" => [ //3.2.1  Frente a estas afirmaciones en cuál se siente más representado
                    "“Los espacios institucionales actuales —gobiernos, organismos multilaterales, foros técnicos— ya tienen la legitimidad y capacidad para liderar la transición.”>Confianza plena en espacios ", //.	10	10: Confianza en espacios actuales 50: Necesidad de  nuevos espacios
                    "“Los espacios existentes son útiles, pero necesitan abrirse más a otros actores y renovar su legitimidad mediante mayor inclusión y transparencia.”>Uso reformado de espacios existentes", //.	20	10: Confianza en espacios actuales 50: Necesidad de  nuevos espacios
                    "“La transición debe apoyarse tanto en instituciones ya establecidas como en nuevos espacios de participación creados desde lo territorial y sectorial.”>Combinación espacios existente y nuevos mecanismos ", //.	30	10: Confianza en espacios actuales 50: Necesidad de  nuevos espacios
                    "“La gran mayoría de espacios existentes carecen de legitimidad; la transición requiere espacios más democráticos desde los territorios y las comunidades.”>Desconfianza frente a espacios formales y necesidad de transformaciones ", //.	40	10: Confianza en espacios actuales 50: Necesidad de  nuevos espacios
                    "“Los espacios legítimos para la transición deben ser creados por los pueblos y movimientos sociales, al margen de las instituciones tradicionales que han fallado.”>Nuevos espacios ante la ausencia de legitimidad de los existentes", //.	50	10: Confianza en espacios actuales 50: Necesidad de  nuevos espacios
                ],
                "Marcos" => [ //3.3.1  Frente a estas afirmaciones en cuál se siente más representado
                    "“Ya existen los tratados, leyes y políticas necesarios para impulsar la transición; lo que falta es voluntad y aplicación efectiva.”>Confianza plena en marcos actuales", //. 	10	10: Confianza en marcos actuales 50: Necesidad de nuevos marcos
                    "“Las normas actuales son una buena base, pero deben modernizarse para responder a los desafíos específicos del cambio climático y los contextos locales.”>Necesidad de adaptar o actualizar marcos", //.	20	10: Confianza en marcos actuales 50: Necesidad de nuevos marcos
                    "“La transición necesita articular leyes nacionales e internacionales con nuevos marcos adaptados a sectores estratégicos o realidades regionales.”>Combinar marcos actuales con nuevas normativas sectoriales y territoriales", //.	30	10: Confianza en marcos actuales 50: Necesidad de nuevos marcos
                    "“Los marcos legales actuales no reflejan la diversidad de los territorios ni las voces comunitarias; es necesario construir nuevas normativas desde lo local.”>Insuficiencia de marcos actuales y necesidad de reformas ", //.	40	10: Confianza en marcos actuales 50: Necesidad de nuevos marcos
                    "“Los marcos normativos vigentes han sostenido el modelo que queremos cambiar; debemos crear nuevas reglas desde las comunidades, con base en justicia climática, derechos de la naturaleza y autonomía.”>Rechazo completo a marcos actuales y necesidad de nuevos", //.	50	10: Confianza en marcos actuales 50: Necesidad de nuevos marcos
                ],
                "Colaboración" => [ //3.4.1  Frente a estas afirmaciones en cuál se siente más representado
                    "“En un proceso de transición como el que vivimos, es imposible colaborar. Cada actor busca lo suyo y no hay confianza para trabajar juntos.”>Negación", //.	10	10: Interdependencia 50: Soberania
                    "“La colaboración en una transición es muy difícil. Las diferencias de poder, visión e intereses la hacen poco realista.”>Visión escéptica", //.	20	10: Interdependencia 50: Soberania
                    "“La colaboración multiactor en la transición es posible, pero solo si se limita a temas concretos y se gestiona cuidadosamente.”>Posibilidad condicionada ", //.	30	10: Interdependencia 50: Soberania
                    "“La transición requiere colaboración, y esta es posible si se construye confianza, reglas compartidas y espacios de diálogo.”>Posibilidad realista", //.	40	10: Interdependencia  50: Soberania
                    "“No hay transición justa ni sostenible sin colaboración entre actores. Es totalmente posible si se parte del reconocimiento mutuo.”>Alta confianza ", //.	50	10: Interdependencia 50: Soberania 
                ],
                "Priorización" => [ //3.5.1  Frente a estas afirmaciones en cuál se siente más representado
                    "“No puede existir una transición sin que, primero, no se implementen medidas de reparación integral por los impactos generados por las actividades económicas, especialmente las extractivas.”>Enfoque de justicia reparativa previa", //	10	10: Atención de impactos pasado 50: Atención sobre acción climática
                    "La transición debe privilegiar la reparación de los impactos aunque también considerando medidas de desarrollo acordes con las expectativas de los actores.>Enfoque de transición justa condicionada", //	20	10: Atención de impactos pasado 50: Atención sobre acción climática
                    "La transición debe equilibrar la urgencia de actuar sobre temáticas actuales con la atención a los efectos sociales y ambientales asociados a los impactos del pasado.>Enfoque de simultaneidad", //	30	10: Atención de impactos pasado 50: Atención sobre acción climática
                    "La transición debe priorizar acciones inmediatas, incorporando medidas de reparación gradual de impactos del pasado.>Enfoque de acción prioritaria con mitigación progresiva", //	40	10: Atención de impactos pasado 50: Atención sobre acción climática
                    "La transición se fundamenta en las acciones para atender los cambios que se necesitan de forma urgente, independientemente si en el futuro se dé –o no- alguna acción reparadora frente a los impactos del pasado.>Enfoque urgencia climática dominante", //	50	10: Atención de impactos pasado 50: Atención sobre acción climática
                ]
            ],
        ]);

        //$longText = "3.5.1.5 La transición se fundamenta en las acciones para atender los cambios que se necesitan de forma urgente, independientemente si en el futuro se dé –o no- alguna acción reparadora frente a los impactos del pasado.>Enfoque urgencia climática dominante";

        //dd(count(MKoboRespuestas::where(DB::raw("'$longText'"), 'LIKE', DB::raw("CONCAT('%', \"VALOR\", '%')"))->get()));

        //Product::where(DB::raw("'$longText'"), 'LIKE', DB::raw("CONCAT('%', name, '%')"))->get();

        $preguntapuesta = $preguntas->map(function ($pregunta) {
            $pregunta_ = collect($pregunta)->map(function ($pregunt) {
                $preguntapuesta_ = collect($pregunt)->map(function ($preg) {
                    //dd($preg);
                    $frase = explode(">", $preg);
                    //dd($frase, $preg, $frase[1]);

                    $resuetas_user = MKoboRespuestas::where(DB::raw("'$preg'"), 'LIKE', DB::raw("CONCAT('%', \"VALOR\", '%')"))->get();

                    $resuetas_user = collect($resuetas_user)
                        ->where("CAMPO1", $request->email)
                        ->exist();

                    $arraycount = [$frase[1], $resuetas_user, $frase[0]];
                    //frase & count
                    return $arraycount;
                });
                return $preguntapuesta_;
            });
            return $pregunta_;
        });

        dd($preguntapuesta);

        return view('user', ["preguntapuesta" => $preguntapuesta, "preguntas" => $preguntas]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
