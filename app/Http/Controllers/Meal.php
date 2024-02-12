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

    function getLpa(Request $request)
    {
        if ($request->pagination) {
            $mlpas = MLpa::paginate(10);
        } else {
            $mlpas = MLpa::get();
        }

        $mlpas->load('emergencia');

        return $mlpas;
    }

    function getMqr(Request $request)
    {

        if ($request->pagination) {
            $mmqrs = MMqr::paginate(7);
        } else {
            $mmqrs = MMqr::all();
        }

        return $mmqrs;
    }

    /**
     * pda
     */
    function geMpd(Request $request)
    {

        $mmpds = MKoboRespuestas::whereHas('formulario', function ($q) {
            $q->where('ACCION', '=', "MPD");
        })
            ->get()
            ->groupBy('_ID');

        if ($request->pagination) {
            $mmpdsArray = $this->paginateCollection($mmpds, 10);
        }else {
            $mmpdsArray = $mmpds;
        }

        return  $mmpdsArray;
    }
}
