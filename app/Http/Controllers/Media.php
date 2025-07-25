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
    $filename = "LPA_MIRE+_V3.xlsx";
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

    $filename = "Formato_PQR_2024_MIREVIEW.xlsx";
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }

  function downloadMediaPqrPath(Request $request)
  {
    //migrationsMqr/nLOPShZMEMu1AjqYuNWsP7miBWl32gTyO72Lu2ex.xlsx
    $filepath = $request->url;

    //$file = Storage::path($filepath);

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );

    $filename = "Formato_PQR_2024.xlsx";

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

    $filename = "1. Matriz lite  - paso 1.csv";
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }

  function downloadMediaCustom($filename)
  {

    $path = public_path($filename);

    $headers = $headers = [
      'Content-Type' => 'text/css',
    ];

    if (strpos($filename, '.zip') !== false) {
      return response()->download($path, $filename, $headers)->deleteFileAfterSend(true);
    }

    // Download file with custom headers

    return response()->download(urlencode($path), $filename, $headers);
  }

  function downloadMediaCustomFolder($folder, $filename)
  {
    $filenameUpper = ucfirst(strtolower($filename));

    return response()->download(storage_path('app/'.$folder.'/' . $filenameUpper));//->deleteFileAfterSend(true);
 
  }

  
  function downloadMediaProdinfo()
  {

    $headers = array(
      'Content-Type: application/vnd.ms-excel',
    );
    /* $file = public_path() . "/download/LPA_MIRE+_V1.xlsx";

        if ($nameFile == "lpa") {
            $file = "LPA_MIRE+_V1.xlsx";
        }

        return Storage::download($file, 'LPA_MIRE+_V1.xlsx', $headers); */
    $filename = "RR_Actualización_productos_de_información.xlsx";
    // Get path from storage directory storage_path no funcionó
    // Get path from storage directory public_path si funcionó
    $path = (public_path() . '/download/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, $headers);
  }
}
