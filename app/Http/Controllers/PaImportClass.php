<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PaImportClass implements ToCollection
{
    //
    public function collection(Collection $rows)
    {
        $i = 0;
        
        $mlpas = array();

        foreach ($rows as $row) {
            /* if (!$row[0] || $row[0] == '') {
                break;
            } */

            if ($i == 0) {
                $i++;
                continue;
            }

            $mlpa_emergencia = MLpaEmergencia::create([
                'cod_emergencia' => $row[0],
                'tipo_evento' => $row[1],
                "socio" => $row[2],
                'departamento' => $row[3],
                'municipio' => $row[4],
                'lugar_atencion' => $row[5]
            ]);

            $date_birday = Date::excelToDateTimeObject($row[14]);

            $fecha_nacimiento = $date_birday; //date('d-m-Y', strtotime($date_birday));

            $mlpa_persona = MLpaPersona::updateOrInsert(
                [
                    'tipo_documento' => $row[7],
                    'documento' => $row[6]
                ],
                [
                    'documento' => $row[6],
                    'tipo_documento' => $row[7],
                    'nombre_primero' => $row[8],
                    'nombre_otros' => $row[9],
                    'apellido_primero' => $row[10],
                    'apellido_otros' => $row[11],
                    'genero' => $row[12],
                    'identidad_genero' => $row[13],
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'nacionalidad' => $row[15],
                    'perfil_migratorio' => $row[16],
                    'situacion' => $row[17],
                    'etnia' => $row[18],
                    'perfil' => $row[19],
                    'nivel_escolaridad' => $row[20],
                    'caracteristica_madre' => $row[21],
                    'discapacidad_ver' => $row[22],
                    'discapacidad_oir' => $row[23],
                    'discapacidad_caminar' => $row[24],
                    'discapacidad_recordar' => $row[25],
                    'discapacidad_cuidadopropio' => $row[26],
                    'discapacidad_comunicar' => $row[27],
                    'telefono' => $row[28]
            ]);

            $fecha_atencion = Date::excelToDateTimeObject($row[31]);

            $mlpa = MLpa::create([

                "donante" => $row[29],
                "cod_actividad" => $row[30],
                "fecha_atencion" => $fecha_atencion,
                "representante" => $row[32],
                "doc_representante" => $row[33],
                "tipo_tranferencia" => $row[34],
                "modo_entrega" => $row[35],
                "proveedor_financiero" => $row[36],
                "monto_mensual" => $row[37],

                "fk_lpa_emergencia" => $mlpa_emergencia->id,
                "fk_lpa_persona" => $mlpa_persona->id

            ]);

            $mlpas[] = $mlpa;
        }

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
