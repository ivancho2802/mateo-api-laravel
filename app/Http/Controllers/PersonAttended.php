<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\PaImportClass;

class PersonAttended extends Controller
{
    //
    function stored(Request $request){

        
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new PaImportClass, $file);

        dd("params", $request);

    }
}
