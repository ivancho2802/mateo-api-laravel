<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\PaImportClass;
use App\Models\migrateCustom;
use App\Models\MLpa;
use App\Models\MLpaEmergencia;
use App\Models\MLpaPersona;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Auth;
use App\Models\Analisis;
use Illuminate\Support\Facades\Storage;

class PersonAttended extends Controller
{
    //
    function stored(Request $request){

        
        if($request->analisis && $request->month){
            $resulAlaisis = Analisis::updateOrCreate([
                "texto" => $request->analisis,
                "month" => $request->month,
                "type" => "LPA"
            ]);
            //return $resulAlaisis;

            if(!$request->file){
                
                $data['mlpas'] = [];

                $data['record_excel'] = 0;

                $data['record_saved'] = 0;

                //terminar devolver tabla
                return view('list-lpas', $data);
            }
        }

        ini_set('memory_limit', '2024M');
        set_time_limit(3000000);//0

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

        
        $mlpas = MLpa::
        orderBy('created_at', 'desc')
        ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] =  $mlpas;

        $data['record_excel'] = 1;

        $data['record_saved'] = 0;

        //terminar devolver tabla
        return view('list-lpas', $data);

        /* return migrateCustom::create([
            'table' => 'M_LPAS',
            'table_id' =>  $path,
            'file_ref' => 'UPLOADED',
        ]); */
        
    }

    function process(Request $request){
        $migration = migrateCustom::where([
            'table' => 'M_LPAS',
            'file_ref' => 'UPLOADED',
        ])->first();

        $file = Storage::path($migration->table_id);

        $import = new PaImportClass();

        $import->onlySheets('BD');

        // Process the Excel file
        Excel::import($import, $file);
        
        //get data excel
        //$collection = (new MlpasClass)->toCollection($file);

        //$collectExcel = $collection[2] ?? $collection[0];

        $count_record_excel = 0;//helper::countValidValues($collectExcel)

        $migrate_custom = migrateCustom::where([
            'table' => "M_LPAS"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        //$id_lpas = explode(", ", $migrate_custom->table_id);

        //$query_mlpas = MLpa::whereIn('ID', $id_lpas);//;
        $count_mlpas = 0;//count($query_mlpas->get());
        
        $mlpas = MLpa::
        orderBy('created_at', 'desc')
        ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] = $mlpas;

        $data['record_excel'] = $count_record_excel - 1;

        $data['record_saved'] = $count_mlpas;

        //terminar devolver tabla
        return view('list-lpas', $data);
        //return response()->json(["message" => "operacion hecha con exito"]);

        return $migration;//table_id
    }

    function refreshMigrations(Request $request){

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

        if(!isset($migrationPendings) || !isset($idTable)){
            return ['restante' => 0];
        }

        if(isset(optional($migrationPendings)->table_id)  !== true ){
            return ['restante' => strlen(optional($migrationPendings)->table_id)];
        }

        /*
            $migrationPendingsAll = $migrationPendings->get();
            if($migrationPendings->count() > 4){
            $migrationPendingsFirst = $migrationPendings->first();

            $migrationPendingsSecond = $migrationPendingsAll[1];
            $migrationPendingsThreed = $migrationPendingsAll[2];
            $migrationPendingsFourthed = $migrationPendingsAll[3];
    
            if(isset(optional($migrationPendingsFirst)->table_id)  !== true ){
                return ['restante' => strlen(optional($migrationPendingsFirst)->table_id)];
            }
    
            //4 unidos
    
            //dd("migrationPendings", strlen(optional($migrationPendings)->table_id));
    
            $stringArrayFirst = optional($migrationPendingsFirst)->table_id;
            $stringArraySecond = optional($migrationPendingsSecond)->table_id;
            $stringArrayThreed = optional($migrationPendingsThreed)->table_id;
            $stringArrayFourthed = optional($migrationPendingsFourthed)->table_id;
    
            $stringArrayFirstCollect = collect(json_decode($stringArrayFirst));
    
            $stringArraySecondCollect = collect(json_decode($stringArraySecond));
            $stringArrayThreedCollect = collect(json_decode($stringArrayThreed));
            $stringArrayFourthedCollect = collect(json_decode($stringArrayFourthed));
    
            $elementsForMigration = $stringArrayFirstCollect
            ->concat($stringArraySecondCollect)
            ->concat($stringArrayThreedCollect)
            ->concat($stringArrayFourthedCollect);
    
            //dd(count($elementsForMigration));//9568 7568

        } else { */
            $elementsForMigration = collect(json_decode($idTable));
        //}

        $elementsForMigrationChunked = $elementsForMigration->chunk(2000);

        $i = 0;
        $body_lpas = collect();

        foreach ($elementsForMigrationChunked[0] as $row) {
            /* if (!$row[0] || $row[0] == '') {
            break;
            } */
            //\DB::table('readings')->insert($chunk->toArray());
            /* if (!$row[0]) {
                $i++;
                continue;
            } */

            $mlpa_emergencia = MLpaEmergencia::firstOrCreate([

                'COD_EMERGENCIAS' => $row[0],
                'TIPO_EVENTO' => $row[1],
                'SOCIO' => $row[2],
                'DEPARTAMENTO' => $row[3],
                'MUNICIPIO' => $row[4],
                'LUGAR_ATENCION' => $row[5]

            ]);

            $date_birday = Date::excelToDateTimeObject($row[14]);

            $FECHA_NACIMIENTO = $date_birday; //date('d-m-Y', strtotime($date_birday));

            $mlpa_persona = MLpaPersona::where([
                //'TIPO_DOCUMENTO' => $row[7],
                'DOCUMENTO' => $row[6]
            ]);

            //actualizo
            if ($mlpa_persona->exists()) {

                $mlpa_persona->update(
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

                $mlpa_persona = $mlpa_persona->first();
                //creacion
            } else
            if ($mlpa_persona->exists() == false) {

                $mlpa_persona = MLpaPersona::create([
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
                ]);
            }

            $FECHA_ATENCION = Date::excelToDateTimeObject($row[31]);

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
                //"STATUS" => $row[41],

                //laura reemplzar por el id desde el token 5 en lcal 1 online
                "ID_M_USUARIOS" => $ID_USER,

                "FK_LPA_EMERGENCIA" => $mlpa_emergencia->get()->last()->ID,
                "FK_LPA_PERSONA" => $mlpa_persona->get()->last()->ID

            ]);

            if ($i == 1) {
                $date_begin = $mlpa_emergencia->get()->last()->created_at->format("Y-m-d") . " 00:00:01";
            }

            $date_end = $mlpa_emergencia->get()->last()->created_at->format("Y-m-d H:i:s");
            $i++;
        }
        //dd($date_begin, $date_end);

        $body_lpas = ($body_lpas)->chunk(600);
        foreach ($body_lpas as $body) {
            $bodyArray = $body->toArray();
            MLpa::insert($bodyArray);
        }

        //eliminar los 2000 primeros registros de $elementsForMigration
        $elementsForMigration->shift(2000);

        $restante = $elementsForMigration;

        $migrationPendings->table_id = json_encode($restante);

        $migrationPendings->save();

        $queryLpa = MLpa::all();//whereBetween('created_at', [$date_begin, Carbon::now()->addDays(1)->format("Y-m-d H:i:s")]);// 
        $mlpas = $queryLpa;//->get();
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

        return ['restante' => count($restante)];

        //return response()->json(["message" => "operacion hecha con exito"]);

    }
}
