<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\PaImportClass;

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

        $import = new PaImportClass();

        $import->onlySheets('BD');

        // Process the Excel file
        $response = Excel::import($import, $file);

        dd($import[0]);

        return response()->json(["message" => "operacion hecha con exito"]);

        
    }
}
