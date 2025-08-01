<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matriz;
use App\Models\migrateCustom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatrizClass  implements ToCollection
{
    //
    use Importable;

    /* public function collection(Collection $rows)
    {
        //DB::setDefaultConnection('pgsql');

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000); //0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        $i = 0;

        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        if (!$ID_USER) {
            return "error";
        }

        $matrizBase = [];

        foreach ($rows as $row) {

            if ($i == 0 || !$row || !$row[0]) {
                $i++;
                continue;
            }
            array_push($matrizBase, ["description" => $row[26], "type" => $row[2] . ',' . $row[3], "id" => $row[0], "origin" => 'Afectacion_MAPAEI']);
        }

        $matrizBaseCollect = collect($matrizBase);

        $rowsChuck = $matrizBaseCollect->chunk(1000);

        //dd(($rowsChuck[1]));

        foreach ($rowsChuck as $body) {
            # code...
            $bodyArray = $body->toArray();
            //dd($bodyArray);
            Matriz::insert($bodyArray);
        }


        //Matriz::insert($matrizBase);

        return $matrizBase;
    } */

    public function collection(Collection $rows)
    {
        //DB::setDefaultConnection('pgsql');

        ini_set('memory_limit', '2044M');
        set_time_limit(3000000); //0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');

        $i = 0;

        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        if (!$ID_USER) {
            return "error";
        }

        $matrizBase = [];

        $filtered = $rows[0]->filter(function ( $value, int $key) {
            return $value == "description";
        });
        
        $indexheader = $filtered->keys()[0] ?? 26;
        
        $keys = $rows[0];

        foreach ($rows as $row) {

            if ($i == 0 || !$row || !$row[0]) {
                $i++;
                continue;
            }

            $allRows = '[';

            for ($i = 5; $i < 21; $i++) {
                # code...
                if (isset($keys[$i])){
                    $allRows .= '"' . $keys[$i] . '"=>"' .  $row[$i] . '",';
                }
            }
            $allRows .= ']';

            array_push($matrizBase, ["description" => $row[$indexheader], "type" => $row[2] . ',' . $row[2], "id" => $row[0], "origin" => 'matriz_' . $row[3], "otros" => $allRows]);
        }

        $matrizBaseCollect = collect($matrizBase);

        $rowsChuck = $matrizBaseCollect->chunk(1000);

        //dd(($rowsChuck[1]));

        foreach ($rowsChuck as $body) {
            # code...
            $bodyArray = $body->toArray();
            //dd($bodyArray);
            Matriz::insert($bodyArray);
        }


        //Matriz::insert($matrizBase);

        return $matrizBase;
    }
}
