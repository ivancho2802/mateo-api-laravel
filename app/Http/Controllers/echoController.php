<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\migrateCustom;
use Excel;

use App\Http\Controllers\ImportEchoClass;
use App\Models\EchoActivityModel;

class echoController extends Controller
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
        $collection = (new EchoClass)->toCollection($file);

        $import = new ImportEchoClass();

        $import->onlySheets('Matriz ECHO');

        // Process the Excel file
        Excel::import($import, $file);

        $count_record_excel = helper::countValidValues($collection[0]);

        $migrate_custom = migrateCustom::where([
            'table' => "echo_activity"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        $id_echos_actividad = explode(", ", $migrate_custom->table_id);

        $query_echos_actividad = EchoActivityModel::whereIn('id', $id_echos_actividad);
        $count_echos_actividad = count($query_echos_actividad->get());
        
        $echos_actividad = $query_echos_actividad
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $data['echos_actividad'] = $echos_actividad;

        $data['record_excel'] = $count_record_excel - 1;

        $data['record_saved'] = $count_echos_actividad;

        //terminar devolver tabla
        //return view('list-activities', $data);
        return response()->json(["message" => "operacion hecha con exito", "data" => $data]);
        
    }
}
