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

            $numeror = rand(0, 10);

            //if($numeror == 2){
                generatePdf::dispatch()->onConnection('database');
            //}
            
            echo $numeror;
            //desplegar en una cola diferente
            //generatePdf::dispatch()->onQueue('cola2');

            generatePdf::dispatchAfterResponse();

        }
        
    }
}
