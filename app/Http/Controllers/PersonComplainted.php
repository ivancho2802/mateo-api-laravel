<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\MqrImportClass;
use App\Models\migrateCustom;
use App\Models\MMqr;
use App\Http\Controllers\helper;

class PersonComplainted extends Controller
{
    function stored(Request $request)
    {

        try {

            //validacion para que no se cargue el mismo archivo en el mismo mes
            //dd("file", $request->file('file'));

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
}
