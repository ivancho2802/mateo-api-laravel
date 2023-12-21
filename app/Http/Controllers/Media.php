<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class Media extends Controller
{
    //

    function downloadMedia()
    {

        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );
        /* $file = public_path() . "/download/LPA_MIRE+_V1.xlsx";

        if ($nameFile == "lpa") {
            $file = "LPA_MIRE+_V1.xlsx";
        }

        return Storage::download($file, 'LPA_MIRE+_V1.xlsx', $headers); */
        $filename = "LPA_MIRE+_V1.xlsx";
        // Get path from storage directory
        $path = storage_path('app/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, $headers);
    }
}
