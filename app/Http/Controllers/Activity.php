<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ImportActivityClass;
use Excel;
use App\Models\migrateCustom;
use App\Models\Activities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Activity extends Controller
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
        $collection = (new ActivityClass)->toCollection($file);

        $import = new ImportActivityClass();

        $import->onlySheets('SHELTER', 'WASH', 'EiE', 'SAN', 'SALUD', 'PROTECCIÓN');

        // Process the Excel file
        Excel::import($import, $file);

        $count_record_excel = helper::countValidValues($collection[0]);

        $migrate_custom = migrateCustom::where([
            ['table_id', '!=', ''],
            'table' => "activities"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        $id_activities = explode(", ", $migrate_custom->table_id);

        $query_activities = Activities::whereIn('id', $id_activities);
        $count_activities = count($query_activities->get());
        
        $activities = $query_activities
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $data['activities'] = $activities;

        $data['record_excel'] = $count_record_excel - 1;

        $data['record_saved'] = $count_activities;

        //terminar devolver tabla
        return view('list-activities', $data);
        //return response()->json(["message" => "operacion hecha con exito"]);
        
    }

    function getActividadByCod(Request $request){
        $activity = Activities::where("cod", "=", $request->cod);

        return [
            "actividad" => $activity->first()
        ];
    }
    
    function getActividades(Request $request){

        $select = '*';
        if(isset($request->select)){
            $select = explode(",", $request->select);
        }

        $activities = DB::table('M_LPA_EMERGENCIAS')
        ->select($select)
        ->get();
        
        return [
            "actividades" => $activities
        ];
    }
}
