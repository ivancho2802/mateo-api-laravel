<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;

class Meal extends Controller
{
    //
    function get(){

        $mlpas = MLpa::active()->get();

        return $mlpas;
    }
}
