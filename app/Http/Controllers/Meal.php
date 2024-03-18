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
use App\Models\Analisis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

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
            $mlpas = MLpa::where("FECHA_ATENCION", ">=", "2024-01-01")->paginate(5);
            $mlpas->load(['emergencia', 'actividad']);
            return $mlpas;
        } else {
            $mlpas = MLpa::where("FECHA_ATENCION", ">=", "2024-01-01")->get();
        }

        //PONER LA PERSONA CON SU EDAD
        //=SI($O2="";"";SI(SIFECHA($O2;Lista!$V$2;"y")=122;"";SIFECHA($O2;Lista!$V$2;"y")))
        //PONER QUE SALGA LA FECHA
        //"Rango ECHO"
        //=SI(AM2="";"";SI(AM2<=5;"0 to 5";SI(AM2<=17;"6 to 17";SI(AM2<=49;"18 to 49";SI(AM2>=50;"> 50")))))
        //"Rango BHA"
        //=SI(AM2="";"";SI(AM2<=4;"0 to 4";SI(AM2<=9;"5 to 9";SI(AM2<=14;"10 to 14";SI(AM2<=18;"15 to 18";SI(AM2<=29;"19 to 29";SI(AM2<=59;"30 to 59";SI(AM2>=60;"> 60"))))))))

        $mlpas->load(['emergencia', 'actividad', 'persona']);

        /* DB::setDefaultConnection('odbc');

        $erns = DB::select("SELECT 
        ID_M_KOBO_FORMULARIOS,
        ID_M_USUARIOS,        
        FECHA,   
        FECHA_REGISTRO,  
        ID, 
        ESTATUS,     
        ID_M_FORMULARIOS, 
        FECHA_FORMULARIO,
        UID, 
        FUID, 
        NOMBRE_FORMULARIO, 
        GRUPO, 
        NOMBRE_ESTATUS, 
        NOMBRE_USUARIO, 
        FECHA_ESTADISTICA, 
        REGION,    
        DEPARTAMENTO, 
        MUNICIPIO, 
        CODIGO_ALERTA
        FROM V_M_KOBO_FORMULARIOS WHERE ID_M_FORMULARIOS = '0012';"); */

        $mlpasFormated = $mlpas->map(function ( $lpa) {
            $lpa->persona->append('edad');
            $lpaArray = $lpa->toArray();
            $lpaDoted = Arr::dot($lpaArray); 
            return  $lpaDoted;
        });

        $flattenedMlpas =  ($mlpasFormated);

        return [
            "lpas" => $flattenedMlpas,
            "analisis" => Analisis::where(["type" => "LPA"])->get(),
            //"erns" => $erns
        ];
    }

    function getMqr(Request $request)
    {

        if ($request->pagination) {
            $mmqrs = MMqr::paginate(7);
        } else {
            $mmqrs = [
                "mqr" => MMqr::all(),
                "analisis" => Analisis::where(["type" => "MQR"])->get()
            ];
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
