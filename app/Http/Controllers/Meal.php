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
    public function paginateCollection($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator(array_values($items->forPage($page, $perPage)->toArray()), $items->count(), $perPage, $page, $options);
        //ref for array_values() fix: https://stackoverflow.com/a/38712699/3553367
    }

    function getLpa(){

        $mlpas = MLpa::active()->paginate(10);

        $mlpas->load('emergencia');
        
        return $mlpas;
    }

    function getMqr(){
        $mmqrs = MMqr::paginate(10);

        return $mmqrs;
    }

    /**
     * pda
     */
    function geMpd(){
        $mmpds = MKoboRespuestas::whereHas('formulario', function($q)
        {
            $q->where('ACCION', '=', "MPD");
        
        })
        ->get()
        ->groupBy('_ID');

        $mmpdsArray = $this->paginateCollection($mmpds, 10);

        return  $mmpdsArray;

    }


}
