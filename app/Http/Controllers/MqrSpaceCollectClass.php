<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MqrSpaces;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\migrateCustom;
use Maatwebsite\Excel\Concerns\Importable;

class MqrSpaceCollectClass implements ToCollection
{
    use Importable;
    //
    public function collection(Collection $rows)
    {
        $i = 0;

        $mrq = null;

        $id_mqr = [];

        $filtered = $rows->filter(function (object $value, int $key) {
            return $value[1] == "Fecha de ingreso (D/M/A)";
        });

        $indexheader = $filtered->keys()[0] ?? 1;

        //dd("indexheader", $indexheader, $rows[$indexheader+1]);

        foreach ($rows as $row) {

            //$countElement = count($row->filter()->all());//|| !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16

            if ($i <  $indexheader ) {
                $i++;
                continue;
            }
            
            $date_in = Date::excelToDateTimeObject($row[0]);

            $DATE_IN = $date_in; //date('d-m-Y', strtotime($date_birday));
            
            $mrq = MqrSpaces::create([
                'date_entry' => $DATE_IN,
                'org_report' => $row[1],
                'type_act' => $row[2],
                'departamento' => $row[3],
                'municipio' => $row[4],
                'women' => $row[5],
                'men' => $row[6],
            ]);

            $mrq = MqrSpaces::get()->last();

            $id_mqr[] = $mrq->ID;

        }

        migrateCustom::create([
            'table' => 'mqr_spaces',
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
