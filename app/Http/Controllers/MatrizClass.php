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

    public function collection(Collection $rows)
    {
        //DB::setDefaultConnection('pgsql');

        $i = 0;

        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        if (!$ID_USER) {
            return "error";
        }

        $matrizBase = [];

        foreach ($rows as $row) {

            if ($i == 0 || !$row || !$row[0] || !$row[26]) {
                $i++;
                continue;
            }
            array_push($matrizBase, ["description" => $row[26], "type" => $row[2] . ','. $row[3], "id" => null, "origin" => 'Afectacion_MAPAEI']);//$row[0]
        }

        Matriz::insert($matrizBase);

        return $matrizBase;
    }
}
