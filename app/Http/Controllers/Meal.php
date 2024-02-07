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

        $mlpas = MLpa::active()->paginate(10);

        $mlpas->load('emergencia');
        
        return $mlpas;
    }

    function getMqr(){
        $mmqrs = collect(MMqr::get())->groupBy('_ID')->paginate(10);

        return $mmqrs;
    }

    /**
     * pda
     */
    function geMpd(){
        $mmqrs = MKoboRespuestas::whereHas('formulario', function($q)
        {
            $q->where('ACCION', '=', "MPD");
        
        })
        ->select('_ID', 'ID')
        ->groupBy('_ID', 'ID')
        ->paginate(10);
         
        //$mmqrs = MFormulario::where(["ACCION" => "MPD"])->with('respuestas')->paginate(10);

        return $mmqrs;

    }


}
