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

        $letterBegin = preg_replace('/[0-9]+/', '', $rows[1][0]);

        $id_activities = [];

        $sector = "";

        switch ($letterBegin) {
            case 'S' || 'CS':
                $sector = "SHELTER";
                break;
            case 'W' || 'CW':
                $sector = "WASH";
                break;
            case 'E' || 'CE':
                $sector = "EiE";
                break;
            case 'F' || 'CF':
                $sector = "SAN";
                break;
            case 'H' || 'CH':
                $sector = "SALUD";
                break;
            case 'P' || 'CP':
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

            $activity = Activities::where(['cod' => $row[0]])->first();

            if (isset($activity)) {

                $activity->sector =  $sector;
                $activity->cod = $row[0];
                $activity->actividad = $row[1];
                $activity->ID_M_USUARIOS = $ID_USER;
                $activity->save();
            } else {
                $activity = Activities::create([
                    'sector' => $sector,
                    'cod' => $row[0],
                    'actividad' => $row[1],
                    'ID_M_USUARIOS' => $ID_USER
                ]);
            }

            $activity = helper::convert_from_latin1_to_utf8_recursively($activity);

            if (isset($activity)) {

                $activity = Activities::where(['cod' => $row[0]])->first();

                if (!isset($activity)) {
                    dd("activity", $activity);
                }

                $activities[] = $activity;
                $id_activities[] = $activity->id;
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
