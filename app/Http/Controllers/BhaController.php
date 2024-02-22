<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\migrateCustom;
use Excel;
use App\Http\Controllers\ImportBhaClass;
use App\Models\BhaActivityModel;


class BhaController extends Controller
{

    function stored(Request $request)
    {

        //dd("file", $request->file('file'));
        //echo csrf_token(); 
        //return response()->json(["request" => $request]);

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');
        
        //get data excel
        $collection = (new BhaClass)->toCollection($file);

        $import = new ImportBhaClass();

        $import->onlySheets('Matriz BHA');

        // Process the Excel file
        Excel::import($import, $file);

        $count_record_excel = helper::countValidValues($collection[0]);

        $migrate_custom = migrateCustom::where([
            'table' => "bha_activity"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        $id_bhas_actividad = explode(", ", $migrate_custom->table_id);

        $query_bhas_actividad = BhaActivityModel::whereIn('id', $id_bhas_actividad);
        $count_bhas_actividad = count($query_bhas_actividad->get());
        
        $bhas_actividad = $query_bhas_actividad
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $data['bhas_actividad'] = $bhas_actividad;

        $data['record_excel'] = $count_record_excel - 1;

        $data['record_saved'] = $count_bhas_actividad;

        //terminar devolver tabla
        //return view('list-activities', $data);
        return response()->json(["message" => "operacion hecha con exito", "data" => $data]);
        
    }
}
