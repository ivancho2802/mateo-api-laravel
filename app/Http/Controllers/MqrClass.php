<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MMqr;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\migrateCustom;
use Maatwebsite\Excel\Concerns\Importable;

class MqrClass implements ToCollection
{
    use Importable;
    //
    public function collection(Collection $rows)
    {
        $i = 0;

        $mrq = null;

        $id_mqr = [];

        $filtered = $rows->filter(function (object $value, int $key) {
            return $value[1] == "Organización que reporta";
        });

        $indexheader = $filtered->keys()[0] ?? 1;

        //dd("indexheader", $indexheader, $rows[$indexheader+1]);

        foreach ($rows as $row) {

            //$countElement = count($row->filter()->all());//|| !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16

            if ($i <  $indexheader) {
                $i++;
                continue;
            }

            // esta linea es por que la genio de liliana puso una fila por delante vacia pero solo debe pasar una vez COLUMNA
            $row->shift();
            //unset($row[0]);

            $row = $row->all();


            if (!is_numeric($row[3])) {
                $i++;
                continue;
            }

            $date_in = Date::excelToDateTimeObject($row[3]);

            $DATE_IN = $date_in; //date('d-m-Y', strtotime($date_birday));

            $exist = MMqr::where([
                'ORG_REPORT' => $row[0],
                'CONSECUTIVOS_CASES' =>  $row[1]
            ])->exists();

            if (!$exist)
                $mrq = MMqr::create([

                    'ORG_REPORT' => $row[0],
                    'CONSECUTIVOS_CASES' => $row[1],
                    'MONTH_REPORT' => $row[2],
                    'DATE_IN' => $DATE_IN, //3
                    //NEW
                    'TIPO_INTERVE' => $row[4],
                    //NEW
                    'COD_EMERGENCIA' => $row[5],
                    'CHANNEL_IN' => $row[6],
                    'CATEGORY' => $row[7],
                    'SUB_CATEGORY' => $row[8],
                    'THEME' => $row[9],
                    'ETNIA' => $row[10],
                    //NEW
                    'NACIONALIDAD' => $row[11],
                    'SEXO' => $row[12],
                    'RANGE_EDAD' => $row[13],
                    'DEPARTMENT' => $row[14],
                    'MUNICICIO' => $row[15],
                    'ADDRESS' => $row[16],
                    //NEW
                    'EDO' => $row[17],
                    'VALID' => $row[18],
                    //NEW
                    'DEVI_INTER' => $row[19],

                ]);

            $mrq = MMqr::where([
                'ORG_REPORT' => $row[0],
                'CONSECUTIVOS_CASES' =>  $row[1]
            ])->first();

            /* if(optional($mrq)->ID) {
                dd("mrq->ID", optional($mrq)->ID, $row[0], $row[1]);
            }else{
                dd("mrq->ID", optional($mrq)->ID, $row[0], $row[1]);
            } */

            $id_mqr[] = $mrq->ID;
        }

        migrateCustom::create([
            'table' => 'M_MQR',
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
