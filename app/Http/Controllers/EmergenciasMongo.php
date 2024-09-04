<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergenciaMongo;
use Illuminate\Support\Facades\DB;

class EmergenciasMongo extends Controller
{
    //

    function getEmergenciaByCod(Request $request){
        DB::setDefaultConnection('mongodb');
        $emergencia = MLpaEmergenciaMongo::where("ID", "=", $request->ID)
        ->first();

        return [
            "emergencia" => $emergencia
        ];
    }
}
