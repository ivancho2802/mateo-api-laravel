<?php

namespace App\Http\Controllers;

//
use App\Models\Activities;
use App\Models\migrateCustom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;
use App\Traits\TraitDepartments;

class ActivityClass implements ToCollection
{
    //
    use Importable, TraitDepartments;

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
            case 'S':
            case 'CS':
                $sector = "SHELTER";
                break;
            case 'W':
            case 'CW':
                $sector = "WASH";
                break;
            case 'E':
            case 'CE':
                $sector = "EiE";
                break;
            case 'F':
            case 'CF':
                $sector = "SAN";
                break;
            case 'H':
            case 'CH':
                $sector = "SALUD";
                break;
            case 'P':
            case 'CP':
                $sector = "PROTECCION";
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

            $search = '' . $row[0] . '';

            $activity = Activities::where('cod', ($search))->first();

            if (isset($activity)) {

                $activity = $activity->update([
                    'sector' => $sector,
                    'cod' => $row[0],
                    'actividad' => $this->eliminar_acentos(($row[1])),
                    'ID_M_USUARIOS' => $ID_USER
                ]);
                
                /* $activity->sector =  $sector;
                $activity->cod = $row[0];
                $activity->actividad =  $this->eliminar_acentos(helper::convert_from_latin1_to_utf8_recursively($row[1]));
                $activity->ID_M_USUARIOS = $ID_USER;
                $activity->save(); */

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

                $activity = Activities::where(['cod' => $search])->first();

                if (!isset($activity)) {
                    dd("activity", $activity);
                }

                $activities[] = $activity;
                $id_activities[] = $activity->id;
            }
        }
        //dd("===", $id_activities);
        //array_push($id_emergenciasz, $mlpa_emergencia)

        migrateCustom::create([
            'table' => 'activities',
            'table_id' => implode(", ", $id_activities),
            'file_ref' => '-',
        ]);

        return $activities;
    }
}
