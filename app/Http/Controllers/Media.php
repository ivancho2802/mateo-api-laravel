<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class Media extends Controller
{
    //
    public function downloadMedia(String $nameFile)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path() . "/download/LPA_MIRE+_V1.xlsx";

        if($nameFile == "lpa"){
            $file = public_path() . "/download/LPA_MIRE+_V1.xlsx";
        }

        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );

        return Response::download($file, 'LPA_MIRE+_V1.xlsx', $headers);
    }
}
