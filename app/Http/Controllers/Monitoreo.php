<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Monitoreo extends Controller
{
    //
    
    function reports(Request $request){

        
        ini_set('memory_limit', '2044M');
        set_time_limit(3000000);//0
        ini_set('max_execution_time', '60000');
        ini_set('max_input_time', '60000');


        //$filesExported = Storage::disk('public')->files('download/monitoreoEvaluacion');
        $filesExported = Storage::files("/monitoreoEvaluacion");

        //dd($filesExported);

        $filesExported = collect($filesExported);

        $reports = collect([]);


        $filesExported->each(function ($fileExport) use ($reports){

            $fileExport = str_replace("monitoreoEvaluacion/", "", $fileExport);

            $path = 'https://'.$_SERVER['HTTP_HOST'] ."/api/meal/moni_eva/report/download/";//:path;

            $order = substr($fileExport, 0, 2);

            $reports->push([
                "name" => $fileExport,
                "link" => $path . $fileExport,
                "order" => intval($order) 
            ]);

        });

        $reports = collect($reports);

        $reportsOrdered = $reports->sortBy('order');

        return response()->json(['status' => true, 'data' => ($reportsOrdered->values())]);

    }

    function reportDownload(Request $request){

        return response()->download(storage_path('app/monitoreoEvaluacion/' . $request->path));//->deleteFileAfterSend(true);


    }

    
    function reportDownloadAnalisis(Request $request){

        return response()->download(storage_path('app/analisisDepartamental/' . $request->path));//->deleteFileAfterSend(true);


    }
}
