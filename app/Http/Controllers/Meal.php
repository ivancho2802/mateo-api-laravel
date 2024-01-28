<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;
use App\Models\MMqr;
use App\Models\MFormularios;


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
        $mmqrs = MFormularios::where(["ACCION" => "MPD"])->paginate(10);

        return $mmqrs;

    }
}
