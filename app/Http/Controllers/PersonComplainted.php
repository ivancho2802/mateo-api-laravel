<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\MqrImportClass;
use App\Models\migrateCustom;
use App\Models\MMqr;
use App\Http\Controllers\helper;
use App\Models\Analisis;

class PersonComplainted extends Controller
{

    function stored(Request $request)
    {

        try {

            if ($request->analisis && $request->month) {
                $resulAlaisis = Analisis::updateOrCreate([
                    "texto" => $request->analisis,
                    "month" => $request->month,
                    "type" => "MQR"
                ]);
                //return $resulAlaisis;
                if (!$request->file) {
                    $query_mmqrs = MMqr::orderBy('created_at', 'desc');
                    $mmqrs = $query_mmqrs->paginate(10);

                    $data['mmqrs'] = $mmqrs;
                    $data['record_excel'] = 0;
                    $data['record_saved'] = 0;
                    //terminar devolver tabla
                    return view('list-mqrs', $data);
                }
            }

            //validacion para que no se cargue el mismo archivo en el mismo mes
            //lo que hre es validar si ya hay una migracion en el mes que se enviaron los datos y guardar o actualizar 
            //parece que debo pedir mes de la migracion
            //dd("file", $request->file('file'));

            //para el analisis recibir un string como analisis y que se edite en otro lado

            // Validate the uploaded file
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);

            // Get the uploaded file
            $file = $request->file('file');

            // Process the Excel file Consolidado
            //Excel::import(new MqrImportClass, $file, 'Consolidado');

            $import = new MqrImportClass();

            $import->onlySheets('Consolidado');

            // Process the Excel file
            Excel::import($import, $file);

            $collection = (new MqrClass)->toCollection($file);

            $count_record_excel = helper::countValidValues($collection[0]);

            $migrate_custom = migrateCustom::where([
                'table' => "M_MQR"
            ])->get()->last();

            $excel = file_get_contents($file);
            $base64 = base64_encode($excel);

            $migrate_custom->file = $base64;

            $migrate_custom->save();

            $id_mqrs = explode(", ", $migrate_custom->table_id);

            $query_mmqrs = MMqr::whereIn('ID', $id_mqrs)->orderBy('created_at', 'desc');

            $count_mmqrs = count($query_mmqrs->get());

            $mmqrs = $query_mmqrs->paginate(10);

            $data['mmqrs'] = $mmqrs;


            $data['record_excel'] = $count_record_excel - 1;
            $data['record_saved'] = $count_mmqrs + 1;

            //MQR devolver tabla con los resultados creados 
            return view('list-mqrs', $data);
            //return response()->json(["message" => "operacion hecha con exito"]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function reapairMunicipies()
    {
        $mqrs = MMqr::get();

        foreach ($mqrs as $mqr) {
            /*  MMqr::where("ID", $mqr->ID)
            ->update(['SEXO' => ucfirst(strtolower($mqr->SEXO))]); */
            $mqr->SEXO =  ucfirst(strtolower($mqr->SEXO));
            $mqr->save();
        }
        $mqrs = MMqr::get();

        return $mqrs;
    }
}
