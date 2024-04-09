<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\generatePdf;

class Jobs extends Controller
{
    //

    function deploy(Request $request){

        $jobname = $request->jobname;

        if ($jobname == 'generate_pdf'){
            generatePdf::dispatch();
        }
        
    }
}
