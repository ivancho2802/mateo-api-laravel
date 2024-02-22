<?php

namespace App\Http\Controllers;

use App\Models\BhaModel;
use App\Models\BhaActivityModel;
use App\Models\migrateCustom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;

class BhaClass implements ToCollection
{
    //
    use Importable;

    public function collection(Collection $rows)
    {
        $i = 0;

        $bhas = array();

        //FALTA TERMINAR SACAR DEL TOKEN
        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        $id_bhas_actividad = [];

        foreach ($rows as $row) { 
            
            if ($i == 0 || !$row[0]) {
                $i++;
                continue;
            }

            if($row[0]=="Beneficiarixs unicxs"){
                break;
            }

            $bha = BhaModel::firstOrCreate([
                'cod' => $row[0],
                'indicador' => $row[1],
                'ID_M_USUARIOS' => $ID_USER
            ]);

            $id_activities = [];
            $id_activities = explode('/', $row[2]);

            foreach ($id_activities as $id_activity) {

                $bha_actividad = BhaActivityModel::create([
                    'fk_bha' => $bha->cod,
                    'fk_activity' => rtrim(ltrim($id_activity)),
                    'ID_M_USUARIOS' => $ID_USER
                ]);
    
                $bhas_actividad[] = $bha_actividad;
                $id_bhas_actividad[] = $bha_actividad->get()->last()->id;

            }
        }
        //array_push($id_emergenciasz, $mlpa_emergencia)

        migrateCustom::create([
            'table' => 'bha_activity',
            'table_id' => implode(", ", $id_bhas_actividad),
            'file_ref' => '-',
        ]);

        return $bhas;
    }
}
