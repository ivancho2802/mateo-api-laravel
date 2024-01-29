<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;
use App\Models\MMqr;
use App\Models\MFormulario;
use App\Models\MKoboRespuestas;

class Meal extends Controller
{
    //
    function getLpa(){

        $mlpas = MLpa::active()->get();

        return $mlpas;
    }

    function getMqr(){
        $mmqrs = MMqr::get();

        return $mmqrs;
    }

    /**
     * pda
     */
    function geMpd(){
        $mmqrs = MKoboRespuestas::whereHas('formulario', function($q)
        {
            $q->where('ACCION', '=', "MPD");
        
        })->paginate(10);
         
        //$mmqrs = MFormulario::where(["ACCION" => "MPD"])->with('respuestas')->paginate(10);

        return $mmqrs;

    }
}
