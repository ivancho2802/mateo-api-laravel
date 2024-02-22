<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\PaImportClass;
use App\Models\migrateCustom;
use App\Models\MLpa;

class PersonAttended extends Controller
{
    //
    function stored(Request $request){

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
        $collection = (new MlpasClass)->toCollection($file);

        $import = new PaImportClass();

        $import->onlySheets('BD');

        // Process the Excel file
        Excel::import($import, $file);

        $collectExcel = $collection[2] ?? $collection[0];

        $count_record_excel = helper::countValidValues($collectExcel);

        $migrate_custom = migrateCustom::where([
            'table' => "M_LPAS"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        $id_lpas = explode(", ", $migrate_custom->table_id);

        $query_mlpas = MLpa::whereIn('ID', $id_lpas);
        $count_mlpas = count($query_mlpas->get());
        
        $mlpas = $query_mlpas
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $mlpas->load('emergencia');

        $data['mlpas'] = $mlpas;

        $data['record_excel'] = $count_record_excel - 1;

        $data['record_saved'] = $count_mlpas;

        //terminar devolver tabla
        return view('list-lpas', $data);
        //return response()->json(["message" => "operacion hecha con exito"]);
        
    }
}
