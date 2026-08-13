<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\PaImportClass;
use App\Http\Controllers\LpaFixImportClass;
use App\Models\migrateCustom;
use App\Models\MLpa;
use App\Models\MLpaEmergencia;
use App\Models\MLpaPersona;
use App\Models\ActivitiesDirectories;
use App\Models\MLpaFix;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Auth;
use App\Models\Analisis;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToArray;

use function PHPUnit\Framework\isEmpty;
use App\Jobs\LpaJobProcess;
use App\Jobs\LpaJobRefreshMigrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\MUsuarios;


class PersonAttended extends Controller
{
    //
    function stored(Request $request)
    {


        if ($request->analisis && $request->month) {
            $resulAlaisis = Analisis::updateOrCreate([
                "texto" => $request->analisis,
                "month" => $request->month,
                "type" => "LPA"
            ]);
            //return $resulAlaisis;

            if (!$request->file) {

                $data['mlpas'] = [];

                $data['record_excel'] = 0;

                $data['record_saved'] = 0;

                //terminar devolver tabla
                return view('list-lpas', $data);
            }
        }

        ini_set('memory_limit', '2024M');
        set_time_limit(3000000); //0

        //dd("file", $request->file('file'));
        //echo csrf_token(); 
        //return response()->json(["request" => $request]);

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);


        // Get the uploaded file
        $file = $request->file('file');
        $path = $file->store('migrationsLpa');

        migrateCustom::create([
            'table' => 'M_LPAS',
            'table_id' => $path,
            'file_ref' => 'UPLOADED',
            'id_user_mireview' => $request->ID_D_CLIENTES,
        ]);

        $mlpas = MLpa::orderBy('created_at', 'desc')
            ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] = $mlpas;

        $data['record_excel'] = 1;

        $data['record_saved'] = 0;

        //crear job para ejecutar la funcion de process
        LpaJobProcess::dispatch(); //->onConnection('database');

        //terminar devolver tabla
        return view('list-lpas', $data);
    }


    public function process(?Request $request)
    {

        ini_set('memory_limit', '12000M');
        set_time_limit(3000000); //0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        $migration = migrateCustom::where([
            'table' => 'M_LPAS',
            'file_ref' => 'UPLOADED',
        ])->first();

        $file = Storage::path($migration->table_id);

        $sheets = (new FastExcel)->withSheetsNames()->importSheets($file);

        $collectDb = collect($sheets['BD'])
            ->filter(function ($row) {
                // Quitamos los valores nulos o vacíos y contamos si queda algo
                return count(array_filter($row)) > 0;
            });
        ;

        if (count($collectDb) == 0) {
            dd("collectDb", $collectDb->chunk(1000)[0]);
        }
        //este hace refernbecia al datos solicitado para el resumen PUNTO 3
        $beneficiariosUnicos = $collectDb
            ->map(function ($item) {
                return trim($item['N. Identificación']) ?? null;
            })
            ->filter()
            ->unique();

        $conteoRegistros = $collectDb
            ->count();
        $conteoBeneficiariosUnicos = $beneficiariosUnicos
            ->count();
        $conteoPorActividad = $collectDb
            ->groupBy('Código de Actividad')
            ->map(function ($items) {
                return $items->count();
            });
        $conteoBeneficiariosUnicosSexo = $collectDb
            ->groupBy('Sexo')
            ->map(function ($items) {
                return $items
                    ->map(function ($item) {
                        return trim($item['N. Identificación']) ?? null;
                    })
                    ->filter()
                    ->unique()
                    ->count();
            });
        $conteoPorUbicacionGeografica = $collectDb
            ->groupBy(function ($item) {
                return $item['Departamento'] . ' - ' . $item['Municipio'];
            })
            ->map(function ($items) {
                return $items->count();
            });
        $conteoBeneficiariosUnicosPorDonante = $collectDb
            ->groupBy('Donante')
            ->map(function ($items) {
                return $items
                    ->map(function ($item) {
                        return trim($item['N. Identificación']) ?? null;
                    })
                    ->filter()
                    ->unique()
                    ->count();
            });
        $conteoPosibleDuplicidad = $collectDb
            ->unique(function ($item) {
                $date = $item['Fecha de atención'];

                if (is_object($date)) {
                    $fechabefore = collect($date)->get("date");
                } else {
                    $fechabefore = trim($date);
                    $fechabefore = Carbon::createFromFormat('d/m/Y', $fechabefore);
                    $fechabefore = $fechabefore->toDateTimeString();
                }

                $date = $fechabefore;

                return
                    $item['N. Identificación'] . '|' .
                    $item['Código de Actividad'] . '|' .
                    $date . '|' .
                    $item['Donante'];
            })
            ->count();
        //Socio, archivo, periodo, fecha, hora y usuario cargador
        $fechas = $collectDb
            ->map(function ($item) {

                $date = $item['Fecha de atención'];

                if (is_object($date)) {
                    $fecha = collect($date)->get('date');

                    return Carbon::parse($fecha);
                }

                return Carbon::createFromFormat(
                    'd/m/Y',
                    trim($date)
                );
            })
            ->filter();
        $fechaMenor = $fechas->min()->format('Y-m-d');
        $fechaMayor = $fechas->max()->format('Y-m-d');
        $nombreArchivo = basename($migration->table_id);

        DB::setDefaultConnection('firebird');
        $sender = MUsuarios::where("ID_M_USUARIO", $migration->id_user_mireview)->first();
        $socio = explode('@', $sender->CORREO)[1] ?? $sender->CORREO;

        $metadataSender = [
            "archivo" => $nombreArchivo,
            "socio" => $socio,
            "periodo" => $fechaMenor . ' - ' . $fechaMayor,
            "date" => $migration->created_at,
            "author" => $sender->NOMBRES . ' ' . $sender->APELLIDOS . ' ' . $sender->CORREO,
        ];
        $idGrupo = Carbon::now()->format('YmdHis');
        /**
         * INSERT P_FORMULARIOS ROTULO VALOR ID_M_FORMULARIOS LA 0017 ID_M_USUARIOS 00152
         */
        DB::select("INSERT INTO P_FORMULARIOS (ROTULO, VALOR, VALOR_REFERENCIA, ID_M_FORMULARIOS, ID_M_USUARIOS)  VALUES ('archivo', '" . $metadataSender['archivo'] . "', '" . $idGrupo . "', '0017', '" . $migration->id_user_mireview . "');");
        DB::select("INSERT INTO P_FORMULARIOS (ROTULO, VALOR, VALOR_REFERENCIA, ID_M_FORMULARIOS, ID_M_USUARIOS)  VALUES ('socio', '" . $metadataSender['socio'] . "', '" . $idGrupo . "', '0017', '" . $migration->id_user_mireview . "');");
        DB::select("INSERT INTO P_FORMULARIOS (ROTULO, VALOR, VALOR_REFERENCIA, ID_M_FORMULARIOS, ID_M_USUARIOS)  VALUES ('periodo', '" . $metadataSender['periodo'] . "', '" . $idGrupo . "', '0017', '" . $migration->id_user_mireview . "');");
        DB::select("INSERT INTO P_FORMULARIOS (ROTULO, VALOR, VALOR_REFERENCIA, ID_M_FORMULARIOS, ID_M_USUARIOS)  VALUES ('date', '" . $metadataSender['date'] . "', '" . $idGrupo . "', '0017', '" . $migration->id_user_mireview . "');");
        DB::select("INSERT INTO P_FORMULARIOS (ROTULO, VALOR, VALOR_REFERENCIA, ID_M_FORMULARIOS, ID_M_USUARIOS)  VALUES ('author', '" . $metadataSender['author'] . "', '" . $idGrupo . "', '0017', '" . $migration->id_user_mireview . "');");

        DB::statement("
            INSERT INTO D_CORREO (
                DESTINATARIO,
                IDX,
                TABLA,
                COMANDO,
                TIPO,
                ESTATUS,
                ASUNTO,
                REMITENTE,
                ORIGEN,
                FECHA,
                FECHA_REGISTRO,
                FECHA_ENVIO,
                FECHA2
            )
            VALUES (
                '{$sender->CORREO}',
                '{$idGrupo}',
                'P_FORMULARIOS',
                NULL,
                'OUT',
                'CONFIRMADO',
                'Resúmen de datos enviados LPA',
                'ach@nohungerforum.org',
                '0017',
                CURRENT_TIMESTAMP,
                CURRENT_TIMESTAMP,
                CURRENT_TIMESTAMP,
                CURRENT_TIMESTAMP
            );
        ");

        DB::setDefaultConnection('pgsql');

        dd(
            "Metadata de la persona que envio los datos",
            $metadataSender,
            "Total de beneficiarios atendidos",
            $conteoRegistros,
            "Beneficiarios unicos atendidos",//quedo mal cuenta 1
            $conteoBeneficiariosUnicos,
            "Registros por actividad",
            $conteoPorActividad,
            "Beneficiarios unicos por sexo",// cuenta mal cuneta 1
            $conteoBeneficiariosUnicosSexo,
            "Registros por ubicación geográfica",
            $conteoPorUbicacionGeografica,
            "Beneficiarios unicos por donante",//cuenta mal conto solo 1 
            $conteoBeneficiariosUnicosPorDonante,
            "Posible duplicidad de beneficiarios",//cuenta mal conto todos como duplicados
            $conteoPosibleDuplicidad
        );


        $result = (new MlpasClass)->collection($collectDb, $migration->table_id);

        /* $import = new PaImportClass();

        $import->onlySheets('BD');

        // Process the Excel file
        Excel::import($import, $file); */

        $migration->file_ref = 'PROCECED';

        $migration->save();
        //dd("migration", $migration);

        $restanteTot = migrateCustom::where([
            ['table', 'M_LPAS'],
            ['table_id', '!=', '[]'],
            ['file_ref', 'PENDING'],
        ])->get();

        //se procesa el refresh
        //se deben crear tantos jobs como migraciones haya pendientes

        $TotrestanteTot = count($restanteTot) ?? count(explode(",", $result));
        //quitar esta linea cuando soliucione los repetidos comentarios
        for ($i = 0; $i < $TotrestanteTot; $i++) {
            # code...
            LpaJobRefreshMigrations::dispatch(); //->onConnection('database');
        }
        return [
            "migration" => $migration,
            "result" => $result
        ];
        // de aqui hacia abajo algo de query falla 

        //get data excel
        //$collection = (new MlpasClass)->toCollection($file);

        //$collectExcel = $collection[2] ?? $collection[0];

        /* $count_record_excel = 0; //helper::countValidValues($collectExcel)

        $migrate_custom = migrateCustom::where([
          'table' => "M_LPAS"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        //$id_lpas = explode(", ", $migrate_custom->table_id);

        //$query_mlpas = MLpa::whereIn('ID', $id_lpas);//;
        $count_mlpas = 0; //count($query_mlpas->get());

        $mlpas = MLpa::orderBy('created_at', 'desc')
          ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] = $mlpas;

        $data['record_excel'] = $count_record_excel;

        $data['record_saved'] = $count_mlpas;

        //terminar devolver tabla
        return view('list-lpas', $data);
        //return response()->json(["message" => "operacion hecha con exito"]);

        return $migration; //table_id */
    }

    function storeFixDiscapacitados(Request $request)
    {

        try {

            //validacion para que no se cargue el mismo archivo en el mismo mes
            //lo que hre es validar si ya hay una migracion en el mes que se enviaron los datos y guardar o actualizar 
            //parece que debo pedir mes de la migracion
            //dd("file", $request->file('file'));

            //para el analisis recibir un string como analisis y que se edite en otro lado

            // Validate the uploaded file
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);

            //guardo el archiv

            // Get the uploaded file
            $file = $request->file('file');
            $path = $file->store('migrationsLpa');

            migrateCustom::create([
                'table' => 'M_LPAS_FIX',
                'table_id' => $path,
                'file_ref' => 'UPLOADED',
            ]);

            // Get the uploaded file
            $file = $request->file('file');

            // Process the Excel file Consolidado
            //Excel::import(new MqrImportClass, $file, 'Consolidado');

            $import = new LpaFixImportClass();

            $import->onlySheets('discapacitados');

            // Process the Excel file
            Excel::import($import, $file);

            //$collection = (new LpaFixClass)->toCollection($file);

            $count_record_excel = 0; //helper::countValidValues($collection[0]);

            $migrate_custom = migrateCustom::where([
                'table' => "M_LPAS_FIX"
            ])->get()->last();

            $excel = file_get_contents($file);
            $base64 = base64_encode($excel);

            $migrate_custom->file = $base64;

            $migrate_custom->save();

            $id_mqrs = explode(", ", $migrate_custom->table_id);

            $query_mmqrs = MLpaFix::whereIn('id', $id_mqrs)->orderBy('created_at', 'desc');

            $count_mmqrs = count($query_mmqrs->get());

            $mmqrs = $query_mmqrs->paginate(10);

            $data['mmqrs'] = $mmqrs;


            $data['record_excel'] = $count_record_excel - 1;
            $data['record_saved'] = $count_mmqrs + 1;

            //MQR devolver tabla con los resultados creados 
            return view('list-mqrs', $data);
            //return response()->json(["message" => "operacion hecha con exito"]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function fixDiscapacitados()
    {

        /* $personas = MLpaPersona::get()->map(function ($persona) {
            return $persona->DOCUMENTO;
        });

        $discapacitado = MLpaFix::whereIn('documento', $personas );

        dd(count($discapacitado->get()), $personas); */
        $discapacitadosFix = MLpaFix::get();

        $documento = $discapacitadosFix->pluck('documento');

        dd($documento);

        $discapacitadosFixDocs = $discapacitadosFix->map(function ($disc, int $key) {
            return $disc->documento;
        });

        $discapacitadosMlpaPersonas = MLpaPersona::whereIn('DOCUMENTO', $discapacitadosFixDocs->all())->get();

        $discapacitadosMlpaPersonasIds = $discapacitadosMlpaPersonas->map(function ($disc, int $key) {
            return $disc->ID;
        });

        $mlpas = MLpa::where("FECHA_ATENCION", ">=", "2023-01-01")
            //->whereIn('FK_LPA_PERSONA', $discapacitadosMlpaPersonasIds->all())
            ->nodeleted()
            ->get();

        $mlpas->load(['persona']);

        $i = 0;

        $mlpasFormated = $mlpas->map(function ($lpa, int $key) {
            //$lpa->load('actividad.directory');
            $lpa->append('tipo_lpa');

            //$lpa->persona->getDOCUMENTOAttribute;
            //$lpa->persona->getOriginal('DOCUMENTO');
            $lpa->persona->append('DOCUMENTO');

            //dd($lpa->persona);
            $lpa->persona->DOCUMENTO_TEMP = $lpa->persona->DOCUMENTO;

            return collect($lpa)->toArray();
        });

        $mlpasFormatedArray = collect($mlpasFormated->all());

        $mlpasFormatedArrayFilteredFix = $mlpasFormatedArray->map(function ($lpa, int $key) use ($discapacitadosMlpaPersonasIds) {

            //
            if (isset($lpa['tipo_lpa']) && $lpa['tipo_lpa'] == 'Recuperacion Temprana' && $lpa['FECHA_ATENCION'] <= '2024-07-01' && isset($lpa['persona']['DOCUMENTO_TEMP'])) {

                /* $discapacitado = MLpaFix::where([
                    'documento' => $lpa['persona']['DOCUMENTO_TEMP']
                ])
                    ->first(); */

                $documento_temp = $lpa['FK_LPA_PERSONA'];

                $discapacitado = $discapacitadosMlpaPersonasIds->search(function ($item) use ($documento_temp) {
                    echo '___' . $item . '___' . $documento_temp . '___';
                    return strpos(strtoupper($item), strtoupper($documento_temp)) >= 0;
                });

                echo "discapacitado:" . $lpa['FK_LPA_PERSONA'] . '_' . json_encode($discapacitado) . '_' . $discapacitado . 'tipo_lpa' . $lpa['tipo_lpa'];

                //->where('sexo', $lpa->persona->GENERO)
                if ($discapacitado >= 0) {
                    $lpa['persona']['discapacitado'] = 1;
                    //dd("Si encontro uno");
                }
            }

            //unset($lpa['persona']['DOCUMENTO_TEMP']);

            return $lpa;
        });

        $mlpasFormatedArrayFilteredFixFiltered = collect($mlpasFormatedArrayFilteredFix)->filter(function ($lpa) {
            return $lpa['persona']['discapacitado'] == 1;
        });

        echo "cantidad lpa filtradas:" . count($mlpasFormatedArrayFilteredFixFiltered) . "<";

        //todo da 799

        $mlpasFormatedArrayFilteredFixFilteredGroupBy = $mlpasFormatedArrayFilteredFixFiltered->groupBy('FK_LPA_PERSONA')->all();

        return count(($mlpasFormatedArrayFilteredFixFilteredGroupBy));
    }


    function storedActivities(Request $request)
    {

        ini_set('memory_limit', '2024M');
        set_time_limit(3000000); //0

        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);

            // Get the uploaded file
            $file = $request->file('file');

            $import = new MlpasActivityImportClass();

            $import->onlySheets('DIRECTORIO');

            // Process the Excel file
            Excel::import($import, $file);

            //$collection = (new MqrClass)->toCollection($file);

            $count_record_excel = 0; //helper::countValidValues($collection[0]);

            $migrate_custom = migrateCustom::where([
                'table' => "actividades_directory"
            ])->get()->last();

            $excel = file_get_contents($file);
            $base64 = base64_encode($excel);

            $migrate_custom->file = $base64;

            $migrate_custom->save();

            $id_activities_directories = explode(", ", $migrate_custom->table_id);

            $query_activities_directories = ActivitiesDirectories::whereIn('id', $id_activities_directories)->orderBy('created_at', 'desc');

            $count_activities_directories = count($query_activities_directories->get());

            $activities_directories = $query_activities_directories->paginate(10);

            $data['mmqrs'] = $activities_directories;


            $data['record_excel'] = $count_record_excel - 1;
            $data['record_saved'] = $count_activities_directories + 1;

            //MQR devolver tabla con los resultados creados 
            return view('list-lpas', $data);
            //return response()->json(["message" => "operacion hecha con exito"]);

        } catch (\Throwable $th) {
            throw $th;
        }


        $mlpas = MLpa::orderBy('created_at', 'desc')
            ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] = $mlpas;

        $data['record_excel'] = 1;

        $data['record_saved'] = 0;

        //terminar devolver tabla
        return view('list-lpas', $data);
    }

    function checked(Request $request)
    {

        $migration = migrateCustom::where([
            'table' => 'M_LPAS',
            'file_ref' => 'UPLOADED',
        ])->first();

        if (!isset($migration)) {
            return response()->json([
                "msg" => "Lo sentimos por el momento no hay procesos de migracion en proceso",
                "message" => "Lo sentimos por el momento no hay procesos de migracion en proceso",
            ]);
        }

        $file = Storage::path($migration->table_id);

        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );
        //return Storage::download("migrationsLpa/P1NbVt8r2vVH76QKOkJigTOOMJi1UggewaFJ50gy.xlsx", 'filename.xlsx', $headers);
        //return Storage::download("migrationsLpa/h0R5RfbLVuBjetZLTRG9c5xHVABG054Qm0GPIG7S.xlsx", 'filename.xlsx', $headers);

        return Storage::download($migration->table_id, 'filename.xlsx', $headers);
    }

    function refreshMigrations(Request $request)
    {

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000); //0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        //try {


        $lotes = 500;

        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        if (!$ID_USER) {
            return "error";
        }

        $migrationPendings = migrateCustom::where([
            ['table', 'M_LPAS'],
            ['table_id', '!=', '[]'],
            ['file_ref', 'PENDING']
        ])->first();

        $idTable = optional($migrationPendings)->table_id;

        if (!isset($migrationPendings) || !isset($idTable)) {
            return ['restante' => 0];
        }

        if (isset(optional($migrationPendings)->table_id) !== true) {
            return ['restante' => strlen(optional($migrationPendings)->table_id)];
        }

        //validar para parchar por que si es arreglo se procesara mal
        //es objeto
        if (substr($idTable, 0, 1) == '{') {
            $elementsForMigration = collect(json_decode($idTable));
        } else {
            //es arreglo
            $elementsForMigration = collect(json_decode($idTable));
            //return ["elementsForMigration"=>$elementsForMigration];
        }

        echo count($elementsForMigration);


        $elementsForMigrationChunked = $elementsForMigration->chunk($lotes);

        $body_lpas = collect();

        //estoy tomando solo la primera 500

        //dd(count($elementsForMigrationChunked[0]));

        foreach ($elementsForMigrationChunked[0] as $row) {
            $i = 0;
            /* if (!$row[0] || $row[0] == '') {
                break;
                } */
            //\DB::table('readings')->insert($chunk->toArray());
            $row = collect(collect($row)->toArray())->flatten();
            $row[0] = trim($row[0]);

            //echo $row[0] .'-'. strlen($row[0]);

            if (strlen($row[0]) < 2) {
                $i++;
                continue;
            }

            $mlpa_emergencia = MLpaEmergencia::firstOrCreate(
                [
                    'COD_EMERGENCIAS' => $row[0],
                    'TIPO_EVENTO' => $row[1],
                    'SOCIO' => $row[2],
                    'DEPARTAMENTO' => isset($row[3]) ? strtoupper($row[3]) : $row[3],
                    'MUNICIPIO' => isset($row[4]) ? strtoupper($row[4]) : $row[4],
                    'LUGAR_ATENCION' => $row[5]
                ]
            );

            if (
                !isset($mlpa_emergencia) ||
                (
                    !optional($mlpa_emergencia)->ID
                ) ||
                (
                    !isset(optional($mlpa_emergencia)->ID)
                )
            ) {
                $mlpa_emergencia = MLpaEmergencia::where([
                    'COD_EMERGENCIAS' => $mlpa_emergencia->COD_EMERGENCIAS,
                    'TIPO_EVENTO' => $mlpa_emergencia->TIPO_EVENTO,
                    'SOCIO' => $mlpa_emergencia->SOCIO,
                    'DEPARTAMENTO' => $mlpa_emergencia->DEPARTAMENTO,
                    'MUNICIPIO' => $mlpa_emergencia->MUNICIPIO,
                    'LUGAR_ATENCION' => $mlpa_emergencia->LUGAR_ATENCION
                ])
                    ->first();
            }

            //dd($mlpa_emergencia->ID);

            $dateArray = collect($row[14])->toArray();

            $date_birday = (isset($dateArray) && isset($dateArray["date"])) ? $dateArray["date"] : null; //Date::excelToDateTimeObject($row[14]);

            $FECHA_NACIMIENTO = $date_birday; //date('d-m-Y', strtotime($date_birday));

            //REPARO DE CONSULTA Y CREACION DE PERSONA POR TIMEOUT?

            //VALIDACION SI YA SE DECLARO DISCAPACITADO DEJARLO DISCAPACITADO
            //Si - No puede hacerlo

            $mlpa_persona_DISCAPACIDAD_VER = MLpaPersona::where([
                'DOCUMENTO' => $row[6],
                'DISCAPACIDAD_VER' => 'Si - No puede hacerlo'
            ])->exists();


            $mlpa_persona_DISCAPACIDAD_OIR = MLpaPersona::where([
                'DOCUMENTO' => $row[6],
                'DISCAPACIDAD_VER' => 'Si - No puede hacerlo'
            ])->exists();


            $mlpa_persona_DISCAPACIDAD_CAMINAR = MLpaPersona::where([
                'DOCUMENTO' => $row[6],
                'DISCAPACIDAD_VER' => 'Si - No puede hacerlo'
            ])->exists();



            $mlpa_persona_DISCAPACIDAD_RECORDAR = MLpaPersona::where([
                'DOCUMENTO' => $row[6],
                'DISCAPACIDAD_VER' => 'Si - No puede hacerlo'
            ])->exists();



            $mlpa_persona_DISCAPACIDAD_CUIDADO_PROPIO = MLpaPersona::where([
                'DOCUMENTO' => $row[6],
                'DISCAPACIDAD_VER' => 'Si - No puede hacerlo'
            ])->exists();



            $mlpa_persona_DISCAPACIDAD_COMUNICAR = MLpaPersona::where([
                'DOCUMENTO' => $row[6],
                'DISCAPACIDAD_VER' => 'Si - No puede hacerlo'
            ])->exists();


            $mlpa_persona = MLpaPersona::firstOrCreate(
                ['DOCUMENTO' => $row[6]],
                [
                    'DOCUMENTO' => $row[6],
                    'TIPO_DOCUMENTO' => $row[7],
                    'NOMBRE_PRIMERO' => $row[8],
                    'NOMBRE_OTROS' => $row[9],
                    'APELLIDO_PRIMERO' => $row[10],
                    'APELLIDO_OTRO' => $row[11],
                    'GENERO' => $row[12],
                    'IDENTIDAD_GENERO' => $row[13],
                    'FECHA_NACIMIENTO' => $FECHA_NACIMIENTO,
                    'NACIONALIDAD' => $row[15],
                    'PERFIL_MIGRATORIO' => $row[16],
                    'SITUACION' => $row[17],
                    'ETNIA' => $row[18],
                    'PERFIL' => $row[19],
                    'NIVEL_ESCOLARIDAD' => $row[20],
                    'CARACTERISTICAS_MADRE' => $row[21],
                    'DISCAPACIDAD_VER' => !$mlpa_persona_DISCAPACIDAD_VER ? $row[22] : 'Si - No puede hacerlo',
                    'DISCAPACIDAD_OIR' => !$mlpa_persona_DISCAPACIDAD_OIR ? $row[23] : 'Si - No puede hacerlo',
                    'DISCAPACIDAD_CAMINAR' => !$mlpa_persona_DISCAPACIDAD_CAMINAR ? $row[24] : 'Si - No puede hacerlo',
                    'DISCAPACIDAD_RECORDAR' => !$mlpa_persona_DISCAPACIDAD_RECORDAR ? $row[25] : 'Si - No puede hacerlo',
                    'DISCAPACIDAD_CUIDADO_PROPIO' => !$mlpa_persona_DISCAPACIDAD_CUIDADO_PROPIO ? $row[26] : 'Si - No puede hacerlo',
                    'DISCAPACIDAD_COMUNICAR' => !$mlpa_persona_DISCAPACIDAD_COMUNICAR ? $row[27] : 'Si - No puede hacerlo',
                    'TELEFONO' => $row[28]
                ]
            );

            if (
                !isset($mlpa_persona) ||
                (
                    !optional($mlpa_persona)->ID
                ) ||
                (
                    !isset(optional($mlpa_persona)->ID)
                )
            ) {
                $mlpa_persona = MLpaPersona::where([
                    'DOCUMENTO' => $mlpa_persona->DOCUMENTO
                ])
                    ->first();
            }


            if (
                !isset($mlpa_persona) ||
                !isset($mlpa_emergencia) ||
                (
                    !optional($mlpa_persona)->ID ||
                    !optional($mlpa_emergencia)->ID
                ) ||
                (
                    !isset(optional($mlpa_persona)->ID) ||
                    !isset(optional($mlpa_emergencia)->ID)
                )
            ) {
                return ["mlpa_persona" => $mlpa_persona, "mlpa_emergencia" => $mlpa_emergencia];
            }

            $FECHA_ATENCION = collect($row[31])->get("date"); //Date::excelToDateTimeObject($row[31]);

            $body_lpas->push([

                "DONANTE" => $row[29],
                "COD_ACTIVIDAD" => $row[30],
                "FECHA_ATENCION" => $FECHA_ATENCION,
                "REPRESENTANTE" => $row[32],
                "DOC_REPRESENTANTE" => $row[33],
                "TIPO_TRANFERENCIA" => $row[34],
                "MODO_ENTREGA" => $row[35],
                "PROVEEDOR_FINANCIERO" => $row[36],
                "MONTO_MENSUAL" => $row[37],
                "FASE_ATENCION" => $row[38],
                "STATUS" => $row[42],

                //laura reemplzar por el id desde el token 5 en lcal 1 online
                "ID_M_USUARIOS" => $ID_USER,

                "FK_LPA_EMERGENCIA" => $mlpa_emergencia->ID,
                "FK_LPA_PERSONA" => $mlpa_persona->ID

            ]);

            $i++;

            //echo ("i proceced: " . $i);

        }

        //dd("elementsForMigration", count($elementsForMigration), "body_lpas", count($body_lpas));
        //si es par dividir entre 2 sino entre 3 

        $divisor = 3;
        if (count($body_lpas) % 2 == 0) {
            $divisor = 2;
        }

        $body_lpas = ($body_lpas)->chunk(($lotes / $divisor));
        foreach ($body_lpas as $body) {
            $bodyArray = $body->toArray();
            MLpa::insert($bodyArray);
        }

        //eliminar los 350 primeros registros de $elementsForMigration
        $elementsForMigration->shift($lotes);

        $restante = json_encode(json_decode(json_encode($elementsForMigration), FALSE));

        $migrationPendings->table_id = $restante;

        $migrationPendings->save();

        $queryLpa = MLpa::all(); //whereBetween('created_at', [$date_begin, Carbon::now()->addDays(1)->format("Y-m-d H:i:s")]);// 
        $mlpas = $queryLpa; //->get();
        $id_lpas = $queryLpa->pluck('ID')->all();

        if (count($mlpas) > 0) {
            migrateCustom::create([
                'table' => 'M_LPAS',
                'table_id' => implode(", ", $id_lpas),
                'file_ref' => '-',
            ]);
        } else {

            /* throw ValidationException::withMessages([
                'msg' => ['No se guardaron los registros.'],
            ]); */
            return MLpa::get();
        }

        //array_push($id_emergenciasz, $mlpa_emergencia)
        //dd($mlpas->pluck('ID'),$id_lpas);

        $restanteTot = migrateCustom::where([
            ['table', 'M_LPAS'],
            ['table_id', '!=', '[]'],
            ['file_ref', 'PENDING']
        ])->get();

        return ['restanteParte' => count($elementsForMigration), 'restanteTotal' => count($restanteTot)];

        //return response()->json(["message" => "operacion hecha con exito"]);

        //} catch (\Throwable $th) {

        //throw ValidationException::withMessages([
        //    'msg' => ['No se guardaron los registros.' . ($th)],
        //]);
        //}
    }

    /**
     * esto esta mla pór que no se puede obtener los discapacidades y discapacitado apartir solo del id de la persona 
     */
    function getPersonaByID(Request $request)
    {
        $persona = MLpaPersona::where("ID", "=", $request->ID)->first();
        $discapacitado = $persona->discapacitado;

        if (isset($request->tipo_lpa) && $discapacitado == 0) {

            if (isset($request->tipo_lpa) && $request->tipo_lpa == 'Recuperacion Temprana' && $request->FECHA_ATENCION <= '2024-07-01' && isset($persona->DOCUMENTO)) {

                $discapacitado = MLpaFix::where([
                    'documento' => $persona->DOCUMENTO
                ])
                    ->exists();

                //->where('sexo', $lpa->persona->GENERO)
                if (($discapacitado) == true) {
                    $persona = collect($persona)->forget('discapacitado');
                    $persona['discapacitado'] = 1;
                }

                //unset($lpa['persona']['DOCUMENTO']);
            }
        }



        //$persona->with('atenciones');

        /* $filtrados = $lpas_discapacitado->search(function ( $item, int $key) {
            return $item > 5;
        }); */


        return [
            "persona" => $persona
        ];
    }

    function getRangeBha(Request $request)
    {
        $range = '';
        if (isset($request->edad)) {
            $howOldAmI = $request->edad;

            switch (true) {

                case ($howOldAmI >= 0 && $howOldAmI <= 5):
                    $range = '0 to 5';
                    break;

                case ($howOldAmI >= 6 && $howOldAmI <= 17):
                    $range = '6 to 17';
                    break;

                case ($howOldAmI >= 18 && $howOldAmI <= 49):
                    $range = '18 to 49';
                    break;

                case $howOldAmI >= 50:
                    $range = '> 50';
                    break;

                default:
                    # code...
                    $range = '';
                    break;
            }
        }

        return [
            "range" => [
                "bha" => $range
            ]
        ];
    }

    function getRangeEcho(Request $request)
    {
        $range = '';
        if (isset($request->edad)) {
            $howOldAmI = $request->edad;
            switch (true) {

                case ($howOldAmI >= 0 && $howOldAmI <= 4):
                    $range = '0 to 4';
                    break;

                case ($howOldAmI >= 5 && $howOldAmI <= 9):
                    $range = '5 to 9';
                    break;

                case ($howOldAmI >= 10 && $howOldAmI <= 14):
                    $range = '10 to 14';
                    break;

                case ($howOldAmI >= 15 && $howOldAmI <= 18):
                    $range = '15 to 18';
                    break;

                case ($howOldAmI >= 19 && $howOldAmI <= 29):
                    $range = '19 to 29';
                    break;

                case ($howOldAmI >= 30 && $howOldAmI <= 59):
                    $range = '30 to 59';
                    break;

                case $howOldAmI >= 60:
                    $range = '> 60';
                    break;

                default:
                    # code...
                    $range = '';
                    break;
            }
        }


        return [
            "range" => [
                $range
            ]
        ];
    }

    function getTipoLpa(Request $request)
    {


        $mlpa = MLpa::where("ID", "=", $request->ID)->first();

        if (!isset($mlpa))
            return ["tipo_lpa" => "ERROR"];

        $tipo_lpa = $mlpa->append('tipo_lpa');

        return ["tipo_lpa" => $tipo_lpa->tipo_lpa];
    }

    function getDonante(Request $request)
    {
        //DB::setDefaultConnection('mongodb');

        //$mlpa = MLpaMongo::where("ID", "=", $request->ID)->first();

        //$donante = $mlpa->DONANTE;
        $donante = $request->DONANTE ?? '';

        $tipo_lpa = $request->tipo_lpa;

        if ($donante == 'BHA') {
            $donante .= ' ' . $tipo_lpa;
        }

        return ["donante_ajustado" => $donante];
    }

    function repairJobsCreateRefresh()
    {

        $restanteTot = migrateCustom::where([
            ['table', 'M_LPAS'],
            ['table_id', '!=', '[]'],
            ['file_ref', 'PENDING']
        ])->get();

        $TotrestanteTot = count($restanteTot);

        for ($i = 0; $i < $TotrestanteTot * 2; $i++) {
            # code...
            LpaJobRefreshMigrations::dispatch(); //->onConnection('database');
        }

        return ["solicitud creada con exito"];
    }

    function dataLpaConsorcio(Request $request)
    {
        //SELECT * FROM "M_LPA_EMERGENCIAS" where updated_at is not NULL ORDER BY updated_at DESC limit 1  
        $date = MLpaEmergencia::whereNotNull('updated_at')->orderBy('updated_at', 'desc')->first()->updated_at;

        $personas = count(MLpaPersona::has('atenciones')->get());

        $emergencias = count(
            DB::table('M_LPA_EMERGENCIAS')
                ->join('M_LPAS', 'M_LPA_EMERGENCIAS.ID', '=', 'M_LPAS.FK_LPA_EMERGENCIA')
                ->select('COD_EMERGENCIAS')
                ->where('M_LPAS.FASE_ATENCION', '!=', "Fase III-RecuperaciÃ³n temprana")
                ->groupBy('COD_EMERGENCIAS')
                ->get()
        );

        //DEPARTAMENTOS YA CONTADOS EN EL MIREVE PARA  2020 HASTA  2023
        $departaments_2020 =
            [
                strtoupper("Amazonas"),
                strtoupper("Antioquia"),
                strtoupper("Arauca"),
                strtoupper("Bogotá"),
                strtoupper("Bolívar"),
                strtoupper("Caquetá"),
                strtoupper("Cauca"),
                strtoupper("Chocó"),
                strtoupper("Córdoba"),
                strtoupper("Cundinamarca"),
                strtoupper("Guaviare"),
                strtoupper("Huila"),
                strtoupper("La Guajira"),
                strtoupper("Meta"),
                strtoupper("Nariño"),
                strtoupper("Putumayo"),
                strtoupper("Valle del Cauca"),
                strtoupper("Vaupés"),
                strtoupper("Vichada")
            ];

        $departamentos = count(
            DB::table('M_LPA_EMERGENCIAS')
                ->join('M_LPAS', 'M_LPA_EMERGENCIAS.ID', '=', 'M_LPAS.FK_LPA_EMERGENCIA')
                ->select('DEPARTAMENTO')
                ->whereNotIn("DEPARTAMENTO", $departaments_2020)
                ->groupBy('DEPARTAMENTO')
                ->get()
        );

        //DEPARTAMENTOS YA CONTADOS EN EL MIREVE PARA  2020 HASTA  2023
        $municipios_2020 = [
            strtoupper("Alto Baudó"),
            strtoupper("Arauca"),
            strtoupper("Arauquita"),
            strtoupper("Arenal"),
            strtoupper("Argelia"),
            strtoupper("Bagadó"),
            strtoupper("Bahía Solano"),
            strtoupper("Bajo Baudó"),
            strtoupper("Barbacoas"),
            strtoupper("Bogotá"),
            strtoupper("Bojayá"),
            strtoupper("Buenaventura"),
            strtoupper("Buenos Aires"),
            strtoupper("Buenos Aires"),
            strtoupper("Cáceres"),
            strtoupper("Cali"),
            strtoupper("Cartagena del Chairá"),
            strtoupper("Carurú"),
            strtoupper("Caucasia"),
            strtoupper("Dabeiba"),
            strtoupper("Dibulla"),
            strtoupper("El Charco"),
            strtoupper("Granada"),
            strtoupper("Guapi"),
            strtoupper("Íquira"),
            strtoupper("Istmina"),
            strtoupper("Ituango"),
            strtoupper("Juradó"),
            strtoupper("La Chorrera"),
            strtoupper("La Plata"),
            strtoupper("Leticia"),
            strtoupper("Litoral del San Juan"),
            strtoupper("Lloró"),
            strtoupper("López de Micay"),
            strtoupper("Los Andes"),
            strtoupper("Magüí Payán"),
            strtoupper("Maicao"),
            strtoupper("Medio Baudó"),
            strtoupper("Medio San Juan"),
            strtoupper("Montelíbano"),
            strtoupper("Montería"),
            strtoupper("Morales"),
            strtoupper("Mosquera"),
            strtoupper("Murindó"),
            strtoupper("Nátaga"),
            strtoupper("Norosí"),
            strtoupper("Nóvita"),
            strtoupper("Nuquí"),
            strtoupper("Olaya Herrera"),
            strtoupper("Pasto"),
            strtoupper("Policarpa"),
            strtoupper("Popayán"),
            strtoupper("Puerto Asís"),
            strtoupper("Puerto Carreño"),
            strtoupper("Puerto Concordia"),
            strtoupper("Puerto Leguízamo"),
            strtoupper("Puerto Milán"),
            strtoupper("Puerto Rico"),
            strtoupper("Quibdó"),
            strtoupper("Ricaurte"),
            strtoupper("Riohacha"),
            strtoupper("Roberto Payán"),
            strtoupper("Samaniego"),
            strtoupper("San José de Uré"),
            strtoupper("San José del Guaviare"),
            strtoupper("San Pedro de Urabá"),
            strtoupper("San Vicente del Caguán"),
            strtoupper("Santa Bárbara"),
            strtoupper("Santa Rosa del Sur"),
            strtoupper("Segovia"),
            strtoupper("Sipí"),
            strtoupper("Soacha"),
            strtoupper("Solano"),
            strtoupper("Suárez"),
            strtoupper("Tadó"),
            strtoupper("Tame"),
            strtoupper("Tarazá"),
            strtoupper("Tierralta"),
            strtoupper("Timbiquí"),
            strtoupper("Toribío"),
            strtoupper("Totoró"),
            strtoupper("Tumaco"),
            strtoupper("Turbo"),
            strtoupper("Urrao"),
            strtoupper("Valdivia"),
            strtoupper("Vigía del Fuerte")
        ];

        $municipios = count(
            DB::table('M_LPA_EMERGENCIAS')
                ->join('M_LPAS', 'M_LPA_EMERGENCIAS.ID', '=', 'M_LPAS.FK_LPA_EMERGENCIA')
                ->select('MUNICIPIO')
                ->whereNotIn("MUNICIPIO", $municipios_2020)
                ->groupBy('MUNICIPIO')
                ->get()
        );


        $actividades = count(
            DB::table('activities')
                ->join('M_LPAS', 'activities.cod', '=', 'M_LPAS.COD_ACTIVIDAD')
                ->select('cod')
                ->groupBy('cod')
                ->get()
        );

        $filesExported = Storage::files("/monitoreoEvaluacion");

        $comunidades_rt = count(collect($filesExported));

        $atenciones = count(MLpa::where("FECHA_ATENCION", ">=", "2023-01-01")
            //->where("FK_LPA_PERSONA", ">", "22270")
            ->nodeleted()
            ->get());

        $personasatenciones2020 = 163294;
        $atenciones2020 = 423541;
        $emergencias2020 = 131;

        $departamentos2020 = 19;
        $municipios2020 = 86;
        //actividades
        $comunidades_rt2020 = 13;

        return [
            "atenciones" => $atenciones + $atenciones2020,
            "departamentos" => $departamentos + count($departaments_2020), // + $departamentos2020,//
            "municipios" => $municipios + count($municipios_2020), // + $municipios2020,
            "beneficiarios_unicos" => $personas + $personasatenciones2020,

            "emergencias" => $emergencias + $emergencias2020,
            "comunidades_rt" => $comunidades_rt, // + $comunidades_rt2020,

            "actividades" => $actividades,
            "fecha_updated" => Carbon::parse($date)->format('d [de] MMMM [de] Y H:i:s A')
        ];
    }

    function getPersonas(Request $request)
    {

        //protected $appends = ['edad', 'discapacidades', 'discapacitado'];

        /* $select = '*';
        if(isset($request->select)){
            $select = explode(",", $request->select);
        }

        $personas = DB::table('M_LPA_PERSONAS')
        ->select($select)
        ->get(); 

        return [
            "personas" => $personas
        ];

        */
        $select = '*';
        if (isset($request->select)) {
            $select = explode(",", $request->select);
        }

        $personas = MLpaPersona::get();
        /* $personas = DB::table('M_LPA_PERSONAS')
        ->select($select)
        ->get(); */

        /* $personas->map(function ($persona) {

            $discapacitado = $persona->discapacitado;

            if (isset($request->tipo_lpa) && $discapacitado == 0) {

                if (isset($request->tipo_lpa) && $request->tipo_lpa == 'Recuperacion Temprana' && $request->FECHA_ATENCION <= '2024-07-01' && isset($persona->DOCUMENTO)) {

                    $discapacitado = MLpaFix::where([
                        'documento' => $persona->DOCUMENTO
                    ])
                        ->exists();

                    //->where('sexo', $lpa->persona->GENERO)
                    if (($discapacitado) ==  true) {
                        $persona = collect($persona)->forget('discapacitado');
                        $persona['discapacitado'] = 1;
                    }

                    //unset($lpa['persona']['DOCUMENTO']);
                }
            }

            return $persona;

        }); */

        //$persona->with('atenciones');

        /* $filtrados = $lpas_discapacitado->search(function ( $item, int $key) {
            return $item > 5;
        }); */


        return [
            "personas" => $personas
        ];
    }


    function getPersonaValidDiscapacidad(Request $request)
    {

        $discapacitadoRes = $request->discapacitado;

        if ($request->discapacitado == 1) {
            return ["discapacitadoRes" => $discapacitadoRes];
        }

        $discapacitado = $request->discapacitado;

        if (isset($request->tipo_lpa)) {

            if (isset($request->tipo_lpa) && $request->tipo_lpa == 'Recuperacion Temprana' && $request->FECHA_ATENCION <= '2024-07-01' && isset($request->DOCUMENTO)) {

                $discapacitado = MLpaFix::where([
                    'documento' => $request->DOCUMENTO
                ])
                    ->exists();

                if (($discapacitado) == true) {
                    $discapacitadoRes = 1;
                }
            }
        }

        return ["discapacitadoRes" => $discapacitadoRes];
    }
    /**
     * 
     * es para cargar LPS y se actualice masivamente
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function updateMany(Request $request)
    {

        try {

            ini_set('memory_limit', '12000M');
            set_time_limit(3000000); //0


            $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

            if (!$ID_USER) {
                return "error";
            }

            // Validate the uploaded file
            $request->validate([
                'file' => 'required|mimes:xlsx,xls:csv|max:10240', // Adjust the max size as needed
            ]);

            // Get the uploaded file
            $file = $request->file('file');

            $sheets = (new FastExcel)->withSheetsNames()->importSheets($file);

            $collectDb = collect($sheets['BD'])
                ->filter(function ($row) {
                    // Quitamos los valores nulos o vacíos y contamos si queda algo
                    return count(array_filter($row)) > 0;
                });
            ;

            $body_lpas = collect();
            $table_ids = $collectDb->pluck(0)->toArray();

            dd("table_ids", $table_ids);
            
            $migrationUpdate = migrateCustom::create([
                'table' => 'M_LPAS',
                'table_id' => '',
                'file_ref' => '-',
                'id_user_mireview' => $ID_USER
            ]);

            foreach ($collectDb as $row) {
                $i = 0;
                $row = collect(collect($row)->toArray())->flatten();
                $row[1] = trim($row[1]);

                // esto es una validacion por si la fila que estas registrando esta vacia no eliminar
                if (strlen($row[1]) < 2 || $row[1] == '') {
                    $i++;
                    continue;
                }

                $mlpa_emergencia = MLpaEmergencia::updateOrCreate(
                    [
                        // Campos usados para buscar si ya existe
                        'COD_EMERGENCIAS' => $row[1],
                    ],
                    [
                        'TIPO_EVENTO' => $row[2],
                        'SOCIO' => $row[3],
                        'DEPARTAMENTO' => isset($row[4]) ? strtoupper($row[4]) : $row[4],
                        'MUNICIPIO' => isset($row[5]) ? strtoupper($row[5]) : $row[5],
                        'LUGAR_ATENCION' => $row[6]
                    ]
                );

                $mlpa_emergencia = MLpaEmergencia::where([
                    'COD_EMERGENCIAS' => $row[1]
                ])
                    ->first();

                //dd($mlpa_emergencia->ID);

                $dateArray = collect($row[14])->toArray();

                $date_birday = (isset($dateArray) && isset($dateArray["date"])) ? $dateArray["date"] : null;

                $FECHA_NACIMIENTO = $date_birday;

                $row[9] = isset($row[9]) ? $row[9] : "primernombre";
                $row[11] = isset($row[11]) ? $row[11] : "primerapellido";

                $documento_busqueda = strtoupper($row[7]);

                $mlpa_persona = MLpaPersona::updateOrCreate(
                    [
                        // Campos usados para buscar si ya existe
                        'DOCUMENTO' => $documento_busqueda,
                    ],
                    [
                        'TIPO_DOCUMENTO' => $row[8],
                        'NOMBRE_PRIMERO' => $row[9],
                        'NOMBRE_OTROS' => $row[10],
                        'APELLIDO_PRIMERO' => $row[11],
                        'APELLIDO_OTRO' => $row[12],
                        'GENERO' => $row[13],
                        //'IDENTIDAD_GENERO' => $row[13],
                        'FECHA_NACIMIENTO' => $FECHA_NACIMIENTO,
                        'NACIONALIDAD' => $row[15],
                        'PERFIL_MIGRATORIO' => $row[16],//Perfil Migratorio
                        'SITUACION' => $row[17],
                        'ETNIA' => $row[18],
                        'PERFIL' => $row[19],//Perfil del Participante
                        'NIVEL_ESCOLARIDAD' => $row[20],
                        'CARACTERISTICAS_MADRE' => $row[21],

                        'DISCAPACITADO' => $row[22],

                        /*
                        'DISCAPACIDAD_VER' => $row[21], //!$mlpa_persona_DISCAPACIDAD_VER ? : 'Si - No puede hacerlo',
                        'DISCAPACIDAD_OIR' => $row[22], //!$mlpa_persona_DISCAPACIDAD_OIR ? : 'Si - No puede hacerlo',
                        'DISCAPACIDAD_CAMINAR' => $row[23], //!$mlpa_persona_DISCAPACIDAD_CAMINAR ? : 'Si - No puede hacerlo',
                        'DISCAPACIDAD_RECORDAR' => $row[24], //!$mlpa_persona_DISCAPACIDAD_RECORDAR ? : 'Si - No puede hacerlo',
                        'DISCAPACIDAD_CUIDADO_PROPIO' => $row[25], //!$mlpa_persona_DISCAPACIDAD_CUIDADO_PROPIO ? : 'Si - No puede hacerlo',
                        'DISCAPACIDAD_COMUNICAR' => $row[26], //!$mlpa_persona_DISCAPACIDAD_COMUNICAR ? : 'Si - No puede hacerlo',
                        */

                        'TELEFONO' => $row[23]
                    ]
                );

                $mlpa_persona = MLpaPersona::where([
                    'DOCUMENTO' => $documento_busqueda
                ])
                    ->first();

                if (is_object($row[26])) {
                    $fechabefore = collect($row[26])->get("date");
                } else {
                    $fechabefore = trim($row[26]);
                    $fechabefore = Carbon::createFromFormat('d/m/Y', $fechabefore);
                    $fechabefore = $fechabefore->toDateTimeString();
                }

                $FECHA_ATENCION = $fechabefore;

                if (isset($row[25]) && is_string($row[25])) {
                    $str = strtoupper($row[25]);
                    if (strpos($str, "COVID") !== false) {
                        $cod = "COVID19";
                    } else {
                        $cod = trim($row[25]);
                    }
                } else {
                    // Si $row[25] no es una cadena válida, asigna un valor por defecto
                    $cod = "DEFAULT_VALUE"; // Por ejemplo, un valor que indique que no se pudo procesar
                }
                //$cod = strpos(strtoupper($row[25]), "COVID") >= 0 ? "COVID19" : $row[25];
                $cod = strtoupper($row[25]);

                $body_lpas = MLpa::updateOrCreate(
                    [
                        // Campos usados para buscar si ya existe
                        'ID' => $row[0],
                    ],
                    [
                        "DONANTE" => $row[24],
                        "FECHA_ATENCION" => $FECHA_ATENCION,
                        "REPRESENTANTE" => $row[27],
                        "DOC_REPRESENTANTE" => $row[28],
                        "TIPO_TRANFERENCIA" => $row[29],
                        "MODO_ENTREGA" => $row[30],
                        "PROVEEDOR_FINANCIERO" => $row[31],
                        "MONTO_MENSUAL" => $row[32],
                        "FASE_ATENCION" => $row[33],

                        "STATUS" => $row[38],
                        "OBSERVATIONS" => $row[39],

                        //laura reemplzar por el id desde el token 5 en lcal 1 online
                        "ID_M_USUARIOS" => $ID_USER,

                        "COD_ACTIVIDAD" => $cod,
                        "FK_LPA_EMERGENCIA" => $mlpa_emergencia->ID,
                        "FK_LPA_PERSONA" => $mlpa_persona->ID,
                        "created_at" => Carbon::now(),
                        "id_migration" => $id_migration //$row[46] ?? 

                    ]
                );

                $i++;

                //echo ("i proceced: " . $i);

            }

            //dd("elementsForMigration", count($elementsForMigration), "body_lpas", count($body_lpas));
            //si es par dividir entre 2 sino entre 3 

            $divisor = 3;
            if (count($body_lpas) % 2 == 0) {
                $divisor = 2;
            }

            $body_lpas = ($body_lpas)->chunk(($lotes / $divisor));
            foreach ($body_lpas as $body) {
                $bodyArray = $body->toArray();
                MLpa::insert($bodyArray);
            }

            //eliminar los 350 primeros registros de $elementsForMigration
            $elementsForMigration->shift($lotes);

            $restante = json_encode(json_decode(json_encode($elementsForMigration), FALSE));

            $migrationPendings->table_id = $restante;

            $migrationPendings->save();

            $queryLpa = MLpa::all(); //whereBetween('created_at', [$date_begin, Carbon::now()->addDays(1)->format("Y-m-d H:i:s")]);// 
            $mlpas = $queryLpa; //->get();
            $id_lpas = $queryLpa->pluck('ID')->all();

            if (count($mlpas) > 0) {
                migrateCustom::create([
                    'table' => 'M_LPAS',
                    'table_id' => implode(", ", $id_lpas),
                    'file_ref' => '-',
                ]);
            } else {

                /* throw ValidationException::withMessages([
                    'msg' => ['No se guardaron los registros.'],
                ]); */
                return MLpa::get();
            }

            //array_push($id_emergenciasz, $mlpa_emergencia)
            //dd($mlpas->pluck('ID'),$id_lpas);

            $restanteTot = migrateCustom::where([
                ['table', 'M_LPAS'],
                ['table_id', '!=', '[]'],
                ['file_ref', 'PENDING']
            ])->get();

            return ['restanteParte' => count($elementsForMigration), 'restanteTotal' => count($restanteTot)];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
