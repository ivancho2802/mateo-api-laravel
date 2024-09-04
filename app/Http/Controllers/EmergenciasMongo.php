<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergenciaMongo;


class EmergenciasMongo extends Controller
{
    //

    function getEmergenciaByCod(Request $request){
        $emergencia = MLpaEmergenciaMongo::where("ID", "=", $request->ID)
        ->first();

        return [
            "emergencia" => $emergencia
        ];
    }
}
