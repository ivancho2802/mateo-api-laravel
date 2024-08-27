<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\migrateCustomMongo;

class MlpasMongoClass extends Controller
{
    //
    
    public function collection(Collection $rows)
    {
        try {
            //code...
            $i = 0;

            $mlpas = array();

            //FALTA TERMINAR SACAR DEL TOKEN
            $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

            $id_lpas = [];

            $body_lpas = collect();

            $date_begin = "";
            $date_end = "";
            /* 
            $filtered = $rows->filter(function ( $value,  $key) {
                //echo "value". $value. $key;
                return $key == "Codigo de la emergencia";
            });

            $indexheader = $filtered->keys()[0] ?? 1;

            dd($indexheader);333
            
            if ($indexheader == 0) { */
                //$rows->shift();
                /* } */
                //333 el cero son las cabeceras
            //dd("count rows", count($rows->all()), $rows[0]);

            $rowsChuck = $rows->chunk(1000);

            foreach ($rowsChuck as $body) {
                # code...
                $bodyArray = $body->toArray();
                //dd("count rows", count($bodyArray));333

                $mlpas = migrateCustomMongo::create([
                    'table' => 'M_LPAS',
                    'table_id' =>  json_encode($bodyArray),
                    'file_ref' => 'PENDING',
                ]);
            }

            /* 
            $body_lpas = ($body_lpas)->chunk(600);
            foreach ($body_lpas as $body) {
                $bodyArray = $body->toArray();
                MLpa::insert($bodyArray);
            } */

            //echo "rows" . count($rows);

            return $mlpas;


            /* foreach ($rows as $row) {
                // if (!$row[0] || $row[0] == '') {
                //break;
                //\DB::table('readings')->insert($chunk->toArray());

                if (!$row[0]) {
                    $i++;
                    continue;
                }

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
                    'TIPO_DOCUMENTO' => $row[7],
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

                    //laura reemplzar por el id desde el token 5 en lcal 1 online
                    "ID_M_USUARIOS" => $ID_USER,

                    "FK_LPA_EMERGENCIA" => $mlpa_emergencia->ID,
                    "FK_LPA_PERSONA" => $mlpa_persona->ID

                ]);

                if ($i == 1) {
                    $date_begin = $mlpa_emergencia->created_at->format("Y-m-d") . " 00:00:01";
                }

                $date_end = $mlpa_emergencia->created_at->format("Y-m-d H:i:s");
                $i++;
            }
            //dd($date_begin, $date_end);

            $body_lpas = ($body_lpas)->chunk(600);
            foreach ($body_lpas as $body) {
                $bodyArray = $body->toArray();
                MLpa::insert($bodyArray);
            }

            //dd(MLpa::get());

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

                //throw ValidationException::withMessages([
                //    'msg' => ['No se guardaron los registros.'],
                //]);
                return MLpa::get();
            }

            //array_push($id_emergenciasz, $mlpa_emergencia)
            //dd($mlpas->pluck('ID'),$id_lpas);
            return $mlpas; */
        } catch (\Throwable $th) {

            throw ValidationException::withMessages([
                'msg' => ['No se guardaron los registros.' . ($th)],
            ]);
        }
    }
}
