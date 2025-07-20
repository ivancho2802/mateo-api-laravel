<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\migrateCustom;
use Excel;
use App\Http\Controllers\ImportReportClass;
use App\Models\BhaActivityModel;
use App\Models\Reports;

class ReportController extends Controller
{
    //
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
        $collection = (new ReportClass)->toCollection($file);

        $import = new ImportReportClass();

        $import->onlySheets('Emergencias 2023');

        // Process the Excel file
        Excel::import($import, $file);

        $count_record_excel = helper::countValidValues($collection[0]);

        $migrate_custom = migrateCustom::where([
            'table' => "reports"
        ])->get()->last();

        $excel = file_get_contents($file);
        $base64 = base64_encode($excel);

        $migrate_custom->file = $base64;

        $migrate_custom->save();

        $id_reports = explode(", ", $migrate_custom->table_id);

        $query_reports = Reports::whereIn('id', $id_reports);
        $count_reports = count($query_reports->get());
        
        $reports = $query_reports
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $data['reports'] = $reports;

        $data['record_excel'] = $count_record_excel - 1;

        $data['record_saved'] = $count_reports;

        //terminar devolver tabla
        //return view('list-activities', $data);
        return response()->json(["message" => "operacion hecha con exito", "data" => $data]);
        
    }
}
