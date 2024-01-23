<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\MqrImportClass;

class PersonComplainted extends Controller
{
    function stored(Request $request)
    {

        try {

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

            return response()->json(["message" => "operacion hecha con exito"]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
