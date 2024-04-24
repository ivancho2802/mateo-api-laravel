<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\activitiesDirectories;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\migrateCustom;
use Maatwebsite\Excel\Concerns\Importable;

class MlpasActivityClass  implements ToCollection
{
    //
    use Importable;
    //
    public function collection(Collection $rows)
    {
        $i = 0;

        $lpaactivity = null;

        $id_lpaactivities = [];

        $filtered = $rows->filter(function (object $value, int $key) {
            return $value[0] == "CÓDIGO";
        });

        $indexheader = $filtered->keys()[0] ?? 1;

        foreach ($rows as $row) {

            $countElement = count($row->filter()->all());//|| !$row[0] || !$row[1] || $countElement < 15 || $countElement > 16

            if ($i <=  $indexheader ) {
                $i++;
                continue;
            }
            
            $lpaactivity = activitiesDirectories::create([

                'cod_actividad' => $row[0],
                'sectores_echo' => $row[3],
                'indicadores_echo' => $row[4],
                'sectores_bha' => $row[5],
                'indicadores_bha' => $row[6],
                'sectores_aecid' => $row[7],
                'indicadores_aecid' => $row[8],
                'type_asistence_kind_cash_services' => $row[10],
                'fase' => $row[11],
                
            ]);

            $id_lpaactivities[] = $lpaactivity->get()->last()->id;

        }

        migrateCustom::create([
            'table' => 'actividades_directory',
            'table_id' => implode(", ", $id_lpaactivities),
            'file_ref' => '-',
        ]);

        return $lpaactivity;
    }
}
