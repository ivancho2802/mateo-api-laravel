<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MqrCaminos;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\migrateCustom;
use Maatwebsite\Excel\Concerns\Importable;

class MqrCaminoMireClass implements ToCollection
{
    use Importable;
    //
    public function collection(Collection $rows)
    {
        $i = 0;

        $mrq = null;

        $id_mqr = [];

        $filtered = $rows->filter(function (object $value, int $key) {
            return $value[1] == "Fecha (D/M/A)";
        });

        $indexheader = $filtered->keys()[0] ?? 1;

        //dd("indexheader", $indexheader, $rows[$indexheader+1]);

        foreach ($rows as $row) {

            //$countElement = count($row->filter()->all());//|| !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16

            if ($i <  $indexheader ) {
                $i++;
                continue;
            }

            dd(">>>>>", $row[0], $indexheader, $i);
            
            $date_in = Date::excelToDateTimeObject($row[0]);

            $DATE_IN = $date_in; //date('d-m-Y', strtotime($date_birday));
            
            $mrq = MqrCaminos::create([
                'fecha' => $DATE_IN,
                'mes' => $row[1],
                'organizacion' => $row[2],
                'tipo_intervencion' => $row[3] ,
                'codigo' => $row[4],
                'departamento' => $row[5],
                'municipio' => $row[6],
                'comunidad' => $row[7],
                'ninas' => $row[8],
                'ninos' => $row[9],
                'mujeres' => $row[10],
                'hombres' => $row[11],
                'hallazgos_programaticos' => $row[12],
                'recomendaciones_programaticas' => $row[13],
                'primer_contacto_alegría' => $row[14],
                'primer_contacto_aburrimiento' => $row[15],
                'primer_contacto_tristeza' => $row[16],
                'primer_contacto_enojo' => $row[17],
                'primer_contacto_NS_NR' => $row[18],
                'presentacion_MIRE_alegría' => $row[19],
                'presentacion_MIRE_aburrimiento' => $row[20],
                'presentacion_MIRE' => $row[21],
                'enojo' => $row[22],
                'NS_NR' => $row[23],
                'alegría' => $row[24],
                'aburrimiento' => $row[25],
                'presentacion_MIRE_tristeza' => $row[26],
                'presentacion_MIRE_enojo' => $row[27],
                'presentacion_MIRE_NS_NR' => $row[28],
                'finalizacion_atencion_alegría' => $row[29],
                'finalizacion_atencion_aburrimiento' => $row[30],
                'finalizacion_atencion_tristeza' => $row[31],
                'finalizacion_atencion_enojo' => $row[32],
                'finalizacion_atencion_NS_NR' => $row[33]
            ]);

            $mrq = MqrCaminos::get()->last();

            $id_mqr[] = $mrq->ID;

        }

        migrateCustom::create([
            'table' => 'mqr_caminos',
            'table_id' => implode(", ", $id_mqr),
            'file_ref' => '-',
        ]);

        return $mrq;
    }

    public function collectionSize(Collection $rows)
    {
        return $rows;
    }
    
}
