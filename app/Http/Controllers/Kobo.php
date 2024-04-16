<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MKoboRespuestas;

class Kobo extends Controller
{
    //
    public function getKoboLabels($uui, $token)
    {

        //dd($uui, $token);

        $jsonurl = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

        /* $response = Http::accept('application/json')
                ->withBasicAuth('ugi', 'ugiach')//ugi@co.acfspain.org | ugi
                ->get($jsonurl); */

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token,
            'Accept' => 'application/json'
        ])
            ->get($jsonurl)
            ->json();

        $dataSubdmissions = collect($response);

        //obtener los labes

        //https://kc.acf-e.org/api/v1/forms?id_string=a4E3J9gkULZe5eRqQph8zh
        $jsonurlform = "https://kc.acf-e.org/api/v1/forms?id_string=" . $uui;

        $dataForm = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => '*/*'
        ])
            ->get($jsonurlform)
            ->json();

        $formid = collect($dataForm[0])->get('formid');

        //https://kc.acf-e.org/api/v1/forms/2433/form.json
        $jsonurlDataLabels = "https://kc.acf-e.org/api/v1/forms/" . $formid . "/form.json";

        $dataDataLabelsResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataLabels)
            ->json();

        $dataLabels = collect($dataDataLabelsResponse);

        /**
         * [
         *"name" => "akvWrUs835hE6zL5oYRYhY"
         *"title" => "COF2AR_atención_salud_NNA"
         *"sms_keyword" => "akvWrUs835hE6zL5oYRYhY"
         *"default_language" => "default"
         *"choices" => array:88 [
         *"children" => array: [
         */
        //dd("dataLabels", $dataLabels);//9

        //dd("dataSubdmissions", $dataSubdmissions);
        /**
         * Illuminate\Support\Collection {#1348
         *    #items: array:481 [
         *        0 => array:224 [
         *        "valoracion_nutricional/tiempo_comida" => "2_comidas"
         *        "diagnostico_analisis_nutricional/diagnostico_nutricional_CIE10" => "E440_Destrucion_proteicocalorica_moderada"
         */

        $formated = $dataSubdmissions->map(function ($submission) use ($dataLabels) {

            //dd("submission", $submission);//224

            $dataLabelsCollection = collect($dataLabels);

            //dd("dataLabels", $dataLabelsCollection->get("children")[6]['name']);

            //[
            // * "pregunta" => "respuesta",
            // * "pregunta2" => "respuesta2",
            // * ]
            // *

            /**
             * "name" => "valoracion_seguimiento_ninos_as"
             *  "bind" => array:1 [ …1]
             *   "label" => "Valoración y seguimiento médico nutricional de niños y niñas"
             */
            $dataLabelsChildren = collect($dataLabelsCollection->get("children"));
            //dd("dataLabelsChildren", $dataLabelsChildren);
            //dd($keys, $values);

            $submissionFormated = collect($submission)->flatMap(function ($valueSub, $keySub) use ($dataLabelsChildren) {

                $collectionName = collect(explode('/', $keySub));

                $itemKeyFiltered = $dataLabelsChildren->filter(function ($item) use ($collectionName) {
                    //echo $item['name'] . '--' . json_encode( explode('/', $keySub)) . '----------\n';

                    //dd(($collectionName)->first(), ($collectionName)->last());

                    $itemCollection = collect($item);

                    //dd($item['name'] .  $collectionName->first());//->get("children")

                    if (count($collectionName) > 0 && optional($itemCollection)->get("children")) {

                        $children2 = collect(optional($itemCollection)->get("children"));

                        //dd("children2", $children2);

                        $children2Fortmat = $children2->map(function ($chield) {
                            $children2Collect = collect($chield); //->forget('name');
                            return $children2Collect['name'];
                        });

                        $children2FortmatCollect = collect($children2Fortmat);

                        return ($collectionName->first() == $item['name'] && $children2FortmatCollect->search($collectionName->last())) !== false;
                    }

                    return ($item['name'] == $collectionName->first()) !== false;
                });

                $itemKeyFilteredCollect = collect(collect($itemKeyFiltered)->first());
                //dd("itemKeyFilteredCollect", $itemKeyFilteredCollect->get('label'));

                $children2Label = '';

                if (count($collectionName) > 0 && optional($itemKeyFilteredCollect)->get("children")) {

                    $children2Collect = collect(optional($itemKeyFilteredCollect)->get("children"));
                    //dd("children2", $children2, $collectionName->last());

                    $children2FortmatCollectFiltered = $children2Collect
                        ->filter(function ($children2) use ($collectionName) {
                            return $children2['name'] == $collectionName->last();
                        })->first();

                    //dd($children2FortmatCollectFiltered['label']);

                    $children2Label = isset($children2FortmatCollectFiltered['label']) ? $children2FortmatCollectFiltered['label'] : $collectionName->last();
                }

                $itemSub = collect([
                    optional($itemKeyFilteredCollect)->get('label') ? optional($itemKeyFilteredCollect)->get('label') . '/' . $children2Label : $keySub => $valueSub
                ]);

                //dd("itemSub", $itemSub);

                return $itemSub;
            });

            //dd("submissionFormated", $submissionFormated); //224

            /* for ($i = 0; $i < count($keys); $i++) {
                    $keysCurrent = $keys[$i];
                    $valuesCurrent = $values[$i];
    
                    $indexLabelsChildren = $dataLabelsChildren->filter(function ( $item, int $key) use ($keysCurrent) {
                        return strpos($keysCurrent, $item['name']);
                    });
                    
                    dd($indexLabelsChildren->first());
    
                    $submissionFormated[] = [
    
                    ];
                } */

            //dd($submission);


            //$submission->valoracion_seguimiento_ninos_as

            //$submission[] = $submissionFormated;

            return $submissionFormated;
        });

        return $formated
            /* [
                "status" => $response->getStatusCode(),
                "data" => $response->body(),
                "json" => $response->json() ,
                "object" => $response->object() ,
                "status" => $response->status() ,
                "successful" => $response->successful() ,
                "clientError" => $response->clientError() ,
                //"mkoboformulario" => $formulario->get()
            ] */;
    }

    public function exportByuui($id, $token)
    {
        /* try { */

            $limit_minutes = 900;
            ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
            ini_set('memory_limit', '2044M');
            set_time_limit($limit_minutes); //0
            ini_set('max_execution_time', '' . $limit_minutes . '');
            ini_set('max_input_time', '' . $limit_minutes . '');

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            $timestart = time();

            $formid = $id;

            //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
            //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
            //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;
            $jsonurlDataEnketo = "https://kf.acf-e.org/assets/" . $formid . "/submissions/?format=json";
            //'timeout' => 1200,  //1200 Seconds is 20 Minutes

            $dataEnketoResponse = Http::withHeaders([
                'Authorization' => 'Token ' . $token . '',
                'Accept' => 'application/json'
            ])
                ->get($jsonurlDataEnketo)
                ->json();

            $dataEnketoResponseFiltered = collect($dataEnketoResponse)->filter(function ($item, $key) use ($filesExported) {

                $filesExportedCollect = collect($filesExported);

                $filesExportedCollect = $filesExportedCollect->map(function ($fileExport) {
                    $extract_id = explode('_', $fileExport);
                    $extract_id = str_replace(".pdf", "", $extract_id[2]);
                    return '' . $extract_id . '';
                });

                return ($filesExportedCollect->search($item['_id'])) === false;
            });

            /* dd(
            "exportaciones totales" , count($dataEnketoResponse),
            "exportaciones que se procesaran" , count($dataEnketoResponseFiltered),
            "exportaciones procesadas", count($filesExported),
            "exportaciones faltantes", count($dataEnketoResponse) - count($filesExported)
            ); */

            $dataEnketo = collect($dataEnketoResponseFiltered)->chunk(45);
            
            if (count($dataEnketoResponse) == count($filesExported)) {

                $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

                //$ramdom = Carbon\Carbon::now()->timestamp;
                //dd(Carbon\Carbon::now()->timestamp, time());

                if ($resultCreated === true) {
                    return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
                } else {
                    return response()->json(['status' => false, 'message' => $resultCreated], 503);
                }
            }

            //contruyrndo las imagenes del formulario

            $dataEnketoWithImage = collect($dataEnketo[0]->map(function ($chield) use ($token, $filesExported) {
                $formulario = collect($chield); //->forget('name');

                $claves = collect($formulario->keys())->filter()->all();
                $valores =  array_values($formulario->toArray());

                for ($i = 0; $i < count($claves); $i++) {
                    # code...
                    $clave = ($claves[$i]);
                    $valor = $valores[$i];

                    if (!is_array($valor) && isset($clave)) {

                        if (
                            (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
                            (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                            (stripos($valor, '.jpeg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                            (stripos($valor, '.svg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png')))
                        ) {
                            $chield_attachments = collect($chield['_attachments']);

                            $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
                                return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
                            });


                            $urlImg = collect($urlImgFirst);
                            //dd("urlImg", $urlImg, $urlImg->first(), $urlImg->first()['download_url']);

                            if (count($urlImgFirst) > 0) {

                                //convertir la imagen en su respuesta
                                $imageResponse = Helper::getImageWithHeaders($urlImg->first()['download_url'], $token);

                                $formulario[$clave] = $imageResponse ?? $urlImg->first()['download_url'];
                            }
                            /* elsedd("esto no deberia psasr"); */
                        }
                    }
                }

                return $formulario;
            }));

            $dataEnketoWithImage->filter()->all();

            $dataEnketoWithImage->each(function (Collection $item) use ($timestart, $limit_minutes, $dataEnketoResponse) {

                $id_file = $item->get('_id');

                $filename = '/htmlToPdf/cash_echo/Acuerdo De Transferencia Monetarias - Cash ECHO_' . $id_file . '.pdf';

                if (!Storage::disk('local')->exists($filename)) {
                    $pdf = Pdf::loadView('pdf.formulario', ["data" => $item]);
                    $content = $pdf->download()->getOriginalContent();
                    Storage::put($filename, $content);
                }

                $currentTimeExecuted = time() - $timestart;

                $limit_minutes_ajust = $limit_minutes - 100;
                echo $currentTimeExecuted . " > " . $limit_minutes_ajust . ' = ' . ($currentTimeExecuted > $limit_minutes_ajust) ."\n";

                if ($currentTimeExecuted > $limit_minutes_ajust) {
                    $filesExported = Storage::files("/htmlToPdf/cash_echo/");
                    echo "exportaciones totales" .count($dataEnketoResponse) ." \n";
                    echo "exportaciones procesadas" .count($filesExported) ." \n";
                    echo "exportaciones faltantes" .(count($dataEnketoResponse) - count($filesExported))." \n";

                    return response()->json([
                        "exportaciones totales" => count($dataEnketoResponse),
                        "exportaciones procesadas" => count($filesExported),
                        "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
                    ]);
                }
            });

            /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200);
            dd("esta en 45 no se proceso por time out ver como estan los estilos con uno revisar des pues de _318932"); */
            
            if (count($dataEnketoResponse) == count($filesExported)) {

                $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

                //$ramdom = Carbon\Carbon::now()->timestamp;
                //dd(Carbon\Carbon::now()->timestamp, time());

                if ($resultCreated === true) {
                    return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
                } else {
                    return response()->json(['status' => false, 'message' => $resultCreated], 503);
                }
            } else {

                $filesExported = Storage::files("/htmlToPdf/cash_echo/");

                return response()->json([
                    "exportaciones totales" => count($dataEnketoResponse),
                    "exportaciones procesadas" => count($filesExported),
                    "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported)
                ]);
            }

            /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200)
            ->header('Authorization', 'Token ' . $token); */
        /* } catch (\Throwable $th) {
            

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            return response()->json([
                "error" => $th,
                "exportaciones procesadas" => count($filesExported),
            ]);
        } */
    }

    public function exportByid($uui, $token)
    {
        /* try { */

            $limit_minutes = 800;
            ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
            ini_set('memory_limit', '2044M');
            set_time_limit($limit_minutes); //0
            ini_set('max_execution_time', '' . $limit_minutes . '');
            ini_set('max_input_time', '' . $limit_minutes . '');

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            $timestart = time();

            $formid = $uui;

            //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
            //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
            $jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;
            //'timeout' => 1200,  //1200 Seconds is 20 Minutes

            $dataEnketoResponse = Http::withHeaders([
                'Authorization' => 'Token ' . $token . '',
                'Accept' => 'application/json'
            ])
                ->get($jsonurlDataEnketo)
                ->json();


            $dataEnketoResponseFiltered = collect($dataEnketoResponse)->filter(function ($item, $key) use ($filesExported) {

                $filesExportedCollect = collect($filesExported);

                $filesExportedCollect = $filesExportedCollect->map(function ($fileExport) {
                    $extract_id = explode('_', $fileExport);
                    $extract_id = str_replace(".pdf", "", $extract_id[2]);
                    return '' . $extract_id . '';
                });

                return ($filesExportedCollect->search($item['_id'])) === false;
            });

            /* dd(
            "exportaciones totales" , count($dataEnketoResponse),
            "exportaciones que se procesaran" , count($dataEnketoResponseFiltered),
            "exportaciones procesadas", count($filesExported),
            "exportaciones faltantes", count($dataEnketoResponse) - count($filesExported)
            ); */

            $dataEnketo = collect($dataEnketoResponseFiltered)->chunk(45); //;

            

            if (count($dataEnketoResponse) == count($filesExported)) {

                $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

                //$ramdom = Carbon\Carbon::now()->timestamp;
                //dd(Carbon\Carbon::now()->timestamp, time());

                if ($resultCreated === true) {
                    return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
                } else {
                    return response()->json(['status' => false, 'message' => $resultCreated], 503);
                }
            }

            //$urlHtmlPdf = $dataEnketo->first();

            //onbtener url de lso iagens https://kc.acf-e.org/api/v1/media/2486

            //imagenes del formulario
            /* $urlMedia = "https://kc.acf-e.org/api/v1/media/";
                
                $dataMediaResponse = Http::withHeaders([
                    'Authorization' => 'Token ' . $token . '',
                    'Accept' => 'application/json'
                ])
                    ->get($urlMedia); */
            //return $dataEnketo;,

            //contruyrndo las imagenes del formulario

            $dataEnketoWithImage = collect($dataEnketo[0]->map(function ($chield) use ($token, $filesExported) {
                $formulario = collect($chield); //->forget('name');

                $claves = collect($formulario->keys())->filter()->all();
                $valores =  array_values($formulario->toArray());

                for ($i = 0; $i < count($claves); $i++) {
                    # code...
                    $clave = ($claves[$i]);
                    $valor = $valores[$i];

                    if (!is_array($valor) && isset($clave)) {

                        if (
                            (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
                            (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                            (stripos($valor, '.jpeg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                            (stripos($valor, '.svg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png')))
                        ) {
                            $chield_attachments = collect($chield['_attachments']);

                            $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
                                return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
                            });


                            $urlImg = collect($urlImgFirst);
                            //dd("urlImg", $urlImg, $urlImg->first(), $urlImg->first()['download_url']);

                            if (count($urlImgFirst) > 0) {

                                //convertir la imagen en su respuesta
                                $imageResponse = Helper::getImageWithHeaders($urlImg->first()['download_url'], $token);

                                $formulario[$clave] = $imageResponse ?? $urlImg->first()['download_url'];
                            }
                            /* elsedd("esto no deberia psasr"); */
                        }
                    }
                }

                return $formulario;
            }));

            //dd("dataEnketoWithImage", $dataEnketoWithImage->first());//, $dataEnketoWithImage->first()->toArray()['grupo_datos_beneficiario/numero_identificacion_participante']

            //return view('pdf.formulario', ["data" => $dataEnketoWithImage->first()]);

            /* $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>Test</h1>');
            return $pdf->stream(); */

            $dataEnketoWithImage->filter()->all();

            $dataEnketoWithImage->each(function (Collection $item) use ($timestart, $limit_minutes, $dataEnketoResponse) {

                $id_file = $item->get('_id');

                $filename = '/htmlToPdf/cash_echo/Acuerdo De Transferencia Monetarias - Cash ECHO_' . $id_file . '.pdf';

                if (!Storage::disk('local')->exists($filename)) {
                    $pdf = Pdf::loadView('pdf.formulario', ["data" => $item]);
                    $content = $pdf->download()->getOriginalContent();
                    Storage::put($filename, $content);
                }

                $currentTimeExecuted = time() - $timestart;

                $limit_minutes_ajust = $limit_minutes - 100;
                echo $currentTimeExecuted . " > " . $limit_minutes_ajust . ' = ' . ($currentTimeExecuted > $limit_minutes_ajust) ."\n";

                if ($currentTimeExecuted > $limit_minutes_ajust) {
                    $filesExported = Storage::files("/htmlToPdf/cash_echo/");
                    echo "exportaciones totales" .count($dataEnketoResponse) ." \n";
                    echo "exportaciones procesadas" .count($filesExported) ." \n";
                    echo "exportaciones faltantes" .(count($dataEnketoResponse) - count($filesExported))." \n";

                    return response()->json([
                        "exportaciones totales" => count($dataEnketoResponse),
                        "exportaciones procesadas" => count($filesExported),
                        "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
                    ]);
                }
            });

            /* $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);
        
            if($resultCreated === true){
              return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
            }else {
              return response()->json(['status' => false, 'message' => $resultCreated], 503);
            } */
            if (count($dataEnketoResponse) == count($filesExported)) {

                $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

                //$ramdom = Carbon\Carbon::now()->timestamp;
                //dd(Carbon\Carbon::now()->timestamp, time());

                if ($resultCreated === true) {
                    return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
                } else {
                    return response()->json(['status' => false, 'message' => $resultCreated], 503);
                }
            } else {

                $filesExported = Storage::files("/htmlToPdf/cash_echo/");

                return response()->json([
                    "exportaciones totales" => count($dataEnketoResponse),
                    "exportaciones procesadas" => count($filesExported),
                    "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported)
                ]);
            }

            /* return $pdf->download('invoice.pdf'); */

            /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200)
            ->header('Authorization', 'Token ' . $token); */
        /* } catch (\Throwable $th) {
            

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            return response()->json([
                "error" => $th,
                "exportaciones procesadas" => count($filesExported),
            ]);
        } */
    }

    /**
     * 8914355 8916210 "MPD"
     */
    public function getKoboSaved(Request $request){

        $mmpds = MKoboRespuestas::whereHas('formulario', function ($q) use ($request){
            $q->where('ACCION', '=', $request->ACCION);
        })
        ->where('_ID', '=', $request->_ID)
        ->limit(1000)
        ->get()
        ->load('pregunta')
            ->groupBy('_ID');

        if ($request->pagination) {
            $mmpdsArray = $this->paginateCollection($mmpds, 10);
        } else {
            $mmpdsArray = collect([]);
            
            $mmpdsValues = ($mmpds)->values();


            $mmpdsValues->each(function ($formulario) use ($mmpdsArray){

                $objectPresuntaRespuesta = collect();
                //$formulario [{VALOR: "", pregunta: {ROTULO}}, {VALOR: "", pregunta: {ROTULO}}]
                $formulario->each(function ($respuesta) use ($objectPresuntaRespuesta){
                    //dd($respuesta->VALOR, $respuesta->pregunta);
                    
                    $objectPresuntaRespuesta[$respuesta->pregunta->CAMPO1] = $respuesta->VALOR;
                });

                $mmpdsArray->push($objectPresuntaRespuesta);
            });
        }

        return  $mmpdsArray;
    }
}
