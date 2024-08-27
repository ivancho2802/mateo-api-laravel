<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalisisMongo;
use App\Models\migrateCustomMongo;
use App\Models\MLpaMongo;
use App\Jobs\LpaJobMongoProcess;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Auth;
use App\Jobs\LpaJobMongoRefreshMigrations;
use App\Models\MLpaEmergenciaMongo;
use App\Models\MLpaPersonaMongo;

use Illuminate\Support\Facades\DB;

class PersonAttendedMongo extends Controller
{
    //
    function stored(Request $request)
    {
        DB::setDefaultConnection('mongodb');

        if ($request->analisis && $request->month) {
            $resulAlaisis = AnalisisMongo::updateOrCreate([
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

        migrateCustomMongo::create([
            'table' => 'M_LPAS',
            'table_id' =>  $path,
            'file_ref' => 'UPLOADED',
        ]);

        $mlpas = MLpaMongo::orderBy('created_at', 'desc')
            ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] =  $mlpas;

        $data['record_excel'] = 1;

        $data['record_saved'] = 0;

        //crear job para ejecutar la funcion de process
        LpaJobMongoProcess::dispatch(); //->onConnection('database');

        //terminar devolver tabla
        return view('list-lpas', $data);
    }


    public function process(?Request $request)
    {
        DB::setDefaultConnection('mongodb');

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000); //0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        $migration = migrateCustomMongo::where([
            'table' => 'M_LPAS',
            'file_ref' => 'UPLOADED',
        ])->first();

        $file = Storage::path($migration->table_id);

        $sheets = (new FastExcel)->withSheetsNames()->importSheets($file);

        $result = (new MlpasMongoClass)->collection(collect($sheets['BD']));

        //dd($result);

        /* $import = new PaImportClass();

        $import->onlySheets('BD');

        // Process the Excel file
        Excel::import($import, $file); */

        $migration->file_ref = 'PROCECED';

        $migration->save();

        //get data excel
        //$collection = (new MlpasClass)->toCollection($file);

        //$collectExcel = $collection[2] ?? $collection[0];

        $count_record_excel = 0; //helper::countValidValues($collectExcel)

        $migrate_custom = migrateCustomMongo::where([
            'table' => "M_LPAS"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        //$id_lpas = explode(", ", $migrate_custom->table_id);

        //$query_mlpas = MLpa::whereIn('ID', $id_lpas);//;
        $count_mlpas = 0; //count($query_mlpas->get());

        $mlpas = MLpaMongo::orderBy('created_at', 'desc')
            ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] = $mlpas;

        $data['record_excel'] = $count_record_excel;

        $data['record_saved'] = $count_mlpas;

        //se procesa el refresh
        LpaJobMongoRefreshMigrations::dispatch(); //->onConnection('database');
        
        //terminar devolver tabla
        return view('list-lpas', $data);
        //return response()->json(["message" => "operacion hecha con exito"]);

        return $migration; //table_id
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
        DB::setDefaultConnection('mongodb');

        if (!$ID_USER) {
            return "error";
        }

        $migrationPendings = migrateCustomMongo::where([
            ['table', 'M_LPAS'],
            ['table_id', '!=', '[]'],
            ['file_ref', 'PENDING']
        ])->first();

        $idTable = optional($migrationPendings)->table_id;

        if (!isset($migrationPendings) || !isset($idTable)) {
            return ['restante' => 0];
        }

        if (isset(optional($migrationPendings)->table_id)  !== true) {
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

            $mlpa_emergencia = MLpaEmergenciaMongo::firstOrCreate(
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
                $mlpa_emergencia = MLpaEmergenciaMongo::where([
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

            $mlpa_persona = MLpaPersonaMongo::firstOrCreate(
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
                    'DISCAPACIDAD_VER' => $row[22],
                    'DISCAPACIDAD_OIR' => $row[23],
                    'DISCAPACIDAD_CAMINAR' => $row[24],
                    'DISCAPACIDAD_RECORDAR' => $row[25],
                    'DISCAPACIDAD_CUIDADO_PROPIO' => $row[26],
                    'DISCAPACIDAD_COMUNICAR' => $row[27],
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
                $mlpa_persona = MLpaPersonaMongo::where([
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
            MLpaMongo::insert($bodyArray);
        }

        //eliminar los 350 primeros registros de $elementsForMigration
        $elementsForMigration->shift($lotes);

        $restante = json_encode(json_decode(json_encode($elementsForMigration), FALSE));

        $migrationPendings->table_id = $restante;

        $migrationPendings->save();

        $queryLpa = MLpaMongo::all(); //whereBetween('created_at', [$date_begin, Carbon::now()->addDays(1)->format("Y-m-d H:i:s")]);// 
        $mlpas = $queryLpa; //->get();
        $id_lpas = $queryLpa->pluck('ID')->all();

        if (count($mlpas) > 0) {
            migrateCustomMongo::create([
                'table' => 'M_LPAS',
                'table_id' => implode(", ", $id_lpas),
                'file_ref' => '-',
            ]);
        } else {

            /* throw ValidationException::withMessages([
                'msg' => ['No se guardaron los registros.'],
            ]); */
            return MLpaMongo::get();
        }

        //array_push($id_emergenciasz, $mlpa_emergencia)
        //dd($mlpas->pluck('ID'),$id_lpas);

        $restanteTot = migrateCustomMongo::where([
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

    

    function checked(Request $request)
    {

        $migration = migrateCustomMongo::where([
            'table' => 'M_LPAS',
            'file_ref' => 'UPLOADED',
        ])->first();

        if(!isset($migration)){
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
}
