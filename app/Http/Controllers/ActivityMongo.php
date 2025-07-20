<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivitiesMongo;
use Illuminate\Support\Facades\DB;

class ActivityMongo extends Controller
{
    //

    function getActividadByCod(Request $request){
        DB::setDefaultConnection('mongodb');
        $activity = ActivitiesMongo::where("cod", "=", $request->cod);

        return [
            "actividad" => $activity->first()
        ];
    }
}
