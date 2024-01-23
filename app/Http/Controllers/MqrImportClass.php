<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\MMqr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MqrImportClass implements ToCollection
{
    //
    public function collection(Collection $rows)
    {
        $i = 0;

        $mrq = null;

        foreach ($rows as $row) {

            $countElement = count($row->filter()->all());

            if ($i <2 || !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16) {
                $i++;
                continue;
            }

            if(!is_numeric($row[3])){
                $i++;
                continue;
            }
            
            $date_in = Date::excelToDateTimeObject($row[3]);
            if($i>2) dd($row);

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

        }

        return $mrq;
    }

}
