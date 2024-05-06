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
        $filename = "LPA_MIRE+_V2.xlsx";
        // Get path from storage directory storage_path no funcionó
        // Get path from storage directory public_path si funcionó
        $path = (public_path() . '/download/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, $headers);
    }

    function downloadMediaPqr()
    {

        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );
        
        $filename = "Consolidado_PQR_MIRE+.xlsx";
        $path = (public_path() . '/download/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, $headers);
    }

    function downloadMediaPqrPath(Request $request)
    {//migrationsMqr/nLOPShZMEMu1AjqYuNWsP7miBWl32gTyO72Lu2ex.xlsx
        $filepath = $request->url;

        //$file = Storage::path($filepath);

        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );

        $filename = "Consolidado_PQR_MIRE+.xlsx";

        return Storage::download($filepath, $filename, $headers);
        
        /* $path = (public_path() . '/download/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, $headers); */
    }


    function downloadMediaMatriz()
    {

        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );
        
        $filename = "diccionario_de_datos_lite.csv";
        $path = (public_path() . '/download/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, $headers);
    }

    
}
