<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MLpaFix;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\migrateCustom;
use Maatwebsite\Excel\Concerns\Importable;

class LpaFixClass implements ToCollection
{
    //
    use Importable;
    //
    public function collection(Collection $rows)
    {
        $i = 0;

        $lpasfix = null;

        $id_lpasfix = [];

        $filtered = $rows->filter(function (object $value, int $key) {
            return $value[1] == "Documento";
        });

        $indexheader = $filtered->keys()[0] ?? 1;

        //dd("indexheader", $indexheader, $rows[$indexheader+1]);

        foreach ($rows as $row) {

            //$countElement = count($row->filter()->all());//|| !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16

            if ($i <=  $indexheader ) {
                $i++;
                continue;
            }

            $row = $row->all();
            
            $lpasfix = MLpaFix::create([
                'documento' => $row[0],
                'sexo' => $row[1],
                'discapacidad' => $row[2],
                
            ]);

            $lpasfix = MLpaFix::where([
                'documento' => $row[0],
            ])->first();

            $id_mqr[] = $lpasfix->id;

        }

        migrateCustom::create([
            'table' => 'M_LPAS_FIX',
            'table_id' => implode(", ", $id_lpasfix),
            'file_ref' => '-',
        ]);

        return $lpasfix;
    }
}
