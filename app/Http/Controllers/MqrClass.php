<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\MqrImportClass;

class MqrClass extends Controller
{
    //
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
            Excel::import(new MqrImportClass, $file, 'Consolidado');
            /* Excel::load($file, function($reader) {
                foreach($reader as $key => $sheet) {
                    $sheetTitle = $sheet->getTitle();
                    dd($sheetTitle);
                };
            }); */

            return response()->json(["message" => "operacion hecha con exito"]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
