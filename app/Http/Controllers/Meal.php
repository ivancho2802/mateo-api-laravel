<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MLpaEmergencia;
use App\Models\MLpa;
use App\Models\MLpaPersona;
use App\Models\MMqr;
use App\Models\MFormulario;
use App\Models\MKoboRespuestas;
use App\Models\Activities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $mlpas = MLpa::paginate(5);
            $mlpas->load(['emergencia', 'actividad']);
            return $mlpas;
        } else {
            $mlpas = MLpa::get();
        }

        $mlpas->load(['emergencia', 'actividad']);

        DB::setDefaultConnection('firebird');

        $erns = DB::select("SELECT NOMBRE_FORMULARIO FROM V_M_KOBO_FORMULARIOS WHERE ID_M_FORMULARIOS = '0012';");

        return [
            "lpas" => $mlpas,
            "erns" => $erns
        ];
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
        } else {
            $mmpdsArray = $mmpds;
        }

        return  $mmpdsArray;
    }

    function getActivity(Request $request)
    {
        $activities = Activities::get();

        return  $activities;
    }

    function setActivity(Request $request)
    {

        $data = $request->all();
        $data['sector'] = $request->sector;
        $data['cod'] = $request->cod;
        $data['actividad'] = $request->actividad;
        $data['ID_M_USUARIOS'] = Auth::user()->id ?? Auth::user()->ID;

        $activities = Activities::create($data);

        return  $activities;
    }
}
