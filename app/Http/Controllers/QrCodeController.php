<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //
    function show(Request $request){
        
        $data = QrCode::size(512)
            ->format('png')
            ->merge('/storage/app/logo_ach.png')
            ->errorCorrection('M')
            ->generate(
                $request->url ?? 'https://www.accioncontraelhambre.org/',
            );

        return response($data)
            ->header('Content-type', 'image/png');
    }
}
