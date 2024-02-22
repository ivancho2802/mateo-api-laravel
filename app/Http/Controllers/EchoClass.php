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

        $id_echos_actividad = [];

        foreach ($rows as $row) { 
            
            if ($i == 0 || !$row[0]) {
                $i++;
                continue;
            }

            if($row[0]=="Beneficiarixs unicxs"){
                break;
            }

            $echo = EchoModel::firstOrCreate([
                'cod' => $row[0],
                'indicador' => $row[1],
                'ID_M_USUARIOS' => $ID_USER
            ]);

            $id_activities = [];
            $id_activities = explode('/', $row[2]);

            foreach ($id_activities as $id_activity) {

                $echo_actividad = EchoActivityModel::create([
                    'fk_echo' => $echo->cod,
                    'fk_activity' => rtrim(ltrim($id_activity)),
                    'ID_M_USUARIOS' => $ID_USER
                ]);
    
                $echos_actividad[] = $echo_actividad;
                $id_echos_actividad[] = $echo_actividad->get()->last()->id;

            }
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

