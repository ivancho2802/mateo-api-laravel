<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\migrateCustom;
use Maatwebsite\Excel\Concerns\Importable;

class MlpasClass implements ToCollection
{
    use Importable;
    
    public function collection(Collection $rows)
    {
        $i = 0;

        $mlpas = array();

        //FALTA TERMINAR SACAR DEL TOKEN
        $ID_USER = 1;

        $id_lpas = [];

        foreach ($rows as $row) {
            /* if (!$row[0] || $row[0] == '') {
                break;
            } */

            if ($i == 0 || !$row[0]) {
                $i++;
                continue;
            }
            
            $mlpa_emergencia = MLpaEmergencia::create([
                
                'COD_EMERGENCIAS' => $row[0],
                'TIPO_EVENTO' => $row[1],
                'SOCIO' => $row[2],
                'DEPARTAMENTO' => $row[3],
                'MUNICIPIO' => $row[4],
                'LUGAR_ATENCION' => $row[5]

            ]);

            //dd($mlpa_emergencia->get()->last()->ID);

            //ojo esto actualiza o crea una
            /* $mlpa_emergencia = new MLpaEmergencia;
            
            $mlpa_emergencia->COD_EMERGENCIAS = $row[0];
            $mlpa_emergencia->TIPO_EVENTO = $row[1];
            $mlpa_emergencia->SOCIO = $row[2];
            $mlpa_emergencia->DEPARTAMENTO = $row[3];
            $mlpa_emergencia->MUNICIPIO = $row[4];
            $mlpa_emergencia->LUGAR_ATENCION = $row[5];
            
            $mlpa_emergencia->save();

            $mlpa_emergencia = $mlpa_emergencia->first(); 
            */

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
            }else
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

            $mlpa = MLpa::create([

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

                "FK_LPA_EMERGENCIA" => $mlpa_emergencia->get()->last()->ID,
                "FK_LPA_PERSONA" => $mlpa_persona->get()->last()->ID

            ]);

            //dd($mlpa);

            $mlpas[] = $mlpa;
            $id_lpas[] = $mlpa->get()->last()->ID;
        }
        //array_push($id_emergenciasz, $mlpa_emergencia)

        migrateCustom::create([
            'table' => 'M_LPAS',
            'table_id' => implode(", ", $id_lpas),
            'file_ref' => '-',
        ]);

        return $mlpas;
    }

    public function formatBirdday($date_birday)
    {

        $date_birday_formated = $date_birday;

        switch ($date_birday) {
            case str_contains($date_birday, '/'):
                # code...
                $date_birday_formated = str_replace('/', '-', $date_birday);

                break;

            default:
                # code...
                break;
        }

        return $date_birday_formated;
    }

    /* public function model(array $row)
    {
        // Define how to create a model from the Excel row data
        $Contact = new DContactos;
     
        $Contact->ID_D_CONTACTOS = $row[0];
        $Contact->ID_M_USUARIOS = $row[1];
        
        $Contact->save();
    
        return $Contact->get();
    } */
}
