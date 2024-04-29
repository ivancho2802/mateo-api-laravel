<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\migrateCustom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;

class ActivityClass implements ToCollection
{
    //
    use Importable;

    public function collection(Collection $rows)
    {
        $i = 0;

        $activities = array();

        //FALTA TERMINAR SACAR DEL TOKEN
        $ID_USER = Auth::user()->id ?? Auth::user()->ID;

        dd($rows[1][0][0], $rows[1][0], $rows[1]);

        $id_activities = [];

        $sector = "";

        switch ($rows[1][0][0]) {
            case 'S':
                $sector = "SHELTER";
                break;
            case 'W':
                $sector = "WASH";
                break;
            case 'E':
                $sector = "EiE";
                break;
            case 'F':
                $sector = "SAN";
                break;
            case 'H':
                $sector = "SALUD";
                break;
            case 'P':
                $sector = "PROTECCIÓN";
                break;

            default:
                # code...
                break;
        }

        foreach ($rows as $row) {
            /* if (!$row[0] || $row[0] == '') {
                break;
            } */

            if ($i == 0 || !$row[0]) {
                $i++;
                continue;
            }

            $activity = Activities::insertOrIgnore([
                'sector' => $sector,
                'cod' => $row[0],
                'actividad' => $row[1],
                'ID_M_USUARIOS' => $ID_USER
            ]);
            dd("activity", $activity);

            if($activity > 0){

                $activity = Activities::where(['cod' => $row[0]]);

                if(!isset($activity)){
                    dd("activity", $activity);
                }

                $activities[] = $activity;
                $id_activities[] = $activity->get()->last()->id;
            }
        }
        //array_push($id_emergenciasz, $mlpa_emergencia)

        migrateCustom::create([
            'table' => 'activities',
            'table_id' => implode(", ", $id_activities),
            'file_ref' => '-',
        ]);

        return $activities;
    }
}
