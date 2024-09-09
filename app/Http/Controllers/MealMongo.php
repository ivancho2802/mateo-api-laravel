<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaMongo;
use Illuminate\Support\Facades\DB;

class MealMongo extends Controller
{
    //

    
    /**
     * emergencia
     * actividad
     * persona
     * tipo_lpa
     * -actividad.directory
     * 
     * 
     */

     function getLpaOnly(Request $request)
     {
 
        DB::setDefaultConnection('mongodb');
         $limit_minutes = 8000;
         ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
         ini_set('memory_limit', '902044M');
         set_time_limit($limit_minutes); //0
         ini_set('max_execution_time', '' . $limit_minutes . '');
         ini_set('max_input_time', '' . $limit_minutes . '');
 
         $mlpas = MLpaMongo::where("FECHA_ATENCION", ">=", "2023-01-01")
             //->where("FK_LPA_PERSONA", ">", "22270")
             //->nodeleted()
             ->get(); //where("FECHA_ATENCION", ">=", "2023-01-01")limit(60000)->
         //->groupBy('FECHA_ATENCION');
 
         return [
             "lpas" => $mlpas
         ];
     }

     function getLpaOnlyCount()
     {
        DB::setDefaultConnection('mongodb');
        $limit_minutes = 8000;
        ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
        ini_set('memory_limit', '902044M');
        set_time_limit($limit_minutes); //0
        ini_set('max_execution_time', '' . $limit_minutes . '');
        ini_set('max_input_time', '' . $limit_minutes . '');

        $mlpas = MLpaMongo::where("FECHA_ATENCION", ">=", "2023-01-01")
            //->where("FK_LPA_PERSONA", ">", "22270")
            ->nodeleted()
            ->get(); //where("FECHA_ATENCION", ">=", "2023-01-01")limit(60000)->
        //->groupBy('FECHA_ATENCION');

        return [
            "lpas" => count($mlpas)
        ];
     }
}
