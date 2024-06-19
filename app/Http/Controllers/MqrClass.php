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
            return $value[0] == "Organización que reporta";
        });

        $indexheader = $filtered->keys()[0] ?? 1;

        foreach ($rows as $row) {

            $countElement = count($row->filter()->all());//|| !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16

            if ($i <=  $indexheader ) {
                $i++;
                continue;
            }

            if(!is_numeric($row[3])){
                $i++;
                continue;
            }
            
            $date_in = Date::excelToDateTimeObject($row[3]);

            $DATE_IN = $date_in; //date('d-m-Y', strtotime($date_birday));
            
            $mrq = MMqr::create([

                'ORG_REPORT' => $row[0],
                'CONSECUTIVOS_CASES' => $row[1],
                'MONTH_REPORT' => $row[2],
                'DATE_IN' => $DATE_IN,
                'CHANNEL_IN' => $row[4],
                'CATEGORY' => $row[5],
                'SUB_CATEGORY' => $row[6],
                'THEME' => $row[7],
                'ETNIA' => $row[8],
                'SEXO' => $row[9],
                'RANGE_EDAD' => $row[10],
                'DEPARTMENT' => $row[11],
                'MUNICICIO' => $row[12],
                'ADDRESS' => $row[13],
                'VALID' => $row[14],
                'RECIVE' => $row[15]
                
            ]);

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
