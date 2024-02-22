<?php

namespace App\Http\Controllers;

use App\Models\EchoModel;
use App\Models\EchoActivityModel;
use App\Models\migrateCustom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;

class EchoClass implements ToCollection
{
    //
    use Importable;

    public function collection(Collection $rows)
    {
        $i = 0;

        $echos = array();

        //FALTA TERMINAR SACAR DEL TOKEN
        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        dd($ID_USER, Auth::user());

        $id_echos_actividad = [];

        foreach ($rows as $row) { 
            
            if ($i == 0 || !$row[0]) {
                $i++;
                continue;
            }

            $echo = EchoModel::create([
                'cod' => $row[0],
                'indicador' => $row[1],
                'ID_M_USUARIOS' => $ID_USER
            ]);

            $echo_actividad = EchoActivityModel::create([
                'fk_echo' => $echo->id,
                'fk_activity' => $row[2],
                'ID_M_USUARIOS' => $ID_USER
            ]);

            $echos_actividad[] = $echo_actividad;
            $id_echos_actividad[] = $echo_actividad->get()->last()->id;
        }
        //array_push($id_emergenciasz, $mlpa_emergencia)

        migrateCustom::create([
            'table' => 'echos_actividad',
            'table_id' => implode(", ", $id_echos_actividad),
            'file_ref' => '-',
        ]);

        return $echos;
    }
}

